<?php
session_start(); // Инициализация сессии, если она не была инициализирована ранее

if (isset($_SESSION['admin_authenticated'])) {
?>




<?php
// Проверяем, был ли передан идентификатор птицы для обновления
if(isset($_GET['name'])) {
    // Получаем текущее имя птицы из запроса
    $current_name = $_GET['name'];

    // Проверяем, была ли отправлена форма с обновленными данными
    if(isset($_POST['age']) && isset($_POST['vid']) && isset($_POST['type']) && isset($_POST['status'])) {
        // Получаем новые данные о растении из формы
        $age = $_POST['age'];
        $vid = $_POST['vid'];
        $type = $_POST['type'];
        $status = $_POST['status'];

        // Ваш код подключения к базе данных
        $mysqli = mysqli_connect('localhost','user110','gun_fedora_user_110','user110');

        // Подготавливаем SQL запрос для обновления данных растения
        $sql = "UPDATE baza SET age='$age', vid='$vid', type='$type', status='$status' WHERE name='$current_name'";

        // Выполняем запрос на обновление данных
        if($mysqli->query($sql) === TRUE) {
            header("Location: db110.php");
            exit;
        } else {
            echo "Ошибка при обновлении данных: " . $mysqli->error;
        }

        // Закрываем соединение с базой данных
        $mysqli->close();
    }

    $mysqli = mysqli_connect('localhost','user110','gun_fedora_user_110','user110');
    // Получаем данные о птицах из базы данных
    $sql = "SELECT * FROM baza WHERE name = '$current_name'";
    $result = $mysqli->query($sql);
    // Проверяем, успешно ли выполнен запрос
    if($result) {
        // Если растение найдено
        if($result->num_rows > 0) {
            // Получаем данные о птице
            $row = $result->fetch_assoc();
            $age = $row['age'];
            $vid = $row['vid'];
            $type = $row['type'];
            $status = $row['status'];

            // Выводим форму для обновления данных
            ?>
            <form method="post" action="">
                <input type="hidden" name="current_name" value="<?php echo $current_name; ?>">
                <label for="nname">Имя птицы:</label>
                <input type="text" name="nname" id="nname" value="<?php echo $current_name; ?>" disabled><br>

                <label for="age">Новый возраст:</label>
                <input type="number" name="age" id="age" value="<?php echo $age; ?>"><br>

                <input type="hidden" name="vid" value="<?php echo $vid; ?>">
                <label for="vvid">Вид:</label>
                <input type="text" name="vvid" id="vvid" value="<?php echo $vid; ?>" disabled><br>
                <input type="hidden" name="type" value="<?php echo $type; ?>">
                <label for="ttype">Тип:</label>
                <input type="text" name="ttype" id="ttype" value="<?php echo $type; ?>" disabled><br>

                <label for="status">Новый статус:</label>
                <select name="status" id="status" required>
                    <?php
                    $mysqli = mysqli_connect('localhost', 'user110', 'gun_fedora_user_110', 'user110');
                    $sql = "SELECT DISTINCT status FROM baza";
                    $result = $mysqli->query($sql);
                    // Выводим опции списка выбора
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['status'] == $status) ? "selected" : "";
                        echo "<option value='" . $row['status'] . "' $selected>" . $row['status'] . "</option>";
                        }
                    $mysqli->close();
                    ?>
                </select><br>

                <input type="submit" value="Обновить данные">
            </form>
            <?php
        } else {
                header("Location: db110.php");
                exit;
        }
    } else {
        echo "Ошибка выполнения запроса: " . $mysqli->error;
    }

    // Закрываем соединение с базой данных
    $mysqli->close();
} else {
    // Если имя растения не было передано, перенаправляем пользователя обратно на страницу с таблицей
    header("Location: db110.php");
    exit;
}
?>
<?php
} elseif (!isset($_SESSION['admin_authenticated'])) {
echo "Вы как тут оказались??";
echo "<br>";
echo "<form method='post' action='db110.php'>";
echo "<input type='submit' value='Вернуться и подумать еще раз'>";
echo "</form>";
echo "<img src='cop.jpg'>";

}
?>


