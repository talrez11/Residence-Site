<?php
	// Mobile detect class
	include_once 'includes/Mobile_Detect.php';
	include_once 'includes/env.php';

	// Add featured image support
	add_theme_support( 'post-thumbnails' );

	// Register theme menues
	function print_site_menues() {
		register_nav_menus(
			array(
				'Main Menu' => __( 'Main Menu' ),
				'Main Navigation' => __('Main Navigation')
			)
		);
	}
	add_action( 'init', 'print_site_menues' );

	// action for sending to mailchimp
	add_action('wp_ajax_send_to_mailchimp', 'send_to_mailchimp');
	add_action('wp_ajax_nopriv_send_to_mailchimp', 'send_to_mailchimp');

	function send_to_mailchimp() {
		// Put your MailChimp API and List ID hehe
		$api_key = MAILCHIMP_API;
		$list_id = '5af679a8d7';
		$to = 'studiosuoton@gmail.com';
        $cc = 'talreznic11@gmail.com';
		$from = $_POST['email'];
		$subject = 'פנייה מאתר דואטון';
		$email_content = $_POST['message'];
		$phone = $_POST['phone'];
		$name = $_POST['fname'];
		$email = $_POST['email'];
		$content_type = 'Content-Type: text/html; charset=UTF-8';
		$headers = array();
		$headers[] = "From: $from <$from> \r\n";
		$headers[] = "CC: $cc";
		$headers[] = $content_type;
        $email_message = "<br />
        Name: $name<br />
        Email: $email<br />
        Phone: $phone<br />
        Message : $email_content<br />
        <br />
        Thank You.";

		wp_mail($to, $subject, $email_message, $headers);

		// Let's start by including the MailChimp API wrapper
		include('includes/MailChimp.php');

		$MailChimp = new MailChimp($api_key);
		$memberId = $MailChimp->subscriberHash($_POST['email']);

		// Submit subscriber data to MailChimp
		// For parameters doc, refer to: http://developer.mailchimp.com/documentation/mailchimp/reference/lists/members/
		// For wrapper's doc, visit: https://github.com/drewm/mailchimp-api
		$result = $MailChimp->put("lists/$list_id/members/".$memberId, [
			'email_address' => $_POST["email"],
			'merge_fields'  => ['FNAME'=>$_POST["fname"], 'PHONE'=>$_POST["phone"], 'COMPANY'=>$_POST["company"]],
			'status'        => 'subscribed'
		]);

		if ($MailChimp->success()) {
			echo 1;
		} else {
			echo $MailChimp->getLastError();
		}
		die();
	}

	// Function for detecting mobile version
	function is_mobile() {
		$detect = new Mobile_Detect;

		// Exclude tablets.
		if( $detect->isMobile() && !$detect->isTablet() ){
		 	return true;
		}
	}

    //	Allow SVG uploads
    function add_file_types_to_uploads($file_types){
        $new_filetypes = array();
        $new_filetypes['svg'] = 'image/svg+xml';
        $file_types = array_merge($file_types, $new_filetypes );
        return $file_types;
    }
    add_action('upload_mimes', 'add_file_types_to_uploads');
?>