<html <?php language_attributes(); ?>>
<head>

    <title><?= get_bloginfo( 'name' ); ?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri () ?>/inc/css/materialize.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <script src="https://use.fontawesome.com/250b302b5a.js"></script>

    <link href='https://fonts.googleapis.com/css?family=Raleway:400,800' rel='stylesheet' type='text/css'>


<?php wp_head( ) ?>
    <?php if (have_posts()):while(have_posts()):the_post(); endwhile; endif;?>
    <!-- the default values -->
    <meta property="fb:app_id" content="1992139823" />

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
                <a href="#!" class="logo"><img src="https://img4.hostingpics.net/pics/862116bastontvblanc.png" alt=""></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <?php wp_nav_menu( array( 'theme_location' => 'Top', 'container_class' => 'menu', 'container_id' => 'menu', 'menu_class' => '' ) ); ?>

                <ul class="right hide-on-med-and-down">
                    <li><a href="sass.html"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
                    <li><a href="badges.html"><i class="fa fa-twitter-square" aria-hidden="true"></i>
                        </a></li>
                    <li><a href="collapsible.html"><i class="fa fa-snapchat-square" aria-hidden="true"></i>
                        </a></li>
                    <li><a href="mobile.html"><i class="fa fa-instagram" aria-hidden="true"></i>
                        </a></li>
                </ul>
            </div>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="sass.html">
                    </a></li>
                <li><a href="badges.html"><i class="fa fa-instagram" aria-hidden="true"></i>
                    </a></li>
                <li><a href="collapsible.html">Javascript</a></li>
                <li><a href="mobile.html">Mobile</a></li>
            </ul>
        </div>
    </nav>


</div>

