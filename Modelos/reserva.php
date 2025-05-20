<?php
require_once("class.bd.php");

class Reserva {
    public $conn;

    public function __construct() {
        $this->conn = new bd();
    }

    public function obtenerPeriodosOcupados($fecha_reserva, $id_equipo) {
        $sentencia = "SELECT periodo FROM reserva WHERE fecha_reserva = ? AND id_equipo = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("si", $fecha_reserva, $id_equipo);
        $consulta->bind_result($periodo);
        $periodos_ocupados = array();
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($periodos_ocupados, $periodo);
        }
        $consulta->close();
        return $periodos_ocupados;
    }

    // Obtener todas las reservas
    public function obtenerReservas() {
        $sentencia = "SELECT id_usuario, id_equipo, fecha_reserva, periodo, snack FROM reserva";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_result($id_usuario, $id_equipo, $fecha_reserva, $periodo, $snack);
        $reservas = array();
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($reservas, [$id_usuario, $id_equipo, $fecha_reserva, $periodo, $snack]);
        }
        $consulta->close();
        return $reservas;
    }

    // Obtener una reserva por ID de usuario
    public function obtenerPorUsuario($id_usuario) {
        $sentencia = "SELECT id_equipo, fecha_reserva, periodo, snack FROM reserva WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("i", $id_usuario);
        $consulta->bind_result($id_equipo, $fecha_reserva, $periodo, $snack);
        $reservas = array();
        $consulta->execute();
        while($consulta->fetch()) {
            array_push($reservas, [$id_equipo, $fecha_reserva, $periodo, $snack]);
        }
        $consulta->close();
        return $reservas;
    }
    public function comprobarReserva($id_equipo,$fecha_reserva,$periodo) {
        $sentencia = "SELECT count(*) FROM reserva WHERE id_equipo = ? AND fecha_reserva = ? AND periodo = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("iss", $id_equipo,$fecha_reserva,$periodo);
        $consulta->bind_result($count);
        
        $consulta->execute();
        $consulta->fetch();

        $respuesta = false;

        if ($count > 0) {
            $respuesta = true;
        }
            
        $consulta->close();
        return $respuesta;
    }
    // Insertar una nueva reserva
    public function insertar($id_usuario, $id_equipo, $fecha_reserva, $periodo, $snack) {
        $sentencia = "INSERT INTO reserva (id_usuario, id_equipo, fecha_reserva, periodo, snack) VALUES (?, ?, ?, ?, ?)";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("iissi", $id_usuario, $id_equipo, $fecha_reserva, $periodo, $snack);
        $resultado = $consulta->execute();
        $consulta->close();
        return $resultado;
    }

    // Actualizar una reserva
    public function actualizar($id_usuario, $id_equipo, $fecha_reserva, $periodo, $snack) {
        $sentencia = "UPDATE reserva SET id_equipo = ?, fecha_reserva = ?, periodo = ?, snack = ? WHERE id_usuario = ?";
        $consulta = $this->conn->__get("conn")->prepare($sentencia);
        $consulta->bind_param("issii", $id_equipo, $fecha_reserva, $periodo, $snack, $id_usuario);
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