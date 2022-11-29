<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="css/style-login.css">
    <link href="css/stylesInd.css" rel="stylesheet">
    
    <!-- Google Fonts -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
   <link rel="shortcut icon"type="image/x-icon" href="images/favicon.ico">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
   
  </head>
   <body>
    
    <div id="contenedor-flex" >
        <div id="contenedor-imagen">
          
          
          <img src="images/comidas.png"  alt="" width="100%" height="100%" >
         
         
        </div>
        
        <div id="contenedor-lateral">
            <div id="contenedor-form">
            <a class="texto-encima" href="index.php"><strong>PediEco</strong></a>
             <h1 id="titulo"><b>Iniciar Sesión<b></h1>
              <p>Bienvenido a tu aventura de compras!!</p><br>
             <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-register" id="form">
             
              <div class="group">
                <!-- <label>Correo Electronico</label><br> -->
                <input type="text" id="correo" spellcheck="false" name="usuario" placeholder="Correo Electrónico"required 
                pattern =".+@(gmail|hotmail|outlook).(com|es)" title = "ingrese nombre">
                
              </div>
              <div class="group">
                <!-- <label>Contraseña</label><br> -->
                <input type="password" id="contraseña" name="pass" spellcheck="false" placeholder="Contraseña" required title="ingrese contraseña">
                
              </div>
              
              
              <p>¿No tienes cuenta?</p>
              <p><a href="registroCliente.php"> Registrate como Cliente</a></p>
              <p><a href="registroEstablecimiento.php"> Registrate como Establecimiento</a></p>
              <a onclick="ingresar()" class="button buttonBlue" name="entrar">Ingresar</a>
              </form>
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-register" id="form2">
              <p><a id="consultar" onclick="mostrar()" name="olv"> ¿Olvidaste tu contraseña?</a></p>
              <div class="group ocultar" id="correoOcult">
                <input type="text" id="corr" spellcheck="false" name="correito" placeholder="Correo Electrónico" 
                pattern =".+@(gmail|hotmail|outlook).(com|es)" title = "ingrese correo asociado">
                
              </div>
              <div class="group ocultar" id="telefonoOcult">
                <input type="number" id="celular" name="cel" spellcheck="false" placeholder="Celular"  title="ingrese celular asociado">
              </div>
              <div class="ocultar" id="verifOcult">
              <a onclick="verificarCelular()" class="button buttonBlue" name="verifCuenta" >Verificar</a>
              </div>
              <div class="group ocultar2" id="cambContr">
                <input type="password" id="contraNueva" name="contraNew" spellcheck="false" placeholder="Contraseña" title="ingrese nueva contraseña">
              </div>
              <div class="ocultar2" id="cambiarContr">
              <a onclick="cambiarContraseña()" class="button buttonBlue" name="cambiarContra">Establecer nueva contraseña</a>
              </div>
            </form>
            </div>
        </div>
    </div>
    
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/script-login.js"></script>
  
  <script>
    function mostrar(){
      document.getElementById('correoOcult').style.display = 'block';
      document.getElementById('telefonoOcult').style.display = 'block';
      document.getElementById('verifOcult').style.display = 'block';
    }
  </script>
  
</body>
</html>