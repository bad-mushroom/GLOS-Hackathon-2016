<!DOCTYPE html>
<html>
	<head>
		<title>Buoys</title>
		<meta name="viewport" content="initial-scale=1.0">
		<meta charset="utf-8">
		<style>
			html, body {
				height: 100%;
				margin: 0;
				padding: 0;
			}
			#map_canvas {
				height: 100%;
			}
		</style>
	</head>
	<body>
		<div id="map_canvas"></div>
		<script src="/assets/js/jquery-build.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyDvRbr2FOe5GOlzSpyk9phv2sa2ZhoWMzE&callback=mapInit" async defer></script>

		<script>
		function mapInit() {

			var mapOptions = {
				zoom: 7,
				center: new google.maps.LatLng(42.2808, -83.7430),
			};

			var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

			$.getJSON( "/dev/buoys", function(  ) {
			})
			.done(function(data) {
				$.each(data, function( key, buoy ) {
					var infowindow = new google.maps.InfoWindow({
						content: '<div id="content"><div id="siteNotice"></div><h1>' + buoy.longName + '</h1><ul><li>BuoyID: ' + buoy.buoyId + '</li><li>Last Updated: ' + buoy.lastDataUpdate + '</li></ul></div>'
					});
					var points = buoy.location.split(',');

					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(points[1], points[0]),
						map: map,
						title: buoy.longName
					});
					marker.addListener('click', function() {
						infowindow.open(map, marker);
					});

					marker.setMap(map);
				});
			});
		}
		</script>
	</body>
</html>
