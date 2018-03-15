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
        echo "使用支付宝支付.";
    }
}

class WechatPay{
    
    public function scan(){
        
        echo "扫描二维码后，";
    }
    
    public function doPay(){
        
        echo "使用微信支付";
    }
}


/**
 * 微信支付适配器
 * @author SINCE
 *
 */
class WechatPayAdapter implements PayAdapter{
    
    public function pay(){
        
        
        /**
         * 实例化wechatpay类，并用wechatPay的方法实现支付
         * 注意，微信支付的方法和支付宝的支付方式不一样，但是适配之后，他们都能用pay来实现支付功能
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