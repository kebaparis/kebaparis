<?php

    $lat = "47.54697342707405";
    $long = "7.591985306884772";

	if ($_REQUEST["lat"])
	{
		$lat = $_REQUEST["lat"];
		$long = $_REQUEST["long"];
	}



?>

<html>
	<title>gmap test</title>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>

<script type="text/javascript" src="gmap.js"></script>
<script type="text/javascript">var mygmap = new gmap('map_canvas', <?=$lat?>, <?=$long?>);</script>


  <style type="text/css">
  
  body {
    background-color:lightgray;
    margin:0px;
    padding:0px;
  }
  
  .normalmap
  {
	position: absolute;
    width:300px;
    height:300px;
  }
  
  .fullscreenmap
  {
	top:0px;
	left:0px;
	position:absolute;
	width:100%;
	height:100%;
	z-index:2;
  }
  
  #fullscreenbutton
  {
	bottom:50px;
	left:50px;
	position:absolute;
	z-index:4;
  }
  
  
  #markerStatus
  {
	position: relative;
	z-index:3;
	width:100%;
	height:3%;
  }
  </style>


</head>
<body onload="JavaScript:mygmap.initialize();">
                <input id="fullscreenbutton" type="button" value="fullscreen" onclick="JavaScript:mygmap.makeFullscreen();">
                <div id="markerStatus" style=""></div>
                <div id="map_canvas" class="normalmap"></div>
</body>
</html>