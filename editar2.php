<?php
session_start();
require_once 'clases/ControladorSesion.php';
require_once 'clases/Juego.php';
require_once 'clases/RepositorioJuego.php';



if (isset($_SESSION['usuario'])) {
	$usuario = unserialize($_SESSION['usuario']);


} else {
	header('Location: index.php');
}

if (
    !empty($_POST['id']) && !empty($_POST['estado']) && !empty($_POST['crackby'])
) {
$rd = new RepositorioJuego();
    
    if ($rd->actualizar($_POST['id'], $_POST['estado'], $_POST['crackby'])) { 
    $redirigir = 'home.php?mensaje=producto modificado correctamente';
} else {
    $mensaje = "No fue posible modificar el producto.";
    $redirigir = "home.php?mensaje=$mensaje";
    
}
}
header("Location: $redirigir");




?>