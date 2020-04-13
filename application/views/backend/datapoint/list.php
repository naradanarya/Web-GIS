<div id="map" style="height: 500px"></div>

<script type="text/javascript">

var map = L.map('map').setView([-6.1779987, 106.8272603], 7);
var base_url ="<?=base_url() ?>"


L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox/streets-v11',
}).addTo(map);

$.getJSON(base_url+"backend/datapoint/tampil_json", function(data){
    $.each(data, function(i, field){

        var v_lat=parseFloat (data[i].latitude);
        var v_long=parseFloat (data[i].longitude);

        var icon_spbu = L.icon({
                iconUrl: base_url+'assets/image/spbu.png',
                iconSize: [30,30]
        });

     L.marker([v_lat, v_long],{icon:icon_spbu}).addTo(map)
    .bindPopup(data[i].nama_spbu)
    .openPopup();
    });
  });


 </script>