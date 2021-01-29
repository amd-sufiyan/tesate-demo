<?php get_header(); ?>
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

									<?php while(have_posts()) : the_post() ?>
									<div class="sblog">
										<div class="sblog-thumb">
											<img class="sblog-thumb-img" src="<?php the_post_thumbnail_url(); ?>" alt="">
										</div>
										<div class="sblog-meta">
											<?php echo get_the_category_list(); ?>
										</div>
										<div class="sblog-share">
											<a class="share-facebook" href="<?php Tesate::the_mod("share_facebook"); ?>"><i class="fa fa-facebook"></i></a>
											<a class="share-twitter" href="<?php Tesate::the_mod("share_twitter"); ?>"><i class="fa fa-twitter"></i></a>
											<a class="share-instagram" href="<?php Tesate::the_mod("share_instagram"); ?>"><i class="fa fa-instagram"></i></a>
										</div>
										<h1 class="h3 sblog-title"><?php the_title(); ?></h1>
										<div class="sblog-author">
											
											<?php // the_author_posts_link(); ?>
											<a class="author-name" href="<?php echo get_author_posts_url( get_the_author_meta("ID") ); ?>"><?php the_author(); ?></a>
											<span class="author-date"><?php the_date("d,m,Y"); ?></span>
											<small class="author-time"><?php the_time("h:i"); ?></small></div>
										<p class="sblog-text"><?php the_content(); ?></p>
										<div class="sblog-tag">
											<h1 class="tag-heading">tags</h1>

											<?php 
											if ( has_tag() ){
											echo '<div class="tag">';

												$tags = get_the_tags( get_the_ID() );
											foreach ( $tags as $tag ) {
												echo '<a href="' . get_tag_link( $tag->term_id ) . '">' . $tag->name . '</a> ';
											}

											echo '</div>';
											}
											 ?>
										</div>
									</div>
									<?php endwhile; ?>
									<?php comments_template(); ?>
									
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
<?php get_footer(); ?>