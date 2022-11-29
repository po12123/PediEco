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
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style-catalogo.css">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
   <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Merienda+One" />
   <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="css/stylesInd.css" rel="stylesheet">
  
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
          $res = "SELECT * FROM clientes WHERE Id_Clientes = '$varsesion'";
          $resul=mysqli_query($conecta,$res);
          while($mos=mysqli_fetch_array($resul))
          {
          echo $mos['Nombres_Cliente'];
          echo ' ';
          echo $mos['Apellidos_Cliente'];
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
<div class="container">

   <h3 class="title"></h3>
   
   <div class="products-container">
   <?php
   $sql= "SELECT * FROM producto";
   $resultado=mysqli_query($conecta,$sql);
   
    while($mostrar=mysqli_fetch_array($resultado))
    {
        $datosEstab = "SELECT * FROM establecimiento WHERE Id_Establecimiento = $mostrar[Id_Establecimiento]";
        if($result = $conecta->query($datosEstab)){
            while($row = $result->fetch_array()){
            $nombreEstab = $row['Nombres_Establecimiento'];
            } 
        $result->close();
   }
    ?>  
      <div class="product" data-name=<?php echo $mostrar['Id_Producto'] ?>>
         <img src="data:image/png;base64,<?php echo  base64_encode($mostrar['Imagen_Producto']); ?>" alt="" width="150" height="300">
         <h3><?php echo $mostrar['Nombres_Producto'] ?></h3>
         <div class="price">Precio: <?php echo $mostrar['Precio_Producto'] ?> Bs.</div>
         <div class="price">Disponible hasta: <?php echo $mostrar['Tiempo_Disponible'] ?></div>
         <div class="price">Establecimiento: <?php echo $nombreEstab ?></div>
      </div>
      <?php
    }
    ?>
   </div>
</div>
</body>
<script src="vendor/aos/aos.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>
<script src="js/script-catalogoCliente.js" defer></script>
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