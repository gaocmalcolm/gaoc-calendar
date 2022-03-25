<?php
include "database.php";
require_once('bdd.php');
session_start();
if($_SESSION['username'])
{
}
else
{
	header("location: index.php");
}
	$user = $_SESSION['username'];
	$branch = $_SESSION['Branch'];
	$UserType = $_SESSION['UserType'];
	


//$sql = "SELECT * FROM events ";

//$req = $bdd->prepare($sql);
//$req->execute();

//$events = $req->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GAOC Calendar</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/mbExtruder.css" media="all" rel="stylesheet" type="text/css">
	<link href="css/commentbox.css" rel="stylesheet" />
	<link rel="stylesheet" href="datepicker/jquery.ui.all.css">
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
<!-- color picker-->
<!-- datepicker -->

	<!--end -->
<script src='js/bootstrap-colorpicker.min.js'></script>
        <script src='js/bootstrap-timepicker.min.js'></script>
		<script src='js/bootstrap-colorselector.js'></script>
<!-- -- >

    <!-- Custom CSS -->
   
		<style>
	#calendar 
			.fc-toolbar h2 {
			font-size: 23px;
			white-space: normal !important;
			}
</style>
	<style>
	#calendar1 {
		width: 100%;
		margin: 0 auto;
		font-size: 10px;
		}
			.fc-toolbar h2 {
			font-size: 12px;
			white-space: normal !important;
		}
		/* click +2 more for popup */
		.fc-more-cell a {
			display: block;
			width: 85%;
			margin: 1px auto 0 auto;
			border-radius: 3px;
			background: grey;
			color: transparent;
			overflow: hidden;
			height: 4px;
		}
		.fc-more-popover {
			width: 100px;
		}
	.fc-button-content {
			padding: 0;
		}
		</style>
		<style>
		#calendar2 {
		width: 100%;
		margin: 0 auto;
		font-size: 10px;
		
		}

		.fc-body tr td .fc-scroller.fc-day-grid-container .fc-day-grid.fc-unselectable .fc-row.fc-week.fc-widget-content .fc-bg table tbody tr td.fc-day.fc-today {
			background: none;
		}

		.fc-today .fc-day-number {
    background: #3299CC !important;
	border-radius: 100px 100px;
} 

	.fc-widget-content 
		{
			border: 1px;
		}
			.fc-toolbar h2 {
			font-size: 12px;
			white-space: normal !important;
		}
		/* click +2 more for popup */
		.fc-more-cell a {
			display: block;
			width: 85%;
			margin: 1px auto 0 auto;
			border-radius: 3px;
			background: grey;
			color: transparent;
			overflow: hidden;
			height: 4px;
		}
		.fc-more-popover {
			width: 100px;
		}
	.fc-button-content {
			padding: 0;
		}</style>
<style>
	#calendar3 {
		width: 100%;
		margin: 0 auto;
		font-size: 10px;
		}
			.fc-toolbar h2 {
			font-size: 12px;
			white-space: normal !important;
		}
		/* click +2 more for popup */
		.fc-more-cell a {
			display: block;
			width: 85%;
			margin: 1px auto 0 auto;
			border-radius: 3px;
			background: grey;
			color: transparent;
			overflow: hidden;
			height: 4px;
		}
		.fc-more-popover {
			width: 100px;
		}
	.fc-button-content {
			padding: 0;
		}
		</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
			
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar" role="navigation" >
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"> <img style="max-width:140px; "
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
					<?php if($branch == "Admin")
				{
					echo '<li>
								<a href="history.php"> 
								<span class="glyphicon glyphicon-book"></span>
								History</a>
							</li>';
				}	
				?>
					<!--<li>
						<a data-target="#ChangePass" data-toggle="modal" href="">
						<span class="glyphicon glyphicon-lock"></span>
						Change Password</a>
					</li> -->
				</ul>
			</li>
			</ul>
			<?php
				if ($UserType == "Staff")
				{
					echo '<ul class="nav nav-pills">
					<li  class="active"><a href="home.php">Home</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BRANCH CALENDAR <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="execassist.php?id=ALABANG">ALABANG</a></li>
							<li><a href="execassist.php?id=CEBU">CEBU</a></li>
							<li><a href="execassist.php?id=CONRAD">CONRAD</a></li>
							<li><a href="execassist.php?id=RMAG">MAGNOLIA</a></li>
							<li><a href="execassist.php?id=MEGAMALL">MEGAMALL</a></li>
							<li><a href="execassist.php?id=MPM">MPM</a></li>
							<li><a href="execassist.php?id=ONEBONI">ONE BONI</a></li>
							<li><a href="execassist.php?id=SLMC">SLMC</a></li>
							<li><a href="execassist.php?id=TRAG">TRAG</a></li>
							<li><a href="execassist.php?id=TRI">TRINOMA</a></li>
							<li><a href="execassist.php?id=VERTIS">VERTIS</a></li>
						</ul>
					</li>
					<!--<li><a href="payment.php">Payment</a></li>
					<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Manage <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="salesrep.php">Sales Rep</a></li>
									<li><a href="clients.php">Clients</a></li>
								</ul>
					</li>
					<li><a href="report.php">Report</a></li>
					<li><a href="search.php">Search</a></li>-->
			</ul>';
				}
			?>
          		<div class="col-md-4 col-md-offset-2" style="margin-top: 20px">
					<form class="form-horizontal" method="POST" action="search.php">
						<div class="form-group">
							<!--<label class="control-label" for="Desc">Search</label>-->
							<div class="input-group">
								<input type="text" class="form-control" id="txtSearchDesc" name="txtSearchDesc" placeholder="Search for..." >
								<span class="input-group-btn">
									<button type="submit" class="btn btn-success" id="searchDesc" name="searchDesc" value="Search"> 
										<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
									</button>
								</span>
							</div>
						</div>
						
					</form>
				</div>
			
        </div>
        <!-- /.container -->
    </nav>
	<br>
	
	<!--<div class="col-md-4">
	<div class="panel panel-default"  style="margin-top: 10px; width: 350px; height: 150px">
		<div class="panel-heading">
			<h3 class="panel-title">LEGEND COLOR</h3>
		</div>
		<div class="panel-body">
			<div class="firstrow" style="position:absolute; margin: 0px 0px 10px 0px">
			<div style="width:15px; height:15px; background-color:#5484ed; margin: 3px 0px 2px 5px"><p style="margin-left: 20px">COLOR1</p></div>
			<div style="width:15px; height:15px; background-color:#a4bdfc; margin: 3px 0px 2px 5px"><p style="margin-left: 20px">COLOR2</p></div>
			<div style="width:15px; height:15px; background-color:#46d6db; margin: 3px 0px 2px 5px"><p style="margin-left: 20px">COLOR3</p></div>
			<div style="width:15px; height:15px; background-color:#dc2127; margin: 3px 0px 2px 5px"><p style="margin-left: 20px">COLOR4</p></div>
		</div>	
		<div class="firstrow" style="position:absolute; margin: 0px 0px 10px 110px">
			<div style="width:15px; height:15px; background-color:#7ae7bf; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR5</p></div>
			<div style="width:15px; height:15px; background-color:black; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR6</p></div>
			<div style="width:15px; height:15px; background-color:#51b749; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR7</p></div>
			<div style="width:15px; height:15px; background-color:#dbadff; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR8</p></div>
		</div>
		<div class="firstrow" style="position:absolute; margin: 0px 0px 10px 230px">
			<div style="width:15px; height:15px; background-color:#fbd75b; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR9</p></div>
			<div style="width:15px; height:15px; background-color:#ffb878; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR10</p></div>
			<div style="width:15px; height:15px; background-color:#ff887c; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR11</p></div>
			<div style="width:15px; height:15px; background-color:gray; margin: 3px 0px 2px 3px"><p style="margin-left: 20px">COLOR12</p></div>
		</div>
	</div>
	</div>
	</div>-->
	
    <!-- Page Content -->

    <div class="container-fluid">
	<?php
			$dateblockoff = isset($_GET['date']) ? $_GET['date'] : date('M d, y');
			$daterecall = isset($_GET['date1']) ? $_GET['date1'] : date('M d, y');
			$prev_dateblockoff = date('Y-m-d', strtotime($dateblockoff .' -1 day'));
			$next_dateblockoff = date('Y-m-d', strtotime($dateblockoff .' +1 day'));
			$prev_daterecall = date('Y-m-d', strtotime($daterecall .' -1 day'));
			$next_daterecall = date('Y-m-d', strtotime($daterecall .' +1 day'));
	?>
	
	<div class="col-md-3">
            <div class="panel panel-default">
                             
				 <table >
				  <tbody>
				  <tr>
					<td class="col-md-3">
						<div id='calendar2'  style="margin-left:10px; margin-top:10px;"> </div>
					</td>
				  </tr>
			  <tr>
			
			  <td>
					<center><h4 class="">BLOCK OFF / TASK</h4>
			  </td>
			  </tr>
			    <tr>
			<td class="col-md-3"> 
                <div id='calendar1'  style="margin-left:10px"> </div>
				
			</td>
				</tr>
	<tr>
		<td>
			<div class="actionBox">
            <div class="form-group">
                <button class="btn btn-success" name="addblockoff" data-toggle="modal" data-target="#AddBlockOff">Add</button>
				   </div>
            </div>
		</td>
	</tr>
		<tr>
			<td>
				<center><h4 class="">RECALL</h4>
			</td>
		</tr>
		<tr>
			<td class="col-md-3"> 
				<div id='calendar3'  style="margin-left:10px"> </div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="actionBox">   
					<div class="form-group">
						<button class="btn btn-success" name="addcomment" data-toggle="modal" data-target="#AddRecall">Add</button>
					</div>
				</div>
			</td>
		</tr>
		  </tbody>
		</table>
						
				 </div>
               
			   
        </div> 
				 <div class="col-md-9">
                <div id='calendar'> </div>
				</div>
		
        <!-- /.row -->
				<!-- Modal Change Password-->
		<div class="modal fade" id="ChangePass" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Change Password</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
					<label for="old" class="col-sm-2 control-label">Old Password</label>
					<div class="col-sm-10">
					  <input type="password" name="OldPass" class="form-control" id="OldPass" placeholder="Old Password">
					</div>
				  </div>
					<div class="form-group">
					<label for="new" class="col-sm-2 control-label">New Password</label>
					<div class="col-sm-10">
					  <input type="password" name="NewPass" class="form-control" id="NewPass" placeholder="New Password">
					</div>
				  </div>		   
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="ChangePassword">Save changes</button>
			  </div>
			</div>
			</div>
		  </div>
		</div>

		<!-- Modal Ad Block Off-->
		<div class="modal fade" id="AddBlockOff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Block Off / Task</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description"> </textarea>
					  <label>Note: Please do not input Special Character like ' and Ñ.</label>
					</div>
				  </div>		   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="datepicker">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="datepicker2">
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="add_blockoff">Save changes</button>
			  </div>
			</div>
			</div>
		  </div>
		</div>
		
		<!-- Modal Edit Block Off-->
		<div class="modal fade" id="EditBlockoff" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Block Off / Task</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description"> </textarea>
					  <label>Note: Please do not input Special Character like ' and Ñ.</label>
					</div>
				  </div>		   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="datepicker3">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="datepicker4">
					</div>
				  </div>
				   
			  </div>
							  
				  <input type="hidden" name="id" class="form-control" id="id">
		
			  <div class="modal-footer">
			   <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_blockoff">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="edit_blockoff">Save changes</button>
			  </div>
			  	  </div>
			</div>
			</div>
		  </div>
		</div>
		
		<!-- Modal Ad Recall-->
		<div class="modal fade" id="AddRecall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Recall</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description"> </textarea>
					  <label>Note: Please do not input Special Character like ' and Ñ.</label>
					</div>
				  </div>		   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="datepicker5">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="datepicker6">
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="add_recall">Save changes</button>
			  </div>
			</div>
			</div>
		  </div>
		</div>
		
		<!-- Modal Edit Recall-->
		<div class="modal fade" id="EditRecall" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Recall</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description"> </textarea>
					  <label>Note: Please do not input Special Character like ' and Ñ.</label>
					</div>
				  </div>		   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="datepicker7">
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="datepicker8">
					</div>
				  </div>
			  </div>
			
				  <input type="hidden" name="id" class="form-control" id="id">
				
			  <div class="modal-footer">
			  <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_recall">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="edit_recall">Save changes</button>
			  </div>
			  	  </div>
			</div>
			</div>
		  </div>
		
		
		<!-- Modal  add schedule-->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal" >
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Patient</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					  <label>Note: Please do not input Special Character like ' and Ñ.</label>
					</div>
				  </div>
				   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="select" class="col-sm-2 control-label"> Select </label>
					<div class="col-sm-10">
						<label>
						<select name="copy" class="form-control" id="copy">
							<option value="">Do Not Copy to Dr. Gan's Calendar</option>
							<option value="President">Copy to Dr. Gan's Calendar</option>
							<option value="Specialist">Copy to Dr. Bev's Calendar</option>
						</select>
						</label>
						</br>
						<font color="red">*Please select Copy to Calendar if Dr. Gan/Dr. Bev Patient</font>
					</div>
					</div>
				  <div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description"> </textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="remarks" class="col-sm-2 control-label">Remarks</label>
					<div class="col-sm-10">
					  <textarea type="text" name="remarks" class="form-control" id="remarks" placeholder="remarks"> </textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
							<option style="color:#ADD8E6;" value="#ADD8E6" >&#9724;  LIGHT BLUE </option>
						   <option style="color:#5484ed;" value="#5484ed" >&#9724; BOLD BLUE </option>
						   <option style="color:#a4bdfc;" value="#a4bdfc" >&#9724; BLUE </option>
						  <option style="color:#46d6db;" value="#46d6db">&#9724; TURQUOISE</option>
						  <option style="color:#dc2127;" value="#dc2127">&#9724;  RED</option>						  
						  <option style="color:#7ae7bf;" value="#7ae7bf">&#9724; GREEN</option>
							  <option style="color:#51b749;" value="#51b749">&#9724; BOLD GREEN</option>
						  <option style="color:#CCBADC;" value="#CCBADC">&#9724; PURPLE</option>
						  <option style="color:#fbd75b;" value="#fbd75b">&#9724; YELLOW</option>
						  <option style="color:#ffb878;" value="#ffb878">&#9724; ORANGE</option>
						   <option style="color:#ff887c;" value="#ff887c">&#9724;  PINK</option>
						  <option style="color:gray;" value="gray">&#9724; GRAY</option>
							<option style="color:#D3D3D3;" value="#D3D3D3">&#9724; LIGHT GRAY</option>
                                                        <option style="color:#FFFFE0;" value="#FFFFE0">&#9724; LIGHT YELLOW</option>
							<option style="color:#b5651d;" value="#b5651d">&#9724; LIGHT BROWN</option>
							<option style="color:#AFEEEE;" value="#AFEEEE">&#9724; LIGHT TURQUOISE</option>
							<option style="color:#90EE90;" value="#90EE90">&#9724; LIGHT GREEN</option>
							<option style="color:#9F0324;" value="#9F0324">&#9724; LIGHT MAROON</option>
							<option style="color:#FFB6C1;" value="#FFB6C1">&#9724; LIGHT PINK</option>
							<option style="color:#ffa500;" value="#ffa500">&#9724; LIGHT ORANGE</option>
							<option style="color:#FF69B4;" value="#FF69B4">&#9724; HOT PINK</option>
							<option style="color:#A10249;" value="#A10249">&#9724; DARK ROSE</option>
							<option style="color:#AA8CC5;" value="#AA8CC5">&#9724; DARK PURPLE</option>
							<option style="color:#c08081;" value="#c08081">&#9724; OLD ROSE</option>
							<option style="color:#800000;" value="#800000">&#9724; MAROON</option>
													</select>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="add_event"  >Save changes</button>
			  </div>
			</div>
			</div>
		  </div>
		</div>
		
		<!-- Modal edit schedule title -->

		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="form-horizontal">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Edit Event</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Title</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title">
					  <label>Note: Please do not input Special Character like ' and Ñ.</label>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-4">
					  <input type="text" name="start" class="form-control" id="start" readonly >
					</div>
				<!--	<div class="col-sm-3">
						<input type="time" name="start2" class="form-control" id="start2" >
					</div>-->
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-4">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				<!--	<div class="col-sm-3">
						<input type="time" name="end2" class="form-control" id="end2" >
					</div>-->
				  </div>
				  <div class="form-group">
					<label for="select" class="col-sm-2 control-label"> Select </label>
					<div class="col-sm-10">
						<label>
						<select name="copy" class="form-control" id="copy">
							<option value="">Do Not Copy to Dr. Gan's Calendar</option>
							<option value="President">Copy to Dr. Gan's Calendar</option>
							<option value="Specialist">Copy to Dr. Bev's Calendar</option>
						</select>
						</label>
						</br>
						<font color="red">*Please select Copy to Calendar if Dr. Gan/Dr. Bev Patient</font>
					</div>
					</div>
				  <div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description" > </textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="remarks" class="col-sm-2 control-label">Remarks</label>
					<div class="col-sm-10">
					  <textarea type="text" name="remarks" class="form-control" id="remarks" placeholder="remarks" > </textarea>
					</div>
				  </div>
				  <div class="form-group">
                                
                                <div class="col-md-4">
                                    <input id="selectbranch1" name="selectbranch1" class="form-control"  type="text" value="<?php echo $branch ?>" style="display:none" disabled></input>
                                </div>
                    </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  	<select name="color" class="form-control" id="color">
						  <option value="">Choose</option>
							<option style="color:#ADD8E6;" value="#ADD8E6" >&#9724;  LIGHT BLUE </option>
						  <option style="color:#5484ed;" value="#5484ed" >&#9724;  BOLD BLUE </option>
						  <option style="color:#a4bdfc;" value="#a4bdfc" >&#9724; BLUE </option>
						  <option style="color:#46d6db;" value="#46d6db">&#9724; TURQUOISE</option>
						  <option style="color:#dc2127;" value="#dc2127">&#9724; BOLD RED</option>						  
						  <option style="color:#7ae7bf;" value="#7ae7bf">&#9724; GREEN</option>
						  <option style="color:black;" value="black">&#9724; BLACK</option>
						  <option style="color:#51b749;" value="#51b749">&#9724; BOLD GREEN</option>
						  <option style="color:#CCBADC;" value="#CCBADC">&#9724; PURPLE</option>
						  <option style="color:#fbd75b;" value="#fbd75b">&#9724; YELLOW</option>
						  <option style="color:#ffb878;" value="#ffb878">&#9724; ORANGE</option>
						  <option style="color:#ff887c;" value="#ff887c">&#9724; PINK</option>
						  <option style="color:gray;" value="gray">&#9724; GRAY</option>
							<option style="color:#D3D3D3;" value="#D3D3D3">&#9724; LIGHT GRAY</option>
                                                         <option style="color:#FFFFE0;" value="#FFFFE0">&#9724; LIGHT YELLOW</option>
							<option style="color:#b5651d;" value="#b5651d">&#9724; LIGHT BROWN</option>
							<option style="color:#AFEEEE;" value="#AFEEEE">&#9724; LIGHT TURQUOISE</option>
							<option style="color:#90EE90;" value="#90EE90">&#9724; LIGHT GREEN</option>
							<option style="color:#9F0324;" value="#9F0324">&#9724; LIGHT MAROON</option>
							<option style="color:#FFB6C1;" value="#FFB6C1">&#9724; LIGHT PINK</option>
							<option style="color:#ffa500;" value="#ffa500">&#9724; LIGHT ORANGE</option>
							<option style="color:#FF69B4;" value="#FF69B4">&#9724; HOT PINK</option>
							<option style="color:#A10249;" value="#A10249">&#9724; DARK ROSE</option>
<option style="color:#AA8CC5;" value="#AA8CC5">&#9724; DARK PURPLE</option>
							<option style="color:#c08081;" value="#c08081">&#9724; OLD ROSE</option>
							<option style="color:#800000;" value="#800000">&#9724; MAROON</option>
							
						</select>
					</div>
				  </div>
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>
			  <div class="modal-footer">
			  	 <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_event">Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="edit_event">Save Changes</button>
			  </div>
			</div>
			</div>
		  </div>
		</div>
	
	

    </div>
    <!-- /.container -->
<link href='css/fullcalendar.min.css' rel='stylesheet' />
<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	<!-- FullCalendar -->
	<script src='js/moment.min.js'></script>

	<script src='js/fullcalendar.js'></script>
	<script src="datepicker/jquery.ui.core.js"></script>
	<script src="datepicker/jquery.ui.datepicker.js"></script>
<script>
	$(function() {
		$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker2" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker3" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker4" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker5" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker6" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker7" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#datepicker8" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#start" ).datepicker({ dateFormat: 'yy-mm-dd' });
		$( "#end" ).datepicker({ dateFormat: 'yy-mm-dd' });
	});
	</script>
	<script>
	 $('body').on('hidden', function () {
$(this).removeData('#ModalAdd');
});
	</script>
	<script>

	$(document).ready(function() {
			
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,today,next ',
				center: 'title',
				right: 'prevYear,agendaDay,agendaWeek,month,nextYear'
			},
			  views: {
				month: { 
					selectable: false
							}
					},
					defaultDate: moment(),
			height: 950,
			nowIndicator: true,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			defaultView: 'agendaDay',
			allDaySlot: false,
			
			select: function(start, end, allDay) {
				$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalAdd').modal('show');
				
			},
			//eventRender: function ( event, view ) {
			//	var returnvalue = false;
			//	$("input[type=checkbox]:checked").each(function() {
			//			var result = this.value == event.branch;
			//			
			//		returnvalue = returnvalue || result;
			//		 	
			//			});
			//				
			//				return returnvalue;				
			//		},
			eventRender: function(event, element) {
				element.find('.fc-title').append("  " + event.description + " - " + event.remarks); 
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #title').val(event.title);
					$('#ModalEdit #color').val(event.color);
					$('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
		//			$('#ModalEdit #start2').val(event.start.format('HH:mm:ss'));
					$('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
		//			$('#ModalEdit #end2').val(event.end.format('HH:mm:ss'));
					$('#ModalEdit #description').val(event.description);
					$('#ModalEdit #remarks').val(event.remarks);
					$('#ModalEdit').modal('show');
				});
				
				
						
			},

			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: 'getEvents.php',
			eventTextColor: 'black'
			
					
		});
	
		<!-- CALENDAR BLOCK OFF -->
		$('#calendar1').fullCalendar({
      header: {
		 left: 'prev,today,next',
        center: 'title',
        right: 'listDay'
      },

      // customize the button names,
      // otherwise they'd all just say "list"
      views: {
        listDay: { buttonText: 'Block Off List' },
        listWeek: { buttonText: 'list week' }
      },
	  displayEventTime: false,
		allDaySlot: false,
      defaultView: 'listDay',
      defaultDate: moment(),
		selectable: true,
		selectHelper: true,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
	 eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#EditBlockoff #id').val(event.id);
					$('#EditBlockoff #description').val(event.title);
					$('#EditBlockoff #datepicker3').val(event.start.format('YYYY-MM-DD'));
					$('#EditBlockoff #datepicker4').val(event.end.format('YYYY-MM-DD'));
					$('#EditBlockoff').modal('show');
				});
			},
	      events: 'getEventsBlockoff.php',
    });
	
	
	<!-- CALENDAR 2-->
	$('#calendar2').fullCalendar({
      header: {
		  left: 'title,prev,today,next',
        center: '',
        right: 'prevYear,month,listWeek,nextYear'
      },
			views: {
        month: { buttonText: 'Month' }
      },
      // customize the button names,
      // otherwise they'd all just say "list"
    	  
		allDaySlot: false,
		defaultView: 'month',
		defaultDate: moment(),
		selectHelper: true,
		editable: true,
		eventLimit: true, // allow "more" link when too many events
      	
		dayClick: function(date, allDay, jsEvent, view) {
				//alert('Clicked on: ' + date.format());
				//alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);
				//alert('Current view: ' + view.name);
				if(allDay){
					$('#calendar').fullCalendar('changeView', 'agendaDay');
					$('#calendar').fullCalendar('gotoDate', date);
					$('#calendar1').fullCalendar('changeView', 'listDay');
					$('#calendar1').fullCalendar('gotoDate', date);
					$('#calendar3').fullCalendar('changeView', 'listDay');
					$('#calendar3').fullCalendar('gotoDate', date);
				}
			},

		eventRender: function(event, element) {
			element.find('.fc-title').append("  " + event.description + " - " + event.remarks); 
			element.bind('dblclick', function() {
				$('#ModalEdit #id').val(event.id);
				$('#ModalEdit #title').val(event.title);
				$('#ModalEdit #color').val(event.color);
				$('#ModalEdit #start').val(event.start.format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalEdit #end').val(event.end.format('YYYY-MM-DD HH:mm:ss'));
				$('#ModalEdit #description').val(event.description);
				$('#ModalEdit #remarks').val(event.remarks);
				$('#ModalEdit').modal('show');
			});
					
		},
			
			events: 'getPreviousYear.php',

    });
	
	<!-- CALENDAR RECALL -->
	$('#calendar3').fullCalendar({
      header: {
		  left: 'prev,today,next',
        center: 'title',
        right: 'listDay'
      },

      // customize the button names,
      // otherwise they'd all just say "list"
      views: {
        listDay: { buttonText: 'Recall List' },
        listWeek: { buttonText: 'list week' }
      },
	  displayEventTime: false,
		allDaySlot: false,
      defaultView: 'listDay',
      defaultDate: moment(),
		selectable: true,
		selectHelper: true,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      	 eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#EditRecall #id').val(event.id);
					$('#EditRecall #description').val(event.title);
					$('#EditRecall #datepicker7').val(event.start.format('YYYY-MM-DD'));
					$('#EditRecall #datepicker8').val(event.end.format('YYYY-MM-DD'));
					$('#EditRecall').modal('show');
				});
			},
	      events: 'getEventsRecall.php',
    });
	
	<!-- ADD PATIENT MODAL -->
				
		  $('#add_event').on('click', function(){
             var title = $('#ModalAdd #title').val();
			var description = $('#ModalAdd #description').val();
			var remarks = $('#ModalAdd #remarks').val();
			var color = $('#ModalAdd #color').val();
			var start = $('#ModalAdd #start').val();
			var end = $('#ModalAdd #end').val();
			var copy = $('#ModalAdd #copy').val();

			$.ajax({
			 url: 'addEvent.php',
			data: 'title='+ title+'&start='+ start +'&end='+ end +'&description='+ description + '&color='+ color +'&remarks='+ remarks+'&copy='+ copy,			
			type: "POST",
			 
			 success: function(events) {
				if(events == 'OK')
				 {
					$('#ModalAdd').modal('hide');
						 $('#calendar').fullCalendar( 'refetchEvents' );
						
						alert('Patient Schedule Successfully Saved');
				 }
				 else
				 {
					alert('Please input patient schedule details');
				 }
						
				}
					
			});
			
          });
		  $('#ModalAdd').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();

});

	<!-- END -->

	<!-- EDIT SCHEDULE MODAL -->

	$('#edit_event').on('click', function(){
             var title = $('#ModalEdit #title').val();
			var description = $('#ModalEdit #description').val();
			var remarks = $('#ModalEdit #remarks').val();
			var color = $('#ModalEdit #color').val();
			var id = $('#ModalEdit #id').val();
			var start = $('#ModalEdit #start').val();
			var end = $('#ModalEdit #end').val();
			var copy = $('#ModalEdit #copy').val();
		//	var start2 = $('#ModalEdit #start2').val();
		//	var end2 = $('#ModalEdit #end2').val();
		//	alert (start1);
		//	alert(end1);
			//var startarray = start1.split("/");
			//var start3 = startarray[2] + '-' + startarray[0] + '-' + startarray[1];
			//var endarray = end1.split("/");
			//var end3 = endarray[2] + '-' + endarray[0] + '-' + endarray[1];
	//		var start = start1 + '_' + start2;
	//		var end = end1 + '_' + end2;

		//	alert(start);
		//	alert(end);

			$.ajax({
			 url: 'editEventTitle.php',
			data: 'id='+ id+'&title='+ title+'&description='+ description + '&color='+ color +'&remarks='+ remarks+'&copy='+ copy,			
			type: "POST",
			 
			 success: function(events) {
							$('#ModalEdit').modal('hide');
						 $('#calendar').fullCalendar( 'refetchEvents' );
						
						alert('Patient Schedule Successfully Changed');
				}
					
			});
			
          });
		  $('#ModalEdit').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	<!-- DELETE SCHEDULE MODAL -->

	$('#delete_event').on('click', function(){
       var update = $('#ModalEdit #delete').val();
	   	var id = $('#ModalEdit #id').val();
			 var confirmText = "Are you sure to delete?";
		if (confirm(confirmText)){
			$.ajax({
			 url: 'deleteEventTitle.php',
			data: 'id='+ id+'&delete='+ update,			
			type: "POST",
			 
			 success: function(events) {
							$('#ModalEdit').modal('hide');
						 $('#calendar').fullCalendar( 'refetchEvents' );
						
						alert('Patient Schedule Successfully Deleted');
				}
			});
		}
		return false;
          });
	

		  $('#ModalEdit').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	<!-- ADD Blockoff MODAL -->
				
		  $('#add_blockoff').on('click', function(){
			var title = $('#AddBlockOff #description').val();
			var start = $('#AddBlockOff #datepicker').val();
			var end = $('#AddBlockOff #datepicker2').val();
			$.ajax({
			 url: 'addBlockoff.php',
			data: 'title='+ title+'&start='+ start +'&end='+ end ,			
			type: "POST",
			 
			 success: function(events) {
			 if(events == 'OK'){
							$('#AddBlockOff').modal('hide');
						 $('#calendar1').fullCalendar( 'refetchEvents' );
						
						alert('Block Off / Task Successfully Saved');
				 }
				 else
				 {
					alert('Please complete the details');
				 }
				

				}
					
			});
			
          });
		  $('#AddBlockOff').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();

});

	<!-- END -->

	<!-- EDIT Blockoff MODAL -->

	$('#edit_blockoff').on('click', function(){
             var title = $('#EditBlockoff #description').val();
			var start = $('#EditBlockoff #datepicker3').val();
			var end = $('#EditBlockoff #datepicker4').val();
			var id = $('#EditBlockoff #id').val();

			$.ajax({
			 url: 'editBlockoff.php',
			data: 'id='+ id+'&title='+ title+'&start='+ start +'&end='+ end ,			
			type: "POST",
			 
			 success: function(events) {
							$('#EditBlockoff').modal('hide');
						 $('#calendar1').fullCalendar( 'refetchEvents' );
						
						alert('Block Off / Task Successfully Changed');
				}
					
			});
			
          });
		  $('#EditBlockoff').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	<!-- DELETE Blockoff MODAL -->

	$('#delete_blockoff').on('click', function(){
       var update = $('#EditBlockoff #delete').val();
	   	var id = $('#EditBlockoff #id').val();
			var confirmText = "Are you sure to delete";
			if(confirm(confirmText)){
			$.ajax({
			 url: 'deleteBlockOff.php',
			data: 'id='+ id+'&delete='+ update,			
			type: "POST",
			 
			 success: function(events) {
							$('#EditBlockoff').modal('hide');
						 $('#calendar1').fullCalendar( 'refetchEvents' );
						
						alert('Block Off/ Task Successfully Deleted');
				}
			});
			}
			return false;
          });
		  $('#EditBlockoff').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	<!-- ADD Recall MODAL -->
				
		  $('#add_recall').on('click', function(){
			var title = $('#AddRecall #description').val();
			var start = $('#AddRecall #datepicker5').val();
			var end = $('#AddRecall #datepicker6').val();
			$.ajax({
			 url: 'addRecall.php',
			data: 'title='+ title+'&start='+ start +'&end='+ end ,			
			type: "POST",
			 
			 success: function(events) {
			if(events == 'OK'){
							$('#AddRecall').modal('hide');
						 $('#calendar3').fullCalendar( 'refetchEvents' );
						alert('Recall Successfully Saved');
				}
				else
				{
					alert('Please complete the details');
				}

				}
					
			});
			
          });
		  $('#AddRecall').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();

});

	<!-- END -->

	<!-- EDIT Recall MODAL -->

	$('#edit_recall').on('click', function(){
             var title = $('#EditRecall #description').val();
			var start = $('#EditRecall #datepicker7').val();
			var end = $('#EditRecall #datepicker8').val();
			var id = $('#EditRecall #id').val();

			$.ajax({
			 url: 'editRecall.php',
			data: 'id='+ id+'&title='+ title+'&start='+ start +'&end='+ end ,			
			type: "POST",
			 
			 success: function(events) {
							$('#EditRecall').modal('hide');
						 $('#calendar3').fullCalendar( 'refetchEvents' );
						
						alert('Recall Successfully Changed');
				}
					
			});
			
          });
		  $('#EditRecall').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	<!-- DELETE Recall MODAL -->

	$('#delete_recall').on('click', function(){
       var update = $('#EditRecall #delete').val();
	   	var id = $('#EditRecall #id').val();
			 var confirmText = "Are you sure to delete";
			if(confirm(confirmText)){
			$.ajax({
			 url: 'deleteRecall.php',
			data: 'id='+ id+'&delete='+ update,			
			type: "POST",
			 
			 success: function(events) {
							$('#EditRecall').modal('hide');
						 $('#calendar3').fullCalendar( 'refetchEvents' );
						
						alert('Recall Successfully Deleted');
				}
			});
			}
			return false;
          });
		  $('#EditRecall').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->

	<!-- Change Password MODAL -->

$('#ChangePassword').on('click', function(){
		var OldPass = $('#ChangePass #OldPass').val();
		var NewPass = $('#ChangePass #NewPass').val();
	alert(OldPass);
	alert(NewPass);
		$.ajax({
		 url: 'changepass.php',
		data: 'old='+ OldPass+'&new='+ NewPass,			
		type: "POST",
		 
		 success: function(events) {
						$('#ChangePass').modal('hide');
					alert('Password Successfully Changed');
			}
				
		});
		
				});
				$('#ChangePass').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			branch = event.branch;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			Event[3] = branch;
			
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						//alert('Patient Schedule Successfully Saved');
						$('#calendar').fullCalendar( 'refetchEvents' );
					}else{
						alert('Error! Please Contact IT.'); 
						$('#calendar').fullCalendar( 'refetchEvents' );
						
					}
				}
			});
		}
		
	
	});
	

</script>

</body>

</html>
