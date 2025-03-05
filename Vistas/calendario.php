<main>
    <section class="pt-50">
        <div class="container mx-auto mt-10">
            <!-- Navegación del mes -->
            <div class="flex justify-between mb-4">
                <a href="?action=eventos&mes=<?php echo ($mesActual - 1) < 1 ? 12 : $mesActual - 1; ?>&anio=<?php echo ($mesActual - 1) < 1 ? $anioActual - 1 : $anioActual; ?>" class="text-xl">&laquo; Mes Anterior</a>

                <div class="text-xl font-semibold">
                    <?php
                    // Crear un objeto DateTime para el primer día del mes
                    $fechaInicio = new DateTime("$anioActual-$mesActual-01");
                    // Obtener el nombre completo del mes y el año
                    echo $fechaInicio->format('F Y'); // Ejemplo: Marzo 2025
                    ?>
                </div>

                <a href="?action=eventos&mes=<?php echo ($mesActual + 1) > 12 ? 1 : $mesActual + 1; ?>&anio=<?php echo ($mesActual + 1) > 12 ? $anioActual + 1 : $anioActual; ?>" class="text-xl">Mes Siguiente &raquo;</a>
            </div>

            <div class="grid grid-cols-7 gap-4">
                <!-- Días de la semana -->
                <div class="text-center font-semibold">Lun</div>
                <div class="text-center font-semibold">Mar</div>
                <div class="text-center font-semibold">Mié</div>
                <div class="text-center font-semibold">Jue</div>
                <div class="text-center font-semibold">Vie</div>
                <div class="text-center font-semibold">Sáb</div>
                <div class="text-center font-semibold">Dom</div>

                <?php
                // Crear objeto DateTime para determinar el primer día del mes y el número de días
                $primerDiaDelMes = $fechaInicio->format('N'); // Día de la semana (1 = lunes, 7 = domingo)
                $diasDelMes = $fechaInicio->format('t'); // Total de días del mes

                // Imprimir los días vacíos del principio del mes (si es necesario)
                for ($i = 1; $i < $primerDiaDelMes; $i++) {
                    echo "<div class='day'></div>";
                }

                // Imprimir todos los días del mes
                for ($dia = 1; $dia <= $diasDelMes; $dia++) {
                    $fechaDia = sprintf("%02d", $dia); // Formato de día con 2 dígitos
                    $eventoDelDia = isset($eventosPorDia[$fechaDia]) ? $eventosPorDia[$fechaDia] : null;

                    // Verificar si el día tiene eventos
                    if ($eventoDelDia) {
                        echo "<div class='day bg-green-500 text-white rounded-full p-2 cursor-pointer' 
                                data-fecha='" . $anioActual . "-" . $mesActual . "-" . $fechaDia . "' 
                                data-id_evento='" . $eventoDelDia[0]['id_evento'] . "' 
                                data-nombre_evento='" . $eventoDelDia[0]['nombre_evento'] . "'>
                                " . $fechaDia . "</div>";
                    } else {
                        echo "<div class='day p-2 cursor-pointer' data-fecha='" . $anioActual . "-" . $mesActual . "-" . $fechaDia . "'>
                                " . $fechaDia . "</div>";
                    }
                }
                ?>
            </div>
        </div>

        <!-- Modales de eventos -->
        <!-- Modal para crear un evento -->
        <div id="modalCrear" class="fixed top-0 left-0 z-50 hidden w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg">
                <h3 class="text-xl">Crear Evento</h3>
                <form id="formCrearEvento" method="POST" action="index.php?action=guardarEvento">
                    <input type="hidden" name="fecha_evento" id="fechaEventoCrear" />
                    <div class="mb-4">
                        <label class="block">Nombre del evento</label>
                        <input type="text" name="nombre_evento" required class="w-full p-2 border border-gray-300 rounded-lg" />
                    </div>
                    <div class="mb-4">
                        <label class="block">Tipo de evento</label>
                        <input type="text" name="tipo_evento" required class="w-full p-2 border border-gray-300 rounded-lg" />
                    </div>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Guardar</button>
                    <button type="button" class="bg-gray-500 text-white p-2 rounded-lg" id="cerrarModalCrear">Cancelar</button>
                </form>
            </div>
        </div>

        <!-- Modal para modificar o eliminar un evento -->
        <div id="modalModificar" class="fixed top-0 left-0 z-50 hidden w-full h-full bg-gray-800 bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-lg">
                <h3 class="text-xl">Modificar Evento</h3>
                <form id="formModificarEvento" method="POST" action="index.php?action=modificarEvento">
                    <input type="hidden" name="id_evento" id="idEventoModificar" />
                    <div class="mb-4">
                        <label class="block">Nombre del evento</label>
                        <input type="text" name="nombre_evento" id="nombreEventoModificar" required class="w-full p-2 border border-gray-300 rounded-lg" />
                    </div>
                    <div class="mb-4">
                        <label class="block">Tipo de evento</label>
                        <input type="text" name="tipo_evento" id="tipoEventoModificar" required class="w-full p-2 border border-gray-300 rounded-lg" />
                    </div>
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-lg">Guardar cambios</button>
                    <button type="button" class="bg-red-500 text-white p-2 rounded-lg" id="eliminarEvento">Eliminar</button>
                    <button type="button" class="bg-gray-500 text-white p-2 rounded-lg" id="cerrarModalModificar">Cancelar</button>
                </form>
            </div>
        </div>

        <script>
            // JavaScript para abrir el modal de creación de evento
            document.querySelectorAll('.day').forEach(function(day) {
                day.addEventListener('click', function() {
                    const fecha = this.getAttribute('data-fecha');
                    document.getElementById('fechaEventoCrear').value = fecha;
                    document.getElementById('modalCrear').classList.remove('hidden');
                });
            });

            // JavaScript para cerrar el modal de creación de evento
            document.getElementById('cerrarModalCrear').addEventListener('click', function() {
                document.getElementById('modalCrear').classList.add('hidden');
            });

            // JavaScript para abrir el modal de modificación de evento
            document.querySelectorAll('.day').forEach(function(day) {
                day.addEventListener('dblclick', function() {
                    const idEvento = this.getAttribute('data-id_evento');
                    const nombreEvento = this.getAttribute('data-nombre_evento');
                    const fechaEvento = this.getAttribute('data-fecha');
                    document.getElementById('idEventoModificar').value = idEvento;
                    document.getElementById('nombreEventoModificar').value = nombreEvento;
                    document.getElementById('tipoEventoModificar').value = '';
                    document.getElementById('modalModificar').classList.remove('hidden');
                });
            });

            // JavaScript para cerrar el modal de modificación de evento
            document.getElementById('cerrarModalModificar').addEventListener('click', function() {
                document.getElementById('modalModificar').classList.add('hidden');
            });

            // JavaScript para eliminar el evento
            document.getElementById('eliminarEvento').addEventListener('click', function() {
                const idEvento = document.getElementById('idEventoModificar').value;
                window.location.href = `index.php?action=eliminarEvento&id_evento=${idEvento}`;
            });
        </script>
    </section>
</main>
