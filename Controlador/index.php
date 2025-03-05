<?php
    function cerrarSesion(){
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php?action=inicio");
    }
    // FUNCIONES DE INICIO Y REGISTRO
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

    //FUNCIONES DE TIENDA VERSION USUARIO
    
    function tienda() {
        require_once("../Modelos/producto.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
    
        // Obtener los filtros del formulario
        $filtros = [
            'nombre' => isset($_POST['nombre']) ? trim($_POST['nombre']) : null,
            'minPrecio' => isset($_POST['minPrecio']) ? floatval($_POST['minPrecio']) : null,
            'maxPrecio' => isset($_POST['maxPrecio']) ? floatval($_POST['maxPrecio']) : null,
            'minPuntos' => isset($_POST['minPuntos']) ? intval($_POST['minPuntos']) : null,
            'maxPuntos' => isset($_POST['maxPuntos']) ? intval($_POST['maxPuntos']) : null,
            'tipo' => isset($_POST['tipo']) ? $_POST['tipo'] : [],
        ];
    
        // Obtener los productos filtrados
        $producto = new Producto();
        $productos = $producto->filtrarProductos($filtros);
    
        // Pasar los productos a la vista
        require_once("../vistas/cabeza.php");
        require_once("../vistas/tienda.php");
        require_once("../vistas/pie.html");
    }
    
    function buscarProductos() {
        require_once("../Modelos/producto.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
    
        $producto = new Producto();
        $filtros = [];
    
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
            $precio_min = isset($_POST["precio_min"]) ? floatval($_POST["precio_min"]) : null;
            $precio_max = isset($_POST["precio_max"]) ? floatval($_POST["precio_max"]) : null;
            $tipo = isset($_POST["tipo"]) ? trim($_POST["tipo"]) : null;
    
            $filtros = [
                'nombre' => $nombre,
                'precio_min' => $precio_min,
                'precio_max' => $precio_max,
                'tipo' => $tipo
            ];
    
            $productos = $producto->buscarProductos($filtros);
        } else {
            $productos = $producto->obtenerProductos();
        }
    
        require_once("../vistas/cabeza.php");
        require_once("../vistas/tienda.php");
        require_once("../vistas/pie.html");
    }
    
    
    //EVENTOS VERSION ADMIN//


    function eventos() {
        require_once("../Modelos/evento.php");
        // Verifica si el usuario tiene permisos de administrador
        session_start();
        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }

        // Obtener el mes y año actuales o los proporcionados por la URL
        $mesActual = isset($_GET['mes']) ? $_GET['mes'] : date("m");
        $anioActual = isset($_GET['anio']) ? $_GET['anio'] : date("Y");

        // Asegurarse de que el mes esté dentro del rango de 1 a 12
        if ($mesActual < 1 || $mesActual > 12) {
            $mesActual = date("m");
        }

        // Obtener todos los eventos para el año y mes solicitados
        $evento = new Evento();
        $eventos = $evento->obtenerEventosPorMes($anioActual, $mesActual);

        // Obtener el primer día del mes y la cantidad de días del mes
        $primerDiaDelMes = date("N", strtotime("$anioActual-$mesActual-01"));
        $diasDelMes = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);

        // Crear un array para almacenar los eventos por día
        $eventosPorDia = [];
        foreach ($eventos as $evento) {
            $fechaEvento = new DateTime($evento['fecha_evento']);
            $diaDelEvento = $fechaEvento->format('d');
            $eventosPorDia[$diaDelEvento][] = $evento;
        }

        // Pasar las variables a la vista
        require_once("../vistas/cabeza.php");
        require_once("../vistas/calendario.php");
        require_once("../vistas/pie.html");
    }

    
    // Guardar un nuevo evento
    function guardarEvento() {
        require_once("../Modelos/evento.php");
        session_start();
        
        // Verificar si el usuario es admin
        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }
    
        // Comprobar si el formulario se ha enviado por POST
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Obtener los valores del formulario
            $nombre_evento = $_POST["nombre_evento"];
            $tipo_evento = $_POST["tipo_evento"];
            $fecha_evento = $_POST["fecha_evento"];
            $premio = $_POST["premio"];
            $patrocinadores = $_POST["patrocinadores"];
    
            // Crear una instancia del modelo Evento
            $evento = new Evento();
    
            // Llamar al método guardarEvento para insertar los datos en la base de datos
            $resultado = $evento->guardarEvento($nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores);
    
            // Comprobar si la inserción fue exitosa
            if ($resultado) {
                header("Location: index.php?action=eventos"); // Redirigir si todo salió bien
            } else {
                echo "Hubo un error al guardar el evento."; // Mostrar error si algo salió mal
            }
        }
    }
    
    // Eliminar un evento
    function eliminarEvento() {
        require_once("../Modelos/evento.php");
        session_start();
        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }
    
        if (isset($_GET["id_evento"])) {
            $id_evento = $_GET["id_evento"];
            $evento = new Evento();
            $resultado = $evento->eliminarEvento($id_evento);
    
            if ($resultado) {
                header("Location: index.php?action=eventos");
            } else {
                echo "Hubo un error al eliminar el evento.";
            }
        }
    }
    
    // Modificar un evento
    function modificarEvento() {
        require_once("../Modelos/evento.php");
        session_start();
        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }
    
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["id_evento"])) {
            $id_evento = $_POST["id_evento"];
            $nombre_evento = $_POST["nombre_evento"];
            $tipo_evento = $_POST["tipo_evento"];
            $fecha_evento = $_POST["fecha_evento"];
    
            $evento = new Evento();
            $resultado = $evento->modificarEvento($id_evento, $nombre_evento, $tipo_evento, $fecha_evento);
    
            if ($resultado) {
                header("Location: index.php?action=eventos");
            } else {
                echo "Hubo un error al modificar el evento.";
            }
        }
    }
    
    

    //Esto es la piedra angular del controlador, con esto llamo y me muevo entre las funciones usando los action como variable.
    if (isset($_REQUEST["action"])) {
        $action = strtolower($_REQUEST["action"]);
        if ($action === "tienda") {
            tienda();
        } elseif ($action === "buscarproductos") {
            buscarProductos();
        } else {
            $action(); // Llama a la función correspondiente
        }
    } else {
        inicio(); // Muestra la pantalla de inicio de sesión por defecto
    }
?>