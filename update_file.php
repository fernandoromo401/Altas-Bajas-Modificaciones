<script>
	alert('El producto se modificó');
</script>
<?php 
	include('../conexion.php');

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$marca = $_POST['marca'];
	$descripcion = $_POST['descripcion'];
	$articulo = $_POST['articulo'];
	$imagen = $_FILES['imagen'] ['name'];
	$ruta = $_FILES['imagen'] ['tmp_name'];
	$destino = "../productos/".$imagen;
	copy($ruta, $destino);

	$db = mysqli_select_db( $conexion, $db ) or die ("Error en el server");
	$query = "UPDATE productos SET nombre='$nombre', marca='$marca' ,descripcion='$descripcion' , imagen='$imagen' , precio='$articulo' WHERE id='$id'";
	$consulta = mysqli_query($conexion, $query);

	header("Status: 301 Moved Permanently");
	header("Location: update.html");
	exit;
 ?>