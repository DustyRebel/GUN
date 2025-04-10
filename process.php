<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selectedNotification = $_POST["notification-text"];
    $selectedDate = date("d-m-Y"); // текущая дата и время

    // Устанавливаем cookie с временем жизни 1 час
    $selectedData = "$selectedNotification:$selectedDate";
    setcookie("selected-data", $selectedData, time() + 3600, "/");
}

// Перенаправляем пользователя обратно на страницу выбора уведомления
header("Location: coc.php");
exit;
?>
