<main class="min-h-screen bg-gray-50 p-6">
    <?php
        if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
    ?>
        <section class="max-w-4xl mx-auto pt-30">
            <h1 class="text-3xl font-bold text-gray-800 mb-8">Panel de Administración</h1>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Tarjeta de Eventos -->
                <a href="index.php?action=eventos" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-blue-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <h2 class="ml-3 text-xl font-semibold text-gray-800">Gestión de Eventos</h2>
                        </div>
                        <p class="text-gray-600">Administra todos los eventos del sistema</p>
                    </div>
                </a>

                <!-- Tarjeta de Nuevo Usuario -->
                <a href="index.php?action=registroAdmin" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-green-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                                </svg>
                            </div>
                            <h2 class="ml-3 text-xl font-semibold text-gray-800">Añadir Usuario</h2>
                        </div>
                        <p class="text-gray-600">Registra nuevos usuarios en el sistema</p>
                    </div>
                </a>

                <!-- Tarjeta de Activar Usuario -->
                <a href="index.php?action=activarUsuario" class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="bg-purple-100 p-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                            </div>
                            <h2 class="ml-3 text-xl font-semibold text-gray-800">Activar Usuarios</h2>
                        </div>
                        <p class="text-gray-600">Activa o desactiva cuentas de usuario</p>
                    </div>
                </a>
            </div>

            <!-- Sección de estadísticas -->
            <div class="mt-12 bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Resumen del Sistema</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-blue-50 p-4 rounded-lg">
                        <p class="text-sm text-blue-600 font-medium">Usuarios Activos</p>
                        <p class="text-2xl font-bold text-gray-800">125</p>
                    </div>
                    <div class="bg-green-50 p-4 rounded-lg">
                        <p class="text-sm text-green-600 font-medium">Eventos Activos</p>
                        <p class="text-2xl font-bold text-gray-800">42</p>
                    </div>
                    <div class="bg-purple-50 p-4 rounded-lg">
                        <p class="text-sm text-purple-600 font-medium">Pendientes</p>
                        <p class="text-2xl font-bold text-gray-800">8</p>
                    </div>
                </div>
            </div>
        </section>
    <?php
        } else {
            header("Location: index.php?action=inicio");
        }
    ?>
</main>