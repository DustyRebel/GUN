<?php
// Начинаем сеанс
session_start();

// Проверяем, были ли переданы данные для аутентификации
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      // Проверяем аутентификацию админа
      if ($username == 'admin' && $password == 'thebestRGZ') {
        $_SESSION['admin_auth'] = true;
    }
else {
        // Если данные не совпадают, выводим сообщение об ошибке
        $error = "Неправильное имя пользователя или пароль";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в галерею</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="galerist center">
    <?php if (!isset($_SESSION['admin_auth']) || isset($error)) { ?>
        <form class="login-form" action="RGZlogin.php" method="post">
Вы Галерист?<br>
Авторизируйтесь!<br>
<?php if (isset($error)) echo "<p style='color: red; font-size: 1rem;'>$error</p>"; ?>
            <input type="text" name="username" placeholder="Логин" required>
            <input type="password" name="password" placeholder="Пароль" required>
<br>
            <button type="submit">Войти</button>
        </form>
<?php } else { ?> 
<form class="login-form" method="post" action="RGZexit.php">
Аутентификация успешна!<br>
Здравствуйте!<br>
<button type="submit" name="exit">Выйти</button>
</form> 
<?php } ?> 
    </div>
    <div class="visitor center">
<a href = "RGZmain.php" >Нажми чтобы попасть в галерею!</a>
    </div>

</body>
</html>
