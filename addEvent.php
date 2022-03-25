<?php

// Connexion à la base de données
require_once('bdd.php');
date_default_timezone_set('Asia/Taipei');	
$add = 'ADD';

if (isset($_POST['title'])){
	session_start();
	$branches = $_SESSION['Branch'];
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$description = $_POST['description'];
	$remarks = $_POST['remarks'];
	$datenow2 = date('Y-m-d H:i:s');
	$copy = $_POST['copy'];
if ($color == NULL)
{
	$color = "#ADD8E6";
}	
if($branches == NULL )
{
	echo alert('Error Please Login!');
}
if($title == NULL)
{
	die('NOT OK');
}
if($branches == "President")
{
	$sql = "INSERT INTO events(title, start, end, color, description, remarks, branch) values ('$title', '$start', '$end', '$color', '$description', '$remarks', '$branches')";
	$sql1 = "INSERT INTO tbl_history(event, start, end, branch, action,DateEncoded) values ('$title', '$start', '$end', '$branches', '$add','$datenow2')";
	
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

	$query1 = $bdd->prepare( $sql1 );
	if ($query1 == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth1 = $query1->execute();
	if ($sth1 == false) {
	 print_r($query1->errorInfo());
	 die ('Erreur execute');
	}else
	{
		die ('OK');
	}
}
else
{
	$sql = "INSERT INTO events(title, start, end, color, description, remarks, branch,branch2,DateEncoded) values ('$title', '$start', '$end', '$color', '$description', '$remarks', '$branches','$copy','$datenow2')";
	$sql1 = "INSERT INTO tbl_history(event, start, end, branch, action,DateEncoded) values ('$title', '$start', '$end', '$branches', '$add','$datenow2')";
}
	
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

	$query1 = $bdd->prepare( $sql1 );
	if ($query1 == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth1 = $query1->execute();
	if ($sth1 == false) {
	 print_r($query1->errorInfo());
	 die ('Erreur execute');
	}else
	{
		die ('OK');
	}
}
//header('Location: home.php]);
?>
