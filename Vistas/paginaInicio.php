<main>
    <?php
        if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
          


    ?>
        <section class="pt-50">
            <a href="index.php?action=eventos">eventos</a>
            <a href=""></a>
            <a href=""></a>
        </section>
    <?php
        }else {
            header("Location: index.php?action=inicio");
        }
    ?>
</main>