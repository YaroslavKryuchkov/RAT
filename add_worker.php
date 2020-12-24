<?php
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "INSERT INTO worker (Login, Password, FirstName, SecondName, LastName, PhoneNum, Salary, Exp, FormWork, JobId) 
  VALUES ('{$_POST['login']}', '{$_POST['passwrd']}', '{$_POST['FName']}', '{$_POST['SName']}', '{$_POST['LName']}', '{$_POST['phone']}', {$_POST['salary']}, {$_POST['exp']}, '{$_POST['hours']}', {$_POST['jobid']})";
  $link->query($query);
  header("Location: worker.php"); exit();
?>