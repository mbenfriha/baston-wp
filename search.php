<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>



<div class="search container">

    <div class="row all-videos">
        <div class="col s12 m8 l8">
            <div class="all-articles">
                <h1><?php the_search_query(); ?></h1>

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
>