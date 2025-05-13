<main class="bg-gray-900 text-white min-h-screen">
    <!-- Sección Hero/Banner principal - Responsive -->
    <section class="relative py-12 md:py-20 bg-[url('https://images.unsplash.com/photo-1542751371-adc38448a05e')] bg-cover bg-center">
        <div class="absolute inset-0 bg-black opacity-60"></div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 z-10">
            <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold mb-3 md:mb-4 text-purple-400"><?php echo htmlspecialchars($productoData['nombre_producto']); ?></h1>
            <p class="text-lg sm:text-xl md:text-2xl max-w-2xl">El equipo definitivo para tu experiencia gaming</p>
        </div>
    </section>
    <!-- Sección principal del producto - Responsive -->
    <section class="py-10 md:py-16 container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row gap-8 md:gap-12">
            <!-- Galería de imágenes - Responsive -->
            <div class="lg:w-1/2">
                <div class="bg-gray-800 rounded-lg overflow-hidden mb-3 md:mb-4">
                    <img src="https://via.placeholder.com/800x600" alt="<?php echo htmlspecialchars($productoData['nombre_producto']); ?>" class="w-full h-auto">
                </div>
                <div class="grid grid-cols-3 gap-2">
                    <div class="bg-gray-800 rounded-md overflow-hidden cursor-pointer hover:opacity-80 transition">
                        <img src="https://via.placeholder.com/300x200" alt="Vista 1" class="w-full h-auto">
                    </div>
                    <div class="bg-gray-800 rounded-md overflow-hidden cursor-pointer hover:opacity-80 transition">
                        <img src="https://via.placeholder.com/300x200" alt="Vista 2" class="w-full h-auto">
                    </div>
                    <div class="bg-gray-800 rounded-md overflow-hidden cursor-pointer hover:opacity-80 transition">
                        <img src="https://via.placeholder.com/300x200" alt="Vista 3" class="w-full h-auto">
                    </div>
                </div>
            </div>
            <!-- Detalles del producto - Responsive -->
            <div class="lg:w-1/2">
                <div class="mb-6">
                    <span class="inline-block bg-purple-600 text-xs px-2 py-1 rounded-full mb-2 md:mb-3">NUEVO</span>
                    <h2 class="text-2xl sm:text-3xl font-bold mb-2"><?php echo htmlspecialchars($productoData['nombre_producto']); ?></h2>
                    <div class="flex items-center mb-3 md:mb-4">
                        <div class="text-yellow-400 text-sm md:text-base">★★★★★</div>
                        <span class="text-gray-400 ml-2 text-sm md:text-base">(36 reseñas)</span>
                    </div>
                    <p class="text-gray-300 mb-4 md:mb-6 text-sm md:text-base">Descripción detallada del producto que destaque sus características principales y beneficios para el usuario gamer.</p>
                </div>

                <div class="bg-gray-800 rounded-lg p-4 md:p-6 mb-6 md:mb-8">
                    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-3 md:mb-4 gap-2">
                        <span class="text-xl md:text-2xl font-bold">$<?php echo htmlspecialchars($productoData['precio']); ?></span>
                        <span class="text-green-400 text-sm md:text-base">✔ En stock</span>
                    </div>

                    <form action="index.php?action=agregarAlCarrito" method="post" class="space-y-3 md:space-y-4">
                        <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($productoData['id_producto']); ?>">
                        
                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <label class="text-sm md:text-base">Cantidad:</label>
                            <div class="flex border border-gray-600 rounded-md w-full sm:w-auto">
                                <button type="button" class="px-3 py-1 hover:bg-gray-700 text-sm md:text-base">-</button>
                                <input type="number" value="1" min="1" class="w-12 text-center bg-transparent border-0 text-sm md:text-base">
                                <button type="button" class="px-3 py-1 hover:bg-gray-700 text-sm md:text-base">+</button>
                            </div>
                        </div>
                        
                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 md:py-3 px-4 md:px-6 rounded-md font-bold transition flex items-center justify-center gap-2 text-sm md:text-base">
                            🛒 Añadir al carrito
                        </button>
                    </form>
                </div>

                <div class="flex flex-wrap gap-2">
                    <div class="flex items-center bg-gray-800 px-2 py-1 md:px-3 md:py-2 rounded-md text-xs md:text-sm">
                        <span class="text-purple-400 mr-1 md:mr-2">⚡</span>
                        <span>Entrega rápida</span>
                    </div>
                    <div class="flex items-center bg-gray-800 px-2 py-1 md:px-3 md:py-2 rounded-md text-xs md:text-sm">
                        <span class="text-purple-400 mr-1 md:mr-2">🔄</span>
                        <span>Devoluciones fáciles</span>
                    </div>
                    <div class="flex items-center bg-gray-800 px-2 py-1 md:px-3 md:py-2 rounded-md text-xs md:text-sm">
                        <span class="text-purple-400 mr-1 md:mr-2">🛡️</span>
                        <span>Garantía 2 años</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de características - Responsive -->
    <section class="py-10 md:py-16 bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl md:text-3xl font-bold mb-8 md:mb-12 text-center">Características</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
                <div class="bg-gray-900 p-4 md:p-6 rounded-lg">
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3 text-purple-400">Especificaciones técnicas</h3>
                    <ul class="space-y-1 md:space-y-2 text-sm md:text-base text-gray-300">
                        <li class="flex justify-between"><span>Marca:</span> <span>GamerPro</span></li>
                        <li class="flex justify-between"><span>Modelo:</span> <span>GP-2023</span></li>
                        <li class="flex justify-between"><span>Color:</span> <span>Negro RGB</span></li>
                        <li class="flex justify-between"><span>Conectividad:</span> <span>USB-C</span></li>
                    </ul>
                </div>
                
                <div class="bg-gray-900 p-4 md:p-6 rounded-lg">
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3 text-purple-400">Características principales</h3>
                    <ul class="space-y-1 md:space-y-2 text-sm md:text-base text-gray-300">
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">✓</span>
                            <span>Retroiluminación RGB personalizable</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">✓</span>
                            <span>Switches mecánicos para gaming</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">✓</span>
                            <span>Anti-ghosting N-key rollover</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">✓</span>
                            <span>Cable desmontable</span>
                        </li>
                    </ul>
                </div>
                
                <div class="bg-gray-900 p-4 md:p-6 rounded-lg">
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3 text-purple-400">Incluye</h3>
                    <ul class="space-y-1 md:space-y-2 text-sm md:text-base text-gray-300">
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">📦</span>
                            <span>Teclado principal</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">📦</span>
                            <span>Cable USB-C</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">📦</span>
                            <span>Extractor de keycaps</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-purple-400 mr-1 md:mr-2">📦</span>
                            <span>Manual de usuario</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección de productos relacionados - Responsive -->
    <section class="py-10 md:py-16 container mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl md:text-3xl font-bold mb-8 md:mb-12">Productos relacionados</h2>
        
        <div class="grid grid-cols-1 xs:grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            <!-- Producto 1 -->
            <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:scale-[1.02] transition duration-300">
                <img src="https://via.placeholder.com/300x200" alt="Mouse Gamer" class="w-full h-40 sm:h-48 object-cover">
                <div class="p-3 md:p-4">
                    <h3 class="font-bold mb-1 md:mb-2 text-sm md:text-base">Mouse Gamer Pro</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-purple-400 font-bold text-sm md:text-base">$79.99</span>
                        <button class="bg-gray-700 hover:bg-purple-600 p-1 md:p-2 rounded-full text-sm md:text-base">
                            🛒
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Producto 2 -->
            <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:scale-[1.02] transition duration-300">
                <img src="https://via.placeholder.com/300x200" alt="Headset Gamer" class="w-full h-40 sm:h-48 object-cover">
                <div class="p-3 md:p-4">
                    <h3 class="font-bold mb-1 md:mb-2 text-sm md:text-base">Headset Gamer 7.1</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-purple-400 font-bold text-sm md:text-base">$129.99</span>
                        <button class="bg-gray-700 hover:bg-purple-600 p-1 md:p-2 rounded-full text-sm md:text-base">
                            🛒
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Producto 3 -->
            <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:scale-[1.02] transition duration-300">
                <img src="https://via.placeholder.com/300x200" alt="Mousepad XL" class="w-full h-40 sm:h-48 object-cover">
                <div class="p-3 md:p-4">
                    <h3 class="font-bold mb-1 md:mb-2 text-sm md:text-base">Mousepad XL RGB</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-purple-400 font-bold text-sm md:text-base">$39.99</span>
                        <button class="bg-gray-700 hover:bg-purple-600 p-1 md:p-2 rounded-full text-sm md:text-base">
                            🛒
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Producto 4 -->
            <div class="bg-gray-800 rounded-lg overflow-hidden hover:transform hover:scale-[1.02] transition duration-300">
                <img src="https://via.placeholder.com/300x200" alt="Controlador" class="w-full h-40 sm:h-48 object-cover">
                <div class="p-3 md:p-4">
                    <h3 class="font-bold mb-1 md:mb-2 text-sm md:text-base">Controlador Pro</h3>
                    <div class="flex justify-between items-center">
                        <span class="text-purple-400 font-bold text-sm md:text-base">$59.99</span>
                        <button class="bg-gray-700 hover:bg-purple-600 p-1 md:p-2 rounded-full text-sm md:text-base">
                            🛒
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>