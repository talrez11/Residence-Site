<?php
//Template Name: Residence HP
    wp_enqueue_script('slick-script', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'), true);
    wp_enqueue_style('slick-theme-style', get_stylesheet_directory_uri().'/css/slick-theme.css', array(), true);
    wp_enqueue_style('slick-style', get_stylesheet_directory_uri().'/css/slick.css', array(), true);
    wp_enqueue_style('home-page', get_stylesheet_directory_uri().'/css/home.css?vn='.THEME_VERSION, array(), true);
    wp_enqueue_script('script', get_stylesheet_directory_uri().'/js/script.js?vn='.THEME_VERSION, array('jquery'), true);

?>

<?php get_header(); ?>
    <section class="header">
        <?php
        if( have_rows('header_gallery') ):
            while ( have_rows('header_gallery') ) : the_row();
                $title = get_sub_field('title');
                $image = get_sub_field('image');
                ?>
                <div class="gallery">
                    <h2><?php echo $title; ?></h2>
                    <img src="<?php echo $image?>" alt="<?php echo $title;?>">
                </div>
            <?php endwhile;
        else :
        endif;
        ?>
    </section>

    <section id="about">
        <?php
        if( have_rows('about') ):
            while ( have_rows('about') ) : the_row();
                $title = get_sub_field('title');
                $description = get_sub_field('description');
                ?>
                <article>
                    <h2><?php echo $title; ?></h2>
                    <?php echo $description; ?>
                </article>
            <?php endwhile;
        else :
        endif;
        ?>
    </section>
<?php get_footer(); ?>
