<?php /* Template Name: Distributors archive page */ get_header(); ?>
<?php
	//vars
	$slide = get_field('category_slider');
	$name_shortcode = get_field('distributors_category_shortcode');
	$image_logo = get_field('distributors_logo'); 
	$vendors_link = get_field('vendors_link'); 
?>

<main role="main">
	<!-- section -->
	<section>
		<div class="ultra-wide-container">
			<div class="container">
				<?php if( !empty($image_logo) ): ?>				
				<div class="distributor-logo text-center img-wrap">

					<?php if( !empty($vendors_link) ): ?>		
					<a href="<?php echo $vendors_link; ?>" target="_blank" class="transition">
					<?php endif; ?>

						<img src="<?php echo $image_logo['url']; ?>" alt="<?php echo $image_logo['alt']; ?>" />

					<?php if( !empty($vendors_link) ): ?>		
					</a>
					<?php endif; ?>

				</div>
				<?php endif; ?>

				<?php if( have_rows('category_slider') ): ?>
				<div class="category-slider-container">
				<div class="category-slider">

					<?php while( have_rows('category_slider') ): the_row(); 

						// vars
						$image = get_sub_field('category_slider_image');
						$title = get_sub_field('category_slider_title');
						$subtitle = get_sub_field('category_slider_subtitle');
						$button_name = get_sub_field('category_slider_button_name');
						$button_url = get_sub_field('category_slider_button_url');

					?>
					<div class="slide-item" style="background:url(<?php echo $image['url']; ?>);">


						<div class="vertical-align-center-right">


									<?php if( $title ): ?>
										<h1 class="white text-bold text-uppercase" data-animation="fadeIn" data-delay="0.33s"><?php echo $title; ?></h1>
									<?php endif; ?>

									<?php if( $subtitle ): ?>
										<h6 class="white text-bold" data-animation="fadeIn" data-delay="0.63s"> <?php echo $subtitle; ?></h6>
									<?php endif; ?>

									<?php if( $button_name ): ?>
										<div class="cat-slider-btn-wrap"  data-animation="fadeIn" data-delay="0.93s">
											<a href="<?php echo $button_url; ?>" class="btn cat-slider-btn text-uppercase transition" >
												<?php echo $button_name; ?> <i class="fa fa-chevron-right" aria-hidden="true"></i>
													
											</a>
										</div>
									<?php endif; ?>									
								
						</div>


					</div>
					<?php endwhile; ?>					
				</div>
					<div class="slider-controllers">
						<div class="next-arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
						<div class="prev-arrow"><i class="fa fa-chevron-left" aria-hidden="true"></i></div>
					</div>
				</div>
				<?php endif; ?>

				<div class="shop-section">
					<div class="row">
						<div class="col-md-3">
							<?php get_sidebar(); ?>
						</div>
						<div class="col-md-9">
							<?php //if( $contact_form_shortcode ): ?>
							<?php /*echo do_shortcode( '[wcmp_product_category vendor="'.$name_shortcode.'" per_page="12" columns="3" orderby="title" order="DESC"
								 operator=""]' );  */
								echo do_shortcode( '[wcmp_recent_products per_page="12" vendor="'.$name_shortcode.'" columns="4" orderby="rand" ]' );
							?>
						</div>
					</div>
				</div>
			</div><!-- /container -->
		</div>
	</section>
	<!-- /section -->
</main>
<?php get_footer(); ?>