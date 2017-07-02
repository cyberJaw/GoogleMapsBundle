function initMap() {
    var lat = $('[data-name="lat"]').val();
    var lng = $('[data-name="lng"]').val();
    if (lat !== '' && lng !== '') {
        default_lat = lat;
        default_lng = lng;
    }
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: parseFloat(default_lat), lng: parseFloat(default_lng)},
        zoom: 13,
        styles: map_template,
        mapTypeId: map_type
    });
    map.setTilt(45);
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

    var autocomplete = new google.maps.places.Autocomplete(input);
    // Bind the map's bounds (viewport) property to the autocomplete object,
    // so that the autocomplete requests use the current map bounds for the
    // bounds option in the request.
    autocomplete.bindTo('bounds', map);
    autocomplete.setTypes(['geocode']);

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29),
        animation: google.maps.Animation.DROP,
        position: {lat: parseFloat(default_lat), lng: parseFloat(default_lng)}
    });
    marker.addListener('click', function () {
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    });

    autocomplete.addListener('place_changed', function () {
        infowindow.close();
        marker.setVisible(true);

        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        var latlng = marker.getPosition().toJSON();
        $('[data-name="lat"]').val(latlng['lat'])
        $('[data-name="lng"]').val(latlng['lng']);
        $('[data-name="city"]').val(place.vicinity);
        $('[data-name="address"]').val(place.formatted_address);
        marker.setVisible(true);
        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;
        infowindow.open(map, marker);
    });
}