<?php
$birdType = $_GET['birdType'];
$birdNames = [];

if ($birdType == "Ворон") {
    $birdNames = array("Бумеранг", "Эдгар", "Сэр Гордон III", "Дед", "Черныш");
} elseif ($birdType == "Сорока") {
    $birdNames = array("Локи", "Маруся");
} elseif ($birdType == "Дрозд рябинник") {
    $birdNames = array("Бандит", "Смородина", "Шишка", "Веточка");
} elseif ($birdType == "Сизая чайка") {
    $birdNames = array("Чаинка", "Боцман", "Бревно");
}

echo json_encode($birdNames);
?>
