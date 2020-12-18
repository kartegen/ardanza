<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, email, tipo, password FROM users WHERE id = :id');
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
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	<title>Ardanza - Dashboard </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    
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

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
  	<!-- Google Fonts call. Font Used Open Sans & Raleway -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,300" rel="stylesheet" type="text/css">
  	<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css">
	</head>
<body>

  	<!-- NAVIGATION MENU -->

    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><img src="images/logo30.png" alt=""> </a>
        </div> 
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php"><i class="icon-home icon-white"></i> Inicio</a></li>                            
              <li><a href="tables.html"><i class="icon-th icon-white"></i> Seccion 2</a></li>
              <li><a href="tables.html"><i class="icon-th icon-white"></i> Seccion 3</a></li>
              <li class="active"><a href="user.html"><i class="icon-user icon-white"></i> <?= $user['email'];?></a></li>
              <li>   </li>
              <li><a href="logout.php"><i class="icon-th icon-white"></i> Cerrar sesion</a></li>

            </ul>
          </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container">
        <div class="row">

        	<div class="col-lg-6">
        		
        		<div class="register-info-wraper">
        			<div id="register-info">
        				<div class="cont2">
        					<div class="thumbnail">
								<img src="images/face.jpg" alt="Marcel Newman" class="img-circle">
							</div><!-- /thumbnail -->
							<h2><?= $user['email'];?></h2>
        				</div>
        				<div class="row">
        					<div class="col-lg-3">
        						<div class="cont3">
        							<p><ok>Username:</ok> BASICOH</p>
        							<p><ok>Tipo usuario:</ok> <?= $user['tipo'];?></p>
        							<p><ok>Location:</ok> Madrid, Spain</p>
        							<p><ok>Address:</ok> Blahblah Ave. 879</p>
        						</div>
        					</div>
        					<div class="col-lg-3">
        						<div class="cont3">
        						<p><ok>Registered:</ok> April 9, 2020</p>
        						<p><ok>Last Login:</ok> January 29, 2020</p>
        						<p><ok>Phone:</ok> +34 619 663553</p>
        						<p><ok>Mobile</ok> +34 603 093384</p>
        						</div>
        					</div>
        				</div><!-- /inner row -->
						<hr>
						<div class="cont2">
							<h2>Opciones</h2>
						</div>
						<br>
							<div class="info-user2">
								<span aria-hidden="true" class="li_user fs1"></span>
								<span aria-hidden="true" class="li_settings fs1"></span>
								<span aria-hidden="true" class="li_mail fs1"></span>
								<span aria-hidden="true" class="li_key fs1"></span>
								<span aria-hidden="true" class="li_lock fs1"></span>
								<span aria-hidden="true" class="li_pen fs1"></span>
							</div>

        				
        			</div>
        		</div>

        	</div>

        	<div class="col-sm-6 col-lg-6">
        		<div id="register-wraper">
        		    <form id="register-form" class="form">
        		        <legend>Nuevo usuario</legend>
        		    
        		        <div class="body">
        		        	<!-- first name -->
    		        		<label for="name">Primer nombre</label>
    		        		<input name="name" class="input-huge" type="text" required>
        		        	<!-- last name -->
    		        		<label for="surname">Apellido paterno</label>
    		        		<input name="surname" class="input-huge" type="text"required>
        		        	<!-- username -->
        		        	<label>Usuario</label>
        		        	<input class="input-huge" type="text"required>
        		        	<!-- email -->
        		        	<label>E-mail</label>
        		        	<input class="input-huge" type="text"required>
        		        	<!-- password -->
        		        	<label>Password</label>
        		        	<input class="input-huge" type="text"required>

        		        </div>
        		    
        		        <div class="footer">
        		            <label class="checkbox inline">
        		                <input type="checkbox" id="inlineCheckbox1" value="option1" required> Estoy de acuerdo con los terminos &amp; condiciones
        		            </label>
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
</body>
<?php endif;?>
</html>
</html>