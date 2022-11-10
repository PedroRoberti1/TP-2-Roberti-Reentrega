<?php
require_once 'clases/Usuario.php';
session_start();
if (isset($_SESSION['usuario'])) {
	$usuario = unserialize($_SESSION['usuario']);
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
								<th scope="col">Estado</th>
								<th scope="col">Crack by:</th>
								<th scope="col" colspan="2">Opciones</th>
							</tr>
						</thead>
						<tbody>

							<?php
							foreach ($persona as $dato) {
							?>

								<tr>
									<td scope="row"><?php echo $dato->codigo; ?></td>
									<td><?php echo $dato->Juego; ?></td>
									<td><?php echo $dato->Estado; ?></td>
									<td><?php echo $dato->Crackby; ?></td>
									<td><a class="text-success" href="editar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-pencil-square"></i></a></td>
									<td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?codigo=<?php echo $dato->codigo; ?>"><i class="bi bi-trash"></i></a></td>
								</tr>

							<?php
							}
							?>

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
				<form class="p-4" method="POST" action="registrar.php">
					<div class="mb-3">
						<label class="form-label">Nombre: </label>
						<input type="text" class="form-control" name="txtNombre" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Imagen: </label>
						<input type="number" class="form-control" name="txtEdad" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Estado: </label>
						<input type="text" class="form-control" name="txtSigno" autofocus required>
					</div>
					<div class="mb-3">
						<label class="form-label">Crack by: </label>
						<input type="text" class="form-control" name="txtSigno" autofocus required>
					</div>
					<div class="d-grid">
						<input type="hidden" name="oculto" value="1">
						<input type="submit" class="btn btn-primary" value="Registrar">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>