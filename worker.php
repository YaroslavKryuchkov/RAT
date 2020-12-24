<?php
session_start();
echo <<<END
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Таксопарк "Малинка"</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .login{
      position: absolute;
      top: 50%;
      left: 50%;
      width: 300px;
      heigth: 100px;
      margin: -50px 0 0 -150px;
      background-color: grey;
    }
  </style>
</head>
<body>
  <footer><ul>
    <li class="logo">Таксопарка "Малинка"</li>
END;
  switch ($_SESSION['JID']) {
    case 0:
      echo <<<END
    <li><a href="call.php">Вызовы</a></li>
    <li><a href="car.php">Машины</a></li>
    <li><a href="worker.php">Сотрудники</a></li>
    <li><a href="carstop.php">Автостоянки</a></li>
END;
      break;
    case 4:
    echo <<<END
    <li><a href="worker.php">Сотрудники</a></li>
END;
      break;
}
echo <<<END
  </ul></footer>
  <table><tr>
  <td>Имя</td><td>Фамилия</td><td>Отчество</td><td>Тел. Номер</td>
  <td>Зарплата в час</td><td>Стаж</td><td>Кол-во часов в неделю</td><td>Должность</td>
  </tr>
END;
  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT WorkerID, FirstName, SecondName, LastName, PhoneNum, Salary, EXP, FormWork, JobId FROM worker";
  if($result = $link->query($query)){
    while($data = $result->fetch_assoc()){
      if($data['JobId'] == 0 && $_SESSION['JID'] != 0) continue;
      if($data['WorkerID'] == $_SESSION['ID']) continue;
      $query = "SELECT Name FROM joblist WHERE JobId = {$data['JobId']}";
      $result2 = $link->query($query);
      $data2 = $result2->fetch_assoc();
      echo <<<END
      <tr>
      <td>{$data['FirstName']}</td><td>{$data['SecondName']}</td><td>{$data['LastName']}</td><td>{$data['PhoneNum']}</td>
      <td>{$data['Salary']}</td><td>{$data['EXP']}</td><td>{$data['FormWork']}</td><td>{$data2['Name']}</td>
      <td><a href = 'workerchange.php?ID={$data['WorkerID']}'>Изменить</a></td>
      <td><a href = 'workerfire.php?ID={$data['WorkerID']}'>Уволить</a></td>
      </tr>
END;
    }
    $result->free();
  }
  $link->close();
echo <<<END
  </table>
  <a href = 'workeradd.php'>Добавить сотрудника</a>
</body>
</html>
END;
?>