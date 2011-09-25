<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Encode
	{
		function simpleEncode($string, $pKey)
		{
			
		}
		function simpleDecode($string, $pKey)
		{
		
		}
		function str_rot($string, $int = 13)
		{
			$s = $string;
			$n = $int;
                        
			$n = (int)$n % 26;
			if (!$n) return $s;
			for ($i = 0, $l = strlen($s); $i < $l; $i++)
			{
				$c = ord($s[$i]);
				if ($c >= 97 && $c <= 122)
				{
					$s[$i] = chr(($c - 71 + $n) % 26 + 97);
				}
				else if ($c >= 65 && $c <= 90)
				{
					$s[$i] = chr(($c - 39 + $n) % 26 + 65);
				}
			}
			return $s; 
		}
		function base64Clean($base64String)
		{
			$base64String = str_replace("=", "", $base64String);
			
			return $base64String;
		}
	}
	
?>