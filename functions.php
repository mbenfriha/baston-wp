<?php

register_nav_menus( array(
    'Top' => 'Main menu',
) );

add_theme_support( 'post-thumbnails' );



add_action( 'admin_init', 'bastonSettings' );

{
    register_setting( 'baston-tv', 'slider_active' ); // activer slider

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

function sevenMenu(  ) {
    $menu_name = 'Top';
    $menu_list ='';
    if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        foreach( $menu_items as $menu_item ) {
            if( $menu_item->menu_item_parent == 0 ) {

                $parent = $menu_item->ID;
                $parent_id = $menu_item->object_id;

                $menu_array = [];
                $post_array= [];

                $args = [
                    'numberposts' => 5,
                    'offset' => 0,
                    'category' => $parent_id,
                    'orderby' => 'post_date',
                    'order' => 'DESC',
                    'include' => '',
                    'exclude' => '',
                    'meta_key' => '',
                    'meta_value' =>'',
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'suppress_filters' => true
                ];



                $recent_posts = wp_get_recent_posts( $args );

                foreach($recent_posts as $post) {
                    $post_array[] = '<li class="menu-item col s4"><a href="' . $post['guid'] . '">' .  get_the_post_thumbnail( $post['ID'], 'thumbnail' ).'<h4 class="title-post">' .$post['post_title'] .' </h4></a></li> ' ."\n";
                }

                foreach( $menu_items as $submenu ) {
                    if( $submenu->menu_item_parent == $parent ) {
                        $bool = true;
                        $menu_array[] = '<li class="menu-item col s12"><a href="' . $submenu->url . '">' . $submenu->title . '</a></li> ' ."\n";
                    }
                }
                if( $bool == true && count( $menu_array ) > 0 ) {

                    $menu_list .= '<li class="parent-category">' ."\n";
                    $menu_list .= '<a class="parent-link" href="' . $menu_item->url . '">' . $menu_item->title . ' <span class="caret"></span></a>' ."\n";

                    $menu_list .= '<div class="sub-menu row"> <ul class="col s12 m12 l4 sub-category">' ."\n";
                    $menu_list .= implode( "\n", $menu_array );
                    $menu_list .= '</ul> <ul class="col s8 last-videos hide-on-med-and-down">'.implode("\n", $post_array).'</ul> </div>' ."\n";

                } else {

                    $menu_list .= '<li class="parent-category">' ."\n";
                    $menu_list .= '<a class="parent-link"  href="' . $menu_item->url . '">' . $menu_item->title . '</a>' ."\n";
                    $menu_list .= '<li>' ."\n";
                }

            }

            // end <li>

        }

    } else {
        $menu_list = '<!-- no menu defined in location "'.$theme_location.'" -->';
    }

    echo $menu_list;}

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


/*
 *
 * pagination
 *
 */
function pressPagination($pages = '', $range = 2)
{
    global $paged;
    $showitems= ($range * 2)+1;

    if(empty($paged)) $paged = 1;
    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<div class='pagination'>";
        if($paged > 1 && $showitems < $pages) echo "<a id=\"prev\" href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
            }
        }

        if ($paged < $pages && $showitems < $pages) echo "<a id=\"next\" href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
        echo "</div>";
    }
}