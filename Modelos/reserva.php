<?php
require_once("class.bd.php");

class Reserva {
    public $conn;

    public function __construct() {
        $this->conn = new bd();
    }

    // Obtener todas las reservas
    public function obtenerReservas() {
        $sentencia = "SELECT id_usuario, id_equipo, fecha_reserva, horaIni, horaFin, snack FROM reserva";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_result($id_usuario, $id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack);
        $reservas = array();
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($reservas, [$id_usuario, $id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack]);
        }
        $consulta->close();
        return $reservas;
    }

    // Obtener una reserva por ID de usuario
    public function obtenerPorUsuario($id_usuario) {
        $sentencia = "SELECT id_equipo, fecha_reserva, horaIni, horaFin, snack FROM reserva WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $consulta->bind_result($id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack);
        $reservas = array();
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($reservas, [$id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack]);
        }
        $consulta->close();
        return $reservas;
    }

    // Insertar una nueva reserva
    public function insertar($id_usuario, $id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack) {
        $sentencia = "INSERT INTO reserva (id_usuario, id_equipo, fecha_reserva, horaIni, horaFin, snack) VALUES (?, ?, ?, ?, ?, ?)";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("iisssi", $id_usuario, $id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Actualizar una reserva
    public function actualizar($id_usuario, $id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack) {
        $sentencia = "UPDATE reserva SET id_equipo = ?, fecha_reserva = ?, horaIni = ?, horaFin = ?, snack = ? WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("isssii", $id_equipo, $fecha_reserva, $horaIni, $horaFin, $snack, $id_usuario);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Eliminar una reserva
    public function eliminar($id_usuario) {
        $sentencia = "DELETE FROM reserva WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }
}
?>