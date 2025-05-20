<main>
    <?php 
        if (isset($_SESSION["tipo_usuario"])) {
            $tipo = $_SESSION["tipo_usuario"];
            if (strcmp($tipo, "Admin") == 0) {   
    ?>
                <section class="pt-12">
                    <h1 class="text-2xl font-bold mb-6">Reservar Equipo</h1>
                    <?php if (isset($error)): ?>
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reservarEquipoAdmin" class="space-y-6">
                        <div class="form-group">
                            <label for="usuario" class="block text-sm font-medium text-gray-700">Usuario:</label>
                            <select id="usuario" name="id_usuario" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <option selected disabled>SELECCIONA USUARIO</option>
                                <?php if (isset($usuarios) && is_array($usuarios)): ?>
                                    <?php foreach ($usuarios as $usuario): ?>
                                        <option value="<?php echo $usuario[0]; ?>"
                                            <?php if(isset($_GET['usuario'])){ echo (($_GET['usuario'] == $usuario[0]) ?  'selected' : '');} ?> ><?php echo $usuario[1]; ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="fecha_reserva" class="block text-sm font-medium text-gray-700">Fecha de Reserva:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?php echo $fecha_seleccionada; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="equipo" class="block text-sm font-medium text-gray-700">Equipo:</label>
                            <select id="equipo" name="id_equipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <?php if (isset($equipos) && is_array($equipos)): ?>
                                    <?php foreach ($equipos as $equipo): ?>
                                        <option value="<?php echo $equipo['id_equipo']; ?>"  <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> ><?php echo $equipo['nombre_equipo']; ?>  </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="periodo" class="block text-sm font-medium text-gray-700">Periodo:</label>
                            <select id="periodo" name="periodo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <?php
                                $periodos = ["periodo1", "periodo2", "periodo3", "periodo4", "periodo5", "periodo6", "periodo7", "periodo8", "periodo9", "periodo10"];
                                foreach ($periodos as $periodo) {
                                    $ocupado = isset($periodos_ocupados) && in_array($periodo, $periodos_ocupados);
                                    $color = $ocupado ? "text-red-500" : "text-green-500";
                                    echo "<option value='$periodo' class='$color' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group flex items-center">
                            <input type="checkbox" id="snack" name="snack" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="snack" class="ml-2 block text-sm text-gray-700">Incluir Snack</label>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Reservar</button>
                    </form>

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
                
                <section class="mt-12">
                    <h2 class="text-xl font-bold mb-4">Ver Reservas</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full border-collapse border border-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">ID Usuario</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">ID Equipo</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Fecha Reserva</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Periodo</th>
                                    <th class="border border-gray-300 px-4 py-2 text-left text-sm font-medium text-gray-700">Snack</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <?php if (isset($reservas) && is_array($reservas)): ?>
                                    <?php foreach ($reservas as $reserva): ?>
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700"><?php echo $reserva[0]; ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700"><?php echo $reserva[1]; ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700"><?php echo $reserva[2]; ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700"><?php echo $reserva[3]; ?></td>
                                            <td class="border border-gray-300 px-4 py-2 text-sm text-gray-700"><?php echo $reserva[4] ? 'Sí' : 'No'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="border border-gray-300 px-4 py-2 text-sm text-gray-700 text-center">No hay reservas disponibles.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </section>
    <?php
            }elseif (strcmp($tipo, "Vip") == 0) {
    ?>
                <section class="pt-13 px-4 sm:px-6 lg:px-8">
                    <h1 class="text-2xl font-bold mb-6 text-center sm:text-left">Reservar Equipo</h1>
                    <?php if (isset($error)): ?>
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reservarEquipoAdmin" class="space-y-6 max-w-lg mx-auto sm:mx-0">
                        <div class="form-group">
                            <label for="fecha_reserva" class="block text-sm font-medium text-gray-700">Fecha de Reserva:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?php echo $fecha_seleccionada; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="equipo" class="block text-sm font-medium text-gray-700">Equipo:</label>
                            <select id="equipo" name="id_equipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <?php if (isset($equipos) && is_array($equipos)): ?>
                                    <?php foreach ($equipos as $equipo): ?>
                                        <option value="<?php echo $equipo['id_equipo']; ?>" <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> ><?php echo $equipo['nombre_equipo']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="periodo" class="block text-sm font-medium text-gray-700">Periodo:</label>
                            <select id="periodo" name="periodo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <?php
                                $periodos = ["periodo1", "periodo2", "periodo3", "periodo4", "periodo5", "periodo6", "periodo7", "periodo8", "periodo9", "periodo10"];
                                foreach ($periodos as $periodo) {
                                    $ocupado = isset($periodos_ocupados) && in_array($periodo, $periodos_ocupados);
                                    $color = $ocupado ? "text-red-500" : "text-green-500";
                                    echo "<option value='$periodo' class='$color' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group flex items-center">
                            <input type="checkbox" id="snack" name="snack" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="snack" class="ml-2 block text-sm text-gray-700">Incluir Snack</label>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Reservar</button>
                    </form>

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
                
            }elseif (strcmp($tipo, "Normal") == 0) {
    ?>
                <section class="pt-12">
                    <h1 class="text-2xl font-bold mb-6">Reservar Equipo</h1>
                    <?php if (isset($error)): ?>
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reservarEquipoAdmin" class="space-y-6">
                        <div class="form-group">
                            <label for="fecha_reserva" class="block text-sm font-medium text-gray-700">Fecha de Reserva:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="<?php echo $fecha_seleccionada; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="equipo" class="block text-sm font-medium text-gray-700">Equipo:</label>
                            <select id="equipo" name="id_equipo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <?php if (isset($equipos) && is_array($equipos)): ?>
                                    <?php foreach ($equipos as $equipo): ?>
                                        <option value="<?php echo $equipo['id_equipo']; ?>" <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> ><?php echo $equipo['nombre_equipo']; ?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="periodo" class="block text-sm font-medium text-gray-700">Periodo:</label>
                            <select id="periodo" name="periodo" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required>
                                <?php
                                $periodos = ["periodo1", "periodo2", "periodo3", "periodo4", "periodo5", "periodo6", "periodo7", "periodo8", "periodo9", "periodo10"];
                                foreach ($periodos as $periodo) {
                                    $ocupado = isset($periodos_ocupados) && in_array($periodo, $periodos_ocupados);
                                    $color = $ocupado ? "text-red-500" : "text-green-500";
                                    echo "<option value='$periodo' class='$color' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group flex items-center">
                            <input type="checkbox" id="snack" name="snack" class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                            <label for="snack" class="ml-2 block text-sm text-gray-700">Incluir Snack</label>
                        </div>

                        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Reservar</button>
                    </form>

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
    ?>

    <?php
        }
    ?>
</main>