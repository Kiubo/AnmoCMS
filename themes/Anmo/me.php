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
<title><?= $config['hotelName'] ?> : <?= User::userData('username') ?></title>
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
<div class="col-7">
<div class="display-habbo-me flex-column">
<div class="display-myhabbo flex">
<div class="flex width-content">
<div class="display-myhabbo-imager">
<img alt="<?= User::userData('username') ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?= User::userData('look') ?>&direction=2&head_direction=3">
</div>
<label class="white margin-auto-top-bottom margin-left-min">
<h3 class="bold"><?= User::userData('username') ?><br></h3>
<h3 style="font-size:12px;"><?= User::userData('motto') ?></h3>
<h6></h6>
</label>
<div class="margin-auto-left margin-right-md">
<a href="<?= $config['hotelUrl']; ?>/client" class="green-button-1 no-link margin-top-md" style="width: 180px;height: 42px;">
<label class="margin-auto white">
<h5>Entrar al <b>Hotel</b></h5>
</label>
</a>
</div>
</div>
</div>
<div class="display-habbo-currency flex">
<div class="display-habbo-currency-credits flex">
<icon name="credits" class="margin-auto-top-bottom margin-right-minm"></icon>
<h6 class="white fs-12 margin-auto-top-bottom"><?= User::userData('credits') ?></h6>
</div>
<div class="display-habbo-currency-diamonds flex">
<icon name="rubys" class="margin-auto-top-bottom margin-right-minm"></icon>
<h6 class="white fs-12 margin-auto-top-bottom"><?= User::userData('vip_points') ?></h6>
</div>
<div class="display-habbo-currency-duckets flex">
<icon name="gems" class="margin-auto-top-bottom margin-right-minm"></icon>
<h6 class="white fs-12 margin-auto-top-bottom"><?= User::userData('pixels') ?></h6>
</div>
</div>
</div>

<div class="col-9 flex margin-top-min">

<div class="general-box featured-users margin-top-min margin-right-min">
<div class="general-header-box-2 flex hbg-1">
<div class="flex margin-auto-top-bottom margin-right-min">
<icon name="gold-trophy" class="margin-auto"></icon>
</div>
<label class="white">
<h5>Usuarios Más Ricos</h5>
</label>
</div>
<div class="flex-column users-featured">
<?php
$belcr_get = $dbh->prepare("SELECT id,credits,username,look from users WHERE rank < 7 ORDER BY `credits` DESC  LIMIT 1");
$belcr_get->execute();
$increment=1;
while ($belcr_row = $belcr_get->fetch())
{
?>
<div class="flex featured-user-credits">
<div class="featured-user-credits-imager">
<img alt="<?= filter($belcr_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$belcr_row['look']?>&size=m&direction=2&head_direction=3">
</div>
<label class="white margin-auto-top-bottom margin-auto-right padding-right-min">
<a href="/home/<?= filter($belcr_row['username']) ?>" class="no-link white">
<h4 class="bold"><?= filter($belcr_row['username']) ?></h4>
</a>
<div class="flex">
<icon name="credits"></icon>
<h6 class="margin-left-minm margin-auto-top-bottom"><?= filter($belcr_row['credits']) ?> Creditos</h6>
</div>
</label>
</div>
<?php
}
?>
<?php
$duckets = $dbh->prepare("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '5' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 1");
$duckets->execute();
while ($duckets_row = $duckets->fetch())
{
?>
<div class="flex featured-user-diamonds">
<div class="featured-user-diamonds-imager">
<img alt="<?= filter($duckets_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$duckets_row['look']?>&size=m&direction=2&head_direction=3">
</div>
<label class="white margin-auto-top-bottom margin-auto-right padding-right-min">
<a href="/home/<?= filter($duckets_row['username']) ?>" class="no-link white">
<h4 class="bold"><?= filter($duckets_row['username']) ?></h4>
</a>
<div class="flex">
<icon name="rubys"></icon>
<h6 class="margin-left-minm margin-auto-top-bottom"><?= filter($duckets_row['amount']) ?> Diamantes</h6>
</div>
</label>
</div>
<?php
}
?>
<?php
$duckets = $dbh->prepare("SELECT * FROM users INNER JOIN users_currency ON users.id=users_currency.user_id WHERE users_currency.type = '0' AND users.rank < 4 ORDER BY users_currency.amount DESC LIMIT 1");
$duckets->execute();
while ($duckets_row = $duckets->fetch())
{
?>
<div class="flex featured-user-duckets">
<div class="featured-user-duckets-imager">
<img alt="<?= filter($duckets_row['username']) ?>" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$duckets_row['look']?>&size=m&direction=2&head_direction=3">
</div>
<label class="white margin-auto-top-bottom margin-auto-right padding-right-min">
<a href="/home/<?= filter($duckets_row['username']) ?>" class="no-link white">
<h4 class="bold"><?= filter($duckets_row['username']) ?></h4>
</a>
<div class="flex">
<icon name="gems"></icon>
<h6 class="margin-left-minm margin-auto-top-bottom"><?= filter($duckets_row['amount']) ?> Duckets</h6>
</div>
</label>
</div>
<?php
}
?>
</div>
</div>

<div class="general-box featured-rooms margin-top-min">
<div class="general-header-box-2 flex hbg-2">
<div class="flex margin-auto-top-bottom margin-right-min">
<icon name="room" class="margin-auto"></icon>
</div>
<label class="white">
<h5>Estadisticas</h5>
</label>
</div>
<h5><br><br>
<center>
Conectados : <b><?= Game::usersOnline(); ?></b><br><br>
Miembro del equipo Conectados : <b><?= Game::staffCount(); ?></b><br><br>
Usuarios Registrados : <b><?= Game::regCount(); ?></b><br><br>
Usuarios Baneados : <b><?= Game::bansCount(); ?></b><br>
</center>
</h5>
</div>
</div>
</div>

<div class="col-10">
<div class="last-articles-news width-content">
<div class="control-last-articles-news flex">
<span class="prev flex">
<icon name="prev"></icon>
</span>
<span class="next flex margin-left-min">
<icon name="next"></icon>
</span>
</div>
<div class="last-article-news-background">
<div class="last-article-news-thumbnail"></div>
</div>
<div class="last-articles-news-slides">
<?php
$sql = $dbh->prepare("SELECT id,title,image,shortstory FROM nutella_news ORDER BY id DESC LIMIT 5");
$sql->execute();
while ($news = $sql->fetch())
{
echo'
<div class="last-article-news">
<a href="/news/'.filter($news["id"]).'" class="last-article-news-thumbnail" style="background-image: url('.filter($news["image"]).');"></a>
<label class="flex-column text-nowrap">
<h5 class="bold fs-14 text-nowrap">'.filter($news["title"]).'</h5>
<h6 class="fs-12 text-nowrap">'.filter($news["shortstory"]).'</h6>
<div class="last-article-news-info margin-auto-top"><a href="/news/'.filter($news["id"]).'">'.$lang["Mreadmore"].' &raquo;</a></div>
</label>
</div>
';
}
?>
</div>
</div>

<div class="social-meadia-links flex-column margin-top-min">
<h3 class="gray bold margin-bottom-min">¡Más cerca de ti!</h3>
<a href="https://www.facebook.com/HabbSiOficial" target="blank" class="social-media-facebook flex no-link">
<div class="margin-auto-top-bottom">Me gusta nuestra página!</div>
</a>
<a href="#" target="blank" class="desktop-haibbo-application flex no-link">
<div class="margin-auto-top-bottom">Visita nuestro Foro!</div>
</a>
<a href="https://discord.gg/3KPnf8m" target="blank" class="social-media-discord flex no-link">
<div class="margin-auto-top-bottom">Únete al servidor de discord!</div>
</a>
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