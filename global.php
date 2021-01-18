<?php
/***************************************
  ______        __         __ __       
 |   _  \.--.--|  |_.-----|  |  .---.-.
 |.  |   |  |  |   _|  -__|  |  |  _  |
 |.  |   |_____|____|_____|__|__|___._|
 |:  |   | CMS BY THE NUTELLA PROJECT                            
 |::.|   | WEBSITE: NUTELLA-PROJECT.COM                            
 `--- ---'    
****************************************/

session_start();
ob_start();

define('Z', $_SERVER['DOCUMENT_ROOT'].'/');
define('A', Z . 'nucleo/');
define('B', 'functions/');
define('C', 'class/');
define('H', 'themes/');
define('E', 'idiomas/');
define('G', 'content/');
define('I', 'maintenance/');
define('J', Z . 'nutacp/');
define('K', 'app/');

require_once A . 'nutella.config.php';
require_once A . B . C . 'functions.php';
require_once A . B . C . 'class.db.php';
require_once A . B . C . 'class.game.php';
require_once A . B . C . 'class.user.php';
require_once A . B . C . 'class.html.php';
require_once A . B . C . 'class.admin.php';
require_once A . E . ''.$config['lang'].'.php';

define('S', $config['skin']);

Html::loadPlugins();
?>