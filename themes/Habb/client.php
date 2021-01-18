<?php
if(User::userData('nutella_hc') == 0)
{
$hc = $dbh->prepare("INSERT INTO user_subscriptions (user_id, subscription_id, timestamp_activated, timestamp_expire) VALUES (".User::userData('id').", 'habbo_vip', '1566416817', '3574452017')");
$hc->execute();
$hc1 = $dbh->prepare("UPDATE users SET nutella_hc=1 WHERE id=".User::userData('id'));
$hc1->execute();
}
staffCheck();
Game::sso('client');	
Game::homeRoom();
?>
<html>
</body>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?=  User::userData('username')?>  <?= $config['hotelName'] ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo H. $config['skin']; ?>/favicon.png"/>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/assets/client/jquery-latest.js" type="text/javascript"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/assets/client/jquery-ui.js" type="text/javascript"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/assets/client/flashclient.js"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/assets/client/flash_detect_min.js"></script>
<script src="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/assets/client/client.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/types.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/buttons.css?1586564000" type="text/css">
<link rel="stylesheet" href="<?= $config['hotelUrl'] ?>/<?php echo H. $config['skin']; ?>/cdn/assets/css/client.css?1586564000" type="text/css">
</head>
<body>

<div class="client__buttons" style="left: 50px;">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="resizeClient()"><b><i class="fa fa-snowflake-o " aria-hidden="true"></i> <?= $lang["descongelar"] ?></b></button>
</div>
<div class="client__buttons" style="left: 50px;">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="resizeClient()"><b><i class="fa fa-snowflake-o " aria-hidden="true"></i> Descongelar</b></button>
</div>
<div class="client__buttons">
<button ngsf-toggle-fullscreen="" class="client__fullscreen" onclick="toggleFullScreen()" style=" height: 30px;width: 33px;"><i show-if-fullscreen="false" class="client__fullscreen__icon icon icon--fullscreen"></i> <i show-if-fullscreen="" class="client__fullscreen__icon icon icon--fullscreen-back ng-hide"></i></button>
</div>

<div id="flash-container" style="visibility: hidden;">
<div class="flash-disabled-container flex"> 
<div class="flash-disabled-content flex margin-auto">
<div class="frank margin-right-md"></div>
<div class="margin-auto-top-bottom flex-column">
<label class="gray flex-column">
<h1 class="bold uppercase margin-bottom-minm">¡Ya casi estás allí!</h1>
<h5 class="margin-bottom-min">Ahora solo necesita permitir que su navegador ejecute el reproductor flash para poder jugar.</h5>
<h5 class="margin-bottom-min">¡Es muy facil! Solo haz clic en el botón <b>Entrar al Hotel</b> y luego haga clic en <b>Permitir</b> para poder ejecutar el flash y reunirse y disfrutar de toda la diversión que hemos preparado para usted!</h5>
<div class="bg-2 padding-min general-radius">
<label class="flex-column">
<h5 class="margin-bottom-min uppercase">No puedes activar el <b>flash</b>?</h5>
<h6>¿Tienes problemas con la activación del flash? Cliente blanco o negro? ¡No te preocupes, hay una solución para todo!<br><br>
Y para esto puedes hacer clic <a class="bold">aqui</a> y quizás para encontrar una posible solución y aprender más sobre el problema.</h6>
</label>
</div>
</label>
<div class="flex margin-top-min margin-auto-left">
<a href="https://get.adobe.com/flashplayer/" class="green-button-1 no-link" style="width: 180px;height: 48px;">
<label class="margin-auto white">
<h5>Entrar al Hotel</h5>
</label>
</a>
</div>
</div>
</div>
</div>
</div>


    <div id="client-ui">
      <div class="client" id="client"></div>
    </div>
		<script>
var Client = new SWFObject("<?= $hotel['swfFolderSwf'] ?>", "client", "100%", "100%", "10.0.0");
Client.addVariable("client.allow.cross.domain", "0"); 
Client.addVariable("client.notify.cross.domain", "1");
Client.addVariable("connection.info.host", "<?= $hotel['emuHost'] ?>");
Client.addVariable("connection.info.port", "<?= $hotel['emuPort'] ?>");
Client.addVariable("site.url", "<?= $config['hotelUrl'] ?>");
Client.addVariable("url.prefix", "<?= $config['hotelUrl'] ?>"); 
Client.addVariable("client.reload.url", "<?= $config['hotelUrl'] ?>/me");
Client.addVariable("client.fatal.error.url", "<?= $config['hotelUrl'] ?>/me");
Client.addVariable("client.connection.failed.url", "<?= $config['hotelUrl'] ?>/me");
Client.addVariable("external.override.texts.txt", "<?= $hotel['external_Texts_Override'] ?>"); 
Client.addVariable("external.override.variables.txt", "<?= $hotel['external_Variables_Override'] ?>"); 	
Client.addVariable("external.variables.txt", "<?= $hotel['external_Variables'] ?>");
Client.addVariable("external.texts.txt", "<?= $hotel['external_Texts'] ?>"); 
Client.addVariable("external.figurepartlist.txt", "<?= $hotel['figuredata'] ?>"); 
Client.addVariable("flash.dynamic.avatar.download.configuration", "<?= $hotel['figuremap'] ?>");
Client.addVariable("productdata.load.url", "<?= $hotel['productdata'] ?>"); 
Client.addVariable("furnidata.load.url", "<?= $hotel['furnidata'] ?>");
Client.addVariable("use.sso.ticket", "1"); 
Client.addVariable("sso.ticket", "<?= User::userData('auth_ticket') ?>");
Client.addVariable("processlog.enabled", "0");
Client.addVariable("client.starting", "<?= $hotel['swftitle'] ?>");
Client.addVariable("flash.client.url", "<?= $hotel['swfFolder'] ?>/"); 
Client.addVariable("flash.client.origin", "popup");
Client.addVariable("nux.lobbies.enabled", "true");
Client.addVariable("country_code", "NL");
Client.addVariable("forward.type", "2");
Client.addVariable("forward.id", "<?php echo $_GET['roomId']; ?>");
Client.addParam('base', '<?= $hotel['swfFolder'] ?>/');
Client.addParam('allowScriptAccess', 'always');
Client.addParam('menu', false);
Client.addParam('wmode', "opaque");
Client.write('client');

			
FlashExternalInterface.signoutUrl = "<?= $config['hotelUrl'] ?>/logout";
		</script>
	

</head>
<script type="text/javascript">
function toggleFullScreen() {
  if ((document.fullScreenElement && document.fullScreenElement !== null) ||
   (!document.mozFullScreen && !document.webkitIsFullScreen)) {
if (document.documentElement.requestFullScreen) {  
  document.documentElement.requestFullScreen();  
} else if (document.documentElement.mozRequestFullScreen) {  
  document.documentElement.mozRequestFullScreen();  
} else if (document.documentElement.webkitRequestFullScreen) {  
  document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);  
}  
  } else {  
if (document.cancelFullScreen) {  
  document.cancelFullScreen();  
} else if (document.mozCancelFullScreen) {  
  document.mozCancelFullScreen();  
} else if (document.webkitCancelFullScreen) {  
  document.webkitCancelFullScreen();  
}  
  }  
}
</script>
<script type="text/javascript">
   function resizeClient(){
var theClient = document.getElementById('client');
var theWidth = theClient.clientWidth;
theClient.style.width = "10px";
theClient.style.width = theWidth + "px";
   }
  </script>
   <style>
.client__buttons {
left: 12px;
position: absolute;
top: -3px;
z-index: 630;
border-radius: 5px;
}
.client__buttons button {
box-shadow: 0 3px 0 1px rgba(0,0,0,.3);
background-color: #292929;
border-color: #41403d;
padding: 9px 2px;
width: 200px;
display: block;
border-radius: 5px;
float: left;
padding-left: 6px;
padding-right: 6px;
line-height: 1.2;
color: #b9b9b9;
font-size: 12px;
border-style: solid;
margin-bottom: 4px;
text-align: center;
outline: none;
}
.client__buttons button:hover{
	-webkit-animation-name:shakeit;
	-webkit-animation-duration:1s;
	-webkit-animation-timing-function:linear;
	-webkit-animation-iteration-count:infinite;
	animation-name:shakeit;
	animation-duration:1s;
	animation-timing-function:linear;
	animation-iteration-count:infinite;}
	@keyframes shakeit{0%{transform:rotate(0deg) translate(2px,1px);}
		10%{transform:rotate(10deg) translate(1px,2px);}
		20%{transform:rotate(-10deg) translate(3px,0px);}
		30%{transform:rotate(0deg) translate(0px,-2px);}
		40%{transform:rotate(-10deg) translate(-1px,1px);}
		50%{transform:rotate(10deg) translate(1px,-2px);}
		60%{transform:rotate(0deg) translate(3px,-1px);}
		70%{transform:rotate(10deg) translate(-2px,-1px);}
		80%{transform:rotate(-10deg) translate(1px,1px);}
		90%{transform:rotate(0deg) translate(-2px,-2px);}
		100%{transform:rotate(10deg) translate(-1px,2px);}
		}	</style>
<style type="text/css"> 
   #flash-container,body{width:100%;height:100%;margin:0}body{background-color:#000}#client-ui{height:100%}#flash-container{position:absolute;left:0;right:0;top:0;bottom:0;overflow:hidden}.adblock {background-color: rgba(255,255,255,0.9);color: #000;height: 100%;width: 100%;z-index: 1;position: fixed;text-align: center;padding-top: 150px;font-family: cursive;}.adblock .main {font-weight: bold;font-size: 40px;}.adblock .desc {font-size: 12px;}
			.demo-modal {
background-color: #FFF;
box-shadow: 0 11px 15px -7px rgba(0, 0, 0, 0.2), 0 24px 38px 3px rgba(0, 0, 0, 0.14), 0 9px 46px 8px rgba(0, 0, 0, 0.12);
padding: 20px;
border-radius: 4px;
width: 50%;
position: relative;
display: none;
}
 #clienterror{color:#FFFFFF;background:#000000;font-family:'Ubuntu';padding:48px 12px;width:100%;height:100%;display:none;position:fixed;top:0;left:0;text-align:center;z-index:1000000;}#clienterror p{width:445px;margin:0 auto;font-family:'Ubuntu';font-size:24px;text-align:center;padding:20px 0;}#clienterror a{margin:0 auto;margin-bottom:10px;display:block;}#clientdcerror{color:#FFFFFF;background:#000000;background:rgba(0,0,0,0.85);font-family:'Ubuntu';padding:48px 12px;width:100%;height:100%;display:none;position:fixed;top:0;left:0;text-align:center;z-index:1000000;}#clientdcerror p{width:445px;margin:0 auto;font-family:'Ubuntu';font-size:24px;text-align:center;padding:20px 0;}#clientdcerror a{margin:0 auto;margin-bottom:10px;display:block;}

#px_unFreezer{
background: black;
color: white;
cursor: pointer;
z-index: 999;
position: absolute;
top: 0;
left: 0;
font-family: sans-serif;
padding: 3px;
font-size: 11px;
-webkit-touch-callout: none;
-webkit-user-select: none;
-khtml-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
}
</style>
<script type="text/javascript">
            if(!FlashDetect.installed){
       var elemento = document.getElementById("flash-container");
   elemento.style.visibility = 'visible';   
  }</script>