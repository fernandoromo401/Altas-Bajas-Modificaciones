<?php	
	include('../conexion.php');

	$id = $_GET['id'];

	$consulta = "SELECT * FROM `productos` WHERE id='$id'";
	$resultado = mysqli_query( $conexion, $consulta );

	$fila = mysqli_fetch_array($resultado);

?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cargar Producto | Bazar Manzano</title>
	<link rel="stylesheet" type="text/css" href="./style_insert.css">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
	<link rel="icon" href="../img/manzano.png">
</head>
<body>
	<br>
	<div id="caja">
		<a style="color: black;text-decoration: none;float: left;" href="update.html">Volver</a>
		<center>
		<h1>MODIFICAR PRODUCTO</h1><br></center>
		<form action="update_file.php" method="POST" enctype="multipart/form-data">
			<input type="text" name="id" placeholder="<?php echo $fila['id']; ?>" required="">
			<input type="text" name="nombre" placeholder="<?php echo $fila['nombre']; ?>" required="">
			<select name="marca" id="categorias" required="">
				<optgroup label="Marcas/Material">
					<option value="<?php echo $fila['marca']; ?>"><?php echo $fila['marca']; ?></option>
					<option value="Acero Inoxidable">Acero Inoxidable</option>
					<option value="Aceros Mic">Aceros Mic</option>
					<option value="Alambre">Alambre</option>
					<option value="Atom">Atom</option>
					<option value="Carol">Carol</option>
					<option value="Chapa">Chapa</option>
					<option value="Crom">Crom</option>
					<option value="Enlozado">Enlozado</option>
					<option value="Frascos">Frascos</option>
					<option value="Hierro">Hierro</option>
					<option value="Lumilago">Lumilagro</option>
					<option value="Macetas">Macetas</option>
					<option value="Madera">Madera</option>
					<option value="Nadir">Nadir</option>
					<option value="Panemaq">Panemaq</option>
					<option value="Parrila">Parrila</option>
					<option value="Plasticos">Plasticos</option>
					<option value="Pulverizadores">Pulverizadores</option>
					<option value="Quality">Quality</option>
					<option value="Termolar">Termolar</option>
					<option value="Tsuji">Tsuji</option>
					<option value="Utensilios">Utensilios</option>
					<option value="Rigolleau">Rigolleau</option>
					<option value="Porcelana">Porcelana</option>
					<option value="Reposteria">Reposteria</option>
					<option value="Simonaggio">Simonaggio</option>
					<option value="Teflón">Teflón</option>
					<option value="Thermos">Thermos</option>
					<option value="Tramontina">Tramontina</option>
					<option value="Vajilla">Vajilla</option>
					<option value="Vidrio">Vidrio</option>
				</optgroup>
			</select><br>
			<textarea id="descripcion" name="descripcion" placeholder="<?php echo $fila['descripcion']; ?>" required=""></textarea>
			<label style="cursor: pointer;" for="imagen">Modificar imagen</label>
			<input type="file" name="imagen" id="imagen" required="">
			<input type="text" name="articulo" placeholder="<?php echo $fila['precio']; ?>" required="">
			
			<input type="submit" name="" value="Modificar Producto">
		</form>
	</div>
</body>
</html>