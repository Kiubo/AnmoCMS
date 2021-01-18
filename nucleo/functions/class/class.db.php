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

	if(!defined('NUTELLA_CMS')) 
	{ 
		die('Lo sentimos, pero no puede acceder a este archivo!'); 
	}
	try {
		$dbh = new PDO('mysql:host='.$db['host'].':'.$db['port'].';dbname='.$db['db'].'', $db['user'], $db['pass']);
	}
	catch (PDOException $e) {
		echo ("
		<br><br>
<div style='background-repeat: no-repeat;background-position: 10px 50%;padding: 10px 10px 10px 10px;-moz-border-radius: 5px;border-radius: 5px;-moz-box-shadow: 0 1px 1px #fff inset;box-shadow: 0 1px 1px #fff inset;color: #7b7b7b;background: #f3f3f3;display: table;padding: 50px 100px;width: 320px;margin: 0 auto;font-size: 15px;font-family: Tahoma;'><b style=' margin-left: 70px; '>
	Ocurrio un error</b><br>No fue posible conectarse a la base de datos.</div>
	<br>
<div style='background-repeat: no-repeat;background-position: 10px 50%;padding: 10px 10px 10px 10px;-moz-border-radius: 5px;border-radius: 5px;-moz-box-shadow: 0 1px 1px #fff inset;box-shadow: 0 1px 1px #fff inset;color: #7b7b7b;background: #f3f3f3;display: table;padding: 50px 100px;width: 320px;margin: 0 auto;font-size: 15px;font-family: Tahoma;'><b style=' margin-left: 70px; '>
	An error occurred</b><br>It is not possible to connect to the database.</div>
		"); 
		die();
	}
?>