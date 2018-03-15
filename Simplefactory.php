<?php

interface Vehicle{
    
    public function drive();
    
}

class Car implements Vehicle
{
    public function drive()
    {
        echo '�������ĸ����ӹ������ߡ�';
    }
}
class Ship implements Vehicle{
    
    public function drive(){
        echo '�ִ�����������ˮǰ��.';
    }
}

class Aircraft implements Vehicle{
    
    public function drive(){
        echo '�ɻ����������ͻ������������.';
    }
}

class VehicleFactory{
    
    public static function build($className = null){
        
        $className = ucfirst($className);
        if($className && class_exists($className)){
            return new $className();
        }
        return null;
    }
    
}
VehicleFactory::build('Car')->drive();
VehicleFactory::build('Ship')->drive();
VehicleFactory::build('Aircraft')->drive();
