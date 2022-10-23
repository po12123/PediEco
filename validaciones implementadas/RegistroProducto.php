<?php
include 'includes/conecta.php';
session_start();
error_reporting(0);
$varsesion = $_SESSION['Usuario'];
if($varsesion = null || $varsesion = ''){
    echo 'No puede acceder aqui sin haber iniciado sesion';
    die();
}
if (isset($_POST['guardar'])) {
    if (isset($_FILES['foto']['name'])) {
        $numero = 0;
        $nombreProducto = $conecta -> real_escape_string($_POST['NombreProducto']);
        $descripcionProducto = $conecta -> real_escape_string($_POST['DescripcionProducto']);
        $tiempoDisponible = $conecta -> real_escape_string($_POST['TiempoProducto']);
        $cantidadProducto = $conecta -> real_escape_string($_POST['CantidadProducto']);
        $precioProducto = $conecta -> real_escape_string($_POST['PrecioProducto']);
        $disponibleProducto = True;
        $idestablecimiento = $_SESSION['Usuario'];
        $tamanoArchivo = $_FILES['foto']['size'];
        $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
        $binariosImagen = mysqli_escape_string($conecta, $binariosImagen);
        $query = "INSERT INTO producto (Nombres_Producto, Descripcion_Producto, Tiempo_Disponible, Cantidad_Producto, Precio_Producto ,Imagen_Producto, Disponible_Producto, Id_Establecimiento) values ('$nombreProducto','$descripcionProducto', '$tiempoDisponible', '$cantidadProducto', '$precioProducto','$binariosImagen','$disponibleProducto', '$idestablecimiento')";
        $res = $conecta -> query($query);
        if ($res > 0) {
            $numero = 1;
        } else {
            $numero = 0;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
  <link rel="stylesheet" href="css/style-registrarProducto.css">
  <title>Registro de producto</title>
</head>
<body>
  <section class="form-register">
    
    <div>
      

      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            
              <center><h4>REGISTRO DE PRODUCTO</h4></center>
              <?php echo $_SESSION['Usuario']?>
              <h5>Nombre:</h5>
              <input type="text" name="NombreProducto" placeholder="Ingrese el Nombre" class="form-control controls" required pattern ="[a-zA-Z]+" title = "ingrese un nombre valido">
              <h5>Descripcion:</h5>    
              <input type="text" name="DescripcionProducto" placeholder="Ingrese la descripcion" class="form-control controls" required  pattern = "[a-zA-Z]+" title = "ingrese una descripcion valida">
              <!--
              <h5>Sucursal:</h5>
             <select class="form-control" name="SucursalProducto">
                  <option value=""> Selecciona una sucursal </option>
                  
              </select>
                  //-->
              <h5>Tiempo disponible:</h5>
              <input type="time" name="TiempoProducto" placeholder="Ingrese el tiempo disponible" class="form-control controls" required>
              <h5>Cantidad:</h5>
              <input type="number" name="CantidadProducto" placeholder="Ingrese la Cantidad" class="form-control controls" required pattern ="[1-9]+" title = "ingrese como minimo 1 producto">
              <h5>Precio:</h5>
              <input type="number" name="PrecioProducto" placeholder="Ingrese el Precio" class="form-control controls" required pattern ="[0-9]+" title = "ingrese precio valido">
              <h5>Imagen:</h5>
              <input type="file" class="form-control-file" name="foto" required>
          </div>
          <div class="form-group">
              <button><input class="botons" type="submit" value="Registrar" name="guardar"></button>
              <a class="botons" href="logout.php">LogOut</a>
          </div>
      </form>
      <div id="imagenes">
      <img src="images/reloj.png" id="reloj" >
      <img src="images/lechuga.png" id="lechuga" >
      <img src="images/zanahoria.png" id="zanahoria" >
      <img src="images/hamburguesa.png" id="hamburguesa">
      </div>
    </div>
    
  </section>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    var x = <?php echo $numero;?>;
  </script>
  <script src="js/sweetAlert.js"></script>
</body>
</html>
