<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
}
require '/servicios/database.php';

if (! empty($_POST['email']) && ! empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
        $_SESSION['user_id'] = $results['id'];
        header("Location: /php-login");
    } else {
        $message = 'Sorry, those credentials do not match';
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
	<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
<title>ARDANZA - Centro de Formación Dancística y Cultural</title>

<!-- Bootstrap CSS -->
<link href="css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700"
	rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body> 
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
         <!--   <li class="nav-item"> <a class="nav-link" href="#pageTop">Inicio</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#about-us">Nosotros</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#curses">Instructores</a> </li>
          <li class="nav-item"> <a class="nav-link" href="#contact">Contacto</a> </li>-->
        </ul>
        <ul class="navbar-nav ml-5">
          <li class="nav-item"> <a class="nav-link btn btn-danger" href="#">Login</a> </li>
        </ul>
      </div>
    </div>
  </nav>
  </div>
	
	
	<form action="login.php" method="POST">
		<footer class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-12 footer2 wow bounceInUp" data-wow-delay=".25s"
						id="contact">
						
						<div class="form-box">
							<h4>REGISTRO CURSOS</h4>
							<table class="table table-responsive d-table">
								<tr>
									<td><input type="text" class="form-control pl-0"
										placeholder="NOMBRE ALUMNO" /></td>
									<td><input type="email" class="form-control pl-0"
										placeholder="EMAIL" /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="text" class="form-control pl-0"
										placeholder="NOMBRE DEL PADRE O TUTOR" /></td>
								</tr>
								<tr>
									<td><input type="text" class="form-control pl-0"
										placeholder="MUNICIPIO" /></td>
									<td><input type="email" class="form-control pl-0"
										placeholder="ESTADO" /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="text" class="form-control pl-0"
										placeholder="DIRECCION" /></td>
								</tr>
								<tr>
									<td colspan="2"><input type="text" class="form-control pl-0"
										placeholder="TELEFONO" /></td>
								</tr>
								<tr>
									<td colspan="2">
										<h4 class="card-title">Curso</h4> <select id="curso"
										name="curso">
											<option value="1">Infantil – Let’s dance (6 a 11 años)</option>
											<option value="2">Neon Steps Now (12 años en adelante)</option>
											<option value="3">Professional Workspace</option>
											<option value="4">Otro</option>
									</select>
									</td>
								</tr>
								<tr>
									<td colspan="2"><hr></td>
								</tr>
								<tr>
									<td colspan="2" class="text-center pl-0"><button type="submit"
											class="btn btn-dark">ENVIAR</button></td>
								</tr>
							</table>
						</div>
					</div>

				</div>
			</div>
		</footer>
	</form>
</body>
</html>
