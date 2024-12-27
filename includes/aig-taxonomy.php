<?php

class AIG_Taxonomy
{
    public static function register()
    {
        add_action('init', [__CLASS__, 'register_taxonomy']);
    }

    public static function register_taxonomy()
    {
        register_taxonomy('gallery_filter', 'image_gallery', array(
            'labels' => array(
                'name'          => __('Filters', 'advanced-image-gallery'),
                'singular_name' => __('Filter', 'advanced-image-gallery'),
                'search_items'  => __('Search Filters', 'advanced-image-gallery'),
                'all_items'     => __('All Filters', 'advanced-image-gallery'),
                'edit_item'     => __('Edit Filter', 'advanced-image-gallery'),
                'update_item'   => __('Update Filter', 'advanced-image-gallery'),
                'add_new_item'  => __('Add New Filter', 'advanced-image-gallery'),
                'new_item_name' => __('New Filter Name', 'advanced-image-gallery')
            ),
            'hierarchical' => true,
            'show_admin_column' => true,
        ));
    }
}
