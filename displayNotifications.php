<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Записи птиц:</title>
</head>
<body BGCOLOR="#16354D" TEXT="E4E5EA">
    <h1>Записи посетителей</h1>
    <?php
    // Читаем содержимое файла с уведомлениями
    $fileContent = file_get_contents('notifications.txt');
    echo "<pre>$fileContent</pre>";
    ?>
</body>
</html>
