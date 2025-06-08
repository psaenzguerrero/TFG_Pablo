<main class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 p-4 md:p-8 pt-20">
    <?php 
        if (isset($_SESSION["tipo_usuario"])) {
            $tipo = $_SESSION["tipo_usuario"];
            if (strcmp($tipo, "Admin") == 0) {   
    ?>
                <section class="max-w-6xl mx-auto pt-20">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mb-8">
                        <h1 class="text-3xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Reservar Equipo</h1>
                        <?php if (isset($error)): ?>
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700"><?php echo $error; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="index.php?action=reservarEquipoAdmin" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="usuario" class="block text-sm font-medium text-gray-700 mb-1">Usuario</label>
                                    <select id="usuario" name="id_usuario" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <option selected disabled class="text-gray-400">Selecciona un usuario</option>

                                        <?php if (isset($usuarios) && is_array($usuarios)): ?>
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <option value="<?php echo $usuario[0]; ?>"
                                                    <?php if(isset($_GET['usuario'])){ echo (($_GET['usuario'] == $usuario[0]) ?  'selected' : '');} ?> 
                                                    class="text-gray-900">
                                                    <?php echo $usuario[1]; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        
                                    </select>
                                </div>

                                <div>
                                    <label for="fecha_reserva" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Reserva</label>
                                    <input type="date" id="fecha_reserva" name="fecha_reserva" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="<?php echo $fecha_seleccionada; ?>" required>
                                </div>

                                <div>
                                    <label for="equipo" class="block text-sm font-medium text-gray-700 mb-1">Equipo</label>
                                    <select id="equipo" name="id_equipo" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        
                                        <?php if (isset($equipos) && is_array($equipos)): ?>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?php echo $equipo['id_equipo']; ?>"  <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> class="text-gray-900">
                                                    <?php echo $equipo['nombre_equipo']; ?>  
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>

                                    </select>
                                </div>

                                <div>
                                    <label for="periodo" class="block text-sm font-medium text-gray-700 mb-1">Periodo</label>
                                    <select id="periodo" name="periodo" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <?php
                                        $periodos = ["Periodo 1", "Periodo 2", "Periodo 3", "Periodo 4", "Periodo 5", "Periodo 6", "Periodo 7", "Periodo 8", "Periodo 9", "Periodo 10"];
                                        foreach ($periodos as $periodo) {
                                            $periodo_value = strtolower(str_replace(' ', '', $periodo));
                                            $ocupado = isset($periodos_ocupados) && in_array($periodo_value, $periodos_ocupados);
                                            $color = $ocupado ? "text-red-600" : "text-green-600";
                                            echo "<option value='$periodo_value' class='$color' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="snack" name="snack" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="snack" class="ml-2 text-sm font-medium text-gray-700">Incluir Snack (+$5.00)</label>
                            </div>

                            <button type="submit" class="w-full md:w-auto px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Reservar Equipo
                            </button>
                        </form>
                    </div>

                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6 mt-8">
                        <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Reservas Existentes</h2>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Usuario</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Equipo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Periodo</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Snack</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <?php if (isset($reservas) && is_array($reservas)): ?>
                                        <?php foreach ($reservas as $reserva): ?>
                                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"><?php echo $reserva[0]; ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $reserva[1]; ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo $reserva[2]; ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500"><?php echo ucfirst(str_replace('periodo', 'Periodo ', $reserva[3])); ?></td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    <?php if ($reserva[4]): ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Sí</span>
                                                    <?php else: ?>
                                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">No</span>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">No hay reservas registradas</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <script>
                        document.getElementById("fecha_reserva").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&usuario=" + usuario.value + "&fecha=" + this.value + "&equipo=" + equipo.value;
                        });
                        document.getElementById("equipo").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&usuario=" + usuario.value + "&fecha=" + fecha_reserva.value + "&equipo=" + this.value;
                        });
                        document.getElementById("usuario").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&usuario=" + this.value + "&fecha=" + fecha_reserva.value + "&equipo=" + equipo.value;
                        });
                    </script>
                </section>
                
    <?php
            } elseif (strcmp($tipo, "Vip") == 0) {
    ?>
                <section class="max-w-2xl mx-auto pt-40">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Reservar Equipo</h1>
                        <?php if (isset($error)): ?>
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700"><?php echo $error; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="index.php?action=reservarEquipoAdmin" class="space-y-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="fecha_reserva" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Reserva</label>
                                    <input type="date" id="fecha_reserva" name="fecha_reserva" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="<?php echo $fecha_seleccionada; ?>" required>
                                </div>

                                <div>
                                    <label for="equipo" class="block text-sm font-medium text-gray-700 mb-1">Equipo</label>
                                    <select id="equipo" name="id_equipo" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <?php if (isset($equipos) && is_array($equipos)): ?>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?php echo $equipo['id_equipo']; ?>" <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> class="text-gray-900">
                                                    <?php echo $equipo['nombre_equipo']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div>
                                    <label for="periodo" class="block text-sm font-medium text-gray-700 mb-1">Periodo</label>
                                    <select id="periodo" name="periodo" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <?php
                                        $periodos = ["Periodo 1", "Periodo 2", "Periodo 3", "Periodo 4", "Periodo 5", "Periodo 6", "Periodo 7", "Periodo 8", "Periodo 9", "Periodo 10"];
                                        foreach ($periodos as $periodo) {
                                            $periodo_value = strtolower(str_replace(' ', '', $periodo));
                                            $ocupado = isset($periodos_ocupados) && in_array($periodo_value, $periodos_ocupados);
                                            $color = $ocupado ? "text-red-600" : "text-green-600";
                                            echo "<option value='$periodo_value' class='$color' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="snack" name="snack" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="snack" class="ml-2 text-sm font-medium text-gray-700">Incluir Snack (+$5.00)</label>
                            </div>

                            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Reservar Equipo
                            </button>
                        </form>
                    </div>

                    <script>
                        document.getElementById("fecha_reserva").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&fecha=" + this.value + "&equipo=" + equipo.value;
                        });
                        document.getElementById("equipo").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&fecha=" + fecha_reserva.value + "&equipo=" + this.value;
                        });
                    </script>
                </section>
    <?php
            } elseif (strcmp($tipo, "Normal") == 0) {
    ?>
                <section class="max-w-2xl mx-auto pt-40">
                    <div class="bg-white rounded-xl shadow-md overflow-hidden p-6">
                        <h1 class="text-3xl font-bold text-gray-800 mb-6 pb-2 border-b border-gray-200">Reservar Equipo</h1>

                        <?php if (isset($error)): ?>
                            <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-red-700"><?php echo $error; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="index.php?action=reservarEquipoAdmin" class="space-y-6">
                            <div class="space-y-4">
                                <div>
                                    <label for="fecha_reserva" class="block text-sm font-medium text-gray-700 mb-1">Fecha de Reserva</label>
                                    <input type="date" id="fecha_reserva" name="fecha_reserva" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" value="<?php echo $fecha_seleccionada; ?>" required>
                                </div>

                                <div>
                                    <label for="equipo" class="block text-sm font-medium text-gray-700 mb-1">Equipo</label>
                                    <select id="equipo" name="id_equipo" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <?php if (isset($equipos) && is_array($equipos)): ?>
                                            <?php foreach ($equipos as $equipo): ?>
                                                <option value="<?php echo $equipo['id_equipo']; ?>" <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> class="text-gray-900">
                                                    <?php echo $equipo['nombre_equipo']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div>
                                    <label for="periodo" class="block text-sm font-medium text-gray-700 mb-1">Periodo</label>
                                    <select id="periodo" name="periodo" class="block w-full px-4 py-2.5 text-base text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                                        <?php
                                        $periodos = ["Periodo 1", "Periodo 2", "Periodo 3", "Periodo 4", "Periodo 5", "Periodo 6", "Periodo 7", "Periodo 8", "Periodo 9", "Periodo 10"];
                                        foreach ($periodos as $periodo) {
                                            $periodo_value = strtolower(str_replace(' ', '', $periodo));
                                            $ocupado = isset($periodos_ocupados) && in_array($periodo_value, $periodos_ocupados);
                                            $color = $ocupado ? "text-red-600" : "text-green-600";
                                            echo "<option value='$periodo_value' class='$color' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="flex items-center">
                                <input type="checkbox" id="snack" name="snack" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                <label for="snack" class="ml-2 text-sm font-medium text-gray-700">Incluir Snack (+$5.00)</label>
                            </div>

                            <button type="submit" class="w-full px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 hover:from-purple-600 hover:to-pink-600 text-white font-medium rounded-lg shadow-sm hover:shadow-md transition duration-150 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                Reservar Equipo
                            </button>
                        </form>
                    </div>

                    <script>
                        document.getElementById("fecha_reserva").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&fecha=" + this.value + "&equipo=" + equipo.value;
                        });
                        document.getElementById("equipo").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&fecha=" + fecha_reserva.value + "&equipo=" + this.value;
                        });
                    </script>
                </section>
    <?php
            }
        }
    ?>
</main>