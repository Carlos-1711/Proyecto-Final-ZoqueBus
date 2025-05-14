<?php
class viajescontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function viajes (){
        require_once("view/viaje/verviajes.php");
    }
}
?>