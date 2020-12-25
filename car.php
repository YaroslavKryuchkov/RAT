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
}
echo <<<END
  </ul></footer>
  <table><tr>
  <td>Марка</td><td>Номер</td><td>Парковка</td>
  </tr>
END;

  require "hlpb.php";

  $link = new mysqli($host, $login, $pass, $bd);
    if ($link->connect_errno) {
    printf("Соединение не удалось: %s\n", $link->connect_error);
    exit();
  }
  $query = "SELECT Mark, Number, Stealed, Will, CarStop FROM cars";
  if($result = $link->query($query)){
    $S = 0;
    $result2 = $link->query($query);
    while($data2 = $result2->fetch_assoc()){
      if(strcmp($data2['Stealed'] ,$_SESSION['Num']) == 0){
        $S = 1;
        break;
      }
    }
    while($data = $result->fetch_assoc()){
      if($data['Stealed'] != 0 && $_SESSION['JID'] == 2) continue;
      if($data['Will'] != 0  && $_SESSION['JID'] == 2) continue;
      $query2 = "SELECT Addres FROM carstop WHERE ID = {$data['CarStop']}";
      $result2 = $link->query($query2);
      $data2 = $result2->fetch_assoc();
      echo <<<END
      <tr>
      <td>{$data['Mark']}</td><td>{$data['Number']}</td><td>{$data2['Addres']}</td>
END;
      switch ($_SESSION['JID']) {
        case 0:
        if($data['Will'] == 0)
        if($S == "0" && $data['Steled'] == 0) echo "<td><a href = 'carsteal.php?num={$data['Number']}'>Взять машину</a></td>";
        elseif($S == "1" && strcmp($data['Stealed'] ,$_SESSION['Num']) != 0) echo "<td>Вы уже взяли другую машину машину</td>";
        elseif($S == "0" && $data['Steled'] != 0) echo "<td>Кто-то другой взял эту машину</td>";
        elseif(strcmp($data['Stealed'] ,$_SESSION['Num']) == 0) echo "<td><a href = 'carreturn.php?num={$data['Number']}'>Вернуть машину</a></td>";
        if($data['Will'] == 0) echo "<td><a href = 'carrepair.php?num={$data['Number']}'>В ремонт машину</a></td>";
        else echo "<td><a href = 'cargive.php?num={$data['Number']}'>Вернуть машину</a></td>";
        echo "<td><a href = 'cardelete.php?num={$data['Number']}'>Выкинуть машину</a></td>";
          break;
        case 2:
        if($S == "0" && $data['Steled'] == 0) echo "<td><a href = 'carsteal.php?num={$data['Number']}'>Взять машину</a></td>";
        elseif($S == "1" && strcmp($data['Stealed'] ,$_SESSION['Num']) != 0) echo "<td>Вы уже взяли другую машину машину</td>";
        elseif($S == "0" && $data['Steled'] != 0) echo "<td>Кто-то другой взял эту машину</td>";
        elseif(strcmp($data['Stealed'] ,$_SESSION['Num']) == 0) echo "<td>Вы взяли эту машину</td>";
          break;
        case 3:
        if($data["Stealed"] == "0") echo "<td>Машина на стоянке</td>";
        else echo "<td><a href = 'carreturn.php?num={$data['Number']}'>Вернуть машину</a></td>";
        if($data['Will'] == 0) echo "<td><a href = 'carrepair.php?num={$data['Number']}'>В ремонт машину</a></td>";
        else echo "<td><a href = 'cargive.php?num={$data['Number']}'>Вернуть машину</a></td>";
        echo "<td><a href = 'cardelete.php?num={$data['Number']}'>Выкинуть машину</a></td>";
          break;
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
  echo "<a href = 'caradd.php'>Добавить машину</a>";
echo <<<END
</body>
</html>
END;
?>