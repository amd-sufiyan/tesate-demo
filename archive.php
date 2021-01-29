<?php get_header(); ?>
<div class="archives">
	<div class="container">
		<div class="row">
			<div class="archives-title h3"><?php the_archive_title(); ?></div>
			<div class="col-md-8">

				<?php $archivePost = new WP_Query(array("post_type" => "post" ) ); ?>
				<?php while($archivePost->have_posts()) : $archivePost->the_post(); ?>
					<a class="archive" href="<?php the_permalink(); ?>">
						<span class="archive-inner"></span>
						<div class="archive-thumb">
							<img class="archive-thumb-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
						</div>
						<div class="archive-body">
							<h1 class="h4 archive-title"><?php the_title(); ?></h1>
							<div class="archive-text"><?php echo wp_trim_words(get_the_content(), 50, ""); ?>.</div>
						</div>
					</a>
				<?php endwhile; ?>
				<nav class="pagination">
					<?php echo paginate_links(array("total" => $archivePost->max_num_pages )); ?>
				</nav>

			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<?php is_active_sidebar("sidebar-right") ? dynamic_sidebar("sidebar-right") : ''; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
