<?php
error_reporting(0);
session_start();
include 'includes/conecta.php';
if (isset($_POST['registrar'])) {
   $numero = 0;
   $nombreCliente = $conecta -> real_escape_string($_POST['Nombre']);
   $apellidoCliente = $conecta -> real_escape_string($_POST['Apellidop']);
   $numCelCliente = $conecta -> real_escape_string($_POST['Telefono']);
   $emailCliente = $conecta -> real_escape_string($_POST['Email']);
   $password = $conecta -> real_escape_string(md5($_POST['Password']));
   $insertar = "INSERT INTO clientes (Nombres_Cliente, Apellidos_Cliente, NumeroCelular_Cliente, 
   Email_Cliente, Password_Cliente) VALUES ('$nombreCliente', '$apellidoCliente', '$numCelCliente', 
   '$emailCliente', '$password')"; 
   $guardar = $conecta -> query($insertar);
  if($guardar > 0){
    $numero = 1;
    
  }else{
    $numero = 0;
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
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="css/style-registroCliente.css">
  <title>Registro de cliente</title>
</head>
<body>
  <section class="form-register">
    
    <div>
      

      <form method="post" enctype="multipart/form-data">
          <div class="form-group">
              <center><h4>REGISTRO DE CLIENTE</h4></center>
              <h5>Nombre:</h5>
              <input type="text" name="Nombre" placeholder="Ingrese el Nombre" class="form-control controls" required>
              <h5>Apellidos:</h5>    
              <input type="text" name="Apellidop" placeholder="Ingrese los apellidos" class="form-control controls" required>
              <h5>Telefono:</h5>
              <input type="text" name="Telefono" placeholder="Ingrese el numero de telefono" class="form-control controls" required>
              <h5>Correo electronico:</h5>
              <input type="text" name="Email" placeholder="Ingrese el correo electronico" class="form-control controls" required>
              <h5>Contraseña:</h5>
              <input type="password" name="Password" placeholder="Ingrese una contraseña" class="form-control controls" required>
          </div>
          <div class="form-group">
              <button><input class="botons" type="submit" value="Registrar" name="registrar" id="registrado"></button>
              <a class="botons" href="logout.php">Atras</a>
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