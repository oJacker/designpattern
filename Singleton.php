<?php
 
class Database{
    
    // ����$instanceΪ˽�о�̬���ͣ����ڱ��浱ǰ��ʵ������Ķ���
    private static $instance =null;
    // ���ݿ����Ӿ��
    private $db = null;
 
    // ���췽������Ϊ˽�з�������ֹ�ⲿ����ʹ��newʵ������ֻ�����ڲ�new
    public function __construct($config =array()){
        $dsn = sprintf('mysql:host=%s;dbname=%s',$config['db_host'],$config['db_name']);
        $this->db = new PDO($dsn,$config['db_user'],$config['db_pass']);
    }
    
    // ���ǻ�ȡ��ǰ������Ψһ��ʽ
    public static function getInstance($config = array()){
        
        if(self::$instance == null){
            self::$instance =new self($config);
        }
        return self::$instance;
    }
    
    // ��ȡ���ݿ�������
    public function db(){
        return $this->db;
    }
    //������Ա˽�У���ֹ��¡����
    private function __clone(){}
    
    // ������Ա˽�У���ֹ�ؽ�����
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








