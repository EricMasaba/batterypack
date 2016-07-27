<?php
  require_once ("__appconfig.php");
  require_once("class.core.php");
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Listening to DOM events</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>
      <?php googleAnalytics(GOOGLE_TRACKING_ID); ?>
      <?php pcaPredict(PCAPREDICT_KEY); ?>
  </head>
  <body>
    <div id="map"></div>
    <div id="capture"></div>
    <script>
      function initMap() {
        var mapDiv = document.getElementById('map');
        var map = new google.maps.Map(mapDiv, {
          zoom: 8,
          center: new google.maps.LatLng(-34.397, 150.644)
        });

        // We add a DOM event here to show an alert if the DIV containing the
        // map is clicked.
        google.maps.event.addDomListener(mapDiv, 'click', function() {
          window.alert('Map was clicked!');
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
    </script>
  </body>
</html>