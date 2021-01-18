<?php
$pageid = "colab";
$pagename = "Colaboradores";
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
<title><?= $config['hotelName'] ?> : <?= $pagename ?> </title>
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
<h5><b><?= Game::usersOnline() ?></b> usuarios online</h5>
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
<div class="col-13 flex-column margin-right-min">
<?php
if ($config['hotelEmu'] == 'arcturus')
{
$getRanks = $dbh->prepare("SELECT * FROM permissions WHERE id = 6 ORDER BY id DESC");
}
else
{
$getRanks = $dbh->prepare("SELECT id,name,badgeid FROM ranks WHERE id = 6 ORDER BY id DESC");
}
$getRanks->execute();
while ($Ranks = $getRanks->fetch())
{
if ($config['hotelEmu'] == 'arcturus')
{
$rankName = $Ranks['rank_name'];
}
?>
<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
<div class="general-box-header-3 flex">
<div class="general-box-header-3-icon">
<icon name="badge-helper" class="flex margin-auto"></icon>
</div>
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap"><?=$rankName;?></h4>
<h6 class="text-nowrap">Responsable de mantener el hotel seguro y amigable.</h6>
</label>
</div>
<div class="general-box-content staff flex-column bg-2">
<?php
$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE (rank = :ranid)");
$getMembers->bindParam(':ranid', $Ranks['id']);
$getMembers->execute();
if ($getMembers->RowCount() > 0)
{
while ($member = $getMembers->fetch())
{
$username = filter($member['username']);
$motto = filter($member['motto']);
$look = filter($member['look']);
$online = filter($member['online']);
if($online == 1){ $OnlineStatus = "1"; } else { $OnlineStatus = "0"; }
?>
<div class="display-staff-box flex">
<div class="display-staff-box-imager">
<img alt="" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$look;?>&headonly=0&size=n&gesture=sml&direction=2&head_direction=3&action=wav">
</div>
<label class="flex-column gray margin-auto-top-bottom margin-right-min">
<h5 class="bold fs-14 flex">
<a href="/home/<?=$username;?>" class="no-link"><?=$username;?></a>&nbsp;
<span class="online-status" enum="<?=$online;?>"></span>
</h5>
<h6><?=$motto;?></h6>
</label>
</div>
<?php
}
}
else
{
echo '';
}
echo '';
}
?>
</div>
</div>
<?php
if ($config['hotelEmu'] == 'arcturus')
{
$getRanks = $dbh->prepare("SELECT * FROM permissions WHERE id = 5 ORDER BY id DESC");
}
else
{
$getRanks = $dbh->prepare("SELECT id,name,badgeid FROM ranks WHERE id = 5 ORDER BY id DESC");
}
$getRanks->execute();
while ($Ranks = $getRanks->fetch())
{
if ($config['hotelEmu'] == 'arcturus')
{
$rankName = $Ranks['rank_name'];
}
?>
<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
<div class="general-box-header-3 flex">
<div class="general-box-header-3-icon">
<icon name="badge-aea" class="flex margin-auto"></icon>
</div>
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap"><?=$rankName;?></h4>
<h6 class="text-nowrap">Responsable de crear actividades para el equipo.</h6>
</label>
</div>
<div class="general-box-content staff flex-column bg-2">
<?php
$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE (rank = :ranid)");
$getMembers->bindParam(':ranid', $Ranks['id']);
$getMembers->execute();
if ($getMembers->RowCount() > 0)
{
while ($member = $getMembers->fetch())
{
$username = filter($member['username']);
$motto = filter($member['motto']);
$look = filter($member['look']);
$online = filter($member['online']);
if($online == 1){ $OnlineStatus = "1"; } else { $OnlineStatus = "0"; }
?>
<div class="display-staff-box flex">
<div class="display-staff-box-imager">
<img alt="" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$look;?>&headonly=0&size=n&gesture=sml&direction=2&head_direction=3&action=wav">
</div>
<label class="flex-column gray margin-auto-top-bottom margin-right-min">
<h5 class="bold fs-14 flex">
<a href="/home/<?=$username;?>" class="no-link"><?=$username;?></a>&nbsp;
<span class="online-status" enum="<?=$online;?>"></span>
</h5>
<h6><?=$motto;?></h6>
</label>
</div>
<?php
}
}
else
{
echo '';
}
echo '';
}
?>
</div>
</div>
<?php
if ($config['hotelEmu'] == 'arcturus')
{
$getRanks = $dbh->prepare("SELECT * FROM permissions WHERE id = 4 ORDER BY id DESC");
}
else
{
$getRanks = $dbh->prepare("SELECT id,name,badgeid FROM ranks WHERE id = 4 ORDER BY id DESC");
}
$getRanks->execute();
while ($Ranks = $getRanks->fetch())
{
if ($config['hotelEmu'] == 'arcturus')
{
$rankName = $Ranks['rank_name'];
}
?>
<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
<div class="general-box-header-3 flex">
<div class="general-box-header-3-icon">
<icon name="badge-emb" class="flex margin-auto"></icon>
</div>
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap"><?=$rankName;?></h4>
<h6 class="text-nowrap">Publicista y responsable de proporcionar ayuda con preguntas de los usuarios.</h6>
</label>
</div>
<div class="general-box-content staff flex-column bg-2">
<?php
$getMembers = $dbh->prepare("SELECT id,username,motto,look,online FROM users WHERE (rank = :ranid)");
$getMembers->bindParam(':ranid', $Ranks['id']);
$getMembers->execute();
if ($getMembers->RowCount() > 0)
{
while ($member = $getMembers->fetch())
{
$username = filter($member['username']);
$motto = filter($member['motto']);
$look = filter($member['look']);
$online = filter($member['online']);
if($online == 1){ $OnlineStatus = "1"; } else { $OnlineStatus = "0"; }
?>
<div class="display-staff-box flex">
<div class="display-staff-box-imager">
<img alt="" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$look;?>&headonly=0&size=n&gesture=sml&direction=2&head_direction=3&action=wav">
</div>
<label class="flex-column gray margin-auto-top-bottom margin-right-min">
<h5 class="bold fs-14 flex">
<a href="/home/<?=$username;?>" class="no-link"><?=$username;?></a>&nbsp;
<span class="online-status" enum="<?=$online;?>"></span>
</h5>
<h6><?=$motto;?></h6>
</label>
</div>
<?php
}
}
else
{
echo '';
}
echo '';
}
?>
</div>
</div>
</div>
<div class="col-14 flex-column height-fit">
<div class="general-box flex-column padding-none margin-bottom-min overflow-hidden">
<div class="general-box-header-3 flex bg-2">
<div class="general-box-header-3-icon">
<icon name="help" class="flex margin-auto"></icon>
</div>
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap">Equipo <?= $config['hotelName'] ?></h4>
<h6 class="text-nowrap">¿Quiénes somos y qué hacemos?</h6>
</label>
</div>
<div class="general-box-content staff flex-column padding-md">
<label class="flex-column gray">
<h5 class="margin-bottom-min"><b>Los Guias</b> son responsables de los ayudantes, los guias serán futuros auxiliares de los moderadores del hotel. Deberían servir de ejemplo, no solo para los usuarios, sino también para los Ayudantes. Debe tener conocimientos sobre la herramienta de moderación, así como sobre la herramienta Ayudantes.</h5>
<h5 class="margin-bottom-min"><b>Los Builder's</b> son responsables de crear varias habitaciones para promover la diversión en el hotel. Estos miembros deben tener un amplio conocimiento en construcción</h5>
<h5 class="margin-bottom-md"><b>Los Publicistas</b> son responsables de responder las preguntas que tengan los usuarios. Deben ser personas dedicadas. Los Publicistas deben tener conocimiento sobre lo que está bien o mal hacer en el hotel, así como también sobre la herramienta que ellos mismos tienen</h5>
<h6 class="bold fs-12">CUIDADO!</h6>
<h6>El personal nunca le pedirá su contraseña si alguien en la sala se la pide, reporta un miembro del equipo superior</h6>
</label>
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