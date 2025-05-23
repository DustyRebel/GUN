<?php

# KCAPTCHA configuration file

$alphabet = "0123456789abcdefghijklmnopqrstuvwxyz"; # do not change without changing font files!

# symbols used to draw CAPTCHA
$allowed_symbols = "023456789"; #digits
//$allowed_symbols = "23456789abcdegkmnpqsuvxyz"; #alphabet without similar symbols (o=0, 1=l, i=j, t=f)
//$allowed_symbols = "23456789abcdegikpqsvxyz"; #alphabet without similar symbols (o=0, 1=l, i=j, t=f)

# folder with fonts
$fontsdir = 'fonts';	

# CAPTCHA string length
//$length = mt_rand(5,7); # random 5 or 6 or 7
$length = 4;

# CAPTCHA image size (you do not need to change it, this parameters is optimal)
$width = 200;
$height = 100;

# symbol's vertical fluctuation amplitude
$fluctuation_amplitude = 8;

#noise
//$white_noise_density=0; // no white noise
$white_noise_density=1/6;
//$black_noise_density=0; // no black noise
$black_noise_density=1/30;

# increase safety by prevention of spaces between symbols
$no_spaces = true;

# show credits
$show_credits = true; # set to false to remove credits line. Credits adds 12 pixels to image height
$credits = 'hi-hi'; # if empty, HTTP_HOST will be shown

# CAPTCHA image colors (RGB, 0-255)
$foreground_color = array(255, 255, 255);
$background_color = array(22, 53, 77);
//$foreground_color = array(mt_rand(0,80), mt_rand(0,80), mt_rand(0,80));
//$background_color = array(mt_rand(220,255), mt_rand(220,255), mt_rand(220,255));

# JPEG quality of CAPTCHA image (bigger is better quality, but larger file size)
$jpeg_quality = 150;
?>