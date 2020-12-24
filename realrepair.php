<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }

  $query = "SELECT FreeSpace FROM carrepair WHERE id = '{$_GET['id']}'";
  $result = $link->query($query);
  $data = $result->fetch_assoc();
  $data['FreeSpace']--;

  if($data['FreeSpace'] >= 0){
    $query = "UPDATE carrepair SET FreeSpace = '{$data['FreeSpace']}' WHERE id = '{$_GET['id']}'";
    $result = $link->query($query);
  }
  else{
    header("Location: car.php"); exit();
  }

  $query = "UPDATE cars SET Will = '{$_GET['id']}' WHERE Number = '{$_GET['num']}'";
  $result = $link->query($query);

  header("Location: car.php"); exit();
?>