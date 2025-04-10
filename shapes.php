<?php
// Создание нового изображения
$image_width = 512;
$image_height = 512;
$image = imagecreatetruecolor($image_width, $image_height);

// Задание цвета фона
$bg_color = imagecolorallocate($image, 255, 255, 255);
imagefilledrectangle($image, 0, 0, $image_width, $image_height, $bg_color);

// Функция для рисования случайных фигур
function drawRandomShape($image, $image_width, $image_height) {
    $colors = array(
        imagecolorallocate($image, 255, 0, 0),   // Красный
        imagecolorallocate($image, 0, 255, 0),   // Зеленый
        imagecolorallocate($image, 0, 0, 255),   // Синий
        imagecolorallocate($image, 255, 255, 0), // Желтый
        imagecolorallocate($image, 255, 0, 255), // Фиолетовый
        imagecolorallocate($image, 0, 255, 255)  // Бирюзовый
    );

    $shapes = array('rectangle', 'circle', 'triangle');
    $random_shape = $shapes[array_rand($shapes)];

    $color = $colors[array_rand($colors)];

    switch ($random_shape) {
        case 'rectangle':
            $x1 = mt_rand(0, $image_width / 2);
            $y1 = mt_rand(0, $image_height / 2);
            $x2 = mt_rand($image_width / 2, $image_width);
            $y2 = mt_rand($image_height / 2, $image_height);
            imagefilledrectangle($image, $x1, $y1, $x2, $y2, $color);
            break;
        case 'circle':
            $radius = mt_rand(20, 100);
            $center_x = mt_rand($radius, $image_width - $radius);
            $center_y = mt_rand($radius, $image_height - $radius);
            imagefilledellipse($image, $center_x, $center_y, $radius * 2, $radius * 2, $color);
            break;
        case 'triangle':
            $x1 = mt_rand(0, $image_width);
            $y1 = mt_rand(0, $image_height);
            $x2 = mt_rand(0, $image_width);
            $y2 = mt_rand(0, $image_height);
            $x3 = mt_rand(0, $image_width);
            $y3 = mt_rand(0, $image_height);
            imagefilledpolygon($image, array($x1, $y1, $x2, $y2, $x3, $y3), 3, $color);
            break;
    }
}

// Рисование случайных фигур
$num_shapes = mt_rand(5, 15);
for ($i = 0; $i < $num_shapes; $i++) {
    drawRandomShape($image, $image_width, $image_height);
}

// Загадочные фразы
$mysterious_phrases = array(
    "UwU",
    "Bruh.",
    "What are you doing here?",
    "No.",
    "What is this mess?",
    "My name is Yoshikage Kira. I'm 33 years old. My house is in the northeast section of Morioh, where all the villas are, and I am not married. I work as an employee for the Kame Yu department stores, and I get home every day by 8 PM at the latest. I don't smoke, but I occasionally drink",
    "Tits.",
    "Are you a smart fella or a fart smella?",
    "Terra incognita."
);

// Выбор случайной загадочной фразы
$random_phrase = $mysterious_phrases[array_rand($mysterious_phrases)];

// Задание цвета для текста
$text_color = imagecolorallocate($image, 0, 0, 0); // Черный

// Положение текста
$text_x = mt_rand(20, $image_width - 200); // Случайное положение по оси X
$text_y = mt_rand(20, $image_height - 30); // Случайное положение по оси Y
// Вывод загадочной фразы
imagestring($image, 3, $text_x, $text_y, $random_phrase, $text_color);

// Отправка HTTP-заголовка для указания типа содержимого
header('Content-Type: image/png');

// Вывод изображения в формате PNG
imagepng($image);

// Освобождение памяти, занятой изображением
imagedestroy($image);
?>
