<!DOCTYPE html>
<?php session_start(); 
$usu = $_SESSION['usuario'];
$idexamen = $_SESSION['idexamen'];
$i = $_SESSION['i'];
//echo $idexamen;
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Herpic - contact</title>

  <!-- Bootstrap core CSS -->
  <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="../../css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand"><img src="../../img/logo.png" height="45" width="45"> Herpic</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="cancelexamen.php">CANCELAR</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../../img/examen.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>NUEVO EXAMEN</h1>
            <span class="subheading">Crear y sube un nuevo examen</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->

<?php
  //Abrimos un if para controlar el bucle que hemos creado manualmente
  if ($i < 10) {
?>

  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Escriba la pregunta y las respuestas. Si la respuesta es de desarrollo, por favor marque la opción "respuesta larga".</p>
        <p>El examen tiene <?php echo $i; ?> preguntas. </p>
        <form name="sentMessage" novalidate action="newexam.php" method="POST">
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Pregunta</label>
              <input maxlength="100" type="text" class="form-control" placeholder="Pregunta" id="pregunta" name="pregunta" required data-validation-required-message="Por favor, escriba la pregunta.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Respuesca correcta</label>
              <input maxlength="50" type="text" class="form-control" placeholder="Respuesta correcta" id="respuestac" name="respuestac" required data-validation-required-message="Por favor, escribe la respuesta correcta.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Respuesta incorrecta 1</label>
              <input maxlength="50" type="text" class="form-control" placeholder="Respuesta incorrecta 1" id="respuestai1" name="respuestai1" required data-validation-required-message="Por favor, escribe la respuesta incorrecta.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Respuesta incorrecta 2</label>
              <input maxlength="50" type="text" class="form-control" placeholder="Respuesta incorrecta 2" id="respuestai2" name="respuestai2" required data-validation-required-message="Por favor, escribe la respuesta incorrecta.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Respuesta incorrecta 3</label>
              <input maxlength="50" type="text" class="form-control" placeholder="Respuesta incorrecta 3" id="respuestai3" name="respuestai3" required data-validation-required-message="Por favor, escribe la respuesta incorrecta.">
              <p class="help-block text-danger"></p>
            </div>
          </div>
          <br>
          <label>Tipo</label>
                <select name="tipo" require>
                    <option value="0">Test</option>
                    <option value="1">Respuesta larga</option>
                </select>
                  <p class="help-block text-danger"></p>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<hr>

<?php
  //Cierre del if que hace el bucle
  }

  //Aqui abrimos otro if, que controla que ya tenemos 10 preguntas
  elseif ($i == 10) {
    ?>
    <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>El examen ya está completado.</p>
        <form name="sentMessage" novalidate action="../profesor.php">
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Finalizar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<hr>
<?php
// Aquí cerramos el elsif
  }

?>

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
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="../../js/jqBootstrapValidation.js"></script>
  <script src="../../js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../../js/clean-blog.min.js"></script>

</body>
</html>