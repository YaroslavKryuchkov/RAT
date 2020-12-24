<?php

  if (ini_get('register_globals'))
{
    foreach ($_SESSION as $key=>$value)
    {
        if (isset($GLOBALS[$key]))
            unset($GLOBALS[$key]);
    }
}
  session_start();

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT WorkerID, Password, JobId, PhoneNum FROM worker WHERE Login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1";
  $result = $link->query($query);
  $data = $result->fetch_assoc();
  if($data['Password'] === $_POST['password'])
  {
    $_SESSION["ID"] = $data['WorkerID'];
    $_SESSION["JID"] = $data['JobId'];
    $_SESSION["Num"] = strval($data['PhoneNum']);
    header("Location: workstation.php"); exit();
  }

  header("Location: index.php"); exit();
?>