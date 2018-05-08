<?php /* Template Name: Home */ get_header(); ?>
<div class="ultra-wide-container">
	<div class="container">
<?php
	//vars
	$slide = get_field('slider');
	$home_banners = get_field('home_banners');
?>

	<?php if( have_rows('slider') ): ?>

	<div class="slider-container">
	<div class="slider">

	<?php while( have_rows('slider') ): the_row(); 

		// vars
		$image = get_sub_field('slider_image');
		$left_title = get_sub_field('left_title');
		$left_subtitle = get_sub_field('left_subtitle');
		$right_subtitle = get_sub_field('right_subtitle');
		$right_title = get_sub_field('right_title');
		$link = get_sub_field('slide_link');
		$slide_price = get_sub_field('slide_price');
	?>

		<div class="slide-item">
			
				
			<div class="container">
						
				<div class="row">
					<div class="col-md-4">
						<div class="text-center vertical-align-center">
						<?php if( $left_subtitle ): ?>
							<h3 data-animation="slideInLeft" data-delay="0.1s"><?php echo $left_subtitle; ?></h3>
						<?php endif; ?>

						<?php if( $left_title ): ?>
							<h2 data-animation="slideInLeft" data-delay="0.2s" class="text-uppercase"><?php echo $left_title; ?></h2>
						<?php endif; ?>
						</div>
					</div>
					<div class="col-md-4 img-slide-wrapper">
					<?php if( $link ): ?>
						<a href="<?php echo $link; ?>">
					<?php endif; ?>
							<div class="vertical-align-center slider-img" >
								<img src="<?php echo $image['url']; ?>"  />
							</div>
					<?php if( $link ): ?>
						</a>
					<?php endif; ?>

					<?php if( $slide_price ): ?>
						<div class="circle text-center align-center bg-yellow" data-animation="fadeIn" data-delay="1s">
							<p class="text-uppercase">only for</p>
							<p class="slide-price">$<?php echo $slide_price; ?></p>
							<p class="small">Instalation <br> Ready</p>
						</div>
					<?php endif; ?>
					</div>
					<div class="col-md-4">
						<div class="text-center vertical-align-center">
						<?php if( $right_subtitle ): ?>
							<h4 data-animation="slideInRight" data-delay="0.3s"><?php echo $right_subtitle; ?></h4>
						<?php endif; ?>

						<?php if( $right_title ): ?>
							<h3 data-animation="slideInRight" data-delay="0.4s" class="yellow text-uppercase"><?php echo $right_title; ?></h3>
						<?php endif; ?>
						</div>
					</div>
				</div>
															
							
			</div>
				
			
		</div>


	<?php endwhile; ?>



<?php endif; ?>
	</div>

</div> <!--end of slider container-->

<?php if( have_rows('home_banners') ): ?>
<div id="home-banners">
	<div class="container">
		<div class="row">
			<?php while( have_rows('home_banners') ): the_row(); 

				// vars
				$home_banner_image = get_sub_field('home_banner_image');
				$home_banner_button_text = get_sub_field('home_banner_button_text');
				$home_banner_button_link = get_sub_field('home_banner_button_link');

			?>
				<div class="col-md-4">
					<a href="#">
					<div class="img-wrap">
						
						<img src="<?php echo $home_banner_image['url']; ?>" alt="<?php echo $home_banner_image['alt']; ?>" class="banner img-fit" />
						<div class="overlay">
							<a href="<?php echo $home_banner_button_link; ?>" class="vertical-align-center btn text-uppercase"><?php echo $home_banner_button_text; ?></a>
						</div>
					</div>
					</a>
				</div>

			<?php endwhile; ?>
					
		</div>
	</div>
</div>
<?php endif; ?>


<div class="container pos-relative">
	<h1 class="text-center">The heating company <img src="<?php echo get_template_directory_uri(); ?>/img/cantrust.png" class="trust"></h1>
	<?php 
	function isweekend($date) {
    return (date('N', strtotime($date)) >= 6);
}
		$cache_end_date = "29/01/2018";
		
		//$date=date_create_from_format("j-M-Y","28-Jan-2018");
		$date=date_create_from_format("d/m/Y",$cache_end_date);
$date = date_format($date,"Y/m/d");


$timestamp = strtotime($date);
$weekday= date("l", $timestamp );
$normalized_weekday = strtolower($weekday);
echo $normalized_weekday ;
$holidays = array( "01/01/".date(Y), "01/01/".date(Y, strtotime('+1 year')) );
echo "<br>".date("d/m/Y",easter_date(2018)-86400);
echo "<br>".easter_days(2007);




	if (/* $normalized_weekday == 'sunday'*/in_array($cache_end_date, $holidays)){
 echo "nedelja be";
}	else { echo "jbg";}//echo $check_sunday;
		//$check_sunday = (date('N', strtotime($cache_end_date)) >= 6);
		//echo $check_sunday;
	?>

	

<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
	
	<?php
		if( $terms = get_terms( 'product_cat' ) ) :

			echo '<div class="select-wrapper text-center" >';
			$term_ids = wp_list_pluck($terms, 'term_id');
			echo '<span class="checkedradio"><input type="radio" value="' . $term_ids . '" class="selected-cat" name="categoryfilter" >All</span>';
			foreach ( $terms as $term ) :
				echo '<span><input type="radio" class="selected-cat"  name="categoryfilter" value="' . $term->term_id . '">' . $term->name . '</span>'; // ID of the category as the value of an option
			endforeach;

			echo '</div>';
		endif;
	?>
	
	
	<button class="applyfilter"></button>
	<input type="hidden" name="action" value="myfilter">
	<img src="<?php echo get_template_directory_uri(); ?>/img/eclipse.svg" class="loader-gif vertical-align-center">
</form>

<div id="response">	
<?php echo do_shortcode( '[products limit="12" columns="4" orderby="date" order="DESC" class="quick-sale"  ]' ); ?>
</div>


</div>




	</div>
</div>

<?php get_footer(); ?>