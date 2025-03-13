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
            <select name="periodo" id="periodo" >
                <option value="periodo1">9:00-10:00</option>
                <option value="periodo2">10:00-11:00</option>
                <option value="periodo3">11:00-12:00</option>
                <option value="periodo4">12:00-13:00</option>
                <option value="periodo5">13:00-14:00</option>
                <option value="periodo6">14:00-15:00</option>
                <option value="periodo7">15:00-16:00</option>
                <option value="periodo8">16:00-17:00</option>
                <option value="periodo9">17:00-18:00</option>
                <option value="periodo10">18:00-19:00</option>
            </select>
            <label for="snack">Snack:</label>
            <input type="checkbox" id="snack" name="snack"><br>
            <button type="submit">Reservar</button>
        </form>
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
            <?php foreach ($reservas as $reserva): ?>
            <tr>
                <td><?php echo $reserva[0]; ?></td>
                <td><?php echo $reserva[1]; ?></td>
                <td><?php echo $reserva[2]; ?></td>
                <td><?php echo $reserva[3]; ?></td>
                <td><?php echo $reserva[4] ? 'Sí' : 'No'; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>