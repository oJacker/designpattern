<?php

/**
 * 
 * ������ϵ��Association������ʾһ��������Ա����˶���һ�����һ��ʵ��������ʵ���������á�������ϵ��������֮����õ�һ�ֹ�ϵ����ʾһ���������һ�����֮������ϵ����ϡ��ۺ�Ҳ���ڹ�����ϵ��ֻ�ǹ�����ϵ������ϵ����������Ҫ����
 * ������ϵ�����֣�˫�����������������Թ�����������������
 * ���磺������˾����һ��������Ӧ�ض���˾����һ��˾��Ҳ���Կ���������
 * @author SINCE
 *
 */

class Driver{
    
    public $cars =array();
    
    public function addCar(Car $car){
        $this->cars[] = $car;
    }
}

class Car{
    public $drivers = array();
    
    public function addDriver(Driver $driver){
        
        $this->drivers[] = $driver;
    }
}

$driver = new Driver();
$line = new Car();

$driver->addCar($line);
$line->addDriver($driver);

print_r($driver);