$(document).ready(function() {

    $('.carousel').carousel({full_width: true});

    autoplay()


    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
        console.log('ok')
    }

    console.log('ko')


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