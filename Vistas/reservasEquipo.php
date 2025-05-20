<main class="bg-gray-100 min-h-screen p-8 pt-20">
    <?php 
        if (isset($_SESSION["tipo_usuario"])) {
            $tipo = $_SESSION["tipo_usuario"];
            if (strcmp($tipo, "Admin") == 0) {   
    ?>
                <section class="pt-10">
                    <h1 class="text-3xl font-bold text-center text-blue-600 mb-6 animate-fadeIn">Reservar Equipo</h1>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reservarEquipoAdmin" class="bg-white p-6 rounded shadow-md max-w-lg mx-auto animate-slideIn">
                        <div class="form-group mb-4">
                            <label for="usuario" class="block text-gray-700 font-medium mb-2">Usuario:</label>
                            <select id="usuario" name="id_usuario" class="form-control w-full border-gray-300 rounded p-2" required>
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

                        <div class="form-group mb-4">
                            <label for="fecha_reserva" class="block text-gray-700 font-medium mb-2">Fecha de Reserva:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="form-control w-full border-gray-300 rounded p-2" value="<?php echo $fecha_seleccionada; ?>" required>
                        </div>

                        <div class="form-group mb-4">
                            <label for="equipo" class="block text-gray-700 font-medium mb-2">Equipo:</label>
                            <select id="equipo" name="id_equipo" class="form-control w-full border-gray-300 rounded p-2" required>
                                <?php if (isset($equipos) && is_array($equipos)): ?>
                                    <?php foreach ($equipos as $equipo): ?>
                                        <option value="<?php echo $equipo['id_equipo']; ?>"  <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> ><?php echo $equipo['nombre_equipo']; ?>  </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="periodo" class="block text-gray-700 font-medium mb-2">Periodo:</label>
                            <select id="periodo" name="periodo" class="form-control w-full border-gray-300 rounded p-2" required>
                                <?php
                                $periodos = ["periodo1", "periodo2", "periodo3", "periodo4", "periodo5", "periodo6", "periodo7", "periodo8", "periodo9", "periodo10"];
                                foreach ($periodos as $periodo) {
                                    $ocupado = isset($periodos_ocupados) && in_array($periodo, $periodos_ocupados);
                                    $color = $ocupado ? "red" : "green";
                                    echo "<option value='$periodo' style='color: $color;' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group mb-4">
                            <label for="snack" class="block text-gray-700 font-medium mb-2">Incluir Snack:</label>
                            <input type="checkbox" id="snack" name="snack" class="form-checkbox h-5 w-5 text-blue-600">
                        </div>

                        <button type="submit" class="btn btn-primary bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition duration-300">Reservar</button>
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
                
                <section class="mt-10">
                    <h2 class="text-2xl font-bold text-center text-gray-700 mb-6 animate-fadeIn">Ver Reservas</h2>
                    <table class="table-auto w-full bg-white shadow-md rounded overflow-hidden animate-slideIn">
                        <thead class="bg-blue-600 text-white">
                            <tr>
                                <th class="px-4 py-2">ID Usuario</th>
                                <th class="px-4 py-2">ID Equipo</th>
                                <th class="px-4 py-2">Fecha Reserva</th>
                                <th class="px-4 py-2">Periodo</th>
                                <th class="px-4 py-2">Snack</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($reservas) && is_array($reservas)): ?>
                                <?php foreach ($reservas as $reserva): ?>
                                    <tr class="hover:bg-gray-100 transition duration-200">
                                        <td class="border px-4 py-2"><?php echo $reserva[0]; ?></td>
                                        <td class="border px-4 py-2"><?php echo $reserva[1]; ?></td>
                                        <td class="border px-4 py-2"><?php echo $reserva[2]; ?></td>
                                        <td class="border px-4 py-2"><?php echo $reserva[3]; ?></td>
                                        <td class="border px-4 py-2"><?php echo $reserva[4] ? 'Sí' : 'No'; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="border px-4 py-2 text-center">No hay reservas disponibles.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </section>
    <?php
            }
        }
    ?>
</main>

<style>
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .animate-fadeIn {
        animation: fadeIn 1s ease-in-out;
    }

    .animate-slideIn {
        animation: slideIn 0.8s ease-in-out;
    }
</style>
