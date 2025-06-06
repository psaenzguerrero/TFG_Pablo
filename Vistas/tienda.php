<main class="min-h-screen bg-gray-50">
    <section class="pt-15 md:pt-25">
        <div class="flex flex-wrap">
            <!-- Menú lateral de filtros - Versión mejorada -->
            <div class="block w-full md:fixed md:h-screen md:overflow-y-auto md:w-72 bg-gradient-to-b from-indigo-50 to-white p-6 border-r border-indigo-100 shadow-lg">

                <form method="POST" action="index.php" class="space-y-6">
                    <input type="hidden" name="action" value="tienda">
                    
                    <!-- Búsqueda por nombre -->
                    <div class="group">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-5 w-5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input 
                                type="text" 
                                name="nombre" 
                                placeholder="Buscar producto..." 
                                class="w-full pl-10 pr-4 py-3 border-0 bg-white rounded-xl shadow-sm ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 transition-all duration-200"
                                value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"/>
                        </div>
                    </div>

                    <!-- Filtro de precio -->
                    <div class="space-y-2">
                        <h3 class="text-md font-semibold text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Rango de Precio
                        </h3>
                        <div class="flex gap-3">
                            <div class="relative flex-1">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">€</span>
                                <input 
                                    type="number" 
                                    name="minPrecio" 
                                    placeholder="Mínimo" 
                                    class="w-full pl-8 pr-3 py-2 border-0 bg-white rounded-lg shadow-sm ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 transition-all"
                                    value="<?php echo isset($_POST['minPrecio']) ? htmlspecialchars($_POST['minPrecio']) : ''; ?>"/>
                            </div>
                            <div class="relative flex-1">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400">€</span>
                                <input 
                                    type="number" 
                                    name="maxPrecio" 
                                    placeholder="Máximo" 
                                    class="w-full pl-8 pr-3 py-2 border-0 bg-white rounded-lg shadow-sm ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 transition-all"
                                    value="<?php echo isset($_POST['maxPrecio']) ? htmlspecialchars($_POST['maxPrecio']) : ''; ?>"/>
                            </div>
                        </div>
                    </div>

                    <!-- Filtro de tipo -->
                    <div class="space-y-3">
                        <h3 class="text-md font-semibold text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            Tipo de Producto
                        </h3>
                        <div class="space-y-2 pl-1">
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <div class="relative">
                                    <input 
                                        type="checkbox" 
                                        name="tipo[]" 
                                        value="Consolas" 
                                        class="absolute opacity-0 w-0 h-0"
                                        <?php echo (isset($_POST['tipo']) && in_array('Consolas', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                    <div class="w-5 h-5 rounded border-2 border-gray-300 group-hover:border-indigo-400 flex items-center justify-center transition-all">
                                        <svg class="w-3 h-3 text-white fill-current hidden" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                </div>
                                <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Consolas</span>
                            </label>
                            <!-- Repetir para otros tipos -->
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <div class="relative">
                                    <input 
                                        type="checkbox" 
                                        name="tipo[]" 
                                        value="Equipo" 
                                        class="absolute opacity-0 w-0 h-0"
                                        <?php echo (isset($_POST['tipo']) && in_array('Equipo', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                    <div class="w-5 h-5 rounded border-2 border-gray-300 group-hover:border-indigo-400 flex items-center justify-center transition-all">
                                        <svg class="w-3 h-3 text-white fill-current hidden" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                </div>
                                <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Equipo</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <div class="relative">
                                    <input 
                                        type="checkbox" 
                                        name="tipo[]" 
                                        value="Accesorios" 
                                        class="absolute opacity-0 w-0 h-0"
                                        <?php echo (isset($_POST['tipo']) && in_array('Accesorios', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                    <div class="w-5 h-5 rounded border-2 border-gray-300 group-hover:border-indigo-400 flex items-center justify-center transition-all">
                                        <svg class="w-3 h-3 text-white fill-current hidden" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                </div>
                                <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Accesorios</span>
                            </label>
                            <label class="flex items-center space-x-3 cursor-pointer group">
                                <div class="relative">
                                    <input 
                                        type="checkbox" 
                                        name="tipo[]" 
                                        value="Juegos" 
                                        class="absolute opacity-0 w-0 h-0"
                                        <?php echo (isset($_POST['tipo']) && in_array('Juegos', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                    <div class="w-5 h-5 rounded border-2 border-gray-300 group-hover:border-indigo-400 flex items-center justify-center transition-all">
                                        <svg class="w-3 h-3 text-white fill-current hidden" viewBox="0 0 20 20"><path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/></svg>
                                    </div>
                                </div>
                                <span class="text-gray-600 group-hover:text-indigo-600 transition-colors">Juegos</span>
                            </label>
                        </div>
                    </div>

                    <!-- Filtro de puntos de compra -->
                    <div class="space-y-2">
                        <h3 class="text-md font-semibold text-gray-700 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                            Puntos de Compra
                        </h3>
                        <div class="flex gap-3 flex-wrap">
                            <input 
                                type="number" 
                                name="minPuntos" 
                                placeholder="Mínimo" 
                                class="flex-1 px-3 py-2 border-0 bg-white rounded-lg shadow-sm ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 transition-all"
                                value="<?php echo isset($_POST['minPuntos']) ? htmlspecialchars($_POST['minPuntos']) : ''; ?>"/>
                            <input 
                                type="number" 
                                name="maxPuntos" 
                                placeholder="Máximo" 
                                class="flex-1 px-3 py-2 border-0 bg-white rounded-lg shadow-sm ring-1 ring-gray-200 focus:ring-2 focus:ring-indigo-500 transition-all "
                                value="<?php echo isset($_POST['maxPuntos']) ? htmlspecialchars($_POST['maxPuntos']) : ''; ?>"/>
                        </div>
                    </div>

                    <!-- Botón para aplicar filtros -->
                    <button 
                        type="submit" 
                        class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white py-3 px-4 rounded-lg shadow-md hover:shadow-lg hover:from-indigo-600 hover:to-purple-700 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                        Aplicar Filtros
                    </button>
                </form>

                <?php if (isset($_SESSION["id_usuario"]) && strcmp($_SESSION["tipo_usuario"], "Admin") == 0): ?>
                    <a 
                        href="./index.php?action=agregarProducto" 
                        class="mt-4 inline-flex items-center justify-center w-full bg-green-500 text-white py-2 px-4 rounded-lg shadow hover:bg-green-600 transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Agregar Producto
                    </a>
                <?php endif; ?>
            </div>

            <!-- Lista de productos - Versión mejorada -->
            <div class="md:ml-72 p-8 flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                    <?php foreach ($productos as $producto): ?>
                        <div 
                            class="bg-white p-5 rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 cursor-pointer transform hover:-translate-y-1 border border-gray-100 hover:border-indigo-100 group"
                            onclick="abrirModal(<?php echo htmlspecialchars($producto['id_producto']); ?>)">
                            <div class="relative">
                                <!-- Aquí iría la imagen del producto si tuvieras -->
                                <div class="bg-gradient-to-br from-indigo-50 to-gray-100 h-40 rounded-lg mb-4 flex items-center justify-center group-hover:from-indigo-100 group-hover:to-gray-200 transition-all">
                                    <img class="w-40" src="../img/productos/<?php echo htmlspecialchars($producto['img']); ?>" alt="foto">
                                </div>
                                <span class="absolute top-2 right-2 bg-indigo-100 text-indigo-800 text-xs font-medium px-2 py-1 rounded-full">
                                    ID: <?php echo htmlspecialchars($producto['id_producto']); ?>
                                </span>
                            </div>
                            <h2 class="text-lg font-bold text-gray-800 mb-1 group-hover:text-indigo-600 transition-colors">
                                <?php echo htmlspecialchars($producto['nombre_producto']); ?>
                            </h2>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-lg font-semibold text-indigo-600">
                                    <?php echo htmlspecialchars($producto['precio_producto']); ?>€
                                </span>
                                <span class="bg-indigo-50 text-indigo-700 text-xs font-medium px-2 py-1 rounded-full">
                                    <?php echo htmlspecialchars($producto['tipo_producto']); ?>
                                </span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <?php echo htmlspecialchars($producto['puntos_compra']); ?> pts
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>