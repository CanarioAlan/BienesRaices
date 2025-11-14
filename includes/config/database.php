<?php
function conertarDB(): mysqli
{
    $db =  mysqli_connect("localhost", "root", "9056", "bienraices_crud");

    if (!$db) {
        echo "Error al conetar";
        exit;
    }
    return $db;
}
