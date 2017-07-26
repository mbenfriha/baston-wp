$(document).ready(function() {

    $('.carousel').carousel({full_width: true});

    autoplay()


    function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
    }



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
    $(".left-menu").sideNav();
    $(".right-search").sideNav({
        edge: 'right'
    });


    $(document).click(function(e) {
        if($(event.target).closest('.search-form-large').length) {
            $('nav input#search-large').css('width', '5em');
        }
        else {
            $('nav input#search-large').css('width', '10px');

        }
        console.log($(event.target));
    })
});