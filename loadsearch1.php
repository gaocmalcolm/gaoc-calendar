<?php
include "database1.php";
$i=1;$color2="#f2f2f2";$color1="#ffffff";
$getDate = isset($_GET['date']) ? $_GET['date']: date('Y-m-d');
$branch = $_SESSION['Branch'];
$UserType = $_SESSION['UserType'];
if(isset($_POST['searchDesc'])){
//if(!empty($_POST['branch'])) {
	
// Counting number of checked checkboxes.
//$checked_count = count($_POST['branch']);
//echo "You have selected following ".$checked_count." option(s): <br/>";
// Loop to store and display values of individual checked checkbox.
//foreach($_POST['branch'] as $selected) {
#echo "<p>".$selected ."</p>";
$txtSearchDesc1 = explode(" ", $txtSearchDesc);

if($UserType=="Staff")
	{
		$sql= "SELECT *, DATE_FORMAT(start, '%h:%i %p' ) as timein_f,  DATE_FORMAT(end, '%h:%i %p' ) as timeout_f, DATE_FORMAT(start, '%W %M %d, %Y' ) as date_f FROM events WHERE ((title LIKE '%".$txtSearchDesc."%') OR (description LIKE '%".$txtSearchDesc."%')) ORDER BY start ASC";
	$results = mysqli_query($conn, $sql );
	}
else
	{
		$sql= "SELECT *, DATE_FORMAT(start, '%h:%i %p' ) as timein_f,  DATE_FORMAT(end, '%h:%i %p' ) as timeout_f, DATE_FORMAT(start, '%W %M %d, %Y' ) as date_f FROM events WHERE ((title LIKE '%".$txtSearchDesc."%') OR (description LIKE '%".$txtSearchDesc."%')) AND branch = '".$branch."' ORDER BY start DESC";
	$results = mysqli_query($conn, $sql );
	}

	
	if(mysqli_num_rows($results)>0) 
{
	$totalrow = mysqli_num_rows($results);
	while($row = mysqli_fetch_array($results)) 
	{	
		$id = $row['id'];
		$title= $row['title'];
		$description= $row['description'];
		$color3 = $row['color'];
		$date= $row['date_f'];
		$timein_f = $row['timein_f'];
		$timeout_f = $row['timeout_f'];
		$remarks = $row['remarks'];
		$branch = $row['branch'];
		
		
			
		//if($i%2 == 1){$color = $color1;}else{$color = $color2;}
				
			echo '
				<tr>
					<td> '. $date .' </td>
					<td>'. $timein_f .' - '.$timeout_f.' </td>
					<td>'.$title.' '.$description.'</td>
					<td> '.$branch.' </td>
				</tr>
				';
		//$i++;
		

	}
}

//echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";

else{
echo "<b>Details Not Found.</b>";
}
}

	 
?>