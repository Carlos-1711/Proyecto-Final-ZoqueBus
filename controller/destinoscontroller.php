<?php
require_once("model/indexmodel.php");
class destinoscontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function destinos(){
        require_once("view/destinos/verdestinos.php");
    }
}
?>