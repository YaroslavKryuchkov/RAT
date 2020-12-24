<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  if($_POST['FName']){
    $query = "UPDATE worker SET FirstName = '{$_POST['FName']}' WHERE WorkerID = {$_POST['ID']}";
    $link->query($query);
  }
  if($_POST['SName']){
    $query = "UPDATE worker SET SecondName = '{$_POST['SName']}' WHERE WorkerID = {$_POST['ID']}";
    $result = $link->query($query);
  }
  if($_POST['LName']){
    $query = "UPDATE worker SET LastName = '{$_POST['LName']}' WHERE WorkerID = {$_POST['ID']}";
    $result = $link->query($query);
  }
  if($_POST['phone']){
    $query = "UPDATE worker SET PhoneNum = '{$_POST['phone']}' WHERE WorkerID = {$_POST['ID']}";
    $result = $link->query($query);
  }
  if($_POST['salary']){
    $query = "UPDATE worker SET Salary = {$_POST['salary']} WHERE WorkerID = {$_POST['ID']}";
    $result = $link->query($query);
  }
  if($_POST['exp']){
    $query = "UPDATE worker SET EXP = {$_POST['exp']} WHERE WorkerID = {$_POST['ID']}";
    $result = $link->query($query);
  }
  if($_POST['hours']){
    $query = "UPDATE worker SET FormWork = {$_POST['hours']} WHERE WorkerID = {$_POST['ID']}";
    $result = $link->query($query);
  }
  header("Location: worker.php"); exit();
?>