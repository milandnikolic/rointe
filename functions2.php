<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
	'default-color' => 'FFF',
	'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
	'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
	'header-text'			=> false,
	'default-text-color'		=> '000',
	'width'				=> 1000,
	'height'			=> 198,
	'random-default'		=> false,
	'wp-head-callback'		=> $wphead_cb,
	'admin-head-callback'		=> $adminhead_cb,
	'admin-preview-callback'	=> $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

     
        wp_enqueue_script('jquery');

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!

        wp_register_script('bootstrap-popper','https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js' , array( 'jquery' ), '1.0.0',true); //Bootstrap
        wp_enqueue_script('bootstrap-popper'); // Enqueue it!

        wp_register_script('bootstrap-bundle',/* get_template_directory_uri() . */'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js' , array( 'jquery' , 'popper' ), '1.0.0',true); //Bootstrap
        wp_enqueue_script('bootstrap-bundle'); // Enqueue it!


    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if ( is_front_page() || is_page_template('templates/page-tpl-distributors.php') ) {
        wp_register_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0.0', true); // Conditional script(s)
        wp_enqueue_script('slick'); // Enqueue it!
    }

    if (is_front_page() || is_page_template('templates/page-tpl-distributors.php')) {
        wp_register_script('sliderinit', get_template_directory_uri() . '/js/sliderinit.js', array( 'slick', 'jquery' ), '1.0.0', true); // initial slider 
        wp_enqueue_script('sliderinit'); // Enqueue it!
    }

    if (is_account_page() || is_page('Calculate your requirements')) {
        wp_register_script('validationlib', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array(  'jquery' ), '1.0.0', true); 
        wp_enqueue_script('validationlib'); // Enqueue it!
    }

    if (is_account_page() || is_page('Calculate your requirements')) {
        wp_register_script('validation', get_template_directory_uri() . '/js/validation.js', array( 'validationlib', 'jquery' ), '1.0.0', true);
        wp_enqueue_script('validation'); // Enqueue it!
    }

    if (is_product()) {
        wp_register_script('productsjs', get_template_directory_uri() . '/js/custom-single-product.js', array(  'jquery' ), '1.0.0', true);
        wp_enqueue_script('productsjs'); // Enqueue it!
    }

    if (is_page('Calculate your requirements')) {
        wp_register_script('calculatorjs', get_template_directory_uri() . '/js/calculator-requirements.js', array(  'jquery' ), '1.0.0', true);
        wp_enqueue_script('calculatorjs'); // Enqueue it!
    }

    if (is_page('Calculate your requirements')) {
        wp_register_script('selectjs', get_template_directory_uri() . '/js/lib/select2.min.js', array(  'jquery' ), '1.0.0', true);
        wp_enqueue_script('selectjs'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!

    wp_register_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '1.0', 'all');
    wp_enqueue_style('bootstrap-css'); // Enqueue it!

    wp_register_style('fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '1.0', 'all');
    wp_enqueue_style('fontawesome'); // Enqueue it!       
}


// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'top-header-menu' => __('Top Header Menu', 'html5blank'),
        'middle-header-menu' => __('Middle Header Menu', 'html5blank'),
        'footer-menu' => __('Footer Menu', 'html5blank'),
    ));
}


// Load HTML5 Blank conditional styles
function html5blank_conditional_styles()
{


    if ( is_front_page() || is_page_template('templates/page-tpl-distributors.php')) {
        wp_register_style('slicks', get_template_directory_uri() . '/assets/css/slick.css', array(), '1.0', 'all'); // slick styles
        wp_enqueue_style('slicks'); // Enqueue it!
    }

    if ( is_page('Calculate your requirements')) {
        wp_register_style('selectcss', get_template_directory_uri() . '/assets/css/select2.min.css', array(), '1.0', 'all'); 
        wp_enqueue_style('selectcss'); // Enqueue it!
    }    
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
/*function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}*/

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination
add_action('wp_enqueue_scripts', 'html5blank_conditional_styles'); // Add Theme Custom Stylesheet

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
//add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
//add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]



/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


        /*------------------------------------*\
              Class ACTIVE in navigation
        \*------------------------------------*/
        
        add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

        function special_nav_class ($classes, $item) {
            if (in_array('current-menu-item', $classes) ){
                $classes[] = 'active ';
            }
            return $classes;
        }




add_action( 'after_setup_theme', 'yourtheme_setup' );
if ( ! function_exists( 'yourtheme_setup' ) ) {
    /**
     * Declares WooCommerce theme support.
     */
    function yourtheme_setup() {
        add_theme_support( 'woocommerce' );
        
        // Add New Woocommerce 3.0.0 Product Gallery support
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-zoom' );

        // Gallery slider needs Flexslider - https://woocommerce.com/flexslider/
        add_theme_support( 'wc-product-gallery-slider' );

        // hook in and customizer form fields.
       // add_filter( 'woocommerce_form_field_args', 'understrap_wc_form_field_args', 10, 3 );
    }
}



/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
function my_header_add_to_cart_fragment( $fragments ) {
 
    ob_start();
    $count = WC()->cart->cart_contents_count;
    ?><a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
      <?php
    if ( $count > 0 ) {
        ?>
        <span class="cart-contents-count"><?php echo esc_html( $count ); ?></span>
        <?php            
    }
        ?></a><?php
 
    //$fragments['a.cart-contents'] = ob_get_clean();
     
    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'my_header_add_to_cart_fragment' );






//filter products on homepage
function misha_filter_function(){

    // for taxonomies / categories
    if( isset( $_POST['categoryfilter'] ) ) {
        $selected_category = $_POST['categoryfilter'];
        $args = array(
            'posts_per_page' => 12,
            'orderby' => 'rand',
            'post_type' => 'product',
            'stock' => 1,
             'no_found_rows' => true,

        );
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $_POST['categoryfilter']
            )
        );

        echo do_shortcode( '[products  limit="12" columns="4" category="'.$selected_category.'" orderby="rand" order="ASC" class="quick-sale"  ]' );
    } else {
        unset( $_POST['categoryfilter'] );
    }
  /* if (isset( $_POST['filterall'] )) {
        $args = array(
            'posts_per_page' => 12,
            'orderby' => 'rand',
            'post_type' => 'product',
            //'columns'=> 5
        );
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $_POST['filterall']
            )
        );       
    }*/
if( isset( $_POST['area_width']) /*&& isset( $_POST['area-length']) && isset( $_POST['js-example-basic-single'])*/ ) {
    $width = $_POST['area_width'];
    $length = $_POST['area_length'];
    $height = $_POST['area_height'];
    $coeficient = $_POST['uk_area'];
    $coeficientm3 = 0;

    if ( $height <= 3 ){
        $total = $width * $length * $coeficient;
    } elseif ( $height > 3 ) {
        if ( $coeficient == 0.75 ) {
            $coeficientm3 = 0.23;
        } elseif ( $coeficient == 0.80 ) {
             $coeficientm3 = 0.26;
        } elseif ( $coeficient == 0.85 ) {
             $coeficientm3 = 0.30;
        } elseif ( $coeficient == 0.90 ) {
             $coeficientm3 = 0.33;
        }

         $total = $width * $length * $height * $coeficientm3;
    }

  

  $display_items = 1;


if($total <= 3) {
    $needed_elements = 3;
  } elseif ($total <= 5 && $total > 3){
     $needed_elements = 5;
  } elseif ($total <= 7 && $total > 5){
     $needed_elements = 7;
  } elseif ($total <= 9 && $total > 7){
     $needed_elements = 9;
  } elseif ($total <= 11 && $total > 9){
     $needed_elements = 11;
  } elseif ($total <= 13 && $total > 11){
     $needed_elements = 13;
  } elseif ($total <= 15 && $total > 13){
     $needed_elements = 15;
  } elseif  ( $total <= 30 && $total > 15){
     $divide = $total / 2;
     if ($divide <= 9) {
        $needed_elements = 9;
     } elseif ($divide <= 11) {
        $needed_elements = 11;
     } elseif ($divide <= 13) {
         $needed_elements = 13;
     } elseif ($divide <= 15) {
        $needed_elements = 15;
     }
  } elseif ($total <= 45 && $total > 30) {
      $divide = $total / 3;
     if ($divide <= 11) {
        $needed_elements = 11;
     } elseif ($divide <= 13) {
         $needed_elements = 13;
     } elseif ($divide <= 15) {
        $needed_elements = 15;
     }
  } elseif ($total <= 60 && $total > 45) {
      $divide = $total / 4;
     if ($divide <= 13) {
        $needed_elements = 13;
     } elseif ($divide <= 15) {
        $needed_elements = 15;
     }
  } elseif ($total <= 75 && $total > 60) {
      $divide = $total / 5;
     if ($divide <= 13) {
        $needed_elements = 13;
     } elseif ($divide <= 15) {
        $needed_elements = 15;
     }
  } elseif ($total <= 90 && $total > 75) {
      $divide = $total / 6;
     if ($divide <= 13) {
        $needed_elements = 13;
     } elseif ($divide <= 15) {
        $needed_elements = 15;
     }
  } elseif ($total <= 105 && $total > 90) {
      $divide = $total / 7;
     if ($divide <= 13) {
        $needed_elements = 13;
     } elseif ($divide <= 15) {
        $needed_elements = 15;
     }
  } elseif ($total <= 120 && $total > 105) {
      $divide = $total / 8;
     if ($divide <= 15) {
        $needed_elements = 15;
     }
  }  elseif ( $total > 120 ) {
        $needed_elements = 15;
  }


    $args = array(
            'posts_per_page' => 1,
            'orderby' => 'rand',
            'post_type' => 'product',
    );


    $args['tax_query'] = array(
            array(
                'taxonomy' => 'pa_elements',
                'field' => 'slug',
                'terms' => $needed_elements
            ),
           array(
                'taxonomy' => 'product_cat',
                'field' => 'id',
                'terms' => $_POST['categoryradiator']
            )

    );
 }

        $loop = new WP_Query( $args );

       $cats = array();    

        if ( $loop->have_posts() ) {
            echo '<div class="woocommerce columns-4">';
                echo '<ul class="products">';
            while ( $loop->have_posts() ) : $loop->the_post(); global $product;

             //  echo '<h2>' . $loop->post->post_title. '</h2>';
              // echo $product->get_price_html();             
            //     wc_get_template_part( 'content', 'product' );
  endwhile;



          


 
                echo '</ul>';
            echo '</div>';
        } else {
            echo __( 'No products found' );
        }
        wp_reset_postdata();

        die();

}
 
 
add_action('wp_ajax_myfilter', 'misha_filter_function'); 
add_action('wp_ajax_nopriv_myfilter', 'misha_filter_function');






//mega menu and icons
add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects( $items, $args ) {
    
    // loop
    foreach( $items as $item ) {
        
        // vars
        $icon_fontawesome = get_field('menu_icon', $item);
        $icon = get_field('logo', $item);
		$icon_light = get_field('icons_for_menu_white', $item);
        $mega_menu_image = get_field('mega_menu_image', $item);
        $mega_menu_text = get_field('mega_menu_text', $item);
        $mega_menu_button = get_field('mega_menu_button', $item);
        $mega_menu_button_url = get_field('mega_menu_button_url', $item);
        $number_of_columns = get_field('number_of_columns', $item);
        
        
        // append icon
        if( $icon_fontawesome ) {
            
            $item->title .= ' <i class="fa fa-'.$icon_fontawesome.'"></i>';
            
        } elseif ($icon) {
            //$svg = file_get_contents( $icon );
             $item->title .= '<img class="menu-icon" src="'.$icon['url'].'" />';
			 $item->title .= '<img class="menu-icon icon-light" src="'.$icon_light['url'].'" />';
            //$item->title .= '<div class="menu-icon">'.$svg.'</div>';
        }
      
        if( $mega_menu_text ) {
            $item->title .= '<div class="mega-menu-wrapper flex"><div class="megamenu-left text-right"><img class="megamenu-img vertical-align-center" src="'.$mega_menu_image['url'].'" /></div><div class="megamenu-right"><p>'.$mega_menu_text.'</p><a class="megamenu-button" href="'.$mega_menu_button_url.'">' .$mega_menu_button.'</a></div></div>';

        }
           
        
    }
    
    
    // return
    return $items;
    
}





/**
 * Check if the cart has product with a certain Shipping Class
 * @param string $slug the shipping class slug to check for
 * @return bool true if a product with the Shipping Class is found in cart
 */
function cart_has_product_with_shipping_class( $slug ) {
 
    global $woocommerce;
 
    $product_in_cart = false;
 
    // start of the loop that fetches the cart items
 
    foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
 
        $_product = $values['data'];
        $terms = get_the_terms( $_product->id, 'product_shipping_class' );
 
        if ( $terms ) {
            foreach ( $terms as $term ) {
                $_shippingclass = $term->slug;
                if ( $slug === $_shippingclass ) {
                     
                    // Our Shipping Class is in cart!
                    $product_in_cart = true;
                }
            }
        }
    }
 
    return $product_in_cart;
}








//enable svg upload in wp
function custom_mtypes( $m ){
    $m['svg'] = 'image/svg+xml';
    $m['svgz'] = 'image/svg+xml';
    return $m;
}
add_filter( 'upload_mimes', 'custom_mtypes' );



// Increment input fields for quantity
function kia_add_script_to_footer(){
    if( ! is_admin() && is_product() || ! is_admin() && is_cart() ) { ?>
    <script>
    jQuery(document).ready(function($){
    $('.quantity').on('click', '.plus', function(e) {
        $input = $(this).prev('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        $input.val( val + step ).change();
    });
    $('.quantity').on('click', '.minus', 
        function(e) {
        $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        var step = $input.attr('step');
        step = 'undefined' !== typeof(step) ? parseInt(step) : 1;
        if (val > 0) {
            $input.val( val - step ).change();
        } 
    });
});
</script>
<?php }
}
add_action( 'wp_footer', 'kia_add_script_to_footer' );




//add acf options page
if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme options',
        'menu_title'    => 'Theme options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'delete_others_pages',
        'redirect'      => true
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'General',
        'menu_title'    => 'General',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Products',
        'menu_title'    => 'Products',
        'parent_slug'   => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'    => 'Vendors',
        'menu_title'    => 'Vendors',
        'parent_slug'   => 'theme-general-settings',
    ));
}


//Remove Theme options from vendor's dashboard
add_action('admin_init', 'remove_acf_options_page', 99);
function remove_acf_options_page() {
    global $current_user;
     $user_roles = $current_user->roles;
$user_role = array_shift($user_roles);
    
     if($user_role != 'administrator') {
       remove_menu_page('theme-general-settings');
     }

   
}
function my_acf_options_page_settings( $settings )
{
    $settings['title'] = 'Theme options';
    $settings['pages'] = array('General', 'Products', 'Vendors');

    return $settings;
}

add_filter('acf/options_page/settings', 'my_acf_options_page_settings');

/**
 * @snippet       Display Advanced Custom Fields @ Single Product - WooCommerce
 */
 
add_action( 'woocommerce_before_add_to_cart_button', 'rointe_display_acf_before_add_to_cart', 30 );
 
function rointe_display_acf_before_add_to_cart() {
    $video_link = get_field('video_link');

    if(is_product()) {
        echo '<div class="row custom-product-fields">'; 
          if(!empty($video_link)) {
          echo '<div class="col-md-6 right-border">';
          echo '<h3>' . get_field('install_title', 'option') . '</h3>';
          echo '<span>' . get_field('installer_text', 'option') . '</span>';
          echo '<div class="video-link text-center"><a  href="#" data-toggle="modal" data-target="#exampleModal">Watch video</a></div>';
          echo '<div class="video-container"><div class="video-link-wrap">' .get_field('video_link'). '<span class="close-video"><i class="fa fa-times"></i> Close video</span></div></div>';
           echo '</div>';
          
          echo '<div class="col-md-6 left-border">';
          echo '<h3>Professional installation <img src="' . get_template_directory_uri(). '/img/rointeplus3.png"></h3>';
          echo '<span>' . get_field('find_installers_text', 'option') . '</span>';
          echo '<a class="product-link-installers" target="_blank" href="' . get_field('link_to_installers_page', 'option') . '">Find nearest installer</a>';
          echo '</div>';
      } else {
        echo '<div class="col-md-12 left-border full-width">';
          echo '<h3>Professional installation <img src="' . get_template_directory_uri(). '/img/rointeplus3.png"></h3>';
          echo '<span class="full-width">' . get_field('find_installers_text', 'option') . '</span>';
          echo '<a class="product-link-installers" target="_blank" href="' . get_field('link_to_installers_page', 'option') . '">Find nearest installer</a>';
          echo '</div>';
      }
      echo '</div>';
    }

}

// Display description for RAL colors on single product page
add_action( 'woocommerce_before_add_to_cart_button', 'rointe_display_acf_for_variations', 10 );
 
function rointe_display_acf_for_variations() {
    global $product;

    if ( is_product() && $product->is_type( 'variable' ) ) {
        echo '<div class="ral-desc">';  
          echo get_field('text_for_products_with_ral_color', 'option');
        echo '</div>';
    }

}



/**
 * @Add html wrapper for vendors on single product page
 */
/*add_action( 'woocommerce_before_add_to_cart_button', 'rointe_display_html_wrapper_for_vendors', 10 );
function rointe_display_html_wrapper_for_vendors() {
   
  echo '<div class="vendors-wrapper">';
  echo "<p class='text-bold'>Buy it from</p>"; 
  echo '<div class="vendor-single flex">';
  echo '<div class="img-wrap">';
  echo '<img src="' . get_template_directory_uri(). '/img/yesss.png">';
  echo '</div>';
  echo '<ul><li>-Free shipping</li><li>-Secure payment</li><li>-Free shipping</li></ul>';
  echo '<span class="vendor-checkbox"><label for="vendor-select"><input type="radio" name="vendor-select"></label></span>';
  echo '</div>';
  echo '</div>';
}*/


/**
 * @Add html wrapper for vendors on single product page
 */
add_action( 'woocommerce_before_add_to_cart_button', 'rointe_vendors', 15 );
function rointe_vendors() {


if(is_product()) {
 global $WCMp, $product;
$html = '';
$vendor = get_wcmp_product_vendors($product->get_id());


if ($vendor) {
    echo '<div class="vendors-wrapper">';
    echo "<p class='text-bold'>Buy it from</p>"; 
    echo '<div class="vendor-single flex">';
   // $html .= '<div class="vendor-single flex">';
    //$html .= apply_filters('wcmp_before_seller_info_tab', '');
   // $html .= '<h2>' . $vendor->user_data->display_name . '</h2>';
    $getuser = $vendor->user_data->display_name;
    $getuser = preg_replace('/\s*/', '', $getuser);
    $getuser =strtolower($getuser);

    $user_meta = get_user_meta( $getuser->ID );
    $user = get_user_by( 'login', $getuser );

    $new_user = get_userdata($user->ID);
    $new_user_data = get_user_meta($user->ID);
    $user_descriptions = get_user_meta( $user->ID, 'description', true );

    $img = get_field('vendors_image_to_show_on_products_page', 'user_'.$user->ID ); 

    echo '<div class="img-wrap"><a target="_blank" href="' . $vendor->permalink . '">';
    echo  '<img src="'. $img['url'] .'" />';
    echo "</a></div>";

     echo $html;
    //$term_vendor = wp_get_post_terms($product->get_id(), 'dc_vendor_shop');

    $html = '';
    //if ('' != $vendor->description) {
        $html .= '<div class="vendor-features">' .$user_descriptions . '</div>';
   // }
   //$html .= '<p><a href="' . $vendor->permalink . '">' . sprintf(__('More Products from %1$s', 'dc-woocommerce-multi-vendor'), $vendor->user_data->display_name) . '</a></p>';
    //$html .= apply_filters('wcmp_after_seller_info_tab', '');
    $html .='<span class="vendor-checkbox clicked-vendor"><span class="vendor-checkbox-inside"></span></span>';
    //$html .= '</div>';
    echo $html;

    echo '</div>';
    echo '</div>';
} 

} 
echo '<div id="vendors-wrapper-others" class="vendors-wrapper">';
 echo '</div>';



}




//add html in wordpress user bio
remove_filter('pre_user_description', 'wp_filter_kses');

/**
 * @Display custom field just below the price on single product
 */
add_action( 'woocommerce_single_product_summary', 'rointe_display_acf_before_price', 15 );
function rointe_display_acf_before_price() {
        $desired_att = 'Heating';
   
    global $product;
    $attributes = $product->get_attributes();
     
   /* if ( ! $attributes ) {
        return;
    }*/
      
    $out = '';
   
    foreach ( $attributes as $attribute ) {
        $name = $attribute->get_name();
        if ( $attribute->is_taxonomy() ) {
          
            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $desired_att)));
          
            // if this is desired att, get value and label
            if ( $name == 'pa_' . $tax_slug ) {
              
                $terms = wp_get_post_terms( $product->get_id(), $name, 'all' );
                // get the taxonomy
                $tax = $terms[0]->taxonomy;
                // get the tax object
                $tax_object = get_taxonomy( $tax );
                // get tax label
                if ( isset ( $tax_object->labels->singular_name ) ) {
                    $tax_label = $tax_object->labels->singular_name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                    // Trim label prefix since WC 3.0
                    if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                       $tax_label = substr( $tax_label, 8 );
                    }
                }
                  
                foreach ( $terms as $term ) {
       
                    //$out .= $tax_label . ': ';
                    $out .= $term->name . '<br />';
                       
                }           
              
            } // our desired att
              
        } else {
          
            // for atts which are NOT registered as taxonomies
              
            // if this is desired att, get value and label
            if ( $name == $desired_att ) {
               // $out .= $name . ': ';
                $area_value = esc_html( implode( ', ', $attribute->get_options() ) );
                $out .= '<span class="attribute-req">'.sprintf( get_field("product_heating_text", "option"), $area_value ).' <span class="tooltip-anchor transition"><b>?</b><span class="tooltip-text transition">'. get_field("product_heating_tooltip", "option") .'</span> </span></span>';
            }
        }       
          
    
    }
      
  function comma_separated_to_array($string, $separator = ',')
{
  //Explode on comma
  $vals = explode($separator, $string);
 
  //Trim whitespace
  foreach($vals as $key => $val) {
    $vals[$key] = trim($val);
  }
  
  return array_diff($vals, array(""));
}

// pass array of categories in which shouldn't be displayed calculate button 
$categories_array = get_field('cat_not_calculate_btn', 'option');

$rating_stars = wc_get_rating_html( $product->get_average_rating() );
	
$terms= comma_separated_to_array($categories_array);
	
if (!empty($rating_stars) || !empty($out) || !has_term( $terms , 'product_cat', $post->ID ) ){


  echo '<div class="calculate-requeirements clearfix">'; 
  echo wc_get_rating_html( $product->get_average_rating() ); 
  echo $out;


$arr=explode(",",$categories_array);

//$arr_of_cats = print_r($arr);


  if ( !has_term( $terms , 'product_cat', $post->ID ) ) {
  echo '<a class="bg-green"  href="'. get_field('button_calculate_requeriments_url', 'option') .'">' . get_field('button_calculate_reque', 'option') . '</a>';
  }

  echo '</div>';
  }
}



/**
* WooCommerce: Show only one custom product attribute above Add-to-cart button on single product page.
*/
function isa_woo_get_one_pa(){
  
    // Edit below with the title of the attribute you wish to display
    $desired_att = 'Heating';
   
    global $product;
    $attributes = $product->get_attributes();
     
    if ( ! $attributes ) {
        return;
    }
      
    $out = '';
   
    foreach ( $attributes as $attribute ) {
        $name = $attribute->get_name();
        if ( $attribute->is_taxonomy() ) {
          
            // sanitize the desired attribute into a taxonomy slug
            $tax_slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '_', $desired_att)));
          
            // if this is desired att, get value and label
            if ( $name == 'pa_' . $tax_slug ) {
              
                $terms = wp_get_post_terms( $product->get_id(), $name, 'all' );
                // get the taxonomy
                $tax = $terms[0]->taxonomy;
                // get the tax object
                $tax_object = get_taxonomy( $tax );
                // get tax label
                if ( isset ( $tax_object->labels->singular_name ) ) {
                    $tax_label = $tax_object->labels->singular_name;
                } elseif ( isset( $tax_object->label ) ) {
                    $tax_label = $tax_object->label;
                    // Trim label prefix since WC 3.0
                    if ( 0 === strpos( $tax_label, 'Product ' ) ) {
                       $tax_label = substr( $tax_label, 8 );
                    }
                }
                  
                foreach ( $terms as $term ) {
       
                    //$out .= $tax_label . ': ';
                    $out .= $term->name . '<br />';
                       
                }           
              
            } // our desired att
              
        } else {
          
            // for atts which are NOT registered as taxonomies
              
            // if this is desired att, get value and label
            if ( $name == $desired_att ) {
               // $out .= $name . ': ';
                $out .= '<span class="attribute-badge">Up to '.esc_html( implode( ', ', $attribute->get_options() ) ).'m<sup>2</sup> heating*</span>';
            }
        }       
          
      
    }
      
    echo $out;
}
add_action('woocommerce_product_thumbnails', 'isa_woo_get_one_pa', 10, 0 );




//custom fields on registration page
/*function wooc_extra_register_fields() {?>
       <p class="form-row form-row-first">
       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />
       </p>
       <p class="form-row form-row-last">
       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>
       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />
       </p>
       <div class="clear"></div>
       <?php
 }
 add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );*/


/**
* Below code save extra fields.
*/


/**
 
* register fields Validating.
 
*/
 //Add extra fields to registration page form
function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {
 
      if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {
 
             $validation_errors->add( 'billing_first_name_error', __( ' First name is required!', 'woocommerce' ) );
 
      }
 
      if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {
 
             $validation_errors->add( 'billing_last_name_error', __( ' Last name is required!.', 'woocommerce' ) );
 
      }

}
 
add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );



function wooc_save_extra_register_fields( $customer_id ) {
    
      if ( isset( $_POST['billing_first_name'] ) ) {
             //First name field which is by default
             update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
             // First name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
      }
      if ( isset( $_POST['billing_last_name'] ) ) {
             // Last name field which is by default
             update_user_meta( $customer_id, 'last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
             // Last name field which is used in WooCommerce
             update_user_meta( $customer_id, 'billing_last_name', sanitize_text_field( $_POST['billing_last_name'] ) );
      }

}
add_action( 'woocommerce_created_customer', 'wooc_save_extra_register_fields' );



//shortcode for distributors logos
function my_upitzacenu_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/distributors-logos' );
    return ob_get_clean();
}
add_shortcode( 'distributors', 'my_upitzacenu_shortcode' );


//shortcode for distributors delivery
function rointe_delivery_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/shortcode-distributors-delivery' );
    return ob_get_clean();
}
add_shortcode( 'distributors-delivery', 'rointe_delivery_shortcode' );

//shortcode for distributors payment
function rointe_payment_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/shortcode-distributors-payment' );
    return ob_get_clean();
}
add_shortcode( 'distributors-payment', 'rointe_payment_shortcode' );

//shortcode for distributors tracking
function rointe_tracking_shortcode( $attr ) {
    ob_start();
    get_template_part( 'templates/shortcode-distributors-tracking' );
    return ob_get_clean();
}
add_shortcode( 'distributors-tracking', 'rointe_tracking_shortcode' );


// Double password on registration page
add_filter('woocommerce_registration_errors', 'registration_errors_validation', 10,3);
function registration_errors_validation($reg_errors, $sanitized_user_login, $user_email) {
    global $woocommerce;
    extract( $_POST );
    if ( strcmp( $password, $password2 ) !== 0 ) {
        return new WP_Error( 'registration-error', __( 'Passwords do not match.', 'woocommerce' ) );
    }
    return $reg_errors;
}
add_action( 'woocommerce_register_form', 'wc_register_form_password_repeat' );
function wc_register_form_password_repeat() {
    ?>
    <p class="form-row form-row-wide woocommerce-form-row">
        <label for="reg_password2"><?php _e( 'Password Repeat', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="password" class="input-text" name="password2" id="reg_password2" value="<?php if ( ! empty( $_POST['password2'] ) ) echo esc_attr( $_POST['password2'] ); ?>" />
    </p>
    <?php
}






// Add the field to the checkout
add_action( 'woocommerce_after_order_notes', 'birth_day_checkout_field' );
function birth_day_checkout_field( $checkout ) {

    // if customer is logged in and his birth date is defined
    if(!empty(get_user_meta( get_current_user_id(), 'account_birth_date', true ))){
        $checkout_birht_date = esc_attr(get_user_meta( get_current_user_id(), 'account_birth_date', true ));
    }
    // The customer is not logged in or his birth date is NOT defined
    else {
        $checkout_birht_date = $checkout->get_value( 'birth_date' );
    }

    echo '<div id="my_custom_checkout_field">';

    woocommerce_form_field( 'birth_date', array(
        'type'          => 'text',
        'class'         => array('birth-date form-row-wide'),
        'label'         => __( 'Date of Birth', 'theme_domain_slug' ),
        'placeholder'   => __( 'dd/mm/yyyy', 'theme_domain_slug' ),
        ), $checkout_birht_date);

    echo '</div>';

}


// Process the checkout
/*add_action('woocommerce_checkout_process', 'birth_day_checkout_field_process');
function birth_day_checkout_field_process() {
    // Check if set, if its not set add an error.
    if ( ! $_POST['account_birth_date'] )
        wc_add_notice( __( 'Please enter your date of birth.', 'theme_domain_slug' ), 'error' );
}*/


// update order meta with field value
add_action( 'woocommerce_checkout_update_order_meta', 'birth_day_checkout_field_update_order_meta' );
function birth_day_checkout_field_update_order_meta( $order_id ) {
    if (!empty( $_POST['account_birth_date'])){
        update_post_meta( $order_id, 'account_birth_date', sanitize_text_field( $_POST['account_birth_date'] ) );

        // updating user meta (for customer my account edit details page post data)
        update_user_meta( get_post_meta( $order_id, '_customer_user', true ), 'account_birth_date', sanitize_text_field($_POST['birth_date']) );
    }
}

// update user meta with Birth date (in checkout and my account edit details pages)
add_action ( 'personal_options_update', 'birth_day_save_extra_profile_fields' );
add_action ( 'edit_user_profile_update', 'birth_day_save_extra_profile_fields' );
add_action( 'woocommerce_save_account_details', 'birth_day_save_extra_profile_fields' );
function birth_day_save_extra_profile_fields( $user_id )
{
    // for checkout page post data
    if ( isset($_POST['account_birth_date']) ) {
        update_user_meta( $user_id, 'account_birth_date', sanitize_text_field($_POST['account_birth_date']) );
    }
    // for customer my account edit details page post data
    if ( isset($_POST['account_birth_date']) ) {
        update_user_meta( $user_id, 'account_birth_date', sanitize_text_field($_POST['account_birth_date']) );
    }
}


// Display field value on the order edit page
add_action( 'woocommerce_admin_order_data_after_billing_address', 'birth_day_checkout_field_display_admin_order_meta', 10, 1 );
add_action ( 'show_user_profile', 'birth_day_checkout_field_display_admin_order_meta' );
add_action ( 'edit_user_profile', 'birth_day_checkout_field_display_admin_order_meta' );
function birth_day_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>' . __( 'Birth date:', 'theme_domain_slug' ) . '</strong> ' . get_post_meta( $order->id, 'account_birth_date', true ) . '</p>';
}


// ADDING CUSTOM FIELD TO INDIVIDUAL USER SETTINGS PAGE IN BACKEND
add_action( 'show_user_profile', 'add_extra_birth_date' );
add_action( 'edit_user_profile', 'add_extra_birth_date' );
function add_extra_birth_date( $user )
{
    ?>
        <h3><?php _e("Birth Date", "theme_domain_slug"); ?></h3>
        <table class="form-table">
            <tr>
                <th><label for="birth_date_profile"><?php _e("Date", "theme_domain_slug"); ?> </label></th>
                <td><input type="text" name="account_birth_date" value="<?php echo esc_attr(get_user_meta( $user->ID, 'account_birth_date', true )); ?>" class="regular-text" /></td>
            </tr>
        </table>
        <br />
    <?php
}

add_action( 'personal_options_update', 'save_extra_birth_date' );
add_action( 'edit_user_profile_update', 'save_extra_birth_date' );
function save_extra_birth_date( $user_id )
{
    update_user_meta( $user_id, 'account_birth_date', sanitize_text_field( $_POST['account_birth_date'] ) );
}





/*add_filter('pp_registration_validation', function ($reg_errors, $form_id) {
    /*if (7 === $form_id) {
        if ( ! isset($_POST['accept_privacy_terms']) || empty($_POST['accept_privacy_terms'])) {
            $reg_errors = new WP_Error('accept_privacy_terms', __( 'You must accept our privacy policy and terms.', 'profilepress' ));
        }
    }
 
    return $reg_errors;
}, 10, 2);*/
/*add_action('woocommerce_process_registration_errors', 'bbloomer_not_approved_delivery');
 
function bbloomer_not_approved_delivery() {
    if ( empty( $_POST['termscheck'] ) ) {
        throw new Exception( __( 'You must accept the terms and conditions in order to register.', 'text-domain' ) );
    }
     return $errors;
}*/



//remove some fields from billing form
function wpb_custom_billing_fields( $fields = array() ) {

    unset($fields['billing_state']);
    unset($fields['billing_company']);
    unset($fields['account']['birth_date']);
    unset($fields['order']['order_comments']);
   // unset($fields['order_comments']);

    return $fields;
}
add_filter('woocommerce_billing_fields','wpb_custom_billing_fields');
add_filter('woocommerce_checkout_fields','wpb_custom_billing_fields');



add_filter( 'woocommerce_cart_needs_shipping_address', '__return_false');



// Move - ReOrder Fields @ WooCommerce Checkout Page
 
add_filter( 'woocommerce_checkout_fields', 'bbloomer_move_checkout_fields' );
  
function bbloomer_move_checkout_fields( $fields ) {
     
  // Billing: move these around in the order you'd like
  $fields2['billing']['billing_address_1']  = $fields['billing']['billing_address_1'];  
  $fields2['billing']['billing_first_name'] = $fields['billing']['billing_first_name'];
  $fields2['billing']['billing_last_name']  = $fields['billing']['billing_last_name'];
  $fields2['billing']['billing_address_2']  = $fields['billing']['billing_address_2'];
  $fields2['billing']['billing_postcode']   = $fields['billing']['billing_postcode'];
  $fields2['billing']['billing_city']       = $fields['billing']['billing_city'];
  $fields2['billing']['billing_country']    = $fields['billing']['billing_country'];
  $fields2['billing']['billing_phone']      = $fields['billing']['billing_phone'];  
  $fields2['billing']['billing_email']      = $fields['billing']['billing_email'];
 

    $fields2['billing']['billing_address_1'] = array(
        'label'     => __('delivery address', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true
    );    

    $fields2['billing']['billing_address_2'] = array(
        'label'     => __('billing address', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true
    ); 

    $fields2['billing']['billing_postcode'] = array(
        'label'     => __('ZIP postal code', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-first'),
        'clear'     => false
    ); 
    $fields2['billing']['billing_city'] = array(
        'label'     => __('city', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-last'),
        'clear'     => true
    ); 
    $fields2['billing']['billing_country'] = array(
        'label'     => __('country', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-first'),
        'clear'     => false,
        'type'      => 'select',
        'options'   => array(
        'country'   => __('Country', 'woocommerce' ),
        'IE'        => __('Ireland', 'woocommerce' ),
        'GB'        => __('United Kingdom', 'woocommerce' ),
        )
    );
     $fields2['billing']['billing_phone'] = array(
        'label'     => __('telephone', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-last'),
        'clear'     => true
    );       
     $fields2['billing']['billing_email'] = array(
        'label'     => __('email', 'woocommerce'),
        'required'  => true,
        'class'     => array('form-row-wide'),
        'clear'     => true
    ); 


  $checkout_fields = array_merge( $fields, $fields2);
  return $checkout_fields;
}




function wc_billing_field_strings( $translated_text, $text, $domain ) {
    switch ( $translated_text ) {
        case 'Billing details' :
            $translated_text = __( '<span>DELIVERY ADDRESS</span>', 'woocommerce' );
            break;
    }
    return $translated_text;
}
add_filter( 'gettext', 'wc_billing_field_strings', 20, 3 );





//remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_filter('woocommerce_product_description_heading',
'sam_product_description_heading');

function sam_product_description_heading() {
    return '';
}



/*
Disable Variable Product Price Range: 
*/
 
add_filter( 'woocommerce_variable_sale_price_html', 'my_variation_price_format', 10, 2 );
 
add_filter( 'woocommerce_variable_price_html', 'my_variation_price_format', 10, 2 );
 
function my_variation_price_format( $price, $product ) {
 
// Main Price
$prices = array( $product->get_variation_price( 'min', true ), $product->get_variation_price( 'max', true ) );
$price = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
// Sale Price
$prices = array( $product->get_variation_regular_price( 'min', true ), $product->get_variation_regular_price( 'max', true ) );
sort( $prices );
$saleprice = $prices[0] !== $prices[1] ? sprintf( __( '%1$s', 'woocommerce' ), wc_price( $prices[0] ) ) : wc_price( $prices[0] );
 
if ( $price !== $saleprice ) {
$price = '<del>' . $saleprice . '</del> <ins>' . $price . '</ins>';
}
return $price;
}

/*
Disable Variable Product Price Range completely:
*/
 
add_filter( 'woocommerce_variable_sale_price_html', 'my_remove_variation_price', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'my_remove_variation_price', 10, 2 );
 
function my_remove_variation_price( $price ) {
$price = '';
return $price;
}




/********** MOVE VARIABLE PRICE BELOW PRODUCT TITLE ***********/
function shuffle_variable_product_elements(){
    if ( is_product() ) {
        global $post;
        $product = wc_get_product( $post->ID );
        if ( $product->is_type( 'variable' ) ) {
            remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_single_variation', 20 );

            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_template_single_title', 10 );

            remove_action( 'woocommerce_single_product_summary', 'rointe_display_acf_before_price', 15 );
            add_action( 'woocommerce_before_variations_form', 'rointe_display_acf_before_price', 30 );

            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
            add_action( 'woocommerce_before_variations_form', 'woocommerce_template_single_excerpt', 30 );
        }
    }
}
add_action( 'woocommerce_before_single_product', 'shuffle_variable_product_elements' );




// Remove the product rating display on product loops
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );


//Remove add to cart button in loop and add custom button
/*add_action( 'woocommerce_after_shop_loop_item', 'remove_loop_button', 1 );
function remove_loop_button()
{
    if( is_product_category() || is_shop() || is_front_page() ) { 
        global $product;
        $link = $product->get_permalink();
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
        echo "<a href='".$link."' class='see-more-btn button'>See more</a>";
    }
}*/
 
// Remove add to cart button in loop and add custom button
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Second, add View Product Button
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10);
 
function bbloomer_view_product_button() {
global $product;
$link = $product->get_permalink();
echo '<a href="' . $link . '" class="see-more-btn button">View Product</a>';
}



/*
 * Change price format from range to "From:"
 *
 * @param float $price
 * @param obj $product
 * @return str
 */
function iconic_variable_price_format( $price, $product ) {
    if( !is_product() ){
    $prefix = sprintf('%s: ', __('From', 'iconic'));
 
    $min_price_regular = $product->get_variation_regular_price( 'min', true );
    $min_price_sale    = $product->get_variation_sale_price( 'min', true );
    $max_price = $product->get_variation_price( 'max', true );
    $min_price = $product->get_variation_price( 'min', true );
 
    $price = ( $min_price_sale == $min_price_regular ) ?
        wc_price( $min_price_regular ) :
        '<del>' . wc_price( $min_price_regular ) . '</del>' . '<ins>' . wc_price( $min_price_sale ) . '</ins>';
 
    return ( $min_price == $max_price ) ?
        $price :
        sprintf('%s%s', $prefix, $price);
    }
}
 
add_filter( 'woocommerce_variable_sale_price_html', 'iconic_variable_price_format', 10, 2 );
add_filter( 'woocommerce_variable_price_html', 'iconic_variable_price_format', 10, 2 );




/**
 * Hides the product's weight and dimension in the single product page.
 */
//add_filter( 'wc_product_enable_dimensions_display', '__return_false' );


//add custom tab in single product
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
    
    // Adds the new tab
    $downloads = get_field('downloads_section');
    
    if ($downloads) {
        $tabs['downloads'] = array(
            'title'     => __( 'Downloads', 'woocommerce' ),
            'priority'  => 50,
            'callback'  => 'woo_new_product_tab_content'
        );
    }
    return $tabs;

}
function woo_new_product_tab_content() {

    // The new tab content

    echo '<h2>Downloads</h2>';
    echo get_field('downloads_section');
    
}




// Deregister Contact Form 7 JavaScript files on all pages without a form
/*add_action( 'wp_print_scripts', 'aa_deregister_javascript', 100 );
function aa_deregister_javascript() {
    if ( !is_page( 106 ) || !is_page( 'installer-location' ) ) {
        wp_deregister_script( 'contact-form-7' );
    }
}*/

// Deregister Contact Form 7 styles
/*add_action( 'wp_print_styles', 'aa_deregister_styles', 100 );
function aa_deregister_styles() {
    if ( !is_page( 106 ) || !is_page( 'installer-location' ) ) {
        wp_deregister_style( 'contact-form-7' );
    }
}*/
/*** enque CF7 scripts only on contact page and store locator ****/
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );
add_action( 'wp_enqueue_scripts', 'custom_contact_script_conditional_loading' );

function custom_contact_script_conditional_loading(){
   //  Edit page IDs here
   if(is_page(106) || is_page(93) )    
   {		
     wpcf7_enqueue_scripts(); // Dequeue JS Script file.
     wpcf7_enqueue_styles();  // Dequeue CSS file. 
   }
}


add_action('wp_print_styles', 'my_deregister_styles', 100);

function my_deregister_styles() {
	if( !is_page(93) ) 
	{
		 wp_deregister_style('styles.min');
	}
 
}






remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);


if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {
        echo woocommerce_get_product_thumbnail();
    } 
}
if ( ! function_exists( 'woocommerce_get_product_thumbnail' ) ) {   
    function woocommerce_get_product_thumbnail( $size = 'shop_catalog', $placeholder_width = 0, $placeholder_height = 0  ) {
        global $post, $woocommerce;
        $output = '<div class="imagewrapper">';

        if ( has_post_thumbnail() ) {               
            $output .= get_the_post_thumbnail( $post->ID, $size );              
        }                       
        $output .= '</div>';
        return $output;
    }
}



add_filter('storefront_loop_columns', 'loop_columns');
 
function loop_columns() {
return 1;
}
 
// -------------------------
// 2. Remove default image, price, rating, add to cart
 

remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
// -------------------------
// 3. Remove sale flash (Storefront)
 
add_action( 'init', 'bbloomer_hide_storefront_sale_flash' );
 
function bbloomer_hide_storefront_sale_flash() {
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 6 );
}
 
// -------------------------
// 4. Add <div> before product title
 
add_action( 'woocommerce_before_shop_loop_item', 'bbloomer_loop_product_div_flex_open', 8 );
function bbloomer_loop_product_div_flex_open() {
echo '<div class="product_table">';
}
 
// -------------------------
// 5. Wrap product title into a <div> with class "one_third"
 
add_action( 'woocommerce_before_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 9 );
function bbloomer_loop_product_div_wrap_open() {
echo '<div class="one_third">';
}
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 6 );
function bbloomer_loop_product_div_wrap_close() {
echo '</div>';
}
 
// -------------------------
// 6. Re-add and Wrap price into a <div> with class "one_third"
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 7 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_price', 8 );
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 9 );
 
// -------------------------
// 7. Re-add and Wrap add to cart into a <div> with class "one_third"
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_open', 10 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 11 );
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_wrap_close', 12 );
 
// -------------------------
// 8. Close <div> at the end of product title, price, add to cart divs
 
add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_loop_product_div_flex_close', 13 );
function bbloomer_loop_product_div_flex_close() {
echo '</div>';
}
?>
