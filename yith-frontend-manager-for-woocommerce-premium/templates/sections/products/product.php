<?php

defined( 'ABSPATH' ) or exit;

$act = isset( $_REQUEST['act'] ) ? $_REQUEST['act'] : '';

$new_product_id = 0;

if ( $act == 'save' ) {
    $new_product_id = YITH_Frontend_Manager_Section_Products::save_product( $_POST );
}

if( isset( $new_product_id ) && $new_product_id > 0 ){
    $product_id = $new_product_id;
}

elseif( isset( $_GET['product_id'] ) && $_GET['product_id'] > 0 ){
    $product_id = $_GET['product_id'];
}

else{
    $product_id = 0;
}

$_product = null;

if( $product_id > 0 ){
    $_product = wc_get_product( $product_id );
}

else {
    $_product   = get_default_post_to_edit( 'product', true );
    $product_id = $_product->ID;
}


$post_title = $post_content = $post_excerpt = $post_status = '';

if( ! empty( $_product ) ){
    $post_title     = yit_get_prop( $_product, 'title' );
    $post_content   = yit_get_prop( $_product, 'description' );
    $post_excerpt   = yit_get_prop( $_product, 'short_description' );
    $post_status    = yit_get_prop( $_product, 'status' );
}

$_product_image_gallery = get_post_meta( $product_id, '_product_image_gallery', true );

yith_wcfm_include_woocommerce_core_file( 'wc-meta-box-functions.php' );

$post         = get_post( $product_id );
$endpoint_url = $section_obj->get_url( $section_obj->get_current_subsection( true ) );

?>

<div id="yith-wcfm-product" class="yith-wcfm-product yith-wcfm-form">

    <h1><?php echo __('Product', 'yith-frontend-manager-for-woocommerce'); ?></h1>

    <?php
        if( $act == 'save' ) {
	        $message = $new_product_id != 0 ? 'success' : 'error';
            $section_obj->show_wc_notice( $message );
        }
    ?>

    <?php if ( $product_id > 0 && is_callable( $_product, 'get_permalink' ) ) : ?>
        <a href="<?php echo $_product->get_permalink(); ?>" class="page-title-action button"><?php echo __('View Product', 'yith-frontend-manager-for-woocommerce'); ?></a>
    <?php endif; ?>

    <form name="post" action="<?php echo add_query_arg( array( 'product_id' => $product_id ), $endpoint_url ); ?>" method="post" id="post">

        <input type="hidden" name="id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
        <input type="hidden" name="act" value="save">
    
        <p class="form-field">
            <label><?php echo __('Thumbnail', 'yith-frontend-manager-for-woocommerce'); ?></label>
            <span id="upload_image_input">
                <?php echo YITH_Frontend_Manager_Media::upload_image_input( 'post', $product_id ); ?>
            </span>
            <span class="clear"></span>
        </p>

        <p class="form-field">
            <label><?php echo __('Product Gallery', 'yith-frontend-manager-for-woocommerce'); ?></label>
            <span id="product_gallery">
                <?php

                $gallery = ! empty( $_product_image_gallery ) ? explode( ',', $_product_image_gallery ) : array();

                if( ! $gallery ){
                    echo wc_placeholder_img( array( 70, 70 ) );
                }

                foreach ( $gallery as $key => $value ) { ?>
                    <span class="image">
                        <span class="dashicons dashicons-dismiss remove_image"></span>
                        <?php echo wp_get_attachment_image( $value, 'thumbnail' ); ?>
                        <input type="hidden" name="product_gallery[]" value="<?php echo $value; ?>" />
                    </span>
                <?php } ?>
            </span>
            <?php echo YITH_Frontend_Manager_Media::product_gallery( $product_id ); ?>
            <span class="clear"></span>
        </p>

        <p class="form-field">
            <label for="post_title"><?php echo __('Title', 'yith-frontend-manager-for-woocommerce'); ?></label>
            <input type="text" name="post_title" value="<?php echo $post_title; ?>" id="post_title">
        </p>

        <p class="form-field">
            <label for="post_content"><?php echo __('Description', 'yith-frontend-manager-for-woocommerce'); ?></label>
        </p>

        <div class="visual-editor"><?php wp_editor( $post_content, 'post_content', $settings = array() ); ?></div>

        <p class="form-field">
            <label for="post_excerpt"><?php echo __('Excerpt', 'yith-frontend-manager-for-woocommerce'); ?></label>
        </p>

        <div class="visual-editor"><?php wp_editor( $post_excerpt, 'post_excerpt', $settings = array() ); ?></div>

        <div id="woocommerce-product-data"><?php
            $is_wc_lower_3_0_7 = version_compare( WC()->version, '3.0.7', '<' );
            $post = $old_post = null;

            if ( $is_wc_lower_3_0_7 ) {
                global $post;
                $old_post = $post;
            }

            $post = get_post( $product_id );
            WC_Meta_Box_Product_Data::output( $post );

        ?></div>

        <!-- START MetaBoxes -->

        <p class="form-field">
            <label for="post_status"><?php echo __('Status', 'yith-frontend-manager-for-woocommerce'); ?></label>

            <select name="post_status" id="post_status">
                <?php foreach( $product_status as $status => $label ) : ?>
                    <option value="<?php echo $status; ?>" <?php selected( $status, $post_status ); ?>><?php echo $label; ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <?php $taxonomies_type = array(
            'product_cat' => array(
                'metabox_label' => __('Product categories', 'yith-frontend-manager-for-woocommerce'),
                'add_new_label' => __( 'product category', 'yith-frontend-manager-for-woocommerce' ),
                'add_new_link'  => add_query_arg( array( 'edit' => '' ), yith_wcfm_get_section_url( 'products', 'categories' ) )
            ),

            'product_tag' =>array(
                'metabox_label' => __('Product tags', 'yith-frontend-manager-for-woocommerce'),
                'add_new_label' => __( 'product tag', 'yith-frontend-manager-for-woocommerce' ),
                'add_new_link'  => add_query_arg( array( 'edit' => '' ), yith_wcfm_get_section_url( 'products', 'tags' ) )
            ),
        ); ?>

        <?php foreach( $taxonomies_type as $tax_name => $labels ) : ?>
            <div class="form-field">
                <label for="post_status"><?php echo $labels['metabox_label']; ?></label>
                <div id="<?php echo $tax_name; ?>-all" class="tabs-panel">
                    <?php
                    $name = 'tax_input[' . $tax_name . ']';
                    // Allows for an empty term set to be sent. 0 is an invalid Term ID and will be ignored by empty() checks.
                    echo "<input type='hidden' name='{$name}[]' value='0' />";
                    ?>
                    <ul id="<?php echo $tax_name; ?>checklist" data-wp-lists="list:<?php echo $tax_name; ?>" class="categorychecklist form-no-clear">
                        <?php wp_terms_checklist( $post->ID, array( 'taxonomy' => $tax_name ) ); ?>
                    </ul>

                    <?php if( apply_filters( 'yith_wcfm_show_add_new_product_taxonomy_term', true ) ) : ?>
                        <a target="_blank" href="<?php echo $labels['add_new_link'] ?>">
                            <?php printf( '+ %s <em>%s</em>', _x( 'Add new', '[Part of]: Add new product category' ), $labels['add_new_label'] ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <?php

        do_action( 'yith_wcfm_show_product_metaboxes', $post );

        if( $is_wc_lower_3_0_7 ){
            $post = $old_post;
        }
        ?>

        <!-- END MetaBoxes -->

        <input type="submit" value="Save" />

    </form>

</div>

<script type="text/javascript"> woocommerce_admin_meta_boxes_variations.post_id = <?php echo $product_id; ?>; </script>
<script type="text/javascript"> woocommerce_admin_meta_boxes.post_id = <?php echo $product_id; ?>; </script>

