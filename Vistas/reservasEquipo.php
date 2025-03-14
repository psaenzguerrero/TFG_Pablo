<main>
    <?php 
        if (isset($_SESSION["tipo_usuario"])) {
            $tipo = $_SESSION["tipo_usuario"];
            if (strcmp($tipo, "Admin") == 0) {   
    ?>
                <section class="pt-50">
                    <h1>Reservar Equipo</h1>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reservarEquipoAdmin">
                        <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <select id="usuario" name="id_usuario" class="form-control" required>
                                <option  selected disabled>SELECCIONA USUARIO</option>
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
                            <label for="fecha_reserva">Fecha de Reserva:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="form-control" value="<?php echo $fecha_seleccionada; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="equipo">Equipo:</label>
                            <select id="equipo" name="id_equipo" class="form-control" required>
                                <?php if (isset($equipos) && is_array($equipos)): ?>
                                    <?php foreach ($equipos as $equipo): ?>
                                        <option value="<?php echo $equipo['id_equipo']; ?>"  <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> ><?php echo $equipo['nombre_equipo']; ?>  </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="periodo">Periodo:</label>
                            <select id="periodo" name="periodo" class="form-control" required>
                                <?php
                                // Definir los periodos disponibles
                                $periodos = ["periodo1", "periodo2", "periodo3", "periodo4", "periodo5", "periodo6", "periodo7", "periodo8", "periodo9", "periodo10"];

                                foreach ($periodos as $periodo) {
                                    // Verificar si el periodo está ocupado para el equipo seleccionado
                                    $ocupado = isset($periodos_ocupados) && in_array($periodo, $periodos_ocupados);
                                    $color = $ocupado ? "red" : "green";
                                    echo "<option value='$periodo' style='color: $color;' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="snack">Incluir Snack:</label>
                            <input type="checkbox" id="snack" name="snack">
                        </div>

                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </form>

                    <script>
                        // Actualizar la página cuando se cambie la fecha
                        document.getElementById("fecha_reserva").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&usuario=" + usuario.value + "&fecha=" + this.value + "&equipo=" + equipo.value;
                        });
                        // Actualizar la página cuando se cambie el equipo
                        document.getElementById("equipo").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&usuario=" + usuario.value + "&fecha=" + fecha_reserva.value + "&equipo=" + this.value;
                        });
                        // Actualizar la página cuando se cambie el usuario
                        document.getElementById("usuario").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&usuario=" + this.value + "&fecha=" + fecha_reserva.value + "&equipo=" + equipo.value;
                        });
                    </script>
                </section>
                
                <section>
                    <h2>Ver Reservas</h2>
                    <table border="1">
                        <tr>
                            <th>ID Usuario</th>
                            <th>ID Equipo</th>
                            <th>Fecha Reserva</th>
                            <th>Periodo</th>
                            <th>Snack</th>
                        </tr>
                        <?php if (isset($reservas) && is_array($reservas)): ?>
                            <?php foreach ($reservas as $reserva): ?>
                                <tr>
                                    <td><?php echo $reserva[0]; ?></td>
                                    <td><?php echo $reserva[1]; ?></td>
                                    <td><?php echo $reserva[2]; ?></td>
                                    <td><?php echo $reserva[3]; ?></td>
                                    <td><?php echo $reserva[4] ? 'Sí' : 'No'; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay reservas disponibles.</td>
                            </tr>
                        <?php endif; ?>
                    </table>
                </section>
    <?php
            }elseif (strcmp($tipo, "Vip") == 0) {
    ?>
                <section class="pt-50">
                    <h1>Reservar Equipo</h1>
                    <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form method="POST" action="index.php?action=reservarEquipoAdmin">
                        <div class="form-group">
                            <label for="fecha_reserva">Fecha de Reserva:</label>
                            <input type="date" id="fecha_reserva" name="fecha_reserva" class="form-control" value="<?php echo $fecha_seleccionada; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="equipo">Equipo:</label>
                            <select id="equipo" name="id_equipo" class="form-control" required>
                                <?php if (isset($equipos) && is_array($equipos)): ?>
                                    <?php foreach ($equipos as $equipo): ?>
                                        <option value="<?php echo $equipo['id_equipo']; ?>"  <?php if(isset($_GET['equipo'])){ echo (($_GET['equipo'] == $equipo['id_equipo']) ?  'selected' : '');} ?> ><?php echo $equipo['nombre_equipo']; ?>  </option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="periodo">Periodo:</label>
                            <select id="periodo" name="periodo" class="form-control" required>
                                <?php
                                // Definir los periodos disponibles
                                $periodos = ["periodo1", "periodo2", "periodo3", "periodo4", "periodo5", "periodo6", "periodo7", "periodo8", "periodo9", "periodo10"];

                                foreach ($periodos as $periodo) {
                                    // Verificar si el periodo está ocupado para el equipo seleccionado
                                    $ocupado = isset($periodos_ocupados) && in_array($periodo, $periodos_ocupados);
                                    $color = $ocupado ? "red" : "green";
                                    echo "<option value='$periodo' style='color: $color;' " . ($ocupado ? "disabled" : "") . ">$periodo</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="snack">Incluir Snack:</label>
                            <input type="checkbox" id="snack" name="snack">
                        </div>

                        <button type="submit" class="btn btn-primary">Reservar</button>
                    </form>

                    <script>
                        // Actualizar la página cuando se cambie la fecha
                        document.getElementById("fecha_reserva").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&fecha=" + this.value + "&equipo=" + equipo.value;
                        });
                        // Actualizar la página cuando se cambie el equipo
                        document.getElementById("equipo").addEventListener("change", function() {
                            window.location.href = "index.php?action=reservarEquipoAdmin&fecha=" + fecha_reserva.value + "&equipo=" + this.value;
                        });
                    </script>
                </section>
    <?php
                
            }elseif (strcmp($tipo, "Normal") == 0) {
    ?>
                <section>
                    <h2>normal prrueba</h2>
                </section>
    <?php
            }
    ?>

    <?php
        }
    ?>
</main>