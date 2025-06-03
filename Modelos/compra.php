<?php
    require_once("class.bd.php");

    class Compra {

        public function crearCompra($id_pedido,$id_usuario, $precio, $metodo){
            $sentecia = "INSERT INTO compra (id_pedido,id_usuario, cantidad, metodo) VALUES (?,?,?,?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("iids", $id_pedido,$id_usuario, $cantidad, $metodo);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

    }