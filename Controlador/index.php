<?php
    function cerrarSesion(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?action=inicio");
    }
    // Función para manejar el inicio de sesión
    function login() {
        require_once("../Modelos/usuario.php");
        if ($_SERVER["REQUEST_METHOD"] === "POST") {  
            $nombre_usuario = $_POST["nombre_usuario"];
            $pass_usuario = $_POST["pass_usuario"];
            $usuario = new Usuario();
            $recuerdame = isset($_POST["recuerdame"]);

            // Si el usuario marcó "Recuérdame", guardar en una cookie por 30 días
            if ($recuerdame) {
                setcookie("nombre_usuario", $nombre_usuario, time() + (30 * 24 * 60 * 60), "/"); // Expira en 30 días
            } else {
                setcookie("nombre_usuario", "", time() - 3600, "/"); 
            }
            if ($usuario->login($nombre_usuario, $pass_usuario)) {
                session_start();
                $_SESSION["id_usuario"] = $usuario->login($nombre_usuario, $pass_usuario);
                header("Location: index.php?action=dashboard");
            } else {
                $error = "Credenciales incorrectas.";
                require_once("../vistas/cabeza.php");
                require_once("../vistas/login.php");
                require_once("../vistas/pie.html");
            }
        } else {
            session_start();
            require_once("../vistas/cabeza.php");
            require_once("../vistas/login.php");
            require_once("../vistas/pie.html");
        }
    }
    function registro(){
        require_once("../Modelos/usuario.php");
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {  
            $nombre_usuario = trim($_POST["nombre_usuario"]);
            $pass_usuario = $_POST["pass_usuario"];
            $pass_usuario2 = $_POST["pass_usuario2"];
            $usuario = new Usuario();

            if ($usuario->obtenerId($nombre_usuario)) {
                $error = "Nombre de usuario ya en uso.";
                require_once("../vistas/cabeza.php");
                require_once("../vistas/registro.php");
                require_once("../vistas/pie.html");
            }else {
                if ($pass_usuario != $pass_usuario2) {
                    $error = "Las contraseñas no son iguales.";
                    require_once("../vistas/cabeza.php");
                    require_once("../vistas/registro.php");
                    require_once("../vistas/pie.html");
                }else {
                    $usuario->registrarUsuario($nombre_usuario, $pass_usuario);
                    require_once("../vistas/cabeza.php");
                    require_once("../vistas/login.php");
                    require_once("../vistas/pie.html");
                }
            }
    
            
        } else {
            session_start();
            require_once("../vistas/cabeza.php");
            require_once("../vistas/registro.php");
            require_once("../vistas/pie.html");
        }
    }
    

    function inicio(){
        session_start();
            require_once("../vistas/cabeza.php");
            require_once("../vistas/inicio.html");
            require_once("../vistas/pie.html");
    }

    function dashboard() {
        require_once("../Modelos/usuario.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        $tipo = new Usuario();
        $_SESSION["tipo_usuario"] = $tipo->obtenerTipoUsu($_SESSION["id_usuario"]);
        var_dump($_SESSION);
        require_once("../vistas/cabeza.php");
        require_once("../vistas/paginaInicio.php");
        require_once("../vistas/pie.html");   
    }





    //Esto es la piedra angular del controlador, con esto llamo y me muevo entre las funciones usando los action como variable.
    if (isset($_REQUEST["action"])) {
        $action = strtolower($_REQUEST["action"]);
        $action(); // Llama a la función correspondiente
    } else {
        inicio(); // Muestra la pantalla de inicio de sesión por defecto
    }
?>