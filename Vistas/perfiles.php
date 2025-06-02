<?php
    if (strcmp($_SESSION["tipo_usuario"], "Admin") == 0) {
?>
    <main>
        <section class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
                <h2 class="text-2xl font-semibold mb-4">Perfiles</h2>
                <div class="space-y-4">
                    <table>
                        <thead>
                            <tr>
                                <th class="border-b border-gray-300 px-4 py-2">ID</th>
                                <th class="border-b border-gray-300 px-4 py-2">Nombre</th>
                                <th class="border-b border-gray-300 px-4 py-2">DNI</th>
                                <th class="border-b border-gray-300 px-4 py-2">Puntos</th>
                                <th class="border-b border-gray-300 px-4 py-2">Tipo de Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($usuarios as $perfil): ?>
                                <tr>
                                    <td>
                                        <?php echo $perfil['id_usuario']; ?>
                                    </td>
                                    <td>
                                        <?php echo $perfil['nombre_usuario'];?> 
                                    </td>
                                    <td>3</td>
                                    <td>4</td>
                                    <td>5</td>
                                </tr>
                            <?php        
                                endforeach;
                            ?>
                        </tbody>
                    </table>    
    </main>
<?php
    }else{
        
    }
?>