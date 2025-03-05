<?php

require_once("class.bd.php");

class Evento {
    public $conn;

    public function __construct() {
        $this->conn = new bd();
    }

    // Obtener todos los eventos
    public function obtenerEventos() {
        $sentencia = "SELECT id_evento, nombre_evento, tipo_evento, fecha_evento, premio, patrocinadores FROM eventos";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->execute();
        $resultado = $consulta->get_result();
        $eventos = [];
        while ($fila = $resultado->fetch_assoc()) {
            // Guardamos los eventos como un array asociativo
            $eventos[] = [
                'id_evento' => $fila['id_evento'],
                'nombre_evento' => $fila['nombre_evento'],
                'tipo_evento' => $fila['tipo_evento'],
                'fecha_evento' => $fila['fecha_evento'],
                'premio' => $fila['premio'],
                'patrocinadores' => $fila['patrocinadores']
            ];
        }
        $consulta->close();
        return $eventos;
    }

    // Guardar un evento
    public function guardarEvento($id_evento, $nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores) {
        $sentencia = "INSERT INTO eventos (id_evento, nombre_evento, tipo_evento, fecha_evento, premio, patrocinadores) 
                      VALUES (?, ?, ?, ?, ?, ?) 
                      ON DUPLICATE KEY UPDATE nombre_evento = ?, tipo_evento = ?, fecha_evento = ?, premio = ?, patrocinadores = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("issssssss", $id_evento, $nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores, $nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Eliminar un evento
    public function eliminarEvento($id_evento) {
        $sentencia = "DELETE FROM eventos WHERE id_evento = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_evento);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Modificar un evento (excepto id_evento)
    public function modificarEvento($id_evento, $nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores) {
        $sentencia = "UPDATE eventos SET 
                      nombre_evento = ?, 
                      tipo_evento = ?, 
                      fecha_evento = ?, 
                      premio = ?, 
                      patrocinadores = ? 
                      WHERE id_evento = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("sssssi", $nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores, $id_evento);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
}
?>
