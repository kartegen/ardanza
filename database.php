<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ardanza';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    
  die('Error de conexion a la base de datos: ' . $e->getMessage());
  
  
}

?>