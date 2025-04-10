<?php
session_start();



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка правильности CAPTCHA
    if (isset($_POST['captcha']) && $_POST['captcha'] == $_SESSION['captcha_keystring']) {
        // CAPTCHA введена правильно
        // Сохраняем данные из текстового поля
	$cap = $_SESSION['captcha_keystring'];
        $editorText = $_POST['editor'];
	$selectedDate = date("Y-m-d H:i:s");
	$text =  "$cap $selectedDate $editorText";
        // Сохраняем данные в файле editortxt2.php
        $file = fopen("notifications.txt", "a");
	flock($file, 2);
	 fwrite($file, $text . PHP_EOL);
	flock($file, 3);
        fclose($file);
        // Перенаправляем на страницу editortxt.php
       //header("Location: editortxt.php");
        //exit();
	echo "Запись успешно добавлена!";
    } elseif  (isset($_POST['captcha']) && $_POST['captcha'] != $_SESSION['captcha_keystring']){
        // CAPTCHA введена неправильно
        echo "Неправильная капча.";


    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CKEditor и CAPTCHA</title>
    <script src="ckeditor/ckeditor.js"></script>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" target="_self">
        <!-- Поле для ввода текста с CKEditor -->
        <textarea name="editor" id="editor"></textarea>
        <br>
        <!-- Отображение изображения CAPTCHA -->
        <p><img src="kcaptcha/index.php?<?php echo session_name()?>=<?php echo session_id()?>"></p>
        <br>
        <!-- Поле для ввода CAPTCHA -->
        <label for="captcha">Введите CAPTCHA:</label>
        <input type="text" id="captcha" name="captcha">
        <br>
        <!-- Вывод сообщения об ошибке, если CAPTCHA введена неправильно -->
        <p style="color: red;"><?php echo $captchaMessage; ?></p>
        <!-- Кнопка отправки формы -->
        <input type="submit" value="Submit">
    </form>
	<p>Посмотреть записи <a href = displayNotifications.php> можно здесь</a></p>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>