<main class="min-h-screen bg-gradient-to-r from-blue-500 to-purple-600 flex items-center justify-center">
    <?php
        if (isset($_REQUEST["action"])) {
            $action = strtolower($_REQUEST["action"]);
            if (strcmp($action, "registroadmin") == 0) {
    ?>
            <section class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-md transform transition duration-500 hover:scale-105">
                <form action="index.php?action=registroAdmin" method="post" class="space-y-6">
                    <?php if(isset($error)): ?>
                        <p class="text-red-500 text-sm font-semibold"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>

                    <div>
                        <label for="nombre_usuario" class="block text-gray-700 text-sm font-bold mb-2">Nombre de Usuario:</label>
                        <input type="text" name="nombre_usuario" value="<?php echo isset($_POST["nombre_usuario"]) ? htmlspecialchars($_POST["nombre_usuario"]) : (isset($_COOKIE["nombre_usuario"]) ? htmlspecialchars($_COOKIE["nombre_usuario"]) : ''); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div>
                        <label for="pass_usuario" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                        <input type="password" name="pass_usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div>
                        <label for="pass_usuario2" class="block text-gray-700 text-sm font-bold mb-2">Repita su Contraseña:</label>
                        <input type="password" name="pass_usuario2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div>
                        <label for="DNI" class="block text-gray-700 text-sm font-bold mb-2">Meta su DNI:</label>
                        <input type="text" name="DNI" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="recuerdame" value="1" class="mr-2">
                        <label for="recuerdame" class="text-gray-700 text-sm">Recuérdame</label>
                    </div>

                    <div>
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-purple-600 hover:to-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-purple-500 w-full transform transition duration-300 hover:scale-105">
                            Registrarse
                        </button>
                    </div>
                </form>
            </section>
    <?php
            } else {
    ?>
            <section class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4 w-full max-w-md transform transition duration-500 hover:scale-105">
                <form action="index.php?action=registro" method="post" class="space-y-6">
                    <?php if(isset($error)): ?>
                        <p class="text-red-500 text-sm font-semibold"><?php echo htmlspecialchars($error); ?></p>
                    <?php endif; ?>

                    <div>
                        <label for="nombre_usuario" class="block text-gray-700 text-sm font-bold mb-2">Nombre de Usuario:</label>
                        <input type="text" name="nombre_usuario" value="<?php echo isset($_POST["nombre_usuario"]) ? htmlspecialchars($_POST["nombre_usuario"]) : (isset($_COOKIE["nombre_usuario"]) ? htmlspecialchars($_COOKIE["nombre_usuario"]) : ''); ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div>
                        <label for="pass_usuario" class="block text-gray-700 text-sm font-bold mb-2">Contraseña:</label>
                        <input type="password" name="pass_usuario" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div>
                        <label for="pass_usuario2" class="block text-gray-700 text-sm font-bold mb-2">Repita su Contraseña:</label>
                        <input type="password" name="pass_usuario2" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-500 focus:shadow-outline" required>
                    </div>

                    <div class="flex items-center">
                        <input type="checkbox" name="recuerdame" value="1" class="mr-2">
                        <label for="recuerdame" class="text-gray-700 text-sm">Recuérdame</label>
                    </div>

                    <div>
                        <button type="submit" class="bg-gradient-to-r from-blue-500 to-purple-600 hover:from-purple-600 hover:to-blue-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:ring-2 focus:ring-purple-500 w-full transform transition duration-300 hover:scale-105">
                            Registrarse
                        </button>
                    </div>
                </form>
            </section>
    <?php
            }
        }
    ?>
</main>
