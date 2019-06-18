<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="index.css">
</head>
<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "productos";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM productos WHERE nombre LIKE '' ORDER By id LIMIT 5";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM productos WHERE id LIKE '%$q%' OR nombre LIKE '%$q%' OR marca LIKE '%$q%' OR precio LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<br><table>
    			<thead>
    				<tr id='titulo'>
    					<td>Fotos</td>
    					<td>Productos</td>
    					<td>Marcas</td>
    					<td>N° Artículo</td>
    					<td>Eliminar</td>
    				</tr><hr>

    			</thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td><img width='40' height='40' src=../productos/".$fila['imagen']."></td>
    					<td>".$fila['nombre']."</td>
    					<td>".$fila['marca']."</td>
    					<td>".$fila['precio']."</td>
    					<td><a style='text-decoration: none;
            color: red;' href='delete_file.php?id=".$fila['id']."'>x</a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="<br>No hay datos en el Catalogo";
    }


    echo $salida;

    $conn->close();



?>