<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, tipo, estatus password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
        $user = $results;
    }
}
?>
<?php if(!empty($user)): ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Ardanza - Inicio</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css"
	href="bootstrap/css/bootstrap.min.css" />
<link href="css/main.css" rel="stylesheet">
<link href="css/font-style.css" rel="stylesheet">
<link href="css/register.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<style type="text/css">
body {
	padding-top: 60px;
}
</style>
<link href="http://fonts.googleapis.com/css?family=Raleway:400,300"
	rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans"
	rel="stylesheet" type="text/css">
</head>
<body>

	<!-- MENU NAVEGACION -->

	<div class="navbar-nav navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html"><img
					src="images/logo30.png" alt=""></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php"><i
							class="icon-home icon-white"></i>Inicio </a></li>
					<li><a href="index2.php"><i class="icon-th icon-white"></i> Alumnos</a></li>
					<li><a href="../logout.php"><i class="icon-lock icon-white"></i>
							Cerrar sesión</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="register-info-wraper">
					<div id="register-info">
						<div class="cont2">
							<div class="thumbnail">
								<img src="images/face.jpg" alt="Marcel Newman"
									class="img-circle">
							</div>
							<!-- /thumbnail -->
							<h2><?= $user['email'];?></h2>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="cont3">
									<p>
										<ok>Username:</ok> <?= $user['email'];?></p>
									<p>
										<ok>Tipo :</ok> <?= $user['tipo'];?></p>
									<p>
										<ok>id:</ok> <?= $user['id'];?></p>
								</div>
							</div>
						</div>
						<!-- /inner row -->
						<hr>
						<div class="cont2">
							<h2>ELIGE UNA OPCIÓN</h2>
						</div>
						<br>
						<div class="info-user2">
							<span aria-hidden="true" class="li_user fs1"></span> <span
								aria-hidden="true" class="li_settings fs1"></span> <span
								aria-hidden="true" class="li_mail fs1"></span> <span
								aria-hidden="true" class="li_key fs1"></span> <span
								aria-hidden="true" class="li_lock fs1"></span> <span
								aria-hidden="true" class="li_pen fs1"></span>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6">
				<div id="register-wraper">
					<form id="register-form" class="form">
						<legend>Nuevo usuario</legend>
						<div class="body">
							<label>USUARIO</label> <input class="input-huge" type="text"
								id="email" name="email">
							<hr>
							<label>Password</label> <input class="input-huge" type="text"
								id="password" name="password">
							<hr>
							<label>Tipo de usuario</label> <br> <select id="tipo" name="tipo">
								<option value="1">Administrador</option>
								<option value="2">Estudiante clases</option>
								<option value="3">Estudiante cursos</option>
							</select> 
							<br> 
							<select id="estatus" name="estatus">
								<option value="administrador">admin</option>
								<option value="adeudo">adeuda</option>
								<option value="noAdeudo">no adeuda</option>
								<option value="curso">cursos</option>
							</select>
							<hr>
							<br>
						</div>

						<div class="footer">
							<button type="submit" class="btn btn-success">Registro</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>
	<div id="footerwrap">
		<footer class="clearfix"></footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<p>
						<img src="images/logo.png" alt="">
					</p>
					<p>RED.deploy - Copyright 2020</p>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<?php else: ?>
	
	<?php
    echo '<script>
       function alerta(){
           swal("SESION CERRADA", "En un momento te redireccionamos", "warning")
            window.location.href = "/admin";
       }
       alerta();
       </script>';

    ?>
	<div id="footerwrap">
		<footer class="clearfix"></footer>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-12">
					<p>
						<img src="images/logo.png" alt="">
					</p>
					<p>RED.deploy - Copyright 2020</p>
				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /footerwrap -->
<?php endif?>
</body>
</html>
</html>