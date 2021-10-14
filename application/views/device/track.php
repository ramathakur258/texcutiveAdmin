
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center mb-3 ">
    <h1 class="h4">Track</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        
        <a href="" class="btn btn-sm btn-secondary ml-2">Refresh</a>
       
    </div>
</div>
<?php  echo $this->session->flashdata('message'); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">

                    <div id="map" style="height:500px;"></div>
               
            </div>
        </div>
    </div>
</div>

<script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAHc_DsweA9F0GG1A724BSOJgtV9BcWK3o&callback=initMap&libraries=&v=weekly"
      defer
    >
</script>
<script>
    function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 24,
    center: { lat: <?php echo $device->latitude; ?>, lng: <?php echo $device->longitude; ?> }
  });
  const geocoder = new google.maps.Geocoder();
  const infowindow = new google.maps.InfoWindow();
 
 
  geocodeLatLng(geocoder, map, infowindow);

}

function geocodeLatLng(geocoder, map, infowindow) {
 
  const latlng = { lat: <?php echo $device->latitude; ?>, lng: <?php echo $device->longitude; ?> };
  geocoder.geocode({ location: latlng }, (results, status) => {
    if (status === "OK") {
      if (results[0]) {
        map.setZoom(16);
        const marker = new google.maps.Marker({
          position: latlng,
          map: map
        });
        infowindow.setContent(results[0].formatted_address);
        infowindow.open(map, marker);
      } else {
        window.alert("No results found");
      }
    } else {
      window.alert("Geocoder failed due to: " + status);
    }
  });
}
</script>