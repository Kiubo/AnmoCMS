<?php
$pageid = "index";
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
<title><?= $config['hotelName'] ?> ~ Conoce amig@s, crea tus habitaciones y chatea</title>
<meta name="author" content="Habbroi Hotel">
<meta name="description" content="No Habbroi Hotel, você pode fazer novos amigos, ganhar eventos, ser o mais rico, jogar e criar os seus próprios jogos, ser famoso, bater-papo, decorar e criar quartos incríveis com uma imensidão de mobílias disponíveis no nosso catálogo. Tudo isso, e muito mais, você encontrar aqui GRATUITAMENTE, o que está esperando para se registar neste incrível universo pixealado e fazer parte do nosso hotel??!!">
<meta name="keywords" content="habbo, habbo pirata, habbo atlanta, atlanta, habbon, habblet, habbinc, habbig, habbink, habbolove, habblove, hybbe, Haibbo Hotel, habbolella, lella hotel, lella, iron, iron hotel, habbig hotel, crazzy, crazzy habbo, habbok, habbook hotel, habbinfo, habblive, live, hotel, habbonados, raduckets, catálogo atualizado, habbo futebol, mobis, mobilias, snow war, futebol, bola rebug, bola habbo, bola 100%, bola 8q, bola 6q, bola 4q, wireds, mascotes, habbocity, habbo.com, habbo.,habbo online, habbo lotado, habbo bom, habbo atualizado, habbo antigo, habbo r63, habbo dino, habbo dinossauro, habbo original, habbo oficial, retro server, habb, rabbo, hotel, Age, Like Hotel, Habbo Privado, Pirata, Privado, Habbo.com.br, habble, habblo, fresh-hotel, crazzy, habbo hotel, virtual, mundo, comunidade virtual, grátis, comunidade, avatar, bate papo, online, jovem, rpg, entre, social, grupos, fóruns, seguro, jogue, jogos, online, amigos, jovens, raros, mobis raros, colecionar, expressão, emblemas, diversão, música, celebridade, visita de famosos, celebridades, mmo, mmorpg, rpg online">
<link rel="shortcut icon" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/favicon.ico">
<link rel="manifest" href="<?= $config['hotelUrl'] ?>/manifest.json?1586564000">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/style.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/types.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/buttons.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/animations.css?1586564000" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i&display=swap">
</head>
<body class="root">
<?php User::Login(); ?>
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
<h5 class="gray-clear margin-auto-top-bottom"></b>Habb está estrenando nuevo diseño el cual es</b> <b class="lowercase" style="text-transform: none;"> NutellaCMS 2.5<b></h5>
</div>
</div>
</div>
<div class="webcenter flex-column">
<div class="flex col-c-1">
<div class="flex-column col-1">
<form method="POST" role="form" class="lgn-area general-box flex-column margin-top-md">
<div class="general-header-box flex">
<div class="flex margin-auto-top-bottom margin-right-min">
<icon name="pad"></icon>
</div>
<label class="white flex-column">
<h4 class="bold" style="text-transform: none;">Área de inicio de sesión</h4>
<h5 style="text-transform: none;">Inicie sesión para jugar con nosotros!</h5>
</label>
</div>
<div class="width-content flex inputs-login margin-bottom-min">
<div class="identification-look"></div>

<input type="text" name="username" onkeyup="changeAvatar(this.value,'#imager')" placeholder="Introduzca su nombre de usuario...." class="border-none">
</div>
<div class="width-content flex inputs-login flex">
<div class="flex width-content">
<icon name="lock-big"></icon>
<input type="password" name="password" placeholder="***********" class="border-none">
</div>
<button name="login" type="submit" class="lgn-button green-button-1 transition-disabled margin-left-min" style="min-width: 120px;height: 45px;">
<label class="margin-auto white">
<h5 class="bold fs-14 uppercase">Entrar</h5>
</label>
</button>
</div>
</form>
<div class="margin-top-min">
<div class="general-box padding-minm width-content">
<div class="featured-user flex">
<?= userOfTheWeek() ?>
</div>
</div>
</div>
</div>
<div class="margin-left-min flex col-2">
<div class="general-box register-announcement flex padding-md">
<label class="flex-column white">
<div class="flex-column padding-minm padding-top-none">
<h2 class="bold uppercase">¡Bienvenid@ a Habb!</h2>
<h5 class="margin-top-min"><B>Habb</B> es un increíble mundo de píxeles en el que puedes crear y construir salas de la manera que quieras con un catálogo con muebles variados, chatear con otros jugadores en otras salas, participar y ganar promociones dentro del hotel, jugar eventos todos los días también dentro del hotel, publique sus fotos, interactúe con otros usuarios en el foro, sea famoso y rico.</h5>
</div>
<div class="flex margin-auto-top">
<h6 class="margin-auto margin-right-min">No pierdas el tiempo, regístrate ahora y vive una experiencia agradable en persona, o no, aquí en <b>Habb</b></h6>
<a href="<?= $config['hotelUrl'] ?>/register" class="green-button-1 transition-disabled margin-auto-top-bottom no-link" style="min-width: 150px;height: 50px;">
<label class="margin-auto white">
<h5 class="bold fs-14 uppercase">Registrate</h5>
</label>
</a>
</div>
</label>
</div>
<!--
<div class="news-index flex-column margin-left-min">
<a href="https://habbroi.biz/article/143" place="Labirinto Pascoal - Habbroi Hotel" class="article-card flex no-link" style="background-image: url('https://1.bp.blogspot.com/-JE4BZp95kj0/WPfGp5HDvzI/AAAAAAAA2fg/LGTELOSEsHkl1gkLbG_lJ1eUhT1f0BRhQCPcB/s1600/WyVyaks.png');">
<label class="white padding-min margin-auto-top text-nowrap pointer-none flex-column">
<h5 class="bold fs-14 text-nowrap margin-auto-top">Labirinto Pascoal</h5>
<h6 class="fs-12 text-nowrap">Preparad@s para os desafios pascais?</h6>
</label>
</a>
<a href="https://habbroi.biz/article/142" place="RE: Monocromático - Habbroi Hotel" class="article-card flex no-link" style="background-image: url('https://beeimg.com/images/s02430225803.png');">
<label class="white padding-min margin-auto-top text-nowrap pointer-none flex-column">
<h5 class="bold fs-14 text-nowrap margin-auto-top">RE: Monocromático</h5>
<h6 class="fs-12 text-nowrap">Escolha seus pincéis mais afiados e as mais variadas cores para pincelar seu retrato perfeito...</h6>
</label>
</a>
<a href="https://habbroi.biz/article/141" place="Pipoca de Pixels! #3 - Habbroi Hotel" class="article-card flex no-link" style="background-image: url('https://i.imgur.com/bxjoqcl.png');">
<label class="white padding-min margin-auto-top text-nowrap pointer-none flex-column">
<h5 class="bold fs-14 text-nowrap margin-auto-top">Pipoca de Pixels! #3</h5>
<h6 class="fs-12 text-nowrap">Adoro quando você implora.</h6>
</label>
</a>
</div>
-->
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