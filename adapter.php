<?php

interface PayAdapter{
    
    public function pay();
}


class AlipayAdapter implements PayAdapter{
    
    public function pay(){
        
        $alipay =new Alipay();
        $alipay->sendPayment();
    }
}


class Alipay{
    
    
    public function sendPayment(){
        echo "ʹ��֧����֧��.";
    }
}

class WechatPay{
    
    public function scan(){
        
        echo "ɨ���ά���";
    }
    
    public function doPay(){
        
        echo "ʹ��΢��֧��";
    }
}


/**
 * ΢��֧��������
 * @author SINCE
 *
 */
class WechatPayAdapter implements PayAdapter{
    
    public function pay(){
        
        
        /**
         * ʵ����wechatpay�࣬����wechatPay�ķ���ʵ��֧��
         * ע�⣬΢��֧���ķ�����֧������֧����ʽ��һ������������֮�����Ƕ�����pay��ʵ��֧������
         * @var WechatPay $wechatPay
         */
       
        $wechatPay =new WechatPay();
        $wechatPay->scan();
        $wechatPay->doPay();
    }
}

$wechat =new WechatPayAdapter();

$wechat->pay();










//client Code;
$alipay =  new AlipayAdapter();
//use pay() method 
$alipay->pay();