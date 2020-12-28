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
<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8? />
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
<?php if(!empty($user)): ?>
     <!-- Fin de prueba de logueo -->
	<div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2"
		data-parallax="scroll" data-image-src="images/banner2.jpg">
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

					</ul>
					<ul class="navbar-nav ml-5">
						<li class="nav-item"><a class="nav-link"> - Bienvenido <?= $user['email'];?>-</a>
						</li>
						<li class="nav-item"><a class="nav-link btn btn-danger"
							href="/logout.php">Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<div class="container">
			<div></div>

			<div id="about-us"
				class="container-fluid fh5co-about-us pl-0 pr-0 parallax-window"
				data-parallax="scroll" data-image-src="images/about-us-bg.jpg">
				<div class="container">
					<div class="col-sm-6 offset-sm-6">
						<h2 class="wow bounceInLeft" data-wow-delay=".25s">PONTE AL
							CORRIENTE</h2>
						<hr />
						<p class="wow bounceInRight" data-wow-delay=".25s">Introduce tus
							datos y tu comprobante de pago, esto nos informara para revisar
							tu estatus</p>
						<!--  <a class="btn btn-lg btn-outline-danger d-inline-block text-center mx-auto wow bounceInDown">Learn More</a> -->
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
									&copy; 2020 RED.deploy<br> Diseño <a
										href="https://www.facebook.com/luis.rodriguezmedellin/"
										target="_blank">kartegen</a>.
								</p>
							</div>
						</div>
						<div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s"
							id="contact">
							<div class="form-box">
								<h4>PAGO</h4>
								<div class="col-md-12 col-md-offset-2">
									<form name="sentMessage" id="contactForm">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<input type="text" id="name" class="form-control"
														placeholder="Nombre" required="required">
													<p class="help-block text-danger"></p>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<input type="email" id="email" class="form-control"
														placeholder="Email" required="required">
													<p class="help-block text-danger"></p>
												</div>
											</div>
										</div>
										<div class="form-group">
											<textarea name="message" id="message" class="form-control"
												rows="1" placeholder="Mensaje" required></textarea>
											<p class="help-block text-danger"></p>
										</div>
										<input type="file" name="comprobante"
											placeholder="COMPROBANTE">
										<div id="success"></div>										
										<button type="submit" class="btn btn-dark">ENVIAR</button>
									</form>
								</div>


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
							<p>email@EJEMPLO.com</p>
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

			<!-- Optional JavaScript -->
			<!-- jQuery first, then Bootstrap JS, ... -->

			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/parallax.js"></script>
			<script src="js/wow.js"></script>
			<script src="js/main.js"></script>
			<!-- Body sin Logueo -->
      
    <?php else: ?>    
    <?php
    echo '<script>
       		function alerta2(){
				swal("ERROR", "En un momento te redireccionamos", "error")
				window.location.href = "index.php";
			}
			   alerta2();    
       		</script>';
    ?>
     <!-- <h1>Ingresa</h1>
      <a href="login.php">Login</a> o
      <a href="signup.php">Registro</a>-->
			<div
				class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2"
				data-parallax="scroll" data-image-src="images/banner2.jpg"></div>
			<footer class="container-fluid">
				<div class="container"></div>
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