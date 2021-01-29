<?php defined('ABSPATH') || exit;

require_once ABSPATH . 'wp-admin/includes/media.php';
require_once ABSPATH . 'wp-admin/includes/file.php';
require_once ABSPATH . 'wp-admin/includes/image.php';

if (!class_exists('AfterSwicthTheme')):

	class AfterSwicthTheme {
		public function __construct() {

			add_action('after_switch_theme', array($this, 'is_need_generate_data'), 11);
			// add_action('after_switch_theme', array($this, 'set_default_logo_img'), 11);
			// add_action('after_switch_theme', array($this, 'generate_first_content'), 12);
			// add_action('after_switch_theme', array($this, 'creat_message_table') );
			// add_action('after_switch_theme', array($this, 'create_newslatter_table') );
			// add_action('after_switch_theme', array($this, 'tesate_after_swicth_theme') );

		}

		public function is_need_generate_data() {
			if (DUMMY_DATA) {

				$this->set_default_logo_img();
				$this->generate_first_content();
			}

		}
		public function set_default_logo_img() {
			$logo_ID = media_sideload_image(get_template_directory_uri() . '/assets/img/tesate.png', 0, '', 'id');
			set_theme_mod('custom_logo', $logo_ID);
			set_theme_mod('footer_about_text', '');

			update_option('widget_footer_about', array(3 => array('footer_about_text' => ''), '_multiwidget' => 1));
			update_option('widget_footer_link', array(2 => array('title' => ''), '_multiwidget' => 1));
			update_option('widget_info', array(2 => array('title' => '', 'email' => 'tesrt@domain.tld', 'phone' => '123456789', 'whatsapp' => '123456766', 'address' => 'Jln. Maju Jaya Madiun  Jatim'), 3 => array('title' => 'Alamat', 'email' => 'tesrt@domain.tld', 'phone' => '3456789', 'whatsapp' => '23456875', 'address' => 'Jln. Maju Mundur, Mandiun, Jatim'), '_multiwidget' => 1));
			update_option('widget_newslatter', array(2 => array('title' => ''), '_multiwidget' => 1));

			update_option('sidebars_widgets', array('wp_inactive_widgets' => array(), 'sidebar-top' => array(), 'sidebar-right' => array(0 => 'recent_food_menu-2'), 'sidebar-contact' => array(0 => 'info-3'), 'sidebar-bottom' => array(), 'footer-1' => array(0 => 'footer_about-3'), 'footer-2' => array(0 => 'footer_link-2'), 'footer-3' => array(0 => 'info-2'), 'footer-4' => array(0 => 'newslatter-2'), 'array_version' => 3));
		}

		public function generate_first_content() {
			// 1. Create Page
			//
			$lorem = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non, rerum doloremque minima ad quam totam saepe laudantium minus nam dolorum, nobis provident tempore, nemo, illum vel porro culpa temporibus? Repellat.';
			$dummy = array(
				$post_array = array(
					// 'comment_status'    =>   'closed',
					// 'ping_status'       =>   'closed',
					'post_author' => 1,
					'post_name' => 'beranda',
					'post_title' => 'Beranda',
					'post_content' => $lorem,
					'post_status' => 'publish',
					'post_type' => 'page',
				),
				$post_array = array(
					// 'comment_status'    =>   'closed',
					// 'ping_status'       =>   'closed',
					'post_author' => 1,
					'post_name' => 'food_menu',
					'post_title' => 'Menu',
					'post_content' => $lorem,
					'post_status' => 'publish',
					'post_type' => 'page',
				),
				$post_array = array(
					// 'comment_status'    =>   'closed',
					// 'ping_status'       =>   'closed',
					'post_author' => 1,
					'post_name' => 'kontak',
					'post_title' => 'Kontak',
					'post_content' => $lorem,
					'post_status' => 'publish',
					'post_type' => 'page',
				),

				$post_array = array(
					// 'comment_status'    =>   'closed',
					// 'ping_status'       =>   'closed',
					'post_author' => 1,
					'post_name' => 'tentang',
					'post_title' => 'Tentang',
					'post_content' => $lorem,
					'post_status' => 'publish',
					'post_type' => 'page',
				),
			);

			$ls_page = [];

			foreach ($dummy as $key => $value) {
				$post_ID = $this->create_dummy_post($value);
				array_push($ls_page, $post_ID);
			}

			update_option('show_on_front', 'page');
			update_option('page_on_front', $ls_page[0]);
			update_option('page_for_posts', $ls_page[1]);

			// print_r($ls_page);
			// //////////////
			// 2. Create Menu
			// //////////////
			$this->menu_header = $this->tesate_create_menu("Header Menu");
			$this->menu_footer = $this->tesate_create_menu("Footer Menu");

			// 3. insert Page to Menu
			foreach ($ls_page as $key => $value) {

				$page = get_post($value); // etc
				$this->insert_page_to_menu_header($page);
				$this->insert_page_to_menu_footer($page);

			}

			$ls_food_menu_id = $this->easy_dummy_post(
				array(
					$post_array = array(

						'post_author' => 1,
						'post_name' => 'sate-betawi',
						'post_title' => 'Sate Betawi',
						'post_content' => $lorem,
						'post_status' => 'publish',
						'post_type' => 'food_menu',
						'comment_status' => 'open',
						'__thumbnail' => 'food_1.jpg',

					),
					$post_array = array(

						'post_author' => 1,
						'post_name' => 'sate-padang',
						'post_title' => 'Sate Padang',
						'post_content' => $lorem,
						'post_status' => 'publish',
						'post_type' => 'food_menu',
						'comment_status' => 'open',
						'__thumbnail' => 'food_2.jpg',

					),
					$post_array = array(

						'post_author' => 1,
						'post_name' => 'sate-papua',
						'post_title' => 'Sate Papua',
						'post_content' => $lorem,
						'post_status' => 'publish',
						'post_type' => 'food_menu',
						'comment_status' => 'open',
						'__thumbnail' => 'food_3.jpg',

					),
				)
			);

			///////////////////////////////
			// 5. Create Dummy Testimony //
			///////////////////////////////
			$ls_testi_id = $this->easy_dummy_post(
				array(
					$post_array = array(
						'post_author' => 1,
						'post_name' => 'sufiyan-ajiwijoyo',
						'post_title' => 'Sufiyan Ajiwijoyo',
						'post_content' => $lorem,
						'post_status' => 'publish',
						'post_type' => 'testimony',
						'__thumbnail' => 'customer_1.jpg',
					),
					$post_array = array(
						'post_author' => 1,
						'post_name' => 'sufiyan-rudyanto',
						'post_title' => 'Sufiyan Rudyanto',
						'post_content' => $lorem,
						'post_status' => 'publish',
						'post_type' => 'testimony',
						'__thumbnail' => 'customer_2.jpg',
					),
					$post_array = array(
						'post_author' => 1,
						'post_name' => 'sufiyan-mangunsastro',
						'post_title' => 'Sufiyan Mangunsastro',
						'post_content' => $lorem,
						'post_status' => 'publish',
						'post_type' => 'testimony',
						'__thumbnail' => 'customer_3.jpg',
					),
				)
			);

		}

		public function tesate_create_menu($menu_name) {
			$menu_exists = wp_get_nav_menu_object($menu_name);
			if (!$menu_exists) {
				$new_menu = wp_create_nav_menu($menu_name);
				return $new_menu;
			} else {
				return $menu_exists;
			}

		}

		public function post_exists_by_slug($post_slug) {
			$args_posts = array(
				'post_type' => 'page',
				'post_status' => 'publish',
				'name' => $post_slug,
				'posts_per_page' => 1,
			);
			$loop_posts = new WP_Query($args_posts);
			if (!$loop_posts->have_posts()) {
				return false;
			} else {
				$loop_posts->the_post();
				return $loop_posts->post->ID;
			}
		}

		public function insert_page_to_menu_header($page) {

			$menuls = wp_get_nav_menu_items($this->menu_header);

			$mn_items = [];

			foreach ($menuls as $key => $value) {
				array_push($mn_items, $value->object_id);
			}

			if (!in_array($page->ID, $mn_items)) {

				wp_update_nav_menu_item($this->menu_header, 0, array(

					'menu-item-object-id' => $page->ID,
					'menu-item-object' => 'page',
					'menu-item-status' => 'publish',
					'menu-item-type' => 'post_type',
				));
			}

		}
		public function insert_page_to_menu_footer($page) {
			$menuls = wp_get_nav_menu_items($this->menu_header);

			$mn_items = [];

			foreach ($menuls as $key => $value) {
				array_push($mn_items, $value->object_id);
			}

			if (!in_array($page->ID, $mn_items)) {

				wp_update_nav_menu_item($this->menu_footer, 0, array(

					'menu-item-object-id' => $page->ID,
					'menu-item-object' => 'page',
					'menu-item-status' => 'publish',
					'menu-item-type' => 'post_type',
				));
			}

		}

		public function create_dummy_post($post_arg) {
			$post_id = -1;
			$loop_posts = new WP_Query(
				array(
					'post_type' => $post_arg['post_type'],
					'post_status' => $post_arg['post_status'],
					'name' => $post_arg['post_name'],
					'posts_per_page' => 1,
				)
			);

			if (!$loop_posts->have_posts()) {
				$post_id = wp_insert_post($post_arg);
				return $post_id;
			} else {
				// echo $loop_posts->post->ID;
				return $loop_posts->post->ID;
			}
		}
		public function easy_dummy_post($dummy_arg) {

			$ls_page = [];
			foreach ($dummy_arg as $key => $value) {

				if ($value['__thumbnail']) {
					$img_thumb = array_remove($value, "__thumbnail");
					// Insert Image To Media
					$thumb_ID = media_sideload_image(get_theme_file_uri('/assets/img/') . $img_thumb, 0, '', 'id');

				}

				$post_ID = $this->create_dummy_post($value);
				array_push($ls_page, $post_ID);

				if ($thumb_ID) {
					// Add Thumbnail
					set_post_thumbnail($post_ID, $thumb_ID);
				}

			}

		}

	} // End Class
endif;

return new AfterSwicthTheme();
