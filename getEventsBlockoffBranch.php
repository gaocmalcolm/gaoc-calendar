<?php
	// Require DB Connection
	session_start();
	$get1 = $_SESSION['get'];

	$dbh = new PDO("mysql:host=localhost;dbname=calendar;charset=utf8", 'root', '');
    // Get ALl Event
	$sth = $dbh->prepare("SELECT * FROM blockoff WHERE branch = '$get'");
	$sth->execute(array($_GET['start'], $_GET['end']));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);
	