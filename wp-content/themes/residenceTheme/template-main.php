<?php
//Template Name: Residence HP
    if(is_mobile()) {
        wp_enqueue_style('home-page', get_stylesheet_directory_uri().'/css/home_mobile.css?vn='.THEME_VERSION, array(), true);
    } else {
        wp_enqueue_style('home-page', get_stylesheet_directory_uri().'/css/home.css?vn='.THEME_VERSION, array(), true);
    }
    wp_enqueue_script('slick-script', get_stylesheet_directory_uri().'/js/slick.min.js', array('jquery'), true);
    wp_enqueue_style('slick-theme-style', get_stylesheet_directory_uri().'/css/slick-theme.css', array(), true);
    wp_enqueue_style('slick-style', get_stylesheet_directory_uri().'/css/slick.css', array(), true);
    wp_enqueue_script('script', get_stylesheet_directory_uri().'/js/script.js?vn='.THEME_VERSION, array('jquery'), true);

?>

<?php get_header(); ?>
    <section class="header">
        <?php
        if( have_rows('header_gallery') ):
            while ( have_rows('header_gallery') ) : the_row();
                $title = get_sub_field('title');
                $image = is_mobile() ? get_sub_field('image_mobile') : get_sub_field('image');
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
                        </a>
                    </li>
                <?php endwhile;
            else :
            endif;
            ?>
        </ul>

        <div id="image_gallery">
            <?php
            if( have_rows('gallery') ):
                while ( have_rows('gallery') ) : the_row();
                    $title = get_sub_field('title');
                    ?>
                    <div class="holder <?php echo $title;?>">
                        <ul class="images <?php echo $title; ?>">
                            <?php
                            if( have_rows('related_images') ):
                                while ( have_rows('related_images') ) : the_row();
                                    $image = get_sub_field('image');
                                    ?>
                                    <li>
                                        <img src="<?php echo $image; ?>" alt="">
                                    </li>
                                <?php endwhile;
                            else :
                            endif;
                            ?>
                        </ul>
                    </div>
                <?php endwhile;
            else :
            endif;
            ?>
        </div>
    </section>

    <section id="recommendation">
        <h2>Recommendation</h2>
        <div class="wrap">
            <ul id="recommend">
                <?php
                if( have_rows('recommendation') ):
                    while ( have_rows('recommendation') ) : the_row();
                        $name = get_sub_field('name');
                        $description = get_sub_field('description');
                        ?>
                        <li class="<?php echo $title; ?>">
                            <div class="text">
                                <?php echo $description; ?>
                                <span><?php echo $name; ?></span>
                            </div>
                        </li>
                    <?php endwhile;
                else :
                endif;
                ?>
            </ul>
        </div>
    </section>

    <section id="member">
        <h2>BECOME A MEMBER AND SAVE</h2>
        <h3>Sign up for our free members program</h3>
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
            <label for="notify">
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
