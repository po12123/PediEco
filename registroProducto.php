<?php include('includes/conecta.php');
session_start();
error_reporting(0);
$varsesion = $_SESSION['Usuario'];
if($varsesion == null || $varsesion == ''){
    header("location:login.php");
    die();
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
  <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merienda+One" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="stylesheet" href="css/style-registroProducto.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.29.2/sweetalert2.all.js"></script>
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="css/stylesInd.css" rel="stylesheet">
  <link rel="shortcut icon"type="image/x-icon" href="images/favicon.ico">
  <title>Registro de producto</title>
</head>
<body>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">PediEco</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a id="x" class="active " href="#">Usuario: 
          <?php
          $res = "SELECT * FROM establecimiento WHERE Id_Establecimiento = '$varsesion'";
          $resul=mysqli_query($conecta,$res);
          while($mos=mysqli_fetch_array($resul))
          {
          echo $mos['Nombres_Establecimiento'];
          }
          ?>
          </a></li>
          <li><a id="y" class="" href="logout.php">Cerrar Sesión</a></li>
          </a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a style="display: none;" id="botonIniciarSesion" href="login.php" class="get-started-btn">
        <b>Iniciar Sesión</b> 
      </a>
        
      <div style="display: none;" id="contenedorBotonUser" class="desplegable">
        <button class="desplebutton">
          <a href="#l" id="prueba" class="get-started-btn">
            cargando...
            <i class="fas fa-chevron-down"></i>
          </a> </button>
        <!-- <i class="material-icons">expand_more </i>  -->
        <div class="options">

          <a href="#" id="logout">Cerrar Sesion</a>
        </div>
      </div>

    </div>
  </header>
  <section class="form-register">
    <div>
      <!-- class="form-control" -->
      <form  class="formulario" id="formulario" enctype="multipart/form-data" name="f1">
          <div class="form-group">
              <center><h4>REGISTRO DE PRODUCTO</h4></center>
          </div>
          <!-- Grupo: nombre del producto-->
          <div class="formulario_grupo" id="grupo_nombre">
            <label for="nombre" class="formulario_label">Nombre del producto:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="nombre" id="nombre" placeholder="Ingrese el nombre del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El nombre debe tener al menos 3 caracteres.</p>
          </div> 
          <!-- Grupo: descripcion del producto -->
          <div class="formulario_grupo" id="grupo_descripcion">
            <label for="descripcion" class="formulario_label">Descripcion del producto:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">La descripcion del producto debe tener al menos 3 caracteres.</p>
          </div> 
          <!-- Grupo: tiempo disponible -->
          <div class="formulario_grupo" id="grupo_tiempo">
            <label for="tiempo" class="formulario_label">Disponible hasta:</label>
            <div class="formulario_grupo-input">
              <input type="time" class="formulario_input" name="tiempo" id="tiempo" placeholder="Ingrese una hora">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Se debe saber hasta que hora estara disponible el producto y debe ser mayor a la hora actual.</p>
          </div> 
          <!-- Grupo: cantidad -->
          <div class="formulario_grupo" id="grupo_cantidad">
            <label for="cantidad" class="formulario_label">Cantidad disponible:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">La cantidad solo puede contener numero y debe ser mayor a 0.</p>
          </div> 
          <!-- Grupo: precio -->
          <div class="formulario_grupo" id="grupo_precio">
            <label for="precio" class="formulario_label">Precio del producto:</label>
            <div class="formulario_grupo-input">
              <input type="text" class="formulario_input" name="precio" id="precio" placeholder="Ingrese el precio del producto">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">El precio solo puede contener numeros y debe ser mayor a 0.</p>
          </div> 
            <div>
          <!-- Grupo: imagen -->
          <div class="formulario_grupo" id="grupo_imagen">
            <label for="imagen" class="formulario_label">Imagen del producto:</label>
            <div class="formulario_grupo-input">
            <input accept="image/png, image/jpeg" type="file" class="formulario_input_file" name="imagen" id="imagen">
              <i class="formulario_validacion-estado fas fa-times-circle"></i>
            </div>
            <p class="formulario_input-error">Es obligatorio subir una imagen del producto.</p>
          </div> 
          <!-- Grupo: boton-->  
          <div class="formulario_grupo formulario_grupo-btn-enviar">
            <button type="submit" class="formulario_btn">Registrar</button>
            <button type="button" class="formulario_btn" onclick="window.location.href='catalogoAdmin.php'">Atras</button>
          </div>
          <!-- Grupo: mensaje error-->  
          <div class="formulario_mensaje" id="formulario_mensaje">
				    <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
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
  <script> var idUser=<?php echo $varsesion?>; </script>
  <script src="js/script-registroProducto.js"></script>
</body>
<script src="vendor/aos/aos.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
<script src="js/main.js"></script>
<script>

    window.addEventListener('scroll', () => {
      const scrolled = window.scrollY;

      console.log(scrolled);
      if (scrolled < 500) {
        y.classList.remove('active')
        x.classList.add('active')
      }
      if (scrolled > 500) {
        y.classList.add('active')
        x.classList.remove('active')
      }

    })

  </script>
</html>