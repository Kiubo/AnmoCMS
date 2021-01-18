<?php
$pageid = "register";
$security=rand(100000, 900000);
?>
<!DOCTYPE html>
<html>
<head>
<base href="<?= $config['hotelName'] ?>">
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta http-equiv="content-language" content="pt-br">
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
<meta name="robots" content="index,follow,all">
<meta name="googlebot" content="index,follow,all">
<title><?= $config['hotelName'] ?> : Registrate</title>
<meta name="author" content="Habbroi Hotel">
<meta name="description" content="No Habbroi Hotel, você pode fazer novos amigos, ganhar eventos, ser o mais rico, jogar e criar os seus próprios jogos, ser famoso, bater-papo, decorar e criar quartos incríveis com uma imensidão de mobílias disponíveis no nosso catálogo. Tudo isso, e muito mais, você encontrar aqui GRATUITAMENTE, o que está esperando para se registar neste incrível universo pixealado e fazer parte do nosso hotel??!!">
<meta name="keywords" content="habbo, habbo pirata, habbo atlanta, atlanta, habbon, habblet, habbinc, habbig, habbink, habbolove, habblove, hybbe, Haibbo Hotel, habbolella, lella hotel, lella, iron, iron hotel, habbig hotel, crazzy, crazzy habbo, habbok, habbook hotel, habbinfo, habblive, live, hotel, habbonados, raduckets, catálogo atualizado, habbo futebol, mobis, mobilias, snow war, futebol, bola rebug, bola habbo, bola 100%, bola 8q, bola 6q, bola 4q, wireds, mascotes, habbocity, habbo.com, habbo.,habbo online, habbo lotado, habbo bom, habbo atualizado, habbo antigo, habbo r63, habbo dino, habbo dinossauro, habbo original, habbo oficial, retro server, habb, rabbo, hotel, Age, Like Hotel, Habbo Privado, Pirata, Privado, Habbo.com.br, habble, habblo, fresh-hotel, crazzy, habbo hotel, virtual, mundo, comunidade virtual, grátis, comunidade, avatar, bate papo, online, jovem, rpg, entre, social, grupos, fóruns, seguro, jogue, jogos, online, amigos, jovens, raros, mobis raros, colecionar, expressão, emblemas, diversão, música, celebridade, visita de famosos, celebridades, mmo, mmorpg, rpg online">
<link rel="shortcut icon" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/favicon.ico">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/style.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/types.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/buttons.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/animations.css?1586564000" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap">
<style>
body {
	overflow:
}
</style>
</head>
<body class="root">
<?php User::Register(); ?>
<div class="container">
<div class="content flex-column">
<div class="header__1 flex">
<a href="/index" class="margin-auto flex">
<icon name="logo-hybbe-big" class="float-logo overflow-hidden"></icon>
</a>
<div class="scenery__farm_default pointer-none">
<span></span>
<span></span>
<span></span>
</div>
</div>
<div class="webcenter flex">
<div class="margin-bottom-min margin-top-min width-content">
<div class="general-box hotel-big-msg flex width-content">
<icon name="hotel-big" class="margin-right-min"></icon>
<h5 class="gray-clear margin-auto-top-bottom"></b>Habb está estrenando nuevo diseño el cual es</b> <b class="lowercase" style="text-transform: none;"> NutellaCMS 2.3<b></h5>
</div>
</div>
</div>

<div class="webcenter flex-column">
<div class="flex">
<div class="col-3 flex-column">
<div class="general-box register-area margin-top-md height-auto">
<div class="general-header-box flex">
<div class="flex margin-auto-top-bottom margin-right-min">
<icon name="search"></icon>
</div>
<label class="white flex-column">
<h4 class="bold">Regístrese ahora</h4>
<h5>¡Únete a nosotros hoy!</h5>
</label>
</div>
<form method="POST" class="padding-minm padding-top-none register-form">
<div class="flex-column margin-bottom-min">
<label class="gray margin-bottom-minm">
<h6>Elige tu nombre de usuario sabiamente, <b>¡No toleramos vulgaridades en los nombres de usuario!</b><br><br>
Y su nombre también debe estar entre <b>4 y 15 letras y sin caracteres especiales</b>.</h6>
</label>
<div class="register-inputs width-content flex">
<icon name="head-mini"></icon>
<input type="text" name="username" placeholder="Nombre de usuario" data-input="username" id="username">
<div class="reg-status username pointer-none"></div>
</div>
</div>
<div class="flex-column margin-bottom-min">
<label class="gray margin-bottom-minm">
<h6>Asegúrate de usar un correo electrónico <b>valido</b> y <b>verdadero</b>, porque si es necesario para recuperar contraseñas, contactarnos y entre otros, nos pondremos en contacto a través de la misma.</h6>
</label>
<div class="register-inputs width-content flex">
<icon name="email"></icon>
<input type="text" name="email" placeholder="Correo electr&oacute;nico" data-input="email" id="email">
<div class="reg-status email pointer-none"></div>
</div>
</div>
<div class="flex-column margin-bottom-min">
<label class="gray margin-bottom-minm">
<h6>¡La seguridad nunca está de más! Usa <b>una contraseña segura</b> y fácil de recordar, otra opción es <b>acepta sugerencias de contraseña desde tu propio navegador</b>, la contraseña se guarda cuando inicia sesión, lo que lo hace más fácil y seguro.</h6>
</label>
<div class="register-inputs width-content flex">
<icon name="lock-2"></icon>
<input type="password" name="password" placeholder="Contrase&ntilde;a" data-input="password">
<div class="reg-status password pointer-none"></div>
</div>
</div>
<div class="flex-column margin-bottom-min">
<div class="register-inputs width-content flex">
<icon name="lock-2"></icon>
<input type="password" name="password_repeat" placeholder="Escribe de nuevo la contrase&ntilde;a..." data-input="password">
<div class="reg-status password pointer-none"></div>
</div>
</div>
<label class="gray">
<h6>Además de ser <b>obligatorio</b>, la <b>elección del sexo</b> es esencial para que cuando se registre pueda recibir su café bien decorado y un regalo muy agradable, además de identificar su género de acuerdo con su elección.</h6>
</label>
<div class="flex margin-top-min">
<div class="flex width-content">
<div class="margin-right-minm flex reg-gender">
<input type="radio" name="genero" value="mujer" id="gender-female" class="display-none" checked>
<label for="gender-female" class="flex cursor-pointer width-content">
<div class="gender-female-option pointer-none">
<div class="flex">
<icon name="female"></icon>
<h6 class="margin-auto-top-bottom">Mujer</h6>
</div>
</div>
</label>
</div>
<div class="margin-left-minm flex reg-gender">
<input type="radio" name="genero" value="hombre" id="gender-male" class="display-none">
<label for="gender-male" class="flex cursor-pointer width-content">
<div class="gender-male-option pointer-none">
<div class="flex">
<icon name="male"></icon>
<h6 class="margin-auto-top-bottom">Hombre</h6>
</div>
</div>
</label>
</div>
</div>
<div class="flex-column col-6 margin-left-min">
<div class="result-register-card flex">
<div class="habbo-result default"></div>
<label class="white flex-column text-nowrap">
<h4 class="bold text-nowrap">Fénix!</h4>
<h6 class="margin-auto-top margin-bottom-minm text-nowrap">Nuev@ en Habb</h6>
</label>
</div>
<div class="margin-top-min">
<button type="submit" name="register" class="green-button-1" style="width: 100%; height: 48px">
<label class="margin-auto white">
<h4 class="bold">Registrate!</h4>
</label>
</button>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="flex-column margin-left-max margin-top-max col-5">
<label class="gray flex-column">
<h2 class="bold margin-bottom-min">¡Ven a ver el <?= $config['hotelName'] ?>!</h2>
<div class="flex margin-auto-bottom">
<h5 class="fs-14"><b><?= $config['hotelName'] ?></b> es una comunidad virtual de píxeles donde puede crear su propio avatar, hacer muchos amigos, chatear con diferentes usuarios de nuestro hotel, construir y decorar sus propias habitaciones, crear sus propios juegos o jugar los juegos de otros usuarios y muchos más</h5>
<img class="margin-auto-top-bottom" style="min-width:200px" height="123px" src="https://images.habbo.com/c_images/WhatIsHabbo/ill_17.png">
</div>
<div class="flex margin-top-md">
<img class="margin-auto-top-bottom" style="min-width:200px" height="171px" src="https://images.habbo.com/c_images/WhatIsHabbo/ill_16.png">
<h5 class="text-right fs-14">La creatividad y la originalidad son súper bienvenidas en <b><?= $config['hotelName'] ?></b>! Cada semana tenemos varios concursos nuevos para que participes. Desde concursos de sala, actividades geniales donde puedes expresar todos tus dones artísticos y creativos y, además, ¡ganar logros y premios! Golpear la inspiración? Echa un vistazo a nuestra <b>noticias</b> para estar al tanto de las últimas actividades y concursos de la semana!</h5>
</div>
<div class="flex margin-auto-top">
<h5 class="fs-14">¿Te encanta chatear y conocer a tus amigos? el <b>Habb Juegos de rol, foros y grupos </b> son excelentes opciones para ti. Únete al ejército y asume tus deberes, establece tu propia escuela y decide por ti mismo qué estudiar, y sube a la pasarela o corre a la sala de emergencias y comienza a salvar vidas pixeladas.</h5>
<img class="margin-auto-top-bottom" style="min-width:198px" height="157px" src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/img/comments.png">
</div>
</label>
</div>
</div>

<?php include_once("tpl/footer.php"); ?>
</div>
</div>
</div>
<div class="tooltip-container">
<div class="tooltip"></div>
</div>

</body>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/js/jquery.js?1586564000"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/js/jquery-ui.js?1586564000"></script>
</html>