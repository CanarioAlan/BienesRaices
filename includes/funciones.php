<?php
require 'app.php';
// creamos una función para incluir templates con parámetros opcionales 
function incluirTemplate(string $nombre, bool $inicio = false)
{
    //usamos template_url que definimos en app.php, lo que hace es traer la ruta absoluta
    include  TEMPLATE_URL . "/{$nombre}.php";
}
//creamos una funcion para validar si el usuario esta autenticado, esta funcion devuelve un booleano
function estadoAutenticado(): bool
{
    //siempre que usemos sesiones debemos iniciar la sesion
    session_start();
    $auth = $_SESSION['login'];
    if ($auth) {
        return true;
    }
    return false;
}
