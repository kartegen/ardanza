<?php
// Checa campos vacios
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No se puede enviar, faltan datos";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];
	
// crea el mensaje por correo
$to = 'kartegen@gmail.com';//'emmanuelgm@procyonserviciosintegrales.com';  Aqui va a quien le llega el correo
$email_subject = "Mensaje desde la web:  $name";
$email_body = "Te enviaron un correo desde el sitio.\n\n"."Aqui estan los detalles:\n\nNombre: $name\n\nEmail: $email_address\n\nMensaje:\n$message";
$headers = "De tu pagina web\n"; // Aqui debemos ponerla url
$headers .= "Reply: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>