<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT Will FROM cars WHERE Number = '{$_GET['num']}'";
  $result = $link->query($query);
  $data = $result->fetch_assoc();
  $ID = $data['Will'];

  $query = "SELECT FreeSpace FROM carrepair WHERE ID = '{$ID}'";
  $result = $link->query($query);
  $data = $result->fetch_assoc();

  $data['FreeSpace']++;
  $query = "UPDATE carrepair SET FreeSpace = '{$data['FreeSpace']}' WHERE ID = '{$ID}'";
  $result = $link->query($query);

  $query = "UPDATE cars SET Will = 0 WHERE Number = '{$_GET['num']}'";
  $result = $link->query($query);
  header("Location: car.php"); exit();
?>