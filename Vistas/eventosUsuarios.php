<main>
    <section class="pt-50">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold mb-6">Eventos del Mes</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php if (empty($eventos)): ?>
                    <p class="text-gray-600">No hay eventos para este mes.</p>
                <?php else: ?>
                    <?php foreach ($eventos as $evento): ?>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h2 class="text-xl font-semibold mb-2"><?php echo htmlspecialchars($evento['nombre_evento']); ?></h2>
                            <p class="text-gray-600 mb-2"><?php echo htmlspecialchars($evento['tipo_evento']); ?></p>
                            <p class="text-gray-600 mb-2">Fecha: <?php echo date("d/m/Y", strtotime($evento['fecha_evento'])); ?></p>
                            <p class="text-gray-600 mb-2">Premio: <?php echo htmlspecialchars($evento['premio']); ?></p>
                            <p class="text-gray-600 mb-2">Patrocinadores: <?php echo htmlspecialchars($evento['patrocinadores']); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>