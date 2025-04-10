<?php
// Начинаем сеанс
session_start();

// Проверяем, была ли нажата кнопка "Выйти"
if (isset($_POST['logout'])) {
    // Удаляем все переменные сессии
    $_SESSION = array();

    // Уничтожаем сессию
    session_destroy();

    // Перенаправляем пользователя на страницу входа
    header("Location: db110.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выход</title>
</head>
<body>
    <h2>Вы действительно хотите выйти?</h2>
    <form method="post" action="">
        <input type="submit" name="logout" value="Выйти">
    </form>
    <br>
    <form method="post" action="db110.php">
        <input type="submit" value="Назад">
    </form>
</body>
</html>