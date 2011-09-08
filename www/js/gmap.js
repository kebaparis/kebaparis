//there has to be a class .normalmap and .fullscreenmap
//
//

function gmap (inputId, lat, lng) {
var mapDivId = inputId;
var map;
var marker;
var latlng = new google.maps.LatLng(lat, lng);

	this.makeFullscreen = function() {
		console.log("makeFullscreen()");
		var map = document.getElementById(mapDivId);
		
		var currentClass = map.getAttribute("class");
		//var currentClass = map.getAttribute("className");
		
		if (currentClass == "fullscreenmap") {
			map.setAttribute("class", "normalmap"); //For Most Browsers
			map.setAttribute("className", "normalmap"); //For IE; harmless to other browsers.
		}
		else {
			map.setAttribute("class", "fullscreenmap"); //For Most Browsers
			map.setAttribute("className", "fullscreenmap"); //For IE; harmless to other browsers.
		}
		
		this.resize();
	}


	this.resize = function() {
		console.log("resize()");
		google.maps.event.trigger(map, 'resize');
	}


	this.setMarker = function() {
		marker = new google.maps.Marker({
			position: latlng,
			draggable: true,
			title:"my fucking DRM!"
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

			  var city;
			  latlng = oInput;

			  geocoder = new google.maps.Geocoder();
			  geocoder.geocode({'latLng': latlng}, function(results, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						if (results[0]) {
							//console.log("count of address_components: " + results[0].address_components.length);
							for(i=0; i<results[0].address_components.length; i++) { 
								//console.log(results[0]);
								//console.log("count types (in each address_components):" + results[0].address_components[i].types.length);
								for(j=0; j<results[0].address_components[i].types.length; j++) {
									if (results[0].address_components[i].types[j] == "locality") {
										console.log("city: " + results[0].address_components[i].long_name);
										city = results[0].address_components[i].long_name;
										break;
									}
									//console.log(results[0].address_components[i].types[j]);
								}
							}
							//address = results[0].formatted_address;
						}
					}
					else {
					  city = "Geocoder failed due to: " + status;
					}
					//console.log(address);
					callback(city);

			  });
		} // end getCity()

		function callback(input) {
			document.getElementById('markerStatus').innerHTML = document.getElementById('markerStatus').innerHTML + " " + input;
		} // end callback

	} //end setMarker()

	this.initialize = function() {
		console.log("will now initialize map...");
		var myOptions = {
		  zoom: 12,
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
		console.log("map initialized");
		this.setMarker();
	}; //end initialize
} //end class