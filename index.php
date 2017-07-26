<?php get_header(); ?>


<div class="index container">
    <div class="row">

        <div class="carousel carousel-slider center container" data-indicators="true">

            <?php
            $args = array( 'numberposts' => 5 );
            $recent_posts = wp_get_recent_posts( $args );
            foreach( $recent_posts as $recent ){
                echo '

        <div class="carousel-item red white-text" href="#one!">
        <div class="infos">
            <h2>'. $recent["post_title"] .'</h2>
            <p class="white-text hide-on-med-and-down">'. wp_trim_words(  $recent['post_content'], 20, ' … ' ) . '</p>

         </div>
            <img src="'. get_the_post_thumbnail( $recent["ID"], 'full' ) .'">
            <div class="carousel-fixed-item center">
                <a href='.get_permalink($recent["ID"]).'>
                    <i class="fa fa-play-circle-o play-slide" aria-hidden="true"></i>
                </a>
            </div>
        </div>';
            }
            ?>

        </div>
    </div>


    <div class="row all-videos">
        <div class="col s12 m8 l8">
            <div class="all-articles">
                <?php if (have_posts()) : while (have_posts()) : the_post();


                    if( $wp_query->current_post % 5 == 4 ) {
                        get_template_part( 'content-large', get_post_format() );

                    } else {
                        get_template_part( 'content', get_post_format() );

                    }



                endwhile; else:
                    _e('Sorry, no posts matched your criteria.'); ?>

                <?php endif; ?>
            </div>

            <?php pressPagination($pages ='', $range = 2); ?>


        </div>
        <div class="col s12 m4 l4 hide-on-small-only">
            <?php get_sidebar(); ?>

        </div>
    </div>

</div>



<?php get_footer(); ?>
