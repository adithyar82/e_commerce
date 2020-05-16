<html lang="en">
  <head>
  <style>
  html {
    font-family: sans-serif;
    line-height: 1.15;
    height: 100%;
}

body {
    margin: 0;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #1a1a1a;
    text-align: left;
    height: 100%;
    background-color: #fff;
}

.container {
    display: flex;
    flex-direction: column;
    height: 100%;
}
.map {
    flex: 1;
    background: #f0f0f0;
}
</style>
<script>
function init() {
  const initialPosition = { lat: 59.325, lng: 18.069 };

  const map = new google.maps.Map(document.getElementById('map'), {
    center: initialPosition,
    zoom: 15
  });

  const marker = new google.maps.Marker({ map, position: initialPosition });

  // Get user's location
  if ('geolocation' in navigator) {
    navigator.geolocation.getCurrentPosition(
      position => {
        console.log(`Lat: ${position.coords.latitude} Lng: ${position.coords.longitude}`);

        // Set marker's position.
        marker.setPosition({
          lat: position.coords.latitude,
          lng: position.coords.longitude
        });
// Center map to user's position.
map.panTo({
          lat: position.coords.latitude,
          lng: position.coords.longitude
        });
      },
      err => alert(`Error (${err.code}): ${getPositionErrorMessage(err.code)}`)
    );
  } else {
    alert('Geolocation is not supported by your browser.');
  }
}
</script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>🌏 Google Maps Geolocation Example</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <main class="container">
      <div id="map" class="map"></div>
    </main>

    <script src="script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBx64AAWQlKdzkzFG4qgpOQt4aMOlu7m-I&callback=init"></script>
  </body>
</html>
