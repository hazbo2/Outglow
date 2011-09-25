<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	#ENGINE FILES
		include("v30_pdh.php");
		
	#INCLUDE EXTENSIONS HERE
		
			#---OG_COM
				include(lib_ext("og_com", "lib_bridge"));	//IMPORTANT
				include(lib_ext("og_com", "ogCompress"));
				include(lib_ext("og_com", "ogDate"));
				include(lib_ext("og_com", "ogDebug"));
				include(lib_ext("og_com", "ogEncode"));
				include(lib_ext("og_com", "ogFile"));
				include(lib_ext("og_com", "ogLoad"));		//IMPORTANT
				include(lib_ext("og_com", "ogRender"));		//IMPORTANT
				

			#CREATE OBJECTS
				$bridge = new Bridge();
				$compress = new Compress();
				$date = new Date();
				$debug = new Debug();
				$encode = new Encode();
				$file = new File();
				$load = new Load();
				$render = new Render();
			
	#END OF EXTENSIONS
	
	if(isset($lib_db_ex) && $lib_db_ex === TRUE)
	{
		require_once("database.php");
	}
	
?>