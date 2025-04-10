<?php
echo "<center>";
// Подключение к базе данных
$mysqli = mysqli_connect('localhost', 'user110', 'gun_fedora_user_110', 'user110');

// Проверка соединения
if ($mysqli === false) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Выводим таблицу baza
$result = $mysqli->query("SELECT * FROM baza");
if ($result) {
    echo "<h2>Таблица птиц центра (baza)</h2>";
    echo "<table style='border-collapse: collapse; border: 2px solid #6B99C3;'>
            <tr style='border-collapse: collapse; border: 2px solid #6B99C3;'>
                <th>Имя</th>
                <th>Возраст</th>
                <th>Вид</th>
                <th>Тип</th>
                <th>Статус</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>{$row['name']}</td>
                <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>{$row['age']}</td>
                <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>{$row['vid']}</td>
                <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>{$row['type']}</td>
                <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>{$row['status']}</td>
            </tr>";
    }
    echo "</table>";
    $result->free();
} else {
    echo "Ошибка выполнения запроса: " . $mysqli->error;
}
// Закрываем соединение с базой данных
$mysqli->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>График</title>
<style>
        body {
            background-color: #16354D;
            color: #E4E5EA;
        }
        .chart-container img {
            border: 2px solid #6B99C3;
        }
    </style>

</head>
<body BGCOLOR="#16354D" TEXT="#E4E5EA" LEFTMARGIN="3" LINK="#6B99C3" VLINK="#D2D2D4">

<h2>График количества типов питания птиц в процентах</h2>
<div class="chart-container">
    <img src="pic.php" alt="График" border = "2">
</div>
<form method='post' action='db110.php'>
<input type='submit' value='Вернуться на страницу с БД'>
</form>
</body>
</html>
