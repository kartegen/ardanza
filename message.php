<?php


include ("services.php");
$messages = new Services();
if (isset($_POST) && ! empty($_POST)) {
    $name = $messages->clean($_POST['name']);
    $email = $messages->clean($_POST['email']);
    $message = $messages->clean($_POST['message']);
    $res = $messages->save($name, $email, $message);
    if ($res) {
        
        echo "<script>
                alert('Mensaje enviado correctamente');
                window.location= '/ardanza/index.php'
    </script>";
    } else {
        echo "<script>
                alert('No se pudo enviar el mensaje');
                
    </script>";}
}
?>