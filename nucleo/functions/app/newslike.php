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
	function newsLike()
	{
		global $dbh,$lang;
		if (isset($_POST['likenews']))
		{
			
			$newsLikeUser = $dbh->prepare("SELECT userid, newsid FROM nutella_news_like WHERE userid = :id AND newsid = :newsid");
			$newsLikeUser->bindParam(':id', $_SESSION['id']);
			$newsLikeUser->bindParam(':newsid', $_GET['id']);
			$newsLikeUser->execute();
			$newsLike = $newsLikeUser->fetch();
			if($newsLike['userid'] == $_SESSION['id'] && $newsLike['newsid'] == $_GET['id']) {
				return html::error($lang["LoneTime"]);
			} 
			else 
			{
				$sql = $dbh->prepare("SELECT id,title,longstory FROM nutella_news WHERE id = :id");
				$sql->bindParam(':id', $_GET['id']);
				$sql->execute();
				if (!$sql->RowCount() == 0)
				{
					$sql = $dbh->prepare("
					INSERT INTO
					nutella_news_like
					(userid, newsid)
					VALUES
					(
					:userid, 
					:id 
					)
					");
					$sql->bindParam(':id', $_GET['id']);
					$sql->bindParam(':userid', $_SESSION['id']);
					$sql->execute();
					return html::errorSucces($lang["LnewsLike"]);
				}
				else{
					return html::error($lang["LnoNews"]);
				}
			}
		}
	}
	function newsLikeCount()
	{
		global $dbh;
		$sql = $dbh->prepare("SELECT newsid FROM nutella_news_like WHERE newsid = :id");
		$sql->bindParam(':id', $_GET['id']);
		$sql->execute();
		return filter($sql->RowCount());
	}
?>