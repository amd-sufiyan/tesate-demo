<?php defined('ABSPATH') || exit;

require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';

class MsgTableList extends WP_List_Table {

	public function prepare_items() {
		$orderby = isset($_GET['orderby']) ? trim($_GET['orderby']) : "";
		$order = isset($_GET['order']) ? trim($_GET['order']) : "";
		$search_term = isset($_POST['s']) ? trim($_POST['s']) : "";

		$data = $this->wp_list_table_data($orderby, $order, $search_term);

		$per_page = 10;
		$curent_page = $this->get_pagenum();
		$total_items = count($data);

		$this->set_pagination_args(array(
			"total_items" => $total_items,
			"per_page" => $per_page,

		));

		$this->items = array_slice($data, (($curent_page - 1) * $per_page), $per_page);

		$this->_column_headers = array($this->get_columns(), array(), $this->get_sortable_columns());
	}

	public function wp_list_table_data($orderby = '', $order = '', $search_term = '') {
		$wpdb = $GLOBALS['wpdb'];
		$table_name = $wpdb->prefix . "tesate_contact_msg";
		$rows = $wpdb->get_results("SELECT * from $table_name");

		$posts_array = array();

		if (count($rows) > 0) {

			foreach ($rows as $index => $post) {
				$posts_array[] = array(
					"id" => $post->id,
					"name" => $post->name,
					"website" => $post->website,
					"email" => $post->email,
					"phone" => $post->phone,
					"message" => $post->message,
				);
			}
		}

		return $posts_array;
	}

	public function get_hidden_columns() {

		// return array("id", "name");
	}

	public function get_sortable_columns() {

		return array(
			"name" => array("name", true),
			"email" => array("email", false),
		);
	}

	public function get_columns() {

		$columns = array(
			"id" => "ID",
			"name" => "Name",
			"website" => "Website",
			"email" => "Email",
			"phone" => "Phone",
			"message" => "Message",

		);

		return $columns;
	}

	public function column_default($item, $column_name) {
		switch ($column_name) {

		case 'id':
		case 'name':
		case 'website':
		case 'email':
		case 'phone':
		case 'message':
			return $item[$column_name];
		default:
			return "no value";
		}
	}

}

class MessageInAdmin {

	function __construct() {
		add_action("admin_menu", array($this, "simple_message_sub_menu"));
	}

	function simple_message_sub_menu() {
		add_submenu_page(
			'tools.php', 'Simple Message', 'Simple Message', 'manage_options', 'simple-message', array(&$this, 'tesate_message_func')
		);
		// add_menu_page("Msg", "Msg", "manage_options", "tesate_message", array( $this, "tesate_message_func"), "dashicons-format-chat");
	}

	function tesate_message_func() {
		$msg_table = new MsgTableList();
		// print(memory_get_usage() . "<br>");

		// ob_start();
		$msg_table->prepare_items();
		echo '<div class="wrap">';
		echo '<h1 class="wp-heading-inline">Msg</h1>';
		echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=tesate_message'>";
		$msg_table->search_box("Search", "search_msg_id");
		echo "</form>";
		$msg_table->display();
		echo "</div>";
		// $template = ob_get_contents();
		// ob_end_clean();

		// echo $template;
		// print(memory_get_usage() . "<br>");
	}
}

new MessageInAdmin();
