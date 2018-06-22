<?php

namespace Core;

class View
{
    public function render($temp_path, $params = [])
    {
        extract($params, EXTR_SKIP);

        if (is_readable($temp_path)) {
            include $temp_path; 
        } else {
            var_dump("$temp_path  is not exits !");
        }
    }

    public static function renderTemplate($temp_path, $params = [])
    {
        static $twig = null;
        if ($twig == null ) {
            /*设置*/
            $loader = new \Twig_Loader_Filesystem(BASEDIR.'/App/Views');
            $twig = new \Twig_Environment($loader);
        }
        echo $twig->render($temp_path, $params);
    }
}