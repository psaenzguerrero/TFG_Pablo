<main>
    <?php
        if (isset($_SESSION["id_usuario"])) {
            echo "<p>ya estas registrado</p>";
            echo `<a href="./index.php?action="">VOLver</a>`;
        }else{
    ?>
    <section class="pt-50">
        <form action="index.php?action=registro" method="post">
            <?php if(isset($error)): ?>
                <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>

            <label for="nombre_usuario">Nombre de Usuario:</label>
            <input type="text" name="nombre_usuario" 
                value="<?php echo isset($_POST["nombre_usuario"]) ? htmlspecialchars($_POST["nombre_usuario"]) : (isset($_COOKIE["nombre_usuario"]) ? htmlspecialchars($_COOKIE["nombre_usuario"]) : ''); ?>" 
                required>
            <br>

            <label for="pass_usuario">Contraseña:</label>
            <input type="password" name="pass_usuario" required>
            <br>

            <label for="pass_usuario2">Repita su Contraseña:</label>
            <input type="password" name="pass_usuario2" required>
            <br>

            <label for="recuerdame">Recuérdame:</label>
            <input type="checkbox" name="recuerdame" value="1">
            <br>

            <button type="submit" class="btn btn-outline-light">Registrarse</button>
        </form>
    </section>
    <?php
        }
    ?>
</main>
