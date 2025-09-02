@extends('layouts.master')

@section('page_title', 'Laguna Water Usage Map')

@section('content')

<link
  rel="stylesheet"
  href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

<style>
  #map {
    height: 100vh;
    width: 100%;
  }
</style>

<div class="card">
  <div id="map"></div>
</div>

<script>
  // Initialize map centered on Laguna Province
  const map = L.map('map').setView([14.23, 121.36], 10);

  // Base map layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  // Example municipalities in Laguna with simulated water usage
const municipalities = [
  // Cities
  { name: "Calamba City", coords: [14.2116, 121.1650], usage: 3500 },
  { name: "Sta. Rosa City", coords: [14.3120, 121.1111], usage: 2400 },
  { name: "San Pablo City", coords: [14.0690, 121.3259], usage: 1800 },
  { name: "Biñan City", coords: [14.3341, 121.0823], usage: 2200 },
  { name: "Cabuyao City", coords: [14.2766, 121.1254], usage: 2600 },
  { name: "San Pedro City", coords: [14.3595, 121.0470], usage: 2100 },

  // Municipalities
  { name: "Alaminos", coords: [14.0630, 121.2487], usage: 950 },
  { name: "Bay", coords: [14.1836, 121.2836], usage: 1100 },
  { name: "Cavinti", coords: [14.2464, 121.4994], usage: 870 },
  { name: "Famy", coords: [14.4561, 121.4483], usage: 720 },
  { name: "Kalayaan", coords: [14.3500, 121.5667], usage: 600 },
  { name: "Liliw", coords: [14.1333, 121.4333], usage: 800 },
  { name: "Los Baños", coords: [14.1700, 121.2410], usage: 900 },
  { name: "Luisiana", coords: [14.1833, 121.5000], usage: 780 },
  { name: "Lumban", coords: [14.2833, 121.4667], usage: 950 },
  { name: "Mabitac", coords: [14.4667, 121.4333], usage: 650 },
  { name: "Magdalena", coords: [14.2000, 121.4167], usage: 720 },
  { name: "Majayjay", coords: [14.1500, 121.4833], usage: 830 },
  { name: "Nagcarlan", coords: [14.1333, 121.4167], usage: 1200 },
  { name: "Paete", coords: [14.3667, 121.4833], usage: 740 },
  { name: "Pagsanjan", coords: [14.2733, 121.4567], usage: 990 },
  { name: "Pakil", coords: [14.3833, 121.4667], usage: 670 },
  { name: "Pangil", coords: [14.3833, 121.4667], usage: 710 },
  { name: "Pila", coords: [14.2336, 121.3647], usage: 1200 },
  { name: "Rizal", coords: [14.1061, 121.3969], usage: 550 },
  { name: "San Antonio", coords: [14.1031, 121.3075], usage: 620 },
  { name: "Siniloan", coords: [14.4233, 121.4667], usage: 1050 },
  { name: "Sta. Cruz", coords: [14.2786, 121.4156], usage: 2000 },
  { name: "Sta. Maria", coords: [14.4869, 121.4219], usage: 580 },
  { name: "Victoria", coords: [14.2333, 121.3333], usage: 890 }
];


  // Function to get color based on usage
  function getColor(usage) {
    return usage > 3000 ? "red" :
           usage > 2000 ? "orange" :
           usage > 1000 ? "green" : "blue";
  }

  // Add circle markers for each municipality
  municipalities.forEach(m => {
    const circle = L.circleMarker(m.coords, {
      radius: Math.sqrt(m.usage) / 5, // size relative to usage
      fillColor: getColor(m.usage),
      color: "#333",
      weight: 1,
      fillOpacity: 0.7
    }).addTo(map);

    circle.bindPopup(`<strong>${m.name}</strong><br/>Water Usage: ${m.usage} m³`);
  });

</script>

@endsection
