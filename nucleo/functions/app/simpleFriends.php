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
	function friendList()
	{
		global $dbh,$config;
		//INFORMATIE VAN TYPE 1
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '1' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $_SESSION['id']);
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online'>online</span>";
			}else{
			$friend_online = "<span class='friend_online'>offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_1" style="padding: 10px;">
			Je hebt nog geen vrienden hier!
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Maak meer vrienden in deze categorie :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "Je hebt <b>" . $infoRelationsNum . "</b> vrienden in deze categroei";
			}
			echo '
			<div class="friend_1"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="background: url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
		//INFORMATIE VAN TYPE 2
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '2' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $_SESSION['id']);
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online'>online</span>";
			}else{
			$friend_online = "<span class='friend_online'>offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_2" style="padding: 10px;">
			Je hebt nog geen vrienden hier!
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Maak meer vrienden in deze categorie :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "Je hebt <b>" . $infoRelationsNum . "</b> vrienden in deze categorie";
			}
			echo '
			<div class="friend_2"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="background: url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
		//INFORMATIE VAN TYPE 3
		$getRelations1 = $dbh->prepare("SELECT * FROM user_relationships WHERE user_id = :id AND type = '3' ORDER BY RAND()");
		$getRelations1->bindParam(':id', $_SESSION['id']);
		$getRelations1->execute();
		$infoRelations1 = $getRelations1->fetch();
		$infoRelationsNum = $getRelations1->rowCount();
		$getUser = $dbh->prepare("SELECT id,username,look,online FROM users WHERE id = :targetId");
		$getUser->bindParam(':targetId', $infoRelations1['target']);
		$getUser->execute();
		$infoFriends = $getUser->fetch();
		if($infoFriends['online'] == '1'){
			$friend_online = "<span class='friend_online'>online</span>";
			}else{
			$friend_online = "<span class='friend_online'>offline</span>";
		}
		if($infoRelationsNum == '0'){
			echo '
			<div class="friend_3" style="padding: 10px;">
			Je hebt nog geen vrienden hier!
			</div>
			';
			}else{
			if($infoRelationsNum == '1'){
				$infoNumtext = "Maak meer vrienden in deze categorie :)";
				}else{
				$infoRelationsNum = $infoRelationsNum - 1;
				$infoNumtext = "Je hebt <b>" . $infoRelationsNum . "</b> vrienden in deze categorie";
			}
			echo '
			<div class="friend_3"">
			<table>
			<tr>
			<td>
			<div class="circle_friend">
			<div class="friend_head" style="background: url('.$config['HabboImg'].'/habbo-imaging/avatarimage?figure='. filter($infoFriends['look']) .'&head_direction=2&action=wav&headonly=1)">
			</div>
			</div>
			</td>
			<td>
			</td>
			<td>
			'. $infoFriends['username'] .'
			</td>
			<td style="width: 100%;">
			'.  $friend_online .'
			</td>
			</tr>
			</table>
			<div class="numRows_friend">
			'. $infoNumtext .'
			</div>
			</div>
			';
		}
	}
?>		