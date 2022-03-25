<?php
	// Require DB Connection
	session_start();
	$get1 = $_SESSION['get'];

		$dbh = new PDO("mysql:host=localhost;dbname=calendar;charset=utf8", 'root', '');
    // Get ALl Event
	$sth = $dbh->prepare("SELECT * FROM events WHERE `start` BETWEEN '2021-06-01 00:00:00' AND '2022-12-31 12:59:59' AND branch = '$get1' ");
	$sth->execute(array($_GET['start'], $_GET['end']));
	$result = $sth->fetchAll(PDO::FETCH_ASSOC);
	echo json_encode($result);

