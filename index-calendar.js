// Abrir modal Crear
    document.querySelectorAll('.day').forEach(day => {
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
    // Cuando haces clic en un día con evento
    document.querySelectorAll('[data-id_evento]').forEach(day => {
        day.addEventListener('click', function() {
        // Obtener los datos del evento
        const idEvento = this.getAttribute('data-id_evento');
        
        // Establecer valores en el formulario de modificación
        document.getElementById('idEventoModificar').value = idEvento;
        document.getElementById('nombreEventoModificar').value = this.getAttribute('data-nombre_evento');
        document.getElementById('tipoEventoModificar').value = this.getAttribute('data-tipo_evento');
        document.getElementById('premioEventoModificar').value = this.getAttribute('data-premio');
        document.getElementById('patrocinadoresEventoModificar').value = this.getAttribute('data-patrocinadores');
        
        // Establecer el mismo ID en el formulario de eliminación
        document.getElementById('idEventoEliminar').value = idEvento;
        
        // Mostrar el modal
        document.getElementById('modalModificar').classList.remove('hidden');
        });
    });