<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Выбор птицы</title>
<style>
        body {
            display: flex;
            align-items: flex-start;
            justify-content: center;
            height: 100vh; /* Высота 100% видимой области экрана */
            margin: 0;
	    color: #E4E5EA;
	    font-size: 18px;
	    background-color: #16354D;
        }

        #content-wrapper {
            text-align: center;
        }

        #notification-text,
        button {
            margin-top: 10px;
       }
    </style>
</head>
<body>
<div id="content-wrapper">
    <?php
    $selectedData = isset($_COOKIE['selected-data']) ? $_COOKIE['selected-data'] : '';
    if (!empty($selectedData)) {
        list($selectedNotification, $selectedDate) = explode(":", $selectedData);
        echo "<div>Ваша птица: $selectedNotification, Дата знакомства: $selectedDate</div><br>";
}
    else {
echo "Вы здесь впервые? Тогда выберите лучшую птицу из списка!<br>";
}
    ?>

    <form action="process.php" method="post">
        <label for="notification-text">Выберите птицу:</label>
        <select name="notification-text" id="notification-text">
            <option value="Голубь">Голубь</option>
            <option value="Филин">Филин</option>
            <option value="Синица">Синица</option>
	    <option value="Тукан">Тукан</option>
	    <option value="Пингвин">Пингвин</option>
	    <option value="Утка">Утка</option>
        </select>

        <button type="submit">Выбрать и сохранить</button>
    </form>
</div>
</body>
</html>
