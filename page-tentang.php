<?php get_header();?>
				<div class="hero hero-blogs">
					<div class="hero-inner"></div>
					<div class="container">
						<div class="row">
							<div class="col">
								<h1 class="display-4"><?php _e('About');?></h1>
							</div>
						</div>
					</div>
				</div>
				<div class="sidebar-top">
					<div class="container">
						<div class="row">
							<?php is_active_sidebar("sidebar-top") ? dynamic_sidebar("sidebar-top") : "";?>
						</div>
					</div>
				</div>
				<div class="blogs">
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<div class="page">
									<?php while (have_posts()): the_post();?>
											<h1 class="page-title"><?php the_title();?></h1>
											<div class="page-content"><?php the_content();?></div>
										<?php endwhile;?>
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
				<?php get_template_part('testimony');?>
<?php get_footer();?>
