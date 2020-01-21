<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-T5MWQHV');</script>
    <!-- End Google Tag Manager -->

    <title><?php wp_title(); ?></title>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri().'/style.css?vn='.THEME_VERSION ?>">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
    <?php
    if(!rs_is_mobile()) {
        wp_enqueue_style('header', get_stylesheet_directory_uri().'/css/header.css?vn='.THEME_VERSION, array(), true);
        wp_enqueue_style('footer', get_stylesheet_directory_uri().'/css/footer.css?vn='.THEME_VERSION, array(), true);
    } else {
        wp_enqueue_style('header-mobile', get_stylesheet_directory_uri().'/css/header_mobile.css?vn='.THEME_VERSION, array(), true);
        wp_enqueue_style('footer-mobile', get_stylesheet_directory_uri().'/css/footer_mobile.css?vn='.THEME_VERSION, array(), true);
    }
    ?>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-T5MWQHV"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
		<header>
            <a href="/" class="logo">
                <img src="<?php echo TEMPLATE_DIR.'/images/logo.jpg'?>" alt="logo">
            </a>

            <?php
                if(!rs_is_mobile()) {
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
            
            <?php if(rs_is_mobile()) { ?>
                <a href="tel:972547557793" id="phone"></a>
            <?php } ?>
        </header><!-- .site-header -->
