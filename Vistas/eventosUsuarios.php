<main class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100">
    <section class=" pt-32 pb-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Eventos del Mes</h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">Descubre los eventos exclusivos que tenemos preparados para ti este mes</p>
            </div>

            <?php if (empty($eventos)): ?>
                <div class="bg-white rounded-2xl shadow-sm p-8 text-center col-span-full">
                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3 class="mt-4 text-xl font-medium text-gray-900">No hay eventos programados</h3>
                    <p class="mt-2 text-gray-500">Revisa más tarde o contáctanos para más información.</p>
                    <div class="mt-6">
                        <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                            </svg>
                            Contactar
                        </a>
                    </div>
                </div>
            <?php else: ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    <?php foreach ($eventos as $evento): ?>
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 flex flex-col h-full">
                            <div class="p-6 flex-grow">
                                <div class="flex justify-between items-start mb-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-blue-100 text-blue-800">
                                        <?php echo htmlspecialchars($evento['tipo_evento']); ?>
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-gray-100 text-gray-800">
                                        <?php echo date("d M", strtotime($evento['fecha_evento'])); ?>
                                    </span>
                                </div>
                                
                                <h3 class="text-xl font-bold text-gray-900 mb-3"><?php echo htmlspecialchars($evento['nombre_evento']); ?></h3>
                                
                                <div class="space-y-3 text-gray-600 mb-6">
                                    <div class="flex items-start">
                                        <svg class="flex-shrink-0 h-5 w-5 text-blue-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2">
                                            <?php echo date("l, d F Y", strtotime($evento['fecha_evento'])); ?>
                                        </span>
                                    </div>
                                    
                                    <?php if (!empty($evento['premio'])): ?>
                                    <div class="flex items-start">
                                        <svg class="flex-shrink-0 h-5 w-5 text-blue-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6.267 3.455a3.066 3.066 0 001.745-.723 3.066 3.066 0 013.976 0 3.066 3.066 0 001.745.723 3.066 3.066 0 012.812 2.812c.051.643.304 1.254.723 1.745a3.066 3.066 0 010 3.976 3.066 3.066 0 00-.723 1.745 3.066 3.066 0 01-2.812 2.812 3.066 3.066 0 00-1.745.723 3.066 3.066 0 01-3.976 0 3.066 3.066 0 00-1.745-.723 3.066 3.066 0 01-2.812-2.812 3.066 3.066 0 00-.723-1.745 3.066 3.066 0 010-3.976 3.066 3.066 0 00.723-1.745 3.066 3.066 0 012.812-2.812zm7.44 5.252a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2">
                                            <span class="font-medium">Premio:</span> <?php echo htmlspecialchars($evento['premio']); ?>
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($evento['patrocinadores'])): ?>
                                    <div class="flex items-start">
                                        <svg class="flex-shrink-0 h-5 w-5 text-blue-500 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v1h8v-1zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-1a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v1h-3zM4.75 12.094A5.973 5.973 0 004 15v1H1v-1a3 3 0 013.75-2.906z" />
                                        </svg>
                                        <span class="ml-2">
                                            <span class="font-medium">Patrocinadores:</span> <?php echo htmlspecialchars($evento['patrocinadores']); ?>
                                        </span>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            
                            <div class="px-6 pb-6">
                                <a href="index.php?action=inscribir&id_evento=<?php echo $evento['id_evento']; ?>" class="w-full flex items-center justify-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300">
                                    Inscríbete ahora
                                    <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>