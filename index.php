<?php
 
/**
 * Plugin Name: Custom Shipping 
 * Plugin URI: 
 * Description: Custom Shipping Method for WooCommerce
 * Version: 1.0.1
 * Author: Helen Connole
 * Author URI: http://twitter.com/helenc77
 * License: GPL-3.0+
 * License URI: http://www.gnu.org/licenses/gpl-3.0.html
 * Domain Path: /lang
 * Text Domain: custom-shipping
 */
 
if ( ! defined( 'WPINC' ) ) {
 
    die;
 
}

/*
 * Check if WooCommerce is active
 */
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
 
    function hc_custom_shipping_method() {
		
        if ( ! class_exists( 'HcCustom_Shipping_Method' ) ) {
			
            class HcCustom_Shipping_Method extends WC_Shipping_Method {
				
                /**
                 * Constructor for your shipping class
                 *
                 * @access public
                 * @return void
                 */
                public function __construct() {
                    $this->id                 = 'custom-shipping'; 
                    $this->method_title       = __( 'Custom Shipping 1', 'custom-shipping' );  
                    $this->method_description = __( 'Custom Shipping Method for weights and categories 1', 'custom-shipping' ); 
 
                    // Availability & Countries
                    $this->availability = 'including';
                    $this->countries = array(
                        'US', // Unites States of America
                        'CA', // Canada
                        'DE', // Germany
                        'GB', // United Kingdom
                        'IT',   // Italy
                        'ES', // Spain
                        'HR'  // Croatia
                        );
 
                    $this->init();
 
                    $this->enabled = isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : 'yes';
                    $this->title = isset( $this->settings['title'] ) ? $this->settings['title'] : __( 'Custom Shipping ', 'custom-shipping' );
                    $this->weight = isset( $this->settings['weight'] ) ? $this->settings['weight'] : __( 'Weight ', 'custom-shipping' );
                    $this->cost = isset( $this->settings['cost'] ) ? $this->settings['cost'] : __( 'Cost ', 'custom-shipping' );
                }
 
                /**
                 * Init your settings
                 *
                 * @access public
                 * @return void
                 */
                function init() {
                    // Load the settings API
                    $this->init_form_fields(); 
                    $this->init_settings(); 
 
                    // Save settings in admin if you have any defined
                    add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
                }
 
                /**
                 * Define settings field for this shipping
                 * @return void 
                 */
                function init_form_fields() { 
 
                    $this->form_fields = array(
 
                     'enabled' => array(
                          'title' => __( 'Enable', 'custom-shipping' ),
                          'type' => 'checkbox',
                          'description' => __( 'Enable this shipping.', 'custom-shipping' ),
                          'default' => 'yes'
                          ),
 
                     'title' => array(
                        'title' => __( 'Title', 'custom-shipping' ),
                          'type' => 'text',
                          'description' => __( 'Title to be display on site', 'custom-shipping' ),
                          'default' => __( 'My Custom Shipping', 'custom-shipping' )
                          ),
 
                     'weight' => array(
                        'title' => __( 'Weight (g)', 'custom-shipping' ),
                          'type' => 'number',
                          'description' => __( 'Maximum allowed weight', 'custom-shipping' ),
                          'default' => 150
                          ),
                        
                     'cost' => array(
                        'title' => __( 'Cost (£)', 'custom-shipping' ),
                          'type' => 'decimal',
                          'description' => __( 'Cost', 'custom-shipping' ),
                          'default' => 1.50
                          ),
 
                     );
 
                }
				
 
                /**
                 * This function is used to calculate the shipping cost. Within this function we can check for weights, dimensions and other parameters.
                 *
                 * @access public
                 * @param mixed $package
                 * @return void
                 */
                public function calculate_shipping( $package = array() ) {
                    
                    $cost = $this->cost;
                    
                    $this->add_rate( array(
                        'id' => $this->id,
                        'label'   => $this->title,
                        'package' => $package,
                        'cost' => $cost,
                        'taxes' => false
                    ) );
                }
            }
        }

        if ( ! class_exists( 'HcCustom_Shipping_Method_2' ) ) {
            class HcCustom_Shipping_Method_2 extends WC_Shipping_Method {
                /**
                 * Constructor for your shipping class
                 *
                 * @access public
                 * @return void
                 */
                public function __construct() {
                    $this->id                 = 'custom-shipping2'; 
                    $this->method_title       = __( 'Custom Shipping 2', 'custom-shipping2' );  
                    $this->method_description = __( 'Custom Shipping Method for weights and categories 2', 'custom-shipping2' ); 
 
                    // Availability & Countries
                    $this->availability = 'including';
                    $this->countries = array(
                        'US', // Unites States of America
                        'CA', // Canada
                        'DE', // Germany
                        'GB', // United Kingdom
                        'IT',   // Italy
                        'ES', // Spain
                        'HR'  // Croatia
                        );
 
                    $this->init();
 
                    $this->enabled = isset( $this->settings['enabled'] ) ? $this->settings['enabled'] : 'yes';
                    $this->title = isset( $this->settings['title'] ) ? $this->settings['title'] : __( 'Custom Shipping 2 ', 'custom-shipping2' );
                    $this->weight = isset( $this->settings['weight'] ) ? $this->settings['weight'] : __( 'Weight ', 'custom-shipping2' );
                    $this->cost = isset( $this->settings['cost'] ) ? $this->settings['cost'] : __( 'Cost ', 'custom-shipping2' );
                }
 
                /**
                 * Init your settings
                 *
                 * @access public
                 * @return void
                 */
                function init() {
                    // Load the settings API
                    $this->init_form_fields(); 
                    $this->init_settings(); 
 
                    // Save settings in admin if you have any defined
                    add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
                }
 
                /**
                 * Define settings field for this shipping
                 * @return void 
                 */
                function init_form_fields() { 
 
                    $this->form_fields = array(
 
                     'enabled' => array(
                          'title' => __( 'Enable', 'custom-shipping2' ),
                          'type' => 'checkbox',
                          'description' => __( 'Enable this shipping.', 'custom-shipping2' ),
                          'default' => 'yes'
                          ),
 
                     'title' => array(
                        'title' => __( 'Title', 'custom-shipping2' ),
                          'type' => 'text',
                          'description' => __( 'Title to be display on site', 'custom-shipping2' ),
                          'default' => __( 'My Custom Shipping', 'custom-shipping2' )
                          ),
 
                     'weight' => array(
                        'title' => __( 'Weight (g)', 'custom-shipping2' ),
                          'type' => 'decimal',
                          'description' => __( 'Maximum allowed weight', 'custom-shipping2' ),
                          'default' => 150
                          ),
                        
                     'cost' => array(
                        'title' => __( 'Cost (£)', 'custom-shipping2' ),
                          'type' => 'decimal',
                          'description' => __( 'Cost', 'custom-shipping2' ),
                          'default' => 1.50
                          ),
 
                     );
 
                }
                
                public function calculate_shipping( $package = array() ) {
                    
                    $cost = $this->cost;
                    
                    $this->add_rate( array(
                        'id' => $this->id,
                        'label'   => $this->title,
                        'package' => $package,
                        'cost' => $cost,
                        'taxes' => false
                    ) );
                }
                
            }
        }

     }	 
    add_action( 'woocommerce_shipping_init', 'hc_custom_shipping_method' );
 
    function hc_add_custom_shipping_method( $methods ) {
        $methods[] = 'HcCustom_Shipping_Method';
		$methods[] = 'HcCustom_Shipping_Method_2';
        return $methods;
    }
    add_filter( 'woocommerce_shipping_methods', 'hc_add_custom_shipping_method' );


    // add filter and function to hide method
    add_filter( 'woocommerce_package_rates', 'show_hide_custom_shipping_methods' , 10, 1 );
    function show_hide_custom_shipping_methods( $available_methods ){
		
		//put whatever logic you want for your basket here...
		//disable flat rate shipping which may override this, some other shipping methods may work with it
        
        //get max weight(s)
        $HcCustom_Shipping_Method = new HcCustom_Shipping_Method();
        $weightLimit = (int) $HcCustom_Shipping_Method->settings['weight'];
        
        $HcCustom_Shipping_Method_2 = new HcCustom_Shipping_Method_2();
        $weightLimit2 = (int) $HcCustom_Shipping_Method_2->settings['weight'];

        //customer location
        $location = WC_Geolocation::geolocate_ip();
        
        //loose product class
        $category_loose = 198;
        
        //basic shipping class
        $shipping_class_basic = 'basic';
        
        //get total weight of cart
        $total_cart_weight = WC()->cart->cart_contents_weight;
        
        //assume we have all loose products to begin with, then disprove this
        $all_products_are_loose_or_basic = 1;

        //get product categories
        foreach( WC()->cart->get_cart() as $cart_item ){
            
            //var_dump($cart_item['data']);
            $product_type = $cart_item['data']->get_type();
            
            //is this a simple product or product varation?
            if ($product_type == 'simple') {

                $product_type = 'simple'; //has category ids itself
                $product_category_ids = $cart_item['data']->get_category_ids();
                
            } elseif ($product_type == 'variation') {
                
                $the_product = wc_get_product($cart_item['data']->get_parent_id());
                $product_category_ids = $the_product->get_category_ids();
                
            }
            
            //is this product Loose or in the basic shipping category?
            if(
                !in_array($category_loose, $product_category_ids ) &&
                $cart_item['data']->get_shipping_class() != $shipping_class_basic
            ){
                $all_products_are_loose_or_basic = 0;
            }
          
        } 

        if($total_cart_weight > $weightLimit || $all_products_are_loose_or_basic == 0 || $location['country'] != 'GB'){
            unset( $available_methods['custom-shipping'] ); 
        }
        
        //if($total_cart_weight > $weightLimit2 || $all_products_are_loose_or_basic == 0 || $location['country'] != 'GB'){
        //    unset( $available_methods['custom-shipping2'] ); 
        //}
        
        // return the available methods without the one you unset.
        return $available_methods;
    }

}