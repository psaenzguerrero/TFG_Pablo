<main class="min-h-screen bg-gradient-to-br from-purple-100 to-indigo-200 flex items-center justify-center p-4">
    <section id="login" class="w-full max-w-md bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden p-8 transform transition-all hover:scale-[1.01] hover:shadow-2xl">
        <!-- Decoración artística -->
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-pink-300/30 rounded-full filter blur-xl"></div>
        <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-indigo-300/30 rounded-full filter blur-xl"></div>
        
        <div class="relative z-10">
            <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-purple-600 to-pink-500 mb-6 text-center font-serif tracking-wide">
                INICIAR SESIÓN
            </h1>
            
            <?php if (isset($error)): ?>
                <p class="text-pink-600 mb-4 text-center font-medium animate-pulse"><?php echo $error; ?></p>
            <?php endif; ?>
            
            <form method="POST" action="index.php?action=login" class="space-y-5">
                <div class="group">
                    <label for="nombre_usuario" class="block text-sm font-medium text-gray-600 mb-1 ml-1 group-focus-within:text-purple-600 transition-colors">
                        Nombre de Usuario
                    </label>
                    <input 
                        type="text" 
                        name="nombre_usuario" 
                        class="w-full px-4 py-3 border-0 bg-gray-50/70 rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white shadow-sm transition-all duration-300"
                        <?php if(isset($_COOKIE["nombre_usuario"])) echo 'value='.$_COOKIE["nombre_usuario"].''; ?> 
                        required>
                </div>
                
                <div class="group">
                    <label for="pass_usuario" class="block text-sm font-medium text-gray-600 mb-1 ml-1 group-focus-within:text-purple-600 transition-colors">
                        Contraseña
                    </label>
                    <input 
                        type="password" 
                        name="pass_usuario" 
                        class="w-full px-4 py-3 border-0 bg-gray-50/70 rounded-xl focus:ring-2 focus:ring-purple-500 focus:bg-white shadow-sm transition-all duration-300" 
                        required>
                </div>
                
                <div class="flex items-center pl-1">
                    <div class="flex items-center h-5">
                        <input 
                            type="checkbox" 
                            name="recuerdame" 
                            value="1"
                            class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded transition-all checked:scale-110">
                    </div>
                    <label for="recuerdame" class="ml-2 block text-sm text-gray-600 hover:text-purple-600 cursor-pointer transition-colors">
                        Recuérdame
                    </label>
                </div>
                
                <button 
                    type="submit" 
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium py-3 px-4 rounded-xl shadow-lg hover:shadow-purple-200 transition-all duration-300 transform hover:-translate-y-0.5 active:translate-y-0">
                    <span class="drop-shadow-md">Ingresar</span>
                </button>
            </form>
            
            <div class="mt-6 text-center">
                <a href="#" class="text-sm font-medium text-gray-500 hover:text-purple-600 hover:underline transition-colors inline-flex items-center">
                    ¿No tienes cuenta? 
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
</main>