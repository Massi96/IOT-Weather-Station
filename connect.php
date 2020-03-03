<?php
	
	function Connection(){
		$host="localhost";
		$user="root";
		$pass="";
		$db="misurazioni";
		
		$connessione = new PDO("mysql:host=$host;dbname=$db",$user,$pass);

		if (!$connessione) {
	    	echo("Errore nella connessione");
		}
		
		return $connessione;
	}
?>
