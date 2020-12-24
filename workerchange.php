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
  <div class="order"><form action="change_worker.php" method="POST">
    Если поле не надо изменять то оставте поле пустым<br>
    Имя:<input type="text" name="FName"><br>
    Фамилия:<input type="text" name="SName"><br>
    Отчество:<input type="text" name="LName"><br>
    Телефон:<input type="text" name="phone"><br>
    Зарплата в час:<input type="text" name="salary"><br>
    Стаж:<input type="text" name="exp"><br>
    Кол-во часов в неделю:<input type="text" name="hours"><br>
    <input type="submit" value="Изменить">
    <input type="hidden" name="ID" value="{$_GET['ID']}">
  </form></div>
</html>
END;
?>