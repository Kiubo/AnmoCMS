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
		Functions list Class User.
		---------------
		checkUser();
		hashed();
		validName();
		userData();
		emailTaken();
		userTaken();
		refUser();
		login();
		register();
		userRefClaim();
		editPassword();
		editEmail();
		editHotelSettings();
		editUsername();
	*/
	class User 
	{
		public static function checkUser($password, $passwordDb, $username)
		{
			global $dbh;
			if (substr($passwordDb, 0, 1) == "$") 
			{
				if (password_verify($password, $passwordDb))
				{
					return true;
				}
				return false;
			}
			else 
			{
				$passwordBcrypt = self::hashed($password);
				if (md5($password) == $passwordDb) 
				{	
					$stmt = $dbh->prepare("UPDATE users SET password = :password WHERE username = :username");
					$stmt->bindParam(':username', $username); 
					$stmt->bindParam(':password', $passwordBcrypt); 
					$stmt->execute(); 
					return true;
				}
				return false;	
			}
		}
		public static function hashed($password)
		{	
			return password_hash($password, PASSWORD_BCRYPT);
		}
		public static function validName($username)
		{
			if(strlen($username) <= 12 && strlen($username) >= 3 && ctype_alnum($username))
			{
				return true;
			}
			return false;
		}
		public static function userData($key)
		{
			global $dbh,$config;
			if (loggedIn())
			{
				if ($config['hotelEmu'] == 'arcturus')
				{
					if ( in_array($key, array('activity_points', 'vip_points')) )
					{
						switch($key)
						{
							case "activity_points":
							$key = '0';
							break;
							case "vip_points":
							$key = '5';
							break;
							default:
							break;
						}
						$stmt = $dbh->prepare("SELECT ".$key.",user_id,type,amount FROM users_currency WHERE user_id = :id AND type = :type");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->bindParam(':type', $key);
						$stmt->execute();
						if ($stmt->RowCount() > 0)
						{
							$row = $stmt->fetch();
							return $row['amount'];
						}
						else
						{
							return '0';
						}
					}
					$stmt = $dbh->prepare("SELECT ".$key." FROM users WHERE id = :id");
					$stmt->bindParam(':id', $_SESSION['id']);
					$stmt->execute();
					$row = $stmt->fetch();
					return filter($row[$key]);
			}
		} 
	}
		public static function emailTaken($email)
		{
			global $dbh;
			$stmt = $dbh->prepare("SELECT mail FROM users WHERE mail = :email LIMIT 1");
			$stmt->bindParam(':email', $email);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public static function userTaken($username)
		{
			global $dbh;
			$stmt = $dbh->prepare("SELECT username FROM users WHERE username = :username LIMIT 1");
			$stmt->bindParam(':username', $username);
			$stmt->execute();
			if ($stmt->RowCount() > 0)
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		public static function refUser($refUsername)
		{
			global $dbh, $lang;
			$getUsernameRef = $dbh->prepare("SELECT username,ip_reg FROM users WHERE username = :username LIMIT 1");
			$getUsernameRef->bindParam(':username', $refUsername);
			$getUsernameRef->execute();
			$getUsernameRefData = $getUsernameRef->fetch();
			if ($getUsernameRef->RowCount() > 0)
			{
				if ($getUsernameRefData['ip_reg'] == userIp())
				{
					html::error($lang["RsameIpRef"]);
				}
				else
				{
					return true;
				}
			}
			else
			{	
				html::error($lang["RnotExist"]);
				return false;
			}
		}
		public static function login()
		{
			global $dbh,$config,$lang;
			if (isset($_POST['login']))
			{
				if (!empty($_POST['username']))
				{
					if (!empty($_POST['password']))
					{
						$stmt = $dbh->prepare("SELECT id, password, username, rank FROM users WHERE username = :username");
						$stmt->bindParam(':username', $_POST['username']); 
						$stmt->execute();
						if ($stmt->RowCount() == 1)
						{
							$row = $stmt->fetch();
							if (self::checkUser($_POST['password'], $row['password'],$row['username']))
							{	
								$_SESSION['id'] = $row['id'];
								if (!$config['maintenance'] == true)
								{
										$userLastIp = 'ip_last';	
									$stmt = $dbh->prepare("UPDATE users SET ".$userLastIp." = :userip WHERE id = :id");
									$stmt->bindParam(':id', $_SESSION['id']);
									$stmt->bindParam(':userip', userIp());
									$stmt->execute(); 
									header('Location: '.$config['hotelUrl'].'/me');
								}
								else
								{	
									if ($row['rank'] >= $config['maintenancekMinimumRankLogin'])
									{
										$_SESSION['adminlogin'] = true;
										header('Location: '.$config['hotelUrl'].'/me');	
									}
									return html::error($lang["Mnologin"]);
								}
							}
							return html::error($lang["Lpasswordwrong"]);
						}
						return html::error( $lang["Lnotexistuser"]);
					}
					return html::error($lang["Lnopassword"]);
				}
				return html::error('');
			}
		}
		public static function register()
		{

			$userRealIp = userIp();
			global $config, $lang, $dbh;
			if (isset($_POST['register']))
			{
				if ($config['registerEnable'] == true)
				{
					if (!empty($_POST['username']))
					{
						if (self::validName($_POST['username']))
						{
							if (!empty($_POST['password']))
							{
								if (!empty($_POST['password_repeat']))
								{
									if (!empty($_POST['email']))
									{
										if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
										{
											if (!self::userTaken($_POST['username']))
											{
												if (!self::emailTaken($_POST['email']))
												{
													if (strlen($_POST['password']) >= 6)
													{
														if ($_POST['password'] == $_POST['password_repeat'])
														{
															if ($_POST['codebueno'] == $_POST['code'])
															{
														    $userRegIp = 'ip_reg';	
															$stmt = $dbh->prepare("SELECT ".$userRegIp." FROM users WHERE ".$userRegIp." = :userip");
															$stmt->bindParam(':userip', $userRealIp);
															
															$stmt->execute();
															if ($stmt->RowCount() < 4)
															{
																if (self::refUser($_POST['referrer']) || empty($_POST['referrer']))
																{
																	if(!$config['recaptchaSiteKeyEnable'] == true)
																	{
																		$_POST['g-recaptcha-response'] = true;
																	}
																	if ($_POST['g-recaptcha-response'])
																	{		
																		if ($_POST['genero'] == "hombre")
																		{
																		$avatar = 'hr-115-1035.hd-180-10.lg-275-64.ch-215-62.sh-290-62';
																		}
																		else
																		{
																			if ($_POST['genero'] == "mujer")
																			{
																			$avatar = 'hr-515-61.sh-730-62.ch-650-62.lg-716-1193-62.hd-600-10';
																			}
																			else
																			{
																			$avatar = 'hr-115-1035.hd-180-10.lg-275-64.ch-215-62.sh-290-62';
																			}
																		}																		
																		$motto = filter($_POST['motto'] );
																		$password = self::hashed($_POST['password']);
																			$addNewUser = $dbh->prepare("
																			INSERT INTO
																			users
																			(username, password, rank, auth_ticket, motto, account_created, last_online, mail, look, ip_current, ip_register, credits)
																			VALUES
																			(
																			:username, 
																			:password, 
																			'1',
																			:sso,
																			:motto, 
																			:time, 
																			:last_online,
																			:email, 
																			:avatar,
																			:userip, 
																			:userip, 
																			:credits
																			)");
																			$addNewUser->bindParam(':username', $_POST['username']);
																			$addNewUser->bindParam(':password', $password);
																			$addNewUser->bindParam(':motto', $motto);
																			$addNewUser->bindParam(':sso', game::sso('register'));
																			$addNewUser->bindParam(':email', $_POST['email']);
																			$addNewUser->bindParam(':avatar', $avatar);
																			$addNewUser->bindParam(':credits', $config['credits']);
																			$addNewUser->bindParam(':userip', userIp());
																			$addNewUser->bindParam(':time', strtotime('now'));
																			$addNewUser->bindParam(':last_online', strtotime('now'));
																			$addNewUser->execute();
																		$lastId = $dbh->lastInsertId();
																		//badge register//
																		if ($_POST['placa'] == "MRG01")
																		{
																		$badge = 'MRG01';
																		}
																		else
																		{
																			if ($_POST['placa'] == "MRG02")
																			{
																			$badge = 'MRG02';
																			}
																			else
																			{
																				if ($_POST['placa'] == "MRG03")
																				{
																				$badge = 'MRG03';
																				}	
																				else
																				{
																					if ($_POST['placa'] == "MRG04")
																					{
																					$badge = 'MRG04';
																					}
																					else
																					{
																						if ($_POST['placa'] == "MRG05")
																						{
																						$badge = 'MRG05';
																						}
																						else
																						{
																							$badge = 'FAN';
																						}
																					}																					
																				}	
																			}
																		}
																			$addBadgeuser = $dbh->prepare("
																			INSERT INTO
																			user_badges
																			(user_id, badge_id)
																			VALUES
																			(
																			:user_id, 
																			:badge_id
																			)");
																			$addBadgeuser->bindParam(':user_id', $lastId);
																			$addBadgeuser->bindParam(':badge_id', $badge);
																			$addBadgeuser->execute();
																		//Generador de territorios Theme Hotel
																			if($_POST['sala'] == "sala1")
																			{
																				$addSala = $dbh->prepare("INSERT INTO `rooms` VALUES ('','private','Territorio ".$_POST['username']."','".$lastId."','',36,'locked',0,50,'model_bc_99999991',0,'','','215','110','5.1','0','0','0','0',0,1,0,'0','1','1',0,0,0,0,0,2,'1','1','1','1','1','1','1','1','false');");
																				$addSala->execute();
																				$getsearchsalaid = $dbh->prepare("SELECT * FROM rooms WHERE (caption = 'Territorio ".$_POST['username']."') AND (owner = ".$lastId.") LIMIT 1");
																				$getsearchsalaid->execute();
																				$getinfosala = $getsearchsalaid->fetch();
																				$addFurni = $dbh->prepare("INSERT INTO `items` VALUES ('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 10, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 8, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 6, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 4, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 10, 2, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 10, 4, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 8, 4, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 8, 2, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 6, 2, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 6, 4, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 4, 2, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20131, '4', 4, 4, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1737, '1', 0, 0, 0, 0, ':w=3,8 l=32,50 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1731, '1', 0, 0, 0, 0, ':w=5,0 l=29,51 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1736, '1', 0, 0, 0, 0, ':w=3,10 l=12,71 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1359, '', 11, 1, 0.7, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1359, '', 4, 1, 0.7, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 6, 3, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 5, 3, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 10, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 8, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 6, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 4, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1356, '0', 5, 2, 0.7, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1360, '', 7, 4, 0.7, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1361, '1', 4, 4, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1353, '1', 4, 3, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20403, '1', 8, 2, 0.7, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 9, 3, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1349, '', 8, 3, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20394, '1', 0, 0, 0, 0, ':w=3,12 l=13,33 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1712, '', 0, 0, 0, 0, ':w=8,0 l=31,51 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 8, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 6, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 6, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 4, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 4, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 4, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 10, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 8, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 10, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 6, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 8, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 10, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 10, 12, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 8, 12, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 6, 12, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900340, '2', 4, 12, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900354, '', 10, 8, 0, 6, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900354, '', 8, 8, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900354, '', 9, 11, 0, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900354, '', 9, 13, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900343, '', 4, 12, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900331, '', 9, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900331, '', 9, 12, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900329, '', 5, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 900355, '', 4, 7, 0, 0, '', 0, 0, 'true');");
																				$addFurni->execute();
																				$addroom = $dbh->prepare("UPDATE users SET home_room=".$getinfosala['id']." WHERE id=".$lastId);
																				$addroom->execute();
																			}
																			else
																			{
																				if($_POST['sala'] == "sala2")
																				{
																					$addSala = $dbh->prepare("INSERT INTO `rooms` VALUES ('','private','Territorio ".$_POST['username']."','".$lastId."','',36,'locked',0,10,'model_bc_99999992',0,'','','217','110','5.3','0','0','0','0',0,1,0,'0','1','1',0,0,0,0,0,0,'1','1','1','1','1','1','1','1','false');");
																					$addSala->execute();
																					$getsearchsalaid = $dbh->prepare("SELECT * FROM rooms WHERE (caption = 'Territorio ".$_POST['username']."') AND (owner = ".$lastId.") LIMIT 1");
																					$getsearchsalaid->execute();
																					$getinfosala = $getsearchsalaid->fetch();
																					$addFurni = $dbh->prepare("INSERT INTO `items` VALUES('', ".$lastId.", ".$getinfosala['id'].", 1704, '', 0, 0, 0, 0, ':w=2,4 l=25,72 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1704, '', 0, 0, 0, 0, ':w=10,0 l=23,68 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65274, '', 9, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65323, '', 0, 0, 0, 0, ':w=7,0 l=28,33 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65290, '', 7, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65275, '', 10, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65269, '', 1, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65311, '', 0, 0, 0, 0, ':w=0,9 l=23,34 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65305, '', 1, 8, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65305, '', 2, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65319, '', 0, 0, 0, 0, ':w=4,2 l=2,68 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65280, '', 6, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12240, '', 7, 5, 0, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12240, '', 6, 6, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12237, '', 7, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12235, '', 11, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 11, 8, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 9, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 8, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 7, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 4, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 3, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 2, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 1, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 44391305, '', 3, 6, 1.5, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 44391305, '', 1, 6, 1.5, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 7, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 9, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 8, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 10, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 3, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 2, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 3, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 4, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 2, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 1, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 2, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 3, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 4, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 1, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 89985, '1', 2, 7, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 8, 10, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 7, 10, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 9, 10, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 8, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 7, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 11, 7, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 11, 6, 0.25, 0, '', 0, 0, 'true');");
																					$addFurni->execute();
																					$addroom = $dbh->prepare("UPDATE users SET home_room=".$getinfosala['id']." WHERE id=".$lastId);
																					$addroom->execute();
																				}
																				else
																				{
																					if($_POST['sala'] == "sala3")
																					{
																						$addSala = $dbh->prepare("INSERT INTO `rooms` VALUES ('','private','Territorio ".$_POST['username']."', '".$lastId."','',36,'locked',0,50,'model_bc_99999993',0,'','','3104','307','3.1','0','0','0','0',-2,1,0,'0','1','1',0,0,0,0,0,2,'1','1','1','1','1','1','1','1','false');");
																						$addSala->execute();
																						$getsearchsalaid = $dbh->prepare("SELECT * FROM rooms WHERE (caption = 'Territorio ".$_POST['username']."') AND (owner = ".$lastId.") LIMIT 1");
																						$getsearchsalaid->execute();
																						$getinfosala = $getsearchsalaid->fetch();
																						$addFurni = $dbh->prepare("INSERT INTO `items` VALUES ('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 1, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 1, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12283, '', 8, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65836, '1', 1, 10, 1.25, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=5,1 l=1,103 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=6,0 l=31,103 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=8,0 l=23,99 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=10,0 l=17,96 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=12,0 l=10,93 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=14,0 l=1,89 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=5,3 l=23,93 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1794, '1', 0, 0, 0, 0, ':w=5,5 l=29,91 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '', 13, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '1', 13, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '', 13, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '3', 11, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '2', 11, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '3', 11, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '', 9, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '1', 9, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '', 9, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '3', 7, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '2', 7, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '3', 7, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '0', 5, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '1', 5, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '', 5, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '3', 3, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '2', 3, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '3', 3, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '0', 1, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '1', 1, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20125, '', 1, 11, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 12, 5, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 7, 5, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 14, 2, 1, 6, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 14, 3, 1, 6, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 11, 1, 1, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 6, 2, 1, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 6, 3, 1, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 9, 1, 1, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '', 7, 1, 1, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95382, '1', 12, 1, 1, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95384, '', 9, 5, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95384, '', 11, 5, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95384, '1', 14, 1, 1, 6, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95384, '1', 14, 5, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95384, '1', 6, 1, 1, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95384, '1', 6, 5, 1, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95383, '', 10, 5, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 12, 3, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 12, 2, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 11, 3, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 11, 2, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 9, 3, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 9, 2, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 7, 3, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 25362, '', 7, 2, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 95389, '1', 7, 2, 1, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1620, '0', 10, 1, 1.5, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 540022, '', 0, 0, 0, 0, ':w=0,12 l=32,116 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 77707, '0', 12, 10, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 949, '', 1, 11, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 540022, '', 0, 0, 0, 0, ':w=2,6 l=3,116 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 540022, '', 0, 0, 0, 0, ':w=0,8 l=32,116 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 540022, '', 0, 0, 0, 0, ':w=0,9 l=4,130 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 20202, '2', 0, 0, 0, 0, ':w=0,8 l=28,105 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 77706, '1', 6, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 171, '', 1, 9, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 921, '', 10, 11, 0, 6, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 930, '', 8, 9, 0, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 921, '', 9, 9, 0, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 930, '', 10, 10, 0, 6, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 930, '', 7, 11, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 921, '', 7, 10, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1528, '', 8, 10, 0.7, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 710001999, 'mlg-270-92.ch-250-78.sh-906-92Ropa', 3, 7, 0, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 710002014, '', 0, 0, 0, 0, ':w=4,6 l=18,106 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 710002000, '', 4, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 710002006, '1', 1, 7, 0, 2, '', 0, 0, 'true');");
																						$addFurni->execute();
																						$addroom = $dbh->prepare("UPDATE users SET home_room=".$getinfosala['id']." WHERE id=".$lastId);
																						$addroom->execute();
																					}
																					else
																					{
																						$addSala = $dbh->prepare("INSERT INTO `rooms` VALUES ('','private','Territorio ".$_POST['username']."','".$lastId."','',36,'locked',0,10,'model_bc_107',0,'','','217','110','5.3','0','0','0','0',0,1,0,'0','1','1',0,0,0,0,0,0,'1','1','1','1','1','1','1','1','false');");
																						$addSala->execute();	
																						$getsearchsalaid = $dbh->prepare("SELECT * FROM rooms WHERE (caption = 'Territorio ".$_POST['username']."') AND (owner = ".$lastId.") LIMIT 1");
																						$getsearchsalaid->execute();
																						$getinfosala = $getsearchsalaid->fetch();																						
																						$addFurni = $dbh->prepare("INSERT INTO `items` VALUES('', ".$lastId.", ".$getinfosala['id'].", 1704, '', 0, 0, 0, 0, ':w=2,4 l=25,72 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 1704, '', 0, 0, 0, 0, ':w=10,0 l=23,68 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65274, '', 9, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65323, '', 0, 0, 0, 0, ':w=7,0 l=28,33 r', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65290, '', 7, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65275, '', 10, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65269, '', 1, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65311, '', 0, 0, 0, 0, ':w=0,9 l=23,34 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65305, '', 1, 8, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65305, '', 2, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65319, '', 0, 0, 0, 0, ':w=4,2 l=2,68 l', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65280, '', 6, 1, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12240, '', 7, 5, 0, 4, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12240, '', 6, 6, 0, 2, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12237, '', 7, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 12235, '', 11, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 11, 8, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 9, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 8, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 7, 10, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 4, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 3, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 2, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 1, 6, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 44391305, '', 3, 6, 1.5, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 44391305, '', 1, 6, 1.5, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 7, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 9, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 8, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 10, 10, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 9, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 8, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 3, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 2, 7, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 3, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 4, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 2, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 1, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 2, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 3, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 4, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 1, 6, 0, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 89985, '1', 2, 7, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 8, 10, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 7, 10, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 9, 10, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 8, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 7, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65019, '3', 11, 6, 1.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 11, 7, 0.25, 0, '', 0, 0, 'true'),('', ".$lastId.", ".$getinfosala['id'].", 65081, '', 11, 6, 0.25, 0, '', 0, 0, 'true');");
																						$addFurni->execute();
																						$addroom = $dbh->prepare("UPDATE users SET home_room=".$getinfosala['id']." WHERE id=".$lastId);
																						$addroom->execute();
																					}
																				}
																			}
																		//User referrer//
																		if (!empty($_POST['referrer']))
																		{	
																			$getUserRef = $dbh->prepare("SELECT id,username FROM users WHERE username = :username LIMIT 1");
																			$getUserRef->bindParam(':username', $_POST['referrer']);
																			$getUserRef->execute();
																			$getInfoRefUser = $getUserRef->fetch();
																			$addRef = $dbh->prepare("
																			INSERT INTO
																			referrer
																			(userid, refid,diamonds)
																			VALUES
																			(
																			:lastid, 
																			:refid,
																			:diamonds
																			)");
																			$addRef->bindParam(':lastid', $lastId);
																			$addRef->bindParam(':refid', $getInfoRefUser['id']);
																			$addRef->bindParam(':diamonds', $config['diamondsRef']);
																			$addRef->execute();
																			$stmt = $dbh->prepare("SELECT*FROM referrerbank WHERE userid = :id LIMIT 1");
																			$stmt->bindParam(':id', $getInfoRefUser['id']);
																			$stmt->execute();
																			if ($stmt->RowCount() == 0)
																			{
																				$addDiamondsRow = $dbh->prepare("
																				INSERT INTO
																				referrerbank
																				(userid,diamonds)
																				VALUES
																				(
																				:lastid, 
																				:diamonds
																				)");
																				$addDiamondsRow->bindParam(':lastid', $getInfoRefUser['id']);
																				$addDiamondsRow->bindParam(':diamonds', $config['diamondsRef']);
																				$addDiamondsRow->execute();
																			}
																			else
																			{
																				$addDiamonds = $dbh->prepare("
																				UPDATE referrerbank SET 
																				diamonds=diamonds + :diamonds 
																				WHERE 
																				userid=:lastid
																				");
																				$addDiamonds->bindParam(':lastid', $getInfoRefUser['id']);
																				$addDiamonds->bindParam(':diamonds', $config['diamondsRef']);
																				$addDiamonds->execute(); 
																			}
																			$_SESSION['id'] = $lastId;
																		}
																		
																		else
																		{
																			$_SESSION['id'] = $lastId;
																		}
																	}
																	else
																	{
																		return html::error($lang["Rrobot"]); 
																	}
																}
															}
															else
															{
																return html::error($lang["Rmaxaccounts2"]); 
															}
														}
														else
														{
															return html::error($lang["Rpasswordswrong2"]);
														}
													}
													else
													{
														return html::error($lang["Rpasswordshort2"]); 
													}
												}
												else
												{
													return html::error($lang["Remailexists2"]);
												}
											}
											else
											{
												return html::error($lang["Rusernameused2"]);
											}
										}
										else
										{
											return html::error($lang["Remailnotallowed2"]);
										}
									}
									else
									{
										return html::error($lang["Remailempty2"]);
									}
								}
								else
								{
									return html::error($lang["Rpasswordsempty2"]); 
								}
							}
							else
							{
								return html::error($lang["Rpasswordsempty2"]); 
							}
						}
						else
						{
							return html::error($lang["Rusernameshort2"]);
						}
					}
					else
					{
						return html::error($lang["Rusrnameempty2"]);
					}
				}
				else
				{
					return html::error($lang["RregisterDisable2"]);
				}
			}
		}
	}
		public static function userRefClaim()
		{
			global $dbh, $lang;
			if (isset($_POST['claimdiamonds']))
			{
				if (User::userData('online') == 0)
				{
					$bankCount = $dbh->prepare("SELECT userid,diamonds FROM referrerbank WHERE userid = :userid");
					$bankCount->bindParam(':userid', $_SESSION['id']);
					$bankCount->execute();
					$bankCountData = $bankCount->fetch();
					if ($bankCountData['diamonds'] == 0)
					{
						return html::error($lang["MrefNoDia"]);
					}
					else
					{
						$addDiamondsRef = $dbh->prepare("
						UPDATE users SET 
						vip_points=vip_points + :diamonds 
						WHERE 
						id=:id
						");
						$addDiamondsRef->bindParam(':id', $_SESSION['id']);
						$addDiamondsRef->bindParam(':diamonds', $bankCountData['diamonds']);
						$addDiamondsRef->execute();
						$DiamondsCountRemove = $dbh->prepare("
						UPDATE referrerbank SET 
						diamonds = 0 
						WHERE 
						userid=:userid
						");
						$DiamondsCountRemove->bindParam(':userid', $_SESSION['id']);
						$DiamondsCountRemove->execute();
						return html::errorSucces($lang["MrefSucces"]);
					}	
				}
				else
				{
					return html::error($lang["MrefOnline"]);
				}
			}
		}
		public static function userRewardclain()
		{
			global $dbh, $lang;
			if (isset($_POST['clainrewards']))
			{
				if (User::userData('online') == 0)
				{
					$bankCount = $dbh->prepare("SELECT rewards FROM users WHERE id = :userid");
					$bankCount->bindParam(':userid', $_SESSION['id']);
					$bankCount->execute();
					$bankCountData = $bankCount->fetch();
						$addDiamondsRef = $dbh->prepare("
						UPDATE users SET 
						vip_points=vip_points + :rewards 
						WHERE 
						id=:id
						");
		echo '				
	<div id="notice">
	<i class="fa fa-trophy fa-3x" id="trophy-icon"></i>
	<span id="notice-title">'.$lang["Succes1"].'</span>
	<span id="notice-desc">
		'.$bankCountData['rewards'].' '.$lang["Succes2"].'
		</span>
</div>
						
						';
						$addDiamondsRef->bindParam(':id', $_SESSION['id']);
						$addDiamondsRef->bindParam(':rewards', $bankCountData['rewards']);
						$addDiamondsRef->execute();
						$DiamondsCountRemove = $dbh->prepare("
						UPDATE users SET 
						rewards = 0 
						WHERE 
						id=:userid
						");
						$DiamondsCountRemove->bindParam(':userid', $_SESSION['id']);
						$DiamondsCountRemove->execute();
						
				}
				else
				{
							return html::error($lang["MrefOnline"]);

				}
			}
		}
		Public static function editPassword()
		{
			global $dbh,$lang;
			if (isset($_POST['password']))
			{
				if (isset($_POST['oldpassword']) && !empty($_POST['oldpassword']))
				{
					if (isset($_POST['newpassword']) && !empty($_POST['newpassword']))
					{
						$stmt = $dbh->prepare("SELECT id, password, username FROM users WHERE id = :id");
						$stmt->bindParam(':id', $_SESSION['id']);
						$stmt->execute();
						$getInfo = $stmt->fetch();
						if (self::checkUser(filter($_POST['oldpassword']), $getInfo['password'], filter($getInfo['username'])))
						{
							if (strlen($_POST['newpassword']) >= 6)
							{
								$newPassword = self::hashed($_POST['newpassword']);
								$stmt = $dbh->prepare("
								UPDATE 
								users 
								SET password = 
								:newpassword 
								WHERE id = 
								:id
								");
								$stmt->bindParam(':newpassword', $newPassword); 
								$stmt->bindParam(':id', $_SESSION['id']); 
								$stmt->execute(); 
								return Html::errorSucces($lang["Ppasswordchanges"]);
							}
							else
							{
								return Html::error($lang["Ppasswordshort"]);
							}
						}
						else
						{
							return Html::error($lang["Poldpasswordwrong"]);
						}
					}
					else
					{
					return Html::error($lang["Ppasswordold"]);
					}
				}
				else
				{
						return Html::error($lang["Ppasswordnew"]);
				}
			}
		}
		Public static function editEmail()
		{
			global $lang,$dbh;
			if (isset($_POST['account']))
			{
				if (isset($_POST['email']) && !empty($_POST['email']))
				{
					if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
					{
						if (!self::emailTaken($_POST['email']))
						{
							$stmt = $dbh->prepare("
							UPDATE 
							users 
							SET mail = 
							:newmail
							WHERE id = 
							:id
							");
							$stmt->bindParam(':newmail', $_POST['email']); 
							$stmt->bindParam(':id', $_SESSION['id']); 
							$stmt->execute(); 
							return Html::errorSucces($lang["Eemailchanges"]);
						}
						else
						{
							return Html::error($lang["Eemailexists"]);
						}
					}
					else
					{
						return Html::error($lang["Eemailnotallowed"]);
					}
				}
				else
				{
					return Html::error($lang["Enoemail"]);
				}
			}
		}
		Public static function editHotelSettings()
		{
			global $lang,$dbh;
			if (isset($_POST['hinstellingenv']))
			{
				$stmt = $dbh->prepare("
				UPDATE 
				users 
				SET ignore_invites = 
				:hinstellingenv
				WHERE id = 
				:id
				");
				$stmt->bindParam(':hinstellingenv', $_POST['hinstellingenv']); 
				$stmt->bindParam(':id', $_SESSION['id']); 
				$stmt->execute(); 
			}
			if (isset($_POST['hinstellingenl']))
			{
				$stmt = $dbh->prepare("
				UPDATE 
				users 
				SET allow_mimic = 
				:hinstellingenl
				WHERE id = 
				:id
				");
				$stmt->bindParam(':hinstellingenl', $_POST['hinstellingenl']); 
				$stmt->bindParam(':id', $_SESSION['id']); 
				$stmt->execute(); 
			}
			if (isset($_POST['hinstellingeno']))
			{
				$stmt = $dbh->prepare("
				UPDATE 
				users 
				SET hide_online = 
				:hinstellingeno
				WHERE id = 
				:id
				");
				$stmt->bindParam(':hinstellingeno', $_POST['hinstellingeno']); 
				$stmt->bindParam(':id', $_SESSION['id']); 
				$stmt->execute(); 
			}
			if (isset($_POST['hotelsettings']))
			{
				return Html::errorSucces($lang["Hchanges"]);
			}
		}
		Public static function editUsername()
		{
			global $lang,$dbh;
			if (isset($_POST['editusername']))
			{
				if(!User::userData('fbenable') == 1)
				{
					if(!self::userTaken($_POST['username']))
					{
						if(self::validName($_POST['username']))
						{
							$stmt = $dbh->prepare("UPDATE users SET username = :username, fbenable = '1' WHERE id = :id");
							$stmt->bindParam(':username', $_POST['username']); 
							$stmt->bindParam(':id', $_SESSION['id']); 
							$stmt->execute(); 
							header('Location: '.$config['hotelUrl'].'/me');
						}
						else
						{
							return Html::error($lang["Cusernameshort"]);
						}
					}
					else
					{
						return html::error($lang["Cusernameused"]);
					}
				}
				else
				{
					return html::error($lang["Cchangeno"]);
				}
			}
		}
	}
?>																																	