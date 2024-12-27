<?php

class AIG_Shortcode
{
    public static function register()
    {
        add_shortcode('aig_gallery', [__CLASS__, 'render_shortcode']);
    }

    public static function render_shortcode($atts)
    {
        $atts = shortcode_atts(array('id' => ''), $atts);
        $post_id = intval($atts['id']);
        $gallery_images = get_post_meta($post_id, '_aig_gallery_images', true);

        if (empty($gallery_images)) {
            return '<p>' . __('No images found in this gallery.', 'advanced-image-gallery') . '</p>';
        }

        ob_start();
        echo '<div class="aig-gallery-wrapper">';
        foreach ($gallery_images as $image_id) {
            $image_url = wp_get_attachment_url($image_id);
            echo '<div class="aig-gallery-item">
                <img src="' . esc_url($image_url) . '" alt="" />
            </div>';
        }
        echo '</div>';
        return ob_get_clean();
    }
}
