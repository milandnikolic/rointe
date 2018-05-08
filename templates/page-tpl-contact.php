<?php /* Template Name: Contact page */ get_header(); ?>
<?php 
	//vars
	$contact_left_image = get_field('contact_left_image');
	$contact_title = get_field('contact_title');
	$addresses = get_field('addresses');
	$email = get_field('email');
	$telephone = get_field('telephone');
	$fax = get_field('fax');
	$contact_form_shortcode = get_field('contact_form_shortcode');

	//trim strings
	$fax_click = $fax;
	$str = preg_replace('/\D/', '', $fax_click);
	$tel_click = $telephone;
	$str = preg_replace('/\D/', '', $tel_click);

?>
<div class="ultra-wide-container">
	<div class="container-narrow">
		<div class="row">
			<?php if( !empty($contact_left_image) ): ?>
			<div class="col-md-6">
				<img src="<?php echo $contact_left_image['url']; ?>"  />
			</div>
			<?php endif; ?>
			<div class="col-md-6 contact-info">
				<?php if( $contact_title ): ?>
					<h1><?php echo $contact_title; ?></h1>
				<?php endif; ?>

				<?php if( $addresses ): ?>
					<p><?php echo $addresses; ?></p>
				<?php endif; ?>

				<?php if( $email ): ?>
					<a class="clickable-phone green" href="email:<?php echo $email; ?>"><?php echo $email; ?></a>
				<?php endif; ?>

				<?php if( $telephone ): ?>
					<a class="clickable-phone text-bold" href="phone:<?php echo $tel_click; ?>">T.<?php echo $telephone; ?></a>
				<?php endif; ?>

				<?php if( $fax ): ?>
					<a class="clickable-phone text-bold" href="phone:<?php echo $fax_click; ?>">F.<?php echo $fax; ?></a>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<div class="container-narrow">
		<div class="col-md-12 contact-form-wrapper">
			<h5 class="text-center">You can also contact us by completing the following form:</h5>
			<?php if( $contact_form_shortcode ): ?>
					<?php echo do_shortcode( $contact_form_shortcode ); ?>
			<?php endif; ?>
		</div>
</div>


<?php get_footer(); ?>