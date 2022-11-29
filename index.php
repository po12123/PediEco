<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PediEco</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <script src="https://kit.fontawesome.com/e1004dd04e.js" crossorigin="anonymous"></script>
  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
   <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>

  <!-- Vendor CSS Files -->
  <link href="vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="vendor/aos/aos.css" rel="stylesheet">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="shortcut icon"type="image/x-icon" href="images/favicon.ico">

  <link href="css/stylesInd.css" rel="stylesheet">
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.php">PediEco</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a id="x" class="active " href="#">Inicio</a></li>
          <li><a id="y" class="" href="#about">Nosotros</a></li>
          

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
  </header><!-- End Header -->
  <section id="log1" class="d-flex justify-content-center align-items-center">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Si fuera tu no me lo pensaria dos veces,<br>elige tu mejor producto.</h1>
      <h2>Te enseñamos presentamos los mejores <br> productos ,comidas, cafes  con un sabor inigualable<br>¿listo para adquirir?
      </h2>
      
    </div>
  </section><!-- End Hero -->
  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="log3" class="log3">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src = "images/log3.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" id="about">
            <h3>¿Quiénes somos nosotros?</h3>
            <p class="fst-italic">
              Somos un grupo que desea satisfacer su necesidad con productos, comidas y cafes de variedad.
             </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> Te presentamos los mejores y deliciosos cafes.</li>
              <li><i class="bi bi-check-circle"></i> Las mejores comidas a un precio economico con varias clasificaciones.</li>
              <li><i class="bi bi-check-circle"></i>Encuentra la variedad de productos  con un precio accesible</li>
            </ul>
            <p>
              Todo este sistema de ventas está organizado por tipos ,clasificaciones para que puedas adquir de foma directa personal o compra online
            </p>

          </div>
        </div>

      </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>PediEco</h3>
            <p>
              TeamSoft<br><br>
              <strong>Email:</strong> Teamsoft@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Catalogo</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Inicio</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Nosotros</a></li>

            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>.</h4>

          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Ingrese al Catalogo</h4>
            
            <p>Puedes empezar tu aventura desde aquí</p>
            <a href="catalogo.php" id="g" class="btn-get-started">Ingresa al Catalogo</a>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">

        <div class="credits">
          Designed by <strong><a href="#">TeamSoft</a></strong>
        </div>
      </div>

    </div>
  </footer><!-- End Footer -->


  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

  <!-- Vendor JS Files -->
  <script src="vendor/aos/aos.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/purecounter/purecounter.js"></script>
  <script src="vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <!--
  <script type="module" src="assets/js/inicio.js"></script>
  -->
  <script type="module">
    //CODIGO DE RECUPERACION DEL USUARIO
    import { initializeApp, onLog } from "https://www.gstatic.com/firebasejs/9.4.0/firebase-app.js";
    import { getAuth, signOut, onAuthStateChanged, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "https:www.gstatic.com/firebasejs/9.4.0/firebase-auth.js"
    import { getDatabase, ref, get, set, child, update, remove, onChildAdded, onChildChanged, onChildRemoved } from "https://www.gstatic.com/firebasejs/9.1.2/firebase-database.js";
    

    const firebaseConfig = {
      apiKey: "AIzaSyAd6JDsbBWEBv_UFCpgNi9zKEjqgiGytTE",
      authDomain: "pyxcel-d6df9.firebaseapp.com",
      databaseURL: "https://pyxcel-d6df9-default-rtdb.firebaseio.com",
      projectId: "pyxcel-d6df9",
      storageBucket: "pyxcel-d6df9.appspot.com",
      messagingSenderId: "953396754317",
      appId: "1:953396754317:web:321620a07c7577f5eb6fc4",
      measurementId: "G-46CQF62KX4"
    };
    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const auth = getAuth(app);
    const btnVer = document.getElementById('z');
    const btnVer2 = document.getElementById('k');
    const btnVer3 = document.getElementById('f');
    const btnVer4 = document.getElementById('g');
    onAuthStateChanged(auth, (user) => {
      let botonIniciarSesion = document.getElementById("botonIniciarSesion");
      let botonUser = document.getElementById("contenedorBotonUser");
      if (user) {
        botonUser.style.display = 'block';
        botonIniciarSesion.style.display = 'none';
        const cont = document.getElementById("logout")
        cont.addEventListener('click', (e) => {
          signOut(auth);
        });
        const dbref = ref(db);
        get(child(dbref, "Usuarios/" + user.uid)).then((snapshot) => {
          console.log(user);
          if (snapshot.exists()) {
            let text = document.getElementById("prueba");
            text.innerHTML = snapshot.val().nombre+'<i class="fas fa-chevron-down"></i>';
          } else {
            console.log("No se encontro el elemento");
          }
        })
          .catch((error) => {
            console.log("unsucessfull, error" + error);
          });
      } else {
        botonUser.style.display = 'none';
        botonIniciarSesion.style.display = 'block';
        btnVer.addEventListener('click', (e) => {
          window.alert('No iniciaste sesión aún, así que se le redireccionará a la página principal');
          // signOut(auth);
        });
        btnVer2.addEventListener('click', (e) => {
          window.alert('No iniciaste sesión aún, así que se le redireccionará a la página principal');
          // signOut(auth);
        });
        btnVer3.addEventListener('click', (e) => {
          window.alert('No iniciaste sesión aún, así que se le redireccionará a la página principal');
          // signOut(auth);
        });
        btnVer4.addEventListener('click', (e) => {
          window.alert('No iniciaste sesión aún, así que se le redireccionará a la página principal');
          // signOut(auth);
        });
      }
    });

   </script>
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

</body>

</html>
