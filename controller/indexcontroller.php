<?php
require_once("model/indexmodel.php");
class indexcontroller{
    private $indexmodel;
    public function __construct()
    {
        $this->indexmodel = new Index();
    }
    public static function index(){
        $indexmodel=new Index();
        $terminales = $indexmodel->obtenerTerminales();
        require_once("view/index.php");
    }
    public static function autenticar(){
    $correo = $_REQUEST['correo'];
    $contraseña = $_REQUEST['contraseña'];
    $indexmodel = new Index();
    $usuario = $indexmodel->autentificacion($correo, $contraseña);

    if ($usuario) {
        session_start();
        $_SESSION["idUsuario"] = $usuario['id_usuario'];
        $_SESSION["nombreUsuario"] = $usuario['nombre'];
        $_SESSION["correo"] = $usuario['correo'];
        $_SESSION["tipoUsuario"] = $usuario['tipo'];
        
        header("Location: index.php?i=index"); 
        exit();
    } else {
        header("Location: index.php?i=index&error=1");
        exit();
    }
}

    public static function cerrarSesion(){	
        session_start();
        if(session_destroy()){
            header("location:".urlsite."index.php?i=index");
        }	       
    }
    public static function registrar(){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['password']; 
        $telefono = $_POST['telefono'];
        $fechaRegistro=date('Y-m-d');
        $indexmodel = new Index();
        $resultado = $indexmodel->registrarUsuario($nombre, $correo, $contraseña, $telefono,$fechaRegistro);
    
        if ($resultado) {
            header("Location: index.php?i=index");
            exit();
        } else {
            echo "Error: el correo ya está registrado o hubo un problema.";
        }
    }
    
}
?>