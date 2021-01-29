<?php defined('ABSPATH') || exit;

if (!class_exists('TesateSetup')):

	class TesateSetup {

		public function __construct() {

			// $this->metabox_io_support();

			add_action('wp_enqueue_scripts', array($this, 'tesate_enqueue_scripts'));
			add_filter('get_search_form', array($this, 'glazom_search_form'));
			add_action('after_setup_theme', array($this, 'tesate_setup'));
			add_action('admin_init', array($this, 'redirectSubsToFrontend'));
			add_action('wp_loaded', array($this, 'noSubsAdminBar'));
			add_action('wp_dashboard_setup', array($this, 'remove_dashboard_widgets'));

			add_filter('manage_posts_columns', array($this, 'add_img_column'));
			add_filter('manage_posts_custom_column', array($this, 'manage_img_column'), 10, 2);

			// remove junk from head
			remove_action('wp_head', 'rsd_link');
			remove_action('wp_head', 'wp_generator');
			remove_action('wp_head', 'feed_links', 2);
			remove_action('wp_head', 'index_rel_link');
			remove_action('wp_head', 'wlwmanifest_link');
			remove_action('wp_head', 'feed_links_extra', 3);
			remove_action('wp_head', 'start_post_rel_link', 10, 0);
			remove_action('wp_head', 'parent_post_rel_link', 10, 0);
			remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

		}

		function add_img_column($columns) {
			$columns['img'] = __('Featured Image');
			return $columns;
		}

		function manage_img_column($column_name, $post_id) {
			if ($column_name == 'img') {
				echo get_the_post_thumbnail($post_id, 'thumb_small');
				// echo get_the_post_thumbnail($post_id, 'thumbnail');
			}
			return $column_name;
		}

		public function remove_dashboard_widgets() {
			// remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   // Right Now
			// remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); // Recent Comments
			// remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');  // Incoming Links
			// remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   // Plugins
			// remove_meta_box('dashboard_quick_press', 'dashboard', 'side');  // Quick Press
			// remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side');  // Recent Drafts
			remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPress blog
			// remove_meta_box('dashboard_secondary', 'dashboard', 'side');   // Other WordPress News
			// use 'dashboard-network' as the second parameter to remove widgets from a network dashboard.
		}

		public function glazom_search_form($form) {
			$form = '<form role="search" class="form-search" action="' . home_url('/') . '" menthod="GET"> <div class="form-group"> <input type="text" name="s" placeholder="Cari" class="form-control"> <button class="btn search-icon" type="submit"><i class="fa fa-search"></i></button> </div> </form>';
			return $form;
		}

		public function tesate_setup() {

			// register_nav_menus( array(
			// 	'primary'   => __( 'Primary Menu', 'storefront' ),
			// 	'secondary' => __( 'Secondary Menu', 'storefront' ),
			// 	'handheld'  => __( 'Handheld Menu', 'storefront' ),
			// ) );
			// add_theme_support( 'custom-header' );
			// load_theme_textdomain( 'tesate', get_template_directory() . '/languages' );

			register_nav_menu('header', 'Header Menu');
			register_nav_menu('footer', 'Footer Menu');
			add_theme_support('title-tag');
			add_theme_support('post-thumbnails');
			add_theme_support('post-formats', array('gallery', 'video'));
			add_theme_support('custom-logo', array('height' => 50, 'width' => 200, 'flex-width' => true)); /*

			 /**
			 * Switch default core markup for search form, comment form, comments, galleries, captions and widgets
			 * to output valid HTML5.
			 */
			add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'widgets'));

			add_theme_support('customize-selective-refresh-widgets');
			// Make Image Custom Size
			add_image_size('landscape', 250, 150, false);
			add_image_size('portrait', 150, 250, false);
			add_image_size('thumb_small', 30, 30, false);
			load_theme_textdomain('tesate', get_template_directory() . '/languages');
		}

		public function tesate_enqueue_scripts() {

			wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', false, NULL, 'all');
			wp_enqueue_style('bs4', get_template_directory_uri() . '/assets/css/bootstrap.css');
			wp_enqueue_style('aos-css', get_template_directory_uri() . '/assets/css/aos.css');
			wp_enqueue_style('owl_css', get_template_directory_uri() . '/assets/css/owl.carousel.min.css');
			wp_enqueue_style('growl_css', get_template_directory_uri() . '/assets/css/jquery.growl.css');
			wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array("bs4"), microtime(), "all");

			// wp_enqueue_script('jquery_', get_theme_file_uri('/assets/js/jquery.min.js'), null, false, true);
			wp_enqueue_script('ts_popper', get_theme_file_uri('/assets/js/popper.min.js'), array("jquery"), false, true);
			wp_enqueue_script('ts_bootstrap', get_theme_file_uri('/assets/js/bootstrap.min.js'), array("jquery"), false, true);
			wp_enqueue_script('ts_owl', get_theme_file_uri('/assets/js/owl.carousel.min.js'), array("jquery"), false, true);
			wp_enqueue_script('ts_growl', get_theme_file_uri('/assets/js/jquery.growl.js'), array("jquery"), false, true);
			wp_enqueue_script('ts_aos', get_theme_file_uri('/assets/js/aos.js'));
			wp_enqueue_script('main_', get_theme_file_uri('/assets/js/main.min.js'), array("jquery"), microtime(), true);
			wp_localize_script('main_', 'ajax_object', array(
				'ajaxurl' => admin_url('admin-ajax.php'),
				'redirecturl' => home_url(),
				'nonce_rest' => wp_create_nonce("wp_rest"),
			));

		}

		// Redirect subscriber accounts out of admin and onto homepage
		function redirectSubsToFrontend() {
			$ourCurrentUser = wp_get_current_user();

			if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
				wp_redirect(site_url('/'));
				exit;
			}
		}

		/**
		 * Hide Admin Bar when user is not Administrator
		 * @return None
		 */

		function noSubsAdminBar() {
			$ourCurrentUser = wp_get_current_user();

			if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
				show_admin_bar(false);
			}
		}
		/**
		 * Add Metabox io to this theme
		 * @return None
		 */

		function metabox_io_support() {
			// Re-define meta box path and URL
			define('RWMB_URL', trailingslashit(get_template_directory_uri() . '/meta-box'));
			define('RWMB_DIR', trailingslashit(get_template_directory() . '/inc/meta-box'));

			// Include the meta box script
			require_once RWMB_DIR . 'meta-box.php';
			include get_template_directory() . '/inc/config-meta-boxes.php';
		}
	}
endif;

return new TesateSetup();