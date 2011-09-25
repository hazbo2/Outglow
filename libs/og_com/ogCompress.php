<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Compress
	{
		function compressData($data)
		{
			if ($data)
			{
				$out=addslashes(gzcompress(serialize($data),9));
			}
			else
			{
				$out=FALSE;
			}

			return $out;
		}
		function decompressData($data)
		{
			if ($data)
			{
				$out=unserialize(gzuncompress(stripslashes($data)));
			}
			 else
			{
				$out=FALSE;
			}

			return $out;
		}
	}
	
?>