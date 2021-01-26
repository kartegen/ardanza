
<?php
$server = 'localhost';
$username = 'rootardanza';
$password = 'qwerty123';
$database = 'ardanza';

// Create connection
$conn = mysqli_connect($server, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$id=$_GET['id'];
$sql = "UPDATE users SET estatus='adeudo' WHERE id= $id";

if (mysqli_query($conn, $sql)) {
    echo '<script language="javascript">alert("Alumno se puso al corriente");window.location.href="index2.php"</script>';
} else {
    echo '<script language="javascript">alert("Ocurrio un error");window.location.href="index2.php"</script>' . mysqli_error($conn);
}

mysqli_close($conn);
?>