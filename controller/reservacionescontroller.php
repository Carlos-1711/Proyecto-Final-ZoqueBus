<?php
class reservacionescontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function reservaciones(){
        require_once("view/horarios/verhorarios.php");
    }
    public static function asientos(){
        $precio = $_POST['precio']??'0';
        htmlspecialchars($precio);
        require_once("view/asientos/asientos.php");
        
    }
    public static function pagos(){
        require_once("view/confimardatos.php");
    }
    public static function tipopago(){
        require_once("view/metodopago.php");
    }


}
?>