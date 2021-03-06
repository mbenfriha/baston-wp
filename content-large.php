<?php
/**
 * The default template for displaying content-large
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Linsolite
 * @since Linsolite.tv 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post col s12'); ?>>
    <span class="category-post red"><?php the_category( ', ' ); ?></span>


    <a href="<?php the_permalink(); ?>"><div class="thumb col s12">
            <?php the_post_thumbnail('post-thumbnail', ['class' => 'img-responsive responsive--full img-content-large', 'title' => 'Feature image']); ?>
        </div></a>

    <div class="excerpt col s12">
        <a href="<?php the_permalink(); ?>"><h4><?php echo wp_trim_words( get_the_title(), 10 ) ; ?></h4></a>
    </div>
</article>