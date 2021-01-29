<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo("charset"); ?>">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="<?php bloginfo("description");?>">
		<link rel="stylesheet" href="<?php bloginfo("stylesheet_url"); ?>">
		<?php wp_head(); ?>
		<style>
			.btn-base, .btn-newslatter, .btn-more, .btn-outline-base, .comment-form .comment-response-submit, .to-top:hover, .footer-area h3, .comment-reply-link, .form-search .btn {
				color: <?php echo get_theme_mod("color_primary"); ?>;
			}

			.btn-base:hover, .btn-newslatter:hover, .btn-more:hover, .btn-outline-base:hover, .comment-form .comment-response-submit:hover, .to-top, .service-inner, .blog-share a, .sblog-share a, .found-inner, .archive-inner, .comment-reply-link:hover, .sidebar .widget-inner {
				background-color: <?php echo get_theme_mod("color_primary"); ?>;
			}

			.showcase-inner, .spcl-menus .back-l .back-inner, .hero-inner {
				background-color: <?php echo get_theme_mod("overlay_background"); ?>;
			}

			.food-thumb-img, .blog-thumb-img, .sblog-thumb-img {
				border-left: 1px solid <?php echo get_theme_mod("color_primary"); ?>;
			}

			.food-thumb-img, .blog-thumb-img, .sblog-thumb-img {
				border-bottom: 1px solid <?php echo get_theme_mod("color_primary"); ?>;
			}

			.btn-base, .btn-newslatter, .btn-more, .btn-outline-base, .comment-form .comment-response-submit, .to-top:hover, .comment, .comment-reply-link {
				border: 1px solid <?php echo get_theme_mod("color_primary"); ?>;
			}

			.footer-area .footer-overlay, .copyright {
				background-color: <?php echo get_theme_mod("footer_background_color"); ?>;
			}

			.footer-area, .copyright {
				color: <?php echo get_theme_mod("footer_color"); ?>;
			}

			#header nav {
				background-color: <?php echo get_theme_mod("header_background_color"); ?>;
			}

			.navbar-toggler, #header nav .nav-link {
				color: <?php echo get_theme_mod("header_color"); ?>;
			}

			.showcase {
				background-image: url(<?php echo get_theme_mod("welcome_image"); ?>);
				background-size: cover;
				background-position: center center;
				background-repeat: no-repeat;
			}

			.spcl-menus .back-l {
				background-image: url(<?php echo get_theme_mod("special_menu_image"); ?>);
				background-size: cover;
				background-position: center center;
				background-repeat: no-repeat;
			}

			.hero {
				background-image: url(<?php echo get_theme_mod("hero_image"); ?>);
				background-size: cover;
				background-position: center center;
				background-repeat: no-repeat;
			}

		</style>
		
	</head>
	<body <?php body_class(); ?>>
		
		<header id="header">
			<nav class="navbar navbar-expand-md">
				<div class="container">
					<a class="navbar-brand" href="<?php echo site_url("/"); ?>"><?php Tesate::the_header_logo(); ?></a>
					<div class="navbar-toggler" data-toggle="collapse" data-target="#navNavbar">
						<span><i class="fa fa-ellipsis-v"></i></span>
					</div>
					<?php wp_nav_menu([
						'menu' => 'Header Menu',
						'theme_location' => 'header',
						'container' => 'div',
						'container_id' => 'navNavbar',
						'container_class' => 'collapse navbar-collapse',
						'menu_id' => false,
						'menu_class' => 'navbar-nav ml-auto',
						'depth' => 2,
						'fallback_cb' => 'bs4navwalker::fallback',
						'walker' => new bs4navwalker(),
					]); ?>
					<div class="signup-action">
						<?php if (is_user_logged_in()): ?>
								<a class="btn btn-sm btn-outline-base btn-logout" href="<?php echo wp_logout_url(home_url()); ?>"><?php _e('Logout', 'tesate')?></a>
						<?php else: ?>
								<a class="btn btn-sm btn-outline-base btn-login" id="show_login" href="<?php admin_url("wp-login.php") ?>"><?php _e('Login', 'tesate')?></a>
						<?php endif;?>

					</div>
				</div>
			</nav>
		</header>
		<main>
			<article>