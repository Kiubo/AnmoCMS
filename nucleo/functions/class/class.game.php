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
		Functions list Class Game.
		--------------- 
		sso();
		usersOnline();
		homeRoom();
	*/
	class Game 
	{
		public static function sso($page)
		{
			global $dbh;
			$timeNow = strtotime("now");
			$sessionKey  = 'Habb-'.substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 25).'-SSO';
			if($page == 'client')
			{
				$stmt = $dbh->prepare("UPDATE users SET auth_ticket = :sso , last_online = :timenow WHERE id = :id");
				$stmt->bindParam(':timenow', $timeNow);
				$stmt->bindParam(':id', $_SESSION['id']);
				$stmt->bindParam(':sso', $sessionKey);
				$stmt->execute();
			}
			else if ($page == 'register')
			{
				return $sessionKey;
			}
		}
		Public static function usersOnline()
		{
			global $dbh;
			$userCount = $dbh->prepare("SELECT online FROM users WHERE online = '1'");
			$userCount->execute();
			return $userCount->RowCount();
		}

		public static function bansCount()
		{
			global $dbh;
			$banCount = $dbh->prepare("SELECT * FROM bans");
			$banCount->execute();
			return $banCount->RowCount();
		}
		public static function roomsCount()
		{
			global $dbh;
			$roomCount = $dbh->prepare("SELECT * FROM rooms");
			$roomCount->execute();
			return $roomCount->RowCount();
		}
		public static function roomsOnCount()
		{
			global $dbh;
			$roomOCount = $dbh->prepare("SELECT * FROM rooms WHERE users_now>='1'");
			$roomOCount->execute();
			return $roomOCount->RowCount();
		}
		public static function regCount()
		{
			global $dbh;
			$reount = $dbh->prepare("SELECT * FROM users");
			$reount->execute();
			return $reount->RowCount();
		}
		public static function staffCount()
		{
			global $dbh;
			$staffsCount = $dbh->prepare("SELECT * FROM users WHERE online = '1' AND rank >= '3'");
			$staffsCount->execute();
			return $staffsCount->RowCount();
			
		}
		
			public static function usuariosCount()
		{
			global $dbh;
			$usuariosCount = $dbh->prepare("SELECT * FROM users WHERE online = '1' AND rank <= '2' ");
			$usuariosCount->execute();
			return $usuariosCount->RowCount();
			
		}
		
		public static function homeRoom()
		{
			global $dbh, $hotel, $config;
				$stmt = $dbh->prepare("UPDATE users SET home_room = :homeroom WHERE id = :id");
				$stmt->bindParam(':homeroom', $hotel['homeRoom']);
				$stmt->bindParam(':id', $_SESSION['id']);
				$stmt->execute();
		}
	} 
?>