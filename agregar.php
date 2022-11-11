<?php
session_start();
require_once 'clases/RepositorioJuego.php';
require_once 'clases/Juego.php';


$rj = new RepositorioJuego();

$juego = $_POST['juego'];
$imagen = $_POST['imagen'];
$estado = $_POST['estado'];
$crackby = $_POST['crackby'];

$j = new Juego($juego,$imagen, $estado, $crackby);
$usuario = unserialize($_SESSION['usuario']);

if($rj->agregar($j)) {
    $redirigir = 'home.php?mensaje=Producto agregado';
} else {
	$redirigir = 'home.php?mensaje=Error al agregar';
	
}
header('Location: '.$redirigir);