<html <?php language_attributes(); ?>>
<head>

    <title><?= get_bloginfo( 'name' ); ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri () ?>/inc/css/materialize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://use.fontawesome.com/250b302b5a.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>



    <script type="text/javascript" src="<?php echo get_template_directory_uri () ?>/inc/js/jquery.js"></script>

    <script src="<?php echo get_template_directory_uri () ?>/inc/js/materialize.min.js"></script>

<?php wp_head( ) ?>
    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
    <!-- the default values -->
    <meta property="fb:app_id" content="138315323424887" />

    <!-- if page is content page -->
    <?php if (is_single()) { ?>
        <meta property="og:url" content="<?php the_permalink() ?>"/>
        <meta property="og:title" content="<?php single_post_title(''); ?>" />
        <meta property="og:description" content="<?php echo strip_tags(get_the_excerpt($post->ID)); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php if (function_exists('wp_get_attachment_thumb_url')) {echo wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full', false)[0];}?>" />

        <!-- if page is others -->
    <?php } else { ?>
        <meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
        <meta property="og:description" content="<?php bloginfo('description'); ?>" />
        <meta property="og:type" content="website" /><?php } ?>




</head>
<body>
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({status: true, cookie: true,
            xfbml: true});
    };
    (function() {
        var e = document.createElement('script'); e.async = true;
        e.src = document.location.protocol +
            '//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);
    }());
</script>

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.5";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<div class="header">


    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <a href="#" data-activates="mobile-demo" class="button-collapse left-menu"><i class="material-icons">menu</i></a>
                <a href="#" data-activates="mobile-demo-search" class="button-collapse right-search right"><i class="material-icons">search</i></a>

                <a href="<?= esc_url( home_url( '/' )) ?>" class="brand-logo center hide-on-large-only "><img src="https://img4.hostingpics.net/pics/862116bastontvblanc.png" alt=""></a>

                <a href="<?= esc_url( home_url( '/' )) ?>" class="logo hide-on-med-and-down"><img src="http://image.noelshack.com/fichiers/2017/30/3/1501100342-bastontv3.png" alt=""></a>

                <ul class="hide-on-med-and-down menu-large">
                <?php if (function_exists(sevenMenu())) sevenMenu(); ?>
                </ul>



                <ul class="right hide-on-med-and-down">
                    <li class="search-form-large">
                            <form action="<?= esc_url( home_url( '/' )) ?>">
                                <div class="input-field search-form-large">
                                   <label class="label-icon search-form-large" for="search"><button type="submit"><i class="material-icons right">search</i></button></label>
                                    <input id="search-large" type="search" name="s" class="search-form-large" required>
                                </div>
                            </form>
                        </a>
                    </li>
                    <li><a href="https://www.facebook.com/bastontv/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="https://twitter.com/bastontv"><i class="fa fa-twitter" aria-hidden="true"></i>
                        </a></li>
                    <li><a href="https://www.snapchat.com/add/bastontv"><i class="fa fa-snapchat-ghost" aria-hidden="true"></i>
                        </a></li>
                    <li><a href="https://www.instagram.com/bastontv/"><i class="fa fa-instagram" aria-hidden="true"></i>
                        </a></li>
                </ul>
            </div>
            <ul class="side-nav" id="mobile-demo">
                <?php
                // Fix menu overlap
                if ( is_admin_bar_showing() ) echo '<div style="min-height: 32px;"></div>';
                ?>
                <?php if (function_exists(sevenMenu())) sevenMenu(); ?>
                <ul class="socials">
                    <li>
                        <i class="fa fa-twitter-square" aria-hidden="true"></i>
                        <i class="fa fa-facebook-official" aria-hidden="true"></i>
                        <i class="fa fa-snapchat-square" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </li>
                </ul>
            </ul>
            <ul class="side-nav" id="mobile-demo-search">
                <li id="mobil-form" style="height: 5em;">
                    <form action="<?= esc_url( home_url( '/' )) ?>">
                        <div class="input-field col s6">
                            <input id="keyword" type="search" name="s" class="" onkeyup="fetch()" required>
                            <label class="label-icon" for="search">
                                <i class="material-icons right">search</i>
                            </label>
                        </div>
                    </form>
                </li>

                <li>
                    <div class="preloader-wrapper active">
                        <div class="spinner-layer spinner-red-only">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div><div class="gap-patch">
                                <div class="circle"></div>
                            </div><div class="circle-clipper right">
                                <div class="circle"></div>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </nav>



</div>

