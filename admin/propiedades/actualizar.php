<?php
//validamos el id de la url
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);
if (!$id) {
    header('Location: /admin');
}
require '../../includes/config/database.php';
$db = conertarDB();
// consulta segun el id
$consultaPropiedad = "SELECT * FROM propiedades WHERE id = {$id}";
$resultadoPropiedad = mysqli_query($db, $consultaPropiedad);
$propiedad = mysqli_fetch_assoc($resultadoPropiedad);
//consulta para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultadoConsulta = mysqli_query($db, $consulta);
// Arreglo con mensajes de errores
$errores = [];
// Variables para guardar los valores del formulario
$titulo = $propiedad['titulo'];
$precio = $propiedad['precio'];
$descripcion = $propiedad['descripcion'];
$habitaciones = $propiedad['habitaciones'];
$wc = $propiedad['wc'];
$estacionamiento = $propiedad['estacionamiento'];
$vendedorId = $propiedad['vendedores_id'];
$imagenPropiedad = $propiedad['imagen'];
// Ejecutar el codigo despues de que el usuario envia el formulario | _server es una variable superglobal que contiene informacion del servidor y del entorno de ejecucion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion =  mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');
    // imagenes
    $imagen = $_FILES['imagen'];
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
    if ($imagen['type'] == 'jpeg' || $imagen['type'] == 'png') {
        $errores[] = "El formato de la imagen no es valido, debe ser jpeg o png";
    }
    //tamaño maximo
    $medida = 1000 * 175; //
    if ($imagen['size'] > $medida) {
        $errores[] = "La imagen es muy pesada, el tamaño máximo es 100kb";
    }
    if (empty($errores)) {
        //--------trabajando con archivos
        //creamos una carpeta
        $carpetaImagenes = '../../imagenes/';
        //validamos si la carpeta existe.
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        //instanciamos el nombre de la imagen
        $nombreImagen = "";
        //validamos si el usuario subio una nueva imagen
        if ($imagen['name']) {
            //eliminar la imagen previa para eso usamos unlink que es una funcion de php que elimina archivos
            unlink($carpetaImagenes . $propiedad['imagen']);
            //generar nombre unico
            // md5 genera un hash unico conbinado con uniqid y rand conseguimos un nombre unico.
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
            //subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes  . $nombreImagen);
        } else {
            $nombreImagen = $propiedad['imagen'];
        }
        //actualizar la propiedad
        $query = "UPDATE propiedades SET titulo = '{$titulo}', precio = {$precio}, imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedorId} WHERE id = {$id}";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redireccionar al usuario
            //desúes del ? le pasamos parametros por la url para mostrar mensajes y podemos usar & para agregar mas parametros un ejemplo, admin?resultado=1&accion=crear
            header('Location: /admin?resultado=2');
        }
    };
}
require '../../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error ?>
        </div>
    <?php endforeach; ?>
    <!-- el enctype permite leer al backend leer los archivos, no importa con que tecnologia este echo, siempre colocaro si vas a enviar archivos -->
    <form class="formulario" method="POST" enctype="multipart/form-data">
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
                multiple accept="image/jpeg" name="imagen">
            <img src="/imagenes/<?php echo $imagenPropiedad ?>" alt="imagen de la propiedad" class="imagen-pequenia">
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
        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>

<?php incluirTemplate('footer') ?>