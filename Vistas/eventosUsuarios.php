<main>
    <section class="pt-12 bg-gray-50">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-4xl font-bold text-center text-gray-800 mb-12">Eventos del Mes</h1>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if (empty($eventos)): ?>
                    <p class="text-gray-600 text-center col-span-full">No hay eventos para este mes.</p>
                <?php else: ?>
                    <?php foreach ($eventos as $evento): ?>
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden transform hover:scale-105 transition-transform duration-300">
                            <div class="p-6">
                                <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full mb-4">
                                    <?php echo htmlspecialchars($evento['tipo_evento']); ?>
                                </span>
                                <h2 class="text-2xl font-bold text-gray-800 mb-2">
                                    <?php echo htmlspecialchars($evento['nombre_evento']); ?>
                                </h2>
                                <p class="text-gray-600 mb-4">
                                    <span class="font-semibold">Fecha:</span>
                                    <?php echo date("d/m/Y", strtotime($evento['fecha_evento'])); ?>
                                </p>
                                <p class="text-gray-600 mb-4">
                                    <span class="font-semibold">Premio:</span>
                                    <?php echo htmlspecialchars($evento['premio']); ?>
                                </p>
                                <p class="text-gray-600 mb-4">
                                    <span class="font-semibold">Patrocinadores:</span>
                                    <?php echo htmlspecialchars($evento['patrocinadores']); ?>
                                </p>
                                <div class="mt-6">
                                    <a href="index.php?action=inscribir&id_evento=<?php echo $evento['id_evento']; ?>"
                                       class="inline-block w-full text-center bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                                        ¡Inscríbete!
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>