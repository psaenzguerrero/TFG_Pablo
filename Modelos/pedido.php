<?php
    require_once("class.bd.php");

    class Pedido {

        public function crearPedido($id_usuario, $precio, $fecha){
            $sentecia = "INSERT INTO pedido (id_usu, precio, fecha) VALUES (?,?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ids", $id_usuario, $precio, $fecha);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

    }