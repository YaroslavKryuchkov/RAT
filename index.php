<?php
echo <<<END
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Таксопарк "Малинка"</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <style>
    .order{
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

    <li><a class="log" href="login.php">Войти как сотрудник</a></li>
  </ul></footer>
  <div class="order"><form action="add_call.php" method="POST">
    Заказ такси:<br>
    Откуда:<input type="text" name="from"><br>
    Куда:<input type="text" name="where"><br>
    Телефон:<input type="text" name="phone"><br>
    <input type="submit" value="Заказать">
    <input type="hidden" name="R" value="2">
  </form></div>
</body>
</html>
END;
?>