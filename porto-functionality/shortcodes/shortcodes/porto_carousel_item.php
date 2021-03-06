<?php

// Porto Carousel Item
add_shortcode('porto_carousel_item', 'porto_shortcode_carousel_item');
add_action('vc_after_init', 'porto_load_carousel_item_shortcode');

function porto_shortcode_carousel_item($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_carousel_item'))
        include $template;
    return ob_get_clean();
}

function porto_load_carousel_item_shortcode() {
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        "name" => "Porto " . __("Carousel Item", 'porto-shortcodes'),
        "base" => "porto_carousel_item",
        "category" => __("Porto", 'porto-shortcodes'),
        "icon" => "porto_vc_carousel_item",
        "as_parent" => array('except' => 'porto_carousel_item'),
        "as_child" => array('only' => 'porto_carousel'),
        "content_element" => true,
        "controls" => "full",
        //'is_container' => true,
        "js_view" => 'VcColumnView',
        "params" => array(
            array(
                'type' => 'label',
                'heading' => __("You shouldn't add shortcode, when select Lazy Load Image or Fetch Viedo type.", 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'dropdown',
                'heading' => __("Type", 'porto-shortcodes'),
                'param_name' => 'type',
                'value' => array(
                    __( 'Default', 'porto-shortcodes' ) => '',
                    __( 'Lazy Load Image', 'porto-shortcodes' ) => 'lazyload',
                    __( 'Fetch Video', 'porto-shortcodes' ) => 'video'
                )
            ),
            array(
                'type' => 'textfield',
                'heading' => __("Vimeo or Youtube Video URL (Link)", 'porto-shortcodes'),
                'param_name' => 'video_url',
                'dependency' => array('element' => 'type', 'value' => array('video')),
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image_url',
                'dependency' => array('element' => 'type', 'value' => array('lazyload')),
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image_id',
                'dependency' => array('element' => 'type', 'value' => array('lazyload')),
            ),
            array(
                'type' => 'textfield',
                'heading' => __("Items to Merge", 'porto-shortcodes'),
                'param_name' => 'merge_items',
                'value' => '1'
            ),
            $custom_class
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Carousel_Item')) {
        class WPBakeryShortCode_Porto_Carousel_Item extends WPBakeryShortCodesContainer {
        }
    }
}