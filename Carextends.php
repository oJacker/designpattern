<?php

class  Car{
    public $name;
    public function run(){
        return "����ʻ��";
    }
}

class Bus extends  Car{
    public function __construct(){
        $this->name = "������";
    }
}

class Taxi extends Car{
    
    public function  __construct(){
        
        $this->name = "���⳵";
    }
    
}

$line =new Bus();

echo $line->name.$line->run();