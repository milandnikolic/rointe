<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php //if(wp_title('', false)) { echo ' :'; } ?> <?php //bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/logo-favicon.png" rel="shortcut icon">
       
        <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:700" rel="stylesheet">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<!-- wrapper -->
		<div class="wrapper">
<div class="main-content">
			<!-- header -->
			<header class="header clearfix" role="banner">
				<div class="header-top">
					<div class="container">
						<?php wp_nav_menu( array( 'theme_location' => 'top-header-menu' ) ); ?>
					</div>
				</div>
				
				<div class="ultra-wide-container">
				<div class="container clearfix">
					<div class="header-middle">
						<ul class="middle-menu">
							<li class="text-uppercase sign-in-out">
								<?php $page = get_page_by_title("My Account");?>
								<a href="<?php echo get_permalink( $page->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/icons_user.svg" class="user-img">
									<?php if (is_user_logged_in()) {
										echo "My account";
									} else {echo "Login or register ";} ?>								 
								</a>
							</li>													
							<li class="text-uppercase order-tracking">
								<?php $pagetrack = get_page_by_title('Tracking information');?>
								<a href="<?php echo get_permalink($pagetrack->ID); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icons/icons_tracking.svg" class="tracking-img"> Tracking </a>
							</li>


						<li class="minicart-wrapper">
							<?php //wp_nav_menu( array( 'theme_location' => 'middle-header' ) ); ?>
						
							<!-- header-mini-cart -->
							<?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
				 			
							    $count = WC()->cart->cart_contents_count;
							    ?>

							    <a class="cart-contents" href="<?php //echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>" > 
							  	
							   	<?php 
							    if ( $count > 0 ) {
							        ?>
							      
							        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
							    <?php
							   		 }
							    ?>
								
							    </a>
							    <?php
							    	$cart_sum = WC()->cart->get_cart_total();
							     ?>
							     <span>  <img src="<?php echo get_template_directory_uri(); ?>/img/icons/icons_cart.svg" class="cart-img"><span id="shopcart-txt">SHOPPING CART:</span> <b> <?php  echo $cart_sum; ?></b>	</span>
							    
						 		<div class="minicart-dropdown"><?php  woocommerce_mini_cart(); ?> </div>
							<?php } ?>
						
							<!-- /header-mini-cart -->	
						</li>						
						</ul>
					</div>
				
					<!-- logo -->
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-img">
						</a>
					</div>
					<!-- /logo -->

				</div>
			<div class="container clearfix">

					<!-- nav -->
					<nav class="nav clear" role="navigation">
						<?php html5blank_nav(); ?>
						<?php echo do_shortcode( '[smart_search id="1"]' ); ?>

						<div class="distributors-submenu flex clear">
							<?php 
								//vars
								$vendors_repeater = get_field('vendors_repeater', 'option');
							?>
							<?php if( have_rows('vendors_repeater', 'option') ): ?>
								
								<?php while( have_rows('vendors_repeater', 'option') ): the_row(); 

									// vars
									$vendors_logo = get_sub_field('vendors_logo', 'option');
									$vendor_features = get_sub_field('vendor_features', 'option');
									$vendor_url = get_sub_field('vendor_archive_page_link', 'option');
									
								?>
								<div class="distr-item text-center">
									<a class="transition" href="<?php echo $vendor_url; ?>">
										<img src="<?php echo $vendors_logo['url']; ?>"  />
										<?php echo $vendor_features; ?>
									</a>
								</div>
								<?php endwhile; ?>
								
							<?php endif; ?>
						</div>
					</nav>
					<!-- /nav -->


				</div><!-- /container -->

				</div><!-- /ultra-wide-container -->
				<span id="menu-bars"><i class="fa fa-bars" aria-hidden="true"></i></span>

			</header>
			<!-- /header -->
			
