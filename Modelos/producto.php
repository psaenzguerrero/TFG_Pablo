<?php
    require_once("class.bd.php");
    
    class Producto {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }

        // Obtener todos los productos de la base de datos
        public function obtenerProductos() {
            $sentencia = "SELECT id_producto, nombre_producto, precio_producto, tipo_producto, puntos_compra FROM producto";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_result($id_producto, $nombre_producto, $precio_producto, $tipo_producto, $puntos_compra);
            $productos = array();
            $consulta->execute();
            while($consulta->fetch()) {
                array_push($productos, [$id_producto, $nombre_producto, $precio_producto, $tipo_producto, $puntos_compra]);
            }
            $consulta->close();
            
            return $productos;
        }

        // Obtener un producto por su ID
        public function obtenerPorId($id_producto) {
            $sentencia = "SELECT id_producto ,nombre_producto, precio_producto, tipo_producto, puntos_compra, img FROM producto WHERE id_producto = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_producto);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $producto = $resultado->fetch_assoc();
            $consulta->close();
            return $producto;
        }

        // Insertar un nuevo producto
        public function insertar($nombre_producto, $precio_producto, $tipo_producto, $puntos_compra) {
            $sentencia = "INSERT INTO producto (nombre_producto, precio_producto, tipo_producto, puntos_compra) VALUES (?, ?, ?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("sdsi", $nombre_producto, $precio_producto, $tipo_producto, $puntos_compra);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        // Actualizar un producto existente
        public function actualizar($id_producto, $nombre_producto, $precio_producto, $tipo_producto, $puntos_compra) {
            $sentencia = "UPDATE producto SET nombre_producto = ?, precio_producto = ?, tipo_producto = ?, puntos_compra = ? WHERE id_producto = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("sdsii", $nombre_producto, $precio_producto, $tipo_producto, $puntos_compra, $id_producto);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        // Eliminar un producto por su ID
        public function eliminar($id_producto) {
            $sentencia = "DELETE FROM producto WHERE id_producto = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_producto);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }
        public function buscarProductos($filtros) {
            $sentencia = "SELECT id_producto, nombre_producto, precio_producto, tipo_producto, puntos_compra FROM producto WHERE 1=1";
            $tipos = "";
            $valores = [];
        
            if (!empty($filtros['nombre'])) {
                $sentencia .= " AND nombre_producto LIKE ?";
                $tipos .= "s";
                $valores[] = "%" . $filtros['nombre'] . "%";
            }
        
            if (!empty($filtros['precio_min'])) {
                $sentencia .= " AND precio_producto >= ?";
                $tipos .= "d";
                $valores[] = $filtros['precio_min'];
            }
        
            if (!empty($filtros['precio_max'])) {
                $sentencia .= " AND precio_producto <= ?";
                $tipos .= "d";
                $valores[] = $filtros['precio_max'];
            }
        
            if (!empty($filtros['tipo'])) {
                $sentencia .= " AND tipo_producto = ?";
                $tipos .= "s";
                $valores[] = $filtros['tipo'];
            }
        
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            if (!empty($valores)) {
                $consulta->bind_param($tipos, ...$valores);
            }
        
            $consulta->bind_result($id, $nombre, $precio, $tipo, $puntos);
            $productos = [];
            $consulta->execute();
            while($consulta->fetch()) {
                array_push($productos, [$id, $nombre, $precio, $tipo, $puntos]);
            }
            $consulta->close();
            return $productos;
        }
        public function filtrarProductos($filtros) {
            $sentencia = "SELECT id_producto, nombre_producto, precio_producto, tipo_producto, puntos_compra, img FROM producto WHERE 1=1";
            $params = [];
            $tipos = "";
        
            // filtrar por nombre
            if (!empty($filtros['nombre'])) {
                $sentencia .= " AND nombre_producto LIKE ?";
                $params[] = "%" . $filtros['nombre'] . "%";
                $tipos .= "s";
            }
        
            // filtra por precio
            if (!empty($filtros['minPrecio'])) {
                $sentencia .= " AND precio_producto >= ?";
                $params[] = $filtros['minPrecio'];
                $tipos .= "d";
            }
            if (!empty($filtros['maxPrecio'])) {
                $sentencia .= " AND precio_producto <= ?";
                $params[] = $filtros['maxPrecio'];
                $tipos .= "d";
            }
        
            // filtra por puntos
            if (!empty($filtros['minPuntos'])) {
                $sentencia .= " AND puntos_compra >= ?";
                $params[] = $filtros['minPuntos'];
                $tipos .= "i";
            }
            if (!empty($filtros['maxPuntos'])) {
                $sentencia .= " AND puntos_compra <= ?";
                $params[] = $filtros['maxPuntos'];
                $tipos .= "i";
            }
        
            // filtra por tipo
            if (!empty($filtros['tipo'])) {
                $placeholders = implode(",", array_fill(0, count($filtros['tipo']), "?"));
                $sentencia .= " AND tipo_producto IN ($placeholders)";
                $params = array_merge($params, $filtros['tipo']);
                $tipos .= str_repeat("s", count($filtros['tipo']));
            }
        
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            if (!empty($params)) {
                $consulta->bind_param($tipos, ...$params);
            }
        
            $consulta->execute();
            $resultado = $consulta->get_result();
            $productos = [];
        
            while ($fila = $resultado->fetch_assoc()) {
                $productos[] = $fila;
            }
        
            $consulta->close();
            return $productos;
        }
    }
    
?>