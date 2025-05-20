<main>
    <section class="pt-50">

        <div class="fixed inset-0 bg-gray-100 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-md w-full max-w-lg p-8 border border-gray-300">
                <h2 class="text-2xl font-bold text-gray-800 mb-6">Editar Producto</h2>

                <?php if (isset($error)): ?>
                    <div class="bg-red-50 border border-red-300 text-red-600 px-4 py-3 rounded mb-4">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form action="index.php?action=modificarProducto" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($productoData['id_producto'] ); ?>">

                    <div class="mb-6">
                        <label for="nombre_producto" class="block text-gray-700 font-medium mb-2">Nombre del Producto</label>
                        <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo htmlspecialchars($productoData['nombre_producto'] ?? ''); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-6">
                        <label for="precio_producto" class="block text-gray-700 font-medium mb-2">Precio del Producto</label>
                        <input type="number" id="precio_producto" name="precio_producto" step="0.01" value="<?php echo htmlspecialchars($productoData['precio_producto'] ?? ''); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div class="mb-6">
                        <label for="tipo_producto" class="block text-gray-700 font-medium mb-2">Tipo de Producto</label>
                        <select id="tipo_producto" name="tipo_producto" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                            <option value="Consolas" <?php echo (($productoData['tipo_producto'] ?? '') === 'Consolas' ? 'selected' : ''); ?>>Consolas</option>
                            <option value="Equipo" <?php echo (($productoData['tipo_producto'] ?? '') === 'Equipo' ? 'selected' : ''); ?>>Equipo</option>
                            <option value="Accesorios" <?php echo (($productoData['tipo_producto'] ?? '') === 'Accesorios' ? 'selected' : ''); ?>>Accesorios</option>
                            <option value="Juegos" <?php echo (($productoData['tipo_producto'] ?? '') === 'Juegos' ? 'selected' : ''); ?>>Juegos</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="puntos_compra" class="block text-gray-700 font-medium mb-2">Puntos de Compra</label>
                        <input type="number" id="puntos_compra" name="puntos_compra" value="<?php echo htmlspecialchars($productoData['puntos_compra'] ?? ''); ?>" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="submit" class="bg-indigo-500 text-white px-5 py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-transform transform hover:scale-105 active:scale-95">
                            Guardar Cambios
                        </button>
                        <a href="index.php?action=eliminarProducto&id_producto=<?php echo htmlspecialchars($productoData['id_producto'] ?? ''); ?>" class="bg-red-500 text-white px-5 py-2 rounded-md hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 transition-transform transform hover:scale-105 active:scale-95">
                            Eliminar Producto
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>