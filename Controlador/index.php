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
                require_once("../vistas/header.php");
                require_once("../vistas/login.php");
                require_once("../vistas/footer.php");
            }
        } else {
            session_start();
            require_once("../vistas/header.php");
            require_once("../vistas/login.php");
            require_once("../vistas/footer.php");
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
                require_once("../vistas/header.php");
                require_once("../vistas/registro.php");
                require_once("../vistas/footer.php");
            }else {
                if ($pass_usuario != $pass_usuario2) {
                    $error = "Las contraseñas no son iguales.";
                    require_once("../vistas/header.php");
                    require_once("../vistas/registro.php");
                    require_once("../vistas/footer.php");
                }else {
                    $usuario->registrarUsuario($nombre_usuario, $pass_usuario);
                    require_once("../vistas/header.php");
                    require_once("../vistas/login.php");
                    require_once("../vistas/footer.php");
                }
            } 
        } else {
            session_start();
            require_once("../vistas/header.php");
            require_once("../vistas/registro.php");
            require_once("../vistas/footer.php");
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
                require_once("../vistas/header.php");
                require_once("../vistas/registro.php");
                require_once("../vistas/footer.php");
            }else {
                if ($pass_usuario != $pass_usuario2) {
                    $error = "Las contraseñas no son iguales.";
                    require_once("../vistas/header.php");
                    require_once("../vistas/registro.php");
                    require_once("../vistas/footer.php");
                }else {
                    if (preg_match('/^\d{8}[A-Z]$/', $DNI)) {
                        $usuario->insertarAdmin($nombre_usuario, $DNI, $pass_usuario);
                        header("Location: index.php?action=dashboard");
                        
                    }else{
                        $error = "El DNI no es valido.";
                        require_once("../vistas/header.php");
                        require_once("../vistas/registro.php");
                        require_once("../vistas/footer.php");
                    }
                }
            }   
        } else {
            session_start();
            require_once("../vistas/header.php");
            require_once("../vistas/registro.php");
            require_once("../vistas/footer.php");
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
            
            //Pregmatch de dni sacado de una practica y actualizado con letras y todo
            if (preg_match('/^\d{8}[A-Z]$/', $DNI)) {
                $usuario->actualizar( $DNI, $id_usuario);
                header("Location: index.php?action=dashboard");
                        
            }else{
                $error = "El DNI no es valido.";
                require_once("../vistas/header.php");
                require_once("../vistas/registro.php");
                require_once("../vistas/footer.php");
            }

        }else {
            require_once("../vistas/header.php");
            require_once("../vistas/activarUsuario.php");
            require_once("../vistas/footer.php");
        }        
    }

    function inicio(){
        session_start();
            require_once("../vistas/header.php");
            require_once("../vistas/inicio.php");
            require_once("../vistas/footer.php");
    }
    function dashboard() {
        session_start();
        require_once("../Modelos/usuario.php");
        //Comprobacion extra de seguridad para que ningun usuario no registrado se meta en sitio que no debe abuso de esto en muchas funciones
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        $tipo = new Usuario();
        $_SESSION["tipo_usuario"] = $tipo->obtenerTipoUsu($_SESSION["id_usuario"]);
        require_once("../vistas/header.php");
        require_once("../vistas/paginaInicio.php");
        require_once("../vistas/footer.php");   
    }

    function mejoraUsu(){
        require_once("../Modelos/usuario.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        $tipo = new Usuario();
        $id_usuario = $_SESSION["id_usuario"];
        $puntos = $tipo->obtenerPuntos($id_usuario);
        if ($puntos >= 100) {
            $puntos-=100;  
            $puntosFinal = $tipo->actualizarPuntos($puntos, $id_usuario);
            $tipo_usu = $tipo->actualizarTipo($id_usuario);
            require_once("../vistas/header.php");
            require_once("../vistas/paginaInicio.php");
            require_once("../vistas/footer.php");    
        }else{
            echo "<p>$puntos</p><p>2</p>";
        }
    }

    //FUNCIONES DE BUSQUEDA EN TIENDA LO QUE COSTO
    
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
        require_once("../vistas/header.php");
        require_once("../vistas/tienda.php");
        require_once("../vistas/footer.php");
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
    
        require_once("../vistas/header.php");
        require_once("../vistas/tienda.php");
        require_once("../vistas/footer.php");
    }

    ///////////////////////////FUNCIONES TIENDA ADMIN/////////////////

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
                require_once("../vistas/header.php");
                require_once("../vistas/agregarProducto.php");
                require_once("../vistas/footer.php");
                return;
            }
            $producto = new Producto();
            $resultado = $producto->insertar($nombre_producto, $precio_producto, $tipo_producto, $puntos_compra);
            if ($resultado) {
                header("Location: index.php?action=tienda");
            } else {
                $error = "Hubo un error al agregar el producto.";
                require_once("../vistas/header.php");
                require_once("../vistas/agregarProducto.php");
                require_once("../vistas/footer.php");
            }
        } else {
            require_once("../vistas/header.php");
            require_once("../vistas/agregarProducto.php");
            require_once("../vistas/footer.php");
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
                    require_once("../vistas/header.php");
                    require_once("../vistas/editarProducto.php");
                    require_once("../vistas/footer.php");
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
                    require_once("../vistas/header.php");
                    require_once("../vistas/detallesProducto.php");
                    require_once("../vistas/footer.php");
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

        // Si se envio el ID del producto
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
    
            // Llamar al metodo guardarEvento para insertar los datos en la base de datos
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
   
    /////////////////////////////////EVENTOS VERSION ADMIN///////////////

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

        // Obtener el primer dia del mes y la cantidad de dias del mes
        $primerDiaDelMes = date("N", strtotime("$anioActual-$mesActual-01"));
        $diasDelMes = cal_days_in_month(CAL_GREGORIAN, $mesActual, $anioActual);

        // Crear un array para almacenar los eventos por dia
        $eventosPorDia = [];
        foreach ($eventos as $evento) {
            $fechaEvento = new DateTime($evento['fecha_evento']);
            $diaDelEvento = $fechaEvento->format('d');
            $eventosPorDia[$diaDelEvento][] = $evento;
        }

        // Pasar las variables a la vista
        require_once("../vistas/header.php");
        require_once("../vistas/calendario.php");
        require_once("../vistas/footer.php");
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
    
        // Comprobar si el formulario se ha enviado 
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Obtener los valores del formulario
            $nombre_evento = $_POST["nombre_evento"];
            $tipo_evento = $_POST["tipo_evento"];
            $fecha_evento = $_POST["fecha_evento"];
            $fechaActual = new DateTime();
            $fechaEvento = new DateTime($fecha_evento); // Convertir la fecha a objeto DateTime
        
            if ($fechaEvento < $fechaActual) {
                // Redirigir con un mensaje de error
                header("Location: index.php?action=eventos");
                exit; 
            }
    
            // Crear una instancia del modelo Evento
            $evento = new Evento();
    
            // Llamar al metodo guardarEvento para insertar los datos en la base de datos
            $resultado = $evento->guardarEvento($nombre_evento, $tipo_evento, $fecha_evento, $premio, $patrocinadores);
            // Comprobar si la inserción fue ok
            if ($resultado) {
                header("Location: index.php?action=eventos"); // Redirigir si todo ok
            } else {
                echo "Hubo un error al guardar el evento."; // Mostrar error si todo no ok
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

        require_once("../vistas/header.php");
        require_once("../vistas/eventosUsuarios.php");
        require_once("../vistas/footer.php");
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
        $inscripcion = new InscripcionEvento();
        $inscripciones = $inscripcion->listaInscrito($id_usuario, $id_evento);
        if ($inscripciones) {
            header("Location: index.php?action=eventosUsuario");
            exit;
        }else{
            // Intentar inscribir al usuario
            if ($inscripcion->inscribirUsuario($id_usuario, $id_evento)) {
                echo "Inscripción realizada con éxito.";
                header("Location: index.php?action=eventosUsuario");
            } else {
                echo "Error al realizar la inscripción.";
                header("Location: index.php?action=eventosUsuario");
            }
        }
        
    }
    function agregarAlCarrito() {
        require_once("../Modelos/carrito.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_usuario = $_SESSION["id_usuario"];
            $id_producto = $_POST["id_producto"];
            $fecha_compra = date("Y-m-d H:i:s");
            $cantidad=$_POST["cantidad"];
            $carrito = new Carrito();
            $contador = $carrito->obtenerProductoCantidad($id_producto, $id_usuario);
            
            if ($contador != null) {
                $resultado = $carrito->aumentarCantidad($id_producto, $id_usuario, $cantidad);
                header("Location: index.php?action=tienda");
            }else{ 
                $resultado = $carrito->insertar($id_usuario, $id_producto, $cantidad, $fecha_compra);
                if ($resultado) {
                    header("Location: index.php?action=editarProducto");
                } else {
                    echo "Error al agregar el producto al carrito.";
                }
            }
        }
    }
    function eliminarDelCarrito() {
        require_once("../Modelos/carrito.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id_usuario = $_SESSION["id_usuario"];
            $id_producto = $_POST["id_producto"];
            $cantidad = $_POST["cantidad"];

            $carrito = new Carrito();

            if ($cantidad > 1) {
                $resultado = $carrito->deducirCantidad($id_producto, $id_usuario);
            }else{
                $resultado = $carrito->eliminar($id_usuario, $id_producto);  
            }
            if ($resultado) {
                header("Location: index.php?action=verCarrito");
            } else {
                echo "Error al eliminar el producto del carrito.";
            }
        }
    }

    function verCarrito() {
        require_once("../Modelos/carrito.php");
        session_start();
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        $id_usuario = $_SESSION["id_usuario"];
        $carrito = new Carrito();
        $carritos = $carrito->obtenerPorUsuario($id_usuario);

        require_once("../vistas/header.php");
        require_once("../vistas/carritoUsu.php");
        require_once("../vistas/footer.php");
    }

    function compraDelCarrito(){
        require_once("../Modelos/carrito.php");
        require_once("../Modelos/pedido.php");
        require_once("../Modelos/usuario.php");
        session_start();

        $id_usuario = $_SESSION["id_usuario"];
        $carrito = new Carrito();
        $pedido = new Pedido();
        $usuario = new Usuario();

        //Primer paso creamos el pedido

        $fecha = date("Y/m/d");
        $precio_d = 0;
        $metodo_v="vacio";
        $pedidos = $pedido->crearPedido($id_usuario,$precio_d,$fecha, $metodo_v);
        
        //Segundo paso comprobamos los productos del carrito del usuario, los contamos y los almacenamos en la tabla de contenido

        $producto = $carrito->obtenerContenido($id_usuario);
        $id_pedido = $pedido->obtenerId($id_usuario);

        foreach($producto as $p){
            $contenido = $pedido->crearContenido($id_pedido, $p["id_producto"], $p["cantidad"]);
        }
        //Tercer paso combinamos los precios totales de cada producto, los sumamos y con eso ya tenemos $precio

        $precio = $carrito->sumarPrecioTotal($id_usuario);

        //Cuarto paso aparece un modal al usuario para que seleccione el metodo de pago

        $metodo = $_POST["payment"];

        //Quinto paso creamos el insert en la tabla compra con el metodo de pago
        
        $comprado = $pedido->actualizarMetodo($id_usuario,$metodo);
        
        //Sexto paso actualizamos el pedido

        $actualizar = $pedido->actualizarPrecio($id_usuario, $precio);

        //Septimo paso borramos el carrito del usuario una vez se haya comprobado la compra

        $carrito = new Carrito();
        $precio = $carrito->eliminarTodo($id_usuario);

        //Octavo paso sumamos los puntos de la compra

        $puntos = $usuario->actualizarPuntos($id_usuario);

        //Noveno paso volvemos a la tienda con un alert o algo sasi diciendo gracias por tu compra

        header("Location: index.php?action=tienda");

    }
    function reservarEquipoAdmin() {
        require_once("../Modelos/reserva.php");
        require_once("../Modelos/equipo.php"); 
        session_start();
    
        if (!isset($_SESSION["id_usuario"]) ) {
            header("Location: index.php?action=login");
            exit;
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            //Llamamos a todos los post de la vist
            $id_usuario = isset($_POST["id_usuario"]) ? $_POST["id_usuario"] : $_SESSION["id_usuario"];
            $id_equipo = $_POST["id_equipo"];
            $fecha_reserva = $_POST["fecha_reserva"];
            $fechaActual = new DateTime();
            $fechaReserva = new DateTime($fecha_reserva);
            if ($fechaReserva < $fechaActual) {
                header("Location: index.php?action=reservarEquipoAdmin");
                exit;
            }
            $periodo = $_POST["periodo"];
            $snack = isset($_POST["snack"]) ? 1 : 0;
        
            $reserva = new Reserva();
            $reservaExistente = $reserva->comprobarReserva($id_equipo, $fecha_reserva, $periodo);
        
            if ($reservaExistente) {
                $error = "Este equipo en este periodo está ocupado.";
            } else {
                if ($reserva->insertar($id_usuario, $id_equipo, $fecha_reserva, $periodo, $snack)) {
                    header("Location: index.php?action=dashboard");
                } else {
                    $error = "Hubo un error al realizar la reserva.";
                }
            }
        }
        verReservas();
        require_once("../vistas/header.php");
        require_once("../vistas/reservasEquipo.php");
        require_once("../vistas/footer.php");
    }
    
    function verReservas() {
        require_once("../Modelos/reserva.php");
        require_once("../Modelos/usuario.php");
        require_once("../Modelos/equipo.php");
        if(session_status() === PHP_SESSION_NONE) session_start();
    
        if (!isset($_SESSION["id_usuario"])) {
            header("Location: index.php?action=login");
            exit;
        }
        if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
            $usuario = new Usuario();
            $usuarios = $usuario->obtenerUsuariosNoAdmin();
        
            // Obtener la lista de equipos disponibles
            $equipo = new Equipo();
            $equipos = $equipo->obtenerEquipos(); 

        }elseif (strcmp($_SESSION["tipo_usuario"], "Vip") == 0) {

            // Obtener la lista de equipos disponibles
            $equipo = new Equipo();
            $equipos = $equipo->obtenerEquipos(); 
        }elseif (strcmp($_SESSION["tipo_usuario"], "Normal") == 0){
            $equipo = new Equipo();
            $equipos = $equipo->obtenerEquiposNoVip();
        }

        // Obtener los periodos ocupados para la fecha seleccionada
        $usuario_seleccionado = isset($_GET["id_usuario"]) ? $_GET["id_usuario"] : $_SESSION["id_usuario"];
        $equipo_seleccionado = isset($_GET["equipo"]) ? $_GET["equipo"] : 1;
        $fecha_seleccionada = isset($_GET["fecha"]) ? $_GET["fecha"] : date("Y-m-d");
        $reserva = new Reserva();
        $periodos_ocupados = $reserva->obtenerPeriodosOcupados($fecha_seleccionada, $equipo_seleccionado);

        // Si no hay periodos ocupados, inicializar como array vacío
        if (!$periodos_ocupados) {
            $periodos_ocupados = [];
        }
        $reserva = new Reserva();
        $reservas = $reserva->obtenerReservas();
        require_once("../vistas/header.php");
        require_once("../vistas/reservasEquipo.php");
        require_once("../vistas/footer.php");
    }
    function usuarios() {
        require_once("../Modelos/usuario.php");
        session_start();
        
        // Verificar sesión y permisos
        if (!isset($_SESSION['id_usuario'])) {
            header("Location: index.php?action=login");
            exit();
        }
        $id_usuario = $_SESSION['id_usuario'];
        
        if (strcmp($_SESSION["tipo_usuario"], "Normal") == 0) {
            $usuario = new Usuario();
            $perfiles = $usuario->obtenerPerfil($id_usuario);

        }elseif (strcmp($_SESSION["tipo_usuario"], "Vip") == 0) {
            $usuario = new Usuario();
            $perfiles = $usuario->obtenerPerfil($id_usuario);

        }elseif (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
            $usuario = new Usuario();
            $usuarios = $usuario->obtenerPerfiles();
        }

        // Cargar vistas
        require_once("../vistas/header.php");
        require_once("../vistas/perfiles.php");
        require_once("../vistas/footer.php");
    }
    

    //Esto es la piedra angular del controlador, con esto llamo y me muevo entre las funciones usando el action como variable.
    if (isset($_REQUEST["action"])) {
        $action = strtolower($_REQUEST["action"]);
            $action(); // Llama a la función correspondiente
    } else {
        inicio(); // Muestra la pantalla de inicio de sesión por defecto
    }
?>

<!-- CREATE EVENT borrar_tipos ON SCHEDULE EVERY 1 MONTH STARTS '2025-03-12 10:21:00' DO UPDATE usuario SET tipo_usuario = 'normal'; -->
<!-- evento de tiempo para cambio de tipo usuario -->
