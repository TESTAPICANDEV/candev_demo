<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

  <body>
    <div id="map"></div>
    <script>
      // Note: This example requires that you consent to location sharing when
      // prompted by your browser. If you see the error "The Geolocation service
      // failed.", it means you probably did not give permission for the browser to
      // locate you.

      function initMap() {
        const gareLocation = {
          lat: <?php echo $_GET['Lat']; ?>,
          lng: <?php echo $_GET['Long']; ?>
        }

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -34.397, lng: 150.644},
          zoom: 14
        });

        var gareDesc = `
          <h1><?php echo $_GET['LibGare']; ?></h1>
          <p>Description de la gare avec qqs détails.</p>
        `;

        var infowindow = new google.maps.InfoWindow({
          content: gareDesc
        });

        let gareMarker = new google.maps.Marker({
          position: gareLocation,
          map: map
        });
        gareMarker.addListener('click', function() {
          infowindow.open(map, gareMarker);
        });

        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var myPosition = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(myPosition);
            infoWindow.setContent('Votre position');

            let curMarker = new google.maps.Marker({
              position: myPosition,
              map: map,
              title: 'Votre position'
            });

            map.setCenter(myPosition);

            var selectedMode = 'DRIVING';

            var directionsDisplay;
            var directionsService = new google.maps.DirectionsService();

            directionsDisplay = new google.maps.DirectionsRenderer();
            directionsDisplay.setMap(map);
            
            var haight = new google.maps.LatLng(gareLocation.lat, gareLocation.lng);
            var oceanBeach = new google.maps.LatLng(myPosition.lat, myPosition.lng);

            var request = {
              origin: haight,
              destination: oceanBeach,
              travelMode: google.maps.TravelMode[selectedMode]
            };
            directionsService.route(request, function(response, status) {
              alert(response.routes[0].legs[0].duration.text)
              if (status == 'OK') {
                directionsDisplay.setDirections(response);
              }
            });
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCW-_FYsWbjc9EDLNLPJpkjA7BgA4HAuUg&callback=initMap">
    </script>
  </body>
</html>
