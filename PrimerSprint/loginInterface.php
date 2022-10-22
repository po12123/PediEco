<?php
session_start();
error_reporting(0);
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/login-prueba.css">
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
   </head>
   <body>
    <div id="contenedor-flex">
        <div id="contenedor-imagen">
          <a class="texto-encima" href=""><strong>PediEco</strong></a>
          
          <img src="images/ImgLogin.png"  alt="" width="100%" height="100%" >
         
         
        </div>
        
        <div id="contenedor-lateral">
            <div id="contenedor-form">
    
             <h1 id="titulo"><b>Iniciar Sesión<b></h1>
              <p>Bienvenido a tu aventura de compras!!</p><br>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-register" id="form" onsubmit="return validarForm();">
             
              <div class="group">
                <!-- <label>Correo Electronico</label><br> -->
                <input type="text" id="correo" spellcheck="false" name="usuario" placeholder="Correo Electrónico"required 
                pattern =".+@(gmail|hotmail|outlook).(com|es)" title = "ingrese nombre">
                
              </div>
              <div class="group">
                <!-- <label>Contraseña</label><br> -->
                <input type="password" id="contrasenia" name="pass" spellcheck="false" placeholder="Contraseña" required title="ingrese contraseña">
                
              </div>
              
              <p>¿No tienes cuenta?</p>
              <p><a href="registroCliente.php"> Registrate como Cliente</a></p>
              <p><a href="RegistroEstablecimiento.php"> Registrate como Establecimiento</a></p>
              <button type="submit" class="button buttonBlue" name="entrar">Ingresar</button>
             </form>
            </div>
        </div>
    </div>
  <script src="js/validarFormu.js"></script>
  
</body>
</html>