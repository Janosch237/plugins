<?php

// Porto Diamonds
add_shortcode('porto_diamonds', 'porto_shortcode_diamonds');
add_action('vc_after_init', 'porto_load_diamonds_shortcode');

function porto_shortcode_diamonds($atts, $content = null) {
    ob_start();
    if ($template = porto_shortcode_template('porto_diamonds'))
        include $template;
    return ob_get_clean();
}

function porto_load_diamonds_shortcode() {
    $animation_type = porto_vc_animation_type();
    $animation_duration = porto_vc_animation_duration();
    $animation_delay = porto_vc_animation_delay();
    $custom_class = porto_vc_custom_class();

    vc_map( array(
        "name" => "Porto " . __("Diamonds", 'porto-shortcodes'),
        "base" => "porto_diamonds",
        "category" => __("Porto", 'porto-shortcodes'),
        "icon" => "porto_vc_diamonds",
        "params" => array(
            array(
                'type' => 'checkbox',
                'heading' => __("Enable Lightbox", 'porto-shortcodes'),
                'param_name' => 'lightbox',
                'std' => 'yes',
                'value' => array( __( 'Yes', 'js_composer' ) => 'yes' )
            ),
            array(
                'type' => 'label',
                'heading' => __('Input Image URL or Select Image.', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 1:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image1_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image1_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title1'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image1_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image1_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link1'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 2:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image2_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image2_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title2'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image2_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image2_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link2'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 3:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image3_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image3_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title3'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image3_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image3_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link3'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 4:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image4_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image4_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title4'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image4_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image4_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link4'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 5:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image5_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image5_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title5'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image5_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image5_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link5'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 6:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image6_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image6_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title6'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image6_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image6_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link6'
            ),
            array(
                'type' => 'label',
                'heading' => __('Block 7:', 'porto-shortcodes'),
                'param_name' => 'label'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Image URL', 'porto-shortcodes'),
                'param_name' => 'image7_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Image', 'porto-shortcodes'),
                'param_name' => 'image7_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Title', 'porto-shortcodes'),
                'param_name' => 'title7'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('Zoom Image URL', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image7_url'
            ),
            array(
                'type' => 'attach_image',
                'heading' => __('Zoom Image', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'not_empty' => true),
                'param_name' => 'zoom_image7_id'
            ),
            array(
                'type' => 'textfield',
                'heading' => __('URL (Link)', 'porto-shortcodes'),
                'dependency' => array('element' => 'lightbox', 'is_empty' => true),
                'param_name' => 'link7'
            ),
            $custom_class,
            $animation_type,
            $animation_duration,
            $animation_delay
        )
    ) );

    if (!class_exists('WPBakeryShortCode_Porto_Diamonds')) {
        class WPBakeryShortCode_Porto_Diamonds extends WPBakeryShortCode {
        }
    }
}
