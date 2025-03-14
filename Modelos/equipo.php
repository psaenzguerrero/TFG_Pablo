<?php
    require_once("class.bd.php");
    
    class Equipo {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }

        // Obtener todos los equipos
        public function obtenerEquipos() {
            $sentencia = "SELECT id_equipo, nombre_equipo, tipo_equipo, sala_equipo, precio, puntos_equipo FROM equipo";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $equipos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $equipos[] = $fila;
            }
            $consulta->close();
            return $equipos;
        }

        // Obtener todos los equipos no vip
        public function obtenerEquiposNoVip() {
            $sentencia = "SELECT id_equipo, nombre_equipo, tipo_equipo, sala_equipo, precio, puntos_equipo FROM equipo WHERE nombre_equipo NOT LIKE '_V_'";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $equipos = [];
            while ($fila = $resultado->fetch_assoc()) {
                $equipos[] = $fila;
            }
            $consulta->close();
            return $equipos;
        }


        // Obtener un equipo por ID
        public function obtenerPorId($id_equipo) {
            $sentencia = "SELECT id_equipo, nombre_equipo, tipo_equipo, sala_equipo, precio, puntos_equipo FROM equipo WHERE id_equipo = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_equipo);
            $consulta->execute();
            $resultado = $consulta->get_result();
            $equipo = $resultado->fetch_assoc();
            $consulta->close();
            return $equipo;
        }

        // Insertar un nuevo equipo
        public function insertar($nombre_equipo, $tipo_equipo, $sala_equipo, $precio, $puntos_equipo) {
            $sentencia = "INSERT INTO equipo (nombre_equipo, tipo_equipo, sala_equipo, precio, puntos_equipo) VALUES (?, ?, ?, ?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ssdi", $tipo_equipo, $sala_equipo, $precio, $puntos_equipo);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        // Actualizar un equipo existente
        public function actualizar($id_equipo,$nombre_equipo, $tipo_equipo, $sala_equipo, $precio, $puntos_equipo) {
            $sentencia = "UPDATE equipo SET nombre_equipo = ?, tipo_equipo = ?, sala_equipo = ?, precio = ?, puntos_equipo = ? WHERE id_equipo = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("sssdi",$nombre_equipo, $tipo_equipo, $sala_equipo, $precio, $puntos_equipo, $id_equipo);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }

        // Eliminar un equipo por ID
        public function eliminar($id_equipo) {
            $sentencia = "DELETE FROM equipo WHERE id_equipo = ?";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("i", $id_equipo);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }
    }
?>