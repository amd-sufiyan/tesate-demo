<?php defined('ABSPATH') || exit;

define('TESATE_VER', '1.0.0');

///////////////////////////////////////////////////////
//              Untuk Generate Contoh Data           //
// Ganti dari 'true' ke 'false' untuk menonaktifkan  //
///////////////////////////////////////////////////////

define('DUMMY_DATA', true);

// Setup for this theme
require_once 'inc/class_tesate.php';

require_once 'inc/class_tesate_post_type.php';
require_once 'inc/class_tesate_setup.php';

require_once 'inc/class_tesate_ajax_input.php';

require_once 'inc/class_after_swicth_theme.php';

// Boostrap4 nav Walker
require_once 'inc/bs4navwalker/bs4navwalker.php';
require_once 'inc/wp-bootstrap4.1-pagination/wp-bootstrap4.1-pagination.php';

require_once 'inc/class_tesate_widget.php';
require_once 'inc/class_tesate_sidebar.php';
require_once 'inc/class_tesate_customize.php';

require_once 'inc/class_tesate_rest_api.php';
require_once 'inc/class_tesate_recent_posts.php';
require_once 'inc/class_tesate_msg_lt.php';
require_once 'inc/class_tesate_newslatter_lt.php';

