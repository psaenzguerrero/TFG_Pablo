<main class="bg-gray-900">
    <section class="relative w-full h-screen overflow-hidden z-0">
        <!-- Video de fondo con optimizaciones -->
        <video class="absolute top-0 left-0 w-full h-full object-cover brightness-75" autoplay muted loop playsinline>
            <source src="../img/paginacion/Fondo tecnológico en 4K.mp4" type="video/mp4">
            Tu navegador no soporta el video.
        </video>
        <!-- Capa de overlay para mejor contraste -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/30 to-black/50"></div>
        <!-- Contenido centrado con animación -->
        <div class="absolute inset-0 flex flex-col justify-center items-center text-center px-4">
            <!-- Título principal con animación y mejor jerarquía -->
            <h1 class="text-6xl sm:text-7xl md:text-8xl lg:text-9xl font-extrabold text-white mb-4 animate-fade-in-up">
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-600">CALL OF</span>
                <span class="block mt-2 text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-400">GAMER</span>
            </h1>
            <!-- Subtítulo opcional -->
            <p class="text-xl md:text-2xl text-white/90 max-w-2xl mx-auto mb-8 animate-fade-in-up delay-100">
                Únete a la competencia definitiva de esports
            </p>
            <!-- Botón CTA con hover effect -->
            <a href="#eventos" class="px-8 py-3 bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold rounded-full hover:from-blue-700 hover:to-purple-700 transition-all duration-300 transform hover:scale-105 shadow-lg animate-fade-in-up delay-200">
                Ver Eventos
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <!-- Flecha indicadora de scroll -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>
    </section>
    <!-- Sección del carrusel -->
    <section class="relative">
    <div class="carousel-container">
        <div id="carousel" class="carousel-wrapper pb-20">
            <!-- carruel 1 -->
            <div class="carousel-item bg-[url('../img/paginacion/c1.jpg')] bg-cover bg-center h-full">
                <div class="flex flex-col items-center p-8 text-center">
                    <div class="text-2xl font-bold mb-8 text-white">Título Centrando</div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 lg:gap-12 w-full lg:w-4/5">
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 1</h3>
                            <p class="text-sm text-white">Texto pequeño 1</p>
                        </div>
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 2</h3>
                            <p class="text-sm text-white">Texto pequeño 2</p>
                        </div>
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 3</h3>
                            <p class="text-sm text-white">Texto pequeño 3</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- carruel 2 -->
            <div class="carousel-item bg-[url('../img/paginacion/c2.png')] bg-cover bg-center h-full">
                <div class="flex flex-col items-center p-8 text-center">
                    <div class="text-2xl font-bold mb-8 text-white">
                        Título Centrando
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 lg:gap-12 w-full lg:w-4/5">
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 1</h3>
                            <p class="text-sm text-white">Texto pequeño 1</p>
                        </div>
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 2</h3>
                            <p class="text-sm text-white">Texto pequeño 2</p>
                        </div>
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 3</h3>
                            <p class="text-sm text-white">Texto pequeño 3</p>
                        </div>
                    </div>
                </div>
            </div>    
            <!-- carruel 3 -->
            <div class="carousel-item bg-[url('../img/paginacion/c3.png')] bg-cover bg-center h-full">
                <div class="flex flex-col items-center p-8 text-center">
                    <div class="text-2xl font-bold mb-8 text-white">
                        Título Centrando
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8 lg:gap-12 w-full lg:w-4/5">
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 1</h3>
                            <p class="text-sm text-white">Texto pequeño 1</p>
                        </div>
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 2</h3>
                            <p class="text-sm text-white">Texto pequeño 2</p>
                        </div>
                        <div class="border border-white p-6 pb-50 md:pb-100 bg-black/50">
                            <h3 class="text-xl text-white">Título 3</h3>
                            <p class="text-sm text-white">Texto pequeño 3</p>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
        <!-- Flechas de Navegación -->
        <button class="absolute top-1/2 left-4 transform -translate-y-1/2 text-white text-3xl" id="prev-btn">&#10094;</button>
        <button class="absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-3xl" id="next-btn">&#10095;</button>
        <!-- Puntos de Indicadores -->
        <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex space-x-3">
            <span class="carousel-nav-dot" id="dot-1"><svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.119 8h9.762a1 1 0 0 1 .772 1.636l-4.881 5.927a1 1 0 0 1-1.544 0l-4.88-5.927A1 1 0 0 1 7.118 8Z"/></svg></span>

            <span class="carousel-nav-dot" id="dot-2"><svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.119 8h9.762a1 1 0 0 1 .772 1.636l-4.881 5.927a1 1 0 0 1-1.544 0l-4.88-5.927A1 1 0 0 1 7.118 8Z"/></svg></span>

            <span class="carousel-nav-dot" id="dot-3"><svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.119 8h9.762a1 1 0 0 1 .772 1.636l-4.881 5.927a1 1 0 0 1-1.544 0l-4.88-5.927A1 1 0 0 1 7.118 8Z"/></svg></span>
        </div>
    </div>
</section>
    <section class="flex flex-col lg:flex-row justify-between">
        <div  class="bg-gray-900 text-white flex flex-col items-center ">
            <div class="p-6 animated-bg shadow-lg w-full max-w-4xl flex items-center space-x-4 overflow-hidden my-6 clip-path-custom scroll-container">
                <h2 class="text-xl font-bold text-center text-white">Sala Principal</h2>
                <div class="flex space-x-4">
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">1h</span>
                        <span class="text-xl font-bold text-white">3€</span>
                        <span class="text-sm text-gray-400">(3.00€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">2h</span>
                        <span class="text-xl font-bold text-white">5€</span>
                        <span class="text-sm text-gray-400">(2.50€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">5h</span>
                        <span class="text-xl font-bold text-white">10€</span>
                        <span class="text-sm text-gray-400">(2.00€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">12h</span>
                        <span class="text-xl font-bold text-white">20€</span>
                        <span class="text-sm text-gray-400">(1.66€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">28h</span>
                        <span class="text-xl font-bold text-white">40€</span>
                        <span class="text-sm text-gray-400">(1.42€/h)</span>
                    </div>
                </div>
            </div>
            <div class="p-6 animated-bg shadow-lg w-full max-w-4xl flex items-center space-x-4 overflow-hidden my-6 clip-path-custom scroll-container">
                <h2 class="text-xl font-bold text-center text-white">Sala Virtual</h2>
                <div class="flex space-x-4">
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">1h</span>
                        <span class="text-xl font-bold text-white">3€</span>
                        <span class="text-sm text-gray-400">(3.00€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">2h</span>
                        <span class="text-xl font-bold text-white">5€</span>
                        <span class="text-sm text-gray-400">(2.50€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">5h</span>
                        <span class="text-xl font-bold text-white">10€</span>
                        <span class="text-sm text-gray-400">(2.00€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">12h</span>
                        <span class="text-xl font-bold text-white">20€</span>
                        <span class="text-sm text-gray-400">(1.66€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">28h</span>
                        <span class="text-xl font-bold text-white">40€</span>
                        <span class="text-sm text-gray-400">(1.42€/h)</span>
                    </div>
                </div>
            </div>
            <div class="p-6 animated-bg shadow-lg w-full max-w-4xl flex items-center space-x-4 overflow-hidden m-6 clip-path-custom scroll-container">
                <h2 class="text-xl font-bold text-center text-white">Sala para VIPS</h2>
                <div class="flex space-x-4">
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">1h</span>
                        <span class="text-xl font-bold text-white">3€</span>
                        <span class="text-sm text-gray-400">(3.00€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">2h</span>
                        <span class="text-xl font-bold text-white">5€</span>
                        <span class="text-sm text-gray-400">(2.50€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">5h</span>
                        <span class="text-xl font-bold text-white">10€</span>
                        <span class="text-sm text-gray-400">(2.00€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">12h</span>
                        <span class="text-xl font-bold text-white">20€</span>
                        <span class="text-sm text-gray-400">(1.66€/h)</span>
                    </div>
                    <div class="flex flex-col items-center bg-gray-700 p-3 rounded-lg">
                        <span class="text-lg font-semibold text-white">28h</span>
                        <span class="text-xl font-bold text-white">40€</span>
                        <span class="text-sm text-gray-400">(1.42€/h)</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-center justify-center my-16 px-2  mr-0 2xl:mr-30">
            <div class="bg-gradient-to-r from-gray-800 to-gray-900 rounded-xl px-8 py-8 shadow-2xl border border-gray-700 max-w-2xl w-full transform hover:scale-[1.02] transition-transform duration-300">
                <div class="flex flex-col md:flex-row lg:flex-col xl:flex-row items-center justify-between gap-6">
                    <div class="text-center md:text-left">
                        <h2 class="text-2xl md:text-3xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500 mb-2">
                            Mejora tu Experiencia
                        </h2>
                        <p class="text-gray-300 mb-4 md:mb-0">
                            Desbloquea beneficios exclusivos como miembro VIP
                        </p>
                    </div>
                    <div class="flex-shrink-0">
                        <?php if (isset($_SESSION["id_usuario"])): ?>
                            <?php if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] === 'Normal'): ?>
                                <a href="index.php?action=mejoraUsu" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-yellow-500 to-yellow-600 text-gray-900 font-bold rounded-lg hover:from-yellow-400 hover:to-yellow-500 transition-all duration-300 shadow-lg hover:shadow-xl">
                                    Hazte VIP
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.395 2.553a1 1 0 00-1.45-.385c-.345.23-.614.558-.822.88-.214.33-.403.713-.57 1.116-.334.804-.614 1.768-.84 2.734a31.365 31.365 0 00-.613 3.58 2.64 2.64 0 01-.945-1.067c-.328-.68-.398-1.534-.398-2.654A1 1 0 005.05 6.05 6.981 6.981 0 003 11a7 7 0 1011.95-4.95c-.592-.591-.98-.985-1.348-1.467-.363-.476-.724-1.063-1.207-2.03zM12.12 15.12A3 3 0 017 13s.879.5 2.5.5c0-1 .5-4 1.25-4.5.5 1 .786 1.293 1.371 1.879A2.99 2.99 0 0113 13a2.99 2.99 0 01-.879 2.121z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            <?php else: ?>
                                <button class="inline-flex items-center px-6 py-3 bg-gray-600 text-gray-300 font-medium rounded-lg cursor-not-allowed opacity-75">
                                    Ya eres VIP
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </button>
                            <?php endif; ?>
                        <?php else: ?>
                            <button class="inline-flex items-center px-6 py-3 bg-gray-600 text-gray-300 font-medium rounded-lg cursor-not-allowed opacity-75" onclick="showLoginAlert()">
                                Inicia sesión para ser VIP
                                <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </button>
                            
                            <script>
                                function showLoginAlert() {
                                    alert("Por favor inicia sesión para acceder a las ventajas VIP");
                                }
                            </script>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
