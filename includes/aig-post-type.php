<?php

class AIG_Post_Type
{
    public static function register()
    {
        add_action('init', [__CLASS__, 'register_post_type']);
    }

    public static function register_post_type()
    {
        register_post_type('image_gallery', array(
            'labels' => array(
                'name'               => __('Image Galleries', 'advanced-image-gallery'),
                'singular_name'      => __('Image Gallery', 'advanced-image-gallery'),
                'add_new'            => __('Add New Gallery', 'advanced-image-gallery'),
                'add_new_item'       => __('Add New Image Gallery', 'advanced-image-gallery'),
                'edit_item'          => __('Edit Image Gallery', 'advanced-image-gallery'),
                'new_item'           => __('New Image Gallery', 'advanced-image-gallery'),
                'view_item'          => __('View Image Gallery', 'advanced-image-gallery'),
                'search_items'       => __('Search Image Galleries', 'advanced-image-gallery'),
                'not_found'          => __('No Galleries Found', 'advanced-image-gallery'),
                'not_found_in_trash' => __('No Galleries Found in Trash', 'advanced-image-gallery')
            ),
            'public'       => true,
            'has_archive'  => true,
            'menu_icon'    => 'dashicons-format-gallery',
            'supports'     => array('title', 'editor', 'thumbnail'),
            'rewrite'      => array('slug' => 'galleries'),
        ));
    }
}
