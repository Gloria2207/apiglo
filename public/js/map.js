
function initMap() {
    var pau = {lat: 43.317501, lng: -0.308964};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 18,
        center: pau
    });
    var marker = new google.maps.Marker({
        position: pau,
        map: map
    });
}
