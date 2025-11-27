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
    // se puede usar filter_var para validar y sanitizar datos
    // un ejemplo es:
    // $precio = filter_var($_POST['precio'], FILTER_VALIDATE_INT);
    // sanitizar: $precio = filter_var($_POST['precio'], FILTER_SANITIZE_NUMBER_INT);
    //existen varios tipos de filtros: https://www.php.net/manual/es/filter.filters.php y https://www.php.net/manual/es/filter.filters.sanitize.php
    ///----------------------------------------------------------------------------------------------
    // echo "<pre>";
    // var_dump($_POST);
    // echo "</pre>";
    // echo "-----------------FILES------------------";
    // echo "<pre>";
    // var_dump($_FILES);
    // echo "</pre>";
    // en este caso tambien se puede usar mysqli_real_escape_string para evitar inyecciones sql
    // $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
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
    if (!$imagen['name']) {
        $errores[] = "La imagen es obligatoria";
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
        //trabajando con archivos
        //creamos una carpeta
        $carpetaImagenes = '../../imagenes/';
        //generar nombre unico
        // md5 genera un hash unico conbinado con uniqid y rand conseguimos un nombre unico.
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";
        //validamos si la carpeta existe.
        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }
        //subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes  . $nombreImagen);
        $query = "INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ('$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId')";
        $resultado = mysqli_query($db, $query);
        if ($resultado) {
            // Redireccionar al usuario
            //desúes del ? le pasamos parametros por la url para mostrar mensajes y podemos usar & para agregar mas parametros un ejemplo, admin?resultado=1&accion=crear
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
    <!-- el enctype permite leer al backend leer los archivos, no importa con que tecnologia este echo, siempre colocaro si vas a enviar archivos -->
    <form action="/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">
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