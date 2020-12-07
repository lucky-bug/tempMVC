<?php

namespace App\Controller;

use App\Model\PostModel;

class PostController
{
    public function index()
    {
        $model = new PostModel();
        $model->connect();
        $posts = $model->getAll();
        $model->disconnect();
        return [
            'view' => 'Post/index.php',
            'data' => [
                'posts' => $posts,
            ],
        ];
    }

    public function show()
    {
        $model = new PostModel();
        $model->connect();
        $post = $model->getOne($_GET['postId']);
        $model->disconnect();
        return [
            'view' => 'Post/show.php',
            'data' => [
                'post' => $post,
            ],
        ];
    }
}
