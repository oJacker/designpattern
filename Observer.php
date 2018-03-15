<?php 



/**
 * ���۲��߽ӿ�
 * @author SINCE
 *
 */
interface Observable{
    
    //���/ע��۲���
    public function attach(Observer $observer);
    // ɾ���۲���
    public function detach(observer $observer);
    
    //����֪ͨ
    public function notify();

}



/**
 * 
 * ���۲��ߣ�ְ����ӹ۲��ߵ�$observsers�����У��б䶯ʱ֪ͨnotify()��������֪ͨ
 * @author SINCE
 *
 */

class Order implements Observable{
    
    //����۲���
    private $observers =array();
    
    //����״̬
    private $state = 0;
    
    //��ӣ�ע��۲��ߣ�
    public function attach(Observer $observer){
        
        $key = array_search($observer, $this->observers);
        
        if($key === false){
            
            $this->observers[] =$observer;
        }
    }
    
    
    //�Ƴ��۲���
    public function detach(Observer $observer){
        
        $key = array_search($observer, $this->observers);
        
        if($key !==false){
            unset($this->observers[$key]);
        }
        
    }
    
    
    // �������ù۲��ߵ�update()��������֪ͨ�������������ʵ�ַ�ʽ
    public function notify(){
        
        foreach ($this->observers as $observer) {
            // �ѱ�����󴫸��۲��ߣ��Ա�۲��߻�ȡ��ǰ��������Ϣ
            $observer->update($this);
        }
    }
    
    
    // ����״̬�б仯ʱ����֪ͨ
    public function addOrder(){
        
        $this->state =1;
        $this->notify();
    }
    
    // ��ȡ�ṩ���۲��ߵ�״̬
    public function getState(){
        
        return $this->state;
    }
    
    
}


/**
 * �۲��߽ӿ�
 * @author SINCE
 *
 */
interface Observer{
    
    //���յ�֪ͨ�Ĵ�����
    public function update(Observable $observable);
}



/**
 * �۲���1:�����ʼ�
 * @author SINCE
 *
 */
class Email implements Observer{
    
    public function update(Observable $observable){
        $state = $observable->getState();
        
        if($state){
            echo "�����ʼ������Ѿ��ɹ��µ�.";
        }else{
            echo "�����ʼ����µ�ʧ��,������";
        }
        
    }
}



/**
 * �۲���2:����֪ͨ
 * @author SINCE
 *
 */
class Message implements Observer{
    public function update(Observable $observable){
        
        $state =$observable->getState();
        if($state){
            echo "����֪ͨ�������µ��ɹ�";
        }else{
            
            echo "����֪ͨ���µ�ʧ�ܣ�������";
        }
    }
}

/**
 * �۲���3����¼��־
 * @author SINCE
 *
 */
class Log implements Observer{
    
    public function update(Observable $observable){
        
        echo "��¼��־��������һ��������¼";
    }
}


class Alert implements Observer{
    public function update(Observable $observable){
        echo 'ϵͳ��Ϣ�����Ķ����и�����~~~~~';
        
    }
}
$email =new Email();
$message =new Message();
$log =new Log();
$alert =new Alert();
//������������
$order =new Order();


$order->attach($email);
$order->attach($message);
$order->attach($log);

//��Ӷ��������ʱ���Զ�����֪ͨ���۲���
$order->addOrder();

echo '<br />';

//ɾ����¼��־�۲���
$order->detach($log);
//�����һ�����������ٴη���֪ͨ���۲���
$order->addOrder();



$order->attach($alert)







?>