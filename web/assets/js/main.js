function load_map() {
    var officePos = new google.maps.LatLng(60.18577171428199,10.253432506607055);
    var map = new google.maps.Map(document.getElementById("map"),{
        center: officePos,
        zoom: 14,
        streetViewControl: false,
        scrollwheel: false,
        mapTypeId: google.maps.MapTypeId.HYBRID});

    var marker = new google.maps.Marker({
        position: officePos,
        map: map,
        title: 'Gran'
    });
}

$(document).ready(function () {
    load_map();
});