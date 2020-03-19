<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Herpic - contact</title>

  <!--Css para el login -->
  <link href="./css/login.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="./img/logo.png" height="45" width="45"> Herpic</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login/sing up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/ciudad.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row"> 
        <div class="col-lg-8 col-md-10 mx-auto">
         <div class="page-heading">
           <div class="login-page">
              <div class="form">
               <!-- registro -->
                <form class="register-form" action="registro.php" method="POST">
                  <input type="text" name="nombre" placeholder="Nombre"/>
                  <input type="text" name="apellidos" placeholder="Apellidos"/>
                  <input type="text" name="usuario" placeholder="Nombre de Usuario"/>
                  <input type="text" name="email" placeholder="Correo electrónico"/>
                  <input type="password" name="contrasenia" placeholder="Contraseña"/>
                  <button>Registrar</button>
                  <p class="message">¿Ya estás registrado? <a href="#">Iniciar sesión</a></p>
                </form>
                <!-- inicio de sesión--> 
                <form class="login-form" action="who.php" method="POST">
                  <input type="text" name="usuario" placeholder="Nombre de Usuario"/>
                  <input type="password" name="contrasenia" placeholder="Contraseña"/>
                  <button>Iniciar sesión</button>
                  <p class="message">¿No estas registrado? <a href="#">Crear una cuenta</a></p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <hr>
  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <ul class="list-inline text-center">
            <li class="list-inline-item">
              <a href="https://twitter.com/Herpico">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://github.com/Carlos-DR/ProyectoPASIR">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          <p class="copyright text-muted">Copyright &copy; Carlos Domínguez 2020</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

  <!-- Contact Form JavaScript 
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script> 

  <!-- Menú de login -->
  <script src="js/login.js"></script>
  </div>
</body>
</html>