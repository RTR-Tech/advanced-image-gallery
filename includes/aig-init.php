<?php

class AIG_Init
{
    private static $instance = null;

    public static function get_instance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct()
    {
        // Load Post Type
        AIG_Post_Type::register();

        // Load Meta Boxes
        AIG_Meta_Box::register();

        // Load Shortcodes
        AIG_Shortcodes::register();

        // Load Assets
        AIG_Assets::register();
    }
}
