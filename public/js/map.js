function initMap() {
    const geocoder = new google.maps.Geocoder();
    const address = document.getElementById('annonceAdresse').innerText;

    geocoder.geocode({ 'address': address }, function(results, status) {
        if (status === 'OK') {
            const map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: results[0].geometry.location
            });
            new google.maps.Marker({
                position: results[0].geometry.location,
                map: map,
                title: address
            });
        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}
