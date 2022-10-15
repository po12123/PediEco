<?php include('includes/conecta.php');
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>

<body>


<table>

<tr><th colspan="8"><h1>Listado de productos</h1></th></tr>
<tr>

<th>Nombre Estab</th>
<th>Logo</th>
<th>Nombre</th>
<th>Descripcion</th>
<th>Tiempo Disponible</th>
<th>Cantidad Disponible</th>
<th>Precio</th>
<th>Imagen</th>


</tr>

<?php

$sql= "SELECT * FROM producto";
$resultado=mysqli_query($conecta,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
   $datosEstab = "SELECT * FROM establecimiento WHERE Id_Establecimiento = $mostrar[Id_Establecimiento]";
   if($result = $conecta->query($datosEstab)){
      while($row = $result->fetch_array()){
        $nombreEstab = $row['Nombres_Establecimiento'];
        $logo = $row['Logo'];
      }
      $result->close();
   }
?>
   
<tr>
<td><?php echo $nombreEstab ?></td>
<td><img width="100" src="data:image/png;base64,<?php echo  base64_encode($logo); ?>"></td>
   <td><?php echo $mostrar['Nombres_Producto'] ?></td>
	<td><?php echo $mostrar['Descripcion_Producto'] ?></td>
	<td><?php echo $mostrar['Tiempo_Disponible'] ?></td>
	<td><?php echo $mostrar['Cantidad_Producto'] ?></td>
   <td><?php echo $mostrar['Precio_Producto'] ?></td>
   <td>
      <img width="100" src="data:image/png;base64,<?php echo  base64_encode($mostrar['Imagen_Producto']); ?>">
   </td>
</tr>

<?php
}
?>

</table>
</body>

</html>