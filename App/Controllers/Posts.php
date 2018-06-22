<?php

namespace  App\Controllers;

class Posts extends \Core\Controller
{
    public function indexAction()
    {
        $post = new \App\Models\Post();
        $allposts = $post->getAll();
        \Core\View::renderTemplate("Posts/index.html",['posts' => $allposts]);
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