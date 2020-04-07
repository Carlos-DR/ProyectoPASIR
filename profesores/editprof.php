<!DOCTYPE html>
<html lang="en">

<?php

  $conn = mysqli_connect('localhost', 'root', '1234', 'herpic');

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $idprof = $_POST['editar'];
  echo $idprof;
  $nom = mysqli_query($conn, "SELECT nombre FROM profesores WHERE id='$idprof'");
  $ape = mysqli_query($conn, "SELECT apellidos FROM profesores WHERE id='$idprof'");
  $usu = mysqli_query($conn, "SELECT usuario FROM profesores WHERE id='$idprof'");
  $email = mysqli_query($conn, "SELECT email FROM profesores WHERE id='$idprof'");
  $contra = mysqli_query($conn, "SELECT contrasenia FROM profesores WHERE id='$idprof'");


  mysqli_close($conn);

?>

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin - crear profesor</title>

  <!--Css para el login -->
  <link href="../css/login.css" rel="stylesheet">
  <link href="../css/select-alumno-profesor.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="../index.php"><img src="../img/logo.png" height="45" width="45"> Herpic</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Cancelar</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../img/newprof.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row"> 
        <div class="col-lg-8 col-md-10 mx-auto">
         <div class="page-heading">
           <div class="login-page">
              <div class="form">
                <!-- registro de profesores --> 
                <form class="login-form" action="crearprof.php" method="POST">
                  <input type="text" name="nombre" value="<?php echo $nom ?>"/>
                  <input type="text" name="apellidos"  value="<?php echo $ape; ?>"/>
                  <input type="text" name="usuario"  value="<?php echo $usu; ?>"/>
                  <input type="text" name="email"  value="<?php echo $email; ?>"/>
                  <input type="password" name="contrasenia"  value="<?php echo $contra; ?>"/>
                  <p>
                  <button>Editar profesor</button>
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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 

  <!-- Contact Form JavaScript 
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script> -->

  <!-- Custom scripts for this template -->
  <script src="../js/clean-blog.min.js"></script> 

  <!-- Menú de login -->
  <script src="../js/login.js"></script>
  <script src="../js/select-alumno-profesor.js"></script>
  </div>
</body>
</html>