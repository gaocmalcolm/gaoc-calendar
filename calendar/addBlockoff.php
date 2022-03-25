<?php

// Connexion à la base de données
require_once('bdd.php');
date_default_timezone_set('Asia/Taipei');		

if (isset($_POST['title'])){
	session_start();

	$branches = $_SESSION['Branch'];
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$addb = "ADD BLOCK OFF";
	$datenow2 = date('Y-m-d H:i:s');
	if ($start == NULL OR $end == NULL OR $title == NULL)
	{
		die('NOT OK');
	}
	else
	{
		$newEnd =  date('Y-m-d H:i',strtotime('+1 minutes',strtotime($end)));

		$sql = "INSERT INTO blockoff(title, start, end, branch,DateEncoded) values ('$title', '$start', '$newEnd','$branches','$datenow2')";
		//$req = $bdd->prepare($sql);
		//$req->execute();
		
		$query = $bdd->prepare( $sql );
		if ($query == false) {
		 print_r($bdd->errorInfo());
		 die ('Erreur prepare');
		}
		$sth = $query->execute();
		if ($sth == false) {
		 print_r($query->errorInfo());
		 die ('Erreur execute');
		}
	
		$sql1 = "INSERT INTO tbl_history(event, start, end, branch, action) values ('$title', '$start', '$newEnd', '$branches', '$addb')";
	
			$query1 = $bdd->prepare( $sql1 );
			if ($query1 == false) {
			print_r($bdd->errorInfo());
			die ('Erreur prepare');
			}
			$sth1 = $query1->execute();
			if ($sth1 == false) {
			print_r($query1->errorInfo());
			die ('Erreur execute');
			}else{
				die ('OK');
			}
		}
	

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
