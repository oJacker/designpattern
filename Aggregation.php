<?php


/**
 * �ۺϹ�ϵ��Aggregation��������Ͳ��ֵĹ�ϵ�������벿�ֿ��Էֿ����ۺϹ�ϵҲ��ʾ��֮�������벿�ֵĹ�ϵ����Ա��������������һ���֣����ǳ�Ա������������������������ڡ�
 * ���磺������˾���͹��¡���ñ�������벿�ֵĹ�ϵ�����ǿ��Էֿ������¡���ñ���Դ��ڱ��˾�����ϣ�����˾��Ҳ���Դ���Ĺ��¡���ñ
 * @author SINCE
 *
 */
class Clothes{
    
    public $_name = '';
}


class Hat{
    
    
    public $_name= '' ;
}

class Driver{
    
    public $_clothers;
    public $_hat;
    
    
    public function wearClothers(Clothes  $clothes){
        $this->_clothers = $clothes;
    }
    
    public function wearHat(Hat $hat){
        $this->_hat = $hat;
        
    }
    
    
    public function show(){
        
        return sprintf('������˾������%s��%s' , $this->_clothers->_name,$this->_hat->_name);
    }
    
}


// Client Code

$driver =new Driver();
$driver->wearClothers(new Clothes());
$driver->wearHat(new Hat());

echo $driver->show();







