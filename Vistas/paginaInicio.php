<main>
    <?php
        if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
          


    ?>
        <section class="pt-50">
            
        </section>
    <?php
        }else {
            header("Location: index.php?action=inicio");
        }
    ?>
</main>