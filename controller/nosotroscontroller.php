<?php
require_once("model/indexmodel.php");
class nosotroscontroller{
    private $indexmodel;
    public function __construct()
    {
        
    }
    public static function nosotros(){
        require_once("view/nosotros/vernosotros.php");
    }
}
?>