<?php
//Template Name: Order Success

?>
<style>
    footer,
    header {
        display: none !important;
    }
</style>
<?php

function late_load() {
    if(rs_is_mobile()) {
        wp_enqueue_style('home-page-mobile', get_stylesheet_directory_uri().'/css/home_mobile.css?vn='.THEME_VERSION, array(), true);
    } else if(!rs_is_mobile()) {
        wp_enqueue_style('home-page', get_stylesheet_directory_uri().'/css/home.css?vn='.THEME_VERSION, array(), true);
    }
}
add_action('wp_footer', 'late_load');

?>
<?php get_header(); ?>
    <section class="message">
        <?php the_content();?>
    </section>
<?php get_footer(); ?>
