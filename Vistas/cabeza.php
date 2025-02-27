<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        .carousel-container {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .carousel-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-item {
            min-width: 100%;
            background-size: cover;
            background-position: center;
        }
        .clip-path-custom {
            clip-path: polygon(0% 0%, 100% 0%, 90% 100%, 0% 100%);
        }
        a i {
            font-size: 30px;
            width: 50px;
            height: 8px;
        }
        .fa-twitter {
            color: #1DA1F2;
        }
        .fa-facebook {
            color: #1877F2;
        }
        .fa-instagram {
            color: #E1306C;
        }
    </style>
</head>
<body>
<header class="bg-black text-white fixed z-10 w-full">
    <nav class="flex justify-between items-center align p-4 bg-black text-white">
        <div class="hidden lg:flex items-center space-x-4">
            <a href="#" class="text-lg text-blue-400 text-2xl">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="text-lg text-blue-600 text-2xl">
                <i class="fab fa-facebook"></i>
            </a>
            <a href="#" class="text-lg text-pink-500 text-2xl">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
        <div class="hidden lg:flex lg:items-center space-x-6 mr-15" id="nav-menu">
            <a href="./index.php?action=login" class="hover:text-gray-400">Inicia tu Cuenta</a>
            <a href="#" class="hover:text-gray-400">Registrate y juega</a>
            <a href="./inicio.html"><img src="../img/paginacion/minilogo.png" alt=""></a>
            
            <a href="#" class="hover:text-gray-400">Reserva tu sitio</a>
            <a href="#" class="hover:text-gray-400">Alquiler de Equipo</a>
            <a href="#" class="hover:text-gray-400">Tienda</a>
        </div>
        <div>
            <a href="#" class="text-lg"><i class="fas fa-shopping-bag"></i></a>
        </div>
        <div class="lg:hidden">
            <button id="menu-toggle" class="text-white">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </nav>
    <div id="side-menu" class="fixed top-0 right-0 w-full h-full bg-black bg-opacity-90 text-white transform translate-x-full transition-transform duration-300 flex flex-col items-center justify-center space-y-4 z-10">
        <button id="close-menu" class="absolute top-4 left-4 text-white text-2xl">&times;</button>
        <a href="./index.php?action=login" class="hover:text-gray-400 transition-transform duration-300 transform hover:scale-110">Inicia tu Cuenta</a>
        <a href="#" class="hover:text-gray-400 transition-transform duration-300 transform hover:scale-110">Registrate y juega</a>
        <a href="#" class="hover:text-gray-400 transition-transform duration-300 transform hover:scale-110">Reserva tu sitio</a>
        <a href="#" class="hover:text-gray-400 transition-transform duration-300 transform hover:scale-110">Alquiler de Equipo</a>
        <a href="#" class="hover:text-gray-400 transition-transform duration-300 transform hover:scale-110">Tienda</a>
        <a href="./inicio.html"><img src="../img/paginacion/minilogo.png" alt="" class="hover:text-gray-400 transition-transform duration-300 transform hover:scale-110"></a>
    </div>
    <script>
        document.getElementById("menu-toggle").addEventListener("click", function() {
            document.getElementById("side-menu").classList.toggle("translate-x-full");
        });
        document.getElementById("close-menu").addEventListener("click", function() {
            document.getElementById("side-menu").classList.add("translate-x-full");
        });
    </script>
</header>



