<?php

namespace modules;
//use Couchbase\Exception;

/**
 * View
 *
 * PHP version 7.0
 */
class View
{
    /**
     * Render a view file
     *
     * @param string $view The view file
     * @param array $args Associative array of data to display in the view (optional)
     * @return void
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);
        $file = dirname(__DIR__) . "/app/views/$view";  // relative to Core directory
        if (is_readable($file)) {
            require $file;
        } else {
            throw new Exception("$file not found");
        }
    }

    /**
     * Render a view template using Twig
     *
     * @param string $template The template file
     * @param array $args Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($template, $args = [])
    {
        static $twig = null;
        var_dump(dirname(__DIR__) . '/app/views');
        if ($twig === null) {
            $loader = new \Twig_Loader_Filesystem(dirname(__DIR__) . '/app/views');
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($template, $args);
    }
}