<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, tipo, estatus, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>

<html lang="es">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv=�Content-Type� content=�text/html; charset=utf-8? />
<title>ARDANZA - Centro de Formación Dancística y Cultural</title>

<!-- SWAL -->
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css" />
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

<!-- Bootstrap CSS -->
<link href="css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700"
	rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

	<!-- Prueba de loguea -->
  
    <?php if(!empty($user)): ?>
    
   <?php

        if ($user['tipo'] == "1") {
            echo '<script>
       function alerta(){
           swal("BIENVENIDO ADMINISTRADOR", "En un momento te redireccionamos", "success")
            window.location.href = "/admin/index.php";
       }
       alerta();
       </script>';
        } elseif ($user['tipo'] == "2") {
            if ($user['estatus'] == "adeudo") {
                echo '<script>
       		function alerta2(){
				swal("ADEUDO", "En un momento te redireccionamos", "warning")
				window.location.href = "adeudo.php";				
			}
			   alerta2();			   
       		</script>';
            } else {

                echo '<script>
       		function alerta2(){				
				swal("BIENVENIDO ALUMNO", "En un momento te redireccionamos", "success")
				window.location.href = "clase.php";				
			}
       		alerta2();
       		</script>';
            }
        } elseif ($user['tipo'] == "3") {
            '<script>
       function alerta3(){
		   swal("BIENVENIDO ALUMNO", "En un momento te redireccionamos", "success")
		   window.location.href = "curso.php";
       }
       alerta3()
       </script>';
        } else {
            '<script>
       function alerta3(){
		   swal("OCURRIO UN ERROR", "En un momento te redireccionamos", "ERROR")
		   window.location.href = "login.php";
       }
       alerta3()
       </script>';
        }
        ?>
      
   
    <?php else: ?>
    
    
     <!-- <h1>Ingresa</h1>
      <a href="login.php">Login</a> o
      <a href="signup.php">Registro</a>-->

	<div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2"
		data-parallax="scroll" data-image-src="images/banner2.png">
		<nav class="navbar navbar-expand-md navbar-dark">
			<div class="container">
				<!-- Brand -->
				<a class="navbar-brand mr-auto" href="#"><img src="images/logo.png"
					alt="ardanza" /></a>

				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>

				<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a class="nav-link" href="#pageTop">Inicio</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="#about-us">Nosotros</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="#curses">Instructores</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="#contact">Contacto</a>
						</li>
					</ul>
					<ul class="navbar-nav ml-5">
						<li class="nav-item"><a class="nav-link btn btn-danger"
							href="login.php"> LOGIN </a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="fh5co-banner-text-box">
				<!-- 				<div class="quote-box pl-5 pr-5 wow bounceInRight"> -->
				<!-- 					<h2>ARDANZA<br><span>Danza y cultura</span> -->
				<!-- 					</h2> -->
				<!-- 				</div> -->
			</div>
		</div>
	</div>
	<div class="container-fluid fh5co-network">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<!-- 					<h4 class="wow bounceInUp">Seccion sin datos</h4> -->
					<h2 class="wow bounceInRight">ARDANZA</h2>
					<hr />
					<h5 class="wow bounceInLeft">DANZA Y CULTURA</h5>
					<p class="wow bounceInDown">Desarrollar e impulsar a bailarines por
						medio de diversas disciplinas dancísticas a través de la
						metodología teórico-práctica.</p>
				</div>
				<div class="col-md-6">
					<figure class="wow bounceInDown">
						<img src="images/about-img.png" width="50%" height="50%"
							alt="ardanza" class="img-fluid" />
					</figure>
				</div>
			</div>
		</div>
	</div>
	<div id="about-us"
		class="container-fluid fh5co-about-us pl-0 pr-0 parallax-window"
		data-parallax="scroll" data-image-src="images/about-us-bg.jpg"
		width="50%" height="50%">
		<div class="container">
			<div class="col-sm-6 offset-sm-6">
				<h2 class="wow bounceInLeft" data-wow-delay=".25s">SOBRE NOSOTROS</h2>
				<hr />
				<p class="wow bounceInRight" data-wow-delay=".25s">Centro de
					formación dancística y cultural</p>
				<!--  <a class="btn btn-lg btn-outline-danger d-inline-block text-center mx-auto wow bounceInDown">Learn More</a> -->
			</div>
		</div>
	</div>
	<div class="container-fluid fh5co-content-box">
		<div class="container">
			<div class="row">
				<div class="col-md-5 pr-0">
					<img src="images/sobre-img.png" alt="nosotros"
						class="img-fluid wow bounceInLeft" />
				</div>
				<div class="col-md-7 pl-0">
					<div class="wow bounceInRight" data-wow-delay=".25s">
						<div class="card-img-overlay">
							<p>¡Tus clases de danza nunca pudieron estar mejor!</p>
							<p>COMPARTE CLASE CON COMPAÑEROS DE TODO MÉXICO</p>
							<hr>
						</div>
						<img src="images/gym-girls.jpg" alt="girls in gym"
							class="img-fluid" />
					</div>
				</div>
			</div>
			<div class="row trainers pl-0 pr-0" data-wow-delay=".25s" id="curses">
				<div class="col-12 bg-50">
					<div class="quote-box2 wow bounceInDown" data-wow-delay=".25s">
						<h2>INSTRUCTORES</h2>
					</div>
				</div>
				<div class="col-md-4 pr-5 pl-5">
					<div class="card text-center wow bounceInLeft"
						data-wow-delay=".25s">
						<img class="card-img-top rounded-circle img-fluid"
							src="images/cande.png" alt="Card image">
						<div class="card-body mb-5">
							<h4 class="card-title">Cande</h4>
							<!-- 							boton modal -->
							<a data-toggle="modal" data-target="#modalCande"
								class="btn text-uppercase btn-outline-success wow bounceInUp">
								Detalles </a>

						</div>
					</div>

				</div>
<!-- 				INSTRUCTOR -->
				<div class="col-md-4 pr-5 pl-5">
					<div class="card text-center wow bounceInLeft"
						data-wow-delay=".25s">
						<img class="card-img-top rounded-circle img-fluid"
							src="images/paola.png" alt="Card image">
						<div class="card-body mb-5">
							<h4 class="card-title">Paola</h4>
							<a data-toggle="modal" data-target="#modalPaola"
								class="btn text-uppercase btn-outline-success wow bounceInUp">
								Detalles</a>

						</div>
					</div>
				</div>
<!-- 				FIN INSTRUCTOR -->
<!-- 				INSTRUCTOR -->
				<div class="col-md-4 pr-5 pl-5">
					<div class="card text-center wow bounceInLeft"
						data-wow-delay=".25s">
						<img class="card-img-top rounded-circle img-fluid"
							src="images/luz.png" alt="Card image">
						<div class="card-body mb-5">
							<h4 class="card-title">LUZ MAS</h4>
							<a data-toggle="modal" data-target="#modalLuz"
								class="btn text-uppercase btn-outline-success wow bounceInUp">
								Detalles</a>

						</div>
					</div>
				</div>
<!-- 				FIN INSTRUCTOR -->
<!-- 				INSTRUCTOR -->
				<div class="col-md-4 pr-5 pl-5">
					<div class="card text-center wow bounceInLeft"
						data-wow-delay=".25s">
						<img class="card-img-top rounded-circle img-fluid"
							src="images/nadia.png" alt="Card image">
						<div class="card-body mb-5">
							<h4 class="card-title">NADIA</h4>
							<a data-toggle="modal" data-target="#modalNadia"
								class="btn text-uppercase btn-outline-success wow bounceInUp">
								Detalles</a>

						</div>
					</div>
				</div>
<!-- 				FIN INSTRUCTOR -->
<!-- 				INSTRUCTOR -->
				<div class="col-md-4 pr-5 pl-5">
					<div class="card text-center wow bounceInLeft"
						data-wow-delay=".25s">
						<img class="card-img-top rounded-circle img-fluid"
							src="images/itzel.png" alt="Card image">
						<div class="card-body mb-5">
							<h4 class="card-title">ITZEL</h4>
							<a data-toggle="modal" data-target="#modalItzel"
								class="btn text-uppercase btn-outline-success wow bounceInUp">
								Detalles</a>

						</div>
					</div>
				</div>
<!-- 				FIN INSTRUCTOR -->
<!-- 				INSTRUCTOR -->
				<div class="col-md-4 pr-5 pl-5">
					<div class="card text-center wow bounceInLeft"
						data-wow-delay=".25s">
						<img class="card-img-top rounded-circle img-fluid"
							src="images/jessica.png" alt="Card image">
						<div class="card-body mb-5">
							<h4 class="card-title">JESSICA</h4>
							<a data-toggle="modal" data-target="#modalJessica"
								class="btn text-uppercase btn-outline-success wow bounceInUp">
								Detalles</a>

						</div>
					</div>
				</div>
<!-- 				FIN INSTRUCTOR -->
			</div>
			<!-- MODALES -->
<!-- 			MODAL 1 -->
			<div class="modal fullscreen-modal fade col-lg-12" id="modalCande"
				tabindex="-1" role="dialog" aria-labelledby="mymodalLabel">
				<div class="modal-dialog col-lg-12" role="document">
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<img src="images/candeCurr.png" width="auto" height="auto" alt="Cande" />
			</div>
<!-- 			MODAL 2 -->
			<div class="modal fullscreen-modal fade col-lg-12" id="modalPaola"
				tabindex="-1" role="dialog" aria-labelledby="mymodalLabel">
				<div class="modal-dialog col-lg-12" role="document">
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<img src="images/paolaCurr.png" width="auto" height="auto" alt="Paola" />
			</div>
<!-- MODAL 3 -->
			<div class="modal fullscreen-modal fade col-lg-12" id="modalLuz"
				tabindex="-1" role="dialog" aria-labelledby="mymodalLabel">
				<div class="modal-dialog col-lg-12" role="document">
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<img src="images/luzCurr.png" width="auto" height="auto" alt="Luz Mas" />
			</div>
<!-- 			MODAL 4 -->
			<div class="modal fullscreen-modal fade col-lg-12" id="modalNadia"
				tabindex="-1" role="dialog" aria-labelledby="mymodalLabel">
				<div class="modal-dialog col-lg-12" role="document">
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<img src="images/nadiaCurr.png" width="auto" height="auto" alt="Nadia" />
			</div>
<!-- 			MODAL 5 -->
			<div class="modal fullscreen-modal fade col-lg-12" id="modalItzel"
				tabindex="-1" role="dialog" aria-labelledby="mymodalLabel">
				<div class="modal-dialog col-lg-12" role="document">
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<img src="images/itzelCurr.png" width="auto" height="auto" alt="Itzel" />
			</div>
<!-- 			MODAL 6 -->
			<div class="modal fullscreen-modal fade col-lg-12" id="modalJessica"
				tabindex="-1" role="dialog" aria-labelledby="mymodalLabel">
				<div class="modal-dialog col-lg-12" role="document">
					<div class="modal-footer">
						<button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
				<img src="images/jessicaCurr.png" width="auto" height="auto" alt="Jessica" />
			</div>



		</div>
		<div class="row gallery">
			<div class="col-md-3">
				<div class="card">
					<img class="card-img-top img-fluid wow bounceInRight"
						data-wow-delay=".25s" src="images/g1.jpg" alt="Card image">
					<div class="card-body mb-4 wow bounceInLeft" data-wow-delay=".25s">
						<h4 class="card-title">Infantil – Let’s dance (6 a 11 años)</h4>
						<p class="card-text">El programa Infantil – Let’s dance de Ardanza
							está diseñado para pequeños de 6 a 11 años de edad, que tengan
							interés en adquirir bases formativas y técnicas en diversos
							estilos desde muy temprana edad. Nuestro Programa ONLINE te
							permite tener clases personalizadas en la comodidad de tu casa,
							cuidando tu salud y la de tus seres queridos con Instructores
							profesionales en la Danza.</P>
						<p class="card-text">El objetivo principal es crear conciencia del
							movimiento corporal, la correcta alineación, fuerza y
							tonificación muscular, así mismo sentar las bases para
							desarrollar fluidez en el movimiento, estimulando la coordinación
							y el desarrollo de las capacidades motoras por medio de los
							diversos estilos de la danza.</p>
						<p class="card-text"></p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<img class="card-img-top img-fluid wow bounceInUp"
						data-wow-delay=".25s" src="images/g2.jpg" alt="Card image">
					<div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
						<h4 class="card-title">Neon Steps Now (12 años en adelante)</h4>
						<p class="card-text">El programa Neon Steps Now de Ardanza está
							diseñado para jóvenes de 12 años en adelante, que tengan interés
							en adquirir bases formativas y técnicas en diversos estilos.
							Nuestro Programa ONLINE te permite tener clases personalizadas en
							la comodidad de tu casa, cuidando tu salud y la de tus seres
							queridos con Instructores profesionales en la Danza.</p>
						<p class="card-text">Nuestro objetivo principal es desarrollar en
							los alumnos(as) la capacidad de expresarse corporal y
							artísticamente de una manera creativa, a través de la enseñanza
							de las bases técnicas de la danza logrando obtener conocimientos
							de una correcta alineación corporal, desarrollo de la fuerza y
							tonificación muscular, desarrollar fluidez en el movimiento,
							estimular la coordinación y desarrollo de las capacidades motoras
							a través del acercamiento a diversos estilos de la danza.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<img class="card-img-top img-fluid wow bounceInLeft"
						data-wow-delay=".25s" src="images/g3.jpg" alt="Card image">
					<div class="card-body mb-4 wow bounceInRight" data-wow-delay=".25s">
						<h4 class="card-title">Professional Workspace</h4>
						<p class="card-text">Proximamente mas detalles del curso</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<img class="card-img-top img-fluid wow bounceInUp"
						data-wow-delay=".25s" src="images/g2.jpg" alt="Card image">
					<div class="card-body mt-4 wow bounceInDown" data-wow-delay=".25s">
						<h4 class="card-title">Lifestyle</h4>
						<p class="card-text">Proximamente mas detalles del curso</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<footer class="container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3 footer1 d-flex wow bounceInLeft"
					data-wow-delay=".25s">
					<div class="d-flex flex-wrap align-content-center">
						<a href="#"><img src="images/logo.png" alt="logo" /></a>
						<p>Desarrollar e impulsar a bailarines por medio de diversas
							disciplinas dancísticas a través de la metodología
							teórico-práctica.</p>
						<p>
							&copy; 2021 RED.deploy<br> Diseño <a
								href="https://www.facebook.com/luis.rodriguezmedellin/"
								target="_blank">kartegen</a>.
						</p>
					</div>
				</div>
				<div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s"
					id="contact">
					<div class="form-box">
						<h4>CONTACTANOS</h4>
						<table class="table table-responsive d-table">
							<tr>
								<td><input type="text" class="form-control pl-0"
									placeholder="NOMBRE" /></td>
								<td><input type="email" class="form-control pl-0"
									placeholder="EMAIL" /></td>
							</tr>
							<tr>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="text" class="form-control pl-0"
									placeholder="DIRECCION" /></td>
							</tr>
							<tr>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="2"><input type="text" class="form-control pl-0"
									placeholder="MENSAJE" /></td>
							</tr>
							<tr>
								<td colspan="2"></td>
							</tr>
							<tr>
								<td colspan="2" class="text-center pl-0"><button type="submit"
										class="btn btn-dark">ENVIAR</button></td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-3 footer3 wow bounceInRight"
					data-wow-delay=".25s">
					<h5>DIRECCIÓN</h5>
					<p>Av. Sierra Madre No. 202, local D , Esq. Sierra Nevada, Fracc.
						Colinas del Padre 4ta sección 98085 Zacatecas, México</p>
					<h5>TELEFONO</h5>
					<p>4921285833</p>
					<h5>EMAIL</h5>
					<p>ardanza.cultura@gmail.com</p>
					<div class="social-links">
						<ul class="nav nav-item">
							<li><a href="https://www.facebook.com/ArDanzaZac/"
								class="btn btn-secondary mr-1 mb-2"><img
									src="images/facebook.png" alt="facebook" /></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!-- Opcional JavaScript -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/parallax.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/main.js"></script>
	<script src="js/script.js"></script>
	
      
    <?php endif; ?>
    
    
    
  </body>
</html>