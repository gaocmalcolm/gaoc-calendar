<?php
	// Require DB Connection
	session_start();
	$branch = $_SESSION['Branch'];
	$UserType = $_SESSION['UserType'];
if ($branch == NULL OR $UserType == NULL)
{
	echo "<script>
			alert('Please Log In');
			window.location.href='index.php';
			</script>";
		//	header("Location: home.php"); 
}
else if ($UserType =="Staff" OR $UserType =="Specialist")
{
	$dbh = new PDO("mysql:host=localhost;dbname=calendar;charset=utf8", 'root', '');
    // Get ALl Event
	$sth = $dbh->prepare("SELECT * FROM events WHERE branch = '$branch' or branch2 = '$branch' ");
	$sth->execute(array($_GET['start'], $_GET['end']));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
} 
else
{
	$dbh = new PDO("mysql:host=localhost;dbname=calendar;charset=utf8", 'root', '');
    // Get ALl Event
	$sth = $dbh->prepare("SELECT * FROM events WHERE branch = '$branch'");
	$sth->execute(array($_GET['start'], $_GET['end']));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
}
