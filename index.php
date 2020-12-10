<?php
  session_start();

  require '/servicios/database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>ARDANZA - Centro de Formaci�n Danc�stica y Cultural</title>

  <!-- Bootstrap CSS -->
  <link href="css/animate.css" rel="stylesheet">
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
  <body>
    <?php if(!empty($user)): ?>
      <br> Welcome. <?= $user['email']; ?>
      <br>You are Successfully Logged In
      <a href="logout.php">
        Logout
      </a>
      <div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2" data-parallax="scroll" data-image-src="images/banner2.jpg">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container"> 
      <!-- Brand --> 
      <a class="navbar-brand mr-auto" href="#"><img src="images/logo.png" alt="FoxPro" /></a> 
      
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
      
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="#pageTop">Inicio</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#about-us">Nosotros</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#curses">Instructores</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#contact">Contacto</a> </li>
        </ul>
        <ul class="navbar-nav ml-5">
          <li class="nav-item"> <a class="nav-link btn btn-danger" href="/servicios/login.php">Login</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="fh5co-banner-text-box">
      <div class="quote-box pl-5 pr-5 wow bounceInRight">
        <h2> ARDANZA <br><span>Danza y cultura</span> </h2>
      </div>
      	<a data-toggle="modal" data-target="#modalCurso" class="btn text-uppercase btn-outline-danger btn-lg mr-3 mb-3 wow bounceInUp"> Registro cursos </a> 
 		<a data-toggle="modal" data-target="#modalClase" class="btn text-uppercase btn-outline-danger btn-lg mb-3 wow bounceInDown"> Ingreso clases </a> </div>
 
 <div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
      <!-- Contenido ventana modal --> 
        
      </div>
      <footer class="container-fluid">
      
  <div class="container">  
    <div class="row">      
      <div class="col-md-12 footer2 wow bounceInUp" data-wow-delay=".25s" id="contact">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="form-box">
          <h4>REGISTRO CURSOS</h4>
          <table class="table table-responsive d-table">
            <tr>
              <td><input type="text" class="form-control pl-0" placeholder="NOMBRE ALUMNO" /></td>
              <td><input type="email" class="form-control pl-0" placeholder="EMAIL" /></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="NOMBRE DEL PADRE O TUTOR" /></td>
            </tr>
            <tr>
              <td><input type="text" class="form-control pl-0" placeholder="MUNICIPIO" /></td>
              <td><input type="email" class="form-control pl-0" placeholder="ESTADO" /></td>              
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="DIRECCION" /></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="TELEFONO" /></td>            
            </tr>          
            <tr>
              <td colspan="2">
              <h4 class="card-title">Curso</h4>
              	<select id="curso" name="curso">
			      <option value="1">Infantil � Let�s dance (6 a 11 a�os)</option>
			      <option value="2">Neon Steps Now (12 a�os en adelante)</option>
			      <option value="3">Professional Workspace</option>
			      <option value="4">Otro</option>
   				</select>
   			</td>
            </tr>
            <tr>
              <td colspan="2"><hr></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center pl-0"><button type="submit" class="btn btn-dark">ENVIAR</button></td>
            </tr>
          </table>
        </div>
      </div>
      
    </div>
  </div>
</footer>
    </div>
  </div>
</div>  
  
  </div>
</div>
<div class="container-fluid fh5co-network">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4 class="wow bounceInUp">Seccion sin datos</h4>
        <h2 class="wow bounceInRight">SIN DATOS</h2>
        <hr />
        <h5 class="wow bounceInLeft">Subtitulo 1</h5>
        <p class="wow bounceInDown">Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica. &amp;  Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica.</p>
      </div>
      <div class="col-md-6">
        <figure class="wow bounceInDown"> <img src="images/about-img.jpg" alt="gym" class="img-fluid" /> </figure>
      </div>
    </div>
  </div>
</div>
<div id="about-us" class="container-fluid fh5co-about-us pl-0 pr-0 parallax-window" data-parallax="scroll" data-image-src="images/about-us-bg.jpg">
  <div class="container">
    <div class="col-sm-6 offset-sm-6">
      <h2 class="wow bounceInLeft" data-wow-delay=".25s">SOBRE NOSOTROS</h2>
      <hr/>
      <p class="wow bounceInRight" data-wow-delay=".25s">Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica.</p>
      <!--  <a class="btn btn-lg btn-outline-danger d-inline-block text-center mx-auto wow bounceInDown">Learn More</a> --></div>
  </div>
</div>
<div class="container-fluid fh5co-content-box" >
  <div class="container">
    <div class="row">
      <div class="col-md-5 pr-0"><img src="images/rode-gym.jpg" alt="gym" class="img-fluid wow bounceInLeft" /> </div>
      <div class="col-md-7 pl-0">
        <div class="wow bounceInRight" data-wow-delay=".25s">
          <div class="card-img-overlay">          
            <p>Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica. </p>
          </div>
          <img src="images/gym-girls.jpg" alt="girls in gym" class="img-fluid" /> </div>
      </div>
    </div>
    <div class="row trainers pl-0 pr-0"data-wow-delay=".25s" id="curses">
      <div class="col-12 bg-50">
        <div class="quote-box2 wow bounceInDown" data-wow-delay=".25s">
          <h2> INSTRUCTORES </h2>
        </div>
      </div>
      <div class="col-md-6 pr-5 pl-5">
        <div class="card text-center wow bounceInLeft" data-wow-delay=".25s"> <img class="card-img-top rounded-circle img-fluid" src="images/trainers1.jpg" alt="Card image">
          <div class="card-body mb-5">
            <h4 class="card-title">instructor 1</h4>
            
            <p class="card-text">Detalles del instructor </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5 pr-5">
        <div class="card text-center wow bounceInRight" data-wow-delay=".25s"> <img class="card-img-top rounded-circle img-fluid" src="images/trainers2.jpg" alt="Card image">
          <div class="card-body mb-5">
            <h4 class="card-title">Instructor 2</h4>
            <p class="card-text">Detalles del instructor </p>
           </div>
        </div>
      </div>
    </div>
    <div class="row gallery">
      <div class="col-md-3">
        <div class="card"><img class="card-img-top img-fluid wow bounceInRight" data-wow-delay=".25s" src="images/g1.jpg" alt="Card image">
          <div class="card-body mb-4 wow bounceInLeft" data-wow-delay=".25s">
            <h4 class="card-title">Infantil � Let�s dance (6 a 11 a�os)</h4>
            <p class="card-text">El programa Infantil � Let�s dance de Ardanza est� dise�ado para peque�os de 6 a 11 a�os de edad, que tengan inter�s en adquirir bases formativas y t�cnicas en diversos estilos desde muy temprana edad. Nuestro Programa ONLINE te permite tener clases personalizadas en la comodidad de tu casa, cuidando tu salud y la de tus seres queridos con Instructores profesionales en la Danza.</P>
			<p class="card-text">El objetivo principal es crear conciencia del movimiento corporal, la correcta alineaci�n, fuerza y tonificaci�n muscular, as� mismo sentar las bases para desarrollar fluidez en el movimiento, estimulando la coordinaci�n y el desarrollo de las capacidades motoras por medio de los diversos estilos de la danza.
            </p>
            <p class="card-text"></p>
          </div>
           </div>
      </div>
      <div class="col-md-3">
        <div class="card"> <img class="card-img-top img-fluid wow bounceInUp" data-wow-delay=".25s" src="images/g2.jpg" alt="Card image">
          <div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
            <h4 class="card-title">Neon Steps Now (12 a�os en adelante)</h4>
             	<p class="card-text">El programa Neon Steps Now de Ardanza est� dise�ado para j�venes de 12 a�os en adelante, que tengan inter�s en adquirir bases formativas y t�cnicas en diversos estilos. Nuestro Programa ONLINE te permite tener clases personalizadas en la comodidad de tu casa, cuidando tu salud y la de tus seres queridos con Instructores profesionales en la Danza.</p>
          		<p class="card-text">Nuestro objetivo principal es desarrollar en los alumnos(as) la capacidad de expresarse corporal y art�sticamente de una manera creativa, a trav�s de la ense�anza de las bases t�cnicas de la danza logrando obtener conocimientos de una correcta alineaci�n corporal, desarrollo de la fuerza y tonificaci�n muscular, desarrollar fluidez en el movimiento, estimular la coordinaci�n y desarrollo de las capacidades motoras a trav�s del acercamiento a diversos estilos de la danza.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card"><img class="card-img-top img-fluid wow bounceInLeft" data-wow-delay=".25s" src="images/g3.jpg" alt="Card image">
          <div class="card-body mb-4 wow bounceInRight" data-wow-delay=".25s">
            <h4 class="card-title">Professional Workspace</h4>            
            <p class="card-text">Detalles del curso </p>             </div>
           </div>
      </div>
      <div class="col-md-3">
        <div class="card"> <img class="card-img-top img-fluid wow bounceInUp" data-wow-delay=".25s" src="images/g2.jpg" alt="Card image">
          <div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
            <h4 class="card-title">Lifestyle </h4>
             	<p class="card-text">Detalles del curso</p>
          	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-3 footer1 d-flex wow bounceInLeft" data-wow-delay=".25s">
        <div class="d-flex flex-wrap align-content-center"> <a href="#"><img src="images/logo.png" alt="logo" /></a>
          <p>Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica.</p>
          <p>&copy; 2020 RED.deploy<br> Dise�o  <a href="https://www.facebook.com/luis.rodriguezmedellin/" target="_blank">FreeHTML5</a>.</p>
        </div>
      </div>
      <div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s" id="contact">
        <div class="form-box">
          <h4>CONTACTANOS</h4>
          <table class="table table-responsive d-table">
            <tr>
              <td><input type="text" class="form-control pl-0" placeholder="NOMBRE" /></td>
              <td><input type="email" class="form-control pl-0" placeholder="EMAIL" /></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="DIRECCION" /></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="MENSAJE" /></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center pl-0"><button type="submit" class="btn btn-dark">ENVIAR</button></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-3 footer3 wow bounceInRight" data-wow-delay=".25s">
        <h5>DIRECCI�N</h5>
        <p>Av. Sierra Madre No. 202, local D , Esq. Sierra Nevada, Fracc. Colinas del Padre 4ta secci�n 98085 Zacatecas, M�xico</p>
        <h5>TELEFONO</h5>
        <p>4921285833</p>
        <h5>EMAIL</h5>
        <p>email@EJEMPLO.com</p>
        <div class="social-links">
          <ul class="nav nav-item">
            <li><a href="https://www.facebook.com/ArDanzaZac/" class="btn btn-secondary mr-1 mb-2"><img src="images/facebook.png" alt="facebook" /></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Optional JavaScript --> 
<!-- jQuery first, then Bootstrap JS, ... -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/wow.js"></script>
<script src="js/main.js"></script>
      <!-- Body si Logueo -->
      
    <?php else: ?>
    
    
     <!-- <h1>Ingresa</h1>
      <a href="login.php">Login</a> o
      <a href="signup.php">Registro</a>-->
      
      <div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2" data-parallax="scroll" data-image-src="images/banner2.jpg">
  <nav class="navbar navbar-expand-md navbar-dark">
    <div class="container"> 
      <!-- Brand --> 
      <a class="navbar-brand mr-auto" href="#"><img src="images/logo.png" alt="FoxPro" /></a> 
      
      <!-- Toggler/collapsibe Button -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> <span class="navbar-toggler-icon"></span> </button>
      
      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"> <a class="nav-link" href="#pageTop">Inicio</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#about-us">Nosotros</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#curses">Instructores</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#contact">Contacto</a> </li>
        </ul>
        <ul class="navbar-nav ml-5">
          <li class="nav-item"> <a class="nav-link btn btn-danger" href="/servicios/login.php">Login</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container">
    <div class="fh5co-banner-text-box">
      <div class="quote-box pl-5 pr-5 wow bounceInRight">
        <h2> ARDANZA <br><span>Danza y cultura</span> </h2>
      </div>
      	<a data-toggle="modal" data-target="#modalCurso" class="btn text-uppercase btn-outline-danger btn-lg mr-3 mb-3 wow bounceInUp"> Registro cursos </a> 
 		<a data-toggle="modal" data-target="#modalClase" class="btn text-uppercase btn-outline-danger btn-lg mb-3 wow bounceInDown"> Ingreso clases </a> </div>
 <div class="modal fade" id="modalCurso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">      
      <!-- Contenido ventana modal --> 
        
      </div>
      <footer class="container-fluid">
      
  <div class="container">  
    <div class="row">      
      <div class="col-md-12 footer2 wow bounceInUp" data-wow-delay=".25s" id="contact">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="form-box">
          <h4>REGISTRO CURSOS</h4>
          <table class="table table-responsive d-table">
            <tr>
              <td><input type="text" class="form-control pl-0" placeholder="NOMBRE ALUMNO" /></td>
              <td><input type="email" class="form-control pl-0" placeholder="EMAIL" /></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="NOMBRE DEL PADRE O TUTOR" /></td>
            </tr>
            <tr>
              <td><input type="text" class="form-control pl-0" placeholder="MUNICIPIO" /></td>
              <td><input type="email" class="form-control pl-0" placeholder="ESTADO" /></td>              
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="DIRECCION" /></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="TELEFONO" /></td>            
            </tr>          
            <tr>
              <td colspan="2">
              <h4 class="card-title">Curso</h4>
              	<select id="curso" name="curso">
			      <option value="1">Infantil � Let�s dance (6 a 11 a�os)</option>
			      <option value="2">Neon Steps Now (12 a�os en adelante)</option>
			      <option value="3">Professional Workspace</option>
			      <option value="4">Otro</option>
   				</select>
   			</td>
            </tr>
            <tr>
              <td colspan="2"><hr></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center pl-0"><button type="submit" class="btn btn-dark">ENVIAR</button></td>
            </tr>
          </table>
        </div>
      </div>
      
    </div>
  </div>
</footer>
    </div>
  </div>
</div>  
  
  </div>
</div>
<div class="container-fluid fh5co-network">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h4 class="wow bounceInUp">Seccion sin datos</h4>
        <h2 class="wow bounceInRight">SIN DATOS</h2>
        <hr />
        <h5 class="wow bounceInLeft">Subtitulo 1</h5>
        <p class="wow bounceInDown">Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica. &amp;  Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica.</p>
      </div>
      <div class="col-md-6">
        <figure class="wow bounceInDown"> <img src="images/about-img.jpg" alt="gym" class="img-fluid" /> </figure>
      </div>
    </div>
  </div>
</div>
<div id="about-us" class="container-fluid fh5co-about-us pl-0 pr-0 parallax-window" data-parallax="scroll" data-image-src="images/about-us-bg.jpg">
  <div class="container">
    <div class="col-sm-6 offset-sm-6">
      <h2 class="wow bounceInLeft" data-wow-delay=".25s">SOBRE NOSOTROS</h2>
      <hr/>
      <p class="wow bounceInRight" data-wow-delay=".25s">Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica.</p>
      <!--  <a class="btn btn-lg btn-outline-danger d-inline-block text-center mx-auto wow bounceInDown">Learn More</a> --></div>
  </div>
</div>
<div class="container-fluid fh5co-content-box" >
  <div class="container">
    <div class="row">
      <div class="col-md-5 pr-0"><img src="images/rode-gym.jpg" alt="gym" class="img-fluid wow bounceInLeft" /> </div>
      <div class="col-md-7 pl-0">
        <div class="wow bounceInRight" data-wow-delay=".25s">
          <div class="card-img-overlay">          
            <p>Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica. </p>
          </div>
          <img src="images/gym-girls.jpg" alt="girls in gym" class="img-fluid" /> </div>
      </div>
    </div>
    <div class="row trainers pl-0 pr-0"data-wow-delay=".25s" id="curses">
      <div class="col-12 bg-50">
        <div class="quote-box2 wow bounceInDown" data-wow-delay=".25s">
          <h2> INSTRUCTORES </h2>
        </div>
      </div>
      <div class="col-md-6 pr-5 pl-5">
        <div class="card text-center wow bounceInLeft" data-wow-delay=".25s"> <img class="card-img-top rounded-circle img-fluid" src="images/trainers1.jpg" alt="Card image">
          <div class="card-body mb-5">
            <h4 class="card-title">instructor 1</h4>
            
            <p class="card-text">Detalles del instructor </p>
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5 pr-5">
        <div class="card text-center wow bounceInRight" data-wow-delay=".25s"> <img class="card-img-top rounded-circle img-fluid" src="images/trainers2.jpg" alt="Card image">
          <div class="card-body mb-5">
            <h4 class="card-title">Instructor 2</h4>
            <p class="card-text">Detalles del instructor </p>
           </div>
        </div>
      </div>
    </div>
    <div class="row gallery">
      <div class="col-md-3">
        <div class="card"><img class="card-img-top img-fluid wow bounceInRight" data-wow-delay=".25s" src="images/g1.jpg" alt="Card image">
          <div class="card-body mb-4 wow bounceInLeft" data-wow-delay=".25s">
            <h4 class="card-title">Infantil � Let�s dance (6 a 11 a�os)</h4>
            <p class="card-text">El programa Infantil � Let�s dance de Ardanza est� dise�ado para peque�os de 6 a 11 a�os de edad, que tengan inter�s en adquirir bases formativas y t�cnicas en diversos estilos desde muy temprana edad. Nuestro Programa ONLINE te permite tener clases personalizadas en la comodidad de tu casa, cuidando tu salud y la de tus seres queridos con Instructores profesionales en la Danza.</P>
			<p class="card-text">El objetivo principal es crear conciencia del movimiento corporal, la correcta alineaci�n, fuerza y tonificaci�n muscular, as� mismo sentar las bases para desarrollar fluidez en el movimiento, estimulando la coordinaci�n y el desarrollo de las capacidades motoras por medio de los diversos estilos de la danza.
            </p>
            <p class="card-text"></p>
          </div>
           </div>
      </div>
      <div class="col-md-3">
        <div class="card"> <img class="card-img-top img-fluid wow bounceInUp" data-wow-delay=".25s" src="images/g2.jpg" alt="Card image">
          <div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
            <h4 class="card-title">Neon Steps Now (12 a�os en adelante)</h4>
             	<p class="card-text">El programa Neon Steps Now de Ardanza est� dise�ado para j�venes de 12 a�os en adelante, que tengan inter�s en adquirir bases formativas y t�cnicas en diversos estilos. Nuestro Programa ONLINE te permite tener clases personalizadas en la comodidad de tu casa, cuidando tu salud y la de tus seres queridos con Instructores profesionales en la Danza.</p>
          		<p class="card-text">Nuestro objetivo principal es desarrollar en los alumnos(as) la capacidad de expresarse corporal y art�sticamente de una manera creativa, a trav�s de la ense�anza de las bases t�cnicas de la danza logrando obtener conocimientos de una correcta alineaci�n corporal, desarrollo de la fuerza y tonificaci�n muscular, desarrollar fluidez en el movimiento, estimular la coordinaci�n y desarrollo de las capacidades motoras a trav�s del acercamiento a diversos estilos de la danza.</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card"><img class="card-img-top img-fluid wow bounceInLeft" data-wow-delay=".25s" src="images/g3.jpg" alt="Card image">
          <div class="card-body mb-4 wow bounceInRight" data-wow-delay=".25s">
            <h4 class="card-title">Professional Workspace</h4>            
            <p class="card-text">Detalles del curso </p>             </div>
           </div>
      </div>
      <div class="col-md-3">
        <div class="card"> <img class="card-img-top img-fluid wow bounceInUp" data-wow-delay=".25s" src="images/g2.jpg" alt="Card image">
          <div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
            <h4 class="card-title">Lifestyle </h4>
             	<p class="card-text">Detalles del curso</p>
          	</div>
        </div>
      </div>
    </div>
  </div>
</div>
<footer class="container-fluid">
  <div class="container">
    <div class="row">
      <div class="col-md-3 footer1 d-flex wow bounceInLeft" data-wow-delay=".25s">
        <div class="d-flex flex-wrap align-content-center"> <a href="#"><img src="images/logo.png" alt="logo" /></a>
          <p>Desarrollar e impulsar a bailarines por medio de diversas disciplinas danc�sticas a trav�s de la metodolog�a te�rico-pr�ctica.</p>
          <p>&copy; 2020 RED.deploy<br> Dise�o  <a href="https://www.facebook.com/luis.rodriguezmedellin/" target="_blank">FreeHTML5</a>.</p>
        </div>
      </div>
      <div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s" id="contact">
        <div class="form-box">
          <h4>CONTACTANOS</h4>
          <table class="table table-responsive d-table">
            <tr>
              <td><input type="text" class="form-control pl-0" placeholder="NOMBRE" /></td>
              <td><input type="email" class="form-control pl-0" placeholder="EMAIL" /></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="DIRECCION" /></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2"><input type="text" class="form-control pl-0" placeholder="MENSAJE" /></td>
            </tr>
            <tr>
              <td colspan="2"></td>
            </tr>
            <tr>
              <td colspan="2" class="text-center pl-0"><button type="submit" class="btn btn-dark">ENVIAR</button></td>
            </tr>
          </table>
        </div>
      </div>
      <div class="col-md-3 footer3 wow bounceInRight" data-wow-delay=".25s">
        <h5>DIRECCI�N</h5>
        <p>Av. Sierra Madre No. 202, local D , Esq. Sierra Nevada, Fracc. Colinas del Padre 4ta secci�n 98085 Zacatecas, M�xico</p>
        <h5>TELEFONO</h5>
        <p>4921285833</p>
        <h5>EMAIL</h5>
        <p>email@EJEMPLO.com</p>
        <div class="social-links">
          <ul class="nav nav-item">
            <li><a href="https://www.facebook.com/ArDanzaZac/" class="btn btn-secondary mr-1 mb-2"><img src="images/facebook.png" alt="facebook" /></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Optional JavaScript --> 
<!-- jQuery first, then Bootstrap JS, ... -->

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/parallax.js"></script>
<script src="js/wow.js"></script>
<script src="js/main.js"></script>
      
    <?php endif; ?>
    
    
    
  </body>
</html>