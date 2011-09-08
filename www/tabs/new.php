<?php

    $lat = "47.54697342707405";
    $long = "7.591985306884772";

?>

<!-- <script type="text/javascript">var mygmap = new gmap('map_canvas', <?=$lat?>, <?=$long?>);</script> -->
<script type="text/javascript">var mygmap = new gmap('map_canvas', 47.54697342707405, 7.591985306884772);</script>

<table>

			<tr>
				<td rowspan="3">
                      <div id="map_canvas" class="normalmap"></div>
                      <input id="fullscreenbutton" type="button" value="fullscreen" onclick="JavaScript:mygmap.makeFullscreen();">
                      <div id="markerStatus" style=""></div>
				</td>
				<td colspan="3" id="ort"><h1>Seeperle<h1></td>
			</tr>

			<tr>
				<td id="ort" colspan="3">Stäfa</td>
			</tr>

			<tr id="buttons">
				<td> <a href"#"> <a href=""> rate </a> </td>
				<td> <a href"#"> <a href=""> Edit </a> </td>
				<td> <a href"#"> <a href=""> New  </a> </td>
			</tr>

</table>