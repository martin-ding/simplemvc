<?php

namespace Core;

class Model
{
    protected $db;

    public function getDB()
    {
        $db = DB::getInstance(); #PDO对象的代理
        $db1 = DB::getInstance(); #PDO对象的代理
        $this->db = $db->getDB();
    }
}