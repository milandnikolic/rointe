<?php /* Template Name: Installer locations */ get_header(); ?>
<?php 
	//vars
	$page_title_in_the_banner = get_field('page_title_in_the_banner');
	$page_subtitle_in_the_banner = get_field('page_subtitle_in_the_banner');
	$title_locator = get_field('title_locator');
	$shortcode_for_locator = get_field('shortcode_for_locator');
	$left_section_title = get_field('left_section_title');
	$left_section_text = get_field('left_section_text');
	$smaller_image = get_field('smaller_image');
	$bigger_image = get_field('bigger_image');
	$right_section_title = get_field('right_section_title');
	$right_section_text = get_field('right_section_text');
	$contact_form_7_shorcode = get_field('contact_form_7_shorcode');
	$contact_form_7_title = get_field('contact_form_7_title');
	$contact_form_7_text = get_field('contact_form_7_text');

?>

<div class="ultra-wide-container pdt-33">
	<div class="container">
		<div class="installers-banner bg-green pos-relative">
			<div class="vertical-align-center">
				<h1 class="text-center text-bold"><?php echo $page_title_in_the_banner; ?></h1>
				<h3 class="text-center"><?php echo $page_subtitle_in_the_banner; ?></h3>
			</div>
		</div>

	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<div class="content-wrapper">
				<?php the_content(); ?>
			</div>

		<?php endwhile; ?>

	<?php endif; ?>

		<?php if( !empty($shortcode_for_locator) ): ?>
		<div class="locator-wrapper">
			<h3 class="text-bold mgb-25"><?php echo $title_locator; ?></h3>
			<?php echo do_shortcode( $shortcode_for_locator ); ?>
		</div>
		<?php endif; ?>
	</div> <!-- /container -->
</div>	

	<div class="content-section">
		<div class="container">
			<div class="row">
				<?php if( !empty($smaller_image) ): ?>
					<div class="col-md-8 text-right">
						<h3 class="text-bold mgb-25"><?php echo $left_section_title; ?></h3>
						<?php echo $left_section_text; ?>
					</div>
					
					<div class="col-md-4">
						<img src="<?php echo $smaller_image['url']; ?>"  />
					</div>
				<?php endif; ?>

				<?php if( !empty($bigger_image) ): ?>
					<div class="col-md-6">
						<img src="<?php echo $bigger_image['url']; ?>"  />
					</div>
				<?php endif; ?>
				<div class="col-md-6">
					<h3 class="text-bold mgb-25"><?php echo $right_section_title; ?></h3>
					<?php echo $right_section_text; ?>
				</div>
			</div>
		</div> <!-- /container -->
	</div>
		

	<div class="container-narrow">
		<h5 class="text-bold"><?php echo $contact_form_7_title; ?></h5>
		<?php echo $contact_form_7_text; ?>
		<?php if( $contact_form_7_shorcode ): ?>
			<?php echo do_shortcode( $contact_form_7_shorcode ); ?>
		<?php endif; ?>
	</div>


<?php get_footer(); ?>