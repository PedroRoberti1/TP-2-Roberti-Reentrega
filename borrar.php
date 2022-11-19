<?php
require_once 'clases/ControladorSesion.php';
require_once 'clases/Juego.php';
require_once 'clases/RepositorioJuego.php';

session_start();
if (isset($_SESSION['usuario'])) {
    
    $usuario = unserialize($_SESSION['usuario']);
} else {
    
    header('Location: index.php');
}

$rd = new RepositorioJuego();

$id = $_GET['id'];
 
 if ($rd->borrar($id)) {
 	$redirigir = 'home.php?mensaje=Producto eliminado correctamente';
} else {
	$redirigir = 'home.php?mensaje=Error al eliminar';

}

header("Location: $redirigir");