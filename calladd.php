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
}
echo <<<END
  </ul></footer>
  <div class="order"><form action="add_call.php" method="POST">
    Откуда:<input type="text" name="from"><br>
    Куда:<input type="text" name="where"><br>
    Телефон:<input type="text" name="phone"><br>
    <input type="submit" value="Заказать">
    <input type="hidden" name="R" value="1">
  </form></div>
</html>
END;
?>