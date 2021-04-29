<?php 
	try
	{
		$base=new PDO('mysql:host=localhost;dbname=salaire;charset=utf8','root','');
	}
	catch(Exception $e)
	{
		die("Erreur".$e->getMessage());
	}
?>