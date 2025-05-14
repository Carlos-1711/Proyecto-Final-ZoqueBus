<?php
class Index{
    private $usuarios;
    public function __construct(){
        $this->usuarios = array();
    }
    public function autentificacion($correo,$contraseña){
        include_once("conexion.php");
        $cnn=new Conexion();
        $consulta = "SELECT * FROM usuarios WHERE correo = :correo AND contraseña = :password"; //Realizamos la consulta 
        $resultado = $cnn->prepare($consulta);
        $resultado->bindParam(':correo', $correo);
        $resultado->bindParam(':password', $contraseña);
        $resultado->execute();
        $this->usuarios = $resultado->fetchAll(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($contraseña, $usuario['contraseña'])) {
            session_start();
            $_SESSION['usuario'] = $usuario; 
            $this->usuarios = $usuario;
        } 
        else {
            $this->usuarios = null;
        }
    }
    public function registrarUsuario($nombre, $correo, $contraseña, $telefono,$fechaRegistro){
        include_once("conexion.php");
        $cnn = new Conexion();
    
        // Validamos que el correo no exista
        $sqlVerificar = "SELECT * FROM usuarios WHERE correo = :correo";
        $stmt = $cnn->prepare($sqlVerificar);
        $stmt->bindParam(':correo', $correo);
        $stmt->execute();
    
        if ($stmt->rowCount() > 0) {
            return false; // Ya existe ese correo
        }
    
        // Hashear contraseña
        $contrasenaHash = password_hash($contraseña, PASSWORD_DEFAULT);
    
        // Mostrar valores antes de insertar
        echo "nombre: $nombre <br>";
        echo "correo: $correo <br>";
        echo "telefono: $telefono <br>";
        echo "contraseña: $contraseñaHash <br>";
        echo "fecha: $fechaRegistro <br>";
        $sql = "INSERT INTO usuarios(nombre, correo, contraseña, telefono,fecha_registro) VALUES(:nombre, :correo, :contrasena, :telefono,:fechaRegistro)";
        $stmt = $cnn->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':telefono', $telefono);
        $stmt->bindParam(':contrasena', $contrasenaHash);
        $stmt->bindParam(':fechaRegistro',$fechaRegistro);
    
        if (!$stmt->execute()) {
            print_r($stmt->errorInfo());
            echo "<br>Query SQL: $sql";
            return false;
        }
        return true;
    }
    public function obtenerTerminales(){
        include_once ("conexion.php");
        $cnn = new Conexion();
        $consulta = "SELECT * FROM terminales";
        $stmt = $cnn->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>