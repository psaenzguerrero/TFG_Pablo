<?php
    require_once("class.bd.php");

    class Pedido {

        public $conn;
        public function __construct() {
            $this->conn = new bd();
        }

        public function crearPedido($id_usuario, $precio, $fecha){
            $sentencia = "INSERT INTO pedido (id_usu, precio, fecha) VALUES (?,?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ids", $id_usuario, $precio, $fecha);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        public function obtenerId($id_usuario){
            $sentencia = "SELECT id_pedido FROM pedido WHERE precio = -1 AND id_usu = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_usuario);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        public function crearContenido($id_pedido,$id_producto,$cantidad){
            $sentencia = "INSERT INTO contenido (id_pedido, id_producto, cantidad) VALUES (?,?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("iii", $id_pedido,$id_producto,$cantidad);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

    }