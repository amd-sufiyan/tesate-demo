<?php defined('ABSPATH') || exit;

require_once ABSPATH . 'wp-admin/includes/class-wp-list-table.php';

class NewslatterTableList extends WP_List_Table {

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

		$this->_column_headers = array($this->get_columns());
	}

	public function wp_list_table_data($orderby = '', $order = '', $search_term = '') {
		$wpdb = $GLOBALS['wpdb'];
		$table_name = $wpdb->prefix . "tesate_neswlaters";
		$rows = $wpdb->get_results("SELECT * from $table_name");

		$posts_array = array();

		if (count($rows) > 0) {

			foreach ($rows as $index => $post) {
				$posts_array[] = array(
					"id" => $post->id,
					"email" => $post->email,
				);
			}
		}

		return $posts_array;
	}

	// public function get_hidden_columns() {

	// 	return array("id", "name")
	// }

	public function get_sortable_columns() {

		return array(
			// "title" => array("title", true),
			//"email" => array("email", false)
		);
	}

	public function column_cb($item) {

		return sprintf("<input type='checkbox' name='post' name='%s'>", $item['id']);
	}

	public function column_email($item) {
		$action = array(
			// "edit" => sprintf('<a href="?page=%1$s&action=%2$s&post=%3$s">Edit</a>', $_GET['page'], 'edit', $item['id']),
			"delete" => sprintf('<a href="?page=%1$s&action=%2$s&id=%3$s">Delete</a>', $_GET['page'], 'delete', $item['id']),
		);

		// Use Single Quote to this sprintf format
		return sprintf('%1$s %2$s', $item["email"], $this->row_actions($action));
	}

	public function get_bulk_actions() {

		return array(
			// "email" => ""
		);
	}

	public function get_columns() {

		$columns = array(
			"cb" => "<input type='checkbox'>",
			"id" => "ID",
			"email" => "Email",
			"action" => "Action",

		);

		return $columns;
	}

	public function column_default($item, $column_name) {
		switch ($column_name) {

		case 'id':
		case 'email':
			return $item[$column_name];
		case 'action':
			return sprintf('<a href="?page=%1$s&action=%2$s&id=%3$s">Delete</a>', $_GET['page'], 'delete', $item['id']);
		default:
			return "no value";
		}
	}

}

class NewslatterInAdmin {

	function __construct() {
		add_action("admin_menu", array($this, "tesate_newslatte_in_admin"));
	}

	function tesate_newslatte_in_admin() {
		add_submenu_page("tools.php", "Simple Newslatter", "Simple Newslatter", "manage_options", "simple-newslatter", array($this, "tesate_newslater"));
	}

	function tesate_newslater() {

		$action = isset($_GET['action']) ? trim($_GET['action']) : '';

		if ($action == "delete") {
			$id = isset($_GET['id']) ? intval($_GET['id']) : '';

			$wpdb = $GLOBALS['wpdb'];
			$newslatter = $wpdb->prefix . "tesate_neswlaters";
			$wpdb->delete($newslatter, array('id' => $id));

			$newslatter_table = new NewslatterTableList();

			$newslatter_table->prepare_items();
			echo '<div class="wrap">';
			echo '<h1 class="wp-heading-inline">Newslatter</h1>';
			echo '<hr class="wp-header-end">';
			echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=tesate_newslatter'>";
			$newslatter_table->search_box("Search", "search_newslater_email_id");
			echo "</form>";
			$newslatter_table->display();
			echo "</div>";

		} else {
			$newslatter_table = new NewslatterTableList();

			// ob_start();
			$newslatter_table->prepare_items();
			echo '<div class="wrap">';
			echo '<h1 class="wp-heading-inline">Newslatter</h1>';
			echo '<hr class="wp-header-end">';
			echo "<form method='post' name='frm_search_post' action='" . $_SERVER['PHP_SELF'] . "?page=tesate_newslatter'>";
			$newslatter_table->search_box("Search", "search_newslater_email_id");
			echo "</form>";
			$newslatter_table->display();
			echo "</div>";

			// $template = ob_get_contents();
			// ob_end_clean();

			// echo $template;
			// print(memory_get_usage() . "<br>");

		}

	}
}

new NewslatterInAdmin();
