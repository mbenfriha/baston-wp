<?php

register_nav_menus( array(
    'Top' => 'Main menu',
) );

add_theme_support( 'post-thumbnails' );



add_action( 'admin_init', 'bastonSettings' );


{

}


add_action( 'admin_menu', 'bastonAdminMenu' );

function bastonAdminMenu( )
{
    add_menu_page(
        'Options Baston',
        'Baston Settings',
        'administrator',
        'baston-theme',
        'settingsPage'
    );
}


function settingsPage( )
{
    include ('admin-menu.php');
}
