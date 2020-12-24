<?php
  session_start();

  require "hlpb.php";

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
    <li><a href="carrepaircenter.php">Автосалоны</a></li>
END;
      break;
    case 3:
    echo <<<END
      <li><a href="car.php">Машины</a></li>
    <li><a href="carstop.php">Автостоянки</a></li>
    <li><a href="carrepaircenter.php">Автосалоны</a></li>
END;
}
echo <<<END
  </ul></footer>
  <table><tr>
  <td>ID</td><td>Адресс</td><td>Кол-во мест</td><td>Cвободных мест</td>
  </tr>
END;

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT id, Addres, AllSpace, FreeSpace FROM carrepair";
  if($result = $link->query($query)){
    while($data = $result->fetch_assoc()){
      echo <<<END
      <tr>
      <td>{$data['id']}</td><td>{$data['Addres']}</td><td>{$data['AllSpace']}</td>
      <td><a href="realrepair.php?num={$_GET['num']}&id={$data['id']}">В эту стоянку</a></td>
      </tr>
END;
    }
    $result->free();
  }
  $link->close();
echo <<<END
  </table>
</body>
</html>
END;
?>