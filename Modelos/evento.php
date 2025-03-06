<?php

require_once("class.bd.php");

class Evento {
    public $conn;

    public function __construct() {
        $this->conn = new bd();
    }

    // Obtener todos los eventos de un año
    public function obtenerEventosPorMes($anio, $mes) {
        // Definir el primer y último día del mes
        $fechaInicio = "$anio-$mes-01";                         // Primer día del mes
        $fechaFin = date("Y-m-t", strtotime($fechaInicio));     // Último día del mes

        // Consultar eventos en la base de datos dentro del rango de fechas
        $sentencia = "SELECT * FROM evento WHERE fecha_evento BETWEEN '$fechaInicio' AND '$fechaFin' ORDER BY fecha_evento";

        // Ejecutar la consulta y obtener los resultados
        $consulta = $this->conn->__get("conn")->query($sentencia);

        $eventos = [];

        // Recuperar todos los eventos y almacenarlos en un arreglo
        while ($fila = $consulta->fetch_assoc()) {
            $eventos[] = $fila;
        }

        return $eventos;
    }

    // Guardar un nuevo evento
    public function guardarEvento($nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores) {
        
        $sentencia = "INSERT INTO evento (nombre_evento, tipo_evento, fecha_evento, premio, patrocinadores) 
                      VALUES (?, ?, ?, ?, ?)";
        
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("sssss", $nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores);
        $resultado = $consulta->execute();
        $consulta->close();
        
        return $resultado;
    }
    

    // Eliminar un evento
    public function eliminarEvento($id_evento) {
        $sentencia = "DELETE FROM evento WHERE id_evento = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_evento);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Modificar un evento
    public function modificarEvento($id_evento, $nombre_evento, $tipo_evento, $premio,$patrocinadores) {
        $sentencia = "UPDATE evento SET nombre_evento = ?, tipo_evento = ?, premio = ?, patrocinadores = ? WHERE id_evento = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("ssssi", $nombre_evento, $tipo_evento, $premio,$patrocinadores, $id_evento);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
}

?>
