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

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define('NUTELLA_CMS', 1);
include_once $_SERVER['DOCUMENT_ROOT'].'/global.php';

Html::page();
?>