<?php
$pageid = "news";
$pagename = "Noticias";
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

<div class="webcenter flex">
<div class="col-11 flex-column">
<div class="news-article general-box padding-none overflow-hidden">
<?php
if (empty($_GET['id']))
{
?>
<div class="news-article-head flex">
<div class="news-article-thumbnail" style="background-image: url('<?= $config['hotelUrl'] ?>/adminpan/img/newsimages/20.png');">
</div>
<label class="gray flex- margin-auto-top-bottom">
<h4 class="bold">ERROR</h4>
<h5>No has Selecionado ninguna de las Noticias.</h5>
</label>
</div>
<?php 
} else {
if (!is_numeric($_GET['id']))
{
exit('Shut up!');
}
$news = $dbh->prepare("SELECT * FROM nutella_news WHERE id = :newsid");
$news->bindParam(':newsid', $_GET['id']);
$news->execute();
if ($news->RowCount() == 1)
{
while ($news2 = $news->fetch()){
$username = $news2['author'];
$data = $dbh->prepare("SELECT * FROM users WHERE username = '".$username."'");
$data->execute();
$data2 = $data->fetch();
?>
<div class="news-article-head flex">
<div class="news-article-thumbnail" style="background-image: url('<?=$news2['image'];?>');">
<div class="news-article-author">
<img alt="Mihr" src="<?= $config['HabboImg'] ?>/avatarimage.php?figure=<?=$data2['look'];?>&action=wav&direction=2&head_direction=3&gesture=sml&size=n&img_format=png&frame=0&headonly=0">
</div>
</div>
<label class="gray flex- margin-auto-top-bottom">
<h4 class="bold"><?=filter($news2["title"]);?></h4>
<h5><?=filter($news2["shortstory"]);?></h5>
<h6 class="margin-top-minm">Publicada por <a href="<?= $config['hotelUrl'] ?>/home/<?=$news2['author'];?>" class="no-link bold"><?=$news2['author'];?></a> el <?php setlocale(LC_TIME,"spanish"); echo utf8_encode(strftime("%A del dia %d de %B del %Y", $news2['date'])); ?></h6>
</label>
</div>
<div class="news-article-body">
<?=html_entity_decode($news2['longstory']);?> 
</div>
<?php 
} 
}
else
{
?>
<div class="news-article-head flex">
<div class="news-article-thumbnail" style="background-image: url('<?= $config['hotelUrl'] ?>/adminpan/img/newsimages/20.png');">
</div>
<label class="gray flex- margin-auto-top-bottom">
<h4 class="bold">ERROR</h4>
<h5>La noticia que has Selecionado no EXISTE.</h5>
</label>
</div>
<?php 
} }
?>
</div>

<!--
<div class="article-comments flex-column margin-top-min">
<div class="article-send-comment general-box flex-column padding-none overflow-hidden">
<div class="flex padding-min">
<div class="article-send-comment-habbo">
<img alt="fenix97" src="https://habbo.city/habbo-imaging/avatarimage?figure=sh-290-62.hd-205-1383.ch-215-82.lg-275-110.ha-1015-62&action=wlk,crr=667direction=2&head_direction=3&gesture=sml&size=n&img_format=png&frame=0&headonly=0">
</div>
<div class="general-contenteditable flex">
<div contenteditable="true" placeholder="Digite aqui seu comentário..."></div>
<div class="contenteditable-editor flex-column">
<button class="reset-button bold" onclick="Style('bold');">B</button>
<button class="reset-button italic" onclick="Style('italic');">I</button>
<button class="reset-button underline" onclick="Style('underline');">U</button>
</div>
</div>
<div class="article-send-comment-button">
<button data-article-id="12">Enviar comentário</button>
</div>
</div>
<div class="send-comment-warn"></div>
</div>
<div class="article-comments-area flex-column">
<div class="article-comment-box flex general-box margin-top-minm" data-comment-id="26">
<div class="article-comment-author-habbo margin-right-min">
<img alt="matts" width="32px" height="55px" src="https://habbo.city/habbo-imaging/avatarimage?figure=sh-290-62.hd-205-1383.ch-215-82.lg-275-110.ha-1015-62&action=std&direction=2&head_direction=3&gesture=std&size=s&img_format=png&frame=0&headonly=0" class="margin-auto-left-right">
</div>
<label class="gray margin-auto-top-bottom">
<h5><b><i><u>ok</u></i></b></h5>
<h6 class="fs-10 margin-top-minm">Por <a href="https://haibbo.in/profile/matts" place="Perfil: matts - Haibbo Hotel" class="no-link bold">matts</a> em <b>26 de março de 2020</b> às <b>14:40</b></h6>
</label>
</div>
<div class="article-comment-box flex general-box margin-top-minm" data-comment-id="25">
<div class="article-comment-author-habbo margin-right-min">
<img alt="PotiNovam" width="32px" height="55px" src="https://habbo.city/habbo-imaging/avatarimage?figure=sh-290-62.hd-205-1383.ch-215-82.lg-275-110.ha-1015-62&action=std&direction=2&head_direction=3&gesture=std&size=s&img_format=png&frame=0&headonly=0" class="margin-auto-left-right">
</div>
<label class="gray margin-auto-top-bottom">
<h5>Uhuu</h5>
<h6 class="fs-10 margin-top-minm">Por <a href="https://haibbo.in/profile/PotiNovam" place="Perfil: PotiNovam - Haibbo Hotel" class="no-link bold">PotiNovam</a> em <b>24 de março de 2020</b> às <b>13:51</b></h6>
</label>
</div>
<div class="article-comment-box flex general-box margin-top-minm" data-comment-id="24">
<div class="article-comment-author-habbo margin-right-min">
<img alt="Aprendiz_Lapuor" width="32px" height="55px" src="https://habbo.city/habbo-imaging/avatarimage?figure=sh-3089-1428.cc-3186-63.ch-255-92.he-1604-68.fa-3276-1411.lg-285-1426.hd-207-4.hr-3162-42&action=std&direction=2&head_direction=3&gesture=std&size=s&img_format=png&frame=0&headonly=0" class="margin-auto-left-right">
</div>
<label class="gray margin-auto-top-bottom">
<h5>yesssssss</h5>
<h6 class="fs-10 margin-top-minm">Por <a href="https://haibbo.in/profile/Aprendiz_Lapuor" place="Perfil: Aprendiz_Lapuor - Haibbo Hotel" class="no-link bold">Aprendiz_Lapuor</a> em <b>23 de março de 2020</b> às <b>17:34</b></h6>
</label>
</div>
</div>
</div>

<div class="modal-container">
			<div class="modal-content">
				<div class="modal-container-box general-box padding-md flex-column">
					<div class="modal-container-box-header flex margin-bottom-min">
						<icon name="ballon-big1"></icon>
						<label class="gray margin-left-min text-nowrap">
							<h4 class="bold text-nowrap">Formulário de noticias</h4>
							<h5 class=" text-nowrap">Envie aqui o seu formulário para <b>Epifania</b></h5>
						</label>
						<button class="reset-button flex margin-auto-left margin-auto-top-bottom close-modal">
							<icon name="close"></icon>
						</button>
					</div>
					<div class="flex-column margin-bottom-min">
						<h4 class="bold gray margin-bottom-minm">Dados da Noticia</h4>
						<div class="flex modal-container-box-article-info">
							<div class="modal-container-box-article-habbo-author">
								<img alt="Epifania" src="https://habbo.city/habbo-imaging/avatarimage?figure=sh-3252-1325-91.ca-1810-64.hd-180-1.wa-2001-62.hr-3163-32.he-3081-68.ch-9993140-70.lg-280-82&headonly=0&size=n&gesture=std&direction=2&head_direction=3&action=std">
							</div>
							<label class="gray margin-auto-top-bottom text-nowrap">
								<h5 class="bold margin-bottom-minm text-nowrap">Luz na Passarela!</h5>
								<h6 class="text-nowrap">Por <b>Epifania</b> em <b>23 de mar�o de 2020</b> às <b>16:04</b></h6>
							</label>
						</div>
					</div>
					<hr>
					<form method="post" class="modal-container-box-form margin-top-min" data-article-id="12">
						<div class="flex-column margin-bottom-min">
							<icon name="head-mini" style=""></icon>
							<input type="text" name="form-participants" value="fenix97" placeholder="Participante(s)">
						</div>
						<div class="flex-column margin-bottom-min">
							<icon name="link" style=""></icon>
							<input type="text" name="form-link" placeholder="Link">
						</div>
						<div class="flex-column margin-bottom-minm">
							<icon name="email" style=""></icon>
							<textarea type="text" name="form-message" placeholder="Mensagem"></textarea>
						</div>
						<div class="margin-top-md">
							<button class="green-button-1" style="width: 100%;height: 45px">
								<label class="margin-auto white">Enviar formulário</label>
							</button>
						</div>
						<div class="form-warns flex"></div>
					</form>
				</div>
			</div>
		</div>
				</div>
		</div>
-->

<?php include_once("tpl/footer.php"); ?>
</div>
<div class="col-12">
<div class="general-box height-auto overflow-hidden padding-none">
<div class="general-box-header-3 flex">
<div class="general-box-header-3-icon">
<icon name="plus-magic" class="flex margin-auto"></icon>
</div>
<label class="gray flex-column text-nowrap">
<h4 class="bold text-nowrap">Elige una Noticia</h4>
<h6 class="text-nowrap">Mira las otras noticias de Habb</h6>
</label>
</div>
<div class="general-box-content flex-column">
<div class="others-articles-separator">Noticias</div>
<div class="others-articles-boxes">
<?php
$sql = $dbh->prepare("SELECT id,title,image,shortstory FROM nutella_news ORDER BY id DESC");
$sql->execute();
while ($news = $sql->fetch())
{
echo'
<a href="/news/'.filter($news["id"]).'" class="other-aticle-box no-link" style="background-image: url('.$news["image"].');">
<div class="other-article-indicator pointer-none"></div>
<label class="width-content text-nowrap white pointer-none">
<h5 class="bold text-nowrap">'.filter($news["title"]).'</h5>
<h6 class="text-nowrap fs-11">'.filter($news["shortstory"]).'</h6>
</label>
</a>';
}
?>
</div>

</div>
</div>
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