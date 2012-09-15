<script src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
<script>
  function initialize() {
    var location = new google.maps.LatLng(<?=$node->location->lat?>, <?=$node->location->lng?>);
    var center = new google.maps.LatLng(<?=$node->location->lat?> +0.008, <?=$node->location->lng?>);
    
    var title =  '<?=$node->title?>';
    var mapOptions = {
      zoom: 14,
      center: center,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
    var marker = new google.maps.Marker({
        position: location,
        map: map,
        title: title
    });
    
    var infowindow = new google.maps.InfoWindow({maxWidth: 50, content: title, disableAutoPan: true});
    infowindow.open(map, marker);    
    
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div class="location">
  <h2>Para que vayas</h2>
  <p>
    <span><?=$node->location->address?></span>
    <span><?=$node->location->crossStreet?></span>
  </p>
  <div id="map_canvas"></div>
</div>