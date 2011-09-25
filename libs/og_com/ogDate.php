<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Date
	{
		function now()
		{
			$date = date("Y-m-d H:i:s");
			return $date;
		}
		function rank($int)
		{
			$rank = $int;
			$last = substr( $rank, -1 );
			$seclast = substr( $rank, -2, -1 );
			
			if( $last > 3 || $last == 0 ) $ext = 'th';
			else if( $last == 3 ) $ext = 'rd';
			else if( $last == 2 ) $ext = 'nd';
			else $ext = 'st'; 

			if( $last == 1 && $seclast == 1) $ext = 'th';
			if( $last == 2 && $seclast == 1) $ext = 'th';
			if( $last == 3 && $seclast == 1) $ext = 'th'; 

			return $rank.$ext;
		}
	}
	
?>