<?php

require_once('bdd.php');


session_start();
date_default_timezone_set('Asia/Taipei');
$branch = $_SESSION['Branch'];
if (isset($_POST['title']) && isset($_POST['id'])){
		
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$description = $_POST['description'];
	$remarks = $_POST['remarks'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$copy = $_POST['copy'];
	$edit = "EDIT";
	$datenow2 = date('Y-m-d H:i:s');
		$sql = "UPDATE events SET  title = '$title', color = '$color', description = '$description', remarks = '$remarks', branch2= '$copy' WHERE id = $id AND branch = '$branch' LIMIT 1";
		
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

		$sql1 = "INSERT INTO tbl_history(event, start, end, branch, action,DateEncoded) values ('$title', '$start', '$end', '$branch', '$edit','$datenow2')";

		$query1 = $bdd->prepare( $sql1 );
		if ($query1 == false) {
		print_r($bdd->errorInfo());
		die ('Erreur prepare');
		}
		$sth1 = $query1->execute();
		if ($sth1 == false) {
		print_r($query1->errorInfo());
		die ('Erreur execute');
		}
}
//header('Location: home.php');

	
?>
