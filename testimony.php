<div class="testimony">
	<div class="container">
		<div class="row">
			<div class="testimony-title h3 testimony-heading"><?php echo get_theme_mod('testimony_heading') ?></div>
			<div class="col-md-8">
				<div class="owl-carousel" id="owl-testy">
				<?php $testimony = new WP_Query(array("post_type" => "testimony"));?> 
				<?php if( $testimony->have_posts() ): while($testimony->have_posts()) : $testimony->the_post(); ?>
					<div class="testy">
						<span class="quote-left"><i class="fa fa-quote-left"></i></span>
					<div class="testy-thumb">
						<img class="testy-thumb-img" src="<?php the_post_thumbnail_url(); ?>"  alt="">
					</div>
					<div class="testy-body">
						<h1 class="h3 testy-title"><?php the_title(); ?></h1>
						<div class="testy-text"><?php echo wp_trim_words(get_the_content(), 30, " &raquo;"); ?></div>
					</div>
				</div>
				<?php endwhile; ?>
				<?php else: ?>
					<?php get_template_part(""); ?>
				<?php endif; ?>
				</div>

				
			</div>
			<div class="col-md-4 h100"><span class="quote-right"><i class="fa fa-quote-right"></i></span></div>
		</div>
	</div>
</div>