<?php
function transliterate($string) {
    $table = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',   'г' => 'g',
        'д' => 'd',   'е' => 'e',   'ё' => 'e',   'ж' => 'zh',
        'з' => 'z',   'и' => 'i',   'й' => 'y',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',   'о' => 'o',
        'п' => 'p',   'р' => 'r',   'с' => 's',   'т' => 't',
        'у' => 'u',   'ф' => 'f',   'х' => 'kh',  'ц' => 'ts',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'shch','ъ' => '',
        'ы' => 'i',   'ь' => '',    'э' => 'e',   'ю' => 'yu',
        'я' => 'ya',  'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',   'Ё' => 'E',
        'Ж' => 'Zh',  'З' => 'Z',   'И' => 'I',   'Й' => 'Y',
        'К' => 'K',   'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',   'С' => 'S',
        'Т' => 'T',   'У' => 'U',   'Ф' => 'F',   'Х' => 'H',
        'Ц' => 'Ts',  'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Shch',
        'Ъ' => '',    'Ы' => 'Y',   'Ь' => '',    'Э' => 'E',
        'Ю' => 'Yu',  'Я' => 'Ya'
    );

    return strtr($string, $table);
}

// Подключение к базе данных
$mysqli = mysqli_connect('localhost', 'user110', 'gun_fedora_user_110', 'user110');

// Проверка соединения
if ($mysqli === false) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// Получаем количество цветов каждого типа
$type_counts = array();
$query = "SELECT type, COUNT(*) AS count FROM baza GROUP BY type";
$result = $mysqli->query($query);
$total_count = 0; // Общее количество цветов
while ($row = $result->fetch_assoc()) {
    $type_counts[$row['type']] = $row['count'];
    $total_count += $row['count'];
}
$result->free();

// Закрываем соединение с базой данных
$mysqli->close();

// Создание изображения
$size_x = 800;
$size_y = 360;
$im = @imagecreate($size_x, $size_y) or die("Невозможно инициализировать GD");

// Назначение цветов
$bg_color = imagecolorallocate($im, 0, 0, 0); // Черный фон
$line_color = imagecolorallocate($im, 255, 255, 255); // Белая горизонтальная линия

imageline($im, 0, $size_y / 2, $size_x, $size_y / 2, $line_color); // Горизонтальная линия

// Цвета для каждого столбца
$colors = array(
    imagecolorallocate($im, 0, 191, 255), // Голубой
    imagecolorallocate($im, 255, 255, 255), // Белый
    imagecolorallocate($im, 173, 216, 230) // Светло голубой
);

$x = 220;
$y = 30;
$color_index = 0;

foreach ($type_counts as $type => $count) {
    $percentage = round(($count / $total_count) * 100);
    $height = ($size_y - 2 * $y) * ($percentage / 100);
    $color = $colors[$color_index];
    imagefilledrectangle($im, $x, $size_y / 2 - $height, $x + 150, $size_y / 2, $color);

    // Добавление текста с процентом
    $text_color = imagecolorallocate($im, 255, 255, 255); // Белый текст
    imagestring($im, 3, $x + 15, $size_y / 2 - $height - 15, "$percentage%", $text_color);

    // Конвертация текста
    $converted_type = transliterate($type);

    // Добавление подписей с типами цветов
    imagestring($im, 3, $x - 0, $size_y / 2 + 5, $converted_type, $text_color);

    $x += 100; // Сдвиг на следующий прямоугольник
    $color_index++; // Переключение цвета для следующего столбца
}

// Вывод изображения в формате PNG
header('Content-type: image/png; charset=utf-8');
imagepng($im);
imagedestroy($im);
?>