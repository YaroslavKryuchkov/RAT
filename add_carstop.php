<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "INSERT INTO carstop (Addres, AllSpace, FreeSpace) VALUES ('{$_POST['adress']}', '{$_POST['num']}', '{$_POST['num']}')";
  $result = $link->query($query);
  header("Location: carstop.php"); exit();
?>