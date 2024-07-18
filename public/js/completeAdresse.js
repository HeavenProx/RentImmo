function initMap() {
        // Initialize the Google Places Autocomplete
        const addressInput = document.getElementById('adresse');
        const autocomplete = new google.maps.places.Autocomplete(addressInput);
        autocomplete.setFields(['formatted_address', 'geometry']);

        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();
            if (place.geometry) {
                const location = place.geometry.location;
                const map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 15,
                    center: location
                });
                new google.maps.Marker({
                    position: location,
                    map: map,
                    title: place.formatted_address
                });
                document.getElementById('annonceAdresse').innerText = place.formatted_address;
            }
        });
    }
document.addEventListener('DOMContentLoaded', initMap);
