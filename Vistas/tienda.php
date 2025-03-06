<main>
    <section class="pt-50">
        <div class="flex">
            <!-- menu lateral de filtros -->
            <div class="w-64 bg-gray-50 p-6 border-r border-gray-200 fixed h-screen overflow-y-auto">
                <form method="POST" action="index.php">
                    <input type="hidden" name="action" value="tienda">
                    
                    <!-- busqueda  por nombre -->
                    <div class="mb-6">
                        <input type="text" name="nombre" placeholder="Buscar producto..." class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : ''; ?>"/>
                    </div>

                    <!-- fltro de precio -->
                    <div class="mb-6">
                        <h3 class="text-md font-medium text-gray-700 mb-3">Precio</h3>
                        <div class="flex gap-2">
                            <input type="number" name="minPrecio" placeholder="Mínimo" class="w-1/2 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($_POST['minPrecio']) ? htmlspecialchars($_POST['minPrecio']) : ''; ?>"/>
                            <input type="number" name="maxPrecio" placeholder="Máximo" class="w-1/2 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($_POST['maxPrecio']) ? htmlspecialchars($_POST['maxPrecio']) : ''; ?>"/>
                        </div>
                    </div>

                    <!-- fltro de tipo  -->
                    <div class="mb-6">
                        <h3 class="text-md font-medium text-gray-700 mb-3">Tipo de Producto</h3>
                        <div class="space-y-2">
                            <label class="flex items-center text-gray-600">
                                <input type="checkbox" name="tipo[]" value="Consolas" class="mr-2" <?php echo (isset($_POST['tipo']) && in_array('Consolas', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                Consolas
                            </label>
                            <label class="flex items-center text-gray-600">
                                <input type="checkbox" name="tipo[]" value="Equipo Tecnológico" class="mr-2" <?php echo (isset($_POST['tipo']) && in_array('Equipo Tecnológico', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                Equipo Tecnológico
                            </label>
                            <label class="flex items-center text-gray-600">
                                <input type="checkbox" name="tipo[]" value="Accesorios" class="mr-2" <?php echo (isset($_POST['tipo']) && in_array('Accesorios', $_POST['tipo'])) ? 'checked' : ''; ?>/>
                                Accesorios
                            </label>
                        </div>
                    </div>

                    <!-- fltro de puntos de Compra -->
                    <div class="mb-6">
                        <h3 class="text-md font-medium text-gray-700 mb-3">Puntos de Compra</h3>
                        <div class="flex gap-2">
                            <input type="number" name="minPuntos" placeholder="Mínimo" class="w-1/2 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($_POST['minPuntos']) ? htmlspecialchars($_POST['minPuntos']) : ''; ?>"/>
                            <input type="number" name="maxPuntos" placeholder="Máximo" class="w-1/2 px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?php echo isset($_POST['maxPuntos']) ? htmlspecialchars($_POST['maxPuntos']) : ''; ?>"/>
                        </div>
                    </div>

                    <!-- Boton para aplicar filtros -->
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                        Aplicar Filtros
                    </button>
                </form>
                <?php
                    if (isset($_SESSION["id_usuario"]) && strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
                ?>
                        <a href="./index.php?action=agregarProducto">agregar</a>
                <?php
                    }
                ?>
            </div>

            <!-- Lista de productos -->
            <div class="ml-64 p-6 flex-1">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php foreach ($productos as $producto): ?>
                        <div class="bg-white p-4 border border-gray-200 rounded-lg shadow-sm">
                            <h2 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($producto['nombre_producto']); ?></h2>
                            <p class="text-gray-600">Precio: <?php echo htmlspecialchars($producto['precio_producto']); ?>€</p>
                            <p class="text-gray-600">Tipo: <?php echo htmlspecialchars($producto['tipo_producto']); ?></p>
                            <p class="text-gray-600">Puntos: <?php echo htmlspecialchars($producto['puntos_compra']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
</main>