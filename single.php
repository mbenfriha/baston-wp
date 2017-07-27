<?php get_header(); ?>



<div class="single container">
    <div class="row">

        <div class="video col s12">
            <?php
            if(get_post_meta(get_the_ID(), 'baston_video_code')[0])
                echo get_post_meta(get_the_ID(), 'baston_video_code')[0];
            else
                the_post_thumbnail('post-thumbnail', ['class' => 'img-single', 'title' => 'Feature image']);
            ?>
        </div>


        <div class="sub-video col s12 m12 l8">
            <div class="col s12">
                <h1><?php the_title(); ?></h1>

                <div class="info-video col s12 m6"> Le <?php the_time('j F Y') ?> dans <?php echo the_category(', ')?> </div>


                <div class="share col s12 m6">
                    <a href="http://www.facebook.com/share.php?u=<?php echo urlencode(get_the_permalink()); ?>&title=<?php echo urlencode(get_the_title()); ?>" target="_blank">
                        <div class="fb-share share-btn"><i class="fa fa-facebook" aria-hidden="true"></i></div>
                    </a>
                    <a href="//twitter.com/share?url=<?php echo urlencode(get_the_permalink()); ?>" target="_blank">
                        <div class="tw-share share-btn"><i class="fa fa-twitter" aria-hidden="true"></i></div>
                    </a>
                </div>

                <div class="description">
                    <?php the_content() ?>
                </div>

                <div class="tags">
                    <?php the_tags('Tags: <div class="chip">', '</div><div class="chip"> ', '</div><br />'); ?>
                </div>
            </div>

            <div class="more-video col s12">
                <div class="widget-title red white-text">
                    Les autres
                </div>
                <ul class="col s12">
                    <?php

                    query_posts('orderby=rand&posts_per_page=4&cat='. get_the_category(get_the_ID())[0]->term_id);

                    while ( have_posts() ) : the_post();
                        echo
                            '<li class="col s12 m3 l3">
                               <a href="'. get_permalink(get_the_ID()) .'">' . get_the_post_thumbnail(get_the_ID(), 'small') . '</a>
                                <span class="title-more"> <a href="'. get_permalink(get_the_ID()) .'">' . get_the_title(get_the_ID()). ' </a></span>
                               </li>';
                    endwhile;

                    wp_reset_query();
                    ?>
                </ul>
            </div>

            <div id="comment" class="col s12">
                <div class="widget-title red white-text">commentaires </div>


                <?php comments_template(); ?>
            </div>

        </div>

        <div class="col s4 hide-on-med-and-down">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>




