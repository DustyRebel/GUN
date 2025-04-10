
<?php
session_start(); // Инициализация сессии, если она не была инициализирована ранее

if (isset($_SESSION['admin_authenticated'])) {
?>



<?php
// Проверяем, был ли передан идентификатор птицы для удаления
if(isset($_GET['name'])) {
    // Получаем идентификатор птицы из запроса
    $name = $_GET['name'];

    $mysqli = mysqli_connect('localhost','user110','gun_fedora_user_110','user110');
    $sql = "DELETE FROM baza WHERE name = '$name'";
    $mysqli->query($sql);

    // После успешного удаления перенаправляем пользователя на страницу с таблицей птиц
    header("Location: db110.php");
    exit;
} else {
    // Если идентификатор растения не был передан, перенаправляем пользователя обратно на страницу с таблицей
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


