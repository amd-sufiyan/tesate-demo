<?php defined('ABSPATH') || exit;

class AjaxMessage {

	function error($title = "", $text = "") {
		$message = array();
		$message["status"] = 0;
		$message["title"] = $title;
		$message["text"] = $text;
		echo json_encode($message);
	}

	function success($title = "", $text = "") {
		$message = array();
		$message["status"] = 1;
		$message["title"] = $title;
		$message["text"] = $text;
		echo json_encode($message);
	}
}

if (!class_exists('AjaxInput')):

	class AjaxInput {
		public function __construct() {

			$this->message = new AjaxMessage();

			// Ajax Login
			add_action('wp_ajax_nopriv_ajaxlogin', array($this, 'ajax_login'));

			// Ajax Register
			add_action('wp_ajax_tesate_register_ajax', array($this, 'testate_reg_new_user'));
			add_action('wp_ajax_nopriv_tesate_register_ajax', array($this, 'testate_reg_new_user'));

			// Ajax Newslatter
			add_action('wp_ajax_newslatter_ajax', array($this, 'new_newslatter'));
			add_action('wp_ajax_nopriv_newslatter_ajax', array($this, 'new_newslatter'));

			// Ajax Message Contact
			add_action('wp_ajax_contact_message_ajax', array($this, 'contact_msg_ajax'));
			add_action('wp_ajax_nopriv_contact_message_ajax', array($this, 'contact_msg_ajax'));

		}

		/**
		 * Ajax Login
		 * @return None Handle Ajax Login
		 */
		public function ajax_login() {

			if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'ajax-action-login')) {
				print 'Sorry, your nonce did not verify.';
				exit;
			} else {
				// process form data
				if (is_user_logged_in()) {

					$this->message->error("Login Error", "Anda Masih Logged");

					wp_die();
				}

				$info = array();
				$info['user_login'] = $_POST['username'];
				$info['user_password'] = $_POST['password'];
				$info['remember'] = true;
				$user_signon = wp_signon($info, false);

				is_wp_error($user_signon) ? $this->message->error("Login Error", "Terjadi Kesalahan") : $this->message->success("Login Success", "Now Redirect ...");

				wp_die();
			}
		}

		/**
		 * Ajax Register
		 * @return None Easy Register Acount Use Ajax
		 */
		public function testate_reg_new_user() {

			// Verify nonce
			if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'ajax-action-signup')) {
				die('Ooops, something went wrong, please try again later.');
			}

			if ((!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password1']) && !empty($_POST['password2']))) {
				// Post values
				$username = sanitize_text_field($_POST['username']);
				$email = sanitize_email($_POST['email']);
				$password1 = sanitize_text_field($_POST['password1']);
				$password2 = sanitize_text_field($_POST['password2']);

				/**
				 * IMPORTANT: You should make server side validation here!
				 */
				if ($password1 === $password2) {
					$userdata = array(
						'user_login' => $username,
						'user_pass' => $password1,
						'user_email' => $email,
					);
					$user_id = wp_insert_user($userdata);
					is_wp_error($user_id) ? $this->message->error("Signup Error", "Silahkan Coba Lagi") : $this->message->success("Signup Success", "Silahkan Login");
					exit;

				}
			}
			$this->message->error("Oops Error", "Mohon Isi Dengan Benar");
			die();
		}

		/**
		 * Ajax Newslatter
		 * @return None Newslatter is Great for advertising
		 */
		public function new_newslatter() {

			// Verify nonce
			if (!isset($_POST['newslatter-nonce']) || !wp_verify_nonce($_POST['newslatter-nonce'], 'ajax-action-newslatter')) {
				$this->message->error("Oops Error", "Nonce Tidak Valid");
				die();
			}

			// check_ajax_referer( 'newslater_ajax', $_POST['nonce'] );
			if (!empty($_POST['email'])) {
				$email = sanitize_email($_POST['email']);

				$wpdb = $GLOBALS['wpdb'];

				$newslatter = $wpdb->prefix . "tesate_neswlaters";
				$charset_collate = $wpdb->get_charset_collate();
				require_once ABSPATH . "wp-admin/includes/upgrade.php";

				$sql = "CREATE TABLE IF NOT EXISTS $newslatter (
								`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
								`email` varchar(255) CHARACTER SET utf8 NOT NULL,
								PRIMARY KEY (`id`)
							) $charset_collate;";
				dbDelta($sql);

				$wpdb->insert(
					$newslatter, //table
					array('email' => $email), //data
					array('%s') //data format
				);

				$my_id = $wpdb->insert_id;

				is_wp_error($my_id) ? $this->message->error("Error", "Terjadi Kesalahan ...") : $this->message->success("Success", "Terima Kasih ...");
				exit;

			}
			$this->message->error("Oops Error", "Mohon Isi Dengan Benar");
			die();
		}

		/**
		 * Ajax Message Contact
		 * @return None
		 */
		public function contact_msg_ajax() {

			// Verify nonce
			if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'simple-contact-ajax')) {
				die();
			}

			// check_ajax_referer( 'newslater_ajax', $_POST['nonce'] );

			if (!empty($_POST['email']) && !empty($_POST['message'])) {

				$name = sanitize_text_field($_POST['name']);
				$website = sanitize_text_field($_POST['website']);
				$email = sanitize_email($_POST['email']);
				$phone = sanitize_text_field($_POST['phone']);
				$message = sanitize_text_field($_POST['message']);

				$msg_data = array(
					"name" => $name,
					"website" => $website,
					"email" => $email,
					"phone" => $phone,
					"message" => $message,
				);
				$msg_format = array('%s', '%s', '%s', '%s', '%s');

				$wpdb = $GLOBALS['wpdb'];

				$message = $wpdb->prefix . "tesate_contact_msg";
				$charset_collate = $wpdb->get_charset_collate();
				require_once ABSPATH . "wp-admin/includes/upgrade.php";

				$sql = "CREATE TABLE IF NOT EXISTS $message (
								`id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
								`name` varchar(255) CHARACTER SET utf8 NULL,
								`website` varchar(255) CHARACTER SET utf8 NULL,
								`email` varchar(255) CHARACTER SET utf8 NOT NULL,
								`phone` varchar(255) CHARACTER SET utf8 NULL,
								`message` LONGTEXT CHARACTER SET utf8 NOT NULL,
								PRIMARY KEY (`id`)
							) $charset_collate;";
				dbDelta($sql);

				$wpdb->insert($message, $msg_data, $msg_format);
				$my_id = $wpdb->insert_id;

				is_wp_error($my_id) ? $this->message->error("Error", "Terjadi Kesalahan ...") : $this->message->success("Success", "Terima Kasih ...");
				die();

			}

			$this->message->error("Oops Error", "Mohon Isi Dengan Benar");
			wp_die();

		}

	}
endif;
return new AjaxInput();
