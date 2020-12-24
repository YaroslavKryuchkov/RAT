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
  <table><tr>
  <td>Откуда</td><td>Куда</td><td>Взят</td>
END;
      if($_SESSION['JID'] != 1){
        echo <<<END
        <td>Кнопка "Взять"</td>
END;
      }
      echo <<<END
  </tr>
END;
  
  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
  if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT FromAdress, ToAdress, CalledBy, CallNum, lifetime FROM calls";
  if($result = $link->query($query)){
    while($data = $result->fetch_assoc()){
      if(strtotime($data['lifetime']) <= strtotime(date("Y-m-d H:i:s")) - 600 && $data['CalledBy'] == "Свободен"){
        $query2 = "DELETE FROM calls WHERE CallNum = '{$data['CallNum']}' AND lifetime = '{$data['lifetime']}'";
        $link->query($query2);
        continue;
      }
      echo <<<END
      <tr>
      <td>{$data['FromAdress']}</td><td>{$data['ToAdress']}</td><td>{$data['CalledBy']}</td>
END;
      if($_SESSION['JID'] != 1)
      if($data['CalledBy'] == "Свободен"){
        echo <<<END
        <td><a href = 'callby.php?call={$data['CallNum']}&time={$data['lifetime']}'>Взять</a></td>
END;
      }
      else{
        if($_SESSION['Num'] == $data['CalledBy']){
          echo <<<END
        <td><a href = 'callend.php?call={$data['CallNum']}&time={$data['lifetime']}'>Сдать</a></td>
END;
        }
        else{
          echo <<<END
        <td>Вызван</td>
END;
        }
      }
      echo <<<END
      </tr>
END;
    }
    $result->free();
  }
  $link->close();
echo <<<END
  </table>
END;
if($_SESSION['JID'] != 2)
  echo "<a href = 'calladd.php'>Добавить вызов</a>";
echo <<<END
</body>
</html>
END;
?>