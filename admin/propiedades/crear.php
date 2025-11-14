<?php
require '../../includes/config/database.php';
$db = conertarDB();
//consulta para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultadoConsulta = mysqli_query($db, $consulta);
// Arreglo con mensajes de errores
$errores = [];
// Variables para guardar los valores del formulario
$titulo = "";
$precio = "";
$descripcion = "";
$habitaciones = "";
$wc = "";
$estacionamiento = "";
$vendedorId = "";
// Ejecutar el codigo despues de que el usuario envia el formulario | _server es una variable superglobal que contiene informacion del servidor y del entorno de ejecucion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $habitaciones = $_POST['habitaciones'];
    $wc = $_POST['wc'];
    $estacionamiento = $_POST['estacionamiento'];
    $vendedorId = $_POST['vendedor'];
    $creado = date('Y/m/d');
    if (!$titulo) {
        $errores[] = "Debes añadir un título";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (strlen($descripcion) < 5) {
        $errores[] = "El descripcion es obligatorio y debe tener al menos 35 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "El numero de habitaciones es obligatorio";
    }
    if (!$wc) {
        $errores[] = "El numero de baños es obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "El numero de estacionamiento es obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "El vendedor es obligatorio";
    }
    // echo "<pre>";
    // var_dump($errores);
    // echo "</pre>";
    // exit;
    if (empty($errores)) {
        $query = "INSERT INTO propiedades (titulo, precio, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redireccionar al usuario
            header('Location: /admin?resultado=1');
        }
    };
}
require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <form action="/admin/propiedades/crear.php" class="formulario" method="POST">
        <fieldset>
            <legend>Información General</legend>
            <label for="titulo">Título:</label>
            <input type="text"
                id="titulo"
                placeholder="Título Propiedad"
                name="titulo"
                value="<?php echo $titulo; ?>">
            <label for="precio">Precio:</label>
            <input type="number"
                id="precio"
                placeholder="Precio Propiedad"
                name="precio"
                value="<?php echo $precio; ?>">
            <label for="imagen">Imagen:</label>
            <input type="file"
                id="imagen"
                multiple accept="image/jpeg, image/png" name="imagen">
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información de la Propiedad</legend>
            <label for="habitaciones">Habitaciones:</label>
            <input type="number"
                id="habitaciones"
                placeholder="Ej: 3"
                min="1"
                max="9"
                name="habitaciones"
                value="<?php echo $habitaciones; ?>">
            <label for="wc">Baños:</label>
            <input type="number"
                id="wc" placeholder="Ej: 3"
                min="1"
                max="9"
                name="wc"
                value="<?php echo $wc; ?>">
            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number"
                id="estacionamiento"
                placeholder="Ej: 3"
                min="1"
                max="9"
                name="estacionamiento" value="<?php echo $estacionamiento; ?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>
            <select name="vendedor" id="">
                <option value="" disabled selected>-- Seleccione --</option>
                <!-- usamos mysqli_fetch_assoc porque la key del arreglo son las mismas que en la db -->
                <?php while ($row = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                    <option
                        <?php echo $vendedorId === $row['id'] ? 'selected' : '' ?>
                        value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>
<?php incluirTemplate('footer') ?>