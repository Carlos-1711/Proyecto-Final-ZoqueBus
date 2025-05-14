<?php
class extrascontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function extras(){
        require_once("view/extras/verextras.php");
    }
}
?>