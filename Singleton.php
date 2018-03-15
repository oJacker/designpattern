<?php
 
class Database{
    
    // 声明$instance为私有静态类型，用于保存当前类实例化后的对象
    private static $instance =null;
    // 数据库连接句柄
    private $db = null;
 
    // 构造方法声明为私有方法，禁止外部程序使用new实例化，只能在内部new
    public function __construct($config =array()){
        $dsn = sprintf('mysql:host=%s;dbname=%s',$config['db_host'],$config['db_name']);
        $this->db = new PDO($dsn,$config['db_user'],$config['db_pass']);
    }
    
    // 这是获取当前类对象的唯一方式
    public static function getInstance($config = array()){
        
        if(self::$instance == null){
            self::$instance =new self($config);
        }
        return self::$instance;
    }
    
    // 获取数据库句柄方法
    public function db(){
        return $this->db;
    }
    //声明成员私有，禁止克隆对象
    private function __clone(){}
    
    // 声明成员私有，禁止重建对象
    private function __wakeup(){}
}

$config = array(
  'db_name' =>'advanced_yii2',
  'db_host' => 'localhost',
  'db_user' => 'root',
  'db_pass' =>''
);


$db = Database::getInstance($config);

var_dump($db);








