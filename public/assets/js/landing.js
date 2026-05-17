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
const madrasahData = [
  {
    name: 'MAN 1 Jakarta',
    jenjang: 'MAN',
    location: 'Jakarta Pusat',
    lat: -6.1864,
    lng: 106.8342
  },
  {
    name: 'MAN 2 Jakarta',
    jenjang: 'MAN',
    location: 'Jakarta Utara',
    lat: -6.1382,
    lng: 106.8631
  },
  {
    name: 'MIN 21 Jakarta',
    jenjang: 'MIN',
    location: 'Jakarta Timur',
    lat: -6.2253,
    lng: 106.9004
  },
  {
    name: 'MIN 22 Jakarta',
    jenjang: 'MIN',
    location: 'Jakarta Barat',
    lat: -6.1683,
    lng: 106.7588
  },
  {
    name: 'MTsN 23 Jakarta',
    jenjang: 'MTsN',
    location: 'Jakarta Selatan',
    lat: -6.2615,
    lng: 106.8106
  },
  {
    name: 'MTsN 13 Jakarta',
    jenjang: 'MTsN',
    location: 'Jakarta Timur',
    lat: -6.2100,
    lng: 106.8456
  }
];

function getJenjangColor(jenjang) {
  switch (jenjang) {
    case 'MAN':
      return '#10b981'; // hijau
    case 'MIN':
      return '#f59e0b'; // gold
    case 'MTsN':
      return '#3b82f6'; // biru
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

  document.getElementById('schoolName').innerText = data.name;
  document.getElementById('schoolLocation').innerHTML = `
        <i class="bi bi-geo-alt-fill"></i>
        ${data.location}
    `;

  document.getElementById('prestasiTotal').innerText = data.prestasi;
  document.getElementById('prestasiUnggulan').innerText = data.unggulan;
  document.getElementById('siswaPrestasi').innerText = data.siswa;
  document.getElementById('capaianRata').innerText = data.capaian;
}

// =============================================
// MARKERS
// =============================================
madrasahData.forEach(item => {

  const color = getJenjangColor(item.jenjang);

  const marker = L.marker([item.lat, item.lng], {
    icon: createIcon(color)
  }).addTo(map);

  marker.bindPopup(`
    <div>
      <strong>${item.name}</strong><br/>
      <small>${item.jenjang} - ${item.location}</small>
    </div>
  `);

  marker.on('click', () => {
    updateSidebar(item);
    map.flyTo([item.lat, item.lng], 13, { duration: 1.5 });
  });

});

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

  const found = madrasahData.find(item =>
    item.name.toLowerCase().includes(keyword)
  );

  if (found) {
    updateSidebar(found);

    map.flyTo([found.lat, found.lng], 13, {
      duration: 1.5
    });
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
  };

  return div;
};

resetControl.addTo(map);