<?php
$pageid = "me";
$pagename = "Home";
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
<title><?= $config['hotelName'] ?> : Configuracion de tu cuenta</title>
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
<h5>Entrar al Hotel</h5>
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
<div class="flex">
<div class="col-19">

<div class="col-18 flex-column height-fit">

<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
<div class="general-box-header-3 flex bg-2">
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap">Configuración de Contraseña</h4>
</label>
</div>
<div class="general-box-content staff flex-column padding-md">
<label class="flex-column gray">
<h5 class="margin-bottom-min">
<form action="" method="POST">
<?php User::editPassword(); ?>

<div class="settings-step">
<h4>1.</h4>
<div class="settings-step-content">
<h3>Introduce tus datos actuales.</h3>
<p>
<label for="currentpassword">Contraseña actual:</label><br />
<input type="password" size="32" maxlength="32" name="oldpassword" id="currentpassword" class="currentpassword " placeholder="*****************" />
</p>

</div>
</div>

<div class="settings-step">
<h4>2.</h4>
<div class="settings-step-content">
<h3>Nueva Contraseña</h3>
<p>La nueva contraseña debe tener un mínimo de 6 caracteres, letras en mayúsculas y minúscula, etc.</p>
<p>
<label for="pass">Nueva Contraseña</label><br />
<input type="password" name="newpassword" id="password" size="32" maxlength="48" value="" placeholder="*****************" />
</p>
</div>
</div>

<div class="settings-buttons">
<input type="submit" value="Actualizar cuenta" name="password" class="submit" />
</div>

</form>
</h5>
<h6 class="bold fs-12">CUIDADO!</h6>
<h6>Los cambios son inrreversibles, tendrás que contactar con un Staff</h6>
</label>
</div>
</div>

</div>

</div>

<div class="col-10">

<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
<div class="general-box-header-3 flex bg-2">
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap">Configuración de tu cuenta</h4>
<h6 class="text-nowrap">SubNavegación de esta seción</h6>
</label>
</div>
<div class="general-box-content staff flex-column padding-md">
<label class="flex-column gray">
<h5 class="margin-bottom-min">
<a href="<?= $config['hotelUrl'] ?>/settings">Configuración General</a><br><br>
<a href="<?= $config['hotelUrl'] ?>/ajustes/email">Configuración E-mail</a><br><br>
<a href="<?= $config['hotelUrl'] ?>/ajustes/password">Configuración Contraseña</a>
</h5>
<h6 class="bold fs-12">CUIDADO!</h6>
<h6>Los cambios son inrreversibles, tendrás que contactar con un Staff</h6>
</label>
</div>
</div>

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
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/js/main.js"></script>
</html>