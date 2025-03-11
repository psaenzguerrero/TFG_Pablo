<?php
require_once("class.bd.php");

class Carrito {
    public $conn;

    public function __construct() {
        $this->conn = new bd();
    }

    // Obtener todas las compras
    public function obtenerCompras() {
        $sentencia = "SELECT compra.id_usuario, compra.id_producto, compra.fecha_compra, producto.precio_producto FROM compra, producto WHERE producto.id_producto = compra.id_producto";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $compras = [];

        while ($fila = $resultado->fetch_assoc()) {
            $compras[] = $fila;
        }

        $consulta->close();
        return $compras;
    }

    // Obtener compras por ID de usuario
    public function obtenerPorUsuario($id_usuario) {
        $sentencia = "SELECT compra.id_usuario, compra.id_producto, compra.fecha_compra, producto.precio_producto FROM compra, producto WHERE producto.id_producto = compra.id_producto AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $compras = [];

        while ($fila = $resultado->fetch_assoc()) {
            $compras[] = $fila;
        }

        $consulta->close();
        return $compras;
    }

    // Insertar una nueva compra
    public function insertar($id_usuario, $id_producto, $fecha_compra) {
        $sentencia = "INSERT INTO compra (id_usuario, id_producto, fecha_compra) VALUES (?, ?, ?)";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("iis", $id_usuario, $id_producto, $fecha_compra);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Eliminar una compra por usuario y producto
    public function eliminar($id_usuario, $id_producto) {
        $sentencia = "DELETE FROM compra WHERE id_usuario = ? AND id_producto = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("ii", $id_usuario, $id_producto);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

}
?>
