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
    <li><a href="carrepaircenter.php">Автосалоны</a></li>
END;
      break;
    case 1:
      echo <<<END
    <li><a href="call.php">Вызовы</a></li>
END;
      break;
    case 2:
      echo <<<END
    <li><a href="call.php">Вызовы</a></li>
    <li><a href="car.php">Машины</a></li>
END;
      break;
    case 3:
    echo <<<END
    <li><a href="car.php">Машины</a></li>
    <li><a href="carstop.php">Автостоянки</a></li>
    <li><a href="carrepaircenter.php">Автосалоны</a></li>
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
  <div class="login">Добро пожаловать в систему,
END;
switch ($_SESSION['JID']) {
  case 0:
    echo "администратор.";
    break;
  case 1:
    echo "диспетчер.";
    break;
  case 2:
    echo "водитель.";
    break;
  case 3:
    echo "механик.";
    break;
  case 4:
    echo "наёмщик.";
    break;
}
echo <<<END
</div>
</body>
</html>
END;
?>