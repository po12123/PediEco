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
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>PediEco</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<meta content="" name="keywords">
    <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
	<link href="css/style-login.css" rel="stylesheet">
</head>
<body>

	<main class="main-registro">
		<img src="images/TituloPediEco1.png" class = "registro-titulo" alt="">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id= "formulario">
			

			 <div class="seccion-input">
        <img src="images/ingresar_correo-removebg-preview.png" class="Subtitulo" alt="Email">
				<input class="input-correo" type="text" spellcheck="false" name="usuario" placeholder="Correo Electrónico (obligatorio)"  >
				<p class="mensaje-error m-correo"></p>
			 </div>

			 <div class="seccion-input ultimo-input">
        <img src="images/contra.png" alt="Contrasenia">
				<input class="input-contrasena" type="password" spellcheck="false" name="pass" placeholder="Contraseña (obligatorio)"    >
				<p class="mensaje-error m-contrasena"></p>
				<button class="boton-ojo ocultar-contrasena" type="button"></button>
			 </div>

			 <button class="boton-registrarse" type="submit" name="entrar">INICIAR SESION</button>

			
      <p class="pregunta">¿No tienes cuenta?</p>
      <p class="pregunta"><a href="registroCliente.php"> Registrate como Cliente</a></p>
      <p class="pregunta"><a href="RegistroEstablecimiento.php"> Registrate como Establecimiento</a></p>
		</form>
    <div id="imagenes">
      <img src="images/reloj.png" id="reloj" >
      <img src="images/lechuga.png" id="lechuga" >
      <img src="images/zanahoria.png" id="zanahoria" >
      <img src="images/hamburguesa.png" id="hamburguesa">
      </div>
      <?php echo $mensaje; ?>
	</main>

	<script type="module" src="../assets/js/script-registro.js"></script>
</body>
</html>
