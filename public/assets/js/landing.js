// =============================================
// ANIMATED COUNTER
// =============================================
function animateCounter(id, end) {
  let current = 0;
  const element = document.getElementById(id);

  const increment = end / 50;

  const timer = setInterval(() => {
    current += increment;

    if (current >= end) {
      current = end;
      clearInterval(timer);
    }

    element.innerText = Math.floor(current);
  }, 30);
}

animateCounter('totalMadrasah', 312);

// =============================================
// MAP INITIALIZATION
// =============================================
const map = L.map('map', {
  zoomControl: false,
  attributionControl: false
}).setView([-6.2088, 106.8456], 11);

// =============================================
// TILE LAYER
// =============================================
L.tileLayer(
  'https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png',
  {
    subdomains: 'abcd',
    maxZoom: 20
  }
).addTo(map);

// =============================================
// CUSTOM ZOOM CONTROL
// =============================================
L.control.zoom({
  position: 'bottomright'
}).addTo(map);

// =============================================
// MADRASAH DATA
// =============================================
let madrasahData = [];
const markers = [];

const markerCluster = L.markerClusterGroup({
  chunkedLoading: true,
  spiderfyOnMaxZoom: true,
  showCoverageOnHover: false,
  zoomToBoundsOnClick: true
});

function renderMarkers() {

  markerCluster.clearLayers();

  madrasahData.forEach(item => {

    const color = getJenjangColor(item.jenjang);

    const marker = L.marker([
      parseFloat(item.latitude),
      parseFloat(item.longitude)
    ], {
      icon: createIcon(color)
    });

    marker.bindPopup(`
      <div>
        <strong>${item.nama_madrasah}</strong><br/>
        <small>${item.jenjang} - ${item.kota}</small>
      </div>
    `);

    marker.on('click', () => {

      updateSidebar(item);

      map.flyTo([
        parseFloat(item.latitude),
        parseFloat(item.longitude)
      ], 13, {
        duration: 1.5
      });

    });

    markerCluster.addLayer(marker);

    markers.push({
      marker,
      data: item
    });

  });

  if (!map.hasLayer(markerCluster)) {
    map.addLayer(markerCluster);
  }
}

async function loadMadrasahData() {

  try {

    const response = await fetch('/data/madrasah.json');

    madrasahData = await response.json();

    renderMarkers();

    if (madrasahData.length > 0) {
      updateSidebar(madrasahData[0]);
    }

  } catch (error) {

    console.error('Gagal load data madrasah:', error);

  }
}

loadMadrasahData();

function getJenjangColor(jenjang) {
  switch (jenjang) {
    case 'MA':
      return '#3b82f6'; // hijau
    case 'MI':
      return '#f59e0b'; // gold
    case 'MTs':
      return '#10b981'; // biru
    default:
      return '#64748b';
  }
}

// =============================================
// CUSTOM ICON
// =============================================
function createIcon(color) {
  return L.divIcon({
    className: '',
    html: `<div style="
      width:14px;
      height:14px;
      background:${color};
      border-radius:50%;
      border:3px solid white;
      box-shadow:0 0 0 4px rgba(0,0,0,0.05);
    "></div>`,
    iconSize: [20, 20]
  });
}

// =============================================
// UPDATE SIDEBAR
// =============================================
function updateSidebar(data) {

  // NAMA MADRASAH
  document.getElementById('schoolName').innerText =
    data.nama_madrasah;

  // KOTA
  document.getElementById('schoolLocation').innerHTML = `
      <i class="bi bi-geo-alt-fill"></i>
      ${data.kota}
  `;

  // ALAMAT
  document.getElementById('schoolAddress').innerText =
    `${data.kecamatan}, ${data.kelurahan}`;

  // NPSN
  document.getElementById('schoolNpsn').innerText =
    data.npsn ?? '-';

  // STATUS
  document.getElementById('schoolStatus').innerText =
    data.status ?? '-';

  // KEPALA MADRASAH
  document.getElementById('schoolKamad').innerText =
    data.kamad ?? '-';

  // KATU
  document.getElementById('schoolKatu').innerText =
    data.katu ?? '-';
}
// =============================================
// GEOJSON DKI JAKARTA
// =============================================
fetch('geojson/dki-jakarta.json')
  .then(response => response.json())
  .then(data => {

    const geoLayer = L.geoJSON(data, {

      style: {
        color: '#ffffff',
        weight: 2,
        fillColor: '#10b981',
        fillOpacity: 0.25
      },

      onEachFeature: function (feature, layer) {

        layer.on({
          mouseover: function (e) {
            e.target.setStyle({
              fillOpacity: 0.5,
              fillColor: '#f59e0b'
            });
          },

          mouseout: function (e) {
            geoLayer.resetStyle(e.target);
          }
        });

        if (feature.properties) {
          layer.bindTooltip(feature.properties.name || 'Wilayah DKI Jakarta');
        }
      }
    }).addTo(map);

    map.fitBounds(geoLayer.getBounds());
  })
  .catch(error => {
    console.error('GeoJSON gagal dimuat:', error);
  });

// =============================================
// SEARCH MADRASAH
// =============================================
const searchInput = document.getElementById('searchSchool');

searchInput.addEventListener('keyup', function () {

  const keyword = this.value.toLowerCase();

  const found = markers.find(item =>
    item.data.nama_madrasah.toLowerCase().includes(keyword)
  );

  if (found) {

    updateSidebar(found.data);

    map.flyTo([
      parseFloat(found.data.latitude),
      parseFloat(found.data.longitude)
    ], 13, {
      duration: 1.5
    });

    found.marker.openPopup();
  }

});

// =============================================
// CHART.JS
// =============================================
const ctx = document.getElementById('achievementChart');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Akademik', 'Non Akademik', 'Tahfidz'],
    datasets: [{
      label: 'Prestasi',
      data: [92, 84, 95],
      borderRadius: 12,
      backgroundColor: [
        '#10b981',
        '#f59e0b',
        '#0f172a'
      ]
    }]
  },

  options: {
    responsive: true,
    plugins: {
      legend: {
        display: false
      }
    },

    scales: {
      y: {
        beginAtZero: true,
        max: 100,
        grid: {
          color: 'rgba(0,0,0,0.05)'
        }
      },

      x: {
        grid: {
          display: false
        }
      }
    }
  }
});


// RESET MAP BUTTON
// RESET MAP BUTTON (PREMIUM VERSION)
const resetControl = L.control({ position: "topright" });

resetControl.onAdd = function () {
  const div = L.DomUtil.create("div", "custom-reset-btn");

  div.innerHTML = `<i class="bi bi-arrow-counterclockwise"></i>`;

  div.onclick = () => {

    map.flyTo([-6.2088, 106.8456], 11, {
      duration: 1.2
    });

    updateSidebar(madrasahData[0]);
  };

  return div;
};

resetControl.addTo(map);