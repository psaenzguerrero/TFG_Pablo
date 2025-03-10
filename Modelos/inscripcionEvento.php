<?php
    require_once("class.bd.php");
    
    class InscripcionEvento {
        public $conn;
    
        public function __construct() {
            $this->conn = new bd();
        }

        public function inscribirUsuario($id_usuario, $id_evento) {
            // Preparar la consulta SQL
            $sentencia = "INSERT INTO inscribe (id_usuario, id_evento) VALUES (?, ?)";
            $consulta = $this->conn->__get("conn")->prepare($sentencia);
            $consulta->bind_param("ii", $id_usuario, $id_evento);
            $resultado = $consulta->execute();
            $consulta->close();
            return $resultado;
        }
    }
    