<?php

/*  for PRO users! - *
 * Reviewer Plugin v.2
 * Created by Michele Ivani
 */
class RWP_Rating
{
	// Instance of this class
	protected static $instance = null;
	protected $templates_option;

	function __construct()
	{
		$this->plugin_slug = 'reviewer';
		add_action( 'wp_enqueue_scripts', array( $this, 'localize_script') );
	}

	public function localize_script() 
	{
		$action_name = 'rwp_ajax_action_rating';
		wp_localize_script( $this->plugin_slug . '-public-script', 'reviewerRatingObj', array('ajax_nonce' => wp_create_nonce( $action_name ), 'ajax_url' => admin_url('admin-ajax.php'), 'action' => $action_name ) );
		
		$action_name = 'rwp_ajax_action_like';
		wp_localize_script( $this->plugin_slug . '-public-script', 'reviewerLikeObj', array('ajax_nonce' => wp_create_nonce( $action_name ), 'ajax_url' => admin_url('admin-ajax.php'), 'action' => $action_name ) );
		
		$action_name = 'rwp_ajax_action_refresh_captcha';
		wp_localize_script( $this->plugin_slug . '-public-script', 'rwpCaptchaObj', array('ajax_nonce' => wp_create_nonce( $action_name ), 'ajax_url' => admin_url('admin-ajax.php'), 'action' => $action_name ) );
		
	}

	public static function refresh_captcha() {

		$fields = array(
			'post_id',		 	
			'review_id'	
		);

		$res = array( 'code' => 400, 'data'=> array( 'msg' => __( 'The form was not submitted correctly!', 'reviewer' ) ) );

		// Check if fields are set
		foreach ($fields as $key) {
			if( !isset( $_POST[ $key ] ) )
				die( json_encode( $res ) );
		}

		$post_id 	= intval( $_POST['post_id'] );
		$review_id 	= intval( $_POST['review_id'] );

		$captcha = RWP_Captcha::get_instance(); 
		$image = $captcha->generate( $post_id, $review_id );

		$res['code'] = 200;
		$res['captcha'] = $image;
			
		die( json_encode( $res ) );
	}

	public static function ajax_callback_like() {

		$fields = array(
			'post_id',		 	
			'rating_id',	
			'method',
			'user_id'		
		);

		$res = array( 'code' => 400, 'data'=> array( 'msg' => __( 'The form was not submitted correctly!', 'reviewer' ) ) );

		// Check if fields are set
		foreach ($fields as $key) {
			if( !isset( $_POST[ $key ] ) )
				die( json_encode( $res ) );
		}

		$rating_id 	= $_POST['rating_id'];
		$post_id 	= $_POST['post_id'];
		$method 	= $_POST['method'];

		$user 		= wp_get_current_user();
		$user_id 	= (($user instanceof WP_User) && $user->ID == intval($_POST['user_id']) ) ?  $user->ID : 0;; 

		$cookie_name	= 'rwp_like_' . $rating_id . '_' . $user_id;

		// Check if user already rated
		if( isset( $_COOKIE[ $cookie_name ] ) ) {
			$res['data']['msg'] = __( 'You have already rated!', 'reviewer' );
			die( json_encode( $res ) );
		} 

		// Blacklist 
		$blacklist = get_post_meta( $post_id, 'rwp_likes_blacklist', true );

		if( isset( $blacklist[ $rating_id ] ) && in_array( $user_id, $blacklist[ $rating_id ] ) ) {
			$res['data']['msg'] = __( 'You have already rated.', 'reviewer' );
			die( json_encode( $res ) );
		}

		// Likes 
		$likes = get_post_meta( $post_id, 'rwp_likes', true );

		// Check if rating exists
		if( !isset( $likes[ $rating_id ] ) )
			die( json_encode( $res ) );

		// Incrementing count
		if( $method == 'like' ) {
			$likes[ $rating_id ]['yes']++; 
		} else {
			$likes[ $rating_id ]['no']++;
		} 

		// Update
		$process = update_post_meta( $post_id, 'rwp_likes', $likes);

		// Check process res
		if ($process === FALSE) {
			$res['data']['msg'] = __( 'Unable to make like/dislike', 'reviewer' );
			die( json_encode( $res ) );
		}

		// Success!
		$res['code'] = 200;
		$res['data'] = array(
			'msg' => __( 'Done', 'reviewer' ),
			'like' => $likes[ $rating_id ]['yes'],
			'dislike' => $likes[ $rating_id ]['no']
		);

		// Set the cookie
		setcookie( $cookie_name , 'true', time() + 60 * 60 * 24 * 30, '/' );

		// Update Blacklist 
		if( $user_id > 0 ) {
			if( is_array( $blacklist ) ) {
				$blacklist[ $rating_id ][] = $user_id;
			} else {
				$blacklist = array();
				$blacklist[ $rating_id ][] = $user_id;
			}

			update_post_meta( $post_id, 'rwp_likes_blacklist', $blacklist);
		}

		exit(json_encode($res));
	}

	public static function ajax_callback()
	{
		$res = array( 'code' => 400, 'data'=> array( 'msg' => __( 'The form was not submitted correctly', 'reviewer' ) ) );

		if( RWP_DEMO_MODE ) {
			$res['data']['msg'] = __( 'The user review feature is disabled for demo mode.', 'reviewer' );
			die( json_encode( $res ) );
		}

		$fields = array(
			'review_id',
            'post_id',
            'user_id',
            'user_email',
            'scores',
            'user_name',
            'title',
            'comment',
            'method',
            'template',
            'captcha'
        );

        // Check if fields are set
		foreach ($fields as $key) {
			if( !isset( $_POST[ $key ] ) )
				die( json_encode( $res ) );
		}

		// Review ID
		$review_id 	= $_POST['review_id'];

		// Post ID
		$post_id 	= intval( $_POST['post_id'] );

		// User ID 
		$user 		= wp_get_current_user();
		$user_id 	= (($user instanceof WP_User) && $user->ID == intval($_POST['user_id'] ) ) ?  $user->ID : 0;	

		// Cookie name
		$cookie_name 	= 'rwp_rating_' . $post_id .'_' . $review_id .'_' . $user_id;

		// Check if user already rated
		if( isset( $_COOKIE[ $cookie_name ] ) ) {
			$res['data']['msg'] = __( 'You have already rated.', 'reviewer' );
			die( json_encode( $res ) );
		} 

		// Blacklist 
		$blacklist = get_post_meta( $post_id, 'rwp_rating_blacklist', true );

		if( isset( $blacklist[ $post_id . '-' . $review_id ] ) && in_array( $user_id, $blacklist[ $post_id . '-' . $review_id ] ) ) {
			$res['data']['msg'] = __( 'You have already rated!', 'reviewer' );
			die( json_encode( $res ) );
		}

		// Get post reviews 
		$reviews = get_post_meta( $post_id, 'rwp_reviews', true );
		
		// Review
		$review = ( isset( $reviews[ $review_id ] ) ) ? $reviews[ $review_id ] : array();

		// Templates
		$templates_option = RWP_Reviewer::get_option( 'rwp_templates' );

		if( !isset( $templates_option[ $_POST['template'] ] ))
			die( json_encode( $res ) );

		// Preferences
		$preferences_option = RWP_Reviewer::get_option( 'rwp_preferences' );

		// Review Template
		$template = $templates_option[ $_POST['template'] ];
		
		// Review rating options
		//$rating_options = self::review_field( 'review_user_rating_options', $review, true );
		$rating_options = self::template_field('template_user_rating_options', $template, true);

		// Validate form fields
		$errors = array();

		// Captcha
		if( in_array( 'rating_option_captcha', $rating_options ) ) {

			$session_key = 'rwp-captcha-' . $post_id . '-' . $review_id;

			if( !isset( $_SESSION[ $session_key ] ) ) {
				$res['data']['msg'] = __( 'Captcha is not set, contact the Support Team', 'reviewer' );
				die( json_encode( $res ) );
			}

			//echo  $_SESSION[ $session_key ].  ' - ' . $_POST['captcha'];

			if( $_SESSION[ $session_key ] != $_POST['captcha']  ) {

				$captcha = RWP_Captcha::get_instance(); 
				$image = $captcha->generate( $post_id, $review_id );

				$res['code'] = 401;
				$res['data']['msg'] = __( 'Secure code is not correct', 'reviewer' );
				$res['data']['captcha'] = $image;
				die( json_encode( $res ) );
			}
		}

		// Name
		if( in_array( 'rating_option_name', $rating_options ) ) {

			if( $user_id == 0 ) {

				$user_name = trim( $_POST['user_name'] );

				if( empty( $user_name ) ) 
					$errors[] = __( 'Your name is required', 'reviewer' );

				//$user_name = wp_kses_post( $user_name );
				$user_name = sanitize_text_field( stripslashes_deep( $user_name ) );
			} else 
				$user_name = '';

		} else {
			$user_name = '';
		}

		// Email 
		if( in_array( 'rating_option_email', $rating_options ) ) {

			if( $user_id == 0 ) {

				$email = trim( $_POST['user_email'] );

				if( empty( $email ) ) {
					$errors[] = __( 'Your email is required', 'reviewer' );
				} elseif( !is_email( $email ) )
				    $errors[] = __( 'Your email is not valid', 'reviewer' );

			} else {
				$email = '';
			}

		} else 
			$email = '';


		// Title 
		if( in_array( 'rating_option_title', $rating_options ) ) {

			$title = trim( $_POST['title'] );

			if( empty( $title ) ) 
				$errors[] = __( 'A review title is required', 'reviewer' );

			$title = sanitize_text_field( stripslashes_deep( $title ) );

			// Check limits
			$limit 	= self::preferences_field( 'preferences_rating_title_limits', $preferences_option, true );
			$range 	= explode( '-', $limit );
			$min 	= intval( $range[0] );
			$max 	= ( $range[1] == 'inf' ) ? false : intval( $range[1] );

			$len = strlen( $title );

			if( $len < $min ) {
				$errors[] = sprintf( __( 'The minimum number of characters is %d for review title', 'reviewer' ), $min );
			}

			if( $max !== false && $len > $max ) {
				$errors[] = sprintf( __( 'The maximum number of characters is %d for review title', 'reviewer' ), $max);
			}

			//$title = wp_kses_post( $title );


		} else 
			$title = '';


		// Comment 
		if( in_array( 'rating_option_comment', $rating_options ) ) {

			$comment = trim( $_POST['comment'] );

			if( empty( $comment ) ) 
				$errors[] = __( 'A review comment is required', 'reviewer' );

			$comment = implode( "\n", array_map( 'sanitize_text_field', explode( "\n", stripslashes_deep( $comment ) ) ) );

			// Check limits
			$limit 	= self::preferences_field( 'preferences_rating_comment_limits', $preferences_option, true );
			$range 	= explode( '-', $limit );
			$min 	= intval( $range[0] );
			$max 	= ( $range[1] == 'inf' ) ? false : intval( $range[1] );

			$len = strlen( $comment );

			if( $len < $min ) {
				$errors[] = sprintf( __( 'The minimum number of characters is %d for review comment', 'reviewer' ), $min );
			}

			if( $max !== false && $len > $max ) {
				$errors[] = sprintf( __( 'The maximum number of characters is %d for review comment', 'reviewer' ), $max);
			}

			//$comment = wp_kses_post( $comment );

		} else 
			$comment = '';

		// Method
		$method	 = trim( $_POST['method'] );

		// Criteria count
		$criteria_count = count($template['template_criterias']);

		// Score
		$score = array();

		switch ( $method ) {

			case 'five_stars':
				
				$score_value = floatval($_POST['scores']);

				// Check if the 0 <= score <= 5
				if( $score_value < 0 || $score_value > 5)
					die( json_encode( $res ) );

				$score_value = RWP_Reviewer::get_in_base( 5, $template['template_maximum_score'], $score_value);
				$precision   = RWP_Reviewer::get_decimal_places( self::preferences_field( 'preferences_step', $preferences_option, true ) ); 
				
				$score_value = round( $score_value, $precision );

				$order 		= self::template_field('template_criteria_order', $template, true);
				$criteria 	= self::template_field('template_criterias', $template, true);
				$order 		= ( $order == null ) ? array_keys( $criteria) : $order;

				foreach ($order as $i) {
					$score[ $i ] = $score_value;
				}
				break;

			case 'full_five_stars':

				if( is_array( $_POST['scores'] ) && count( $_POST['scores'] ) == $criteria_count ) {

					foreach ($_POST['scores'] as $s) {

						$score_value = floatval( $s['val'] );

						// Check if the 0 <= score <= 5
						if( $score_value < 0 || $score_value > 5)
							die( json_encode( $res ) );

						$score_value = RWP_Reviewer::get_in_base( 5, $template['template_maximum_score'], $score_value);
						$precision   = RWP_Reviewer::get_decimal_places( self::preferences_field( 'preferences_step', $preferences_option, true ) );

						$score_value = round( $score_value, $precision );

						$score[ $s['i'] ] = $score_value;
					}

				} else {

					for ($i=0; $i < $criteria_count; $i++) { 
						$score[] = 0;
					} 
				}
				break;
			
			default: // Slider rating mode

				if( is_array( $_POST['scores'] ) && count( $_POST['scores'] ) == $criteria_count ) {

					foreach ($_POST['scores'] as $s) {
						$score[ $s['i'] ] = $s['val'];
					}

				} else {

					for ($i=0; $i < $criteria_count; $i++) { 
						$score[] = 0;
					} 
				}
				break;
		}

		// Validate Scores
		$allow_zero_pref = self::preferences_field( 'preferences_rating_allow_zero', $preferences_option, true );

		if( $allow_zero_pref == 'no') {

			foreach ($score as $value) {
				
				if( $value == 0 ) {
					$errors[] = __( 'Scores with zero value are not allowed', 'reviewer' );
					break;
				}
			}
		}

		// Check errors
		if( !empty( $errors ) ) {

			if( in_array( 'rating_option_captcha', $rating_options ) ) {

				$captcha = RWP_Captcha::get_instance(); 
				$image = $captcha->generate( $post_id, $review_id );

				$res['captcha'] = $image;

			} else {
				$res['captcha'] = '';
			}

			$res['code'] = 405;
			$res['data'] = $errors;

			die( json_encode( $res ) );
		}

		// Status
		$moderation = self::preferences_field( 'preferences_rating_before_appears', $preferences_option, true );

		$status = ( $moderation == 'nothing'  ) ? 'published' : 'pending';

		// Update pending count
		if( $status == 'pending' ) {
			$key = 'rwp_pending_ratings';
			$pend_count = get_option( $key, 0 );
			$pend_count++;
			update_option( $key, $pend_count );
		}

		$rating = array(
			'rating_id'				=> uniqid('rwp_rating_'),
			'rating_post_id'		=> $post_id,	 	
			'rating_review_id'		=> $review_id,
			'rating_score'	 		=> $score,	
			'rating_user_id'		=> $user_id,		 	
			'rating_user_name'		=> $user_name,
			'rating_user_email'		=> $email,		 	
			'rating_title'			=> $title,		 		
			'rating_comment'		=> $comment,				 	
			'rating_date'			=> current_time( 'timestamp' ),
			'rating_status'			=> $status,
			'rating_template'		=> $template['template_id'],
		);

		// Save ratings
		$process = add_post_meta( $post_id, 'rwp_rating_' . $review_id, $rating );

		// Check process res
		if ($process === FALSE) {
			$res['data']['msg'] = $template['template_failure_message'];
			die( json_encode( $res ) );
		}

		// Likes 
		$likes = get_post_meta( $post_id, 'rwp_likes', true );

		if( is_array( $likes ) ) {
			$likes[ $rating['rating_id'] ] = array('yes' => 0, 'no' => 0, 'post_id' => $post_id, 'review_id' => $review_id );
		} else {
			$likes = array( '' . $rating['rating_id'] => array('yes' => 0, 'no' => 0, 'post_id' => $post_id, 'review_id' => $review_id ) );
		}

		// Update
		update_post_meta( $post_id, 'rwp_likes', $likes);

		if( $moderation == 'nothing' ) {
			
			// Success!
			$res['code'] = 200;
			$res['data'] = array(
				'msg' => $template['template_success_message'],
				'rating' => $rating,
			);

		} else {

			// Success!
			$res['code'] = 201;
			$res['data'] = array(
				'msg' => self::template_field('template_moderation_message', $template, true),
				'rating' => $rating,
			);

		}
		
		// Set the cookie
		setcookie( $cookie_name , 'true', time() + 60 * 60 * 24 * 30, '/' );

		// Update Blacklist 
		if( $user_id > 0 ) {
			if( is_array( $blacklist ) ) {
				$blacklist[ $post_id . '-' . $review_id ][] = $user_id;
			} else {
				$blacklist = array();
				$blacklist[ $post_id . '-' . $review_id ][] = $user_id;
			}

			update_post_meta( $post_id, 'rwp_rating_blacklist', $blacklist);
		}


		// Notification
		$notification_pref 	= intval( self::preferences_field( 'preferences_notification', $preferences_option, true ) );
		$notification_email = self::preferences_field( 'preferences_notification_email', $preferences_option, true );

		if( $notification_pref > 0 ) { // Check if notification is enabled

			$notification_key 		= 'rwp_notification_ratings';
			$notification_ratings 	= RWP_Reviewer::get_option( $notification_key );
			$notification_ratings[]	= $rating['rating_id'];
			$notification_count	 	= count( $notification_ratings );

			if( $notification_count >= $notification_pref ) {

				$sending = self::send_notification( $notification_ratings, $notification_email );
				
				if( $sending ) {
					update_option( $notification_key, array() );
				} else {
					update_option( $notification_key, $notification_ratings );
				}

			} else {
				update_option( $notification_key, $notification_ratings );
			}
		}

		die( json_encode( $res ) );
	}

	public static function send_notification( $ratings = array(), $email = '' ) 
	{
		if( !is_email( $email ) ) return false;

		$count = count( $ratings );

		$domain_name =  preg_replace('/^www\./','',$_SERVER['SERVER_NAME']);

		$to 		= $email;
		$subject	= '[RWP] New ratings have been posted';
		$headers	= array('From: Reviewer <do-not-reply@' . $domain_name);

		$eol		= "\r\n";

		$message 	 = "Reviewer Wordpress Plugin" . $eol;
		$message    .= "--------------------------------------" . $eol . $eol;
		$message    .= ( $count > 1 ) ? $count . " new ratings have been submitted."  : $count . " new rating has been submitted.";
		$message 	.= " You can manage it inside the Users Ratings page of Reviewer Plugin." . $eol;
		$message    .= $eol . "Reviewer Team". $eol;

		$message = wordwrap( $message, 70, $eol );

		$sending = wp_mail( $to, $subject, $message, $headers );

		return $sending;
	}

	public static function review_field( $field, $review, $return = false ) {

		$default_review = RWP_Reviews_Meta_Box::get_review_fields();

		$value = isset( $review[ $field ] ) ? $review[ $field ] : $default_review[ $field ]['default'];

		if( $return )
			return $value;

		echo $value;
	}

	public static function preferences_field( $field, $preferences, $return = false ) {

		$default_preferences = RWP_Preferences_Page::get_preferences_fields();

		$value = isset( $preferences[ $field ] ) ? $preferences[ $field ] : $default_preferences[ $field ]['default'];

		if( $return )
			return $value;

		echo $value; 
	}

	public static function template_field( $field, $template, $return = false ) {

		$default_template = RWP_Template_Manager_Page::get_template_fields();

		$value = isset( $template[ $field ] ) ? $template[ $field ] : $default_template[ $field ]['default'];

		if( $return )
			return $value;

		echo $value;
	}

	public static function get_instance() 
	{
		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}
}