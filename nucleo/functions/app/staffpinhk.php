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
	function staffPinHk()
	{
		global $dbh,$config, $lang;
		if (isset($_POST['loginPin']))
		{
			if (!empty($_POST['PINbox']))
			{
				$stmt = $dbh->prepare("SELECT pin FROM users WHERE id = :id");
				$stmt->bindParam(':id', $_SESSION['id']);
				$stmt->execute();
				$pin = $stmt->fetch();
				if ($_POST['PINbox'] == $pin['pin'])
				{
					$_SESSION['staffCheckHk'] = '1';
					header('Location: '.$config['hotelUrl'].'/nutacp/dash');
				}
				else{
					echo $lang["Ppinwrong"];
				}
			}
			else{
				echo $lang["Pnopin"];
			}
		}
	}
	function staffCheckHk()
	{
		global $config;
		if($config['staffCheckHk'] == true)
		{
			if (user::userData('rank') > $config['staffCheckHkMinimumRank'])
			{
				if (empty($_SESSION['staffCheckHk'])) 
				{ 
					header('Location: '.$config['hotelUrl'].'/nutacp/pin');
					exit;
				}
			}
		}
	}
?>