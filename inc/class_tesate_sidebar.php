<?php defined( 'ABSPATH' ) || exit;


if (!class_exists('TesateSidebar')):

	class TesateSidebar {
		/**
		 * Constructor
		 */
		public function __construct() {
			add_action("widgets_init", array($this,"tesate_sidebar"));

		}
		/**
		 * Create Sidebar for this Theme
		 */
		
		public function tesate_sidebar() {
			register_sidebar(array(
				'name' => __('Top Sidebar', 'tesate'),
				// 'description' => __( 'Use ADV here', 'tesate'),
				'id' => 'sidebar-top',
				'class' => '',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));
			// register_sidebar(array(
			// 	'name' => __('Frontpage Sidebar', 'tesate'),
			// 	// 'description' => __( 'Use ADV here', 'tesate'),
			// 	'id' => 'sidebar-frontpage',
			// 	'class' => '',
			// 	'before_widget' => '<div class="widget">',
			// 	'after_widget' => '</div>',
			// 	'before_title' => '<h1 class="h4 widget-title">',
			// 	'after_title' => '</h1>',
			// ));
			/**
			 * Sidebar Sebelah Kanan
			 */
			
			register_sidebar(array(
				'name' => __('Right Sidebar', 'tesate'),
				// 'description' => __( 'Bisa Digunakan Untuk Mempermudah Navigasi', 'tesate'),
				'id' => 'sidebar-right',
				'class' => 'sidebar-right',
				'before_widget' => '<div class="widget"><div class="widget-inner"></div>',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));
			/**
			 * Sidebar Sebelah Kanan
			 */
			register_sidebar(array(
				'name' => __('Contact Sidebar', 'tesate'),
				'id' => 'sidebar-contact',
				'class' => 'sidebar-contact',
				'before_widget' => '<div class="widget"><div class="widget-inner"></div>',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));

			register_sidebar(array(
				'name' => __('Bottom Sidebar', 'tesate'),
				'description' => __( 'Bisa Digunakan Untuk Pasang Iklan', 'tesate'),
				'id' => 'sidebar-bottom',
				'class' => '',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));

			register_sidebar(array(
				'name' => __('Footer 1', 'tesate'),
				'id' => 'footer-1',
				'class' => '',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));
			register_sidebar(array(
				'name' => __('Footer 2', 'tesate'),
				'id' => 'footer-2',
				'class' => '',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));
			register_sidebar(array(
				'name' => __('Footer 3', 'tesate'),
				'id' => 'footer-3',
				// 'description' => __( 'Column Footer Pertama', 'tesate'),
				'class' => '',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));
			register_sidebar(array(
				'name' => __('Footer 4', 'tesate'),
				'id' => 'footer-4',
				'class' => '',
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h1 class="h4 widget-title">',
				'after_title' => '</h1>',
			));

		}
	}
endif;

return new TesateSidebar();
