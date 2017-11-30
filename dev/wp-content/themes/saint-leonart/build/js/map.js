(function($) {

function render_map( $el ) {

    // var
    var $markers = $el.find('.marker');

    // vars
    var args = {
        zoom        : 16,
        center      : new google.maps.LatLng(0, 0),
        navigationControl: false,
        scrollwheel: false,
        mapTypeControl: false,
        scaleControl: false,
        draggable: false,
        mapTypeId   : google.maps.MapTypeId.ROADMAP,
        styles: [{"featureType":"administrative","elementType":"geometry","stylers":[{"hue":"#ff0000"}]},{"featureType":"landscape.man_made","elementType":"geometry","stylers":[{"color":"#fcf3e0"}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ff796b"}]},{"featureType":"road.highway.controlled_access","elementType":"geometry.fill","stylers":[{"color":"#ff796b"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"color":"#fed160"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#fed178"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#861c48"}]}]
    };

    // create map
    var map = new google.maps.Map( $el[0], args);

    // add a markers reference
    map.markers = [];

    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

    });

    // center map
    center_map( map );

}

function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
    var fullName = $marker.attr( 'data-url' );
    var slug = fullName
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'');
    console.log(slug);

    var icon = {
        url: "../wp-content/themes/saint-leonart/build/assets/images/marker.svg", // url
        scaledSize: new google.maps.Size(30, 45), // scaled size
        origin: new google.maps.Point(0,0), // origin
        anchor: new google.maps.Point(0, 0) // anchor
    };

    // create marker
    var marker = new google.maps.Marker({
        position : latlng,
        map: map,
        icon: icon,
        url: '/en-pratique/#'+slug
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
        // create info window
        var infowindow = new google.maps.InfoWindow({
            content     : $marker.html()
        });

        // show info window when marker is clicked
        google.maps.event.addListener(marker, 'click', function() {

            infowindow.open( map, marker );
            window.location.href = marker.url;

        });
    }

}


function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

        var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

        bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length == 1 )
    {
        // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
        // fit to bounds
        map.fitBounds( bounds );
    }

}

$(document).ready(function(){

    $('.map').each(function(){

        render_map( $(this) );

    });


});

})(jQuery);
