			
			</div> <!-- /main-content -->
			<!-- footer -->
			<footer class="footer" role="contentinfo">

			<?php if( is_woocommerce() || is_front_page() ): ?>

				<div id="footer-newsletter">
				<div class="container">				
				<div id="mc_embed_signup">
				<form action="https://COM.us17.list-manage.com/subscribe/post?u=d9d57e84200c0d635cd32928c&amp;id=3900a94ea9" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
				 <div class="row">
										<div class="col-md-6">
											<h2 class="text-uppercase"><?php _e('subscribe to our'); ?> <b><?php _e('newsletter'); ?></b></h2>
											<p class="text-uppercase"><?php _e("fill out the information below and click 'subscribe'"); ?></p>
										</div>

										<div class="col-md-6">
											<div class="flex">
												<div class="input-wrap">
													<div class="mc-field-group">
														<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Enter your email address">
													</div>
												
													<div class="mc-field-group">
														<input type="text" value="" name="MMERGE4" class="" id="mce-MMERGE4" placeholder="Postal Code">
													</div>								
												</div>
					
											<div id="mce-responses" >
												<div class="response" id="mce-error-response" style="display:none"></div>
												<div class="response" id="mce-success-response" style="display:none"></div>
											</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
										    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_d9d57e84200c0d635cd32928c_3900a94ea9" tabindex="-1" value=""></div>
										   <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn text-uppercase">
				 							</div>   <!--/flex-->
				 						</div><!--/col-md-6-->
				</div>
				</form>

				</div>
				</div> 
				</div> 
				<!--End mc_embed_signup-->

				<div id="footer-products">
					<div class="ultra-wide-container">
						<div class="container">
							<h1 class="text-center text-uppercase"><?php _e('Most popular'); ?></h1>
							<?php echo do_shortcode( '[products limit="5" columns="5" orderby="date" order="DESC" visibility="featured"  ]' ); ?>
						</div>
					</div>
				</div>
			<?php endif; ?>

				<div class="ultra-wide-container">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<a href="<?php echo home_url(); ?>">
									<img src="<?php echo get_template_directory_uri(); ?>/img/logo-footer.png" alt="Logo" class="logo-footer vertical-align-center">
								</a>
							</div>

							<div class="col-md-3">
								<h4 class="footer-title text-uppercase"><?php _e(get_field('company_title', 'option')); ?></h4>
								<div class="white-separator"></div>
								<?php
										//vars
										$company_name = get_field('company_name', 'option');
										$company_address = get_field('company_address', 'option');
										$company_email = get_field('company_email', 'option');
										$company_telephone_1 = get_field('company_telephone_1', 'option');
										$company_telephone_2 = get_field('company_telephone_2', 'option');
										//trim strings
										$str = $company_telephone_1;
										$str = preg_replace('/\D/', '', $str);

										$str2 = $company_telephone_2;
										$str2 = preg_replace('/\D/', '', $str2);
								?>

								<?php if(!empty($company_name)):  ?>
								<p class="text-uppercase"><?php echo $company_name; ?></p>
								<?php endif;  ?>

								<?php if(!empty($company_address)):  ?>
								<p> <?php echo $company_address; ?> </p>
								
								<?php endif;  ?>

								<?php if(!empty($company_email)):  ?>
								<a href="email:<?php echo $company_email; ?>" class="clickable-phone"><?php echo $company_email; ?></a>
								<?php endif;  ?>

								<?php if(!empty($company_telephone_1)):  ?>
								<a href="tel:<?php echo $str; ?>" class="clickable-phone">T. <?php echo $company_telephone_1; ?></a>
								<?php endif;  ?>

								<?php if(!empty($company_telephone_2)):  ?>
								<a href="tel:<?php echo $str2; ?>" class="clickable-phone">F. <?php echo $company_telephone_2; ?></a>
								<?php endif;  ?>

							</div>

							<div class="col-md-3">
								<h4 class="footer-title text-uppercase">our support</h4>
								<div class="white-separator"></div>
								<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
							</div>

							<div class="col-md-3">
								<div class="footer-socials vertical-align-center">
									<?php
										$facebook_link = get_field('facebook_link', 'option');
										$twitter_link = get_field('twitter_link', 'option');
										$instagram_link = get_field('instagram_link', 'option');
										$youtube_link = get_field('youtube_link', 'option');
										$linkedln_link = get_field('linkedln_link', 'option');
										$google_plus_link = get_field('google_plus_link', 'option');
									?>
									<?php if(!empty($facebook_link)):  ?>
									<a href="<?php echo $facebook_link; ?>" target="_blank" >
										<i class="fa fa-facebook" aria-hidden="true"></i>
									</a>
									<?php endif;  ?>

									<?php if(!empty($twitter_link)):  ?>	
									<a href="<?php echo $twitter_link; ?>" target="_blank" >
										<i class="fa fa-twitter" aria-hidden="true"></i>
									</a>
									<?php endif;  ?>	

									<?php if(!empty($instagram_link)):  ?>
									<a href="<?php echo $instagram_link; ?>" target="_blank" >
										<i class="fa fa-instagram" aria-hidden="true"></i>
									</a>
									<?php endif;  ?>	

									<?php if(!empty($youtube_link)):  ?>
									<a href="<?php echo $youtube_link; ?>" target="_blank" >
										<i class="fa fa-youtube-play" aria-hidden="true"></i>
									</a>
									<?php endif;  ?>

									<?php if(!empty($linkedln_link)):  ?>
									<a href="<?php echo $linkedln_link; ?>" target="_blank" >
										<i class="fa fa-linkedin" aria-hidden="true"></i>
									</a>
									<?php endif;  ?>

									<?php if(!empty($google_plus_link)):  ?>
									<a href="<?php echo $google_plus_link; ?>" target="_blank" >
										<i class="fa fa-google-plus" aria-hidden="true"></i>
									</a>
									<?php endif;  ?>																												
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-bottom">
					<div class="container text-center">
						<img src="<?php echo get_template_directory_uri(); ?>/img/paypal.png" alt="PayPal" class="logo-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/visa.png" alt="VISA" class="logo-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/mastercard.png" alt="MasterCard" class="logo-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/discover.png" alt="DISCOVER" class="logo-img">
						<img src="<?php echo get_template_directory_uri(); ?>/img/skrill.png" alt="Skrill" class="logo-img">
					</div>
				</div>
			</footer>
			<!-- /footer -->

		</div>
		<!-- /wrapper -->
		<a href="javascript:" id="return-to-top"><i class="fa fa-arrow-up" aria-hidden="true"></i></a><!-- back to top -->
		<?php wp_footer(); ?>

	</body>
</html>
