
<main>
    <section class="pt-50">
        <h1><?php echo htmlspecialchars($productoData['id_producto'] ); ?></h1>
        <h2 class="text-lg font-semibold text-gray-800"><?php echo htmlspecialchars($productoData['nombre_producto']); ?></h2>
        <form action="index.php?action=agregarAlCarrito" method="post">
            <input type="hidden" name="id_producto" value="<?php echo htmlspecialchars($productoData['id_producto'] ); ?>">
            <button type="submit">Añadir al carrito</button>
        </form>
    </section>
</main>