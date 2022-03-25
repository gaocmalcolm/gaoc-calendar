<?php

require_once('bdd.php');
if (isset($_POST['title']) && isset($_POST['id'])){
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$newEnd =  date('Y-m-d H:i',strtotime('+1 minutes',strtotime($end)));
	
	$sql = "UPDATE blockoff SET  title = '$title', start = '$start', end = '$newEnd' WHERE id = $id ";

	
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

}
//header('Location: home.php');

	
?>
