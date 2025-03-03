<?php
    require_once("class.bd.php");
    
    class Usuario {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }
        public function login(String $nombre_usuario, String $pass_usuario) {
            $sentencia = "SELECT id_usuario FROM usuario WHERE nombre_usuario = ? AND pass_usuario = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ss", $nombre_usuario, $pass_usuario);         
            $consulta->bind_result($res);
            $consulta->execute();
            $consulta->fetch();
            return $res;     
        }
        //Obtener todos los usuarios de la base datos
        public function obtenerUsuarios(){
            $sentencia ="SELECT id_usuario, nombre_usuario, DNI, pass_usuario, tipo_usuario, puntos_usuario FROM usuario";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_result($res, $res2, $res3, $res4, $res5, $res6);
            $usuarios = array();
            $consulta->execute();
            while($consulta->fetch()){
                array_push($usuarios, [$res, $res2, $res3, $res4, $res5, $res6]);
            };
            $consulta->close();
            return $usuarios;
        }
        //Obtener el tipo de usuario 
        public function obtenerTipoUsu($id_usuario){
            $sentencia ="SELECT tipo_usuario FROM usuario WHERE id_usuario=?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s",$id_usuario);
            $consulta->bind_result($tip);
            $consulta->execute();
            $consulta->fetch();
            return $tip;
        }
        //obtener el id del usuario
        public function obtenerId($nombre_usuario){
            $sentencia="SELECT id_usuario FROM usuario WHERE nombre_usuario=?;";
            $consulta=$this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s",$nombre_usuario);
            $consulta->bind_result($id_usuario);
            $consulta->execute();
            $consulta->fetch();
            return $id_usuario;
        }
        //Insertar usuario
        public function insertar($nombre_usuario, $pass_usuario) {
            $sentencia = "INSERT INTO usuario (nombre_usuario, DNI, pass_usuario) VALUES (?, ?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("sss", $nombre_usuario, $DNI, $pass_usuario);
            return $consulta->execute();
        }
        //Obtener los datos del usuarios
        public function obtenerPorId($id_usuario) {
            $sentencia = "SELECT nombre_usuario, pass_usuario FROM usuario WHERE id_usuario = ?";
            $consulta = $this->conn->__get('conn')->prepare($sentencia); // Usamos la conexión desde la clase `bd`
            $consulta->bind_param('i', $id_usuario);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $usuario = $resultado->fetch_assoc();
            $consulta->close();
            return $usuario;
        }
        //Modificar los usarios
        public function actualizar($nombre_usuario, $pass_usuario, $id_usuario) {
            $sentencia = "UPDATE usuario SET nombre_usuario = ?, pass_usuario = ? WHERE id_usuario = ?";
            $consulta = $this->conn->__get('conn')->prepare($sentencia);
            $consulta->bind_param('ssi', $nombre_usuario, $pass_usuario, $id_usuario);
            $consulta->execute();
            $consulta->close();
        }

        public function existeUsuario($nombre_usuario) {
            $sentencia = "SELECT id_usuario FROM usuario WHERE nombre_usuario = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("s", $nombre_usuario);
            $consulta->execute();
            $consulta->bind_result($id_usuario);
            
            $existe = false;
            if ($consulta->fetch()) {
                $existe = true;
            }
    
            $consulta->close();
            return $existe;
        }
    
        public function registrarUsuario($nombre_usuario, $pass_usuario) {
            $hashed_password = password_hash($pass_usuario, PASSWORD_BCRYPT);
            $sentencia = "INSERT INTO usuario (nombre_usuario, pass_usuario) VALUES (?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ss", $nombre_usuario, $hashed_password);
            
            $resultado = $consulta->execute();
            $consulta->close();
            
            return $resultado;
        }
    }
?>