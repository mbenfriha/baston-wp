<?php

 /* Template Name: infinite scroll  */
?>

<?php get_header(); ?>


    <div id="content" role="main">
<?php
/*
 Show only Pages on  infinite scroll!
Here is the secret:
    You can set post_type for what you need, it's simple!
    Some post_types could be: portfolio, project, product
    We could add as many post types as we want, separating them by commas, like 'post', 'page', 'product'
*/
$args = array(       // set up arguments
    'post_type' => 'post', // Only Pages
);
query_posts($args);   // load posts
?>



        <?php get_footer(); ?>
