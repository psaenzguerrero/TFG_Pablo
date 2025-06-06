<?php
// Verificación de seguridad adicional
if (strcmp($_SESSION["tipo_usuario"], "Normal") == 0 || strcmp($_SESSION["tipo_usuario"], "Vip") == 0) {
    ?>
        <main class="max-w-7xl mx-auto px-4 py-60 sm:px-6 lg:px-8">
            <section class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="flex flex-col md:flex-row items-center p-6">
                    <!-- Foto de perfil -->
                    <div class="w-32 h-32 md:w-40 md:h-40 mb-4 md:mb-0 md:mr-6 rounded-full overflow-hidden border-4 border-indigo-100 shadow-sm">
                        <img src="<?php echo($perfiles['foto']); ?>" alt="Foto de perfil" class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Información principal -->
                    <div class="flex-1 text-center md:text-left">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-2">
                            <?php echo($perfiles['nombre_usuario']); ?>
                        </h1>
                        
                        <div class="flex flex-col sm:flex-row sm:items-center justify-center md:justify-start space-y-2 sm:space-y-0 sm:space-x-4">
                            <!-- Tipo de usuario -->
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-indigo-100 text-indigo-800">
                                <?php echo($perfiles['tipo_usuario']); ?>
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                </svg>
                                <?php echo($perfiles['puntos_usuario']); ?> puntos
                            </span>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    <?php
}elseif (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
    ?>
        <main class="bg-gray-100 min-h-screen p-6">
            <section class="container mx-auto py-40">
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-semibold text-gray-800">Gestión de Perfiles de Usuario</h2>
                        <p class="text-gray-600 mt-1">Listado de todos los usuarios registrados</p>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Puntos</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tipo</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <?php foreach ($usuarios as $perfil): ?>
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo htmlspecialchars($perfil['id_usuario'] ?? 'N/A'); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <?php if(!empty($perfil['foto'])): ?>
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full" src="<?php echo htmlspecialchars($perfil['foto']); ?>" alt="Foto de perfil">
                                            </div>
                                            <?php endif; ?>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    <?php echo htmlspecialchars($perfil['nombre_usuario'] ?? 'Nombre no disponible'); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <?php echo htmlspecialchars($perfil['puntos_usuario'] ?? '0'); ?>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            <?php echo $perfil['tipo_usuario'] == 'Premium' ? 'bg-yellow-100 text-yellow-800' : 'bg-blue-100 text-blue-800'; ?>">
                                            <?php echo htmlspecialchars($perfil['tipo_usuario'] ?? 'Standard'); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="editar_usuario.php?id=<?php echo $perfil['id_usuario']; ?>" class="text-indigo-600 hover:text-indigo-900 mr-3">Editar</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="px-6 py-4 border-t border-gray-200 flex justify-between items-center">
                        <div class="text-sm text-gray-500">
                            Mostrando <span class="font-medium"><?php echo count($usuarios); ?></span> resultados
                        </div>
                        <div class="space-x-2">
                            <button class="px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Anterior</button>
                            <button class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Siguiente</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
<?php
}
?>


            
    