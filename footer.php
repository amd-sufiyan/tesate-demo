
				<div class="__signin__">
					<div class="container">
						<div class="row">
							<div class="col-md-6 offset-md-3">
								<div class="card">
									<h3 class="card-header text-center"><?php _e('Sign In');?></h3>
									<div class="card-body">
										<form action="" method="POST" class="form-signin">
											<div class="form-group">
												<label class="sr-only" for=""><?php _e('Name');?></label>
												<input class="form-control" type="text" placeholder="<?php _e('Your Name');?>" name="signin_username" autocomplete="off" id="signin-username">
												<!-- <small class="form-text text-muted">Lorem ipsum dolor.</small> -->
											</div>
											<div class="form-group">
												<label class="sr-only" for=""><?php _e('Name');?></label>
												<input class="form-control" type="password" placeholder="<?php _e('Password');?>" name="signin_password" autocomplete="off" id="signin-password">
											</div>
											<?php wp_nonce_field("ajax-action-login", "signin_nonce");?>
											<div class="d-flex justify-content-end">
												<button class="btn btn-outline-base" type="submit"><?php _e('Send');?></button>
											</div>
										</form>
									</div>
									<a class="show-signup" href="#"><?php _e('register');?></a>
								</div>
							</div>
						</div>
					</div>
					<div class="ovl"></div>
				</div>
				<div class="__signup__">
					<div class="container">
						<div class="row">
							<div class="col-md-6 offset-md-3">
								<div class="card">
									<h3 class="card-header text-center"><?php _e('Sign Up');?></h3>
									<div class="card-body">
										<form action="" method="POST" class="form-signup">
											<div class="form-group">
												<label class="sr-only" for="signup_username"><?php _e('Username');?></label>
												<input class="form-control" type="text" placeholder="<?php _e('Your Username');?>" name="username" id="signup_username" autocomplete="name">
											</div>
											<div class="form-group">
												<label class="sr-only" for="signup_email"><?php _e('Email');?></label>
												<input class="form-control" type="text" placeholder="<?php _e('Your Email');?>" name="email" id="signup_email"  autocomplete="email">
											</div>
											<div class="form-group">
												<label class="sr-only" for="signup_password1"><?php _e('Password1');?></label>
												<input class="form-control" type="text" placeholder="<?php _e('Your Password1');?>" name="password1" id="signup_password1" autocomplete="off">
											</div>
											<div class="form-group">
												<label class="sr-only" for="signup_password2"><?php _e('Password2');?></label>
												<input class="form-control" type="text" placeholder="<?php _e('Your Password2');?>" name="password2" id="signup_password2" autocomplete="off">
											</div>
											<?php wp_nonce_field("ajax-action-signup", "signup_nonce");?>
											<div class="d-flex justify-content-end">
												<button class="btn btn-outline-base" type="submit"><?php _e('Send');?></button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ovl-signup"></div>
				</div>
				<div class="sidebar-bottom">
					<div class="container">
						<div class="row">
							<?php is_active_sidebar("sidebar-bottom") ? dynamic_sidebar("sidebar-bottom") : "";?>
						</div>
					</div>
				</div>
			</article>
		</main>
		<footer>
			<div class="footer-area" <?php is_active_sidebar("footer-1") || is_active_sidebar("footer-2") || is_active_sidebar("footer-3") || is_active_sidebar("footer-4") ? print('style="padding:5rem 0"') : print("")?>>

				<div class="footer-overlay"></div>
				<?php // get_template_part("footer-area"); ?>
				<div class="container">
					<div class="row">
						<div class="col-md-3"><?php is_active_sidebar("footer-1") ? dynamic_sidebar("footer-1") : '';?></div>
						<div class="col-md-3"><?php is_active_sidebar("footer-2") ? dynamic_sidebar("footer-2") : '';?></div>
						<div class="col-md-3"><?php is_active_sidebar("footer-3") ? dynamic_sidebar("footer-3") : '';?></div>
						<div class="col-md-3"><?php is_active_sidebar("footer-4") ? dynamic_sidebar("footer-4") : '';?></div>
					</div>
				</div>

			</div>


			<div class="copyright">
				<div class="container">&copy; All Right Reserved 2020 <strong><?php bloginfo("name");?></strong></div>
			</div><span class="to-top"><i class="fa fa-chevron-up"></i></span>
		</footer>

		<?php wp_footer();?>

	</body>
</html>
