<?php
require '../includes/funciones.php';
$inicio = true;
incluirTemplate('header', $inicio);
?>
<main class="contenedor seccion">
    <h1>Administrador</h1>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear nueva propiedad</a>
</main>
<?php incluirTemplate('footer') ?>