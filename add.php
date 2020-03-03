<?php
   	include("connect.php");
   	
   	$link=Connection();

	$temp1 = $_GET['Temperatura'];
	$hum1=$_GET['Umidita'];
	$pres1=$_GET["Pressione"];

	$query = $link->exec("INSERT INTO `stazione_metereologica` (`ID`, `Timestamp`, `Temperatura`, `Umidita`, `Pressione`) VALUES (NULL, current_timestamp(),'$temp1', '$hum1', NULL)"); 
	
   	$link = null;
?>
