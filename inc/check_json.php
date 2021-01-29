<?php

// class JsonUtil {
// 	/**
// 	 * From https://stackoverflow.com/a/10252511/319266
// 	 * @return array|false
// 	 */
// 	public static function load($filename) {
// 		$contents = @file_get_contents($filename);
// 		// echo $contents;
// 		if ($contents === false) {
// 			return false;
// 		}
// 		return json_decode(self::stripComments($contents), true);
// 	}
// 	/**
// 	 * From https://stackoverflow.com/a/10252511/319266
// 	 * @param string $str
// 	 * @return string
// 	 */
// 	protected static function stripComments($str) {
// 		return preg_replace('![ \t]*//.*[ \t]*[\r\n]!', '', $str);
// 	}
// }

/**
 * Clean comments of json content and decode it with json_decode().
 * Work like the original php json_decode() function with the same params
 *
 * @param   string  $json    The json string being decoded
 * @param   bool    $assoc   When TRUE, returned objects will be converted into associative arrays.
 * @param   integer $depth   User specified recursion depth. (>=5.3)
 * @param   integer $options Bitmask of JSON decode options. (>=5.4)
 * @return  array/object
 */

function json_clean_decode($json, $assoc = false, $depth = 512, $options = 0) {

	// search and remove comments like /* */ and //
	$json = preg_replace("#(/\*([^*]|[\r\n]|(\*+([^*/]|[\r\n])))*\*+/)|([\s\t]//.*)|(^//.*)#", '', $json);
	echo $json;
	return json_decode($json, true);

	// if (version_compare(phpversion(), '5.4.0', '>=')) {
	// 	return json_decode($json, $assoc, $depth, $options);
	// } elseif (version_compare(phpversion(), '5.3.0', '>=')) {
	// 	return json_decode($json, $assoc, $depth);
	// } else {
	// 	return json_decode($json, $assoc);
	// }
}
$json = file_get_contents('bla.json');
// echo $json;
$a = json_clean_decode($json);
echo var_export($a);

?>