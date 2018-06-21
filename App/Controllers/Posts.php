<?php

namespace  App\Controllers;

class Posts extends \Core\Controller
{
    public function index()
    {
        echo "post index function";
    }

    public function newOne()
    {
        echo "post new function";
    }

    public function edit()
    {
        var_dump($this->route_params);
    }
}