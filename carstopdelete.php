<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }

  $query = "DELETE FROM carstop WHERE ID = '{$_GET['ID']}'";
  $result = $link->query($query);
  header("Location: carstop.php"); exit();
?>