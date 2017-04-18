<?php

namespace core;

/**
 * View abstract class
 */
class View {

    // Render a view template using Twig
    public static function renderTemplate($template, $args = []) {
        static $twig = null;
        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem('../app/views');
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($template, $args);
    }	
}