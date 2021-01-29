<?php get_header(); ?>
<div class="showcase">
	<div class="showcase-inner"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="welcome" data-aos="fade-up">
					<div class="welcome-body">
						<h1 class="h4 welcome-title" data-aos="fade-up" data-aos-delay="500"><?php echo get_theme_mod("welcome_title"); ?></h1>
						<p class="welcome-text" data-aos="fade-up" data-aos-delay="1000"><?php echo get_theme_mod("welcome_text"); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="sidebar-frontpage">
	<div class="container">
		<div class="row">
			<?php is_active_sidebar("sidebar-frontpage") ? dynamic_sidebar("sidebar-frontpage") : ""; ?>
		</div>
	</div>
</div>
<div class="services">
	<div class="container">
		<div class="row">
			<div class="col-md-4" data-aos="fade-up">
				<div class="service">
					<div class="service-inner"></div>
					<div class="service-icon">
						<span><?php echo get_theme_mod("service_icon_1"); ?></span>
					</div>
					<div class="service-body">
						<h3 class="service-title service-title-1"><?php echo get_theme_mod("service_title_1"); ?></h3>
						<p class="service-text service-text-1"><?php echo get_theme_mod("service_text_1"); ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service" data-aos="fade-up" data-aos-delay="500">
					<div class="service-inner"></div>
					<div class="service-icon">
						<span><?php echo get_theme_mod("service_icon_2"); ?></span>
						</div>
					<div class="service-body">
						<h3 class="service-title service-title-2"><?php echo get_theme_mod("service_title_2"); ?></h3>
						<p class="service-text service-text-2"><?php echo get_theme_mod("service_text_2"); ?></p>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="service" data-aos="fade-up" data-aos-delay="1000">
					<div class="service-inner"></div>
					<div class="service-icon">
						<span><?php echo get_theme_mod("service_icon_3"); ?></span>
					</div>
					<div class="service-body">
						<h3 class="service-title service-title-3"><?php echo get_theme_mod("service_title_3"); ?></h3>
						<p class="service-text service-title-3"><?php echo get_theme_mod("service_text_3"); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="spcl-menus">
	<div class="back">
		<div class="back-l"><div class="back-inner"></div></div>
		<div class="back-r"></div>
	</div>
	<div class="front">
		<div class="container">
			<div class="front-l"></div>
			<div class="front-r">
				<h1 class="front-title special-menu-title"><?php echo get_theme_mod("special_menu_title"); ?></h1>
				<p class="front-text special-menu-text"><?php echo get_theme_mod("special_menu_text"); ?></p>
			</div>
		</div>
	</div>
</div>
<div class="foods">
	<div class="container">
		<div class="row">
			<h1 class="foods-title"><?php echo get_theme_mod("food_heading");?></h1>
			<?php $foodMenu = new WP_Query(
					array(
						"post_type" => "food_menu", 
						"posts_per_page" => 3, 
						"orderby" => "rand", 
						"order" => "ASC", 
					) 
			); ?>
			<?php while($foodMenu->have_posts()) : $foodMenu->the_post(); ?>
			<div class="col-md-4">
				<div class="food food-primary">
					<div class="food-thumb">
						<img class="food-thumb-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
					</div>
					<div class="food-body">

						<?php $terms = wp_get_post_terms($post->ID, "kategori", array('fields' => 'all'));
						 
						echo '<div class="term-area">';
			
						foreach ( $terms as $term ) {
						 
								// The $term is an object, so we don't need to specify the $taxonomy.
								$term_link = get_term_link( $term );
								
								// If there was an error, continue to the next term.
								if ( is_wp_error( $term_link ) ) {
										continue;
								}
						 
								// We successfully got a link. Print it out.
								echo '<a class="btn btn-kat" href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
						}
						 
						echo '</div>'; ?>
						 
						<h1 class="h3 food-title"><?php the_title() ?></h1>
						<div class="sblog-author">
						<a class="author-name" href="<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>"><?php the_author(); ?></a>
						<span class="author-date"><?php the_date("d,m,Y"); ?></span>
						<small class="author-time"><?php the_time("h:i"); ?></small>
						</div>
						<p class="food-text"><?php echo wp_trim_words(get_the_content(), 20, ""); ?></p>
						<a class="btn btn-more" href="<?php the_permalink(); ?>"><?php _e('More...', 'tesate') ?></a>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		
		</div>
		
	</div>
</div>
<?php get_template_part("testimony"); ?>

<?php get_footer(); ?>