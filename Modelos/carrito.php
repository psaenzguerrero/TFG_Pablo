<?php
require_once("class.bd.php");

class Carrito {
    public $conn;

    public function __construct() {
        $this->conn = new bd();
    }

    // Obtener compras por ID de usuario
    public function obtenerPorUsuario($id_usuario) {
        $sentencia = "SELECT carrito.id_usuario, carrito.id_producto, producto.nombre_producto, carrito.fecha_compra, carrito.cantidad, producto.precio_producto FROM carrito, producto WHERE producto.id_producto = carrito.id_producto AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $carrito = [];

        while ($fila = $resultado->fetch_assoc()) {
            $carrito[] = $fila;
        }

        $consulta->close();
        return $carrito;
    }

    public function obtenerProductoCantidad($id_producto, $id_usuario){
        $sentencia = "SELECT cantidad FROM carrito WHERE id_producto = ? AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("ii", $id_producto, $id_usuario);
        $consulta->bind_result($cont);
        $consulta->execute();
        $consulta->fetch();
        $consulta->close();
        return $cont;
    }

    public function aumentarCantidad($id_producto, $id_usuario, $cantidad){
        $sentencia = "UPDATE carrito SET cantidad = cantidad + ? WHERE id_producto = ? AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("iii", $cantidad, $id_producto, $id_usuario );
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
    public function deducirCantidad($id_producto, $id_usuario){
        $sentencia = "UPDATE carrito SET cantidad = cantidad-1 WHERE id_producto = ? AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("ii", $id_producto, $id_usuario);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Insertar una nueva compra
    public function insertar($id_usuario, $id_producto, $cantidad, $fecha_compra) {
        $sentencia = "INSERT INTO carrito (id_usuario, id_producto, cantidad, fecha_compra) VALUES (?, ?, ?, ?)";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("iiis", $id_usuario, $id_producto, $cantidad, $fecha_compra);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Eliminar una compra por usuario y producto
    public function eliminar($id_usuario, $id_producto) {
        $sentencia = "DELETE FROM carrito WHERE id_usuario = ? AND id_producto = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("ii", $id_usuario, $id_producto);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
    public function eliminarTodo($id_usuario){
        $sentencia = "DELETE FROM carrito WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    public function sumarPrecio($id_usuario){
        $sentencia = "SELECT SUM(cantidad*producto.precio_producto) FROM compra, producto WHERE producto.id_producto = compra.id_producto AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $consulta->bind_result($precio);
        $resultado = $consulta->execute();
        $consulta->fetch();
        $consulta->close();
        return $precio;
    }
    
    public function sumarPrecioTotal($id_usuario){
        $sentencia = "SELECT SUM(cantidad * precio_producto) FROM carrito c JOIN producto p WHERE c.id_producto = p.id_producto AND id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario); 
        $consulta->execute();
        $consulta->bind_result($precio);
        $consulta->fetch();
        $consulta->close();
        return $precio;
    }
    public function obtenerContenido($id_usuario){
        $sentencia = "SELECT id_producto, cantidad FROM carrito WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $contenido = [];

        while ($fila = $resultado->fetch_assoc()) {
            $contenido[] = $fila;
        }

        $consulta->close();
        return $contenido;
    }
}
?>
