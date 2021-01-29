<?php defined( 'ABSPATH' ) || exit;

$mods = get_theme_mods();

// Like dict.pop in Python
function array_remove(array &$arr, $key) {
			if (array_key_exists($key, $arr)) {
					$val = $arr[$key];
					unset($arr[$key]);

					return $val;
			}

			return null;
	}

class Tesate {

	public function the_mod($mod, $default="") {
		global $mods;

		if( $mods[$mod]){
			echo $mods[$mod];
		} else {
			echo $default;
		}
	}

	public function sidebar($sidebar) {
		if (is_active_sidebar($sidebar)): dynamic_sidebar($sidebar);endif;
	}



	public function decode($val) {
		return base64_decode($val);
	}

	/**
	 * Adjust a hex color brightness
	 * Allows us to create hover styles for custom link colors
	 *
	 * @param  strong  $hex   hex color e.g. #111111.
	 * @param  integer $steps factor by which to brighten/darken ranging from -255 (darken) to 255 (brighten).
	 * @return string        brightened/darkened hex color
	 * @since  1.0.0
	 */
	public function adjust($hex, $steps) {
		// Steps should be between -255 and 255. Negative = darker, positive = lighter.
		$steps = max(-255, min(255, $steps));

		// Format the hex color string.
		$hex = str_replace('#', '', $hex);

		if (3 == strlen($hex)) {
			$hex = str_repeat(substr($hex, 0, 1), 2) . str_repeat(substr($hex, 1, 1), 2) . str_repeat(substr($hex, 2, 1), 2);
		}

		// Get decimal values.
		$r = hexdec(substr($hex, 0, 2));
		$g = hexdec(substr($hex, 2, 2));
		$b = hexdec(substr($hex, 4, 2));

		// Adjust number of steps and keep it inside 0 to 255.
		$r = max(0, min(255, $r + $steps));
		$g = max(0, min(255, $g + $steps));
		$b = max(0, min(255, $b + $steps));

		$r_hex = str_pad(dechex($r), 2, '0', STR_PAD_LEFT);
		$g_hex = str_pad(dechex($g), 2, '0', STR_PAD_LEFT);
		$b_hex = str_pad(dechex($b), 2, '0', STR_PAD_LEFT);

		return '#' . $r_hex . $g_hex . $b_hex;
	}

	/**
	 * Show image logo if exists in header
	 * @return echo echo strong tag in no image
	 */
	public static function the_header_logo() {

		if (has_custom_logo()) {
			$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
			$my_logo = '<img class="custom-logo-in-header" src="' . $image[0] . '" alt="">';
			echo $my_logo;
		} else {


			echo '<strong>' . get_bloginfo('name') . '</strong>';
		}
	}
	/**
	 * Show image logo if exists in Footer
	 * @return echo echo strong tag in no image
	 */
	public static function the_footer_logo() {

		if (has_custom_logo()) {
			$image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
			$my_logo = '<img class="custom-logo-in-footer" src="' . $image[0] . '" alt="">';
			echo $my_logo;
		} else {
			echo '<strong>' . get_bloginfo('name') . '</strong>';
		}
	}
	/**
	 * Show image logo if exists in Footer
	 * @return echo echo strong tag in no image
	 */
	public static function the_tags() {

		if ( has_tag() ){
			echo '<div class="tagcloud">';

				$tags = get_the_tags( get_the_ID() );
				foreach ( $tags as $tag ) {
					echo '<a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a> ';
				}

			echo '</div>';

		}
	}
	/**
	 * 
	 * @return echo echo strong tag in no image
	 */
	public static function the_footer_address() {
		global $mods;

		$question = $mods["footer_address"];

		if ( $question ){
			echo '<p class="m-0 py-2"><i class="fa fa-map-marker mr-2"></i><span class="footer-address"> '.$question.'</span></p>';
		} else {
			echo '';

			}
	}
	/**
	 * 
	 * @return echo echo strong tag in no image
	 */
	public static function the_footer_wa() {
		global $mods;

		$question = $mods["footer_wa"];

		if ( $question ){
			echo '<p class="m-0 py-2"><i class="fa fa-whatsapp mr-2"></i> <span class="footer-wa"> '. $question .'</span></p>';
		} else {
			echo '';

			}
	}
	/**
	 * 
	 * @return echo echo strong tag in no image
	 */
	public static function the_footer_tlp() {
		global $mods;

		$question = $mods["footer_tlp"];

		if ( $question ){
			echo '<p class="m-0 py-2"><i class="fa fa-phone mr-2"></i> <span class="footer-tlp"> '. $question .'</span></p>';
		} else {
			echo '';

			}
	}
	/**
	 * 
	 * @return echo echo strong tag in no image
	 */
	public static function the_footer_email() {
		global $mods;

		$question = $mods["footer_email"];

		if ( $question ){
			echo '<p class="m-0 py-2"><i class="fa fa-envelope mr-2"></i><span class="footer-email"> '. $question .'</span></p>';
		} else {
			echo '';

			}
	}
	/**
	 * 
	 * @return echo echo strong tag in no image
	 * <?php echo trim_chars(wp_trim_words(get_the_content(), 30, ""), 7); ?>
	 */
	public static function the_trim_chars( $worlds , $limit ) {

		$excerpt = wp_trim_words( $worlds , 30);
		if (strlen($excerpt) > $limit) {
			echo substr($excerpt, 0, $limit);
		} else {
			echo $excerpt;
		}
	}


} //end Class



