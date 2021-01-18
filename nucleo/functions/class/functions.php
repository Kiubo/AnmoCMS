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
		Functions list functions.
		--------------- 
		filter();
		loggedIn();
		userIp();
	*/
	// Filter data
	function filter($data) 
	{
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	}
	function filterInpute($data) 
	{
		$filter = new Filter();
		$allowed_protocols = array('', '', 'mailto');
		$allowed_tags = array('a', 'i', 'b', 'em', 'span', 'strong', 'ul', 'ol', 'li', 'table', 'tr', 'td', 'thead', 'th', 'tbody');
		$filter->addAllowedProtocols($allowed_protocols);
		$filter->addAllowedTags($allowed_tags);
		$filtered_string = $filter->xss($data);
	}
	// Check if user is logged in
	function loggedIn()
	{
		if (isset($_SESSION['id']))
		{
			return true;
		}
		else
		{
			return false;
		}		
	}
	// Check user real IP
	function userIp()
	{
		$ipaddress = '';
		if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
			$_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
		}
		return $_SERVER['REMOTE_ADDR'];
	}
?>