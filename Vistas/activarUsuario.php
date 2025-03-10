<main>
    <section class="pt-50">
        <form action="index.php?action=activarUsuario" method="post">
            <select name="id_usuario" required>
                <?php foreach ($usuarios as $usuario): ?>

                    <option value="<?= $usuario[0] ?>"><?= $usuario[1] ?></option>

                <?php endforeach; ?>
            </select>
            <br>
            <label for="DNI">Meta su DNI:</label>
            <input type="text" name="DNI" required>
            <br>
            <button type="submit" class="btn btn-outline-light">Registrarse</button>
        </form>
    </section>
</main>