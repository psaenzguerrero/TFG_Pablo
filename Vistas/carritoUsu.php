<main>
    <section class="pt-50">   
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold mb-4">Tu Carrito de Compras</h1>
            <?php if (empty($carrito)): ?>
                <p>No hay productos en tu carrito.</p>
            <?php else: ?>
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th class="py-2">Producto</th>
                            <th class="py-2">Precio</th>
                            <th class="py-2">Fecha de Compra</th>
                            <th class="py-2">Cantidad</th>
                            <th class="py-2">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($carritos as $carrito): ?>
                            <tr>
                                <td class="border px-4 py-2"><?php echo $carrito['nombre_producto']; ?></td>
                                <td class="border px-4 py-2"><?php echo $carrito['precio_producto']; ?></td>
                                <td class="border px-4 py-2"><?php echo $carrito['fecha_compra']; ?></td>
                                <td class="border px-4 py-2"><?php echo $carrito['cantidad']; ?></td>
                                <td class="border px-4 py-2">
                                    <form action="index.php?action=eliminarDelCarrito" method="POST">
                                        <input type="hidden" name="id_producto" value="<?php echo $carrito['id_producto']; ?>">
                                        <input type="hidden" name="cantidad" value="<?php echo $carrito['cantidad']; ?>">
                                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="index.php?action=compraDelCarrito" method="POST" class="pt-20">
                    <button type="submit">Comprar Todo</button>
                </form>
            <?php endif; ?>
        </div>
    </section>
</main>