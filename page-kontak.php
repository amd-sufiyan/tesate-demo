<?php get_header(); ?>
<div class="hero hero-contact">
	<div class="hero-inner"></div>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="display-4"><?php _e('Contact'); ?></h1>
			</div>
		</div>
	</div>
</div>
<div class="__contact__">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="left-contact">
					<div class="card">
						<div class="card-body">
							<form class="pt-1 form-contact" action="" method="POST">
								<div class="form-group">
									<label class="sr-only" for="id_name"><?php _e('Name'); ?></label>
									<input class="form-control" type="text" autocomplete="name" placeholder="<?php _e('Your Name'); ?>" name="name" id="id_name">
								</div>
								<div class="form-group">
									<label class="sr-only" for="id_email"><?php _e('Email'); ?></label>
									<input class="form-control" type="email" autocomplete="email" placeholder="<?php _e('Your Email'); ?>" name="email" id="id_email_msg">
								</div>
								<div class="form-group">
									<label class="sr-only" for="id_phone"><?php _e('Phone'); ?></label>
									<input class="form-control" type="tel" autocomplete="tel" placeholder="<?php _e('Your Phone'); ?>" name="phone" id="id_phone">
								</div>
								<div class="form-group">
									<label class="sr-only" for="id_website"><?php _e('Website'); ?></label>
									<input class="form-control" type="text" autocomplete="off" placeholder="<?php _e('Your Website'); ?>" name="website" id="id_website">
								</div>
								<div class="form-group">
									<label class="sr-only" for="id_message"><?php _e('Message'); ?></label>
									<textarea class="form-control" rows="8" autocomplete="off" placeholder="<?php _e('Your Message'); ?>" name="message" id="id_message"></textarea>
								</div>

								<?php wp_nonce_field("simple-contact-ajax", "simple-contact-nonce"); ?>

								<div class="d-flex justify-content-end">
									<button class="btn btn-outline-base" type="submit"><?php _e('Send'); ?></button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="right-contact sidebar">
					<?php is_active_sidebar("sidebar-contact") ? dynamic_sidebar("sidebar-contact") : print(''); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_template_part('testimony'); ?>
<?php get_footer(); ?>
