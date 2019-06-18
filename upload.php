<?php 
	include('../conexion.php');

	$nombre = $_POST['nombre'];
	$marca = $_POST['marca'];
	$descripcion = $_POST['descripcion'];
	$articulo = $_POST['articulo'];
	$imagen = $_FILES['imagen'] ['name'];
	$ruta = $_FILES['imagen'] ['tmp_name'];
	$destino = "../productos/".$imagen;
	copy($ruta, $destino);

	$db = mysqli_select_db( $conexion, $db ) or die ("Error en el server");
	$query = "INSERT INTO productos (id , nombre , marca , descripcion , imagen , precio , cdarticulo) VALUES ('' , '$nombre' , '$marca' , '$descripcion' , '$imagen' , '$articulo' , '')";
	$consulta = mysqli_query($conexion, $query);

	header("Status: 301 Moved Permanently");
	header("Location: index.html");
	exit;
 ?>