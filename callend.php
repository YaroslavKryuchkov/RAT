<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "DELETE FROM calls WHERE lifetime = '{$_GET['time']}' AND CallNum = '{$_GET['call']}'";
  $result = $link->query($query);

  header("Location: call.php"); exit();
?>