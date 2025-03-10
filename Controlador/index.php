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
    function registroAdmin(){
        require_once("../Modelos/usuario.php");
        
        if ($_SERVER["REQUEST_METHOD"] === "POST") {  
            $nombre_usuario = trim($_POST["nombre_usuario"]);
            $pass_usuario = $_POST["pass_usuario"];
            $pass_usuario2 = $_POST["pass_usuario2"];
            $DNI = $_POST["DNI"];
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
                    // $usuario->registrarUsuario($nombre_usuario, $pass_usuario);

                    if (preg_match('/^\d{8}[A-Z]$/', $DNI)) {
                        $usuario->insertarAdmin($nombre_usuario, $DNI, $pass_usuario);
                        header("Location: index.php?action=dashboard");
                        
                    }else{
                        $error = "El DNI no es valido.";
                        require_once("../vistas/cabeza.php");
                        require_once("../vistas/registro.php");
                        require_once("../vistas/pie.html");
                    }

                }
            }
    
            
        } else {
            session_start();
            require_once("../vistas/cabeza.php");
            require_once("../vistas/registro.php");
            require_once("../vistas/pie.html");
        }
    }

    function activarUsuario(){
        require_once("../Modelos/usuario.php");
        session_start();
        $usuario = new Usuario();
        $usuarios = $usuario->obtenerUsuariosNull();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {  
            $id_usuario = $_POST["id_usuario"];
            $DNI = $_POST["DNI"];
            
            if (preg_match('/^\d{8}[A-Z]$/', $DNI)) {
                $usuario->actualizar( $DNI, $id_usuario);
                header("Location: index.php?action=dashboard");
                        
            }else{
                $error = "El DNI no es valido.";
                require_once("../vistas/cabeza.php");
                require_once("../vistas/registro.php");
                require_once("../vistas/pie.html");
            }

        }else {
            require_once("../vistas/cabeza.php");
            require_once("../vistas/activarUsuario.php");
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
        // var_dump($_SESSION);
        require_once("../vistas/cabeza.php");
        require_once("../vistas/paginaInicio.php");
        require_once("../vistas/pie.html");   
    }

    //FUNCIONES DE BUSQUEDA EN TIENDA ¡¡¡¡NO HACE FALTA REGISTRO!!!!
    
    function tienda() {
        require_once("../Modelos/producto.php");
        session_start();
    
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

    ////FUNCIONES TIENDA ADMIN////

    function agregarProducto() {
        require_once("../Modelos/producto.php");
        session_start();
        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre_producto = trim($_POST["nombre_producto"]);
            $precio_producto = floatval($_POST["precio_producto"]);
            $tipo_producto = trim($_POST["tipo_producto"]);
            $puntos_compra = intval($_POST["puntos_compra"]);
            // Validar los datos
            if (empty($nombre_producto) || $precio_producto <= 0 || empty($tipo_producto) || $puntos_compra < 0) {
                $error = "Por favor, complete todos los campos correctamente.";
                require_once("../vistas/cabeza.php");
                require_once("../vistas/agregarProducto.php");
                require_once("../vistas/pie.html");
                return;
            }
            $producto = new Producto();
            $resultado = $producto->insertar($nombre_producto, $precio_producto, $tipo_producto, $puntos_compra);
            if ($resultado) {
                header("Location: index.php?action=tienda");
            } else {
                $error = "Hubo un error al agregar el producto.";
                require_once("../vistas/cabeza.php");
                require_once("../vistas/agregarProducto.php");
                require_once("../vistas/pie.html");
            }
        } else {
            require_once("../vistas/cabeza.php");
            require_once("../vistas/agregarProducto.php");
            require_once("../vistas/pie.html");
        }
    }

    function editarProducto() {
        require_once("../Modelos/producto.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_SESSION["tipo_usuario"] == 'Admin') {
            if (isset($_GET["id_producto"])) {
                $id_producto = intval($_GET["id_producto"]);
                $producto = new Producto();
                $productoData = $producto->obtenerPorId($id_producto);
                if ($productoData) {                
                    require_once("../vistas/cabeza.php");
                    require_once("../vistas/editarProducto.php");
                    require_once("../vistas/pie.html");
                } else {
                    header("Location: index.php?action=tienda");
                }
            } else {
                header("Location: index.php?action=tienda");
            }
        }else{
            if (isset($_GET["id_producto"])) {
                $id_producto = intval($_GET["id_producto"]);
                $producto = new Producto();
                $productoData = $producto->obtenerPorId($id_producto);
                if ($productoData) {                
                    require_once("../vistas/cabeza.php");
                    require_once("../vistas/detallesProducto.php");
                    require_once("../vistas/pie.html");
                } else {
                    header("Location: index.php?action=tienda");
                }
            }else {
                header("Location: index.php?action=tienda");
            }
        }
    }

    function eliminarProducto() {
        require_once("../Modelos/producto.php");
        session_start();

        // Verificar si el usuario es administrador
        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }

        // Si se envió el ID del producto
        if (isset($_GET["id_producto"])) {
            $id_producto = intval($_GET["id_producto"]);
            $producto = new Producto();
            $resultado = $producto->eliminar($id_producto);

            if ($resultado) {
                header("Location: index.php?action=tienda");
            } else {
                echo "Hubo un error al eliminar el producto.";
            }
        } else {
            header("Location: index.php?action=tienda");
        }
    }

    function modificarProducto(){
        require_once("../Modelos/producto.php");
        session_start();

        if (!isset($_SESSION["id_usuario"]) || $_SESSION["tipo_usuario"] != 'Admin') {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Obtener los valores del formulario
            $id_producto = $_POST["id_producto"];
            $nombre_producto = $_POST["nombre_producto"];
            $precio_producto = $_POST["precio_producto"];
            $tipo_producto = $_POST["tipo_producto"];
            $puntos_compra = $_POST["puntos_compra"];
    
            // Crear una instancia del modelo Evento
            $producto = new Producto();
    
            // Llamar al método guardarEvento para insertar los datos en la base de datos
            $resultado = $producto->actualizar($id_producto,$nombre_producto,$precio_producto,$tipo_producto,$puntos_compra);
            // Comprobar si la inserción fue exitosa
            if ($resultado) {
                header("Location: index.php?action=tienda");
            } else {
                echo "<p>Hubo un error al modificar el producto.</p>";
            }
        }else {
            header("Location: index.php?action=tienda");
        }
    }
   
    //////EVENTOS VERSION ADMIN//////

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
    
        if (isset($_POST["id_evento"])) {
            $id_evento = $_POST["id_evento"];
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
            $premio = $_POST["premio"];
            $patrocinadores = $_POST["patrocinadores"];
    
            $evento = new Evento();
            $resultado = $evento->modificarEvento($id_evento, $nombre_evento, $tipo_evento, $premio, $patrocinadores);
    
            if ($resultado) {
                header("Location: index.php?action=eventos");
            } else {
                echo "Hubo un error al modificar el evento.";
            }
        }
    }
    
    //EVEBTOS USUARIOS NORMALES Y VIP

    function eventosUsuario() {
        require_once("../Modelos/evento.php");
        session_start();

        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        $tipoUsuario = $_SESSION["tipo_usuario"];
        $mesActual = isset($_POST['mes']) ? $_POST['mes'] : date("m");
        $anioActual = isset($_POST['anio']) ? $_POST['anio'] : date("Y");

        if ($mesActual < 1 || $mesActual > 12) {
            $mesActual = date("m");
        }
        $evento = new Evento();
        $eventos = $evento->obtenerEventosPorMes($anioActual, $mesActual);

        require_once("../vistas/cabeza.php");
        require_once("../vistas/eventosUsuarios.php");
        require_once("../vistas/pie.html");
    }

    function inscribir() {
        require_once("../Modelos/inscripcionEvento.php");
        require_once("../Modelos/evento.php");
        session_start();
    
        // Verificar si el usuario está logueado
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
    
        // Obtener el ID del usuario y el ID del evento
        $id_usuario = $_SESSION["id_usuario"];
        $id_evento = $_GET["id_evento"];
    
        // Crear una instancia del modelo Inscripcion
        global $conn; // Asegúrate de que $conn es tu conexión a la base de datos
        $inscripcionModel = new InscripcionEvento();
    
        // Intentar inscribir al usuario
        if ($inscripcionModel->inscribirUsuario($id_usuario, $id_evento)) {
            echo "Inscripción realizada con éxito.";
        } else {
            echo "Error al realizar la inscripción.";
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