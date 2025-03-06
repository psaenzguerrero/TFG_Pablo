<main>
    <section class="pt-50">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6">Agregar Nuevo Producto</h1>

            <?php if (isset($error)): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="index.php?action=agregarProducto" method="POST" class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-4">
                    <label for="nombre_producto" class="block text-gray-700 font-semibold mb-2">Nombre del Producto</label>
                    <input type="text" id="nombre_producto" name="nombre_producto" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="precio_producto" class="block text-gray-700 font-semibold mb-2">Precio del Producto</label>
                    <input type="number" id="precio_producto" name="precio_producto" step="0.01" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="tipo_producto" class="block text-gray-700 font-semibold mb-2">Tipo de Producto</label>
                    <select id="tipo_producto" name="tipo_producto" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="Electrónica">Electrónica</option>
                        <option value="Ropa">Ropa</option>
                        <option value="Hogar">Hogar</option>
                        <option value="Juguetes">Juguetes</option>
                        <option value="Otros">Otros</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label for="puntos_compra" class="block text-gray-700 font-semibold mb-2">Puntos de Compra</label>
                    <input type="number" id="puntos_compra" name="puntos_compra" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Agregar Producto
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>