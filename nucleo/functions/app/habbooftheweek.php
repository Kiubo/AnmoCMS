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
	function userOfTheWeek()
	{
		global $config;
		echo'
		';
		global $dbh,$lang;
		$getUOTW = $dbh->prepare("SELECT userid,text FROM uotw");
		$getUOTW->execute();
		$getUOTWData = $getUOTW->fetch();
		$getUser = $dbh->prepare("SELECT id,look,username,motto,online FROM users WHERE id = :id");
		$getUser->bindParam(':id', $getUOTWData['userid']);
		$getUser->execute();
		$getUserData = $getUser->fetch();
		$getUserBadge = $dbh->prepare("SELECT badge_id,user_id,badge_slot FROM user_badges WHERE user_id = :id AND badge_slot = 1 LIMIT 1");
		$getUserBadge->bindParam(':id', $getUOTWData['userid']);
		$getUserBadge->execute();
		$getUserDataBadge = $getUserBadge->fetch();
		if ($getUserBadge->RowCount() > 0)
		{
			$userBadge = '<img style="padding-right: 10px;" src="'.$config['badgeURL'].''.$getUserDataBadge['badge_id'].'.gif" align="right">';
		}
		else
		{
			false;
		}
		If($getUser->RowCount() > 0)
		{
			if($getUserData['online'] == 1){ $OnlineStatus = "online"; } else { $OnlineStatus = "offline"; }
			echo '<div class="featured-user-avatarimage flex"><icon name="medal"></icon><img class="habbo-imager" src="'.$config['HabboImg'].'/avatarimage.php?figure='.filter($getUserData['look']).'&action=std&direction=2&head_direction=3&gesture=std&size=n&img_format=png&frame=0&headonly=0"></div>';
			echo '<label class="gray-clear margin-auto-top-bottom padding-right-min">
				<h5 class="bold fs-14" style="text-transform: none;">'.filter($getUserData['username']).'!</h5>
				<h6 style="text-transform: none;">'.filter($getUOTWData['text']).'</h6>
			</label>';
		}
		else
		{
						echo'<div class="featured-user-avatarimage flex"><icon name="medal"></icon><img class="habbo-imager" src="'.$config['HabboImg'].'/avatarimage.php?figure=hr-115-42.hd-195-19.ch-3030-82.lg-275-1408.fa-1201.ca-1804-64&action=std&direction=2&head_direction=3&gesture=std&size=n&img_format=png&frame=0&headonly=0"></div>';
			echo '<label class="gray-clear margin-auto-top-bottom padding-right-min">
				<h5 class="bold fs-14" style="text-transform: none;">Sin Usuario Resaltado!</h5>
				<h6 style="text-transform: none;">Ningún usuario destacado en los eventos se destacó este mes.</h6>
			</label>';
		}
	}
?>