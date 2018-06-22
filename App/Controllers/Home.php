<?php

namespace App\Controllers;

use Core\View;

class Home extends \Core\Controller
{
    public function indexAction()
    {
        // (new View())->render(BASEDIR.'/App/Views/Home/index.php',[
        //     "home" => "controller",
        //     "name" => "zhangsan",
        // ]);
        // 
        View::renderTemplate('Home/index.html',
            [
                "home" => "controller",
                "name" => "zhangsan",
            ]
        );
    }

}