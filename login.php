<?php
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

    <li><a href="index.php">Заказать такси</a></li>
  </ul></footer>
  <div class="login"><form action="checklog.php" method="POST">
    Логин:<input type="text" name="login"><br>
    Пароль:<input type="text" name="password"><br>
    <input type="submit" value="Войти">
  </form></div>
</body>
</html>
END;
?>