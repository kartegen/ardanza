<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['tipo'])) {
      $sql = "INSERT INTO users (email, password, tipo) VALUES (:email, :password, :tipo)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email', $_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':tipo', $_POST['tipo']);
    if ($stmt->execute()) {
        echo '<script language="javascript">alert("Registro exitoso");window.location.href="index.php"</script>';
        
        
    } else {
        echo '<script language="javascript">alert("Error de registro");window.location.href="signup.php"</script>';
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv=â€�Content-Typeâ€� content=â€�text/html;
	charset=UTF-8â€³ />
<title>ARDANZA - Centro de Formaciónn Dancística y Cultural</title>

<!-- Bootstrap CSS -->
<link href="css/animate.css" rel="stylesheet">
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700"
	rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
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
				</button> 	<!-- Navbar links -->
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
					<li class="nav-item"> <a class="nav-link"  href="/index.php">Inicio</a> </li>
					<li class="nav-item"> <a class="nav-link" href="/login.php">Login</a> </li>	
					</ul>
				</div>
			</div>
		</nav>
	</div>
    
		<form action="signup.php"method="POST"> 
		<footer
		class="col-md-6 container-fluid">
		<div class="container">
			<div class="row">
				<div class="col-md-3 footer2 wow bounceInUp" data-wow-delay=".25s"
					id="contact"></div>
				<div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s"
					id="contact">

					<div class="form-box">
						<h4>Nuevo usuario</h4>
						<table class="table table-responsive d-table">
							<tr>
								<td colspan="2"><input type="text" name="email"
									class="form-control pl-0" placeholder="NOMBRE DE USUARIO" /></td>
							</tr>
							<tr>
								<td colspan="2"><hr></td>
							</tr>
							<tr>
								<td colspan="2"><input name="password" type="password"
									class="form-control pl-0" placeholder="CONTRASEÑA" /></td>
							</tr>
							<tr>
								<td colspan="2"><select id="tipo" name="tipo">
										<option value="1">Administrador</option>
										<option value="2">Estudiante clses</option>
										<option value="3">Estudiante cursos</option>
								</select></td>
							</tr>
							<tr>
								<td colspan="2" class="text-center pl-0">
									<button type="submit" value="submit" class="btn btn-dark">ENVIAR</button>
								</td>
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
