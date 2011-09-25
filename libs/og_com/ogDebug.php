<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Debug
	{
		function execTime()
		{
			$time_start = microtime(true);
			$time_end = microtime(true);
			$time = $time_end - $time_start;
			
			return $time;			
		}
	}
?>