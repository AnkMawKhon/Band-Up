var map;var lat;var lng;
function initMap() {
if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function(position) {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {
        lat: position.coords.latitude,
        lng: position.coords.longitude},
    zoom: 12
  });
  lat = position.coords.latitude;
  lng = position.coords.longitude;
  console.log(lat);
  console.log(lng);
  document.getElementById('lat').value = lat;
  document.getElementById('lng').value = lng;
  var pos = {
    lat: position.coords.latitude,
    lng: position.coords.longitude
  };

  var marker = new google.maps.Marker({
      position: {
        lat: position.coords.latitude, lng: position.coords.longitude,
      },
      map: map,
      draggable: true
    });
    marker.addListener('dragend', e => {

  lat = marker.getPosition().lat();
  lng = marker.getPosition().lng();
  
  console.log(lat);
  console.log(lng);
  document.getElementById('lat').value = lat;
  document.getElementById('lng').value = lng;
  });

  map.setCenter(pos);
}, function() {
  handleLocationError(true, infoWindow, map.getCenter());
});
} else {
// Browser doesn't support Geolocation
handleLocationError(false, infoWindow, map.getCenter());
}
}




// Start of Users Locations
function initEvent() {
  infoWindow = new google.maps.InfoWindow;

  // Try HTML5 geolocation.
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      map = new google.maps.Map(document.getElementById('map'), {
        center: {
            lat: position.coords.latitude,
            lng: position.coords.longitude},
        zoom: 12
      });

      var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };

      var marker = new google.maps.Marker({
          position: {
            lat: event.lat, lng: event.lng,
          },
          map: map,
        });

      

      var circle = new google.maps.Circle({
        map: map,
        radius: 6437.38,    // 4 miles in meters
        fillColor: '#86b3db',
        strokeColor: '#4d93d1',
        strokeOpacity: 0.2,
      });

      map.setCenter(pos);
      circle.bindTo('center', marker, 'position');
    }, function() {
      handleLocationError(true, infoWindow, map.getCenter());
    });
  } else {
    // Browser doesn't support Geolocation
    handleLocationError(false, infoWindow, map.getCenter());
  }
}

function handleLocationError(browserHasGeolocation, infoWindow, pos) {
  infoWindow.setPosition(pos);
  infoWindow.setContent(browserHasGeolocation ?
                        'Error: The Geolocation service failed.' :
                        'Error: Your browser doesn\'t support geolocation.');
  infoWindow.open(map);
}
// End of Users Locations
