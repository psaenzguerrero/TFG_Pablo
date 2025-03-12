<main>
    <section class="pt-50">
        <h2>Reservar Equipo</h2>
        <?php if (isset($error)): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="POST" action="index.php?action=reservarequipo">
            <label for="id_equipo">ID Equipo:</label>
            <input type="number" id="id_equipo" name="id_equipo" required><br>
            <label for="fecha_reserva">Fecha de Reserva:</label>
            <input type="date" id="fecha_reserva" name="fecha_reserva" required><br>
            <label for="horaIni">Hora de Inicio:</label>
            <input type="time" id="horaIni" name="horaIni" required><br>
            <label for="horaFin">Hora de Fin:</label>
            <input type="time" id="horaFin" name="horaFin" required><br>
            <label for="snack">Snack:</label>
            <input type="checkbox" id="snack" name="snack"><br>
            <button type="submit">Reservar</button>
        </form>
    </section>
    <section>
        <h2>Mis Reservas</h2>
        <table border="1">
            <tr>
                <th>ID Usuario</th>
                <th>ID Equipo</th>
                <th>Fecha Reserva</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
                <th>Snack</th>
            </tr>
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?php echo $reserva[0]; ?></td>
                <td><?php echo $reserva[1]; ?></td>
                <td><?php echo $reserva[2]; ?></td>
                <td><?php echo $reserva[3]; ?></td>
                <td><?php echo $reserva[4]; ?></td>
                <td><?php echo $reserva[5] ? 'Sí' : 'No'; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>