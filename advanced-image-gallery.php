<?php

/**
 * Plugin Name: Advanced Image Gallery
 * Description: A WordPress plugin to create advanced image galleries with filters.
 * Version: 1.0.0
 * Author: Rohan T George
 * Text Domain: advanced-image-gallery
 */

// Exit if accessed directly.
if (! defined('ABSPATH')) {
    exit;
}

// Autoload Classes
spl_autoload_register(function ($class_name) {
    if (strpos($class_name, 'AIG_') === 0) {
        $file = plugin_dir_path(__FILE__) . 'includes/' . strtolower(str_replace('_', '-', $class_name)) . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
});

// Initialize the plugin
function aig_initialize_plugin()
{
    if (class_exists('AIG_Init')) {
        AIG_Init::get_instance();
    }
}
add_action('plugins_loaded', 'aig_initialize_plugin');
