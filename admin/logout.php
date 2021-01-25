<?php
  session_start();

  session_unset();

  session_destroy();

  header('Location: /ardanza/index.php');
?>