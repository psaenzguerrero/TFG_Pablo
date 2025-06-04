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

        public function obtenerId($id_usuario) {
            $sentencia = "SELECT id_pedido FROM pedido WHERE precio = 0 AND id_usu = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_usuario);
            $consulta->execute();
            $consulta->bind_result($id_pedido);
            $consulta->fetch(); // Obtener el valor
            $consulta->close();
            return $id_pedido;
        }

        public function crearContenido($id_pedido,$id_producto,$cantidad){
            $sentencia = "INSERT INTO contenido (id_pedido, id_producto, cantidad) VALUES (?,?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("iii", $id_pedido,$id_producto,$cantidad);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        public function actualizarPrecio($id_usuario, $precio){
            $sentencia = "UPDATE pedido SET precio = precio + ? WHERE id_usu = ? AND precio = 0";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("di", $precio, $id_usuario );
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

    }