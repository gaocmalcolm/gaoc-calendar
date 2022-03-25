<?php
include "database.php";
session_start();
if($_SESSION['username'])
{
	$user = $_SESSION['username'];
	$branch = $_SESSION['Branch'];
}
else
{
	header("location: index.php");
}
	
	
$get_info = "?comment=success";
$get_info1 = "?task=success";
$getDate = isset($_GET['date']) ? $_GET['date']: date('Y-m-d');

if(isset($_POST['editpatient'])== "Update")
{
	$txtmyId = $_POST['myId'];	
	$txtmyTitle = $_POST['myTitle'];	
	$txtmyDesc = $_POST['myDesc'];
	$txtcolor = $_POST['color'];
	$txtmyDate = $_POST['myDate'];	
	$txtmyTimein = $_POST['myTimein'];
	$txtmyTimeout = $_POST['myTimeout'];
	$txtmyRoom = $_POST['myRoom'];
	$txtmyRemarks = $_POST['myRemarks'];
	$date = $_POST['datetoday'];
	
	
		$sql = "UPDATE events 
				SET
					title = '$txtmyTitle',
					description = '$txtmyDesc',
					color = '$txtcolor',
					date = '$txtmyDate',
					timein = '$txtmyTimein',
					timeout = '$txtmyTimeout',
					room = '$txtmyRoom',
					remarks = '$txtmyRemarks'
				
				WHERE
				id = '$txtmyId'
				
			";
				
			if(mysqli_query($conn, $sql))
			{
				#$result='<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
							#<strong>Congratulation!</strong> Service Charge Information Successfully Updated </div>';
							echo "<script>
					alert('Schedule Successfully Updated');
					window.location.href='room.php?date=$date';
					</script>";
			}
			else
			{
				echo "<script>
					alert('Error');
					window.location.href='room.php?date=$date';
					</script>";
				#$result='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
							#<strong>Warning!</strong> Error updating Patient Information. Please Contact your IT support. </div>'. mysqli_error($conn);
			}
		//insert patient information
		#		$result='<div class="alert alert-success fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
		#				<strong>Congratulations!</strong> Service Charge Information successfully saved. </div>
		#				';
	#}
}


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8' />
	   <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.css' rel='stylesheet' />
        <link href='//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.print.css' rel='stylesheet' media='print' />
        <link href="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet" />
       
	   
		<link href='css/bootstrap-colorselector.css' rel="stylesheet" />
        <link href="css/bootstrap-colorpicker.min.css" rel="stylesheet" />
        <link href="css/bootstrap-timepicker.min.css" rel="stylesheet" />
  
	 <script src='//cdnjs.cloudflare.com/ajax/libs/moment.js/2.8.3/moment.min.js'></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.1.1/fullcalendar.min.js"></script>
        <script src='js/bootstrap-colorpicker.min.js'></script>
        <script src='js/bootstrap-timepicker.min.js'></script>
		 <script src='js/bootstrap-colorselector.js'></script>
       <script src='js/main.js'></script> 
	 
		<!--<script src='js/scheduler.min.js'></script>-->
			<script>
				$(document).ready(function(){
					$('[data-toggle="tooltip"]').tooltip();   
				});
			</script>
		
        <style>
            body {
                margin: 40px 10px;
                padding: 0;
                font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
                font-size: 14px;
            }
            .fc th {
                padding: 10px 0px;
                vertical-align: middle;
                background:#F2F2F2;
            }
            .fc-day-grid-event>.fc-content {
                padding: 4px;
            }
            #calendar {
                max-width: 900px;
                margin: 0 auto;
            }
            .error {
                color: #ac2925;
                margin-bottom: 15px;
            }
            .event-tooltip {
                width:150px;
                background: rgba(0, 0, 0, 0.85);
                color:#FFF;
                padding:10px;
                position:absolute;
                z-index:10001;
                -webkit-border-radius: 4px;
                -moz-border-radius: 4px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 11px;
            }
			.btn1 {
			display: inline-block;
			padding: 6px 12px;
			margin-bottom: 0;
			font-size: 14px;
			font-weight: 400;
			line-height: 1.42857143;
			text-align: center;
			vertical-align: middle;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-image: none;
			border: 1px solid transparent;
			border-radius: 4px
			}

			div1 a {
			   width: 155px;
			   background-color: red;
			}
			table{
    border: 1px ;
    width: 1000px;
}
th{
    width: 900px;
}
        </style>
    </head>
    <body>
		<header> 
		
		<!-- Navigation -->
    <nav class="navbar navbar-fixed-top" role="navigation" >
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

				<?php
			
			if($branch =='tragpublic')
			{	

				$viewlogo='execassist.php?id=TRAG';

			} 

			elseif($branch =='mpmpublic'){

				$viewlogo='execassist.php?id=MPM';

			}

			elseif($branch =='rmagpublic'){

				$viewlogo='execassist.php?id=RMAG';

			}

			elseif($branch =='alabangpublic'){

				$viewlogo='execassist.php?id=ALABANG';

			}
			
			elseif($branch =='conradpublic'){

				$viewlogo='execassist.php?id=CONRAD';

			}

			elseif($branch =='cebupublic'){

				$viewlogo='execassist.php?id=CEBU';

			}

			elseif($branch =='vertispublic'){

				$viewlogo='execassist.php?id=Vertis';

			}

			elseif($branch =='trinomapublic'){

				$viewlogo='execassist.php?id=TRI';

			}

			elseif($branch =='megamallpublic'){

				$viewlogo='execassist.php?id=Megamall';

			}

			elseif($branch =='slmcpublic'){

				$viewlogo='execassist.php?id=SLMC';

			}

			else
			{

				$viewlogo='home.php';

			}

			?>

                <a class="navbar-brand" href="<?php echo $viewlogo ?>"> <img style="max-width:160px; "
             src="img/logo.jpg"> </a>
				
            </div>
			<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<span class="glyphicon glyphicon-user"></span> 
					HI, <?php echo strtoupper($user);?>
					<span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li>
						<a href="logout.php"> 
						<span class="glyphicon glyphicon-log-out"></span>
						Logout</a>
					</li>
				</ul>
			</li>
			</ul>
           
        </div>
        <!-- /.container -->
    </nav>

		</header>
		
        <div class="container-fluid">
		<br>
		<br>
		<br>
		<br>
	<button onclick="history.go(-1);">Back to calendar </button>
		<br>
		<br>
			<!--<button type="submit" class="btn btn-success" id="searchDesc" name="searchDesc" value="Search"> BACK </button>
			<!--<a href="?date=<?=$prev_date;?>">Previous</a>
			<a href="?date=<?=$next_date;?>">Next</a>-->
			
			<table class="table table-striped">
				
					<!--<tr>
						<th colspan="8" align="center"> 
								<font color="red" size=6px>
									<?php echo $date; ?>
								</font>
						</th>
					</tr>-->
					<tr>
						<th> Date </th>
						<th> Time </th>
						<th> Patient Name </th>
						<th> Branch </th>
					</tr>
				
				
						<?php
						if(isset($_POST["searchDesc"]))
						{
							$txtSearchDesc = $_POST['txtSearchDesc'];	
				
						include "loadsearch1.php";
					
					}
						
						
						?> 
				
			</table>
			<div class="form-group">
				<div class="col-md-6">
					<label> Block Off </label>
					<table class="table table-striped">
						<thead>
							<!--<tr>
								<th colspan="8" align="center"> 
										<font color="red" size=6px>
											<?php echo $date; ?>
										</font>
								</th>
							</tr>-->
							<tr>
								<th> Date </th>

								<th> Description </th>
							</tr>
						</thead>
						<tbody>
								<?php
								if(isset($_POST["searchDesc"]))
								{
									$txtSearchDesc = $_POST['txtSearchDesc'];	
						
								include "loadsearchblockoff.php";
							
							}
								
								
								?> 
						</tbody>
					</table>
				</div>
				<div class="col-md-6">
					<label> Recall </label>
					<table class="table table-striped">
						<thead>
							<!--<tr>
								<th colspan="8" align="center"> 
										<font color="red" size=6px>
											<?php echo $date; ?>
										</font>
								</th>
							</tr>-->
							<tr>
								<th> Date </th>
								<th> Description </th>
							</tr>
						</thead>
						<tbody>
								<?php
								if(isset($_POST["searchDesc"]))
								{
									$txtSearchDesc = $_POST['txtSearchDesc'];	
						
								include "loadsearchrecall.php";
							
							}
								
								
								?> 
						</tbody>
					</table>
				</div>
			</div>
        
    </body>
</html>



