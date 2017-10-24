$(document).ready(function() {

    $(".header__button").on( "click", function(e) {
        e.preventDefault();
        if ( $( ".header__menu" ).is( ":hidden" ) ) {
            $( ".header__menu" ).slideDown( "slow" );
            $( ".header__open" ).css( "visibility", "hidden" );
            $( ".header__close" ).css( "visibility", "visible" );
          } else {
            $( ".header__menu" ).slideUp();
            $( ".header__open" ).css( "visibility", "visible" );
            $( ".header__close" ).css( "visibility", "hidden" );
          }
    } )

    $(".timeline__dates--edition").on( "click", function(e) {
        e.preventDefault();
        $(".timeline__dates--edition").removeClass("active");
        $(this).addClass("active");

        var buttonEdition = $(this).data("edition");
        $(".timeline__infos").fadeOut("slow");
        $(".timeline__infos[data-edition="+buttonEdition+"]").fadeIn("slow");
    } )

});
