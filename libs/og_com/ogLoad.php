<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Load
	{
		function css($fileName)
		{
			echo "<link rel='stylesheet' type='text/css' href='".ROOT_PATH."public/application_files/CSS/" . $fileName . ".css' />";
		}
		function js($fileName)
		{
			echo "<script type='text/javascript' src='".ROOT_PATH."public/application_files/JS/" . $fileName . ".js'></script>";
		}
	}
	
?>