<?php

class AIG_Shortcodes
{
    public static function register()
    {
        add_shortcode('advanced_image_gallery', [__CLASS__, 'render_gallery']);
    }

    public static function render_gallery($atts)
    {
        // Parse the shortcode attributes
        $atts = shortcode_atts(
            [
                'id' => '', // Gallery ID
            ],
            $atts,
            'advanced_image_gallery'
        );

        if (empty($atts['id'])) {
            return '<p>' . esc_html__('No gallery ID provided.', 'advanced-image-gallery') . '</p>';
        }

        // Retrieve the gallery post
        $gallery_post = get_post($atts['id']);
        if (! $gallery_post || $gallery_post->post_type !== 'image_gallery') {
            return '<p>' . esc_html__('Invalid gallery ID.', 'advanced-image-gallery') . '</p>';
        }

        // Get gallery metadata (images and filters)
        $gallery_images = get_post_meta($atts['id'], '_aig_gallery_images', true);

        if (empty($gallery_images)) {
            return '<p>' . esc_html__('No images found for this gallery.', 'advanced-image-gallery') . '</p>';
        }

        // Gather unique filters
        $all_filters = [];
        foreach ($gallery_images as $image_id) {
            $image_filters = get_post_meta($image_id, '_aig_image_filters', true) ?: [];
            $all_filters = array_merge($all_filters, $image_filters);
        }
        $all_filters = array_unique($all_filters);

        // Render the filters
        ob_start();
        if (!empty($all_filters)) {
            echo '<div class="aig-gallery-filters">';
            echo '<button class="filter-button" data-filter="*">' . esc_html__('All', 'advanced-image-gallery') . '</button>';
            foreach ($all_filters as $filter) {
                echo '<button class="filter-button" data-filter="' . esc_attr(sanitize_title($filter)) . '">' . esc_html($filter) . '</button>';
            }
            echo '</div>';
        }

        // Render the gallery
        echo '<div class="aig-gallery-wrapper">';
        foreach ($gallery_images as $image_id) {
            $image_url = wp_get_attachment_image_url($image_id, 'large');
            $image_filters = get_post_meta($image_id, '_aig_image_filters', true) ?: [];
            $image_classes = implode(' ', array_map('sanitize_title', $image_filters));

            echo '<div class="aig-gallery-item ' . esc_attr($image_classes) . '">';
            echo '<img src="' . esc_url($image_url) . '" alt="' . esc_attr(get_the_title($image_id)) . '" />';
            echo '</div>';
        }
        echo '</div>';

        return ob_get_clean();
    }
}

AIG_Shortcodes::register();
