<?php
//Template Name: Residence HP
    function late_load() {
        wp_enqueue_style('fancybox-style', get_stylesheet_directory_uri().'/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.css', array(), true);
        if(rs_is_mobile()) {
            wp_enqueue_style('home-page-mobile', get_stylesheet_directory_uri().'/css/home_mobile.css?vn='.THEME_VERSION, array(), true);
        } else if(!rs_is_mobile()) {
            wp_enqueue_style('home-page', get_stylesheet_directory_uri().'/css/home.css?vn='.THEME_VERSION, array(), true);
        }
        wp_enqueue_style('lity-css', TEMPLATE_DIR.'/css/lity.min.css', array(), THEME_VERSION); // Lity lightbox
        wp_enqueue_script('lity-js', TEMPLATE_DIR.'/js/lity.min.js', array('jquery'), THEME_VERSION, true );
        wp_enqueue_script('slick-script', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'), true);
        wp_enqueue_style('slick-theme-style', get_stylesheet_directory_uri().'/css/slick-theme.css', array(), true);
        wp_enqueue_style('slick-style', get_stylesheet_directory_uri().'/css/slick.css', array(), true);
        wp_enqueue_script('fancy-box-script', get_stylesheet_directory_uri().'/jquery.fancybox-1.3.4/fancybox/jquery.fancybox-1.3.4.pack.js?vn='.THEME_VERSION, array('jquery'), true);
        wp_enqueue_script('fancy-easing-script', get_stylesheet_directory_uri().'/jquery.fancybox-1.3.4/fancybox/fancybox/jquery.easing-1.4.pack.js?vn='.THEME_VERSION, array('jquery'), true);
        wp_enqueue_script('fancy-mousewheel-script', get_stylesheet_directory_uri().'/jquery.fancybox-1.3.4/fancybox/jquery.mousewheel-3.0.4.pack.js?vn='.THEME_VERSION, array('jquery'), true);
        wp_enqueue_script('script', get_stylesheet_directory_uri().'/js/script.js?vn='.THEME_VERSION, array('jquery'), true);
    }

    add_action('wp_footer', 'late_load');

?>

<?php get_header(); ?>
    <section class="header" id="up">
        <?php
        if( have_rows('header_gallery') ):
            while ( have_rows('header_gallery') ) : the_row();
                $title = get_sub_field('title');
                $image = rs_is_mobile() ? get_sub_field('image_mobile') : get_sub_field('image');
                ?>
                <div class="gallery">
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

    <section id="residence">
        <h2>Our Residence</h2>
        <?php if(!rs_is_mobile()) { ?>
            <ul id="subject">
                <?php
                if( have_rows('gallery') ):
                    while ( have_rows('gallery') ) : the_row();
                        $title = get_sub_field('title');
                        $subjectImage = get_sub_field('subject_image');
                        ?>
                        <li class="<?php echo $title; ?>">
                            <a href="javascript:void(0);">
                                <img src="<?php echo $subjectImage; ?>" alt="<?php echo $title; ?>">
                                <span>Click to show portfolio</span>
                                <p class="title"><?php echo $title;?></p>
                            </a>
                        </li>
                    <?php endwhile;
                else :
                endif;
                ?>
            </ul>
        <?php } ?>

        <div id="image_gallery">
            <?php
            if( have_rows('gallery') ):
            else :
            endif;
                while ( have_rows('gallery') ) : the_row();
                        $title = get_sub_field('title');
                        $logo = get_sub_field('logo');
                    ?>
                    <?php if(rs_is_mobile()) { ?>
                        <img class='logo' src="<?php echo $logo; ?>" alt="<?php echo $title; ?>">
                    <?php } ?>
                    <div class="holder <?php echo $title;?>">
                        <ul class="images <?php echo $title; ?>">
                            <?php
                            if( have_rows('related_images') ):
                                while ( have_rows('related_images') ) : the_row();
                                    $image = get_sub_field('image');
                                    ?>
                                    <li>
                                        <a href="<?php echo $image; ?>" style="background-image: url('<?php echo $image; ?>'); rel="<?php echo $title;?>">
                                            <span class="title"><?php echo $title; ?></span>
                                        </a>
                                    </li>
                                <?php endwhile;
                            else :
                            endif;
                            ?>
                        </ul>
                    </div>
                <?php endwhile;
            ?>
        </div>
    </section>

    <section id="recommendation">
        <h2>Recommendation</h2>
        <div class="wrap">
            <div id="recommend">
                <?php
                if( have_rows('recommendation') ):
                    while ( have_rows('recommendation') ) : the_row();
                        $name = get_sub_field('name');
                        $description = get_sub_field('description');
                        $subject = get_sub_field('subject');
                        ?>
                        <article class="<?php echo $title; ?>">
                            <div class="text">
                                <h3><?php echo $subject?></h3>
                                <?php echo $description; ?>
                                <span><?php echo $name; ?></span>
                            </div>
                        </article>
                    <?php endwhile;
                else :
                endif;
                ?>
            </div>
        </div>
    </section>

    <section id="member">
        <h2>Contact Us & Become a Member</h2>
        <form id="sign">
            <input type="hidden" name="action" value="send_to_mailchimp">
            <label for="name">
                <span>Name:</span>
                <input type="text" id="name" name="name" required="required">
            </label>
            <label for="email">
                <span>Email:</span>
                <input type="email" id="email" name="email" required="required">
            </label>
            <label for="phone">
                <span>Phone Number:</span>
                <input type="text" id="phone" name="phone" required="required">
            </label>
            <label for="residence-member">
                <span>Select Residence:</span>
                <select name="residence" id="residence-member">
                <?php
                    if( have_rows('gallery') ):
                        while ( have_rows('gallery') ) : the_row();
                            $title = get_sub_field('title');
                            ?>
                            <option value="<?php echo $title; ?>"><?php echo $title; ?></option>
                        <?php endwhile;
                    else :
                    endif;
                    ?>
                </select>
            </label>
            <label for="notify" class="notify">
                <input type="checkbox" id="notify" name="notification">
                <span>I agree to recieve email notifications</span>
            </label>
            <input type="submit" value="Send">
            <div class="loader">
                <img src="<?php echo TEMPLATE_DIR.'/images/loader.apng'?>" alt="loader">
            </div>
            <div class="response">REsponse Message</div>
        </form>
    </section>
<?php get_footer(); ?>
