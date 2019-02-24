<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title> Route Google Maps API</title>

    <?php include "links/header.php"?>
    
     <script src="http://maps.google.com/maps/api/js?sensor=true&key=AIzaSyAhCyGB5aaSqMXA1NeKYJOHaezo2jbf49U"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
      function calculateRoute(from, to) {
        // Center initialized to Naples, Italy
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(13.136709, 80.190892),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: from,
          destination: to,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route<br />");
          }
        );
      }
      $(document).ready(function() {
        // If the browser supports the Geolocation API
        if (typeof navigator.geolocation == "undefined") {
          $("#error").text("Your browser doesn't support the Geolocation API");
          return;
        }
        $("#from-link, #to-link").click(function(event) {
          event.preventDefault();
          var addressId = this.id.substring(0, this.id.indexOf("-"));
          navigator.geolocation.getCurrentPosition(function(position) {
            var geocoder = new google.maps.Geocoder();
            geocoder.geocode({
              "location": new google.maps.LatLng(position.coords.latitude, position.coords.longitude)
            },
            function(results, status) {
              if (status == google.maps.GeocoderStatus.OK)
                $("#" + addressId).val(results[0].formatted_address);
              else
                $("#error").append("Unable to retrieve your address<br />");
            });
            
          },
          function(positionError){
            $("#error").append("Error: " + positionError.message + "<br />");
          },
          {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          });
        });
        $("#calculate-route").submit(function(event) {
          event.preventDefault();
          calculateRoute($("#from").val(), $("#to").val());
        });
      });
    </script>
    <CENTER><style type="text/css">
    body
    {
    	
    	color: white;
    }
      #map {
        width: 700px;
        height: 700px;
        margin-top: 10px;
      }
.form-control,.input-lg{

  width: 20%;
}
input[type=submit] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  
  border-radius: 10px;
  background-color: #43db8d;
}


input[type=reset] {
  width: 20%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 2px solid gold;
  border-radius: 5px;
  background-color: red;
  c
}
    </style></CENTER>
  </head>
  <body>
    <?php include "links/nav.php" ?>
    <center>
    <h1>Calculate your route</h1>
    <form id="calculate-route" name="calculate-route" action="#" method="get">
      <label for="from">From:</label>
      <input class="form-control input-lg" type="text" id="from" name="from" required="required" placeholder="An address" size="30" />
      
      <br />

      <label for="to">To:</label>
      <input class="form-control input-lg" type="text" id="to" name="to" required="required" placeholder="Another address" size="30" />
      

      <input type="submit" class="submit" />
      <input type="reset" />
    </form>
    <div id="map"></div>
    <p id="error"></p></center>

    <?php include "links/footer.php" ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>
</html>