<?php 

namespace Core;

/*继承来自单例模式，其实DB的操作可以写在这个类中或者定义成抽象类
作为数据库操作的代理类 【多种数据库处理】
*/
class DB extends Singleton
{
    protected static $instance;
    protected static $_flag = false;

    private $dbinstance;
    private $host;
    private $dbname;
    private $username;
    private $passwd;

    public function _init()
    {
        $config = new Config(BASEDIR."/App/configs");
        $dbconfig = $config['database']['local'];
        $this->host = $dbconfig['host'];
        $this->dbname = $dbconfig['dbname'];
        $this->username = $dbconfig['username'];
        $this->passwd = $dbconfig['passwd'];
    }

    /*使用单例模式获取唯一PDO 对象[路子有点野]*/
    public function getDB()
    {
        $this->_init();
        if ( $this->dbinstance == null){
            $this->dbinstance = new \PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username ,$this->passwd);
            $this->dbinstance->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
        }
        return $this->dbinstance;
    }
}