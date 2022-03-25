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
	<link rel="stylesheet" href="datepicker/jquery.ui.all.css">
	<!-- FullCalendar -->
	<link href='css/fullcalendar.css' rel='stylesheet' />
<!-- color picker-->
<!-- datepicker -->
<link rel="stylesheet" href="css/build.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">


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
		width: 280px;
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
		width: 280px;
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
		width: 280px;
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
                 <img style="max-width:140px; "
             src="img/logo.jpg"> 
				
            </div>
			<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<span class="glyphicon glyphicon-user"></span> 
					HI, <?php echo strtoupper($user);?> <?php echo strtoupper($branch);?>
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
    	<div class="row">
						<div class="checkbox checkbox-success instructor_selector col-md-5">	
							<table class="table table-condensed">
							<tr>
								<td>
									<input type="checkbox" name="branch" value="ALABANG" class="ids"/> <label>ALABANG</label>
								</td>	
								<td>
									<input type="checkbox" name="branch" value="CEBU" class="ids"/> <label>CEBU</label>		
								</td>					
								<td>
									<input type="checkbox" name="branch" value="CONRAD" class="ids"/> <label>CONRAD</label> 
								</td>
								<td>
									<input type="checkbox" name="branch" value="RMAG" class="ids"/> <label>MAGNOLIA</label>						
								</td>
								<td>
									<input type="checkbox" name="branch" value="Megamall" class="ids"/> <label>MEGAMALL</label>
								</td>
							</tr>
							<tr>
								<td>
									<input type="checkbox" name="branch" value="MPM" class="ids"/> <label>MPM</label>
								</td>
								<td>
									<input type="checkbox" name="branch" value="SLMC" class="ids"/> <label>SLMC</label>
								</td>
								<td>
									<input type="checkbox" name="branch" value="TRAG" class="ids"/> <label>TRAG</label>
								</td>
								<td>
									<input type="checkbox" name="branch" value="TRI" class="ids"/> <label>TRINOMA</label>
								</td>
								<td>
									<input type="checkbox" name="branch" value="Vertis" class="ids"/> <label>VERTIS</label>
								</td>								
							</tr>
							</table>
						</div>
        
              </div>
       
	<div class="col-md-3">
		
            <div class="panel panel-default">
                             
				 <table >
				  <tbody>
				  <tr>
					<td>
						<div id='calendar2'  style="margin-left:10px; margin-top:10px;"> </div>
					</td>
				  </tr>
			  <tr>
			
			  <td>
					<center><h4 class="">BLOCK OFF / TASK</h4>
			  </td>
			  </tr>
			    <tr>
		<td> 
                <div id='calendar1'  style="margin-left:10px"> </div>
				
			</td>
				</tr>
	<tr>
		<td>
			<!--<div class="actionBox">
            <div class="form-group">
                <button class="btn btn-success" name="addblockoff" data-toggle="modal" data-target="#AddBlockOff">Add</button>
				   </div>
            </div>-->
		</td>
	</tr>
		<tr>
			<td>
				<center><h4 class="">RECALL</h4>
			</td>
		</tr>
		<tr>
			<td> 
				<div id='calendar3'  style="margin-left:10px"> </div>
			</td>
		</tr>
		<tr>
			<td>
				<div class="actionBox">   
					<!--<div class="form-group">
						<button class="btn btn-success" name="addcomment" data-toggle="modal" data-target="#AddRecall">Add</button>
					</div>-->
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
	<script>
	$('.instructor_selector').on('change',function(){
   					 $('#calendar').fullCalendar('rerenderEvents');
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
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			selectable: false,
			selectHelper: true,
			defaultView: 'agendaDay',
			allDaySlot: false,
			
			eventRender: function ( event, view ) {
				var returnvalue = false;
				$("input[name=branch]:checked").each(function() {
						var result = this.value == event.branch;
						
					returnvalue = returnvalue || result;
					 	
						});
							
							return returnvalue;				
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
	      events: 'getEventsBlockoff.php',
    });
	
	
	<!-- CALENDAR 2-->
	$('#calendar2').fullCalendar({
      header: {
		  left: 'prev,today,next',
        center: 'title',
        right: 'prevYear,month,nextYear'
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

			$.ajax({
			 url: 'addEvent.php',
			data: 'title='+ title+'&start='+ start +'&end='+ end +'&description='+ description + '&color='+ color +'&remarks='+ remarks,			
			type: "POST",
			 
			 success: function(events) {
							$('#ModalAdd').modal('hide');
						 $('#calendar').fullCalendar( 'refetchEvents' );
						
						alert('Patient Schedule Successfully Saved');
						
						
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

			$.ajax({
			 url: 'editEventTitle.php',
			data: 'id='+ id+'&title='+ title+'&description='+ description + '&color='+ color +'&remarks='+ remarks ,			
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
							$('#AddBlockOff').modal('hide');
						 $('#calendar1').fullCalendar( 'refetchEvents' );
						
						alert('Block Off / Task Successfully Saved');

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
		
			$.ajax({
			 url: 'deleteBlockoff.php',
			data: 'id='+ id+'&delete='+ update,			
			type: "POST",
			 
			 success: function(events) {
							$('#EditBlockoff').modal('hide');
						 $('#calendar1').fullCalendar( 'refetchEvents' );
						
						alert('Block Off/ Task Successfully Deleted');
				}
			});
			
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
							$('#AddRecall').modal('hide');
						 $('#calendar3').fullCalendar( 'refetchEvents' );
						
						alert('Recall Successfully Saved');

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
			
          });
		  $('#EditRecall').on('hidden.bs.modal', function () {
    $(this).find("input,textarea,select").val('').end();
	$('input:checkbox').removeAttr('checked');

});
	
	<!-- END -->
	
	
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			
			$.ajax({
			 url: 'editEventDate.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Patient Schedule Successfully Saved');
					}else{
						alert('Error! Please Contact IT.'); 
					}
				}
			});
		}
		
	
	});
	

</script>

</body>

</html>
