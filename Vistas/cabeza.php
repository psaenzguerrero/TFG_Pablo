<?php
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <!-- Scripts Externos -->
    <script defer src="../index.js"></script>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    
    
    <!-- Fuentes Externas -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    
    <!-- Hojas de Estilo Externas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../estilos.css">
</head>
<body>
<header class="bg-gray-900 text-white fixed z-50 w-full border-b-2 border-purple-600 shadow-lg">
    <nav class="container mx-auto flex justify-between items-center p-4">
        <!-- Redes sociales -->
        <div class="hidden lg:flex items-center space-x-4">
            <a href="#" class="text-purple-400 hover:text-purple-300 transition text-2xl">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-purple-400 hover:text-purple-300 transition text-2xl">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-purple-400 hover:text-purple-300 transition text-2xl">
                <i class="fab fa-instagram"></i>
            </a>
        </div>

        <!-- Menú principal -->
        <div class="hidden lg:flex lg:items-center space-x-6" id="nav-menu">
            <?php
                if (isset($_SESSION["id_usuario"])) {
            ?>
                <?php
                    if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
                ?>
                        <a href="./index.php?action=cerrarSesion" class="text-gray-300 hover:text-purple-400 transition font-medium">Cerrar Sesión</a>
                        <a href="./index.php?action=eventos" class="text-gray-300 hover:text-purple-400 transition font-medium">Eventos y Torneos</a>
                        <a href="./index.php?action=dashboard"><img src="../img/paginacion/logo2.webp" class="w-16 h-16 hover:transform hover:scale-110 transition duration-300" alt=""></a>
                        <a href="./index.php?action=verReservas" class="text-gray-300 hover:text-purple-400 transition font-medium">Reserva tu sitio</a>
                        <a href="./index.php?action=alquila" class="text-gray-300 hover:text-purple-400 transition font-medium">Alquiler de Sala</a>
                        <a href="./index.php?action=tienda" class="text-gray-300 hover:text-purple-400 transition font-medium">Tienda</a>
                <?php
                    }else{
                ?>
                        <a href="./index.php?action=cerrarSesion" class="text-gray-300 hover:text-purple-400 transition font-medium">Cerrar Sesión</a>
                        <a href="./index.php?action=eventosUsuario" class="text-gray-300 hover:text-purple-400 transition font-medium">Eventos y Torneos</a>
                        <a href="./index.php?action=dashboard"><img src="../img/paginacion/logo2.webp" class="w-16 h-16 hover:transform hover:scale-110 transition duration-300" alt=""></a>
                        <a href="./index.php?action=verReservas" class="text-gray-300 hover:text-purple-400 transition font-medium">Reserva tu sitio</a>
                        <a href="./index.php?action=alquila" class="text-gray-300 hover:text-purple-400 transition font-medium">Alquiler de Sala</a>
                        <a href="./index.php?action=tienda" class="text-gray-300 hover:text-purple-400 transition font-medium">Tienda</a>
                <?php
                    }
                ?>
                
            <?php
                }else{
            ?>
                <a href="./index.php?action=login" class="text-gray-300 hover:text-purple-400 transition font-medium">Inicia tu Cuenta</a>
                <a href="./index.php?action=registro" class="text-gray-300 hover:text-purple-400 transition font-medium">Registrate y juega</a>
                <a href="./index.php?action=inicio"><img src="../img/paginacion/logo2.webp" class="w-16 h-16 hover:transform hover:scale-110 transition duration-300" alt=""></a>
                <a href="./index.php?action=verReservas" class="text-gray-300 hover:text-purple-400 transition font-medium">Reserva tu sitio</a>
                <a href="./index.php?action=alquila" class="text-gray-300 hover:text-purple-400 transition font-medium">Alquiler de Sala</a>
                <a href="./index.php?action=tienda" class="text-gray-300 hover:text-purple-400 transition font-medium">Tienda</a>
            <?php
                }
            ?>
        </div>

        <!-- Carrito y menú móvil -->
        <div class="flex items-center space-x-4">
            <a href="./index.php?action=verCarrito" class="text-purple-400 hover:text-purple-300 transition text-xl relative">
                <i class="fas fa-shopping-bag"></i>
                <span class="absolute -top-2 -right-2 bg-purple-600 text-xs rounded-full h-5 w-5 flex items-center justify-center">0</span>
            </a>
            <button id="menu-toggle" class="lg:hidden text-purple-400 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Menú móvil -->
    <div id="side-menu" class="fixed top-0 right-0 w-4/5 h-full bg-gray-900 text-white transform translate-x-full transition-transform duration-300 ease-in-out shadow-2xl z-50 border-l-2 border-purple-600">
        <div class="p-6 h-full flex flex-col">
            <button id="close-menu" class="self-end text-purple-400 text-3xl mb-8">&times;</button>
            <div class="flex-grow flex flex-col items-center justify-center space-y-8">
                <?php
                    if (!isset($_SESSION["id_usuario"])) {
                ?>
                        <a href="./index.php?action=login" class="text-xl text-gray-300 hover:text-purple-400 transition">Inicia tu Cuenta</a>
                        <a href="./index.php?action=registro" class="text-xl text-gray-300 hover:text-purple-400 transition">Registrate y juega</a>
                        <a href="./index.php?action=verReservas" class="text-xl text-gray-300 hover:text-purple-400 transition">Reserva tu sitio</a>
                        <a href="./index.php?action=alquila" class="text-xl text-gray-300 hover:text-purple-400 transition">Alquiler de Sala</a>
                        <a href="./index.php?action=tienda" class="text-xl text-gray-300 hover:text-purple-400 transition">Tienda</a>
                        <a href="./index.php?action=inicio"><img src="../img/paginacion/logo2.webp" alt="" class="w-20 h-20 hover:transform hover:scale-110 transition duration-300"></a>
                <?php
                    }else{
                ?>
                        <a href="./index.php?action=cerrarSesion" class="text-xl text-gray-300 hover:text-purple-400 transition">Cerrar tu Cuenta</a>
                        <?php
                            if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
                        ?>
                                <a href="./index.php?action=eventos" class="text-xl text-gray-300 hover:text-purple-400 transition">Eventos y Torneos</a>
                        <?php
                            }else{
                        ?>
                                <a href="./index.php?action=eventosUsuario" class="text-xl text-gray-300 hover:text-purple-400 transition">Eventos y Torneos</a>
                        <?php
                            }
                        ?>
                        <a href="./index.php?action=verReservas" class="text-xl text-gray-300 hover:text-purple-400 transition">Reserva tu sitio</a>
                        <a href="./index.php?action=alquila" class="text-xl text-gray-300 hover:text-purple-400 transition">Alquiler de Sala</a>
                        <a href="./index.php?action=tienda" class="text-xl text-gray-300 hover:text-purple-400 transition">Tienda</a>
                        <a href="./index.php?action=dashboard"><img src="../img/paginacion/logo2.webp" alt="" class="w-20 h-20 hover:transform hover:scale-110 transition duration-300"></a>
                <?php
                    }
                ?>
            </div>
            <!-- Redes sociales en móvil -->
            <div class="flex justify-center space-x-6 pt-8 border-t border-gray-700">
                <a href="#" class="text-purple-400 hover:text-purple-300 transition text-2xl">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="text-purple-400 hover:text-purple-300 transition text-2xl">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="#" class="text-purple-400 hover:text-purple-300 transition text-2xl">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
    </div>
</header>