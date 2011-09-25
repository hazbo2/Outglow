<?php

/*
	Outglow - Miranda
	
	Developer		:		Harry Lawrence
	Type			:		Skeleton(STABLE)
	Released		:		15/06/2011
	Code License	:		OpenSource - GNU GPL v3
*/

	session_start();
	
	if(!isset($_GET['type']))
	{
		header("location:../../public/error/404.html");
	}
	
	if(!file_exists("../../app/omodules/".$_GET['type']))
	{
		header("location:../../public/error/404.html");
	}
	
	include("omod.php");
	
	$omod = new Omod();
	$assign = new Assign();
	$connection = new Connection("auto");
	$build = new Build();
	
	$table = new Table("__NULL_OG_MAPPER_SET");
	$map = $table->getMapping($connection->grab_conn());
	
	$listTables = explode("::", $map);
	$tableCount = count($listTables);
	
	for($i=0;$i<$tableCount;$i++)
	{
		$$listTables[$i] = new Table($listTables[$i]);
	}
	
	$dataFile = $_GET['type'];
	
	function select($details)
	{
		$conn = new Connection("auto");
		$query = new Build();
		$result = $query->select($conn->grab_conn(), $details, "close");
		
		return $result;
	}
	function insert($details)
	{
		$conn = new Connection("auto");
		$query = new Build();
		$result = $query->insert($conn->grab_conn(), $details, "close");
		
		return $result;
	}
	function update($details)
	{
		$conn = new Connection("auto");
		$query = new Build();
		$result = $query->update($conn->grab_conn(), $details, "close");
		
		return $result;
	}
	function delete($details)
	{
		$conn = new Connection("auto");
		$query = new Build();
		$result = $query->delete($conn->grab_conn(), $details, "close");
		
		return $result;
	}
	function display($dataArray, $dataB, $dataPart, $dataA)
	{
		while($newArray = mysqli_fetch_array($dataArray, MYSQLI_ASSOC))
		{
			echo $dataB.$newArray[$dataPart].$dataA;
		}
	}
	function select_and_display($dataArray, $dataB, $dataPart, $dataA)
	{
		$selectDataArray = select($dataArray);
		
		while($newArray = mysqli_fetch_array($selectDataArray, MYSQLI_ASSOC))
		{
			echo $dataB.$newArray[$dataPart].$dataA;
		}
	}
	function og_encode_array($data)
	{
		$out = "";
		
		for ($i = 0; $i < strlen ($data); $i++)
		{
			$out .=  "-" . sprintf ("%03d", ord ($data[$i]));
		}
		
		return $out;
	}
	function og_decode_array($s)
	{
		$s = explode("-", $s);
		$s = implode("", $s);
		$out = '';
		
		for ($i=0;$i<strlen($s);$i+=3)
		{
			$out .= chr($s[$i].$s[$i+1].$s[$i+2]);
		}
		
		return $out;
	}
	function og_encode($details, $col)
	{
		$result = select($details);
		
		while($newArray = mysqli_fetch_array($result, MYSQLI_ASSOC))
		{
			$og_array .= og_encode_array($newArray[$col]."::");
		}
		
		$og_array = "([".$col."])=>".$og_array;
		return $og_array;
	}
	function og_decode($og_array)
	{
		$p1 = explode("=>", $og_array); $p1_res = $p1[1];
		$p2 = explode("::", og_decode_array($p1_res));
		$o = count($p2); $o--;
		$p3 = "ogArray( ";
		
		for($i=0;$i<$o;$i++)
		{
			$p3 .= "[".$i."] => " . $p2[$i]." ";
		}
		
		$p3 .= " )";
		return $p3;
	}
	
	include("../../app/omodules/".$dataFile);
	
?>