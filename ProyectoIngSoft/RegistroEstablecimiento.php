<?php
include 'includes/conecta.php';
error_reporting(0);
if (isset($_REQUEST['guardar'])) {
    if (isset($_FILES['foto']['name'])) {
        $nombreEstablecimiento = $conecta -> real_escape_string($_POST['NombreEstablecimiento']);
        $direccionEstablecimiento = $conecta -> real_escape_string($_POST['DireccionEstablecimiento']);
        $nombreEncargado = $conecta -> real_escape_string($_POST['NombreEncargado']);
        $apellidosEncargado = $conecta -> real_escape_string($_POST['ApellidosEncargado']);
        $numeroCelular = $conecta -> real_escape_string($_POST['NumeroCelular']);
        $emailEncargado = $conecta -> real_escape_string($_POST['EmailEncargado']);
        $passwordEncargado = $conecta -> real_escape_string(md5($_POST['PasswordEncargado']));
        $permiso = 0;
        $calificacion = 0;
        $tamanoArchivo = $_FILES['foto']['size'];
        $imagenSubida = fopen($_FILES['foto']['tmp_name'], 'r');
        $binariosImagen = fread($imagenSubida, $tamanoArchivo);
        $binariosImagen = mysqli_escape_string($conecta, $binariosImagen);
        $query = "INSERT INTO establecimiento (Nombres_Establecimiento, Direccion_Establecimiento, Nombre_Encargado, 
        Apellidos_Encargado, NumeroCelular_Encargado,Email_Encargado, Password_Encargado, Permiso, Calificacion, Logo) 
        values ('$nombreEstablecimiento','$direccionEstablecimiento', '$nombreEncargado', '$apellidosEncargado', 
        '$numeroCelular','$emailEncargado','$passwordEncargado','$permiso','$calificacion','$binariosImagen')";
        $res = mysqli_query($conecta, $query);
        if ($res) {
?>
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                Registro insertado exitosamente
            </div>
        <?php
        } else {
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                Error <?php echo mysqli_error($conecta); ?>
            </div>
<?php

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
  <link rel="stylesheet" href="css/style.css">
  <title>Registro de establecimiento</title>
</head>
<body>
  <section class="form-register">
    
    <div>
      

      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
              <center><h4>REGISTRO DE ESTABLECIMIENTO</h4></center>
              <h5>Nombre del establecimiento:</h5>
              <input type="text" name="NombreEstablecimiento" placeholder="Ingrese el Nombre" class="form-control controls" required>
              <h5>Direccion:</h5>    
              <input type="text" name="DireccionEstablecimiento" placeholder="Ingrese la direccion" class="form-control controls" required>
              <h5>Nombre del encargado:</h5>
              <input type="text" name="NombreEncargado" placeholder="Ingrese el nombre del encargado" class="form-control controls" required>
              <h5>Apellidos del encargado:</h5>
              <input type="text" name="ApellidosEncargado" placeholder="Ingrese los apellidos del encargado" class="form-control controls" required>
              <h5>Telefono:</h5>
              <input type="number" name="NumeroCelular" placeholder="Ingrese el numero de telefono" class="form-control controls" required>
              <h5>Correo electronico:</h5>
              <input type="text" name="EmailEncargado" placeholder="Ingrese el correo electronico" class="form-control controls" required>
              <h5>Contraseña:</h5>
              <input type="password" name="PasswordEncargado" placeholder="Ingrese una contraseña" class="form-control controls" required>
              <h5>Logo:</h5>
              <input type="file" class="form-control-file" name="foto">
          </div>
          <div class="form-group">
              <button><input class="botons" type="submit" value="Registrar" name="guardar"></button>
              <button><input class="botons" type="submit" value="atras"></button>
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
</body>
</html>
