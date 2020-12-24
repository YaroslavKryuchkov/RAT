<?php
session_start();
echo <<<END
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Таксопарк "Малинка"</title>
  <link rel="stylesheet" type="text/css" href="style.css">
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
END;
      break;
    case 3:
    echo <<<END
    <li><a href="car.php">Машины</a></li>
    <li><a href="carstop.php">Автостоянки</a></li>
END;
}
echo <<<END
  </ul></footer>
  <div class="order"><form action="add_car.php" method="POST">
    Марка:<input type="text" name="mark"><br>
    Номер:<input type="text" name="num"><br>
    ID стоянки:<input type="text" name="ID"><br>
    <input type="submit" value="Добавить">
  </form></div>
</html>
END;
?>