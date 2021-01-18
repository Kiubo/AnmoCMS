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
		Functions list Class Admin.
		--------------- 
		error();
		gelukt();
		CheckRank();
		staffpin();
		staffCheck();
		UpdateUser();
		UpdateUserOfTheWeek();
		UpdateNews();
		searchUser();
		searchRank();
		searchUserOfTheWeek();
		EditUser();
		EditUserOfTheWeek();
		EditNews();
		LookSollie();
		DeleteNews();
		DeleteSollie();
		DeleteBans();
		PostNews();
		PostCampaings();
		EditCats();
		UpdateCats();
	*/
	Class Admin
	{
		public static function error($errorName)
		{
			echo "<div class=\"alert alert-block alert-danger \"><strong>" . $errorName . "</div>";
		}
		public static function succeed($errorName)
		{
			echo "<div class=\"alert alert-block alert-success \"><strong>" . $errorName . "</div>";
		}
	
		public static function CheckRank($rank)
		{
			global $config;
			{
				if (User::userData('rank') <= $rank)
				{
					header('Location: '.$config['hotelUrl'].'/index');	
					exit();
				}
			}
		}
		public static function UpdateUser()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$upateUser = $dbh->prepare("UPDATE users SET 
				motto=:motto,
				username=:name,
				mail=:mail,
				credits=:credits,
				vip_points=:vip_points,
				activity_points=:activity_points
				WHERE username = :name");
				$upateUser->bindParam(':motto', $_POST['motto']); 
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->bindParam(':mail', $_POST['mail']); 
				$upateUser->bindParam(':credits', $_POST['credits']); 
				$upateUser->bindParam(':vip_points', $_POST['vip_points']); 
				$upateUser->bindParam(':activity_points', $_POST['activity_points']); 
				$upateUser->execute(); 
				Admin::succeed("Usuario guardado correctamente");
			}	
		}
		public static function LookSollie()
		{
			global $dbh, $lang;
			if (isset($_POST['updaterank'])) 
			{
				if($_POST['rank'] > User::userData('rank'))
				{
					Admin::error("".$lang["HkError3"]."");
				}
				else
				{
				$upateUser = $dbh->prepare("UPDATE users SET 
				username=:name,
				pin=:pin,
				rank=:rank,
				hide_staff=:hide_staff
				WHERE username = :name");
				$upateUser->bindParam(':name', $_POST['naam']); 
				$upateUser->bindParam(':pin', $_POST['pin']); 
				$upateUser->bindParam(':rank', $_POST['rank']); 
				$upateUser->bindParam(':hide_staff', $_POST['hide_staff']); 
				$upateUser->execute(); 
				Admin::succeed("".$lang["HkError4"]."");
				}
			}	
		}
			public static function userreward()
		{
			global $dbh, $lang;
			if (isset($_POST['rewardrefresh']))
			{
						$addDiamondsRef = $dbh->prepare("UPDATE users SET rewards= :reward");
						$addDiamondsRef->bindParam(':reward', $_POST['pointsreward']);
						$addDiamondsRef->execute();
						Admin::succeed("".$lang["HkError5"]."");
						

			}
		}
			public static function userrewardempty()
		{
			global $dbh, $lang;
			if (isset($_POST['rewardrefreshempty']))
			{
						$addDiamondsRef = $dbh->prepare("UPDATE users SET rewards=0 WHERE id>0");
						$addDiamondsRef->execute();
						Admin::succeed("".$lang["HkError6"]."");
						

			}
		}
		public static function UpdateUserOfTheWeek()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$getUserData = $dbh->prepare("SELECT id,username FROM users WHERE username = :name");
				$getUserData->bindParam(':name', $_POST['naam']); 
				$getUserData->execute(); 
				$upateUser2 = $getUserData->fetch();
				if ($upateUser = $dbh->prepare("UPDATE uotw SET userid=:userdata,text=:txt"))
				{
					$upateUser->bindParam(':userdata', $upateUser2['id']); 
					$upateUser->bindParam(':txt', $_POST['uftwtext']); 
					$upateUser->execute();
					Admin::succeed("El usuario esta colocado correctamente");
				}
				else 
				{
					Admin::error("".$lang["HkError8"] ."");
				}  
			}
		}
		public static function UpdateNews()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$editNews = $dbh->prepare("UPDATE nutella_news SET 
				id=:id,
				title=:title,
				shortstory=:shortstory,
				longstory=:longstory,
				image=:topstory
				WHERE id = :id");
				$editNews->bindParam(':title', $_POST['title']);
				$editNews->bindParam(':shortstory', $_POST['shortstory']);
				$editNews->bindParam(':topstory', $_POST['topstory']);
				$editNews->bindParam(':longstory', $_POST['longstory']);
				$editNews->bindParam(':id', $_POST['id']);
				$editNews->execute();
				Admin::succeed("".$lang["HkError9"]."");
			}
		}
		public static function UpdateCampaings()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$editNews = $dbh->prepare("UPDATE nutella_noticiones SET 
				id=:id,
				titulo=:title,
				descripcion=:shortstory,
				imagen=:topstory
				link=:longstory,
				WHERE id = :id");
				$editNews->bindParam(':title', $_POST['title']);
				$editNews->bindParam(':shortstory', $_POST['shortstory']);
				$editNews->bindParam(':topstory', $_POST['topstory']);
				$editNews->bindParam(':link', $_POST['longstory']);
				$editNews->execute();
				Admin::succeed("".$lang["HkError9"]."");
			}
		}
		public static function searchUser()
		{
			global $dbh,$config,$lang;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed('Usuario '.$_POST['user'].' Encontrado, <a href ="'.$config['hotelUrl'].'/nutacp/user/edit/'.$_POST['user'].'">Clic aqui</a> para editar cuenta');
				}
				else
				{
					Admin::error("Usuario ".$_POST['user']." no encontrado");
				}
			}
		}
		public static function searchRank()
		{
			global $dbh,$config,$lang;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed('Usuario '.$_POST['user'].' Encontrado, <a href ="'.$config['hotelUrl'].'/nutacp/user/rank/'.$_POST['user'].'">Clic aqui</a> para editar rango del usuario');
				}
				else
				{
					Admin::error("Usuario ".$_POST['user']." no encontrado");
				}
			}
		}
	
		public static function searchUserOfTheWeek()
		{
			global $dbh,$config,$lang;
			if(isset($_POST['zoek'])) {	
				$searchUser = $dbh->prepare("SELECT * FROM users WHERE username = :user");
				$searchUser->bindParam(':user', $_POST['user']); 
				$searchUser->execute();
				if ($searchUser->RowCount() == 1)
				{
					Admin::succeed('Usuario <b>'.$_POST['user'].'</b> Encontrado, <a href ="'.$config['hotelUrl'].'/nutacp/user/week/'.$_POST['user'].'">Clic aqui</a> para editar cuenta');
				}
				else
				{
					Admin::error("Usuario ".$_POST['user']." Usuario no encontrado");
				}
			}
		}
		public static function EditUser($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("".$lang["HkError10"] ." ".$lang["HkError11"].""); exit;
				}
			}
		}
		public static function EditUserOfTheWeek($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['user'])) {
				$getUser = $dbh->prepare("SELECT * FROM users WHERE username=:username LIMIT 1");
				$getUser->bindParam(':username', $_GET['user']);
				$getUser->execute();
				if ($getUser->RowCount() == 1) 
				{
					$user = $getUser->fetch();
					return filter($user[$variable]);
				} 
				else 
				{
					Admin::error("".$lang["HkError10"] ." ".$lang["HkError11"].""); exit;
				}
			}
		}
		public static function EditNews($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM nutella_news WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("".$lang["HkError17"].""); exit;
				}
			}
		}
		public static function EditCampaings($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM nutella_noticiones WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("".$lang["HkError17"].""); exit;
				}
			}
		}
		public static function DeleteNews()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteNews = $dbh->prepare("DELETE FROM nutella_news WHERE id=:newsid");
				$deleteNews->bindParam(':newsid', $_GET['delete']);
				$deleteNews->execute();
				Admin::succeed(''.$lang["HkError18"].'');
			}
		}
		public static function DeleteCampaings()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteNews = $dbh->prepare("DELETE FROM nutella_noticiones WHERE id=:newsid");
				$deleteNews->bindParam(':newsid', $_GET['delete']);
				$deleteNews->execute();
				Admin::succeed(''.$lang["HkError18"].'');
			}
		}
		public static function DeleteBans()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM bans WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed(''.$lang["HkError19"].'');
			}
		}
		public static function DeleteReport()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM cms_report WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed(''.$lang["HkError20"].'');
			}
		}
		public static function DelectBadge()
		{
			global $dbh, $lang;
			if(isset($_GET['delete'])) 
			{ 
				$deleteBan = $dbh->prepare("DELETE FROM cms_badges WHERE id=:newsid");
				$deleteBan->bindParam(':newsid', $_GET['delete']);
				$deleteBan->execute();
				Admin::succeed(''.$lang["HkError21"].'');
			}
		}
		public static function PostNews()
		{
			global $dbh, $lang;
			if (isset($_POST['postnews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['news'] = $_POST['news'];
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['news']))
					{
						$postNews = $dbh->prepare("
						INSERT INTO nutella_news(title,image,shortstory,longstory,author,date,type,roomid,updated)
						VALUES
						(
						:title,
						:topstory, 
						:slogan,
						:news,
						:id,
						'" . time() . "',
						'1',
						'1',
						'1'
						)");
						$postNews->bindParam(':title', $_POST['title']);
						$postNews->bindParam(':slogan', $_POST['slogan']);
						$postNews->bindParam(':topstory', $_POST['topstory']);
						$postNews->bindParam(':news', $_POST['news']);
						$postNews->bindParam(':id', $_SESSION['id']);
						$postNews->execute();
						$_SESSION['title'] = '';
						$_SESSION['kort'] = '';
						$_SESSION['news'] ='';
						Admin::succeed("".$lang["HkError22"]."");
					}
					else
					{
						Admin::error("".$lang["HkError23"]."");
						return;
					}
				}
				else
				{
					Admin::error("".$lang["HkError24"]."");
					return;
				}
			}
			else
			{
			}
		}
				public static function PostCampaings()
		{
			global $dbh, $lang;
			if (isset($_POST['postnews']))
			{
				$_SESSION['title'] = $_POST['title'];
				$_SESSION['news'] = $_POST['news'];
				if (!empty($_POST['title']))
				{
					if (!empty($_POST['news']))
					{
						$postNews = $dbh->prepare("
						INSERT INTO nutella_noticiones(titulo,descripcion,imagen,link)
						VALUES
						(
						:title, 
						:news,
						:topstory,
						:link
						)");
						$postNews->bindParam(':title', $_POST['title']);
						$postNews->bindParam(':news', $_POST['news']);
						$postNews->bindParam(':topstory', $_POST['topstory']);
						$postNews->bindParam(':link', $_POST['link']);
						$postNews->execute();
						$_SESSION['title'] = '';
						$_SESSION['kort'] = '';
						$_SESSION['news'] ='';
						Admin::succeed("".$lang["HkError22"]."");
					}
					else
					{
						Admin::error("".$lang["HkError23"]."");
						return;
					}
				}
				else
				{
					Admin::error("".$lang["HkError24"]."");
					return;
				}
			}
			else
			{
			}
		}
		public static function EditCats($variable)
		{
			global $dbh, $lang;
			if (isset($_GET['news'])) 
			{
				$getNews = $dbh->prepare("SELECT * FROM nutella_cate WHERE id=:newsid LIMIT 1");
				$getNews->bindParam(':newsid', $_GET['news']);
				$getNews->execute();
				if ($getNews->RowCount() == 1) 
				{
					$news = $getNews->fetch();
					return $news[$variable];
				} 
				else 
				{
					Admin::error("".$lang["HkError17"].""); exit;
				}
			}
		}
		public static function UpdateCats()
		{
			global $dbh, $lang;
			if (isset($_POST['update'])) 
			{
				$editNews = $dbh->prepare("UPDATE nutella_cate SET 
				id=:id,
				name=:name,
				desc=:desc,
				icon=:icon
				WHERE id = :id");
				$editNews->bindParam(':name', $_POST['name']);
				$editNews->bindParam(':desc', $_POST['desc']);
				$editNews->bindParam(':icon', $_POST['icon']);
				$editNews->bindParam(':id', $_POST['id']);
				$editNews->execute();
				Admin::succeed("".$lang["HkError9"]."");
			}
		}
	}
?>							