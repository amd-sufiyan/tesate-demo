<?php defined( 'ABSPATH' ) || exit;


class CustomizeString {

	// Used in debug only
	public $use_file = True;

	// A json customize in base64 string 
	public $cstm_string = "WwoKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAiYmFzZSIsICJjb250cm9sIjogImNvbG9yX3ByaW1hcnkiLCAidHlwZSI6ICJjb2xvciIsICJkZWZhdWx0IjogIiNkM2QzZDMiLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJiYXNlIiwgImNvbnRyb2wiOiAiY29sb3Jfc2Vjb25kYXJ5IiwgInR5cGUiOiAiY29sb3IiLCAiZGVmYXVsdCI6ICIjZWVlZWVlIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogImJhc2UiLCAiY29udHJvbCI6ICJoZWFkZXJfYmFja2dyb3VuZF9jb2xvciIsICJ0eXBlIjogImNvbG9yIiwgImRlZmF1bHQiOiAiIzAwMDA4YiIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogImJhc2UiLCAiY29udHJvbCI6ICJoZWFkZXJfY29sb3IiLCAidHlwZSI6ICJjb2xvciIsICJkZWZhdWx0IjogIiNkM2QzZDMiLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAiYmFzZSIsICJjb250cm9sIjogIm92ZXJsYXlfYmFja2dyb3VuZCIsICJ0eXBlIjogImNvbG9yIiwgImRlZmF1bHQiOiAiI2QzZDNkMyIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJiYXNlIiwgImNvbnRyb2wiOiAiZm9vdGVyX2JhY2tncm91bmRfY29sb3IiLCAidHlwZSI6ICJjb2xvciIsICJkZWZhdWx0IjogIiMwMDAwOGIiLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJiYXNlIiwgImNvbnRyb2wiOiAiZm9vdGVyX2NvbG9yIiwgInR5cGUiOiAiY29sb3IiLCAiZGVmYXVsdCI6ICIjZDNkM2QzIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogIndlbGNvbWUiLCAiY29udHJvbCI6ICJ3ZWxjb21lX2ltYWdlIiwgInR5cGUiOiAiaW1hZ2UiLCAiZGVmYXVsdCI6ICIlcy9hc3NldHMvaW1nL2ltYWdlXzEuanBnIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAid2VsY29tZSIsICJjb250cm9sIjogIndlbGNvbWVfdGl0bGUiLCAidHlwZSI6ICJ0ZXh0IiwgImRlZmF1bHQiOiAiV2VsY29tZSBUZXh0IGJsYSB0aWxlIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAid2VsY29tZSIsICJjb250cm9sIjogIndlbGNvbWVfdGV4dCIsICJ0eXBlIjogInRleHRhcmVhIiwgImRlZmF1bHQiOiAiV2VsY29tZSBUZXh0IGJsYSB0ZXh0IiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogdHJ1ZSwgInNlbGVjdG9yIjogIiJ9LAoJCQoJCQoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJzZXJ2aWNlcyIsICJjb250cm9sIjogInNlcnZpY2VfaWNvbl8xIiwgInR5cGUiOiAidGV4dCIsICJkZWZhdWx0IjogIjxpIGNsYXNzJ2ZhIGZhLWNsb2NrLW8nPjwvaT4iLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJzZXJ2aWNlcyIsICJjb250cm9sIjogInNlcnZpY2VfdGl0bGVfMSIsICJ0eXBlIjogInRleHQiLCAiZGVmYXVsdCI6ICIyNCBKYW0iLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJzZXJ2aWNlcyIsICJjb250cm9sIjogInNlcnZpY2VfdGV4dF8xIiwgInR5cGUiOiAidGV4dGFyZWEiLCAiZGVmYXVsdCI6ICJNZWxheWFuaSAyNCBQZW5naXJpbWFuYW4iLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAic2VydmljZXMiLCAiY29udHJvbCI6ICJzZXJ2aWNlX2ljb25fMiIsICJ0eXBlIjogInRleHQiLCAiZGVmYXVsdCI6ICI8aSBjbGFzcydmYSBmYS1jbG9jay1vJz48L2k+IiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAic2VydmljZXMiLCAiY29udHJvbCI6ICJzZXJ2aWNlX3RpdGxlXzIiLCAidHlwZSI6ICJ0ZXh0IiwgImRlZmF1bHQiOiAiMjQgSmFtIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAic2VydmljZXMiLCAiY29udHJvbCI6ICJzZXJ2aWNlX3RleHRfMiIsICJ0eXBlIjogInRleHRhcmVhIiwgImRlZmF1bHQiOiAiTWVsYXlhbmkgMjQgUGVuZ2lyaW1hbmFuIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogInNlcnZpY2VzIiwgImNvbnRyb2wiOiAic2VydmljZV9pY29uXzMiLCAidHlwZSI6ICJ0ZXh0IiwgImRlZmF1bHQiOiAiPGkgY2xhc3MnZmEgZmEtY2xvY2stbyc+PC9pPiIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogInNlcnZpY2VzIiwgImNvbnRyb2wiOiAic2VydmljZV90aXRsZV8zIiwgInR5cGUiOiAidGV4dCIsICJkZWZhdWx0IjogIjI0IEphbSIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogInNlcnZpY2VzIiwgImNvbnRyb2wiOiAic2VydmljZV90ZXh0XzMiLCAidHlwZSI6ICJ0ZXh0YXJlYSIsICJkZWZhdWx0IjogIk1lbGF5YW5pIDI0IFBlbmdpcmltYW5hbiIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgoKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAic3BlY2lhbF9tZW51IiwgImNvbnRyb2wiOiAic3BlY2lhbF9tZW51X2ltYWdlIiwgInR5cGUiOiAiaW1hZ2UiLCAiZGVmYXVsdCI6ICIlcy9hc3NldHMvaW1nL2ltYWdlXzEuanBnIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAic3BlY2lhbF9tZW51IiwgImNvbnRyb2wiOiAic3BlY2lhbF9tZW51X3RpdGxlIiwgInR5cGUiOiAidGV4dCIsICJkZWZhdWx0IjogIlNhdGUgVGFodSIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogInNwZWNpYWxfbWVudSIsICJjb250cm9sIjogInNwZWNpYWxfbWVudV90ZXh0IiwgInR5cGUiOiAidGV4dGFyZWEiLCAiZGVmYXVsdCI6ICJTYXRlIG5pa21hdCB5YW5nIHRhbnBhIG1lbHVrYWkgYmluYXRhbmciLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoKCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogInNvY2lhbF9zaGFyZSIsICJjb250cm9sIjogInNoYXJlX2ZhY2Vib29rIiwgInR5cGUiOiAidGV4dCIsICJkZWZhdWx0IjogIiMiLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJzb2NpYWxfc2hhcmUiLCAiY29udHJvbCI6ICJzaGFyZV90d2l0dGVyIiwgInR5cGUiOiAidGV4dCIsICJkZWZhdWx0IjogIiMiLCAidHJhbnNwb3J0IjogInBvc3RNZXNzYWdlIiwibGFiZWwiOiAiIiwiZGVzYyI6ICIiLCAic2VsX3JlZnJlc2giOiBmYWxzZSwgInNlbGVjdG9yIjogIiJ9LAoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJzb2NpYWxfc2hhcmUiLCAiY29udHJvbCI6ICJzaGFyZV9pbnN0YWdyYW0iLCAidHlwZSI6ICJ0ZXh0IiwgImRlZmF1bHQiOiAiIyIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgoJeyJwYW5lbCI6ICJ0ZXNhdGUiLCAic2VjdGlvbiI6ICJmb290ZXIiLCAiY29udHJvbCI6ICJmb290ZXJfYWJvdXRfdGV4dCIsICJ0eXBlIjogInRleHRhcmVhIiwgImRlZmF1bHQiOiAiIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAiZm9vdGVyIiwgImNvbnRyb2wiOiAiZm9vdGVyX2FkZHJlc3MiLCAidHlwZSI6ICJ0ZXh0YXJlYSIsICJkZWZhdWx0IjogIkpsbi4gTWFuZ2dhIDEyM1xuTWFkaXVuIiwgInRyYW5zcG9ydCI6ICJwb3N0TWVzc2FnZSIsImxhYmVsIjogIiIsImRlc2MiOiAiIiwgInNlbF9yZWZyZXNoIjogZmFsc2UsICJzZWxlY3RvciI6ICIifSwKCXsicGFuZWwiOiAidGVzYXRlIiwgInNlY3Rpb24iOiAiZm9vdGVyIiwgImNvbnRyb2wiOiAiZm9vdGVyX3RscCIsICJ0eXBlIjogInRleHQiLCAiZGVmYXVsdCI6ICIxMjM0NTY3OCIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0sCgl7InBhbmVsIjogInRlc2F0ZSIsICJzZWN0aW9uIjogImZvb3RlciIsICJjb250cm9sIjogImZvb3Rlcl93YSIsICJ0eXBlIjogInRleHQiLCAiZGVmYXVsdCI6ICIxMjM0NTY3OCIsICJ0cmFuc3BvcnQiOiAicG9zdE1lc3NhZ2UiLCJsYWJlbCI6ICIiLCJkZXNjIjogIiIsICJzZWxfcmVmcmVzaCI6IGZhbHNlLCAic2VsZWN0b3IiOiAiIn0KXQ==";

	/**
	 * Convert base64 to arrray for customize register
	 * @return array
	 */
	function get_dict_customize(){
		if( $this->use_file ){

			$filename = trailingslashit(get_template_directory() . '/inc') . "customize.json";
			$handle = fopen($filename, "r");

			$contents = fread($handle, filesize($filename));
			fclose($handle);

			$this_dict = sprintf($contents, get_theme_file_uri());

			return json_decode($this_dict, True);
		}

		$dict = sprintf(base64_decode($this->cstm_string), get_theme_file_uri());
		return json_decode( $dict, true);
	}

	/**
	 * theme_mods for default customize
	 * @return array array of theme_mods
	 */
	function get_theme_mods(){
		global $mods;

		return $mods;
		// return get_theme_mods();
	}
}


$customize = new CustomizeString();


/**
 * Class to handle Customize Register in this Theme
 */
class TesateCustomize {
	function __construct(){
		$this->tesate_after_switch_them();

		add_action( "after_switch_theme", array($this, 'tesate_after_switch_them') );
		add_action( "customize_preview_init", array($this, 'ts_customize_preview_init') );
		add_action( "customize_register", array($this, 'tesate_customize_register') );
	}

	function ts_customize_preview_init(){
	wp_enqueue_script('custom-api-preview', get_theme_file_uri('/assets/js/customize_preview.min.js'), array('jquery'), false, true);
	}

	function tesate_customize_register( $wp_customize){
		global $customize;

		require_once dirname( __FILE__ ) . "/class_tesate_customize_control_toggle.php";

		$mods = $customize->get_theme_mods();


		$panel_wrap =[];
		$section_wrap =[];
		/**
		 * Extraxt panel and section from json dict to array
		 */
		foreach($customize->get_dict_customize() as $key => $value ){
			$panel_wrap[] = $value["panel"];
			$section_wrap[] = array($value["panel"], $value["section"]);
		}
		/**
		 * Create Panel Customize by looping
		 */
		foreach( array_unique($panel_wrap , SORT_REGULAR ) as $key ){
			$wp_customize->add_panel($key, array(
				"title" => ucwords(str_replace("_", " ", $key)),
				"active_callback" => false,
			));
		}
		/**
		 * Create Section Customize use foreach
		 */
		foreach( array_unique($section_wrap , SORT_REGULAR ) as $key ){
			$wp_customize->add_section($key[1], array(
			"title" => ucwords(str_replace("_", " ", $key[1])),
			"active_callback" => false,
			"panel" => $key[0],
			));
		}

		/**
		 * Loop for setting and control in customize
		 */
		foreach( $customize->get_dict_customize() as $key => $value ){

			$wp_customize->add_setting( $value["control"], array(
				"default" => $mods[ $value["control"] ] ? $mods[ $value["control"] ] : $value["default"],
				// "default" => $value["default"] ? $value["default"] : $value["control"],
				"transport" => $value["transport"],
				"type" => "theme_mod",
			));

			if( $value["type"] == "text"){
				$wp_customize->add_control( $value["control"], array(
					"label" => ucwords(str_replace("_", " ", $value["label"] ? $value["label"] : $value["control"])),
					"section" => $value["section"],
					"setting" => $value["section"],
					"type" => $value["type"],
				));

			} elseif( $value["type"] == "color") {
				$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $value["control"], array(
					"label" => ucwords(str_replace("_", " ", $value["label"] ? $value["label"] : $value["control"])),
					"section" => $value["section"],
					"setting" => $value["section"],
					"sanitize_callback" => "sanitize_hex_color"
				)));
			} elseif( $value["type"] == "image") {
				$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $value["control"], array(
					"label" => ucwords(str_replace("_", " ", $value["label"] ? $value["label"] : $value["control"])),
					"section" => $value["section"],
					"setting" => $value["section"],
				)));
			} else {
				$wp_customize->add_control( $value["control"], array(
					"label" => ucwords(str_replace("_", " ", $value["label"] ? $value["label"] : $value["control"])),
					"section" => $value["section"],
					"type" => $value["type"],
				));
			}

			if( $value["sel_refresh"]){
				$wp_customize->selective_refresh->add_partial( $value["control"], array(
					"selector" => "." . $value["selector"] ? $value["selector"] : $value["control"],
					"render_callback" => function(){ return "Selective Refresh Bla"; },
				));
			}

		}

		// Test of Toggle Switch Custom Control
		$wp_customize->add_setting( 'footer_area',
			array(
				'default' => 1,
				'transport' => 'postMessage',
				// 'sanitize_callback' => 'skyrocket_switch_sanitization'
			)
		);
		$wp_customize->add_control( new Toggle_Switch_Custom_control( $wp_customize, 'footer_area',
			array(
				'label' => __( 'Footer Area', 'tesate' ),
				'section' => 'base'
			)
		) );

	}
	/**
	 * Create default option after theme active
	 */
	function tesate_after_switch_them(){
		global $customize;
		if( !get_option("theme_mods_tesata_active") ){
			
			add_option( "theme_mods_tesata_active", True );
			update_option( "users_can_register", "1" );
			update_option( "default_role", "subscriber" );


			foreach( $customize->get_dict_customize() as $indx => $arr ){

				if( ! get_theme_mod( $arr["control"]) ){
					set_theme_mod( $arr["control"], $arr["default"] );
				}

			}
		}

	}
}


new TesateCustomize();