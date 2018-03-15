<?php

interface Vehicle{
   
    public function run();
}

class Car implements Vehicle{
   
    public $_name ='汽车';
    public function run(){
        echo "2";
        return $this->_name . '在路上行驶'; 
    }    
}

class Ship implements Vehicle{
    public  $_name = '轮船';

    public function run(){
        echo "3";
        return $this->_name. '在海上航行';
    }
}

$car =new Car;
echo $car->run();