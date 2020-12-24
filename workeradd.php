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
    case 4:
    echo <<<END
    <li><a href="worker.php">Сотрудники</a></li>
END;
      break;
}
echo <<<END
  </ul></footer>
  <div class="order"><form action="add_worker.php" method="POST">
    Логин:<input type="text" name="login"><br>
    Пароль:<input type="text" name="passwrd"><br>
    Имя:<input type="text" name="FName"><br>
    Фамилия:<input type="text" name="SName"><br>
    Отчество:<input type="text" name="LName"><br>
    Телефон:<input type="text" name="phone"><br>
    Зарплата в час:<input type="text" name="salary"><br>
    Стаж:<input type="text" name="exp"><br>
    Кол-во часов в неделю:<input type="text" name="hours"><br>
    Должность:<select name="jobid" required>
      <option></option>
      <option value="0">Admin</option>
      <option value="1">Dispetcher</option>
      <option value="2">Driver</option>
      <option value="3">Mechanic</option>
      <option value="4">Recruiter</option>
    </select>
    <input type="submit" value="Добавить">
  </form></div>
</html>
END;
?>