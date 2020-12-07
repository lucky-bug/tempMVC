<?php

namespace App\Model;

use App\Entity\Post;
use mysqli;

class PostModel
{
    /**
     * @var mysqli|null
     */
    private $connection;

    public function __construct()
    {
        $this->connection = null;
    }

    public function connect() {
//        $this->connection = new mysqli();
    }

    public function getAll() {
//        $sql = '';
//        $posts = $this->connection->query($sql)->fetch_all(MYSQLI_ASSOC);
//        $result = [];
//        foreach ($posts as $post) {
//            $result[] = new Post($post['title'], $post['body']);
//        }
//        return $result;
        return [
            new Post('A', 'a'),
            new Post('B', 'b'),
            new Post('C', 'c'),
        ];
    }

    public function getOne(int $id)
    {
        return new Post('A', 'a');
    }

    public function add(Post $post) {
        $sql = "insert into posts(title, body) values({$post->getTitle()},{$post->getBody()});";
    }

    public function disconnect() {
//        $this->connection->close();
    }
}
