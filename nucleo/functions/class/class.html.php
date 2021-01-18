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
	/* 
		Functions list Class Html.
		--------------- 
		checkBan();
		page();
		pageHK();
		error();
		errorSucces();
		loadPlugins();
	*/
	class Html 
	{
		private static function checkBan($ip, $username = null)
		{
			global $dbh;
			$ipBan = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'ip' && value = :ip");
			$ipBan->bindParam(':ip', $ip);
			$ipBan->execute();
			if ($ipBan->RowCount() === 1)
			{
				$queryIp = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'ip' && value = :ip");
				$queryIp->bindParam(':ip', $ip);
				$queryIp->execute();
				while ($rowIp = $queryIp->fetch())
				{
					if (strtotime(gmdate($rowIp['expire'])) <= strtotime('now'))
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			}
			else if ($username !== null)
			{
				$userBan = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'user' && value = :username");
				$userBan->bindParam(':username', $username);
				$userBan->execute();
				if ($userBan->RowCount() === 1)
				{
					$userBan = $dbh->prepare("SELECT bantype,expire FROM bans WHERE bantype = 'user' && value = :username");
					$userBan->bindParam(':username', $username);
					$userBan->execute();
					while ($rowUser = $userBan->fetch())
					{
						if (strtotime(gmdate($rowUser['expire'])) <= strtotime('now'))
						{
							return true;
						}
						else
						{
							return false;
						}
					}
				}
			}
			else
			{
				return false;
			}
		}
		public static function page()
		{
			global $dbh, $emu, $config, $lang, $hotel, $version;
			if (defined('PHP_VERSION') && PHP_VERSION >= 5.6) 
			{
				true;
			} 
			else 
			{
				echo 'PHP version is lower then PHP 5.6 your PHP version is '.PHP_VERSION.'';
				exit;
			}
			
			if (self::checkBan(userIp(), User::userData('username')))
			{
				

				echo'
				<title>'.$lang["Bblockked"].'</title>
			<link rel="shortcut icon" type="image/x-icon" href="'.  H. $config['skin'].'/assets/images/favicon.png"/>
				<body style=" background: url('. H. $config['skin'].'/assets/images/banned.png); background-size: 100%; ">
				<div style="text-align: center;display: flex;padding: 20px;height: auto;width: 45%;font-size: 23px;margin: 10% 29%;font-family: arial;border-radius: 10px;border-bottom: 2px solid #2b2b2b;background-color: #fff;justify-content: center;align-items: center;">
				'.$lang["Bvisitor"].' </div>
				</body>
				';
			}
			else
			{
				if(isset($_GET['url']))
				{
					$page = filter($_GET['url']);
					$allowed = array(); 
					foreach (new DirectoryIterator(Z . H . S) as $file) { 
						$file = explode('.php', $file);
						$allowed[] = $file[0];
					} 
					if($page)
					{ 
						if (!$config['maintenance'] == true || isset($_SESSION['adminlogin'])	){
							$fileExists = Z . H . S ."/{$page}.php";
							if(file_exists($fileExists))
							{
								$content = in_array($page, $allowed) ? include(Z . H . S ."/{$page}.php") : '';
							} 
							else 
							{
								include Z . H . S .'/404.php'; 
							}
						}
						else
						{
							if ($page == 'adminlogin')
							{
								include A . I . 'adminlogin.php'; 
							}
							else
							{
								include A . I . 'index.php'; 
							}
						}
					} 
					else 
					{
						include Z . H . S .'/pages/index.php';
					}
				} 
				else 
				{
					include A . H . S . '/pages/index.php';
					header('Location: '.$config['hotelUrl'].'/index');
				}
			}
			if(loggedIn()){ 
				switch($page)
				{
					case "index":
					case "register":
					case "registro":
					header('Location: '.$config['hotelUrl'].'/me');
					break;
					case "changename";
					if ($config['facebookLogin'] == true)
					{
						if (User::userData('fbenable') >= 1)
						{
							header('Location: '.$config['hotelUrl'].'/me');	
							exit();
						}
					}
					break;
					case "game":
					case "client":
					case "hotel":
					if ($config['facebookLogin'] == true)
					{
						if (User::userData('fbenable') == 0)
						{
							header('Location: '.$config['hotelUrl'].'/changename');	
							exit();
						}
					}
					break;
					default:
					//Nothing
					break;
				}
			}
			if(!loggedIn()){ 
				switch($page)
				{
					case "me":
					case "settingspassword":
					case "settingsemail":
					case "settingshotel":
					case "sollicitaties":
					case "stats":
					case "game":
					case "client":
					case "hotel":
					case "pin":
					case "password":
					case "community":
					case "news":
					case "shop":
					case "shoploteria":
					case "shopbadges":
					case "report":
					case "shopvip":
					case "staff":
					case "teams":
					case "advertentie_tips":
					case "online":
					case "home/":
					case "changename":
					header('Location: '.$config['hotelUrl'].'/index');
					break;
					default:
					//Nothing
					break;
				}
			}
		}
		public static function pageHK()
		{
			global $dbh, $config, $lang, $hotel, $version;
			if(isset($_GET['url']))
			{
				$pageHK = filter($_GET['url']);
				$allowed = array(); 
				foreach (new DirectoryIterator(J) as $file) { 
					$file = explode('.php', $file);
					$allowed[] = $file[0];
				} 
				if($pageHK)
				{ 
					
					$fileExists = J ."{$pageHK}.php";
					if(file_exists(filter($fileExists)))
					{
						$content = in_array($pageHK, $allowed) ? include(J ."/{$pageHK}.php") : '';
					} 
					else 
					{
						include J . "/404.php"; 
					}
				} 
				else 
				{
					include J . "/desboard.php";
				}
			} 
			else 
			{
				include J . "desboard.php";
				header('Location: '.$config['hotelUrl'].'/nutacp/desboard');
			}
			switch($pageHK)
			{
				case $pageHK:
				admin::CheckRank(3);
				break;
				default:
				//Nothing
				break;
			}
		} 
		public static function error($errorName)
		{
			echo '<br><div class="error" style="display: block;">'.$errorName.'</div>';
		}
		public static function errorSucces($succesMessage)
		{
			echo '<br><div class="errorSucces" style="display: block;">'.$succesMessage.'</div>';
		}
		public static function loadPlugins()
		{
			$pluginDir = A . B . K;
			foreach (glob($pluginDir."*.php") as $filename) {
				require_once $pluginDir."".basename($filename)."";
			}
		}
	} 
?>																								