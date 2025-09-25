<?php

if( !class_exists('PVTFW_BULK_CART' )):

	class PVTFW_BULK_CART {

		protected static $_instance = null;

        function __construct(){

            $this->register();

        }

        public static function instance() {
            if ( is_null( self::$_instance ) ) {
                self::$_instance = new self();
            }

            return self::$_instance;
        }

        /**
        *==========================================================================================
        * Table Styling Feature
        *==========================================================================================
        **/

        function cart_options_setting(){
        ?> 
        	<div class="form-section" id="cart_options">

        		<h3>Quick Cart Settings</h3>
	            <div class="detail">Quickly update cart right after changing quantity field</div>

	            <!-- Unlock Link -->
	            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

	            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
	                <table class="form-table" style="pointer-events: none;">
	                    <tr>
	                        <th scope="row">Quick Cart <?php PVTFW_COMMON::badge(); ?></th>
	                        <td>
	                            <label><input data-parent="pagination" type='checkbox' name='pvtfw_variant_table_variation_pagination' />
	                                Quickly update the cart item by changing the quantity</label>
	                            <span class="red-remark">Note: We don't recommend using `Quick Cart` and `Bulk Cart` together. This may confuse customers because updating the quantity field automatically adds or removes the item (variation) to/from the cart. Additionally, when enabled, the `Bulk Selection Layout` with checkbox will display an input value of `0`</span>
	                        </td>
	                    </tr>
	                </table>
	            </a>

	        	<h3>Bulk Cart Settings</h3>
	            <div class="detail">Add bulk cart to cart variations.</div>

	            <!-- Unlock Link -->
	            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

	            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
	                <table class="form-table" style="pointer-events: none;">
	                    <tr>
	                        <th scope="row">Bulk Cart</th>
	                        <td>
	                            <label><input data-parent="bulk_cart" type='checkbox' name='pvtfw_variant_table_bulk_cart'checked='checked' />
	                            Enable bulk cart facility</label>
	                        </td>
	                    </tr>
	                    <tr data-child="bulk_cart-child">
	                        <th scope="row">Bulk Selection Layout</th>
	                        <td>
	                            <select class="regular-ele-width" name='pvtfw_variant_table_table_layout_bulk'>
	                                <option value="checkbox">CheckBox</option>
	                                <option value="quantity">Quantity</option>
	                            </select>
	                        </td>
	                    </tr>
	                    <tr data-child="bulk_cart-child">
	                        <th scope="row">Bulk Button Position</th>
	                        <td>
	                            <select class="regular-ele-width" name='pvtfw_variant_table_bulk_cart_position'>
	                                <option value="bulk_cart_bottom">Bottom of the table</option>
	                                <option value="bulk_cart_top">Top of the table</option>
	                                <option value="bulk_cart_both">Display on both top & bottom</option>
	                            </select>
	                        </td>
	                    </tr>
	                    <tr data-child="bulk_cart-child">
	                        <th scope="row">Bulk Button Appearance</th>
	                        <td>
	                            <select class="regular-ele-width" name="pvtfw_variant_table_bulk_cart_btn_appearance">
	                                <option value="only_text">Text</option>
	                                <option value="only_icon">Icon</option>
	                                <option value="both_icon_text">Both Icon and Text</option>
	                            </select>
	                        </td>
	                    </tr>
	                    <tr data-child="bulk_cart-child">
	                        <th scope="row">Pre Selected Variation</th>
	                        <td>
	                            <label><input type='checkbox' name='pvtfw_variant_table_pre_checked_variation'/> Enable it to check all variations initially for bulk cart.</label>
	                                <span class="red-remark">Note: This will work if `Bulk Selection Layout` is `checkbox` and `Quick Cart` is disabled..</span>
	                        </td>
	                    </tr>
	                    <tr data-child="bulk_cart-child">
	                        <th scope="row">Bulk Cart Note</th>
	                        <td>
	                            <label><input type='checkbox' name='pvtfw_variant_table_display_bulk_cart_msg' />
	                                Enable it to display a instruction that how bulk cart works</label>
	                        </td>
	                    </tr>
	                    <tr valign="top" data-child="bulk_cart-child">
	                        <th scope="row">Bulk Cart Message</th>
	                        <td>
	                            <?php
	                                $text = 'Note: Please click the checkbox/checkboxes from the listed variations, to cart them in one click using the Bulk Cart Button';

	                            ?>
	                            <textarea class="regular-ele-width" name="pvtfw_variant_table_display_bulk_cart_msg_text" rows="5"><?php echo esc_attr( $text ); ?></textarea>
	                        </td>
	                    </tr>
	                    <tr data-child="bulk_cart-child">
	                        <th scope="row">Variation Info</th>
	                        <td>
	                            <label><input type='checkbox' name='pvtfw_variant_table_count_variation_and_price'
	                                    />
	                               Enable it to display the number of selected items and the total price with the Bulk Cart Button (on selecting variations checkbox or, increasing the value of quantity field from the table).</label>
	                        </td>
	                    </tr>
	                </table>
	            </a>
	        </div>
        <?php
    	}

        /**
        *====================================================
        * Adding styling tab to the setting
        *====================================================
        **/

        function cart_options_tab($tab, $curTab){

        	$lock_class = !PVTFW_TABLE::is_pvtfw_pro_Active() ? esc_attr( 'lock' ) : '';

            $tab .= "<a href='#cart_options' data-target='cart_options' class='nav-tab ".($curTab==='cart_options' ? 'nav-tab-active ' : null).$lock_class."'>".PVTFW_COMMON::badge('Pro', 'return').__('Cart Options', 'product-variant-table-for-woocommerce')."</a>";
            
            return $tab;

        }

        /**
        * ====================================================
        * Register function
        * ====================================================
        **/
        public function register(){

            if( ! PVTFW_TABLE::is_pvtfw_pro_Active() ):

                add_action('pvtfw_admin_section', array( $this, 'cart_options_setting' ), 99);

            endif;

            // Adding Styling Tab
            add_filter('pvtfw_admin_setting_tab', array( $this, 'cart_options_tab' ), 10, 2);
        }
	}

	$pvtfw_bulk_cart = PVTFW_BULK_CART::instance();

endif;