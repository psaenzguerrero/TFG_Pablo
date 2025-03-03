<main>
    <section>
        <form action="" method="post">
            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" <?php if(isset($_COOKIE["nombre_usuario"])) echo 'value='.$_COOKIE["nombre_usuario"].''; ?> required>
            <br>
            <label for="pass_usuario">Contraseña:</label>
            <input type="password" name="pass_usuario" required>
            <br>
            <label for="pass_usuario2">Repita su Contraseña:</label>
            <input type="password" name="pass_usuario2" required>
            <br>
            <label for="devuelto">Recuerdame:</label>
            <input type="checkbox" name="recuerdame" value="1" checked>
            <br>
            <button type="submit" class="btn btn-outline-light">Iniciar Sesión</button>
        </form>
    </section>
</main>