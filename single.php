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
            <div id="comment col s12">
                <?php comments_template(); ?>
            </div>
        </div>

        <div class="col s4 hide-on-small-only">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>




