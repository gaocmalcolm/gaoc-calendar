<?php
include "database1.php";

		$sql= "SELECT * FROM tbl_history ORDER BY start DESC";
	$results = mysqli_query($conn, $sql );
	
	if(mysqli_num_rows($results)>0) 
{
	$totalrow = mysqli_num_rows($results);
	while($row = mysqli_fetch_array($results)) 
	{	
		$id = $row['id'];
		$event= $row['event'];
		$branch= $row['branch'];
		$start= $row['start'];
		$end = $row['end'];
		$action = $row['action'];
		
			echo '
				<tr>
					<td> '. $event .'</td>
                    <td>'.$start.'</td>
                    <td>'.$end.'</td>
                    <td>'.$branch.'</td>
                    <td>'.$action.'</td>
				</tr>
				';
		

	}
}

//echo "<br/><b>Note :</b> <span>Similarily, You Can Also Perform CRUD Operations using These Selected Values.</span>";


	 
?>