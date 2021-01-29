<?php get_header(); ?>
<div class="hero hero-blogs">
	<div class="hero-inner"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="display-4"><?php _e('All Foods'); ?></h1>
			</div>
		</div>
	</div>
</div>
<div class="sidebar-top">
	<div class="container">
		<div class="row">
			<?php is_active_sidebar("sidebar-top") ? dynamic_sidebar("sidebar-top") : ""; ?>
		</div>
	</div>
</div>
<div class="blogs">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<?php $foodMenu = new WP_Query(
						array(
							"paged" => get_query_var("paged"),
							"post_type" => "food_menu",
							"posts_per_page" => "4",
						)
					);?>
					<?php if( $foodMenu->have_posts() ): while($foodMenu->have_posts()) : $foodMenu->the_post(); ?>
						<div class="col-md-6">
							<div class="blog">
								<div class="blog-thumb"><img class="blog-thumb-img" src="<?php the_post_thumbnail_url(); ?>" alt=""></div>
								<div class="blog-body">
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

									<h1 class="h3 blog-title"><?php the_title(); ?></h1>
									<div class="sblog-author">
										
										<a class="author-name" href="<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>"><?php the_author(); ?></a>
										<span class="author-date"><?php the_date("d,m,Y"); ?></span>
										<small class="author-time"><?php the_time("h:i"); ?></small>
									</div>
									<p class="blog-text"><?php Tesate::the_trim_chars( get_the_content() , 200 ); ?></p>
									<div class="fx-end"><a class="btn btn-base" href="<?php the_permalink();?>"><?php _e('Read More'); ?></a></div>
								</div>

							</div>
						</div>
					<?php endwhile; ?>
					<?php else: ?>
						<?php get_template_part(""); ?>
					<?php endif; ?>

					<nav class="pagination">
						<?php echo paginate_links(array("total" => $foodMenu->max_num_pages )); ?>
					</nav>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<?php is_active_sidebar("sidebar-right") ? dynamic_sidebar("sidebar-right") : ''; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_template_part('testimony'); ?>
<?php get_footer(); ?>