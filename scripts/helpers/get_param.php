<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	function param($number)
	{
		$number = $number + 2;
		$request = $_SERVER['REQUEST_URI'];
		$filename = $_SERVER['SCRIPT_NAME'];
		$request = substr($request, strrpos($filename, '/') + 1);
		
		while(substr($request, -1) == '/')
			$request = substr($request, 0, -1);
			$request = explode('/', $request);
			
		foreach($request as $key => $value)
		
		if($value == '')
			array_splice($request, $key, 1);
		
		if (isset($request[$number]))
		{
			return $request[$number];
		}
	}

?>