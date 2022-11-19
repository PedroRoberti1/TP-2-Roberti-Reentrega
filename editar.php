<?php

//todo bien aca
session_start();
require_once 'clases/Usuario.php';
require_once 'clases/ControladorSesion.php';
require_once 'clases/Juego.php';
require_once 'clases/RepositorioUsuario.php';
require_once 'clases/RepositorioJuego.php';



if (isset($_SESSION['usuario'])) {
	$usuario = unserialize($_SESSION['usuario']);



	$rd = new RepositorioJuego();
	$juegos = $rd->getJuegos();

} else {
	header('Location: index.php');
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title> Editar juego</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					Ingresar datos:
				</div>
                
				<form class="p-4" method="POST" action="editar2.php">
                <div class="mb-3">
						<label class="form-label">id: </label>
						<input type="text" class="form-control mb-3" name="id" value="<?php echo $_GET['id']; ?>" readonly="">
					</div>
					<div class="mb-3">
						<label class="form-label">Estado: </label>
						<input type="text" class="form-control" name="estado" value="<?php echo $rd->getEstadoanterior($_GET['id']); ?>" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Crack by: </label>
						<input type="text" class="form-control" name="crackby" autofocus required>
					</div>
					<div class="d-grid">
						<input type="hidden" name="oculto" value="1">
						<input type="submit" class="btn btn-primary" value="Modificar">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>