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
<header class="bg-gray-900 text-white fixed z-50 w-full border-b-2 border-purple-600 shadow-lg flex justify-center">
    <nav class="container mx-10 flex justify-between items-center py-4">
        <!-- Redes sociales -->
        <div class="hidden lg:flex items-center space-x-4">
            <a href="#" class="text-purple-400 hover:text-purple-300 transition transform hover:scale-110 duration-300 ease-in-out text-2xl" aria-label="Twitter">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                <path d="M23.954 4.569c-.885.389-1.83.654-2.825.775 1.014-.611 1.794-1.574 2.163-2.723-.949.564-2.005.974-3.127 1.195-.896-.959-2.173-1.559-3.591-1.559-2.717 0-4.92 2.203-4.92 4.917 0 .39.045.765.127 1.124-4.087-.205-7.713-2.165-10.141-5.144-.423.722-.666 1.561-.666 2.457 0 1.697.865 3.197 2.181 4.075-.803-.026-1.56-.247-2.22-.616v.062c0 2.367 1.685 4.342 3.918 4.788-.41.111-.843.171-1.287.171-.314 0-.615-.03-.916-.086.631 1.953 2.445 3.377 4.604 3.417-1.68 1.319-3.809 2.105-6.102 2.105-.395 0-.779-.023-1.17-.067 2.189 1.394 4.768 2.209 7.557 2.209 9.054 0 14.002-7.496 14.002-13.986 0-.21-.005-.423-.014-.635.961-.695 1.8-1.562 2.462-2.549z"/>
            </svg>
            </a>
            <a href="#" class="text-purple-400 hover:text-purple-300 transition transform hover:scale-110 duration-300 ease-in-out text-2xl" aria-label="Facebook">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                <path d="M22.675 0h-21.35c-.733 0-1.325.592-1.325 1.325v21.351c0 .733.592 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.894-4.788 4.659-4.788 1.325 0 2.463.099 2.794.143v3.24h-1.918c-1.504 0-1.796.715-1.796 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.733 0 1.325-.591 1.325-1.324v-21.35c0-.733-.592-1.325-1.325-1.325z"/>
            </svg>
            </a>
            <a href="#" class="text-purple-400 hover:text-purple-300 transition transform hover:scale-110 duration-300 ease-in-out text-2xl" aria-label="YouTube">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-6 h-6">
                <path d="M23.498 6.186a2.99 2.99 0 0 0-2.104-2.104C19.646 3.5 12 3.5 12 3.5s-7.646 0-9.394.582a2.99 2.99 0 0 0-2.104 2.104C0 7.934 0 12 0 12s0 4.066.502 5.814a2.99 2.99 0 0 0 2.104 2.104C4.354 20.5 12 20.5 12 20.5s7.646 0 9.394-.582a2.99 2.99 0 0 0 2.104-2.104C24 16.066 24 12 24 12s0-4.066-.502-5.814zM9.75 15.02V8.98L15.5 12l-5.75 3.02z"/>
            </svg>
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
                        <a href="./index.php?action=alquila" class="text-gray-300 hover:text-purple-400 transition font-medium">Usuarios</a>
                        <a href="./index.php?action=tienda" class="text-gray-300 hover:text-purple-400 transition font-medium">Tienda</a>
                <?php
                    }else{
                ?>
                        <a href="./index.php?action=cerrarSesion" class="text-gray-300 hover:text-purple-400 transition font-medium">Cerrar Sesión</a>
                        <a href="./index.php?action=eventosUsuario" class="text-gray-300 hover:text-purple-400 transition font-medium">Eventos y Torneos</a>
                        <a href="./index.php?action=dashboard"><img src="../img/paginacion/logo2.webp" class="w-16 h-16 hover:transform hover:scale-110 transition duration-300" alt=""></a>
                        <a href="./index.php?action=verReservas" class="text-gray-300 hover:text-purple-400 transition font-medium">Reserva tu sitio</a>
                        <a href="./index.php?action=alquila" class="text-gray-300 hover:text-purple-400 transition font-medium">Tu Perfil</a>
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
                <a href="./index.php?action=alquila" class="text-gray-300 hover:text-purple-400 transition font-medium">Tu Perfil</a>
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