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

<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['tipo'])&& !empty($_POST['estatus'])) {
      $sql = "INSERT INTO users (email, password, tipo, estatus) VALUES (:email, :password, :tipo, :estatus)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email', $_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password', $password);
      $stmt->bindParam(':tipo', $_POST['tipo']);
      $stmt->bindParam(':estatus', $_POST['estatus']);
    if ($stmt->execute()) {
        echo '<script language="javascript">alert("Registro exitoso");window.location.href="index2.php"</script>';
        
        
    } else {
        echo '<script language="javascript">alert("Error de registro");window.location.href="signup.php"</script>';
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ARDANZA | Danza y cultura</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet"
	href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Tempusdominus Bootstrap 4 -->
<link rel="stylesheet"
	href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
<!-- iCheck -->
<link rel="stylesheet"
	href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- JQVMap -->
<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet"
	href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
<!-- Daterange picker -->
<link rel="stylesheet"
	href="plugins/daterangepicker/daterangepicker.css">
<!-- summernote -->
<link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
<!-- <SWAL -->
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<!-- SI EL USUARIO ESTA LOGUEADO -->
<?php if(!empty($user)): ?>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">



		<!-- Navbar -->
		<nav
			class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item"><a class="nav-link" data-widget="pushmenu"
					href="#" role="button"><i class="fas fa-bars"></i></a></li>
				<li class="nav-item d-none d-sm-inline-block"><a href="index.php"
					class="nav-link">Inicio</a></li>
				<li class="nav-item d-none d-sm-inline-block"><a href="index2.php"
					class="nav-link">Lista de alumnos</a></li>
				<li class="nav-item d-none d-sm-inline-block"><a href="index3.php"
					class="nav-link">Alta de alumnos</a></li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link"> <img
				src="dist/img/AdminLTELogo.png" alt="Ardanza"
				class="brand-image img-circle elevation-3" style="opacity: .8"> <span
				class="brand-text font-weight-light">ARDANZA</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<!--           <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
					</div>
					<div class="info">
						<a href="#" class="d-block">BIENVENIDO <?= $user['email'];?></a>
					</div>
				</div>
				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column"
						data-widget="treeview" role="menu" data-accordion="false">

						<li class="nav-item"><a href="#" class="nav-link"> <i
								class="nav-icon fas fa-edit"></i>
								<p>
									ALUMNOS <i class="fas fa-angle-left right"></i>
								</p>
						</a>
							<ul class="nav nav-treeview">
								<li class="nav-item"><a href="index2.php" class="nav-link"> <i
										class="far fa-circle nav-icon"></i>
										<p>Lista de alumnos</p>
								</a></li>
								<li class="nav-item"><a href="index3.php" class="nav-link"> <i
										class="far fa-circle nav-icon"></i>
										<p>Alta de alumnos</p>
								</a></li>
							</ul></li>
					</ul>
					<li class="nav-header">Sesi�n</li>
					<li class="nav-item"><a href="logout.php" class="nav-link"> <i
							class="nav-icon far fa-circle text-danger"></i>
							<p class="text">Cerrar sesion</p>
					</a></li>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">INICIO</h1>
						</div>
						<!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item active">Alta de alumnos</li>
								<li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
							</ol>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<!-- left column -->
						<div class="col-md-12">
							<!-- general form elements -->
							<div class="card card-primary">
								<div class="card-header">
									<h3 class="card-title">Nuevo Usuario</h3>
								</div>
								<!-- /.card-header -->
								<!-- form start -->
								<form action="index3.php"method="POST">
									<div class="card-body">
										<div class="form-group">
											<label for="user">Usuario</label> <input type="text"
												name="email" class="form-control pl-0"
												placeholder="NOMBRE DE USUARIO" />
										</div>
										<div class="form-group">
											<label for="pass">Password</label> <input name="password"
												type="password" class="form-control pl-0"
												placeholder="CONTRASE�A" />
										</div>
										<div class="form-group">
											<label for="exampleSelectRounded0">Tipo de usuario</label> <select
												class="custom-select rounded-0" id="tipo" name="tipo">
												<option value="1">Administrador</option>
												<option value="2">Estudiante clases</option>
												<option value="3">Estudiante cursos</option>
											</select>

										</div>
										<div class="form-group">
											<label for="exampleSelectRounded0">Estado del usuario</label>
											<select class="custom-select rounded-0" id="estatus" name="estatus">
												<option value="administrador">admin</option>
												<option value="adeudo">adeuda</option>
												<option value="noAdeudo">no adeuda</option>
												<option value="curso">cursos</option>
											</select>

										</div>

									</div>
									<!-- /.card-body -->

									<div class="card-footer">
										<button type="submit" value="submit" class="btn btn-primary">ENVIAR</button>
									</div>
								</form>
							</div>


						</div>

					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</section>



		</div>
<?php else: ?>
<!-- 	USUARIO NO LOGUEADO -->
<?php
    echo '<script>
       function alerta(){
           swal("SESION CERRADA", "En un momento te redireccionamos", "warning")
            window.location.href = "/admin";
       }
       alerta();
       </script>';

    ?>
	
<?php endif?>


 <footer class="main-footer">
			<strong>Derechos reservados &copy; 2021 <a href="www.ardanza.com.mx">RED.deploy</a>.
			</strong>

			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 1
			</div>
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="plugins/moment/moment.min.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script
		src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script
		src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
</html>