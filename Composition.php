<?php

/**
 * 
 * 
 * ��Ϲ�ϵ
 * @author SINCE
 *
 */
class Head{
    
    public $_name = 'head';
}

class Body{
    public $_name = 'body';
}

class Human{
    
    
    public $_head;
    public $_body;
    
    public function setHead(Head $head){
        $this->_head = $head;
    }
    
    public function setBody(Body $body){
        $this->_body = $body;
    }
    
    public function display(){
        
        return sprintf('����%s��%s���',$this->_head->_name,$this->_body->_name);
    }
   
}

$human = new Human();

$human->setHead(new Head());
$human->setBody(new Body());

echo $human->display();













