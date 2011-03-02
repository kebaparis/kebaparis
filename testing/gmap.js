function gmap (inputId) {
var mapDivId = inputId;
var map;

	this.makeFullscreen = function() {
		console.log("makeFullscreen()");
		var map = document.getElementById(mapDivId);
		
		var currentClass = map.getAttribute("class");
		//var currentClass = map.getAttribute("className");
		
		if (currentClass == "normalmap") {
			map.setAttribute("class", "fullscreenmap"); //For Most Browsers
			map.setAttribute("className", "fullscreenmap"); //For IE; harmless to other browsers.
		}
		else {
			map.setAttribute("class", "normalmap"); //For Most Browsers
			map.setAttribute("className", "normalmap"); //For IE; harmless to other browsers.
		}
		
		this.resize();
	}


	this.resize = function() {
		console.log("resize()");
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
		mapDiv = document.getElementById(mapDivId);
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
					console.log("set marker");
					marker.setMap(map);
				   
					google.maps.event.addListener(marker, "dragstart", function() {
						console.log("dragging...");
						updateMarkerStatus("dragging...");
					});
	 
					google.maps.event.addListener(marker, "dragend", function() {
						var newPosition = marker.getPosition();
						var Location = getCity(newPosition);
						//console.log("draggend: " . newPosition);
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
											if (results[0]) {
												for(i=0; i<50; i++) { 
													//console.log(results[i]); 
													console.log(results[0].address_components[1].long_name);
												}
												address = results[0].formatted_address;
											}
										}
										else {
										  address = "Geocoder failed due to: " + status;
										}
										console.log(address);
										callback(address);

								  });
								  
								  function callback(input) {
									document.getElementById('markerStatus').innerHTML = document.getElementById('markerStatus').innerHTML + address;
								  } // end callback

								 
					} // end getCity()
	console.log("map initialized");
	}; //end initialize
}