<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	function lib_ext($dir_loc, $name)
	{
		return "libs/".$dir_loc."/".$name.".php";
	}
	function route($route_path)
	{
		header("location:../../".$route_path."");
	}
	
?>