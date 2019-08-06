<!DOCTYPE html>
<html>
<head>
    <style>
        /* Set the size of the div element that contains the map */
        #map {
            height: 400px;  /* The height is 400 pixels */
            width: 100%;  /* The width is the width of the web page */
        }
    </style>
</head>
<body>
<h3>My Google Maps Demo</h3>
<!--The div element for the map -->
<div id="map"></div>
<script>
    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var uluru = {lat: 14.985620, lng: 103.115774};
        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('map'), {zoom: 15, center: uluru});
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: uluru, map: map});
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCnCLkt5PVSwFWs-zWuoEQLav-wzeEs2L8&callback=initMap"
        async defer></script>
</body>
</html>
