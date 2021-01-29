<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="outer-wrap">
				<?php has_custom_logo() ? Tesate::the_footer_logo() : print('<h3>__</h3>'); ?>
				<div class="inner-wrap">
					<p class="footer-about-text"><?php echo get_theme_mod("footer_about_text"); ?></p>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="outer-wrap">
				<h3><?php _e('Links'); ?></h3>
				<?php wp_nav_menu(array(
				"menu" => "Footer Menu",
				"theme_loacation" => "footer",
				'menu_class' => 'footer_menu_wrapper',
				"depth" => 1,
			)) ?>
			</div>
		</div>

		<div class="col-md-3">
			<div class="outer-wrap">
				<h3><?php _e('Info'); ?></h3>
				<div class="inner-wrap inner-info">
					<?php Tesate::the_footer_email(); ?>
					<?php Tesate::the_footer_tlp(); ?>
					<?php Tesate::the_footer_wa(); ?>
					<?php Tesate::the_footer_address(); ?>
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="outer-wrap">
				<h3><?php _e('Newslater'); ?></h3>
				<div class="inner-wrap">
					<form method="POST" class="form-newslatter">
						<div class="form-group">
							<input class="form-control" placeholder="Your Email" name="newslatter-email" id="newslatter-email">
						</div>
						<?php wp_nonce_field("ajax-action-newslatter", "newslatter-nonce"); ?>
						<input class="btn btn-block btn-newslatter" type="submit" value="<?php _e("Submit"); ?>">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

