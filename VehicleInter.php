<?php

interface Vehicle{
   
    public function run();
}

class Car implements Vehicle{
   
    public $_name ='����';
    public function run(){
        echo "2";
        return $this->_name . '��·����ʻ'; 
    }    
}

class Ship implements Vehicle{
    public  $_name = '�ִ�';

    public function run(){
        echo "3";
        return $this->_name. '�ں��Ϻ���';
    }
}

$car =new Car;
echo $car->run();