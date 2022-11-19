<?php
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
	$nomApe = $usuario->getNombreApellido();
} else {
	header('Location: index.php');
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Crack Watch</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="css/style.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-md-7">

			<!-- fin alerta -->
			<div class="card">
				<div class="card-header">
					Lista de juegos
				</div>
				<div class="p-4">
					<table class="table align-middle">
						<thead>
							<tr>
								<th scope="col">ID</th>
								<th scope="col">Juego</th>
								<th scope="col">Imagen</th>
								<th scope="col">Estado</th>
								<th scope="col">crackby</th>
								<th scope="col"></th>
								<th scope="col" colspan="2">Opciones</th>
							</tr>
						</thead>
						<tbody>

							<?php

							foreach ($juegos as $dato) {
								echo '<tr><td>' . $dato->getJuego() . '</td><td>'  . $dato->getEstado() . '</td><td>' . $dato->getCrackby() . '</td><td>' . $dato->getImagen() . '</td><td>' . $dato->getId() . '</td>';
								echo '<td><a href="editar.php?id=' . $dato->getJuego() . '"';
								echo 'class="btn btn-info">Editar</a></th>';
								echo '<th><a href="delete.php?id=' . $dato->getCrackby() . '" class="btn btn-danger">Eliminar</a></th>';
							} ?>
							</tr>



						</tbody>
					</table>

				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header">
					Ingresar datos:
				</div>
				<form class="p-4" method="POST" action="agregar.php">
					<div class="mb-3">
						<label class="form-label">Nombre: </label>
						<input type="text" class="form-control" name="juego" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Imagen: </label>
						<input type="number" class="form-control" name="imagen" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Estado: </label>
						<input type="text" class="form-control" name="estado" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Crack by: </label>
						<input type="text" class="form-control" name="crackby" autofocus required>
					</div>
					<div class="d-grid">
						<input type="hidden" name="oculto" value="1">
						<input type="submit" class="btn btn-primary" value="Agregar">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>