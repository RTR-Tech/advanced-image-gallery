<?php

class AIG_Meta_Box
{
    public static function register()
    {
        add_action('add_meta_boxes', [__CLASS__, 'add_meta_box']);
        add_action('save_post', [__CLASS__, 'save_meta_box']);
    }

    public static function add_meta_box()
    {
        add_meta_box(
            'aig_gallery_images',
            __('Gallery Images', 'advanced-image-gallery'),
            [__CLASS__, 'render_meta_box'],
            'image_gallery',
            'normal',
            'high'
        );
    }

    public static function render_meta_box($post)
    {
        wp_nonce_field('aig_save_gallery_images', 'aig_gallery_images_nonce');
        $gallery_images = get_post_meta($post->ID, '_aig_gallery_images', true);

        echo '<div id="aig-gallery-container">';
        if (! empty($gallery_images)) {
            foreach ($gallery_images as $image_id) {
                $image_url = wp_get_attachment_url($image_id);
                echo '<div class="aig-gallery-item">
                    <img src="' . esc_url($image_url) . '" />
                    <input type="hidden" name="aig_gallery_images[]" value="' . esc_attr($image_id) . '" />
                    <button class="aig-remove-image">Remove</button>
                </div>';
            }
        }
        echo '</div>';
        echo '<button id="aig-add-images" class="button">' . __('Add Images', 'advanced-image-gallery') . '</button>';
    }

    public static function save_meta_box($post_id)
    {
        if (! isset($_POST['aig_gallery_images_nonce']) || ! wp_verify_nonce($_POST['aig_gallery_images_nonce'], 'aig_save_gallery_images')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (isset($_POST['aig_gallery_images'])) {
            update_post_meta($post_id, '_aig_gallery_images', array_map('intval', $_POST['aig_gallery_images']));
        } else {
            delete_post_meta($post_id, '_aig_gallery_images');
        }
    }
}
