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
	function ForumRank()
	{
		$link = $_GET['link'];
		$sqls2 = "SELECT * FROM nutella_forum WHERE link = '".$link."'";
		$results2 = mysql_query($sqls2);
		$rows2 = mysql_fetch_array($results2);
		$ids = $rows2['id'];
		$sqls = "SELECT * FROM nutella_forum WHERE id = '".$rows2['id']."'";
		$results = mysql_query($sqls);
		$rows = mysql_fetch_array($results);
		$result2 = "SELECT * FROM users WHERE username = '".$rows['username'] ."'";
		$result2a = mysql_query($result2);
		$userinfo = mysql_fetch_array($result2a);
		
		switch ($userinfo['rank']) {
			case 1:case 17:
			echo '<div class="tarja" style="background-image: url(http://localhost/imagenes/rango-usuario.png);">Usuario</div>';
			break;
			case 2:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-2.png);">Inter</div>';
			break;
			case 3:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-3.png);">Publicista</div>';
			break;
			case 4:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-4.png);">Builder</div>';
			break;
			case 6:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-6.png);">Guia</div>';
			break;
			case 7:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-7.png);">Embajador</div>';
			break;
			case 8:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-8.png);">Colaborador</div>';
			break;
			case 9:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-9.png);">Soporte</div>';
			break;
			case 10:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-10.png);">Game Master</div>';
			break;
			case 11:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-11.png);">Moderador</div>';
			break;
			case 12:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-12.png);">Co-Administrador</div>';
			break;
			case 13:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-13.png);">Administrador</div>';
			break;
			case 15:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-15.png);">CEO</div>';
			break;
			case 16:
			echo '<div class="tarja expert" style="background-image: url(http://localhost/imagenes/rango-16.png);">Fundador</div>';
		}
	}
?>