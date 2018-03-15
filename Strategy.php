<?php

interface OutputStartegy{
    
    public function render($array);
}


class SerializeStrategy implements OutputStartegy{
    
    public function render($array){
        
        return  serialize($array);
    }
    
}


class JsonStrategy implements OutputStartegy{
    
    public function render($array){
        
        return json_encode($array);
    }
}


class ArrayStrategy implements OutputStartegy{
    
    public function  render($array){
        return $array;
    } 
}

class Output {
     private $outputStrategy;
     
     public function __construct(OutputStartegy $outputStrategy){
         
         $this->outputStrategy  = $outputStrategy;
     }
     
     public function  renderOutput($array){
         
         return $this->outputStrategy->render($array);
     }
}

$test = ['a','b','c'];

$output = new Output(new ArrayStrategy());

$data =$output->renderOutput($test);

var_dump($data);

$output =new Output(new JsonStrategy());
$data = $output->renderOutput($test);

var_dump($data);


