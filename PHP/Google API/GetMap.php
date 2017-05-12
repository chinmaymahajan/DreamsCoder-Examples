<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>How to plot route between two points on google map using PHP | DreamsCoder.com</title>
    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
      function calculateRoute(from, to) {
        // Center initialized to Naples, Italy
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(42.633, -71.317),
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
    <style type="text/css">
      #map {
        width: 500px;
        height: 400px;
        margin-top: 10px;
      }
    </style>
  </head>
  <body bgcolor="gray">
<center><br>
    <h1>Check your route</h1>
    <form id="calculate-route" name="calculate-route" action="#" method="get">
      <table>
<tr><td>
	<label for="from"><font size="6"><b>Source :</font></label> </td><td>
      <input type="text" id="from" name="from" required="required" placeholder="An address" size="25" /> 
      <a id="from-link" href="#">Get my position</a></td> </tr>
<tr><td>
      <label for="to"><font size="6"><b>Destination :</label></td><td>
      <input type="text" id="to" name="to" required="required" placeholder="Another address" size="25" />
      </td> </tr>
</table>
      <br />

      <input type="submit" name="submit" value="Get Route" />
      <input type="reset" />
    </form>
<br><h3><a href="http://www.dreamscoder.com/viewprogram.php?id=106">Get a code here </a>  </h3>

    <div id="map" border></div>
    <p id="error"></p>
<a href="http://www.dreamscoder.com/index.php">DreamsCoder.com</a>
  </body>
</html>