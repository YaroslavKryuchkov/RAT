<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "UPDATE cars SET Stealed = '0' WHERE Number = '{$_GET['num']}'";
  $result = $link->query($query);

  header("Location: car.php"); exit();
?>