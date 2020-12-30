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
<title>Ardanza - Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">

<link rel="stylesheet" type="text/css"
	href="bootstrap/css/bootstrap.min.css" />

<link href="css/main.css" rel="stylesheet">
<link href="css/font-style.css" rel="stylesheet">
<link href="css/flexslider.css" rel="stylesheet">

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/lineandbars.js"></script>

<script type="text/javascript" src="js/dash-charts.js"></script>
<script type="text/javascript" src="js/gauge.js"></script>

<!-- NOTY JAVASCRIPT -->
<script type="text/javascript" src="js/noty/jquery.noty.js"></script>
<script type="text/javascript" src="js/noty/layouts/top.js"></script>
<script type="text/javascript" src="js/noty/layouts/topLeft.js"></script>
<script type="text/javascript" src="js/noty/layouts/topRight.js"></script>
<script type="text/javascript" src="js/noty/layouts/topCenter.js"></script>

<!-- You can add more layouts if you want -->
<script type="text/javascript" src="js/noty/themes/default.js"></script>
<!-- <script type="text/javascript" src="assets/js/dash-noty.js"></script> This is a Noty bubble when you init the theme-->
<script type="text/javascript"
	src="http://code.highcharts.com/highcharts.js"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>

<script type="text/javascript" src="js/admin.js"></script>

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
<link href="http://fonts.googleapis.com/css?family=Raleway:400,300"
	rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans"
	rel="stylesheet" type="text/css">

<script type="text/javascript">
    $(document).ready(function () {

        $("#btn-blog-next").click(function () {
            $('#blogCarousel').carousel('next')
        });
        $("#btn-blog-prev").click(function () {
            $('#blogCarousel').carousel('prev')
        });

        $("#btn-client-next").click(function () {
            $('#clientCarousel').carousel('next')
        });
        $("#btn-client-prev").click(function () {
            $('#clientCarousel').carousel('prev')
        });

    });

    $(window).load(function () {

        $('.flexslider').flexslider({
            animation: "slide",
            slideshow: true,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });

</script>
</head>
<body>
	<!-- NAVIGATION MENU -->

	<div class="navbar-nav navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img
					src="images/logo30.png" alt=""></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li ><a href="index.php"><i class="icon-home icon-white"></i> Inicio</a></li>                            
              		<li class="active"><a href="index2.php"><i class="icon-th icon-white"></i> Alumnos</a></li>
              		<li><a href="logout.php"><i class="icon-lock icon-white"></i> Cerrar sesión</a></li>

				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>

	<div class="container">

		<!-- FIRST ROW OF BLOCKS -->
		<div class="row">

			<!-- USER PROFILE BLOCK -->
			<div class="col-sm-3 col-lg-3">
				<div class="dash-unit">
					<dtitle> <?= $user['email'];?></dtitle>
					<hr>
					<div class="thumbnail">
						<img src="images/face80x80.jpg" alt="<?= $user['email'];?>"
							class="img-circle">
					</div>
					<!-- /thumbnail -->
					<h1>Administrador <?= $user['email'];?></h1>
					<h3>ARDANZA</h3>
					<br>
					<div class="info-user">
						<span aria-hidden="true" class="li_user fs1"></span> <span
							aria-hidden="true" class="li_settings fs1"></span> <span
							aria-hidden="true" class="li_mail fs1"></span> <span
							aria-hidden="true" class="li_key fs1"></span>
					</div>
				</div>
			</div>
			<div class="col-sm-9 col-lg-9">
				<!-- MAIL BLOCK -->
				<div class="dash-unit">
					<dtitle>Alumnos</dtitle>
					<hr>
					<div class="framemail">
						<div class="window">
							<!-- Inicio tabla -->
							<ul class="mail">								
								<?php
                                    $data = mysqli_connect("localhost", "root", "", "ardanza") or die('Error de conexion: ' . mysqli_error());
                                    $busc = mysqli_query($data, "SELECT email,estatus,tipo FROM users ");
                                    while ($row = mysqli_fetch_array($busc)) {
                                        echo "<li><i class='unread'></i><p class='sender'>" . $row[0] . "</p><p class='message'><strong>Estatus: " . $row[1] . "</strong> Tipo usuario: " . $row[2] . "</p>
                                                <div class='actions'>
                    			                    <a><img src='http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/undo.png' alt='reply'></a>
                    			                    <a><img src='http://png-1.findicons.com/files//icons/2232/wireframe_mono/16/star_fav.png' alt='favourite'></a>
                    			                    <a><img src='http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/tag.png' alt='label'></a>
                    			                    <a><img src='http://png-4.findicons.com/files//icons/2232/wireframe_mono/16/trash.png' alt='delete'></a>
                                                </div>
                                             </li>" ;
                                    }
                                    mysqli_close($data);
                                   ?>								
							</ul>
							<!-- Inicio tabla -->
						</div>
					</div>
				</div>
				<!-- /dash-unit -->
			</div>
		</div>
	</div>
	<!-- /container -->
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