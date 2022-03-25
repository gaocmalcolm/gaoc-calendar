<?php

require_once('bdd.php');
session_start();
$branch = $_SESSION['Branch'];
if (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){
		//mysql_set_charset('utf-8');
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$description = $_POST['description'];
	$remarks = $_POST['remarks'];
	
	

	$sql = "UPDATE events SET  branch2 = '$branch' WHERE id = $id ";

	
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
