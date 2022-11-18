
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Crack Watch</title>
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