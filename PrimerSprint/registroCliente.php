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
              <input type="text" minlength ="3" maxlength="40" name="Nombre" placeholder="Ingrese el Nombre" 
              class="form-control controls" required="" pattern ="[a-zA-Z ñÑ]+" title= " ingrese un nombre correcto">
              <h5>Apellidos:</h5>    
              <input type="text" minlength ="3" maxlength="40" name="Apellidop" placeholder="Ingrese los apellidops" 
              class="form-control controls" required pattern ="[a-zA-Z ñÑ]+" title= " ingrese un apellido correcto">
              <h5>Telefono:</h5>
              <input type="text" min="60000000"  max="79999999" name="Telefono" placeholder="Ingrese el numero de telefono" 
              class="form-control controls" required pattern ="[0-9]+" title = "ingrese un numero valido">
              <h5>Correo electronico:</h5>
              <input type="text" name="Email" placeholder="Ingrese el correo electronico" 
              class="form-control controls" required pattern =".+@(gmail|hotmail|outlook).(com|es)" title = "ingrese un correo valido">
              <h5>Contraseña:</h5>
              <input type="password" minlength = "8" maxlength="40" name="Password" 
              placeholder="Ingrese una contraseña" class="form-control controls" required pattern = "(?=.*[a-zñÑ0-9])(?=.*[A-Z])(?=.*[!@#$&]).{8,40}" title = "Ingrese una contraseña válida: Min 8 caracteres, max 40. Al menos una letra mayúsucula y un carácter especial(!@#$&)">
              <h5>Confirmar contraseña:</h5>
              <input type="password" minlength = '8' name="PassworConfirm" 
              placeholder="Confirmar contraseña" class="form-control controls" required>
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
</body>
</html>