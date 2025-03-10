<main>
    <?php
        if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
    ?>
        <section class="pt-50 flex flex-col">
            <a href="index.php?action=eventos">eventos</a>
            <a href="index.php?action=registroAdmin">Añadir nuevo usuario</a>
            <a href="index.php?action=eventos">Activar usuario</a>
        </section>
    <?php
        }else {
            header("Location: index.php?action=inicio");
        }
    ?>
</main>