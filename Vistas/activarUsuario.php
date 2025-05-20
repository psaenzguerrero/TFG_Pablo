<main class="min-h-screen bg-gray-100 flex items-center justify-center">
    <section class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <form action="index.php?action=activarUsuario" method="post" class="space-y-6">
            <div>
                <label for="id_usuario" class="block text-sm font-medium text-gray-700">Seleccione un usuario:</label>
                <select name="id_usuario" id="id_usuario" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    <?php foreach ($usuarios as $usuario): ?>
                        <option value="<?= $usuario[0] ?>"><?= $usuario[1] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="DNI" class="block text-sm font-medium text-gray-700">Meta su DNI:</label>
                <input type="text" name="DNI" id="DNI" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
            </div>
            <div>
                <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Registrarse
                </button>
            </div>
        </form>
    </section>
</main>