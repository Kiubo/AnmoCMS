<?php
/***************************************
  ______        __         __ __       
 |   _  \.--.--|  |_.-----|  |  .---.-.
 |.  |   |  |  |   _|  -__|  |  |  _  |
 |.  |   |_____|____|_____|__|__|___._|
 |:  |   | CMS BY THE ANMOCMS PROJECT 
 |::.|| 
 `--- ---' 
****************************************/

/* 
	Functions list functions.
	--------------- 
	NutellaCMS();
*/

$mysqli = new mysqli($db['host'], $db['user'],$db['pass'],$db['db']);
if ($mysqli->connect_errno) {
    printf("Conexión fallida: %s\n", $mysqli->connect_error);
    exit();
}
$consulta = "SELECT * FROM nutella_settings";
if ($resultado = $mysqli->query($consulta)) {
while ($fila = $resultado->fetch_assoc()) {   
$Emulador = $fila['hotelEmu'];
$Name = $fila['hotelName'];
$Url = $fila['hotelUrl'];
$UrlSin = $fila['hotelUrlSin'];
$lang = $fila['lang'];
$Skin = $fila['skin'];
$groupBadgeURL = $fila['groupBadgeURL'];
$badgeURL = $fila['badgeURL'];
$HabboImg = $fila['HabboImg'];
$RankMin = $fila['RankMin'];
$RankMax = $fila['RankMax'];
$linkfb = $fila['linkfb'];
$startMotto = $fila['startMotto'];
$credits = $fila['credits'];
$duckets = $fila['duckets'];
$points = $fila['points'];
}
}
$consulta2 = "SELECT * FROM nutella_swf";
if ($resultado2 = $mysqli->query($consulta2)) {
while ($swf = $resultado2->fetch_assoc()) {   
$emuHost = $swf['emuHost'];
$emuPort = $swf['emuPort'];
$homeRoom = $swf['homeRoom'];
$external_Variables = $swf['external_Variables'];
$external_Variables_Override = $swf['external_Variables_Override'];
$external_Texts = $swf['external_Texts'];
$external_Texts_Override = $swf['external_Texts_Override'];
$productdata = $swf['productdata'];
$furnidata= $swf['furnidata'];
$figuremap = $swf['figuremap'];
$figuredata = $swf['figuredata'];
$swfFolder = $swf['swfFolder'];
$swfFolderSwf = $swf['swfFolderSwf'];
}
}

?>