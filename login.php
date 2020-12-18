<?php

session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /login.php');
}
require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])&& !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password, tipo FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);
    
    $message = '';
    
    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /index.php");
    } else {
        echo '<script language="javascript">alert("Error de autentificacion");window.location.href="login.php"</script>';
    }
}

?>

<!doctype html>
<html lang="es">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv=â€�Content-Typeâ€� content=â€�text/html;
	charset=UTF-8â€³ />
<title>ARDANZA - Centro de FormaciÃ³n DancÃ­stica y Cultural</title>

<!-- Bootstrap CSS -->
<link href="css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700"
	rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="container-fluid pl-0 pr-0 bg-img clearfix parallax-window2"
		data-parallax="scroll" data-image-src="images/banner2.jpg">
		<nav class="navbar navbar-expand-md navbar-dark">
			<div class="container">
				<!-- Brand -->
				<a class="navbar-brand mr-auto" href="/index.php"><img src="images/logo.png"
					alt="Ardanza" /></a>

				<!-- Toggler/collapsibe Button -->
				<button class="navbar-toggler" type="button" data-toggle="collapse"
					data-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button> 

				<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <a class="nav-link" href="/signup.php">Regisro nuevo clientet</a> </li>
						
          <li class="nav-item"> <a class="nav-link" href="/index.php">Inicio</a> </li>
					
						
					</ul>
				</div>
			</div>
		</nav>
	</div>


	<form action="login.php" method="POST">
		<footer class="col-md-6 container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-3 footer2 wow bounceInUp" data-wow-delay=".25s"
						id="contact"></div>
					<div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s"
						id="contact">

						<div class="form-box">
							<h4>INICIA SESION</h4>
							<table class="table table-responsive d-table">
								<tr>
									<td colspan="2"><input type="text" name="email" class="form-control pl-0"
										placeholder="NOMBRE DE USUARIO" /></td>
								</tr>
								<tr>
									<td colspan="2"><hr></td>
								</tr>
								<tr>
									<td colspan="2"><input name="password" type="password" class="form-control pl-0"
										placeholder="CONTRASEÑA" /></td>
								</tr>

								<tr>
									<td colspan="2"><hr></td>
								</tr>
								<tr>
									<td colspan="2" class="text-center pl-0">
									<button type="submit" value="Submit"class="btn btn-dark">ENVIAR</button></td>
								</tr>
							</table>
						</div>
					</div>
					<div class="col-md-3 footer2 wow bounceInUp" data-wow-delay=".25s"
						id="contact"></div>

				</div>
			</div>
			
		</footer>
	</form>
</body>
</html>
