<?php


/**
 * 聚合关系（Aggregation）：整体和部分的关系，整体与部分可以分开。聚合关系也表示类之间整体与部分的关系，成员对象是整体对象的一部分，但是成员对象可以脱离整体对象独立存在。
 * 例如：公交车司机和工衣、工帽是整体与部分的关系，但是可以分开，工衣、工帽可以穿在别的司机身上，公交司机也可以穿别的工衣、工帽
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
        
        return sprintf('公交车司机穿着%s和%s' , $this->_clothers->_name,$this->_hat->_name);
    }
    
}


// Client Code

$driver =new Driver();
$driver->wearClothers(new Clothes());
$driver->wearHat(new Hat());

echo $driver->show();







