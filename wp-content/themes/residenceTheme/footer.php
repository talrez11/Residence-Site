<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 */
?>
	</div><!-- .site-content -->
	<footer id="bottom">
        <h2>Contact Us</h2>
        <form id="contact">
            <label for="name">
                <input type="text" id="name" name="name" placeholder="Name" required="required">
            </label>
            <label for="phone">
                <input type="text" id="phone" name="phone" placeholder="Phone number" required="required">
            </label>
            <label for="residence">
                <select name="residence" id="residence">
                    <option value="Select Residence" selected="selected">Select Residence</option>
                    <option value="option one">option one</option>
                    <option value="option two">option two</option>
                    <option value="option three">option three</option>
                </select>
            </label>
            <input type="submit" value="Send">
            <div class="loader">
                <img src="<?php echo TEMPLATE_DIR.'/images/loader.apng'?>" alt="loader">
            </div>
            <div class="response">REsponse Message</div>
        </form>
        <div>
            <a class='phone' href="tel:972543551095">
                <img src="<?php echo TEMPLATE_DIR.'/images/icon_2.jpg'?>" alt="phone icon">
                <span>+972-54-3551095</span>
            </a>

            <a class='mail' href="mailto:residence@gmail.com">
                <img src="<?php echo TEMPLATE_DIR.'/images/icon_1.jpg'?>" alt="mail icon">
                <span>residence@gmail.com</span>
            </a>
        </div>
	</footer><!-- .site-footer -->
</div><!-- .site -->

<?php wp_footer(); ?>

</body>
</html>