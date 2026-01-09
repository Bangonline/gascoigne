<?php
/**
 * Enqueue Frontend Scripts and styles
 */
function enqueue_scripts() {
        
    wp_enqueue_style('style', get_template_directory_uri() . '/css/dist/style.min.css',false);

    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/dist/bootstrap.bundle.min.js', array('jquery'), '3.3.7', 'all');
    wp_enqueue_script('slick', get_template_directory_uri() . '/js/dist/slick.min.js', array('jquery'), '1', 'all');
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/dist/scripts.min.js', array('jquery'), '1', 'all');
    
}

add_action('wp_enqueue_scripts','enqueue_scripts');

/*** Bootstrap Nav Walker**/
require_once('wp_bootstrap_navwalker.php');

/** Register Menu's **/
register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'Gascoigne Furniture 2014' ),
) );

//Brochure button
function brochure_button( $atts ) {
    $details = shortcode_atts( array(
        'link' => 'link',
        'caption' => 'caption',
        'target' => 'target'
    ), $atts );

    if($details['target']){
    	$target = "target='".$details['target']."'";
    }
    return '<a href="'.$details['link'].'" '.$target.' class="btn btn-primary" target="_blank"> '.$details['caption'].'</a>';
}
add_shortcode( 'brochure', 'brochure_button' );

add_theme_support( 'post-thumbnails' );

// homepage banner image size
add_image_size( 'homepage-banner', 2200, 9999, false );

// Options page for ACF
if( function_exists('acf_add_options_page') ) {	
    acf_add_options_page($option_page);

    $option_page = acf_add_options_page(array(
		'page_title' 	=> 'Gascoigne Settings',
		'menu_title' 	=> 'Gascoigne',
		'menu_slug' 	=> 'theme-general-settings',
		'capability' 	=> 'edit_posts',
        'redirect' 	=> false,
        'icon_url' => 'dashicons-admin-tools',
        'position' => 1.5,
	));
}

/**
 * 
 *  WOOCOMMERCE
 * 
 */
// Woocommerce theme support
function gascoigne_add_woocommerce_support() {
	add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'gascoigne_add_woocommerce_support' );

/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    //unset( $tabs['reviews'] ); 			// Remove the reviews tab
    //unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

/**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	//$tabs['description']['title'] = __( 'More Information' );		// Rename the description tab
    //$tabs['reviews']['title'] = __( 'Ratings' );				// Rename the reviews tab
	$tabs['additional_information']['title'] = __( 'Specifications' );	// Rename the additional information tab

	return $tabs;

}

/** 
 * Change the heading on the Additional Information tab section title for single products.
 */
add_filter( 'woocommerce_product_additional_information_heading', 'isa_additional_info_heading' );
 
function isa_additional_info_heading() {
    return 'Product Specifications';
}

// Switch detail and full descriptions
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'the_content', 20 );

// hide SKU'S
add_filter( 'wc_product_sku_enabled', '__return_false' );

// Shop managers can now access the 'theme options' pages
function add_theme_caps() {
    $role = get_role( 'shop_manager' );
    $role->add_cap( 'edit_theme_options' ); 
}
add_action( 'admin_init', 'add_theme_caps');

// Add CTA under product details
add_action( 'woocommerce_after_single_product_summary', 'woocommerce_product_cta_message', 5 );
 
function woocommerce_product_cta_message() {
echo '<hr class="visible-xs" /><p class="text-center"> <a href="/our-stores/" class="btn btn-primary"><i class="fa fa-map-marker"></i> Find a showroom</a><br class="visible-xs"/><br class="visible-xs"/> <a href="/contact-us/?productquery='.get_the_title().'" class="btn btn-primary">Contact Us <i class="fa fa-chevron-right"></i></a></p>';
}