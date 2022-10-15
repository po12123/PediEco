<?php
error_reporting(0);
include 'includes/conecta.php';
if(isset($_POST['registrar'])){
    $nombreCliente = $conecta -> real_escape_string($_POST['Nombre']);
    $apellidoCliente = $conecta -> real_escape_string($_POST['Apellidop']);
    $numCelCliente = $conecta -> real_escape_string($_POST['Telefono']);
    $emailCliente = $conecta -> real_escape_string($_POST['Email']);
    $password = $conecta -> real_escape_string(md5($_POST['Password']));
    $insertar = "INSERT INTO clientes (Nombres_Cliente, Apellidos_Cliente, NumeroCelular_Cliente, Email_Cliente, Password_Cliente) VALUES
    ('$nombreCliente', '$apellidoCliente', '$numCelCliente', '$emailCliente', '$password')";
    $guardar = $conecta -> query($insertar);
    if($guardar > 0){
        $mensaje.="<h3 class='text-success'> Tu registro se realizo con exito </h3>";
    }else{
        $mensaje.="<h3 class='text-danger'> Tu registro no se realizo con exito </h3>";
    }
}
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
               <a class="nav-link" href="tabla.php">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 class="text-center">Registro con php y mysql</h4>
              <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   <input type="text" name="Nombre" placeholder="Nombre" class="form-control" required>
                   <input type="text" name="Apellidop" placeholder="Apellido Paterno" class="form-control" required>
                   <input type="tel" name="Telefono" placeholder="Telefono" class="form-control" required>
                   <input type="text" name="Email" placeholder="Email" class="form-control" required>
                   <input type="password" name="Password" placeholder="Password" class="form-control" required>
                   <input type="submit" name="registrar" value="registrar" class="btn btn-sm btn-block btn-success">
              </form>
           </div>
           <?php echo $mensaje; ?>
      </div>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/preloader.js"></script>
      <script src="js/main.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      </body>
    </html>