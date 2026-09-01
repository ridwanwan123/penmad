// =============================================
// MAP LOADING OVERLAY
// =============================================
const mapLoadingOverlay = document.getElementById("mapLoadingOverlay");

// Daftar proses yang harus selesai sebelum overlay disembunyikan
const mapLoadTasks = {
    tiles: false,
    madrasahData: false,
    geojson: false,
};

function markMapTaskDone(taskName) {
    mapLoadTasks[taskName] = true;

    const allDone = Object.values(mapLoadTasks).every(Boolean);

    if (allDone) {
        hideMapLoadingOverlay();
    }
}

function hideMapLoadingOverlay() {
    if (mapLoadingOverlay) {
        mapLoadingOverlay.classList.add("is-hidden");
    }
}

// Jaga-jaga: kalau salah satu proses lambat/gagal, overlay tetap
// otomatis hilang setelah 15 detik supaya user tidak terjebak selamanya.
const mapLoadingSafetyTimer = setTimeout(hideMapLoadingOverlay, 15000);

// =============================================
// URL DATA (dari Blade, pakai asset() Laravel)
// =============================================
const mapEl = document.getElementById("map");
const madrasahDataUrl = mapEl?.dataset.madrasahUrl || "/data/madrasahs";
const geojsonUrl = mapEl?.dataset.geojsonUrl || "/geojson/dki-jakarta.json";

// =============================================
// MAP INITIALIZATION
// =============================================
const map = L.map("map", {
    zoomControl: false,
    attributionControl: false,
}).setView([-6.2088, 106.8456], 11);

// =============================================
// TILE LAYER
// =============================================
const baseTileLayer = L.tileLayer(
    "https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png?key=cb1_2m0l_1_f5056f689d3d758d8bc73a3a",
    {
        subdomains: "abcd",
        maxZoom: 20,
    },
).addTo(map);

// Tandai selesai begitu tile pertama kali selesai dimuat semua
baseTileLayer.on("load", () => markMapTaskDone("tiles"));

// =============================================
// CUSTOM ZOOM CONTROL
// =============================================
L.control
    .zoom({
        position: "bottomright",
    })
    .addTo(map);

// =============================================
// MADRASAH DATA
// =============================================
let madrasahData = [];
const markers = [];

const markerCluster = L.markerClusterGroup({
    chunkedLoading: true,
    spiderfyOnMaxZoom: true,
    showCoverageOnHover: false,
    zoomToBoundsOnClick: true,
});

function renderMarkers(dataset = madrasahData) {
    markerCluster.clearLayers();
    markers.length = 0;

    dataset.forEach((item) => {
        const color = getJenjangColor(item.jenjang);

        const marker = L.marker(
            [parseFloat(item.latitude), parseFloat(item.longitude)],
            {
                icon: createIcon(color),
            },
        );

        marker.bindPopup(`
      <div>
        <strong>${item.nama_madrasah}</strong><br/>
        <small>${item.jenjang} - ${item.kota}</small>
      </div>
    `);

        marker.on("click", () => {
            updateSidebar(item);

            map.flyTo(
                [parseFloat(item.latitude), parseFloat(item.longitude)],
                map.getZoom(),
                {
                    duration: 1.5,
                },
            );
        });

        markerCluster.addLayer(marker);

        markers.push({
            marker,
            data: item,
        });
    });

    if (!map.hasLayer(markerCluster)) {
        map.addLayer(markerCluster);
    }
}

async function loadMadrasahData() {
    hideErrorBanner();

    try {
        const response = await fetch(madrasahDataUrl);

        // fetch() tidak otomatis throw untuk status HTTP error (403/500/dst),
        // jadi harus dicek manual di sini.
        if (!response.ok) {
            throw new Error(`Gagal mengambil data madrasah (HTTP ${response.status})`);
        }

        madrasahData = await response.json();

        if (!Array.isArray(madrasahData)) {
            throw new Error("Format data madrasah tidak sesuai");
        }

        renderMarkers();
        populateKotaOptions();

        if (madrasahData.length > 0) {
            updateSidebar(madrasahData[0]);
        } else {
            clearSidebarLoadingState();
        }
    } catch (error) {
        console.error("Gagal load data madrasah:", error);
        showDataError();
    } finally {
        markMapTaskDone("madrasahData");
    }
}

// Tampilkan pesan error yang jelas ke user (bukan cuma console.error diam-diam),
// baik di banner atas map maupun di sidebar info card.
function showDataError() {
    clearSidebarLoadingState();

    document.getElementById("schoolName").innerText = "Data tidak dapat dimuat";
    document.getElementById("schoolLocation").innerHTML =
        '<i class="bi bi-geo-alt-fill"></i> -';
    document.getElementById("schoolAddress").innerText =
        "Terjadi gangguan saat mengambil data madrasah. Coba muat ulang.";
    document.getElementById("schoolNpsn").innerText = "-";
    document.getElementById("schoolStatus").innerText = "-";
    document.getElementById("schoolKamad").innerText = "-";
    document.getElementById("schoolKatu").innerText = "-";

    const banner = document.getElementById("mapErrorBanner");
    banner?.classList.add("is-visible");
}

function hideErrorBanner() {
    document.getElementById("mapErrorBanner")?.classList.remove("is-visible");
}

document.getElementById("mapRetryBtn")?.addEventListener("click", () => {
    // Tampilkan overlay loading lagi supaya user tahu proses ulang sedang berjalan
    mapLoadTasks.madrasahData = false;
    mapLoadingOverlay?.classList.remove("is-hidden");

    loadMadrasahData();
});

// Isi opsi dropdown "Kota" otomatis berdasarkan data yang ke-load,
// supaya tidak hardcode dan selalu sinkron sama data asli.
function populateKotaOptions() {
    const kotaSelect = document.getElementById("filterKota");
    if (!kotaSelect) return;

    // Bersihkan opsi dinamis lama (kecuali opsi default "Semua Kota")
    // supaya aman dipanggil berkali-kali, misal saat retry setelah error.
    kotaSelect.querySelectorAll("option:not(:first-child)").forEach((opt) => opt.remove());

    const kotaList = [...new Set(madrasahData.map((item) => item.kota).filter(Boolean))].sort();

    kotaList.forEach((kota) => {
        const option = document.createElement("option");
        option.value = kota;
        option.textContent = kota;
        kotaSelect.appendChild(option);
    });
}

// Lepas efek "buram + pulse" begitu data pertama kali berhasil ditampilkan
function clearSidebarLoadingState() {
    document
        .querySelectorAll(".info-value-loading")
        .forEach((el) => el.classList.remove("info-value-loading"));
}

loadMadrasahData();

function getJenjangColor(jenjang) {
    switch (jenjang) {
        case "MA":
            return "#3b82f6"; // biru
        case "MI":
            return "#f59e0b"; // gold
        case "MTs":
            return "#10b981"; // hijau
        case "RA":
            return "#ef4444"; // merah
        default:
            return "#64748b";
    }
}

// =============================================
// CUSTOM ICON
// =============================================
function createIcon(color) {
    return L.divIcon({
        className: "",
        html: `<div style="
      width:14px;
      height:14px;
      background:${color};
      border-radius:50%;
      border:3px solid white;
      box-shadow:0 0 0 4px rgba(0,0,0,0.05);
    "></div>`,
        iconSize: [20, 20],
    });
}

// =============================================
// UPDATE SIDEBAR
// =============================================
function updateSidebar(data) {
    clearSidebarLoadingState();

    // NAMA MADRASAH
    document.getElementById("schoolName").innerText = data.nama_madrasah;

    // KOTA
    document.getElementById("schoolLocation").innerHTML = `
      <i class="bi bi-geo-alt-fill"></i>
      ${data.kota}
  `;

    // ALAMAT
    document.getElementById("schoolAddress").innerText =
        `${data.kecamatan}, ${data.kelurahan}`;

    // NPSN
    document.getElementById("schoolNpsn").innerText = data.npsn ?? "-";

    // STATUS
    document.getElementById("schoolStatus").innerText = data.status ?? "-";

    // KEPALA MADRASAH
    document.getElementById("schoolKamad").innerText = data.kamad ?? "-";

    // KATU
    document.getElementById("schoolKatu").innerText = data.katu ?? "-";
}
// =============================================
// GEOJSON DKI JAKARTA
// =============================================
fetch(geojsonUrl)
    .then((response) => response.json())
    .then((data) => {
        const geoLayer = L.geoJSON(data, {
            style: {
                color: "#10b981",
                weight: 0.5,
                fillOpacity: 0,
            },

            onEachFeature: function (feature, layer) {
                layer.on({
                    mouseover: function (e) {
                        e.target.setStyle({
                            weight: 4,
                            color: "#f59e0b",
                        });
                    },

                    mouseout: function (e) {
                        geoLayer.resetStyle(e.target);
                    },
                });

                if (feature.properties) {
                    layer.bindTooltip(
                        feature.properties.name || "Wilayah DKI Jakarta",
                    );
                }
            },
        }).addTo(map);

        map.fitBounds(geoLayer.getBounds());
    })
    .catch((error) => {
        console.error("GeoJSON gagal dimuat:", error);
    })
    .finally(() => {
        markMapTaskDone("geojson");
    });

// =============================================
// SEARCH MADRASAH
// =============================================
const searchInput = document.getElementById("searchSchool");

searchInput.addEventListener("keyup", function () {
    const keyword = this.value.toLowerCase();

    const found = markers.find((item) =>
        item.data.nama_madrasah.toLowerCase().includes(keyword),
    );

    if (!found) {
        return;
    }

    updateSidebar(found.data);

    const targetLatLng = [
        parseFloat(found.data.latitude),
        parseFloat(found.data.longitude),
    ];

    // flyTo dulu supaya animasinya smooth (pan + zoom bertahap),
    // baru setelah animasi selesai, pastikan marker pecah dari
    // cluster-nya (zoomToShowLayer) dan buka popup-nya.
    map.flyTo(targetLatLng, 16, {
        duration: 1.5,
    });

    map.once("moveend", () => {
        markerCluster.zoomToShowLayer(found.marker, () => {
            found.marker.openPopup();
        });
    });
});

// RESET MAP BUTTON
// Sekarang berupa tombol HTML biasa (bukan Leaflet control) supaya bisa
// disandingkan langsung dengan tombol filter di .map-icon-controls.
document.getElementById("resetMapBtn")?.addEventListener("click", () => {
    map.flyTo([-6.2088, 106.8456], 11, {
        duration: 1.2,
    });

    updateSidebar(madrasahData[0]);
});

// =============================================
// FILTER (Jenjang / Status / Kota)
// =============================================
const filterToggleBtn = document.getElementById("filterToggleBtn");
const filterPanel = document.getElementById("filterPanel");
const filterJenjang = document.getElementById("filterJenjang");
const filterStatus = document.getElementById("filterStatus");
const filterKota = document.getElementById("filterKota");
const filterResetBtn = document.getElementById("filterResetBtn");

// Toggle buka/tutup panel filter
filterToggleBtn?.addEventListener("click", (e) => {
    e.stopPropagation();
    filterPanel.classList.toggle("is-open");
    filterToggleBtn.classList.toggle("is-active");
});

// Klik di luar panel -> tutup panel
document.addEventListener("click", (e) => {
    if (!filterPanel.contains(e.target) && e.target !== filterToggleBtn) {
        filterPanel.classList.remove("is-open");
        filterToggleBtn.classList.remove("is-active");
    }
});

function applyFilters() {
    const jenjang = filterJenjang.value;
    const status = filterStatus.value;
    const kota = filterKota.value;

    const filtered = madrasahData.filter((item) => {
        const matchJenjang = !jenjang || item.jenjang === jenjang;
        const matchStatus =
            !status ||
            (item.status ?? "").toLowerCase().includes(status.toLowerCase());
        const matchKota = !kota || item.kota === kota;

        return matchJenjang && matchStatus && matchKota;
    });

    renderMarkers(filtered);

    if (filtered.length > 0) {
        updateSidebar(filtered[0]);
    } else {
        // Tidak ada hasil yang cocok dengan filter
        document.getElementById("schoolName").innerText = "Tidak ditemukan";
        document.getElementById("schoolLocation").innerHTML =
            '<i class="bi bi-geo-alt-fill"></i> -';
        document.getElementById("schoolAddress").innerText =
            "Coba ubah kombinasi filter.";
        document.getElementById("schoolNpsn").innerText = "-";
        document.getElementById("schoolStatus").innerText = "-";
        document.getElementById("schoolKamad").innerText = "-";
        document.getElementById("schoolKatu").innerText = "-";
    }

    // Update badge jumlah filter aktif di tombol funnel
    const activeCount = [jenjang, status, kota].filter(Boolean).length;
    const badge = document.getElementById("filterCountBadge");
    if (badge) {
        badge.textContent = activeCount;
        badge.classList.toggle("is-visible", activeCount > 0);
    }
}

filterJenjang?.addEventListener("change", applyFilters);
filterStatus?.addEventListener("change", applyFilters);
filterKota?.addEventListener("change", applyFilters);

filterResetBtn?.addEventListener("click", () => {
    filterJenjang.value = "";
    filterStatus.value = "";
    filterKota.value = "";
    applyFilters();
});