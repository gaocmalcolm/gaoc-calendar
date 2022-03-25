<?php

require_once('bdd.php');



if (isset($_POST['old']) && isset($_POST['new'])){
	echo "<script>alert($branch)</script>";
	$old = $_POST['old'];
	$new = $_POST['new'];
	echo "<script>alert($old)</script>";
if($old == $password)
{
	$sql = "UPDATE tbl_user SET  password = '$new' WHERE branch = $branch ";

	
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
	


}
//header('Location: home.php');

	
?>
