<?php

$server = 'localhost';
$username = 'rootardanza';
$password = 'qwerty123';
$database = 'ardanza';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>