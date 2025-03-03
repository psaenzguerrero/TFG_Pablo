<?php
require_once("../modelos/Producto.php");

function listarProductos() {
    $producto = new Producto();
    
    // Obtener valores de los filtros
    $nombre = isset($_GET['nombre']) ? trim($_GET['nombre']) : "";
    $precioMin = isset($_GET['precio_min']) ? floatval($_GET['precio_min']) : 0;
    $precioMax = isset($_GET['precio_max']) ? floatval($_GET['precio_max']) : 9999;
    $tipo = isset($_GET['tipo']) ? trim($_GET['tipo']) : "";

    // Obtener productos filtrados
    $productos = $producto->obtenerProductos($nombre, $precioMin, $precioMax, $tipo);

    // Cargar la vista
    require_once("../vistas/cabeza.php");
    require_once("../vistas/productos.php");
    require_once("../vistas/pie.html");
}

// **Sistema de rutas con "action"**
if (isset($_REQUEST["action"])) {
    $action = strtolower($_REQUEST["action"]);
    if (function_exists($action)) {
        $action(); // Llama a la función correspondiente
    } else {
        listarProductos(); // Acción por defecto
    }
} else {
    listarProductos(); // Muestra la lista de productos por defecto
}
?>
