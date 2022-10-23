<?php
include 'includes/conecta.php';
// consulta
$consulta = "SELECT * FROM producto";
$guardar = $conecta->query($consulta);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Bienvenido al sistema</title>
  </head>
  <body>
  <div class="container py-4">
       <h3>Crear una tabla con Php</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link" href="principal.php">Validación de sesión</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="tabla.php">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
               <h3 class="text-center"> Tabla Dinamica</h3>
               <div class="table-responsive table-hover" id="TablaConsulta">
                  <table class="table">
                      <thead class="text-muted">
                           <th class="text-center">Nombre</th>
                           <th class="text-center">Descripcion</th>
                           <th class="text-center">Tiempo Disponible</th>
                           <th class="text-center">Cantidad disponible</th>
                           <th class="text-center">Precio</th>
                           <th class="text-center">Imagen</th>
                      </thead>
                      <tbody>
                         <?php while($row = $guardar->fetch_assoc()){?>
                         <tr>
                            <td><?php echo $row['Nombres_Producto']; ?></td>
                            <td><?php echo $row['Descripcion_Producto']; ?></td>
                            <td><?php echo $row['Tiempo_Disponible']; ?></td>
                            <td><?php echo $row['Cantidad_Producto']; ?></td>
                            <td><?php echo $row['Precio_Producto']; ?></td>
                            <td><?php echo $row['Imagen_Producto']; ?></td>
                         </tr>
                       <?php } ?>
                      </tbody>
                  </table>
               </div>
           </div>
       </div>
    </div>
</body>