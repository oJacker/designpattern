<?php
interface IUser{
    function getName();
}

class User implements IUser{
    
    
    public static function Load($id){
        return new User($id);        
    }
        
    public static function Create(){
        return new User (null);
    }
    
    public function __construct($id){
        
    }
    
    public function getName(){
        return "Jack";
    }
}

// class UserFactory{
    
    
//     public static function Create($id){
//         return new User($id);
//     }
// }

// $uo = UserFactory::Create(1);

$uo =User::Load(1);
echo $uo->getName()."\n";

?>