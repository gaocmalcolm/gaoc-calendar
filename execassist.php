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
	$userType = $_SESSION['UserType'];
	$get = $_GET['id'];

	$_SESSION['get'] = $get;


	
//echo "<script>
//									alert('$get');
								
//									</script>";

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

                <a class="navbar-brand" href="<?php echo $viewlogo;?>"> <img style="max-width:140px; "
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
<?php
		

			if($branch =='tragpublic'){


				$view='none';

			}

			elseif($branch =='mpmpublic'){

				$view='none';

			}

			elseif($branch =='rmagpublic'){

				$view='none';

			}

			elseif($branch =='alabangpublic'){

				$view='none';

			}
			
			elseif($branch =='conradpublic'){

				$view='none';

			}

			elseif($branch =='cebupublic'){

			$view='none';

			}

			elseif($branch =='vertispublic'){

				$view='none';

			}

			elseif($branch =='trinomapublic'){

				$view='none';

			}

			elseif($branch =='megamallpublic'){

				$view='none';

			}

			elseif($branch =='slmcpublic'){

				$view='none';

			}

			elseif($branch =='onebonipublic'){

				$view='none';

			}
			

			else
			{

				$view='';

			}
			?>
			<ul class="nav nav-pills" style="display:<?php echo $view; ?>;">
					<li><a href="home.php">Home</a></li>
					<li class="dropdown active">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">BRANCH CALENDAR <span class="caret"></span></a>
						<ul class="dropdown-menu">
							
							<li <?php if ($get == "ALABANG") { echo 'class="active"';}?>><a href="execassist.php?id=ALABANG">ALABANG</a></li>
							<li <?php if ($get == "CEBU") { echo 'class="active"';}?>><a href="execassist.php?id=CEBU">CEBU</a></li>
							<li <?php if ($get == "CONRAD") { echo 'class="active"';}?>><a href="execassist.php?id=CONRAD">CONRAD</a></li>
							<li <?php if ($get == "RMAG") { echo 'class="active"';}?>><a href="execassist.php?id=RMAG">MAGNOLIA</a></li>
							<li <?php if ($get == "MEGAMALL") { echo 'class="active"';}?>><a href="execassist.php?id=MEGAMALL">MEGAMALL</a></li>
							<li <?php if ($get == "MPM") { echo 'class="active"';}?>><a href="execassist.php?id=MPM">MPM</a></li>
							<li <?php if ($get == "ONEBONI") { echo 'class="active"';}?>><a href="execassist.php?id=ONEBONI">ONE BONI</a></li>
							<li <?php if ($get == "SLMC") { echo 'class="active"';}?>><a href="execassist.php?id=SLMC">SLMC</a></li>
							<li <?php if ($get == "TRAG") { echo 'class="active"';}?>><a href="execassist.php?id=TRAG">TRAG</a></li>
							<li <?php if ($get == "TRI") { echo 'class="active"';}?>><a href="execassist.php?id=TRI">TRINOMA</a></li>
							<li <?php if ($get == "VERTIS") { echo 'class="active"';}?>><a href="execassist.php?id=VERTIS">VERTIS</a></li>							
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
			</ul>
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
	
	
    <!-- Page Content -->

    <div class="container-fluid">
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
			
			  <td class="col-md-3">
					<center><h4 class="">BLOCK OFF / TASK</h4>
			  </td>
			  </tr>
			    <tr>
		<td class="col-md-3"> 
                <div id='calendar1'  style="margin-left:10px"> </div>
				
			</td>
				</tr>
		<tr>
			<td class="col-md-3">
				<center><h4 class="">RECALL</h4>
			</td>
		</tr>
		<tr>
			<td class="col-md-3"> 
				<div id='calendar3'  style="margin-left:10px"> </div>
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
					  <input type="text" name="title" class="form-control" id="title" placeholder="Title" readonly>
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
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description" readonly> </textarea>
					</div>
				  </div>
				  <div class="form-group">
					<label for="remarks" class="col-sm-2 control-label">Remarks</label>
					<div class="col-sm-10">
					  <textarea type="text" name="remarks" class="form-control" id="remarks" placeholder="remarks" readonly> </textarea>
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
					  	<select name="color" class="form-control" id="color" disabled>
						  <option value="">Choose</option>
						  <option style="color:#5484ed;" value="#5484ed" >&#9724; BOLD BLUE </option>
						  <option style="color:#a4bdfc;" value="#a4bdfc" >&#9724; BLUE </option>
						  <option style="color:#46d6db;" value="#46d6db">&#9724; TURQUOISE</option>
						  <option style="color:#dc2127;" value="#dc2127">&#9724; BOLD RED</option>						  
						  <option style="color:#7ae7bf;" value="#7ae7bf">&#9724; GREEN</option>
						  <option style="color:black;" value="black">&#9724; BLACK</option>
						  <option style="color:#51b749;" value="#51b749">&#9724; BOLD GREEN</option>
						  <option style="color:#dbadff;" value="#dbadff">&#9724; PURPLE</option>
						  <option style="color:#fbd75b;" value="#fbd75b">&#9724; YELLOW</option>
						  <option style="color:#ffb878;" value="#ffb878">&#9724; ORANGE</option>
						  <option style="color:#ff887c;" value="#ff887c">&#9724; PINK</option>
						  <option style="color:gray;" value="gray">&#9724; GRAY</option>
						</select>
					</div>
				  </div>
				  <input type="hidden" name="id" class="form-control" id="id">
			  </div>

	<?php 
	
	
	if($branch =='tragpublic'){


		$viewcopy='none';

	}

	elseif($branch =='mpmpublic'){

		$viewcopy='none';

	}

	elseif($branch =='rmagpublic'){

		$viewcopy='none';

	}

	elseif($branch =='alabangpublic'){

		$viewcopy='none';

	}
	
	elseif($branch =='conradpublic'){

		$viewcopy='none';

	}

	elseif($branch =='cebupublic'){

	$viewcopy='none';

	}

	elseif($branch =='vertispublic'){

		$viewcopy='none';

	}

	elseif($branch =='trinomapublic'){

		$viewcopy='none';

	}

	elseif($branch =='megamallpublic'){

		$viewcopy='none';

	}

	elseif($branch =='slmcpublic'){

		$viewcopy='none';

	}

	elseif($branch =='onebonipublic'){

		$viewcopy='none';

	}
			else
			{

				$viewcopy='';

			}


			?>
			  <div class="modal-footer" style="display:<?php echo $viewcopy; ?>">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="edit_event">Copy to my Calendar</button>
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
				<h4 class="modal-title" id="myModalLabel">Edit Block Off / Task</h4>
			  </div>
			  <div class="modal-body">
					<div class="form-group">
					<label for="desc" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-10">
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description" readonly> </textarea>
					</div>
				  </div>		   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="datepicker7" disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="datepicker8" disabled>
					</div>
				  </div>
			  </div>
			
				  <input type="hidden" name="id" class="form-control" id="id">
				
			  <div class="modal-footer">
			  <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_recall" onclick="return confirm('Are you sure to delete?')" disabled>Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="edit_recall" disabled>Save changes</button>
			  </div>
			  	  </div>
			</div>
			</div>
		  </div>


<!-- Modal Edit Block Off-->
		<div class="modal fade" id="EditBlockoff1" tabindex="-2" role="dialog" aria-labelledby="myModalLabel">
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
					  <textarea type="text" name="description" class="form-control" id="description" placeholder="description" readonly> </textarea>
					</div>
				  </div>		   
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Start date</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="datepicker3" disabled>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">End date</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="datepicker4" disabled>
					</div>
				  </div>
				   
			  </div>
							  
				  <input type="hidden" name="id" class="form-control" id="id">
		
			  <div class="modal-footer">
			   <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete_blockoff" onclick="return confirm('Are you sure to delete?')" disabled>Delete</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="edit_blockoff" disabled>Save changes</button>
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
	});
	</script>
	
	<script>
	 $('body').on('hidden', function () {
$(this).removeData('#ModalAdd');
});
	</script>
	<!--<script>
	$('.instructor_selector').on('change',function(){
   					 $('#calendar').fullCalendar('rerenderEvents');
   					});
	</script>-->
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
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			selectable: false,
			selectHelper: true,
			defaultView: 'agendaDay',
			allDaySlot: false,
			
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
			
			events: 'getEventsBranch.php',
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
					$('#EditBlockoff1 #id').val(event.id);
					$('#EditBlockoff1 #description').val(event.title);
					$('#EditBlockoff1 #datepicker3').val(event.start.format('YYYY-MM-DD'));
					$('#EditBlockoff1 #datepicker4').val(event.end.format('YYYY-MM-DD'));
					$('#EditBlockoff1').modal('show');
				});
			},
	      events: 'getEventsBlockoffBranch.php',
    });
	
	
	<!-- CALENDAR 2-->
	$('#calendar2').fullCalendar({
      header: {
		  left: 'prev,today,next',
        center: 'title',
        right: 'prevYear,month,listWeek,nextYear'
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
	      events: 'getEventsRecallBranch.php',
    });
	
	
	<!-- EDIT SCHEDULE MODAL -->

	$('#edit_event').on('click', function(){
             var title = $('#ModalEdit #title').val();
			var description = $('#ModalEdit #description').val();
			var remarks = $('#ModalEdit #remarks').val();
			var color = $('#ModalEdit #color').val();
			var id = $('#ModalEdit #id').val();
			
			$.ajax({
			 url: 'editEventExec.php',
			data: 'id='+ id+'&title='+ title+'&description='+ description + '&color='+ color +'&remarks='+ remarks ,			
			type: "POST",
			 
			 success: function(events) {
							$('#ModalEdit').modal('hide');
						 $('#calendar').fullCalendar( 'refetchEvents' );
						
						alert('Patient Schedule Successfully Copied');
				}
					
			});
			
          });
		  $('#ModalEdit').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	
		
	
	});
	

</script>

</body>

</html>
