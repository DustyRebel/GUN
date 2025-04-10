<?php
session_start(); // Инициализация сессии, если она не была инициализирована ранее

if (isset($_SESSION['moderator_authenticated']) || isset($_SESSION['admin_authenticated'])) {
?>


<?php
// Подключение к базе данных
$mysqli = mysqli_connect('localhost', 'user110', 'gun_fedora_user_110', 'user110');

// Проверка соединения
if ($mysqli === false) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

if (isset($_POST['add_bird'])) {
    // Получаем данные из формы
    $name = $_POST['name'];
    $age = $_POST['age'];
    $vid = $_POST['vid'];
    $type = $_POST['type'];
    $status = $_POST['status'];

    // Подготавливаем запрос для проверки наличия растения с таким же именем
    $check_sql = "SELECT * FROM baza WHERE name = ?";
    $check_stmt = $mysqli->prepare($check_sql);

    // Привязываем параметры к запросу
    $check_stmt->bind_param("s", $name);

    // Выполняем запрос
    $check_stmt->execute();

    // Получаем результат запроса
    $check_result = $check_stmt->get_result();

    // Проверяем, есть ли уже птица с таким именем
    if ($check_result->num_rows > 0) {
        echo "Растение с таким именем уже существует!";
    } else {
        // Подготавливаем запрос для вставки данных
        $sql = "INSERT INTO baza (name, age, vid, type, status) VALUES (?, ?, ?, ?, ?)";

        // Подготавливаем выражение
        $stmt = $mysqli->prepare($sql);

        // Проверяем успешность подготовки выражения
        if ($stmt === false) {
            echo "Ошибка подготовки запроса: " . $mysqli->error;
        } else {
            // Привязываем параметры к запросу
            $stmt->bind_param("sisss", $name, $age, $vid, $type, $status);

            // Выполняем запрос
            $result = $stmt->execute();

            // Проверяем успешность выполнения запроса
            if ($result === false) {
                echo "Ошибка при добавлении записи: " . $mysqli->error;
            } else {
                header("Location: db110.php");
                exit;
            }

            // Закрываем выражение
            $stmt->close();
        }
    }

    // Закрываем выражение проверки
    $check_stmt->close();
}

// Закрываем соединение с базой данных
$mysqli->close();
?>

<form method="post" action="">
    <label for="name">Имя:</label>
    <input type="text" name="name" id="name" required><br>
    <label for="age">Возраст:</label>
    <input type="number" name="age" id="age" required><br>
    <label for="vid">Вид:</label>
    <input type="text" name="vid" id="vid" required><br>
    <label for="type">Тип:</label>
    <select name="type" id="type" required>
        <?php
        // Подключение к базе данных
        $mysqli = mysqli_connect('localhost', 'user110', 'gun_fedora_user_110', 'user110');

        // Запрос для получения списка типов
        $sql = "SELECT DISTINCT type FROM baza";
        $result = $mysqli->query($sql);

        // Выводим опции списка выбора
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
        }

        // Закрываем соединение с базой данных
        $mysqli->close();
        ?>
    </select><br>
    <label for="status">Статус:</label>
    <select name="status" id="status" required>
        <?php
        // Подключение к базе данных
        $mysqli = mysqli_connect('localhost', 'user110', 'gun_fedora_user_110', 'user110');

        // Запрос для получения списка названий растений
        $sql = "SELECT DISTINCT status FROM baza";
        $result = $mysqli->query($sql);

        // Выводим опции списка выбора
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['status'] . "'>" . $row['status'] . "</option>";
        }

        // Закрываем соединение с базой данных
        $mysqli->close();
        ?>
    </select><br>
    <input type="submit" name="add_bird" value="Добавить птицу">
</form>
<?php
} elseif ((!isset($_SESSION['moderator_authenticated'])) && (!isset($_SESSION['admin_authenticated']))) {
echo "Вы как тут оказались??";
echo "<br>";
echo "<form method='post' action='db110.php'>";
echo "<input type='submit' value='Вернуться и подумать еще раз'>";
echo "</form>";
echo "<img src='cop.jpg'>";
}
?>

