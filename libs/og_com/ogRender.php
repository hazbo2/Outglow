<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Render
	{
		function TEXT($text_to_render)
		{
			echo $text_to_render;
		}
		function IMAGE($image_to_render, $image_alt="")
		{
			echo "<img src='".ROOT_PATH."public/application_files/images/".$image_to_render."' alt='".$image_alt."' />";
		}
		function PLATFORM_NAME()
		{
			$request = $_SERVER['REQUEST_URI'];
			$filename = $_SERVER['SCRIPT_NAME'];
			$request = substr($request, strrpos($filename, '/') + 1);

			while(substr($request, -1) == '/')
				$request = substr($request, 0, -1);
				$request = explode('/', $request);
			
			foreach($request as $key => $value)
				if($value == '')
					array_splice($request, $key, 1);
				
			
			$platform = $request[2];
			
			return $platform;
		}
		function DYNAMIC_LAYOUT_VIEW($bridge_name)
		{
			return "app/views/layouts/".$bridge_name.".html.php";
		}
		function DYNAMIC_PLATFORM_VIEW($bridge_name)
		{
			return "app/views/".$bridge_name."_views/".Render::PLATFORM_NAME().".html.php";
		}
		function OPEN_DFORM($form_name, $form_action, $form_method, $callback = "", $form_id = false)
		{
			$form_action = "../../libs/og_com/omod_index.php?type=". $form_action;
			
			if($id === TRUE)
			{
				$new_form = "<form name='" . $form_name . "' action='" . $form_action . "' method='" . $form_method . "' id='" . $form_id . "'>";
			}
			else
			{
				$new_form = "<form name='" . $form_name . "' action='" . $form_action . "' method='" . $form_method . "'>";
			}
			
			echo $new_form;
			
			return true;
		}
		function CLOSE_DFORM($form_name)
		{
			echo "</form>";
			
			return true;
		}
	}
	
?>