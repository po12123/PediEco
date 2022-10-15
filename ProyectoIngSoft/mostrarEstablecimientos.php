<?php
include('includes/conecta.php');
session_start();
?>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
</head>

<body>


<table>

<tr><th colspan="6"><h1>Listado de establecimientos</h1></th></tr>
<tr>

<th>Nombre</th>
<th>Descripcion</th>
<th>Direccion</th>
<th>Calificacion</th>

</tr>

<?php

$sql= "SELECT * FROM establecimiento";
$resultado=mysqli_query($conecta,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
   <td><?php echo $mostrar['Nombres_Establecimiento'] ?></td>
	<td><?php echo $mostrar['Descripcion_Establecimiento'] ?></td>
    <td><?php echo $mostrar['Direccion_Establecimiento'] ?></td>
	<td><?php echo $mostrar['Calificacion']; ?></td>
   <td>
      <img width="100" src="data:image/png;base64,<?php echo  base64_encode($mostrar['Logo']); ?>">
   </td>
</tr>

<?php
}
?>

</table>
</body>

</html>