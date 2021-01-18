<?php
/***************************************
  ______  ____ __ 
 |_  \.--.--|  |_.-----|  |  .---.-.
 |.  ||  |  |_|  -__|  |  |  _  |
 |.  ||_____|____|_____|__|__|___._|
 |:  || CMS BY THE NUTELLA PROJECT 
 |::.|| WEBSITE: NUTELLA-PROJECT.COM 
 `--- ---' 
****************************************/

/* Conexion Base de datos */
$db['host'] = 'localhost'; //Host de Mysql
$db['port'] = '3306'; //Port
$db['user'] = "root"; //Usuario
$db['pass'] = ''; //Contraseña
$db['db'] = "anmocms"; //Base de datos

/* Emulador Config */
$config['hotelEmu'] = 'arcturus'; // plusemu // arcturus

/* Dueño del hotel */
$config['Autor'] = 'Fenix';

/* Client Configuracion */
$hotel['emuHost'] = "localhost"; //IP of VPS//IP of Proxy
$hotel['emuPort'] = "3000";  //Port of VPS//Port of Proxy
$hotel['staffCheckClient'] = false; //Enable the staff pin in the client (true) or disable it (false)
$hotel['staffCheckClientMinimumRank'] = 3; //Minium staff rank to get the staff pin in the client
$hotel['homeRoom'] = '0'; //Set the start room when you get in the hotel
$hotel['external_Variables'] = "http://localhost/swf/gamedata/external_variables.txt";
$hotel['external_Variables_Override'] = "http://localhost/swf/gamedata/override/external_override_variables.txt";
$hotel['external_Texts'] = "http://localhost/swf/gamedata/external_flash_texts.txt";
$hotel['external_Texts_Override'] = "http://localhost/swf/gamedata/override/external_flash_override_texts.txt";
$hotel['productdata'] = "http://localhost/swf/gamedata/productdata.txt";
$hotel['furnidata'] = "http://localhost/swf/gamedata/furnidata.xml";
$hotel['figuremap'] = "http://localhost/swf/gamedata/figuremap.xml";
$hotel['figuredata'] = "http://localhost/swf/gamedata/figuredata.xml";
$hotel['swfFolder'] = "http://localhost/swf/gordon/PRODUCTION-201904011212-888653470";
$hotel['swfFolderSwf'] = "http://localhost/swf/gordon/PRODUCTION-201904011212-888653470/asmd.swf";
$hotel['onlineCounter'] = true; // Enable the user count in the client.
$hotel['diamonds.enabled'] = true; // Enable diamonds in the hotel.

/* Sitio Web Configuracion */
$config['hotelUrl'] = "http://localhost";//Link del hotel sin el "/"
$config['hotelUrlSin'] = "localhost";//Link del hotel sin el "/" y sin http:// o https://
$config['precioloteria'] = "5"; //Aqui va el precio para jugar loteria, el premio va ser el doble de lo que pongas
$config['preciovip'] = "100"; //Aqui va el precio para comprar el rango VIP
$config['skin'] = "Habb"; //Tema del hotel
$config['lang'] = "ES"; //Lenguaje del sitio web /es/
$config['hotelName'] = "Habbo";//Nombre del hotel
$config['ipradio'] = "http://212.83.172.164:9950/"; //Ip de la radio
$config['linkfb'] = "https://www.facebook.com/Habbo/"; //Link de la pagina de facebook
$config['staffCheckHk'] = true; //Activar el pin personal en el servicio de limpieza (true) o desactivar (false)
$config['staffCheckHkMinimumRank'] = 6; //Rank minimo para pedir pin en hk
$config['maintenance'] = false; //Habilitar el mantenimiento de su sitio web (true) o desactivar (false)
$config['maintenancekMinimumRankLogin'] = 6; //Rank minimo para saltarse el mantenimiento
$config['groupBadgeURL'] = "http://localhost/habbo-imaging/badge.php?badge=";
$config['badgeURL'] = "http://localhost/swf/c_images/album1584/"; 
$config['userLikeEnable'] = true; // true = Dar likes a usuarios false = desactivarlo
$config['newsCommandEnable'] = true; //true = Activar comentarios en noticias false = Desactivivar comentarios
$config['build'] = "1"; //Build
$config['css'] = "212"; //Actualizacion de css
$config['newsCommandFilter'] = true; //Habilitar el filtro de palabras en los comandos de noticias (el filtro utiliza las tablas db, wordfilter y wordfilter_characters)
$config['HabboImg'] = "https://www.habbo.com/habbo-imaging/avatarimage?figure=?/avatarimage.php/figure="; //Link para sacar looks
$config['RankMin'] = "4"; //Autoridad para entrar a la hk
$config['RankMax'] = "7"; //Todos los pluggin de la hk

/* Registro Configuracion */
$config['startMotto'] = "Bienvenid@ al hotel"; //Mision Inicial
$config['credits']= "0"; //Cantidad de creditos al registrarse
$config['duckets']= "0"; //Cantidad de duckets al registrarse
$config['diamonds']= "0"; //Cantidad de diamonds al registrarse
$config['diamondsRef']= "1";
$config['registerEnable'] = true;