<?php
require_once("database.php");
$db_handle = new DBController();
$result = mysqli_query($GLOBALS["___mysqli_ston"], "UPDATE blockoff set " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE  id=".$_POST["id"]); 
?>