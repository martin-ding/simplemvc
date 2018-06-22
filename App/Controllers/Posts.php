<?php

namespace  App\Controllers;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        \Core\View::renderTemplate("Posts/index.html");
    }

    public function newAction()
    {
        echo "post new function <br/>";
    }

    public function editAction()
    {
        var_dump($this->route_params);
    }
}