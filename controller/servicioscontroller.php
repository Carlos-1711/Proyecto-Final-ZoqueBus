<?php
class servicioscontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function reservaciones(){
        require_once("view/horarios/verhorarios.php");
    }
}
?>