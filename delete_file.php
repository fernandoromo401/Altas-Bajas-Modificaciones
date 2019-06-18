<script>
	alert('El producto se eliminó')
</script>
<?php 
include('../conexion.php');

$id = $_GET['id'];

$db = mysqli_select_db( $conexion, $db ) or die ("Error en el server");
	$query = "DELETE FROM productos WHERE id='$id'";
	$consulta = mysqli_query($conexion, $query);

	header("Location: delete.html");
	exit;

 ?>

