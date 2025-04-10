<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Data</title>
</head>
<body>
<center>
 <?php
    // Check if data was submitted using the POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get data from the form
        $bird = $_POST["birds"];
        $name = $_POST["bird-names"];
		if($bird!="" || $name !=""){

?>
<h1>Ваш выбор сделан!</h1>
<h2>Вы выбрали:</h2>
<?php 

echo "<p><strong>Вид:</strong> $bird</p>";
 echo "<p><strong>Кличка:</strong> $name</p>";
        } 
else {
echo "<h1>Вы ничего не выбрали!</h1>";
echo "<h2>Ну и ладно!</h2>";

}}


else {
?>
<h1>Неудача!</h1>
<?php 
}

?>
<img width = "50" height = "50" src="https://media.tenor.com/L1uksb0SpXIAAAAi/crouching-chicken-jump.gif">
<img width = "50" height = "50" src="https://media.tenor.com/L1uksb0SpXIAAAAi/crouching-chicken-jump.gif">
<img width = "50" height = "50" src="https://media.tenor.com/L1uksb0SpXIAAAAi/crouching-chicken-jump.gif">
Хорошего дня!
<img width = "50" height = "50" src="https://media.tenor.com/L1uksb0SpXIAAAAi/crouching-chicken-jump.gif">
<img width = "50" height = "50" src="https://media.tenor.com/L1uksb0SpXIAAAAi/crouching-chicken-jump.gif">
<img width = "50" height = "50" src="https://media.tenor.com/L1uksb0SpXIAAAAi/crouching-chicken-jump.gif">

<br><a href = "ajax.php">Вернуться назад</a>
</center>
</body>
</html>
