<main class="bg-gray-50 min-h-screen ">
  <section class="pt-50">
    <div class="container mx-auto px-4">
      <!-- Navegación del mes -->
      <div class="flex items-center justify-between mb-6">
        <a href="?action=eventos&mes=<?php echo ($mesActual - 1) < 1 ? 12 : $mesActual - 1; ?>&anio=<?php echo ($mesActual - 1) < 1 ? $anioActual - 1 : $anioActual; ?>"
           class="inline-flex items-center space-x-2 px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
          <span class="text-lg">&laquo;</span>
          <span>Mes Anterior</span>
        </a>

        <div class="text-2xl font-bold text-gray-800">
          <?php
            $fechaInicio = new DateTime("$anioActual-$mesActual-01");
            echo $fechaInicio->format('F Y');
          ?>
        </div>

        <a href="?action=eventos&mes=<?php echo ($mesActual + 1) > 12 ? 1 : $mesActual + 1; ?>&anio=<?php echo ($mesActual + 1) > 12 ? $anioActual + 1 : $anioActual; ?>"
           class="inline-flex items-center space-x-2 px-4 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">
          <span>Mes Siguiente</span>
          <span class="text-lg">&raquo;</span>
        </a>
      </div>

      <!-- Calendario -->
      <div class="bg-white rounded-lg shadow p-6">
        <div class="grid grid-cols-7 gap-2 mb-4">
          <div class="text-center text-gray-600 font-medium uppercase">Lun</div>
          <div class="text-center text-gray-600 font-medium uppercase">Mar</div>
          <div class="text-center text-gray-600 font-medium uppercase">Mié</div>
          <div class="text-center text-gray-600 font-medium uppercase">Jue</div>
          <div class="text-center text-gray-600 font-medium uppercase">Vie</div>
          <div class="text-center text-gray-600 font-medium uppercase">Sáb</div>
          <div class="text-center text-gray-600 font-medium uppercase">Dom</div>
        </div>

        <div class="grid grid-cols-7 gap-2">
          <?php
          $primerDiaDelMes = $fechaInicio->format('N');
          $diasDelMes    = $fechaInicio->format('t');

          // Espacios iniciales
          for ($i = 1; $i < $primerDiaDelMes; $i++) {
            echo '<div></div>';
          }

          for ($dia = 1; $dia <= $diasDelMes; $dia++) {
            $fechaDia       = sprintf("%02d", $dia);
            $eventoDelDia   = $eventosPorDia[$fechaDia] ?? null;
            $esHoy          = (date('Y-m-d') === "$anioActual-$mesActual-$fechaDia");
            $baseClasses    = 'aspect-[2/1] flex items-center justify-center rounded-lg cursor-pointer transition';
            $fechaAttr      = "data-fecha='$anioActual-$mesActual-$fechaDia'";

            if ($eventoDelDia) {
              // Día con evento
              echo "<div
                      class=\"$baseClasses bg-indigo-600 text-white hover:bg-indigo-700 focus:outline-none focus:ring-4 focus:ring-indigo-300\"
                      $fechaAttr
                      data-id_evento=\"{$eventoDelDia[0]['id_evento']}\"
                      data-nombre_evento=\"{$eventoDelDia[0]['nombre_evento']}\"
                      data-tipo_evento=\"{$eventoDelDia[0]['tipo_evento']}\"
                      data-premio=\"{$eventoDelDia[0]['premio']}\"
                      data-patrocinadores=\"{$eventoDelDia[0]['patrocinadores']}\"
                    >
                      $dia
                    </div>";
            } else {
              // Día sin evento
              echo "<div
                      class=\"$baseClasses bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-200 " . ($esHoy ? 'ring-2 ring-indigo-400' : '') . "\"
                      $fechaAttr
                    >
                      $dia
                    </div>";
            }
          }
          ?>
        </div>
      </div>
    </div>

    <!-- Modal: Crear Evento -->
    <div id="modalCrear" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
      <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 space-y-4">
        <h3 class="text-2xl font-semibold">Crear Evento</h3>
        <form id="formCrearEvento" method="POST" action="index.php?action=guardarEvento" class="space-y-4">
          <input type="hidden" name="fecha_evento" id="fechaEventoCrear" />
          <div>
            <label class="block text-gray-700">Nombre del evento</label>
            <input type="text" name="nombre_evento" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label class="block text-gray-700">Tipo de evento</label>
            <input type="text" name="tipo_evento" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label class="block text-gray-700">Premio</label>
            <input type="text" name="premio" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label class="block text-gray-700">Patrocinadores</label>
            <input type="text" name="patrocinadores" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div class="flex justify-end space-x-2">
            <button type="button" id="cerrarModalCrear" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Cancelar</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Guardar</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Modal: Modificar/Eliminar Evento -->
    <div id="modalModificar" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 flex items-center justify-center p-4">
      <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 space-y-4">
        <h3 class="text-2xl font-semibold">Modificar Evento</h3>
        <form id="formModificarEvento" method="POST" action="index.php?action=modificarEvento" class="space-y-4">
          <input type="hidden" name="id_evento" id="idEventoModificar" />
          <div>
            <label class="block text-gray-700">Nombre del evento</label>
            <input type="text" id="nombreEventoModificar" name="nombre_evento" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label class="block text-gray-700">Tipo de evento</label>
            <input type="text" id="tipoEventoModificar" name="tipo_evento" required class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label class="block text-gray-700">Premio</label>
            <input type="text" id="premioEventoModificar" name="premio" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div>
            <label class="block text-gray-700">Patrocinadores</label>
            <input type="text" id="patrocinadoresEventoModificar" name="patrocinadores" class="w-full mt-1 p-2 border border-gray-300 rounded-lg" />
          </div>
          <div class="flex justify-end space-x-2">
            <button type="button" id="eliminarEvento" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Eliminar</button>
            <button type="button" id="cerrarModalModificar" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">Cancelar</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Guardar cambios</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</main>

<script>
  // Abrir modal Crear
  document.querySelectorAll('.aspect-square').forEach(day => {
    day.addEventListener('click', () => {
      const fecha = day.getAttribute('data-fecha');
      document.getElementById('fechaEventoCrear').value = fecha;
      document.getElementById('modalCrear').classList.remove('hidden');
    });
  });

  // Cerrar modal Crear
  document.getElementById('cerrarModalCrear').addEventListener('click', () => {
    document.getElementById('modalCrear').classList.add('hidden');
  });

  // Abrir modal Modificar
  document.querySelectorAll('[data-id_evento]').forEach(day => {
    day.addEventListener('click', () => {
      ['idEventoModificar','nombreEventoModificar','tipoEventoModificar','premioEventoModificar','patrocinadoresEventoModificar'].forEach(id => {
        const field = document.getElementById(id);
        const attr  = id.replace(/(.+)EventoModificar/, '$1').toLowerCase();
        field.value = day.getAttribute(`data-${attr}`);
      });
      document.getElementById('modalModificar').classList.remove('hidden');
    });
  });

  // Cerrar modal Modificar
  document.getElementById('cerrarModalModificar').addEventListener('click', () => {
    document.getElementById('modalModificar').classList.add('hidden');
  });

  // Eliminar evento
  document.getElementById('eliminarEvento').addEventListener('click', () => {
    const id = document.getElementById('idEventoModificar').value;
    window.location.href = `index.php?action=eliminarEvento&id_evento=${id}`;
  });
</script>
