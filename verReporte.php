<?
	include "lib/clases.php";
	
	$reporte=new Reporte($_GET['reporte']);
	
?>

<!DOCTYPE html>
<html> 
<head> 

  <script type="text/javascript">
    var locations = [
      ['Inicio / Velocidad 112 km/h', 10.178387,-64.67961, 1],
      ['22-07-2013 12:15:08 <br> Velocidad 112 km/h', 10.17864,-64.677979, 2],
      ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.179823,-64.67519, 3],
      ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.18033,-64.673602, 4],
      ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.180583,-64.671971, 5],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181217,-64.668709, 6],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181344,-64.667679, 7],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181555,-64.665963, 8],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181597,-64.664504, 9],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181597,-64.661757, 10],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181555,-64.661972, 11],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181682,-64.6615, 12],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.181893,-64.65901, 13],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.182231,-64.656178, 14],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.182273,-64.653431, 15],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.182906,-64.651372, 16],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.182906,-64.649269, 17],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.184089,-64.646007, 18],
	  ['22-07-2013 12:15:08 / Velocidad 112 km/h', 10.186497,-64.643303, 19],
	  ['Fin / Velocidad 112 km/h', 10.188102,-64.642231, 20]
    ];

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: new google.maps.LatLng(10.181597,-64.661757),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][1], locations[i][2]),
        map: map,
		title: locations[i][0]
      });

      google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>



  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 500px; height: 500px; "></div>

</body>
</html>