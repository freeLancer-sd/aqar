let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: { lat: 17.524921, lng: 44.204256},
        zoom: 16,
    });
    const marker = new google.maps.Marker({
        position: { lat: 17.524921, lng: 44.204256 },
        streetViewControl: false,
        map: map,
    });
}
