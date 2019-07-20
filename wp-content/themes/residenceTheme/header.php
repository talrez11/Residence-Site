<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
	if(!is_mobile()) {
		wp_enqueue_style('header', get_stylesheet_directory_uri().'/css/header.css?vn='.THEME_VERSION, array(), true);
        wp_enqueue_style('footer', get_stylesheet_directory_uri().'/css/footer.css?vn='.THEME_VERSION, array(), true);
	} else {
		wp_enqueue_style('header', get_stylesheet_directory_uri().'/css/header_mobile.css?vn='.THEME_VERSION, array(), true);
        wp_enqueue_style('footer', get_stylesheet_directory_uri().'/css/footer_mobile.css?vn='.THEME_VERSION, array(), true);
	}
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134481042-1"></script>
    <title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/style.css?vn='.THEME_VERSION ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
		<header>
            <a href="/" class="logo">
                <img src="<?php echo TEMPLATE_DIR.'/images/logo.jpg'?>" alt="logo">
            </a>

            <?php
                if(!is_mobile()) {
                     wp_nav_menu( array(
                        'theme_location' => 'Main Menu',
                        'item_spacing' => 'discard'
                        )
                    );
                }
            ?>

            <div class="social">
                <a class='facebook' href="/" target="_blank">
                    <img src="<?php echo TEMPLATE_DIR.'/images/facebook.jpg'?>" alt="facebook">
                </a>

                <a class='instagram' href="<?php echo INSTAGRAM_URL; ?>" target="_blank">
                    <img src="<?php echo TEMPLATE_DIR.'/images/instagram.jpg'?>" alt="instagram">
                </a>
            </div>
        </header><!-- .site-header -->
