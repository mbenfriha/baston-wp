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

class Baston_Walker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";

        //Add SPAN if no Permalink
        if( $permalink && $permalink != '#' ) {
            $output .= '<a href="' . $permalink . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $title;
        if( $description != '' && $depth == 0 ) {
            $output .= '<small class="description">' . $description . '</small>';
        }
        if( $permalink && $permalink != '#' ) {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }
    function end_el(&$output, $item, $depth=0, $args=array()) {

        if ($depth === 0 ) {
            $output .= '<div class="sub-menu row">
        <ul class="col s6">
        <li class="menu-item col s12" id="menu-item-48"><a href="http://www.example.com/child1.com">child 1</a></li>
        <li class="menu-item col s12" id="menu-item-49"><a href="http://www.example.com/child2.com">child 2</a></li>
        <li class="menu-item col s12" id="menu-item-50"><a href="http://www.example.com/child3.com">child 3</a></li>
        </ul>
        </div>';
        }
        $output .= "</li>\n";
    }
}