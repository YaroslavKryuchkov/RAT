<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "INSERT INTO calls (FromAdress, ToAdress, CallNum) VALUES ('{$_POST['from']}', '{$_POST['where']}', '{$_POST['phone']}')";
  $result = $link->query($query);
  if($_POST['R'] == "1"){
    header("Location: call.php"); exit();
  }
  else{
    header("Location: thank.php"); exit();
  }
?>