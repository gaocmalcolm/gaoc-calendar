<?php
include "database1.php";
$i=1;$color2="#f2f2f2";$color1="#ffffff";
$getDate = isset($_GET['date']) ? $_GET['date']: date('Y-m-d');
$branch = $_SESSION['Branch'];

if(isset($_POST['searchDesc'])){
//if(!empty($_POST['branch'])) {
	
// Counting number of checked checkboxes.
//$checked_count = count($_POST['branch']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
//foreach($_POST['branch'] as $selected) {
#echo "<p>".$selected ."</p>";
	if($branch == "Recall")
	{
		$sql= "SELECT *, DATE_FORMAT(start, '%h:%i %p' ) as timein_f,  DATE_FORMAT(end, '%h:%i %p' ) as timeout_f, DATE_FORMAT(start, '%b %d, %Y' ) as date_f, DATE_FORMAT(end, '%b %d, %Y' ) as dateend_f FROM blockoff WHERE (title LIKE '%".$txtSearchDesc."%') ORDER BY start DESC";
	$results = mysqli_query($conn, $sql );
	}
	else
	{
		$sql= "SELECT *, DATE_FORMAT(start, '%h:%i %p' ) as timein_f,  DATE_FORMAT(end, '%h:%i %p' ) as timeout_f, DATE_FORMAT(start, '%b %d, %Y' ) as date_f, DATE_FORMAT(end, '%b %d, %Y' ) as dateend_f FROM blockoff WHERE (title LIKE '%".$txtSearchDesc."%') AND branch = '".$branch."' ORDER BY start DESC";
	$results = mysqli_query($conn, $sql );
	}

	
	if(mysqli_num_rows($results)>0) 
{
	$totalrow = mysqli_num_rows($results);
	while($row = mysqli_fetch_array($results)) 
	{	
		$id = $row['id'];
		$title= $row['title'];
		$date= $row['date_f'];
		$dateend= $row['dateend_f'];
		$timein_f = $row['timein_f'];
		$timeout_f = $row['timeout_f'];
		$branch = $row['branch'];
		
		
			
		if($i%2 == 1){$color = $color1;}else{$color = $color2;}
				
			echo '
				<tr>
					<td> '. $date .' - '.$dateend.'</td>
					<td>'.$title.'</td>
				</tr>
				';
		$i++;
		

	}
}

//echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";

else{
echo "<b>Details Name Not Found.</b>";
}
}

	 
?>