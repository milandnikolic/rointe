<?php 
	//vars
	$title_above_distributors_logo = get_field('title_above_distributors_logo', 'option');
	$vendors_repeater = get_field('vendors_repeater', 'option');

?>

<div class="distributors-logos-wrapper">
	<h3 class="text-bold"><?php echo $title_above_distributors_logo; ?></h3>
	<div class="wide-separator"></div>
	<?php if( have_rows('vendors_repeater', 'option') ): ?>
		<div class="flex">
		<?php while( have_rows('vendors_repeater', 'option') ): the_row(); 

			// vars
			$vendors_logo = get_sub_field('vendors_logo', 'option');
			$vendor_secure = get_sub_field('vendor_secure', 'option');
		?>
		<a href="<?php echo home_url().'/'.$vendor_secure; ?>">
			<img src="<?php echo $vendors_logo['url']; ?>"  />
		</a>
		<?php endwhile; ?>
		</div>
	<?php endif; ?>
</div>