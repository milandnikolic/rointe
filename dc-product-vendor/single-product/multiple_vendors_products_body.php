<?php
/**
 * Single Product Multiple vendors
 *
 * This template can be overridden by copying it to yourtheme/dc-product-vendor/single-product/multiple_vendors_products_body.php.
 *
 * HOWEVER, on occasion WCMp will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * 
 * @author  WC Marketplace
 * @package dc-woocommerce-multi-vendor/Templates
 * @version 2.3.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $WCMp;
if(isset($more_product_array) && is_array($more_product_array) && count($more_product_array) > 0) {
	 echo $more_product_array;

	foreach ($more_product_array as $more_product ) {	
            $_product = wc_get_product($more_product['product_id']);
           
		?>
							
			<div class="vendor-single flex from-tab">
				<div class="img-wrap">
					<?php
						$getuser = $more_product['seller_name'];
						$getuser = preg_replace('/\s*/', '', $getuser);
	   					$getuser =strtolower($getuser);

	   					if($getuser == 'yessselectrical'){
	   						echo '<a href="https://www.buyrointe.co.uk/yesss-electrical/" class="wcmp_seller_name">';
	   					} elseif ($getuser == 'heatershop') {
	   						echo '<a href="https://www.buyrointe.co.uk/heater-shop/" class="wcmp_seller_name">';
	   					} elseif ($getuser == 'kewelectrical') {
	   						echo '<a href="https://www.buyrointe.co.uk/kew-electrical/" class="wcmp_seller_name">';
	   					}

					?>
					<!-- <a href="<?php //echo $more_product['shop_link']; ?>" class="wcmp_seller_name"> -->
					
					<?php  //$more_product['seller_name']; 
				
					


					$user_meta = get_user_meta( $getuser->ID );
					//$last_name = get_user_meta( $getuser->ID, 'email', true );
					
					
					// $user = get_user_by( 'login', $getuser );
					$user = get_user_by( 'login', $getuser );
						//echo 'User is ' . $user->first_name . ' ' . $user->ID;
					 //echo $user;
						$new_user = get_userdata($user->ID);
						$new_user_data = get_user_meta($user->ID);
						$user_descriptions = get_user_meta( $user->ID, 'description', true );
						
					 $img = get_field('vendors_image_to_show_on_products_page', 'user_'.$user->ID );	
					
					 echo  '<img src="'. $img['url'] .'" />';
					?></a>
					<?php do_action('after_wcmp_singleproductmultivendor_vendor_name', $more_product['product_id'], $more_product);?>
				</div>

				<div class="vendor-features">
					<?php  echo $user_descriptions; ?>
				</div>


				<span class="vendor-checkbox" >
					<a  href="<?php echo get_permalink($more_product['product_id']); ?>" class="buttongap" ></a>
				</span>
			</div>
		
                <?php //echo $_product->get_price_html(); ?>
					
		
	<?php
	}
}
?>
			
		
				
	
		
								
	
		
