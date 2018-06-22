<?php

namespace App\Models;

class Post extends \Core\Model
{
    protected $table = "posts";

    public function __construct()
    {
        $this->getDB();
    }

    public function getAll()
    {
        $result = $this->db->query("select * from {$this->table}");
        $arr = $result->fetchAll(\PDO::FETCH_ASSOC);
        return $arr;
    }
}