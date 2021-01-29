<?php get_header();?>
				<div class="hero hero-blog">
					<div class="hero-inner"></div>
					<div class="container">
						<div class="row">
							<h1 class="display-4">Blogs</h1>
						</div>
					</div>
				</div>
				<div class="sblog-section">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="left-sblog">

									<?php while (have_posts()): the_post()?>
											<div class="sblog">
												<div class="sblog-thumb">
													<img class="sblog-thumb-img" src="<?php the_post_thumbnail_url();?>" alt="">
												</div>
												<?php $terms = wp_get_post_terms($post->ID, "kategori", array('fields' => 'all'));

	echo '<div class="term-area">';

	foreach ($terms as $term) {

		// The $term is an object, so we don't need to specify the $taxonomy.
		$term_link = get_term_link($term);

		// If there was an error, continue to the next term.
		if (is_wp_error($term_link)) {
			continue;
		}

		// We successfully got a link. Print it out.
		echo '<a class="btn btn-kat" href="' . esc_url($term_link) . '">' . $term->name . '</a>';
	}

	echo '</div>';?>
												<!-- Remove sblog-meta -->
												<div class="sblog-meta">
													<?php echo get_the_category_list(); ?>
												</div>
												<div class="sblog-share">
													<a class="share-facebook" target="_blank" href="<?php echo get_theme_mod("share_facebook"); ?>"><i class="fa fa-facebook"></i></a>
													<a class="share-twitter" target="_blank" href="<?php echo get_theme_mod("share_twitter"); ?>"><i class="fa fa-twitter"></i></a>
													<a class="share-instagram" target="_blank" href="<?php echo get_theme_mod("share_instagram"); ?>"><i class="fa fa-instagram"></i></a>
												</div>
												<h1 class="h3 sblog-title"><?php the_title();?></h1>
												<div class="sblog-author">

													<a class="author-name" href="<?php echo get_author_posts_url(get_the_author_meta("ID")); ?>"><?php the_author();?></a>
													<span class="author-date"><?php the_date("d,m,Y");?></span>
													<small class="author-time"><?php the_time("h:i");?></small>
												</div>
												<p class="sblog-text"><?php the_content();?></p>
												<div class="sblog-tag">
													<h1 class="tag-heading">tags</h1>

													<?php
	if (has_tag()) {
		echo '<div class="tag">';

		$tags = get_the_tags(get_the_ID());
		foreach ($tags as $tag) {
			echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a> ';
		}

		echo '</div>';
	}
	?>
												</div>
											</div>
											<?php endwhile;?>
									<?php comments_template();?>

								</div>
							</div>
							<div class="col-md-4">
								<div class="sidebar">
									<?php is_active_sidebar("sidebar-right") ? dynamic_sidebar("sidebar-right") : '';?>
								</div>

							</div>
						</div>
					</div>
				</div>
<?php get_footer();?>