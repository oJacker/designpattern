<?php


/**
 * 
 * ������ϵ��Dependence��������A��ı仯������B��ı仯����˵��B��������A�ࡣ���������£�������ϵ������ĳ����ķ���ʹ����һ����Ķ�����Ϊ������
 * ������ϵ��һ�֡�ʹ�á���ϵ���ض�����ĸı��п��ܻ�Ӱ�쵽ʹ�ø�����������������Ҫ��ʾһ������ʹ����һ������ʱʹ��������ϵ
 * @author SINCE
 *
 */

class Oil{
    public $type = '����';
    
    public function add(){
        
        return $this->type;
    }
}

class Car{
    
    public function beforeRun(Oil $oil){
        
        return '���' . $oil->add();
    }
}

$car =new Car();

echo $car->beforeRun(new Oil());