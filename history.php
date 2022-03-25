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
    <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' />
    <link href='https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css' rel='stylesheet' />

    <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
    <script src='https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js'></script>
    <script src='https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js'></script>



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
			
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
					<li>
						<a data-target="#ChangePass" data-toggle="modal" href=""> 
						<span class="glyphicon glyphicon-lock"></span>
						Change Password</a>
					</li>
					<li>
						<a href="history.php"> 
						<span class="glyphicon glyphicon-book"></span>
						History</a>
					</li>
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
    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Event</th>
                <th>Start</th>
                <th>End</th>
                <th>Branch</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php include "loadhistory.php";?>
        </tbody>
    </table>
	</div>

</body>

</html>
