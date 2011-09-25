<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	$lib_db_ex = TRUE;
	
	class Omod
	{
		function _global($type)
		{
			$obj = new $type();
			return $obj;
		}
		function route($bridge_name, $platform_name)
		{
			header("location:../../index.php/".$bridge_name."/".$platform_name);
		}
	}
	
	class Assign
	{
		function value($assignName, $dataValues)
		{
			$storedValues[$assignName] = $dataValues . "::";
			
			$value = implode("", $storedValues);
			echo $value;
		}
	}
	
	class Connection
	{
		var $auto_connect;

		function connection($auto="off")
		{
			if($auto=="off")
			{
				//NO AUTO CONTROLS
			}
			else if($auto=="auto")
			{
				include("../../config/start/database.php");
				
				$this->auto_connect = new mysqli($database_host, $database_user, $database_pass, $database_name);
			}
		}
		function grab_conn()
		{
			return $this->auto_connect;
		}
		
		var $db_linkup;
		
		function connect($db_host, $db_user, $db_pass, $database)
		{
			$this->db_linkup = new mysqli($db_host, $db_user, $db_pass, $database);
			return $this->db_linkup;
		}
	}
	
	class Table
	{
		var $currentTableName;
		var $mappings;
		var $connection;
		
		function table($tableName)
		{
			$this->currentTableName = $tableName;
		}
		function getTableName()
		{
			return $this->currentTableName;
		}
		function soleDataConnection()
		{
			$conn = new Connection("auto");
			$this->connection = $conn->grab_conn();
			
			return $this->connection;
		}
		function getMapping($data_connection)
		{
			include("../../config/start/database.php");
			
			$query = "SHOW TABLES FROM " . $database_name;
			$og_res = mysqli_query($data_connection, $query);

			while ($row = mysqli_fetch_row($og_res))
			{
				$allTables .= $row[0] . "::";
			}
			
			$allTables = substr($allTables, 0, -2);
			$this->mappings = $allTables;
			
			return $this->mappings;
		}
		function buildTable($limit, $fields, $direction = "desc")
		{
			$build = new Build();
			
			$baseQuery = "SELECT " . $fields . " FROM " . $this->getTableName();
			$query = array(
				"table" => $this->getTableName(),
				"fields" => "'" . $fields . "'"
			);
			
			$result = $build->select($this->soleDataConnection(), $query);
			
			return $result;
		}
	}
	
	class Build
	{
		function insert($data_connection, $db_details, $end_status="open")
		{
			$og_sql="INSERT INTO ".$db_details['table']." (".$db_details['fields'].") VALUES (".$db_details['values'].")";
			$og_res=mysqli_query($data_connection, $og_sql);
			
			if($end_status=="close")
			{
				mysqli_close($data_connection);
			}
			
			return $og_res;
		}
		function select($data_connection, $db_details, $end_status="open")
		{
			if($db_details['fields']=="SELECT_ALL")
			{
				$db_details['fields']="*";
			}
			
			if($db_details['where']=="")
			{
				$og_sql="SELECT ".$db_details['fields']." FROM ".$db_details['table']."";
				$og_res = mysqli_query($data_connection, $og_sql);
			}
			else
			{
				$og_sql="SELECT ".$db_details['fields']." FROM ".$db_details['table']." WHERE ".$db_details['where'];
				$og_res = mysqli_query($data_connection, $og_sql);
			}

			if($end_status=="close")
			{
				mysqli_close($data_connection);
			}
			
			return $og_res;
		}
		function update($data_connection, $db_details, $end_status="open")
		{
			$og_sql="UPDATE ".$db_details['table']." SET ".$db_details['set']." WHERE ".$db_details['where'];
			$og_res=mysqli_query($data_connection, $og_sql);
			
			if($end_status=="close")
			{
				mysqli_close($data_connection);
			}
			
			return $og_res;
		}
		function delete($data_connection, $db_details, $end_status="open")
		{
			if ($db_details['where']=="")
			{
				$og_sql="DELETE ".$db_details['fields']. " FROM ".$db_details['table'];
				$og_res=mysqli_query($data_connection, $og_sql);
			}
			else
			{
				$og_sql="DELETE ".$db_details['fields']." FROM ".$db_details['table']." WHERE ".$db_details['where'];
				$og_res = mysqli_query($data_connection, $og_sql);
			}
			
			if($end_status=="close")
			{
				mysqli_close($data_connection);
			}

			return $og_res;
		}
		function secure($str, $additions="")
		{		
			$len=strlen($str); 
			$escapeCount=0; 
			$secure=''; 
			
			for($offset=0;$offset<$len;$offset++)
			{
				switch($c=$str{$offset})
				{
					case "'":  
							if($escapeCount % 2 == 0) $secure.="\\"; 
							$escapeCount=0; 
							$secure.=$c; 
							break; 
					case '"': 
							if($escapeCount % 2 == 0) $secure.="\\"; 
							$escapeCount=0; 
							$secure.=$c; 
							break; 
					case '\\': 
							$escapeCount++; 
							$secure.=$c; 
							break; 
					default: 
							$escapeCount=0; 
							$secure.=$c; 
				} 
			}
				
			if($additions=="no-HTML")
			{
				$secure = str_replace("<", "&lt;", $secure);
				$secure = str_replace(">", "&gt;", $secure);
			}
	
				return $secure; 
		}
	}
	
?>