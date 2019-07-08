<?php
//Template Name: Residence HP
    wp_enqueue_script('slick-script', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'), true);
    wp_enqueue_style('slick-theme-style', get_stylesheet_directory_uri().'/css/slick-theme.css', array(), true);
    wp_enqueue_style('slick-style', get_stylesheet_directory_uri().'/css/slick.css', array(), true);
    wp_enqueue_style('home-page', get_stylesheet_directory_uri().'/css/home.css?vn='.THEME_VERSION, array(), true);
    wp_enqueue_script('script', get_stylesheet_directory_uri().'/js/script.js?vn='.THEME_VERSION, array('jquery'), true);

?>

<?php get_header(); ?>


<?php get_footer(); ?>
