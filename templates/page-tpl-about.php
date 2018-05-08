<?php /* Template Name: About page */ get_header(); ?>
<?php 
	//vars
	$about_section = get_field('about_section');

?>
<div class="ultra-wide-container">
	<div class="about-page-wrapper">

<?php if( have_rows('about_section') ): ?>

	<?php while( have_rows('about_section') ): the_row(); 

		// vars
		$section_title = get_sub_field('section_title' );
		$section_text = get_sub_field('section_text' );
		$full_width_banner_image = get_sub_field('full_width_banner_image');
		
	?>

	<?php if( !empty($section_title) ): ?>
		<div class="container">
			<div class="flex">
				<div class="about-title flex">
					<h3 class="text-bold"><?php echo $section_title; ?></h3>
				</div>
				<div class="about-text">
					<?php echo $section_text; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>
	
	<?php if( !empty($full_width_banner_image) ): ?>
		<div class="full-width-banner">
			<img src="<?php echo $full_width_banner_image['url']; ?>"  />
		</div>
	<?php endif; ?>

	<?php endwhile; ?>		
<?php endif; ?>

	</div>
</div>
<?php get_footer(); ?>