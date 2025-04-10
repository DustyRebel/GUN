<?php
// Начинаем сеанс
session_start();
session_destroy();
    header("Location: RGZlogin.php");
    exit;
?>
