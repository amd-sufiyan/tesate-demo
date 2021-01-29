<?php defined('ABSPATH') || exit;

if (!class_exists('TesatePostType')):

	class TesatePostType {

		public function __construct() {
			// To modify default post
			// add_filter('register_post_type_args', array($this, 'movies_to_films'), 10, 2);
			add_filter('register_post_type_args', array( $this, 'remove_default_post_type'), 0, 2);
			
			// add_action('init', array($this, 'menu_post_type'), 1);
			add_action('init', array($this, 'food_menu_post_type'), 2);
			add_action('init', array($this, 'testimony_post_type'), 3);

			// Register Taxonomy
			add_action('init', array($this, 'food_menu_taxonomy'), 3);
		}
		
		function remove_default_post_type($args, $postType) {
		if ($postType === 'post') {
		$args['public'] = false;
		$args['show_ui'] = false;
		$args['show_in_menu'] = false;
		$args['show_in_admin_bar'] = false;
		$args['show_in_nav_menus'] = false;
		$args['can_export'] = false;
		$args['has_archive'] = false;
		$args['exclude_from_search'] = true;
		$args['publicly_queryable'] = false;
		$args['show_in_rest'] = false;
		}
		return $args;
		}
		
		function movies_to_films($args, $post_type) {

			if ($post_type == 'post') {
				$labels = array(
					'name' => __('Menu', 'tesate'),
					'singular_name' => __('Menu', 'tesate'),
					'add_new' => _x('Tambah Menu', 'tesate', 'tesate'),
					'add_new_item' => __('Tambah Menu', 'tesate'),
					'edit_item' => __('Edit Menu', 'tesate'),
					'new_item' => __('Menu Baru', 'tesate'),
					'view_item' => __('View Menu', 'tesate'),
					'search_items' => __('Search Menu', 'tesate'),
					// 'not_found'          => __( 'Tidak ada Item menu', 'tesate' ),
					// 'not_found_in_trash' => __( 'Tidak ada Item menu di Trash', 'tesate' ),
					// 'parent_item_colon'  => __( 'Parent Menu:', 'tesate' ),
					// 'menu_name'          => __( 'Menu', 'tesate' ),

					// // Overrides the “Featured Image” label
					// 'featured_image' => __('Gambar Menu', 'tesate'),
					// // Overrides the “Set featured image” label
					// 'set_featured_image' => __('Set Gambar Menu', 'tesate'),
					// // Overrides the “Remove featured image” label
					// 'remove_featured_image' => _x('Remove Gambar Menu', 'tesate'),
					// // Overrides the “Use as featured image” label
					// 'use_featured_image' => _x('Gunakan sebagai Gambar Menu', 'tesate'),
				);

				$args['rewrite']['slug'] = 'menus';
				$args['labels'] = $labels;
				$args['menu_icon'] = "dashicons-star-half";
				// printf('<pre>%1$s</pre>', print_r($args, 1));
				// die(); // Kill page
			}

			return $args;
		}

		/**
		 * Register Testimony Post Type
		 */
		public function testimony_post_type() {
			$icon = 'data:image/svg+xml;base64,' . base64_encode('<svg stroke-width="0.501" stroke-linejoin="bevel" fill-rule="evenodd" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" version="1.1" overflow="visible" width="96pt" height="96pt" viewBox="0 0 96 96"> <defs> </defs> <g id="Document" fill="none" stroke="black" font-family="Times New Roman" font-size="16" transform="scale(1 -1)"> <g id="Spread" transform="translate(0 -96)"> <g id="Layer 1"> <path d="M 85.235,19.672 C 87.24,16.485 87.625,13.755 86.389,11.481 C 85.154,9.208 82.638,8.071 78.842,8.071 L 16.967,8.071 C 13.172,8.071 10.656,9.208 9.42,11.481 C 8.185,13.755 8.57,16.485 10.576,19.672 L 37.592,62.267 L 37.592,83.697 L 34.155,83.697 C 33.223,83.697 32.418,84.037 31.737,84.718 C 31.058,85.398 30.717,86.203 30.717,87.134 C 30.717,88.065 31.058,88.871 31.737,89.551 C 32.418,90.233 33.223,90.572 34.155,90.572 L 61.656,90.572 C 62.586,90.572 63.392,90.233 64.072,89.551 C 64.752,88.871 65.093,88.065 65.093,87.134 C 65.093,86.203 64.752,85.398 64.072,84.718 C 63.392,84.037 62.586,83.697 61.656,83.697 L 58.218,83.697 L 58.218,62.267 Z M 43.393,58.613 L 28.783,35.571 L 67.027,35.571 L 52.417,58.613 L 51.342,60.278 L 51.342,83.697 L 44.467,83.697 L 44.467,60.278 Z" fill="#ff0000" stroke="none" stroke-width="0.053" fill-rule="evenodd" stroke-linejoin="miter" marker-start="none" marker-end="none" stroke-miterlimit="79.8403193612775"/> <path d="M 17.05,72.386 L 17.05,72.385 C 17.05,70.212 18.859,68.448 21.087,68.448 L 77.512,68.448 C 79.74,68.448 81.549,70.212 81.549,72.385 L 81.549,72.386 C 81.549,74.559 79.74,76.323 77.512,76.323 L 21.087,76.323 C 18.859,76.323 17.05,74.559 17.05,72.386 Z" fill="#ff0000" stroke="none" stroke-width="0.053" stroke-linejoin="miter" marker-start="none" marker-end="none" stroke-miterlimit="79.8403193612775"/> </g> </g> </g> </svg>');
			$labels = array(
				'name' => __('Testimony', 'tesate'),
				'singular_name' => __('All Testimonies', 'tesate'),
				// 'add_new'            => _x( 'Tambah Testimony', 'tesate', 'tesate' ),
				// 'add_new_item'       => __( 'Tambah Testimony', 'tesate' ),
				// 'edit_item'          => __( 'Edit Testimony', 'tesate' ),
				// 'new_item'           => __( 'Testimony Baru', 'tesate' ),
				// 'view_item'          => __( 'View Testimony', 'tesate' ),
				// 'search_items'       => __( 'Search Testimony', 'tesate' ),
				// 'not_found'          => __( 'Tidak ada Item testimony', 'tesate' ),
				// 'not_found_in_trash' => __( 'Tidak ada Item testimony di Trash', 'tesate' ),
				// 'parent_item_colon'  => __( 'Parent Testimony:', 'tesate' ),
				// 'testimony_name'          => __( 'Testimony', 'tesate' ),

				// Overrides the “Featured Image” label
				// 'featured_image' => __( 'Book Cover Image', 'tesate' ),
				// Overrides the “Set featured image” label
				// 'set_featured_image' => __( 'Set cover image', 'tesate' ),
				// Overrides the “Remove featured image” label
				// 'remove_featured_image' => _x( 'Remove cover image', 'tesate' ),
				// Overrides the “Use as featured image” label
				// 'use_featured_image' => _x( 'Use as cover image', 'tesate' ),
			);

			$args = array(
				'labels' => $labels,
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true,
				'show_in_testimony' => true,
				'show_in_admin_bar' => false,
				'menu_icon' => "dashicons-star-half",
				'show_in_nav_testimonys' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => true,
				'has_archive' => false,
				'query_var' => true,
				'can_export' => true,
				'rewrite' => false,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',

				),
			);

			register_post_type('testimony', $args);

		}
		/**
		 * Register Food Menu Post Type
		 */
		public function food_menu_post_type() {
			$labels = array(
				'name' => __('Food Menu', 'tesate'),
				// 'singular_name' => __('All Food Menus', 'tesate'),
				// 'add_new'            => _x( 'Tambah Food Menu', 'tesate', 'tesate' ),
				// 'add_new_item'       => __( 'Tambah Food Menu', 'tesate' ),
				// 'edit_item'          => __( 'Edit Food Menu', 'tesate' ),
				// 'new_item'           => __( 'Food Menu Baru', 'tesate' ),
				// 'view_item'          => __( 'View Food Menu', 'tesate' ),
				// 'search_items'       => __( 'Search Food Menu', 'tesate' ),
				// 'not_found'          => __( 'Tidak ada Item testimony', 'tesate' ),
				// 'not_found_in_trash' => __( 'Tidak ada Item testimony di Trash', 'tesate' ),
				// 'parent_item_colon'  => __( 'Parent Food Menu:', 'tesate' ),
				// 'testimony_name'          => __( 'Food Menu', 'tesate' ),

				// Overrides the “Featured Image” label
				// 'featured_image' => __( 'Book Cover Image', 'tesate' ),
				// Overrides the “Set featured image” label
				// 'set_featured_image' => __( 'Set cover image', 'tesate' ),
				// Overrides the “Remove featured image” label
				// 'remove_featured_image' => _x( 'Remove cover image', 'tesate' ),
				// Overrides the “Use as featured image” label
				// 'use_featured_image' => _x( 'Use as cover image', 'tesate' ),
			);

			$args = array(
				'labels' => $labels,
				'hierarchical' => false,
				'public' => true,
				'show_ui' => true,
				'show_in_rest' => true,
				'show_in_food_menu' => true,
				'show_in_admin_bar' => false,
				'menu_icon' => "dashicons-menu",
				'show_in_nav_food_menu' => true,
				'publicly_queryable' => true,
				'exclude_from_search' => true,
				'has_archive' => true,
				'query_var' => true,
				'can_export' => true,
				'rewrite' => true,
				'supports' => array(
					'title',
					'editor',
					'thumbnail',

				),
			);

			register_post_type('food_menu', $args);

		}

		/**
		 * Register Taxonomy
		 */
		public function food_menu_taxonomy() {

			$labels = array(
				'name' => __('Categories'),
				'menu_name' => __('Categories'),
				'singular_name' => __('All Categories'),
				'search_items' => __('Search Categories'),
				'popular_items' => __('Popular Categories'),
				'all_items' => __('All Categories'),
				'parent_item' => __('Parent Category'),
				'parent_item_colon' => __('Parent Category'),
				'edit_item' => __('Edit Category'),
				'update_item' => __('Update Category'),
				'add_new_item' => __('Add New Category'),
				'new_item_name' => __('New Category Name'),
				'add_or_remove_items' => __('Add or remove Categories'),
				'choose_from_most_used' => __('Choose from most used Categories'),
			);

			$args = array(
				'labels' => $labels,
				'public' => true,
				'show_in_nav_menus' => true,
				'show_admin_column' => false,
				'hierarchical' => true,
				'show_tagcloud' => false,
				'show_ui' => true,
				'query_var' => true,
				'rewrite' => true,
				'query_var' => true,
				'capabilities' => array(),
			);

			register_taxonomy('kategori', array('food_menu'), $args);
		}


	}

return new TesatePostType();
endif;

