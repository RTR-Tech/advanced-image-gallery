<?php

class AIG_Assets
{
    public static function register()
    {
        add_action('admin_enqueue_scripts', [__CLASS__, 'enqueue_admin_assets']);
        add_action('wp_enqueue_scripts', [__CLASS__, 'enqueue_frontend_assets']);
    }

    public static function enqueue_admin_assets($hook)
    {
        if ('post.php' === $hook || 'post-new.php' === $hook) {
            wp_enqueue_style('aig-admin-css', plugin_dir_url(__FILE__) . '../assets/css/admin.css');
            wp_enqueue_script('aig-admin-js', plugin_dir_url(__FILE__) . '../assets/js/admin.js', array('jquery'), '1.0.0', true);
            wp_localize_script('aig-admin-js', 'AIG_Admin', array(
                'mediaFrameTitle'  => __('Select Images', 'advanced-image-gallery'),
                'mediaFrameButton' => __('Add to Gallery', 'advanced-image-gallery'),
            ));
        }
    }

    public static function enqueue_frontend_assets()
    {
        wp_enqueue_style('aig-frontend-css', plugin_dir_url(__FILE__) . '../assets/css/frontend.css');
        wp_enqueue_script('aig-frontend-js', plugin_dir_url(__FILE__) . '../assets/js/frontend.js', array('jquery'), '1.0.0', true);
    }
}
