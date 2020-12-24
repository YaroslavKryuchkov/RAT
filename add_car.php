<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT FreeSpace FROM carstop WHERE ID = '{$_POST['ID']}'";
  $result = $link->query($query);
  $data = $result->fetch_assoc();
  if($data['FreeSpace']-- > 0){
    $query = "UPDATE carstop SET FreeSpace = '{$data['FreeSpace']}' WHERE ID = '{$_POST['ID']}'";
    $result = $link->query($query);
  }
  else{
    header("Location: car.php"); exit();
  }
  $query = "INSERT INTO cars (Mark, Number, CarStop) VALUES ('{$_POST['mark']}', '{$_POST['num']}', '{$_POST['ID']}')";
  $result = $link->query($query);
  header("Location: car.php"); exit();
?>