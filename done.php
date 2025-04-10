<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
</head>
<body>
 <?php
    // Check if data was submitted using the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get data from the form
        $uname_popup = $_POST["uname_popup"];
        $notification_text_popup = $_POST["notification-text_popup"];
        $unumber_popup = $_POST["unumber_popup"];

if (!preg_match("/^[A-Za-zА-Яа-яЁё\s]+$/u", $uname_popup)) {
	    echo "<h1>Неудача!</h1>";
?>
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<?php
            echo "<p>Имя не должно содержать цифры и вспомогательные символы.</p>";
            echo "<p>Если Вас зовут X Æ A-12, извините.</p>";
        } 
else if (!preg_match("/^[0-9]+$/", $unumber_popup)) {
echo "<h1>Неудача!</h1>";
?>
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<img width = "30" height = "30" src="https://media.tenor.com/ZTzI14BUzJkAAAAi/mya-thurston-waffles.gif">
<?php
            echo "<p>Ваше число должно быть числом!</p>";
            echo "<p>(Вводите только цифры...)</p>";
}

else {
            // Display data on the screen
?>

<h1>Успех!</h1>
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
<img width = "30" height = "50" src="https://media.tenor.com/fVuQICSLxu8AAAAi/wolf-dancing-meme-dancing-wolf-meme.gif">
 <?php
            echo "<p><strong>Имя:</strong> $uname_popup</p>";
            echo "<p><strong>Птица:</strong> $notification_text_popup</p>";
            echo "<p><strong>Число:</strong> $unumber_popup</p>";
        }
    } else {
        // If data was not submitted using the POST method, display an error message
        echo "<p>Data was not sent.</p>";
    }?>

</body>
</html>
