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
	function wordFilter($message)
	{
		global $dbh,$config;
		if ($config['newsCommandFilter'] == true)
		{
			$getCharacterFilter = $dbh->prepare("SELECT * FROM wordfilter_characters");
			$getCharacterFilter->execute();
			while($filtergetCharacter = $getCharacterFilter->fetch())
			{
				$message = str_ireplace($filtergetCharacter['character'], $filtergetCharacter['replacement'], $message);
				$getwordFilter = $dbh->prepare("SELECT * FROM wordfilter");
				$getwordFilter->execute();
				while($getFilter = $getwordFilter->fetch())
				{
					$message = str_ireplace($getFilter['word'], $getFilter['replacement'], $message);
				}
			}
			return $message;
		}
		else
		{
			return $message;
		}
	}
?>