<?php
$pageid = "top";
$pagename = "Salón de la Fama";
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
<div class="general-box hall-of-fame credits padding-none overflow-hidden flex-column margin-right-min">
<?php
$belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 3 ORDER BY `credits` DESC  LIMIT 1");
$belcr_get->execute();
$increment=1;
while ($belcr_row = $belcr_get->fetch())
{
?>
<div class="first-famous-habbo">
<div class="first-famous-habbo-banner credits">
<label>Creditos</label>
</div>
<div class="flex">
<div class="first-famous-habbo-imager">
<img alt="<?= filter($belcr_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$belcr_row['look']?>&size=m&direction=2&head_direction=3">
</div>
<div class="flex margin-auto-top-bottom width-content">
<label class="gray flex-column margin-auto-top-bottom">
<h5 class="bold"><a class="no-link" href="/home/<?= filter($belcr_row['username']) ?>"><?= filter($belcr_row['username']) ?></a></h5>
<h6>por tener <b><?= filter($belcr_row['credits']) ?></b> créditos</h6>
</label>
<div class="trophy flex">
<icon name="gold-trophy"></icon>
</div>
</div>
</div>
</div>
<?php
}
?>
<?php
$belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 3 ORDER BY `credits` ASC LIMIT 10");
$belcr_get->execute();
$increment=1;
while ($belcr_row = $belcr_get->fetch())
{
?>
<div class="others-famous-habbo flex">
<div class="others-famous-habbo-imager">
<img alt="<?= filter($belcr_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$belcr_row['look']?>&size=m&direction=2&head_direction=3">
</div>
<div class="flex margin-auto-top-bottom width-content">
<label class="gray flex-column margin-auto-top-bottom">
<h5 class="bold"><a class="no-link" href="/home/<?= filter($belcr_row['username']) ?>"><?= filter($belcr_row['username']) ?></a></h5>
<h6>por tener <b><?= filter($belcr_row['credits']) ?></b> créditos</h6>
</label>
</div>
</div>
<?php
}
?>
</div>

<div class="general-box hall-of-fame diamonds padding-none overflow-hidden flex-column margin-right-min">
<div class="first-famous-habbo">
<div class="first-famous-habbo-banner diamonds">
<label>Diamantes</label>
</div>
<?php
$duckets = $dbh->prepare("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 1");
$duckets->execute();
while ($duckets_row = $duckets->fetch())
{
?>
<div class="flex">
<div class="first-famous-habbo-imager">
<img alt="<?= filter($duckets_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= $duckets_row['look'] ?>&size=m&direction=2&head_direction=3">
</div>
<div class="flex margin-auto-top-bottom width-content">
<label class="gray flex-column margin-auto-top-bottom">
<h5 class="bold"><a class="no-link" href="/home/<?= filter($duckets_row['username']) ?>"><?= filter($duckets_row['username']) ?></a></h5>
<h6>por tener <b><?= filter($duckets_row['amount']) ?></b> Diamantes</h6>
</label>
<div class="trophy flex">
<icon name="gold-trophy"></icon>
</div>
</div>
</div>
<?php
}
?>
</div>
<?php
$duckets = $dbh->prepare("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 4 ORDER BY users_currency.amount ASC LIMIT 10");
$duckets->execute();
while ($duckets_row = $duckets->fetch())
{
?>
<div class="others-famous-habbo flex">
<div class="others-famous-habbo-imager">
<img alt="<?= filter($duckets_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= $duckets_row['look'] ?>&size=m&direction=2&head_direction=3">
</div>
<div class="flex margin-auto-top-bottom width-content">
<label class="gray flex-column margin-auto-top-bottom">
<h5 class="bold"><a class="no-link" href="/home/<?= filter($duckets_row['username']) ?>"><?= filter($duckets_row['username']) ?></a></h5>
<h6>por tener <b><?= filter($duckets_row['amount']) ?></b> Diamantes</h6>
</label>
</div>
</div>
<?php
}
?>
</div>
<div class="general-box hall-of-fame duckets padding-none overflow-hidden flex-column">
<div class="first-famous-habbo">
<div class="first-famous-habbo-banner duckets">
<label>Duckets</label>
</div>
<?php
$duckets = $dbh->prepare("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 1");
$duckets->execute();
while ($duckets_row = $duckets->fetch())
{
?>
<div class="flex">
<div class="first-famous-habbo-imager">
<img alt="<?= filter($duckets_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= $duckets_row['look'] ?>&size=m&direction=2&head_direction=3">
</div>
<div class="flex margin-auto-top-bottom width-content">
<label class="gray flex-column margin-auto-top-bottom">
<h5 class="bold"><a class="no-link" href="/home/<?= filter($duckets_row['username']) ?>"><?= filter($duckets_row['username']) ?></a></h5>
<h6>por tener <b><?= filter($duckets_row['amount']) ?></b> Duckets</h6>
</label>
<div class="trophy flex">
<icon name="gold-trophy"></icon>
</div>
</div>
</div>
<?php
}
?>
</div>
<?php
$duckets = $dbh->prepare("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 4 ORDER BY users_currency.amount ASC LIMIT 10");
$duckets->execute();
while ($duckets_row = $duckets->fetch())
{
?>
<div class="others-famous-habbo flex">
<div class="others-famous-habbo-imager">
<img alt="<?= filter($duckets_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= $duckets_row['look'] ?>&size=m&direction=2&head_direction=3">
</div>
<div class="flex margin-auto-top-bottom width-content">
<label class="gray flex-column margin-auto-top-bottom">
<h5 class="bold"><a class="no-link" href="/home/<?= filter($duckets_row['username']) ?>"><?= filter($duckets_row['username']) ?></a></h5>
<h6>por tener <b><?= filter($duckets_row['amount']) ?></b> Duckets</h6>
</label>
</div>
</div>
<?php
}
?>
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