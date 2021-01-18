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
<title><?= $config['hotelName'] ?> : Pagina no encontrada!</title>
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

<div class="container">
<div class="content flex-column">
<div class="header__1 flex">
<div class="webcenter">
<a href="<?= $config['hotelUrl'] ?>/me" class="margin-auto-top-bottom flex">
<icon name="logo-hybbe-big" class="float-logo overflow-hidden"></icon>
</a>
<div class="flex margin-auto-top-bottom margin-auto-left">
<div class="header__users-online">
<label class="white margin-auto">
<h5><b><?= Game::usersOnline() ?></b> usuários online</h5>
</label>
</div>
<a href="<?= $config['hotelUrl'] ?>/client" target="_blank" class="green-button-1 no-link" style="width: 170px;height: 42px;">
<label class="margin-auto white">
<h5>Entrasar al Hotel</h5>
</label>
</a>
</div>
</div>
<div class="scenery__farm_default pointer-none">
<span></span>
<span></span>
<span></span>
</div>
</div>

<?php include('tpl/nav.php');?>

<div class="webcenter flex-column">
<div class="error-container flex">
<div class="margin-auto flex-column">
<div class="error-container-image"></div>
<label class="gray margin-bottom-min text-center">
<h2 class="bold margin-bottom-minm">¡Nada encontrado!</h2>
<h5>¡Parece que no se encontró la página que estaba buscando!<br>Verifique la dirección para ver si todo está correcto o si tiene dudas, ¡informe a un miembro del equipo!</h5>
</label>
<button class="green-button-1 margin-auto-left-right" style="width: 179px;height: 45px;" onclick="window.history.go(-2); return false;">
<label class="margin-auto white">Volver</label>
</button>
</div>
</div>
</div>
</div>

<div class="tooltip-container">
<div class="tooltip"></div>
</div>

</body>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/js/jquery.js?1586564000"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/js/jquery-ui.js?1586564000"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/js/main.js"></script>
</html>