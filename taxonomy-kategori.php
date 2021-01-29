<?php get_header(); ?>
<div class="archives">
	<div class="container">
		<div class="row">
			<div class="archives-title h3"><?php the_archive_title(); ?></div>
			<div class="col-md-8">
				<?php
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$q = new WP_Query([
				'post_type' => 'food_menu',
				'posts_per_page' => get_option('posts_per_page'),
				get_query_var( 'taxonomy' ) => get_query_var( 'term' ),
				'paged' => $paged
				]);
				$temp_query = $wp_query;
				$wp_query = null;
				$wp_query = $q;

				?>
				<?php while ( $q->have_posts() ) : $q->the_post(); ?>
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
				<?php wp_reset_postdata(); ?>
				<nav class="pagination">
					<?php echo paginate_links(); ?>
				</nav>
				<?php $wp_query = $temp_query; ?>

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
