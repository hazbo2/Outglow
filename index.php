<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	session_start();

	require("config/start/engine.php");
	require("config/start/settings.php");

	$request = $_SERVER['REQUEST_URI'];
	$filename = $_SERVER['SCRIPT_NAME'];
	$request = substr($request, strrpos($filename, '/') + 1);

	while(substr($request, -1) == '/')

		$request = substr($request, 0, -1);
		$request = explode('/', $request);

	foreach($request as $key => $value)

	if($value == '')
  
		array_splice($request, $key, 1);
	$plat_ref = $request[2];
	$brid_ref = $request[1];
	$page_ref = $request[0];
	
	if($brid_ref == "app")
	{
		header("location:../../public/error/404.html");
	}
	if($plat_ref == "bridges" or $plat_ref == "bridges/")
	{
		header("location:../../public/error/404.html");
	}
	
	include("scripts/helpers/index.php");
	
	if(DEVELOPMENT_MODE == "on")
	{
		
	}

	if (!isset($request[1]) AND (!isset($route)))
	{
		header("location:public/welcome.php");
			
	}
	else if (!isset($request[1]) AND (isset($route)))
	{
		header("location:index.php/".$route."/index");

	} else
	{
		if(file_exists("app/bridges/".$brid_ref.".php"))
		{
			include("app/bridges/".$brid_ref.".php");
		} else
		{
			if(strpos($_SERVER['PHP_SELF'], "index.php/index.php") == TRUE)
			{
				header("location:../../../");
			}
		}
		
	}
	
	$build_bridge = $plat_ref;
	$m_class = $brid_ref;
	$_render = new $m_class;
	
	if ($build_bridge == "")
	{
		if(method_exists($brid_ref, 'index'))
		{
			$_render->index();
		
		}
		else 
		{
			header("location:../../public/error/404.html");
		}
	
	}
	else
	{
		if(method_exists($brid_ref, $plat_ref))
		{
			$_render->$build_bridge();
		}
		else
		{
			header("location:../../public/error/404.html");
		}
	
	}
	
?>
