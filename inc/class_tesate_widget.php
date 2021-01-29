<?php defined('ABSPATH') || exit;

Class Custom_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
	public function widget($args, $instance) {

		if (!isset($args['widget_id'])) {
			$args['widget_id'] = $this->id;
		}

		$default_title = __('Recent Posts');
		$title = (!empty($instance['title'])) ? $instance['title'] : $default_title;

		/** This filter is documented in wp-includes/widgets/class-wp-widget-pages.php */
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		$number = (!empty($instance['number'])) ? absint($instance['number']) : 5;
		if (!$number) {
			$number = 5;
		}
		$show_date = isset($instance['show_date']) ? $instance['show_date'] : false;

		$r = new WP_Query(

			apply_filters(
				'widget_posts_args',
				array(
					'posts_per_page' => $number,
					'no_found_rows' => true,
					'post_status' => 'publish',
					'ignore_sticky_posts' => true,
				),
				$instance
			)
		);

		if (!$r->have_posts()) {
			return;
		}
		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		$format = current_theme_supports('html5', 'navigation-widgets') ? 'html5' : 'xhtml';

		/** This filter is documented in wp-includes/widgets/class-wp-nav-menu-widget.php */
		$format = apply_filters('navigation_widgets_format', $format);

		if ('html5' === $format) {
			// The title may be filtered: Strip out HTML and make sure the aria-label is never empty.
			$title = trim(strip_tags($title));
			$aria_label = $title ? $title : $default_title;
			echo '<nav role="navigation" aria-label="' . esc_attr($aria_label) . '">';
		}

		echo "<ul>";

		foreach ($r->posts as $recent_post) {

			$post_title = get_the_title($recent_post->ID);
			$title = (!empty($post_title)) ? $post_title : __('(no title)');
			$aria_current = '';

			if (get_queried_object_id() === $recent_post->ID) {
				$aria_current = ' aria-current="page"';
			}

			echo "<li class='widget-item'>";
			echo "<a href='" . the_permalink($recent_post->ID) . "' class='media media-recent-post' " . $aria_current . ">";
			echo "<div class='media-thumb'>";
			echo "<img class='media-thumb-img' src='" . wp_get_attachment_image_url(get_post_thumbnail_id($recent_post->ID)) . "' alt=''>";
			echo "</div>";
			echo "<div class='media-body'>";
			echo "<h6 class='media-title'>" . $title . "</h6>";
			if ($show_date) {
				echo "<span class='post-date'>" . get_the_date('', $recent_post->ID) . "</span>";
			}

			echo "</div>";
			echo "</a>";
			echo "</li>";
		}
		echo "</ul>";

		if ('html5' === $format) {
			echo "</nav>";
		}

		echo $args['after_widget'];
	}
}

class RecentFoodMenu extends WP_Widget {
	public function __construct() {
		$widget_opts = array(
			"description" => "",
			"customize_selective_refresh" => false,
		);

		parent::__construct('recent_food_menu', __('Recent Food Menus'), $widget_opts);

	}

	public function form($instance) {
		$label_title = __("Title:");
		$widget_title = isset($instance['title']) ? $instance['title'] : '';
		$widget_ID = $this->get_field_id('title');
		$widget_name = $this->get_field_name('title');

		echo "<p>" . PHP_EOL;
		echo "	<label for='{$widget_ID}'>{$label_title}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$widget_ID}' type='text' name='{$widget_name}' value='{$widget_title}'>" . PHP_EOL;
		echo "</p>" . PHP_EOL;

	}

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}

	public function widget($args, $instance) {
		$title = (!empty($instance['title'])) ? $instance['title'] : __('Recent Food Menu');

		$rc_fm = new WP_Query(
			array(
				'post_type' => 'food_menu',
				'posts_per_page' => 5,
				'no_found_rows' => true,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
			)
		);

		echo $args['before_widget'];
		echo $args['before_title'];
		echo $title;
		echo $args['after_title'];
		while ($rc_fm->have_posts()) {
			$rc_fm->the_post();
			printf('<a href="%s" class="media media-recent-fm"> <div class="media-thumb"> <img class="media-thumb-img" src="%s" alt=""> </div> <div class="media-body"> <h6 class="media-title">%s</h6><span class="post-date">%s</span> </div> </a>', get_the_permalink(), get_the_post_thumbnail_url(), get_the_title(), get_the_author());

		}

		echo $args['after_widget'];

	}
}

class WP_Widget_Kategori extends WP_Widget {
	public function __construct() {
		$widget_opts = array(
			"description" => "",
			"customize_selective_refresh" => false,
		);

		parent::__construct('kategori', __('Food Kategori'), $widget_opts);

	}

	// public function form($instance) {
	// 	$title = __('Title');
	// 	$w_id = $this->get_field_id('title');
	// 	$w_name = $this->get_field_name('title');

	// 	echo sprintf('<p><label for="%1$s">%3$s</label><input class="widefat" id="%1$s" type="text" name="%2$s" value="%4$s"></p>', $w_id, $w_name, $title, $instance['title']);

	// }

	public function __($str) {return __($str);}
	public function value($str) {return isset($this->_instance[$str]) ? $this->_instance[$str] : '';}
	public function form($instance) {
		$this->_instance = $instance;
		// $widget_title    = isset( $instance['title'] ) ? $instance['title'] : '';

		echo "<p>" . PHP_EOL;
		echo "	<label for='{$this->get_field_id('title')}'>{$this->__('Title:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('title')}' type='text' name='{$this->get_field_name('title')}' value='{$this->value('title')}'>" . PHP_EOL;
		echo "</p>" . PHP_EOL;

	}

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}

	public function widget($args, $instance) {
		$title = (!empty($instance['title'])) ? $instance['title'] : __('Kategori');

		$rc_fm = new WP_Query(
			array(
				'post_type' => 'food_menu',
				'posts_per_page' => 5,
				'no_found_rows' => true,
				'post_status' => 'publish',
				'ignore_sticky_posts' => true,
			)
		);

		echo $args['before_widget'];
		echo $args['before_title'];
		echo $title;
		echo $args['after_title'];
		$terms = get_terms('kategori');

		echo '<div class="widget-kat">';

		foreach ($terms as $term) {

			// The $term is an object, so we don't need to specify the $taxonomy.
			$term_link = get_term_link($term);

			// If there was an error, continue to the next term.
			if (is_wp_error($term_link)) {
				continue;
			}

			// We successfully got a link. Print it out.
			echo '<a class="btn btn-sm btn-outline-base" href="' . esc_url($term_link) . '">' . $term->name . '</a>';
		}

		echo '</div>';

		echo $args['after_widget'];

	}
}

class TST_Widget_Footer_Info extends WP_Widget {
	public function __construct() {
		$widget_opts = array(
			"description" => "",
			"customize_selective_refresh" => false,
		);

		parent::__construct('info', __('Footer Info'), $widget_opts);

	}
	public function __($str) {return __($str);}
	public function value($str) {return isset($this->_instance[$str]) ? $this->_instance[$str] : '';}

	public function form($instance) {
		$this->_instance = $instance;
		// $widget_title    = isset( $instance['title'] ) ? $instance['title'] : '';

		echo "<p>" . PHP_EOL;
		echo "	<label for='{$this->get_field_id('title')}'>{$this->__('Title:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('title')}' type='text' name='{$this->get_field_name('title')}' value='{$this->value('title')}'>" . PHP_EOL;

		echo "	<label for='{$this->get_field_id('email')}'>{$this->__('Email:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('email')}' type='email' name='{$this->get_field_name('email')}' value='{$this->value('email')}'>" . PHP_EOL;

		echo "	<label for='{$this->get_field_id('phone')}'>{$this->__('Phone:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('phone')}' type='text' name='{$this->get_field_name('phone')}' value='{$this->value('phone')}'>" . PHP_EOL;

		echo "	<label for='{$this->get_field_id('whatsapp')}'>{$this->__('Whatsapp:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('whatsapp')}' type='text' name='{$this->get_field_name('whatsapp')}' value='{$this->value('whatsapp')}'>" . PHP_EOL;

		echo "	<label for='{$this->get_field_id('address')}'>{$this->__('Address:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('address')}' type='text' name='{$this->get_field_name('address')}' value='{$this->value('address')}'>" . PHP_EOL;
		echo "</p>" . PHP_EOL;

	}

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	public function check_value($str) {return (!empty($this->instance[$str])) ? $this->instance[$str] : '';}

	public function widget($args, $instance) {
		$this->instance = $instance;
		$title = (!empty($instance['title'])) ? $instance['title'] : __('Info');
		// $check_value = function ($str){ return ( ! empty( $instance[ $str ] ) ) ? $instance[ $str ] : '';};

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		if ($this->check_value('email')) {
			echo "<p class='m-0 py-2'> <i class='fa fa-envelope mr-2'></i> <span class='footer-email'> {$instance['email']}</span></p>";
		}

		if ($this->check_value('phone')) {
			echo "<p class='m-0 py-2'> <i class='fa fa-phone mr-2'></i> <span class='footer-phone'> {$instance['phone']}</span></p>";
		}

		if ($this->check_value('whatsapp')) {
			echo "<p class='m-0 py-2'> <i class='fa fa-whatsapp mr-2'></i> <span class='footer-whatsapp'> {$instance['whatsapp']}</span></p>";
		}

		if ($this->check_value('address')) {
			echo "<p class='m-0 py-2 d-flex'> <i class='mt-1 mr-3 fa fa-map-marker mr-2'></i> <span class='footer-address'> {$instance['address']}</span></p>";
		}

		echo $args['after_widget'];

	}
}

class TST_Widget_Footer_Link extends WP_Widget {
	public function __construct() {
		$widget_opts = array(
			"description" => "",
			"customize_selective_refresh" => false,
		);

		parent::__construct('footer_link', __('Footer Links'), $widget_opts);

	}
	public function __($str) {return __($str);}
	public function value($str) {return isset($this->_instance[$str]) ? $this->_instance[$str] : '';}
	public function form($instance) {
		$this->_instance = $instance;
		// $widget_title    = isset( $instance['title'] ) ? $instance['title'] : '';

		echo "<p>" . PHP_EOL;
		echo "	<label for='{$this->get_field_id('title')}'>{$this->__('Title:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('title')}' type='text' name='{$this->get_field_name('title')}' value='{$this->value('title')}'>" . PHP_EOL;
		echo "</p>" . PHP_EOL;

	}

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	public function check_value($str) {return (!empty($this->instance[$str])) ? $this->instance[$str] : '';}

	public function widget($args, $instance) {
		$this->instance = $instance;
		$title = (!empty($instance['title'])) ? $instance['title'] : __('Links');
		// $check_value = function ($str){ return ( ! empty( $instance[ $str ] ) ) ? $instance[ $str ] : '';};

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		// if ($this->check_value('email')) {
		// 	echo "<p class='m-0 py-2'> <i class='fa fa-envelope mr-2'></i> <span class='footer-email'> {$instance['email']}</span></p>";
		// }

		wp_nav_menu(array(
			"menu" => "Footer Menu",
			"theme_loacation" => "footer",
			'menu_class' => 'footer_menu_wrapper',
			"depth" => 1,
		));

		echo $args['after_widget'];

	}
}

class TST_Widget_Footer_Newslatter extends WP_Widget {
	public function __construct() {
		$widget_opts = array(
			"description" => "",
			"customize_selective_refresh" => false,
		);

		parent::__construct('newslatter', __('Newslatter'), $widget_opts);

	}
	public function __($str) {return __($str);}
	public function value($str) {return isset($this->_instance[$str]) ? $this->_instance[$str] : '';}

	public function form($instance) {
		$this->_instance = $instance;
		// $widget_title    = isset( $instance['title'] ) ? $instance['title'] : '';

		echo "<p>" . PHP_EOL;
		echo "	<label for='{$this->get_field_id('title')}'>{$this->__('Title:')}</label>" . PHP_EOL;
		echo "	<input class='widefat' id='{$this->get_field_id('title')}' type='text' name='{$this->get_field_name('title')}' value='{$this->value('title')}'>" . PHP_EOL;
		echo "</p>" . PHP_EOL;

	}

	public function update($new_instance, $old_instance) {
		return $new_instance;
	}
	public function check_value($str) {return (!empty($this->instance[$str])) ? $this->instance[$str] : '';}

	public function widget($args, $instance) {
		$this->instance = $instance;
		$title = (!empty($instance['title'])) ? $instance['title'] : __('Newslatter');
		// $check_value = function ($str){ return ( ! empty( $instance[ $str ] ) ) ? $instance[ $str ] : '';};

		echo $args['before_widget'];

		if ($title) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo "<form method='POST' class='form-newslatter'>";
		echo "		<div class='form-group'>";
		echo "				<input class='form-control newslatter-email' placeholder='Your Email' name='email'>";
		echo "		</div>";

		wp_nonce_field('ajax-action-newslatter', 'newslatter-nonce');

		echo "		<input type='hidden' name='action' value='newslatter_ajax'>";
		echo "		<input class='btn btn-block btn-newslatter' type='submit' value='" . __('Submit') . "'>";
		echo "</form>";

		echo $args['after_widget'];

	}
}

class TST_Widget_Footer_About extends WP_Widget {
	public function __construct() {
		$widget_opts = array(
			"description" => "",
			"customize_selective_refresh" => false,
		);

		parent::__construct('footer_about', __('Footer About'), $widget_opts);

	}
	public function __($str) {return __($str);}
	public function value($str) {return isset($this->_instance[$str]) ? $this->_instance[$str] : '';}

	public function form($instance) {
		$this->_instance = $instance;
		$widget_title = isset($instance['footer_about_text']) ? $instance['footer_about_text'] : '';

		echo "<p>" . PHP_EOL;
		echo "	<label for='{$this->get_field_id('footer_about_text')}'>{$this->__('About Text:')}</label>" . PHP_EOL;
		echo "	<textarea name='{$this->get_field_name('footer_about_text')}' cols='20' rows='10' class='widefat' id'{$this->get_field_id('footer_about_text')}'>" . get_theme_mod('footer_about_text') . "</textarea>" . PHP_EOL;
		echo "</p>" . PHP_EOL;

	}

	public function update($new_instance, $old_instance) {
		set_theme_mod('footer_about_text', $new_instance['footer_about_text']);
		$new_instance['footer_about_text'] = '';
		return $new_instance;
	}
	public function check_value($str) {return (!empty($this->instance[$str])) ? $this->instance[$str] : '';}

	public function widget($args, $instance) {
		$this->instance = $instance;
		$title = (!empty($instance['title'])) ? $instance['title'] : __('Newslatter');
		// $check_value = function ($str){ return ( ! empty( $instance[ $str ] ) ) ? $instance[ $str ] : '';};

		echo $args['before_widget'];

		// if ($title) {
		// 	echo $args['before_title'] . $title . $args['after_title'];
		// }

		if (has_custom_logo()) {
			$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
			$my_logo = '<img class="custom-logo-in-footer" src="' . $image[0] . '" alt="">';
			echo $my_logo;
		} else {
			echo $args['before_title'] . "__" . $args['after_title'];
			// echo '<h1 class="display-4 blogname-logo">__</h1>';
			// echo '<h1 class="display-4 blogname-logo">' . get_bloginfo('name') . '</h1>';
		}
		echo '<p>' . get_theme_mod('footer_about_text') . '</p>';

		echo $args['after_widget'];

	}
}

/////////////////////////
// Base Widget Trigger //
/////////////////////////
class TesateWidgetInit {

	public function __construct() {
		add_action('widgets_init', array($this, 'tesate_widget_init'));

	}
	public function tesate_widget_init() {

		unregister_widget('WP_Widget_Recent_Posts');
		unregister_widget('WP_Widget_Categories');
		unregister_widget('WP_Widget_Tag_Cloud');
		unregister_widget('WP_Widget_Meta');

		register_widget('RecentFoodMenu');
		register_widget('WP_Widget_Kategori');
		register_widget('TST_Widget_Footer_Info');
		register_widget('TST_Widget_Footer_Link');
		register_widget('TST_Widget_Footer_Newslatter');
		register_widget('TST_Widget_Footer_About');
		// register_widget( 'Custom_Recent_Posts_Widget' );
	}
}

return new TesateWidgetInit();