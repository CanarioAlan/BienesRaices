<?php
//traemos el require de las funciones y llamamos a la funcion de autenticacion
require '../includes/funciones.php';
//asignamos el resultado de la funcion a una variable
$auth = estadoAutenticado();
//validamos si no esta autenticado
if (!$auth) {
    //si no esta autenticado lo redireccionamos al inicio
    header('Location: /');
}
//improtar la conexion
require '../includes/config/database.php';
$db = conectarDB();
//escribir la consulta
$query = "SELECT * FROM propiedades;";
//consultar a la bases de datos
$resultadoConsulta = mysqli_query($db, $query);
//usamos la super global _GET para obtener los valores de la url y usamos el operador null coalescing para asignar un valor por defecto en caso de que no exista
$resultado = $_GET['resultado'] ?? null;
// validar que el metodo sea post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //asignamos el id a una variable solamente cuando se envie el metodo post
    $id = $_POST['id'];
    //validamos que sea un entero
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if ($id) {
        //rliminamos la imagen de la propiedad
        $query = "SELECT imagen FROM propiedades WHERE Id = $id";
        //ejecutar la consulta
        $resultadoImagen = mysqli_query($db, $query);
        //obtener la imagen
        $propiedad = mysqli_fetch_assoc($resultadoImagen);
        //eliminar la imagen del servidor
        unlink('../imagenes/' . $propiedad['imagen']);
        //eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE Id = $id";
        $resultadoEliminar = mysqli_query($db, $query);
        if ($resultadoEliminar) {
            //redireccionar al usuario
            header('Location: /admin?resultado=3');
        }
    }
}
//usamos un template para el header
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador</h1>
    <?php
    if (intval($resultado) === 1): ?>
        <p class="alerta exito">Creado Correctamente</p>
    <?php endif; ?>
    <?php if (intval($resultado) === 2): ?>
        <p class="alerta exito">Actualizado Correctamente</p>
    <?php endif; ?>
    <?php if (intval($resultado) === 3): ?>
        <p class="alerta exito">Eliminado Correctamente</p>
    <?php endif; ?>
    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Crear nueva propiedad</a>
    <!-- mostramos la consulta  -->
    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)): ?>
                <tr>
                    <td><?php echo $propiedad['Id'] ?></td>
                    <td><?php echo $propiedad['titulo'] ?></td>
                    <td><img src="/imagenes/<?php echo $propiedad['imagen'] ?>" alt="Imagen de la propiedad" class="imagen-tabla"></td>
                    <td><?php echo $propiedad['precio'] ?></td>
                    <td>
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $propiedad['Id'] ?>">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        <a href="admin/propiedades/actualizar.php?id=<?php echo $propiedad['Id'] ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>
<?php
//cerramos la conexion
mysqli_close($db);
incluirTemplate('footer')
?>