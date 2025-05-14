<?php

class atencionclientecontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function atencioncliente(){
        require_once("view/atencion_al_cliente/veratencioncliente.php");
    }
}
?>