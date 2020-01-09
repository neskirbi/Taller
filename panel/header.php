<!DOCTYPE html>
<html lang="en">
<head>
	
	<?php
	$ver=0;
	echo <<<Libs
	<meta charset="UTF-8">
	<script src="js/jquery.min.js?$ver"></script>
	<link rel="stylesheet" type="text/css" href="css/styles.css?$ver"/>	
	<script src="js/funciones.js?$ver"></script>

	<script src="js/chart1.0.2.js?$ver"></script>
	<!--<script src="js/chart2.5.0.js?$ver"></script>-->
	<!--<script src="js/chart2.9.3.js?$ver"></script>-->
	
	<link href="faIcons5/css/all.css?$ver" rel="stylesheet">
	<link href="faIcons4/css/font-awesome.min.css?$ver" rel="stylesheet">
	
	
	
	<link rel="stylesheet" href="css/bootstrap.min.css?$ver">
 	<script src="js/bootstrap.min.js?$ver"></script>
  	<script src="js/poper.min.js?$ver"></script>

	<!--mapa--->
 	<!--<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css?$ver" accesskey="" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA==" crossorigin="">
  	<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js?$ver" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
  	<script src="https://domoritz.github.io/leaflet-locatecontrol/dist/L.Control.Locate.min.js?$ver"></script>
-->


  	
Libs;
  	?>
  	

</head>
<body>
	<?php
	if(isset($_SESSION['nombre'])){
		$user=base64_decode($_SESSION['nombre']);
		$foto=base64_decode($_SESSION['foto']);
		$ref=base64_decode($_SESSION['ref']);
	}else{
		$user="No user";
		$foto="No session";
	}
	
	?>
	
</body>
</html>