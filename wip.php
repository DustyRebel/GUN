<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Work in Poggers</title>
<style>
    body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }
    .content {
        text-align: center;
    }
</style>
</head>
<body>

<div class="content">
    <?php
    // Массив, содержащий ссылки на GIF-изображения и их размеры
    $gif_data = array(
        array("https://media.tenor.com/peb_bHdKKTUAAAAi/crying-cat.gif", 100, 100), // Первый элемент: ссылка, второй и третий: ширина и высота
        array("https://media1.tenor.com/m/mpCzgHAwceoAAAAd/penguin-explode.gif", 100, 100),
        array("https://media1.tenor.com/m/3iSeyjcNB0kAAAAd/wait-what.gif", 100, 100),
	array("https://media1.tenor.com/m/EajCVgJpGS0AAAAC/internet.gif", 200, 110),
	array("https://media.tenor.com/NDkh1K1huMsAAAAi/%D1%87%D0%B8%D0%BA%D0%B0%D0%B1%D1%83%D0%BC%D1%87%D0%B8%D0%BA.gif", 100, 100),

        // Добавьте здесь другие ссылки на GIF и их размеры по вашему усмотрению
    );

    // Случайный выбор данных GIF-изображения
    $random_index = array_rand($gif_data);
    $random_gif = $gif_data[$random_index];
    $random_gif_url = $random_gif[0]; // Ссылка на GIF
    $width = $random_gif[1]; // Ширина GIF
    $height = $random_gif[2]; // Высота GIF
    ?>
    <img src="<?php echo $random_gif_url; ?>" alt="GIF" width="<?php echo $width; ?>" height="<?php echo $height; ?>">
    <p>Work in Poggers!</p>
</div>

</body>
</html>
