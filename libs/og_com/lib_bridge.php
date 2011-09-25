<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	class Bridge
	{
		function platform_route($l_bridge_name, $platform_name)
		{
			header("location:../".$l_bridge_name."/".$platform_name."");
		}
		function omod_route($omod_name, $trace = false)
		{
			if($trace == true)
			{
				$_SESSION['trace'] = "OG_TRACE";
			}
			header("location:".ROOT_PATH."libs/og_com/omod_index.php?type=" . $omod_name);
		}
		function omod_load($omodName)
		{
			$values = $this->UrlGetContentsCurl(ROOT_PATH . "libs/og_com/omod_index.php?type=" . $omodName);
			$value = explode("::", $values);

			
			$countValue = count($value);
			unset($value[$countValue]);
			
			var_dump($value);
			
			print($array);
		}
			function UrlGetContentsCurl(){ 
			  // parse the argument passed and set default values 
			  $arg_names    = array('url', 'timeout', 'getContent', 'offset', 'maxLen'); 
			  $arg_passed   = func_get_args(); 
			  $arg_nb       = count($arg_passed); 
			  if (!$arg_nb){ 
				echo 'At least one argument is needed for this function'; 
				return false; 
			  } 
			  $arg = array ( 
				'url'       => null, 
				'timeout'   => ini_get('max_execution_time'), 
				'getContent'=> true, 
				'offset'    => 0, 
				'maxLen'    => null 
			  ); 
			  foreach ($arg_passed as $k=>$v){ 
				$arg[$arg_names[$k]] = $v; 
			  } 

			  // CURL connection and result 
			  $ch = curl_init($arg['url']); 
			  curl_setopt($ch, CURLOPT_HEADER, 0); 
			  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
			  curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)"); 
			  curl_setopt($ch, CURLOPT_RESUME_FROM, $arg['offset']); 
			  curl_setopt($ch, CURLOPT_TIMEOUT, $arg['timeout']); 
			  $result  = curl_exec($ch); 
			  $elapsed = curl_getinfo ($ch, CURLINFO_TOTAL_TIME);   
			  $CurlErr = curl_error($ch); 
			  curl_close($ch); 
			  if ($CurlErr) { 
				echo $CurlErr; 
				return false; 
			  }elseif ($arg['getContent']){ 
				return $arg['maxLen'] 
				  ? substr($result, 0, $arg['maxLen']) 
				  : $result; 
			  } 
			  return $elapsed; 
			}  
		function _global($type)
		{
			$obj = new $type();
			return $obj;
		}
	}
	
?>