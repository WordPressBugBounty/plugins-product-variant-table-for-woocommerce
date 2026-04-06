<?php

/**
*====================================================
* Exit if accessed directly
*====================================================
**/
if (!defined('ABSPATH')) {
    exit;
}

if( !class_exists('PVTFW_ADVANCE' )):

    class PVTFW_ADVANCE {

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
        * Category Exclude & Include Advance Feature
        *==========================================================================================
        **/
        function filter_setting(){

            $curTab = PVTFW_COMMON::pvtfw_get_options()->curTab;
        ?>
            <div class="form-section" id="advanced">

                <?php do_action('pvtfw_admin_before_filter'); ?>

                <h3>Table Displaying Rule Settings</h3>
                <div class="detail">Show/Hide variation table for a specific group of categories/devices</div>

                <!-- Unlock Link -->
                <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

                <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5">
                    <table class="form-table" style="pointer-events: none;">
                        <tr>
                            <th scope="row">Display Rule</th>
                            <td>
                                <select class="regular-ele-width" name='pvtfw_variant_table_display_rule'>
                                    <option value="default">Default</option>
                                    <option value="disable_pvt">Disable variation table</option>
                                    <option value="keep_both">Keep variation table with dropdown</option>
                                    <option value="table_popup">Table Popup</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Filter By</th>
                            <td>
                                <select class="regular-ele-width" name='pvtfw_variant_table_filter_type'>
                                    <option value="simple">No Filter</option>
                                    <option value="exclude">Exclude Below Categories</option>
                                    <option value="include">Include Below Categories</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Product Categories</th>
                            <td>
                                <select class="regular-ele-width cat-multi" name="pvtfw_variant_table_cat[]" multiple="multiple">
                                    <option value="uncategorized">Uncategorized</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Shortcode Rule</th>
                            <td>
                                <label><input type='checkbox' name='pvtfw_variant_table_rule_for_shortcode' />
                                Apply the above Filter By options for Shortcode too.</label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Disable Table</th>
                            <td>
                                <label><input type='checkbox' name='pvtfw_variant_table_disable_table_on_mobile' /> Disable table and display default dropdown in mobile screen</label>
                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Hide Out of Stock Variation</th>
                            <td>
                                <label><input type='checkbox' name='pvtfw_variant_table_hide_out_of_stock_variation' /> Disable out of stock variation from the table</label>
                            </td>
                        </tr>
                        <tr valign="top" data-child="table_popup-child">
                            <th scope="row">Popup Container Width <?php PVTFW_COMMON::badge(); ?></th>
                            <td>
                                <input class="small-ele-width" type="number" name="pvtfw_variant_table_table_popup_width"
                                    value="1200"><span>px</span>
                                <p><?php echo esc_html__('The width of Table Popup container. It will be applicable when you select the display rule as "Table Popup" from here or from the product edit page.', 'product-variant-table-for-woocommerce'); ?></p>
                            </td>
                        </tr>
                        <tr valign="top" data-child="table_popup-child">
                            <th scope="row">Popup Container Height <?php PVTFW_COMMON::badge(); ?></th>
                            <td>
                                <input class="small-ele-width" type="number" name="pvtfw_variant_table_table_popup_height"
                                    value="600"><span>px</span>
                                    <p><?php echo esc_html__('The height of Table Popup container. It will be applicable when you select the display rule as "Table Popup" from here or from the product edit page.', 'product-variant-table-for-woocommerce'); ?></p>
                            </td>
                        </tr>
                    </table>
                </a>

                <h3>Filter, Search & Pagination Settings</h3>
                <div class="detail">Enable attribute filter, search field and pagination.</div>

                <!-- Unlock Link -->
                <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

                <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
                    <table class="form-table" style="pointer-events: none;">
                        <tr>
                            <th scope="row">Attribute Filter <?php PVTFW_COMMON::badge(); ?></th>
                            <td>
                                <label><input type='checkbox' name='pvtfw_variant_table_variation_search'
                                        /> Enable attribute dropdown to filter table data.</label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Search Field</th>
                            <td>
                                <label><input type='checkbox' name='pvtfw_variant_table_variation_search'
                                        /> Enable search facility</label>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Show Pagination</th>
                            <td>
                                <label><input data-parent="pagination" type='checkbox' name='pvtfw_variant_table_variation_pagination' />
                                    Enable pagination for variation table</label>
                            </td>
                        </tr>
                        <tr valign="top" data-child="pagination-child">
                            <th scope="row">Number of Variations</th>
                            <td>
                                <input class="small-ele-width" type="number" min="1" name="pvtfw_variant_table_num_of_variations"
                                    value="10">
                                    <span class="info-remark">The number of variations per page. Default value is <code>10</code></span>
                            </td>
                        </tr>
                    </table>
                </a>

                <?php do_action('pvtfw_admin_after_filter'); ?>

                <?php if($curTab == 'advanced'): ?> 
                    <input type="hidden" name="pvtfw_variant_table_tab" value="advanced">   
                <?php endif; ?>
            </div>
        <?php
        }

        /**
        *==========================================================================================
        * Thumbnail Advance Feature
        *==========================================================================================
        **/
        function thumbnail_resize_setting(){
        ?>
            <h3>Thumbnail Settings</h3>
            <div class="detail">Set your thumbnail width, height and popup</div>

            <!-- Unlock Link -->
            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="font-weight: bold; color: #9e0303; margin-top: 7px; display: block;"><?php echo esc_attr__( 'Unlock all features >>>', 'product-variant-table-for-woocommerce' ); ?></a>

            <a href="https://wpxtension.com/product/product-variation-table-for-woocommerce/" target="_blank" style="text-decoration: none; color: #2c3338; opacity: 0.5;">
                <table class="form-table" style="pointer-events: none;">
                    <tr>
                        <th scope="row">Thumbnail Size</th>
                        <td>
                            <input class="small-ele-width" type="number" name="pvtfw_variant_table_thumb_size"
                                value="100"> <span>px</span>
                                <span class="info-remark">This size will be <code>size x size</code> For Example: <code>100 x 100</code>. Default value is <code>100</code></span>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Display Thumbnail Popup</th>
                        <td>
                            <label><input type='checkbox' data-parent="thumbnail" name='pvtfw_variant_table_thumb_popup_check' checked='checked' />
                                Show popup after clicking on thumbnail</label>
                        </td>
                    </tr>
                    <tr valign="top" data-child="thumbnail-child">
                        <th scope="row">Variation Title on popup</th>
                        <td>
                            <label><input type='checkbox' name='pvtfw_variant_table_thumb_title'
                                    />
                                Show variation title with attributes on popup</label>
                        </td>
                    </tr>
                    <tr valign="top" data-child="thumbnail-child">
                        <th scope="row">Popup Thumbnail Gallery</th>
                        <td>
                            <label><input type='checkbox' name='pvtfw_variant_table_popup_gallery' />
                                Display thumbnail popup gallery</label>

                        </td>
                    </tr>
                </table>
            </a>
        <?php
        }

        /**
        *====================================================
        * Adding new tab to the setting
        *====================================================
        **/

        function new_setting_tab($tab, $curTab){

            $lock_class = !PVTFW_TABLE::is_pvtfw_pro_Active() ? esc_attr( 'lock' ) : '';

            $tab .= "<a href='#advanced' data-target='advanced' class='nav-tab ".($curTab==='advanced' ? 'nav-tab-active ' : null).$lock_class."'>".PVTFW_COMMON::badge('Pro', 'return').__('Advanced', 'product-variant-table-for-woocommerce')."</a>";
            
            return $tab;

        }


        /**
        * ====================================================
        * Register function
        * ====================================================
        **/
        public function register(){

            if( ! PVTFW_TABLE::is_pvtfw_pro_Active() ):

                add_action('pvtfw_admin_section', array( $this, 'filter_setting' ), 99);
                add_action('pvtfw_admin_after_filter', array( $this, 'thumbnail_resize_setting' ), 100);

            endif;

            // Adding Advance Tab
            add_filter('pvtfw_admin_setting_tab', array( $this, 'new_setting_tab' ), 10, 2);
        }

    }

    $pvtfw_advance = PVTFW_ADVANCE::instance();

endif;