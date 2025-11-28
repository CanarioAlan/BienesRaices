<?php
session_start();
//para cerrar la sesion se puede hacer de varias formas
//una es destruir toda la sesion con session_destroy()
//otra es eliminar solo las variables de sesion con unset()
//otra es es reiniciar el arreglo de session
$_SESSION = [];
header('Location: /');
