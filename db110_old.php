<html>
<head>
<link rel="stylesheet" href="style.css">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>База данных</title>
</head>
<body BGCOLOR="#16354D" TEXT="#E4E5EA" LEFTMARGIN="3" LINK="#6B99C3" VLINK="#D2D2D4">
<center>
<h1>База данных птиц центра</h1>
<?php
$mysqli = mysqli_connect('localhost','user110','gun_fedora_user_110','user110');
if (!$mysqli) { echo "Нет контакта!"; exit; }
else { echo "Отображена таблица птиц центра"; }

function displayBirdsTable($mysqli) {
    $sql = "SELECT * FROM baza";
    $result = $mysqli->query($sql);

    if ($result === false) {
        echo "Ошибка выполнения запроса: " . $mysqli->error;
    } elseif ($result->num_rows > 0) {
        echo "<table border='1' cellpadding='5' style='border-collapse: collapse; border: 2px solid #6B99C3;'>
                <tr style='border-collapse: collapse; border: 2px solid #6B99C3;'>
                    <th>Имя</th>
                    <th>Возраст</th>
                    <th>Вид</th>
                    <th>Тип</th>
                    <th>Статус</th>
                    <th>Обновить</th>
                    <th>Удалить</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr style='border-collapse: collapse; border: 2px solid #6B99C3;'>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>" . $row["name"] . "</td>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>" . $row["age"] . "</td>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>" . $row["vid"] . "</td>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>" . $row["type"] . "</td>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'>" . $row["status"] . "</td>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'><a href='update.php?name=" . $row["name"] . "'>Обновить</a></td>
                    <td style='border-collapse: collapse; border: 2px solid #6B99C3;'><a href='delete.php?name=" . $row["name"] . "'>Удалить</a></td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "Нет данных для отображения";
    }
}
displayBirdsTable($mysqli);
$mysqli->close();
?>

<?php
//ОТКАТИТЬ ТАБЛИЦУ В ИСХОДНОЕ СОСТОЯНИЕ
if (isset($_POST['otkat'])) {
$mysqli = mysqli_connect('localhost','user110','gun_fedora_user_110','user110');
$sql = "DELETE FROM baza";
$mysqli->query($sql);
$sql = "SELECT journal.name, journal.age, spicies.breed, spicies.type,  status.description  FROM journal INNER JOIN spicies ON journal.ids = spicies.ids INNER JOIN status ON journal.tag=status.tag"; 
$result = $mysqli->query($sql);
// Проверяем наличие результатов
if ($result === false) {
    echo "Ошибка выполнения запроса: " . $mysqli->error;}
elseif ($result->num_rows > 0) {
    // Цикл для обработки результирующего набора данных
    while ($row = $result->fetch_assoc()) {
        // Получаем данные из каждой строки результата запроса
        $name = $row["name"];
        $age = $row["age"];
        $breed = $row["breed"];
        $type = $row["type"];
        $description = $row["description"];
        // Формируем запрос для добавления данных в другую таблицу baza
        $insert_query = "INSERT INTO baza (name, age, vid, type,status) VALUES ('$name', '$age', '$breed', '$type', '$description')";
        // Выполняем запрос INSERT INTO
        $insert_result = $mysqli->query($insert_query);
        if ($insert_result === false) {
            echo "Ошибка при добавлении данных: " . $mysqli->error;
        }
    }
} else {
    echo "Нет данных для отображения";
}
$mysqli->close();
header("Location: db110.php");
}


?>
<br>
<form method="post" action="">
<input type="submit" name="otkat" value="Откатиться к исходным данным">
</form>

<form method="post" action="insert.php">
    <input type="submit" name="add" value="Добавить запись о птице">
    </form>

<h2>Найти запись о птице</h2>
<form method="post" action="">
    <label for="poisk">Введите кличку птицы:</label>
    <input type="text" id="poisk" name="poisk">
    <input type="submit" value="Поиск">
</form>
<?php
// ПОИСК ПО ИМЕНИ
if (isset($_POST['poisk'])) {
     $mysqli = mysqli_connect('localhost','user110','gun_fedora_user_110','user110');
    // Получение значения поискового запроса
    $search_term = $_POST['poisk'];
    $aa = $search_term;

    // Подготовка SQL-запроса для поиска птицы по имени
    $sql = "SELECT * FROM baza WHERE name LIKE ?";

    // Подготовка выражения
    if ($stmt = $mysqli->prepare($sql)) {
        // Привязка параметров
        $search_term = "%$search_term%"; // добавление символов подстановки для поиска по частичному совпадению
        $stmt->bind_param("s", $search_term);

        // Выполнение запроса
        if ($stmt->execute()) {
            // Получение результатов запроса
            $result = $stmt->get_result();
            // Проверка наличия результатов
            if ($result->num_rows > 0) {
                echo "Запись о птице найдена!";
                // Вывод заголовков таблицы
                echo "<table border='1' cellpadding='5' style='width: 50%;'>
                        <tr>
                            <th>Имя</th>
                            <th>Возраст</th>
                            <th>Вид</th>
                            <th>Тип</th>
                            <th>Статус</th>
                        </tr>";
                // Вывод результатов
                while ($row = $result->fetch_assoc()) {

                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["age"] . "</td>";
                    echo "<td>" . $row["vid"] . "</td>";
                    echo "<td>" . $row["type"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "</tr>";
                }
                // Закрытие таблицы
                echo "</table>";
            } else {
                echo "Птицы с кличкой " .$aa. " не существует.";
            }
        } else {
            echo "Ошибка выполнения запроса: " . $mysqli->error;
        }

        // Закрытие запроса
        $stmt->close();
        $mysqli->close();
    } else {
        echo "Ошибка подготовки запроса: " . $mysqli->error;
    }
}
?>

<h2>Диаграмма типов птиц по данным таблицы(Лаб3.1)</h2>
<form method="post" action="GD.php">
<input type="submit" name="sessions" value="Хочу смотреть диаграмму!">
</form>


</body>
</html>
