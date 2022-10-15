<?php
session_start();
error_reporting(0);
// llamar ala conexión de base de datos
include 'includes/conecta.php';
if(isset($_POST['entrar'])){
$usuario = $conecta->real_escape_string($_POST['usuario']);
$usuario2 =  $conecta->real_escape_string($_POST['usuario']);
$password = $conecta->real_escape_string(md5($_POST['pass']));
$password2 = $conecta->real_escape_string(md5($_POST['pass']));
// generar una consulta que extraigo los datos de la bd
$consulta = "SELECT * FROM clientes WHERE Email_Cliente = '$usuario' and Password_Cliente = '$password'";
$consulta2 = "SELECT * FROM establecimiento WHERE Email_Encargado = '$usuario2' and Password_Encargado = '$password2'";
if($resultado = $conecta->query($consulta)){
   while($row = $resultado->fetch_array()){
     $userok = $row['Email_Cliente'];
     $passwordok = $row['Password_Cliente'];
     $idok = $row['Id_Clientes'];
   }
   $resultado->close();
}
if($resultado2 = $conecta->query($consulta2)){
   while($row2 = $resultado2->fetch_array()){
    $userok2 = $row2['Email_Encargado'];
    $passwordok2 = $row2['Password_Encargado'];
    $idok2 = $row2['Id_Establecimiento'];
  }
}
$conecta->close();

if((isset($usuario) && isset($password))||(isset($usuario2) && isset($password2))){
  if($usuario == $userok &&  $password == $passwordok ){
    $_SESSION['login'] = TRUE;
    $_SESSION['Usuario'] = $idok;
    header("location:mostrarProductos.php");
  }else{
    if($usuario2 == $userok2 && $password2 == $passwordok2){
      $_SESSION['login'] = TRUE;
      $_SESSION['Usuario'] = $idok2;
      header("location:RegistroProducto.php");
    }
    else {
      $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                 <strong>Error no se encontraron tus datos</strong> Por favor verifica tus datos.
                 <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                 <span aria-hidden='true'>&times;</span>
                </button>
                 </div>";
       }
  }
}
else{
  $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
             <strong>Error no se encontraron tus datos</strong> Por favor verifica tus datos.
             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
            </button>
             </div>";
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
    <title>Login de Usuario</title>
  </head>
  <body>
  <div class="container py-4">
     <div class="row justify-content-center h-100 py-4">
         <div class="card col-sm-6 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-white rounded">
            <article class="card-body">
                <h4 class="card-title text-center">Login al sistema</h4>
                <hr>
                <p class="text-success text-center">Digita tus credenciales</p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="form-grup">
                     <div class="input-group">
                       <input type="text" name="usuario" placeholder="Usuario" class="form-control">
                     </div>
                     <div class="input-group py-2">
                       <input type="password" name="pass" placeholder="Password" class="form-control">
                     </div>
                     <div class="input-group">
                       <input type="submit" name="entrar" value="Entrar" class="btn btn-sm btn-success btn-block">
                     </div>
                  </div>
                </form>
            </article>
         </div>
     </div>
     <?php echo $mensaje; ?>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/preloader.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  </body>
</html>