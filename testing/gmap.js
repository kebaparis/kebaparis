function gmap () {
var map;

this.resize = function() {
	console.log("resize function");
	google.maps.event.trigger(map, 'resize');
}



	this.initialize = function() {
		console.log("will now initialize map...");
		var latlng = new google.maps.LatLng(47.54697342707405, 7.591985306884772);
		var myOptions = {
		  zoom: 18,
		  center: latlng,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var mapDiv = document.getElementById("map");
		map = new google.maps.Map(mapDiv, myOptions);
		
																					/*
																					google.maps.event.addDomListener(mapDiv, 'resize', function() {
																						console.log("DOM new size detected.");
																						//google.maps.event.trigger(map, 'resize');
																					});
																					
																					
																					
																					google.maps.event.addListener(mapDiv, "resize", function() {
																						console.log("new size detected.");
																						//google.maps.event.trigger(map, 'resize');
																					});
																					
																					
																					
																					google.maps.event.addDomListener(mapDiv, 'dbclick', function() {
																						console.log("dobble click detected");
																					});*/
					var marker = new google.maps.Marker({
				   
								   position: latlng,
								   draggable: true,
								   title:"my fucking Dürüm!"
					});
	 
					marker.setMap(map);
				   
					google.maps.event.addListener(marker, "dragstart", function() {
								   updateMarkerStatus("dragging...");
					});
	 
					google.maps.event.addListener(marker, "dragend", function() {
						var newPosition = marker.getPosition();
						var Location = getCity(newPosition);
						updateMarkerStatus(newPosition);
					});
				   
	 
				   
					function updateMarkerStatus(str) {
								   document.getElementById('markerStatus').innerHTML = str;
					}
					
					function getCity(oInput) {

								  var address;
								  latlng = oInput;

								  geocoder = new google.maps.Geocoder();
								  geocoder.geocode({'latLng': latlng}, function(results, status) {
										if (status == google.maps.GeocoderStatus.OK) {
											if (results[1]) {
												//alert("got answer..");
												address = results[0].formatted_address;
											}
										}
										else {
										  address = "Geocoder failed due to: " + status;
										}
										//alert("1 " + address);
										callback(address);

								  });
								  
								  function callback(input) {
									document.getElementById('markerStatus').innerHTML = document.getElementById('markerStatus').innerHTML + address;
									//alert("2 " + input);
								  } // end callback

								 
					} // end getCity()
	console.log("map initialized");
	}; //end initialize
}

gmap.prototype.map = "";