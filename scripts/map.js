// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var interval = null;
var map;
var markers = [];
var updateInterval = INTERVAL; // Cf ../config.js

function initialize() {
  var mapOptions = {
    zoom: ZOOM_MAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
	  
	  var transitLayer = new google.maps.TransitLayer();
		transitLayer.setMap(map);
		

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      /*var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Vous êtes ici.'
      });*/

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
  
  
}


google.maps.event.addDomListener(window, 'load', initialize);

// Add a marker to the map and push to the array.
//IN : 
//location is lat/long by new google.maps.LatLng(lat, lng)
// numBus is numero of Bus, assigned to marker
function addMarker(location, numBus) {
	
	var infowindow = new google.maps.InfoWindow({
        content: 'Bus ' + numBus
      });
	  
  var marker = new google.maps.Marker({
    position: location,
    map: map,
	animation: google.maps.Animation.DROP,
	icon: "images/bus.png"
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
  google.maps.event.addListener(marker, 'click', toggleBounce);
  markers[numBus] = (marker);
  
  function toggleBounce() {

	if (marker.getAnimation() != null) {
		marker.setAnimation(null);
	} else {
    marker.setAnimation(google.maps.Animation.BOUNCE);
	}
	}
}
// Sets the map on all markers in the array.
function delMarker(i) {
	if(markers[i] != null) {
		markers[i].setMap(null);
	}
    
}
//Update Data
var updateMap = function () {

				 $.ajax({
					method : 'POST',
					url : 'Position_ajax.php', // La ressource ciblée
					data: { numero_bus : ID_BUS },
					dataType: "json"
				})
				.done(function( pos ) {
					for(i=0 ; i<pos.length ; i++) {
					lat = pos[i]["latitude"];
					lng = pos[i]["longitude"];
					idBus = pos[i]["idBus"];
					delMarker(idBus);
					addMarker(new google.maps.LatLng(lat, lng),idBus);		
					}
				})
				.fail(function(jqXHR, textStatus) {
					console.log(textStatus);
				});;
};
$(document).ready(function() {

updateMap();
interval = setInterval(function(){updateMap()}, updateInterval);
});