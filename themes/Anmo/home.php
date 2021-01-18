<?php
$pageid = "home";
$pagename = "Profile";
if(empty($_GET['user']))
{
header("Location:/");
}
$news = $dbh->prepare("SELECT * FROM users WHERE username = :name");
$news->bindParam(':name', $_GET['user']);
$news->execute();
if ($news->RowCount() == 0)
{
header("Location:/");
}
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
<title><?= $config['hotelName'] ?> : <?= userHome('username'); ?> </title>
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
<div class="flex-column">
<div class="profile-card-main general-box padding-none">
<div class="profile-card-main-cover" style="background: url(<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/img/bg_perfil.png) rgb(177, 212, 235);">
<img alt="" src="">
</div>
<div class="profile-card-main-about flex">
<div class="flex-column padding-max width-content">
<div class="flex margin-bottom-max">
<div class="profile-card-main-about-habbo">
<div class="profile-card-main-about-habbo-imager margin-auto-left-right">
<img alt="" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= userHome('look') ?>?gesture=std&head_direction=3&direction=2&size=s">
</div>
</div>
<?php
$friend = $dbh->prepare("SELECT * FROM messenger_friendships WHERE user_one_id = '".userHome('id')."'");
$friend->execute();
$friend2 = $friend->rowCount();
?>
<div class="profile-card-main-about-friends flex margin-auto-top-bottom margin-auto-left">
<icon name="friends" class="margin-right-minm"></icon>
<label class="fs-14 white">(<?=$friend2;?>) Amigos</label>
</div>

</div>
<div class="flex">
<div class="flex-column">
<div class="profile-card-main-about-picture default">
<div class="profile-card-main-about-picture-imager">
<img alt="<?= userHome('username'); ?> " src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= userHome('look') ?>&size=m&direction=2&head_direction=3">
</div>
</div>
<div class="profile-card-main-about-lastlogin flex margin-top-min">
<icon name="clock-mini" class="margin-right-minm"></icon>
<label class="gray-clear">
<?php if (userHome('online') == 0) { ?><h5>Desconectado</h5><?php }?>
<?php if (userHome('online') == 1) { ?><h5>Conectado</h5><?php }?>
</label>
</div>
</div>
<div class="profile-card-main-about-infos flex-column margin-left-max margin-auto-top">
<div class="flex-column">
<div class="profile-card-main-about-display-infos flex white">
<!-- <icon class="margin-right-minm" name="male"></icon> -->
<label class="flex">
<h4><b><?= userHome('username'); ?> </b>&nbsp;|&nbsp;</h4>
<h6 class="fs-12 margin-auto-top-bottom">
<?php
switch (userHome('rank')) {
case 0:
echo '';
break;
case 1:
echo 'Miembro';
break;
case 2:
echo 'VIP';
break;
case 3:
echo 'x';
break;
case 4:
echo 'Publicista';
break;
case 5:
echo 'Builder';
break;
case 6:
echo 'Guia';
break;
case 7:
echo 'Auxiliar del Moderador';
break;
case 8:
echo 'Moderador';
break;
case 9:
echo 'Manager';
break;
case 10:
echo 'Administrador';
break;
case 11:
echo 'CEO';
break;
case 12:
echo 'Miembro';
}
?>
</h6>
</label>
</div>
<label class="margin-top-minm margin-bottom-minm white">
<h5><?= userHome('motto'); ?> </h5>
</label>
</div>
<div class="profile-card-main-about-another-infos flex-column margin-top-max">
<div class="flex margin-bottom-minm">
<icon name="room" class="margin-right-minm"></icon>
<label class="gray-clear">
<h5><?= userHome('motto'); ?></h5>
</label>
</div>
<div class="flex margin-bottom-minm">
<icon name="link" class="margin-right-minm"></icon>
<label class="gray-clear">
<h5>http://habb.si/</h5>
</label>
</div>
<div class="flex">
<icon name="display-identity" class="margin-right-minm"></icon>
<label class="gray-clear">
<h5><?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%A | %d de %B del %Y", userHome('last_online'))); ?></h5>
</label>
</div>
</div>
</div>
<div class="flex-column margin-auto-left">
<div class="profile-card-main-about-badges flex">
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM users_badges WHERE user_id=".userHome('id')." AND slot_id = 1 LIMIT 1");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-card-main-about-badges-display badge" tooltip="Placa 1">
<img alt="" src="<?= $config['hotelUrl'] ?>/swf/c_images/album1584/<?= filter($getUsersDev['badge_code']) ?>.gif">
</div>
<?php
}
echo'';
}
else
{
echo'<div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div>';
}
?>
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM users_badges WHERE user_id=".userHome('id')." AND slot_id = 2 LIMIT 1");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-card-main-about-badges-display badge" tooltip="Placa 2">
<img alt="" src="<?= $config['hotelUrl'] ?>/swf/c_images/album1584/<?= filter($getUsersDev['badge_code']) ?>.gif">
</div>
<?php
}
echo'';
}
else
{
echo'<div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div>';
}
?>
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM users_badges WHERE user_id=".userHome('id')." AND slot_id = 3 LIMIT 1");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-card-main-about-badges-display badge" tooltip="Placa 3">
<img alt="" src="<?= $config['hotelUrl'] ?>/swf/c_images/album1584/<?= filter($getUsersDev['badge_code']) ?>.gif">
</div>
<?php
}
echo'';
}
else
{
echo'<div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div>';
}
?>
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM users_badges WHERE user_id=".userHome('id')." AND slot_id = 4 LIMIT 1");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-card-main-about-badges-display badge" tooltip="Placa 4">
<img alt="" src="<?= $config['hotelUrl'] ?>/swf/c_images/album1584/<?= filter($getUsersDev['badge_code']) ?>.gif">
</div>
<?php
}
echo'';
}
else
{
echo'<div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div>';
}
?>
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM users_badges WHERE user_id=".userHome('id')." AND slot_id = 5 LIMIT 1");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-card-main-about-badges-display badge" tooltip="Placa 5">
<img alt="" src="<?= $config['hotelUrl'] ?>/swf/c_images/album1584/<?= filter($getUsersDev['badge_code']) ?>.gif">
</div>
<?php
}
echo'';
}
else
{
echo'<div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div>';
}
?>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="flex margin-top-min">
<div class="general-box errands padding-none overflow-hidden margin-right-min height-fit">
<div class="general-box-header-3 padding-md">
<label class="gray">
<h5 class="bold">Comentario(s) de los amigos de <?=userHome('username');?></h5>
<h6></h6>
</label>
</div>
<div class="general-box-content bg-2 padding-md">
<div class="errands-area flex-column">
<div class="errands-area-box-nothing margin-bottom-minm flex padding-min">
<label class="gray margin-auto-left-right">
<h5>Comentarios en creación....</h5>
</label>
</div>
</div>
<div class="flex margin-top-min">
</div>
</div>
</div>

<div class="flex-column">
<div class="general-box padding-none height-auto overflow-hidden profile-badges">
<div class="general-box-header-3 padding-md">
<label class="gray">
<h5 class="bold">Placas de <?=userHome('username');?></h5>
</label>
</div>
<div class="general-box-content flex padding-md bg-2">

<?php
$sqlidsala = $dbh->prepare("SELECT * FROM users_badges WHERE user_id=".userHome('id')." LIMIT 5");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-badges-display" tooltip="<?= filter($getUsersDev['badge_code']) ?>">
<img alt="<?= filter($getUsersDev['badge_code']) ?>" src="<?= $config['hotelUrl'] ?>/swf/c_images/album1584/<?= filter($getUsersDev['badge_code']) ?>.gif">
</div>
<?php
}
echo'';
}
else
{
echo'<div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div><div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div><div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div><div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div><div class="profile-card-main-about-badges-display not-badge" tooltip="Slot de placas"></div>';
}
?>
</div>
</div>

<div class="general-box padding-none height-auto overflow-hidden profile-rooms margin-top-min">
<div class="general-box-header-3 padding-md">
<label class="gray">
<h5 class="bold">Sala de de <?=userHome('username');?></h5>
<h6></h6>
</label>
</div>
<div class="general-box-content flex-column bg-2 padding-min">
<div class="padding-min">
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM rooms WHERE owner_id=".userHome('id')." LIMIT 5");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
echo'';
while ($getUsersDev = $sqlidsala->fetch())
{ 
?>
<div class="profile-rooms-box flex">
<label class="gray margin-auto-top-bottom">
<h5><?= filter($getUsersDev['name']) ?></h5>
</label>
<a href="<?= $config['hotelUrl'] ?>/client/room/<?= filter($getUsersDev['id']) ?>" target="_blank" room="" class="green-button-2 no-link margin-auto-left" style="width: 80px;height: 30px">
<label class="margin-auto white">
<h6>Visitar</h6>
</label>
</a>
</div>
<?php
}
echo'';
}
else
{
echo'<label class="gray">
<h5><b>'.userHome('username').'</b>, no tiene salas en el hotel.</label></h5>';
}
?>
</div>
</div>
</div>

<div class="general-box padding-none height-auto overflow-hidden profile-groups margin-top-min">
<div class="general-box-header-3 padding-md">
<label class="gray">
<h5 class="bold">Grupos de <?=userHome('username');?></h5>
</label>
</div>
<div class="general-box-content flex padding-md bg-2">
<?php
$sqlidsala = $dbh->prepare("SELECT * FROM guilds WHERE user_id=".userHome('id')." LIMIT 3");
$sqlidsala->execute();
if (!$sqlidsala->RowCount() == 0)
{
while ($getUsersDev = $sqlidsala->fetch())
{
?>
<div class="profile-group-display flex" tooltip="<?= filter($getUsersDev['name']) ?>">
<img src="<?= $config['groupBadgeURL'] ?><?= filter($getUsersDev['badge']) ?>">
</div>
<?php
}
echo'';
}
else
{
echo'<label class="gray">
<h5><b>'.userHome('username').'</b>, no tiene grupos.</label></h5>';
}
?>
</div>
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