<?php get_header();?>


<div class="founded">
	<div class="container">
		<div class="row">
			<div class="founded-title h3"><?php echo get_query_var('s'); ?></div>
			<div class="col-md-8">

				<?php $foundedPost = new WP_Query(array("post_type" => "food_menu"));?>
				<?php while ($foundedPost->have_posts()): $foundedPost->the_post();?>
								<a class="found" href="<?php the_permalink();?>">
									<span class="found-inner"></span>
									<div class="found-thumb">
										<img class="found-thumb-img" src="<?php the_post_thumbnail_url();?>" alt="">
									</div>
									<div class="found-body">
										<h1 class="h4 found-title"><?php the_title();?></h1>
										<div class="found-link"><?php the_permalink();?></div>
										<div class="found-text"><?php echo wp_trim_words(get_the_content(), 30, ""); ?>.</div>
									</div>
								</a>
							<?php endwhile;?>
				<nav class="pagination">
					<?php echo paginate_links(array("total" => $foundedPost->max_num_pages)); ?>
				</nav>
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