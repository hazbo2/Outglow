<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Secure
	{
		function script($trace = false)
		{
			if(strpos($_SERVER['REQUEST_URI'], 'omodules') == TRUE)
			{
				header("location:../../public/error/404.html");
			}
			if($trace == true)
			{
				if($_SESSION['trace'] == "OG_TRACE" OR $_GET['trace'] == "_OJAX")
				{
					$_SESSION['trace'] = "";
				}
				else
				{
					header("location:../../public/error/404.html");
				}
				
				if($_GET['trace'] == "_OJAX" AND strpos($_SERVER['REQUEST_URI'], 'omodules') == TRUE)
				{
					header("location:../../public/error/404.html");
				}
			}
		}
	}

	$secure = new Secure();

?>