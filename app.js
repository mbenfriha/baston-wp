$( document ).ready(function() {

    if (window.matchMedia("(min-width: 1024px)").matches) {
        $('nav li > .sub-menu').parent().hover(function () {
            var submenu = $(this).children('.sub-menu');
            if ($(submenu).is(':hidden')) {
                $(submenu).slideDown(200);
            } else {
                $(submenu).slideUp(200);
            }
        });
    }
    $(".button-collapse").sideNav();

});