<main>
    <section class="pt-50">

        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4">
            <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                <h2 class="text-xl font-semibold mb-4">Editar Producto</h2>

                <?php if (isset($error)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>

                <form action="index.php?action=editarProducto" method="POST">
                    <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($productoData['id_producto'] ); ?>">

                    <div class="mb-4">
                        <label for="nombre_producto" class="block text-gray-700 font-semibold mb-2">Nombre del Producto</label>
                        <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo htmlspecialchars($productoData['nombre_producto'] ?? ''); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="precio_producto" class="block text-gray-700 font-semibold mb-2">Precio del Producto</label>
                        <input type="number" id="precio_producto" name="precio_producto" step="0.01" value="<?php echo htmlspecialchars($productoData['precio_producto'] ?? ''); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="mb-4">
                        <label for="tipo_producto" class="block text-gray-700 font-semibold mb-2">Tipo de Producto</label>
                        <select id="tipo_producto" name="tipo_producto" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="Consolas" <?php echo (($productoData['tipo_producto'] ?? '') === 'Consolas' ? 'selected' : ''); ?>>Consolas</option>
                            <option value="Equipo" <?php echo (($productoData['tipo_producto'] ?? '') === 'Equipo' ? 'selected' : ''); ?>>Equipo</option>
                            <option value="Accesorios" <?php echo (($productoData['tipo_producto'] ?? '') === 'Accesorios' ? 'selected' : ''); ?>>Accesorios</option>
                            <option value="Juegos" <?php echo (($productoData['tipo_producto'] ?? '') === 'Juegos' ? 'selected' : ''); ?>>Juegos</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="puntos_compra" class="block text-gray-700 font-semibold mb-2">Puntos de Compra</label>
                        <input type="number" id="puntos_compra" name="puntos_compra" value="<?php echo htmlspecialchars($productoData['puntos_compra'] ?? ''); ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <div class="flex justify-end gap-4">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Guardar Cambios
                        </button>
                        <a href="index.php?action=eliminarProducto&id_producto=<?php echo htmlspecialchars($productoData['id_producto'] ?? ''); ?>" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500">
                            Eliminar Producto
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</main>