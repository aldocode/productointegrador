<!DOCTYPE html>
<html>
<head>
	<title>Directorio</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Directorio</h1>
	<form method="POST" id="agregar-form" action="agregar.php">
		<div class="form-group">
			<label for="nombre">Nombre:</label>
			<input type="text" class="form-control" name="nombre" id="nombre" required>
		</div>

		<div class="form-group">
			<label for="telefono">Teléfono:</label>
			<input type="text" class="form-control" name="telefono" id="telefono" required>
		</div>

		<div class="form-group">
			<label for="correo">Correo electrónico:</label>
			<input type="email" class="form-control" name="correo" id="correo" required>
		</div>

		<div class="form-group">
			<label for="instagram">Usuario de Instagram:</label>
			<input type="text" class="form-control" name="instagram" id="instagram" required>
		</div>

		<button type="submit" class="btn btn-primary">Agregar</button>
	</form>

	<div id="resultados">
		<!-- aquí se mostrarán los resultados con Ajax -->
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		// función para cargar los resultados con Ajax
		function cargarResultados() {
			$.ajax({
				url: 'mostrar.php',
				type: 'GET',
				success: function(data) {
					$('#resultados').html(data);
				}
			});
		}

		// cargar los resultados al cargar la página
		cargarResultados();

		// enviar el formulario con Ajax
		$('#agregar-form').submit(function(event) {
			event.preventDefault();
			$.ajax({
				url: 'agregar.php',
				type: 'POST',
				data: $('#agregar-form').serialize(),
				success: function(data) {
					cargarResultados();
					$('#agregar-form')[0].reset();
				}
			});
		});
	});
</script>
</body>
</html>