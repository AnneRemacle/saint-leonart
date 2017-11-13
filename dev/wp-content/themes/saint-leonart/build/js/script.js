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

    $(".buttons__single").on( "click", function(e) {
        e.preventDefault();
        $( e.target ).toggleClass( 'active' );
        $( e.target ).next().slideToggle( "slow" );
    } )

    $(".buttons__single").on( "click", function(e) {
        e.preventDefault();
        if( $( e.target ).hasClass( 'active' ) ) {
            $( e.target ).removeClass( 'active' );
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

    $(".buttons__filter").on("click", function(e){
        var classFilter = $(e.target).attr('class').split(' ').pop();
        $(".program-item").hide();
        $(".program-item."+classFilter).show();
    })

    $(".categories__term").on("click", function(e){
        var classFilter = $(e.target).attr('class').split(' ').pop();
        $(".news").hide();
        $(".news."+classFilter).show();
    })

});
