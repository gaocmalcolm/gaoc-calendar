<?php

include "database1.php";


$result= "";

date_default_timezone_set('Asia/Taipei');

$date = date('H:i:s');

if (isset($_POST['submit'])) //here give the name of your button on which you would like    //to perform action.
{
	$txtUsername = $_POST['username'];
	$txtPassword = $_POST['password'];
	
// here check the submitted text box for null value by giving there name.
		
			if($txtPassword == ""  || $txtUsername=="")
			{
			$result='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
			<strong>Warning!</strong> Please fill up all the field </div>';
			}
			else
			{
			   $sql1= "select * from tbl_user where username= '".$txtUsername."' &&  password =md5('".$txtPassword."')";
			  $result=mysqli_query($conn, $sql1)
				or exit("Sql Error".mysqli_error());
				$num_rows=mysqli_num_rows($result);
			   if($num_rows>0)
				{
					while($num_rows = mysqli_fetch_assoc($result))
					{
						$rUsername = $num_rows['username'];
						$rPassword = $num_rows['password'];
						$rBranch = $num_rows['branch'];
						$rUserType = $num_rows['UserType'];
					}
					session_start();
					$_SESSION['username'] = $rUsername;
					$_SESSION['Branch'] = $rBranch;
					$_SESSION['UserType']= $rUserType;
					$_SESSION['Password'] = $rPassword;
					//if(($rBranch == 'TRI') || ($rBranch == 'RMAG') || ($rBranch == 'NOVO') || ($rBranch == 'CEBU'))
					//{
					//	if(($date <= "22:00:00") && ($date >= "09:00:00"))
					//	{
						
							#echo "<script>
							#		alert('Login Successfully');
							#		window.location.href='home.php';
							#		</script>";
					//		header("Location: home.php"); 
					//	}
					//	else
					//	{
					//		$result='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
					//					<strong>Warning!</strong> Sorry you cannot log in. </div>';
					//	}
				//	}
					if($rUserType =='Staff')
					{
						header("Location: home.php"); 
					}
					else
					{
				//		if(($date <= "20:00:00") && ($date >= "08:00:00"))
				//		{
						
							#echo "<script>
							#alert('Login Successfully');
							#		window.location.href='home.php';
							#	</script>";
							
							header('Location: home.php'); 
				//		}
				//		else
				//		{
					//		$result='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
									//	<strong>Warning!</strong> Sorry you cannot log in. </div>';
				//		}
					}

					if($rBranch =='tragpublic'){

						header('Location: execassist.php?id=TRAG');
					}

					elseif($rBranch =='mpmpublic'){

						header('Location: execassist.php?id=MPM');
					}

					elseif($rBranch =='rmagpublic'){

						header('Location: execassist.php?id=RMAG');
					}

					elseif($rBranch =='alabangpublic'){

						header('Location: execassist.php?id=ALABANG');
					}
					
					elseif($rBranch =='conradpublic'){

						header('Location: execassist.php?id=CONRAD');
					}

					elseif($rBranch =='cebupublic'){

						header('Location: execassist.php?id=CEBU');
					}

					elseif($rBranch =='vertispublic'){

						header('Location: execassist.php?id=Vertis');
					}

					elseif($rBranch =='trinomapublic'){

						header('Location: execassist.php?id=TRI');
					}

					elseif($rBranch =='megamallpublic'){

						header('Location: execassist.php?id=Megamall');
					}

					elseif($rBranch =='slmcpublic'){

						header('Location: execassist.php?id=SLMC');
					}
						
					}
				    else
					{
					$result='<div class="alert alert-danger fade in"><a href="#" class="close" data-dismiss="alert">&times;</a>
								<strong>Warning!</strong> Incorrect username or password </div>';
					}
			
		}
		
}  
?>


<!DOCTYPE html>
<html lang="en">
  
<head>
	<meta charset="utf-8">
	<title> GAOC Calendar </title>
	
	<!-- Latest compiled and minified CSS 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<!-- Optional theme
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">-->
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
	 <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->


</head>
<body>
	<header>
			<img class="img-responsive" alt="Responsive Image" src="img/logo.png" style="max-width:400px;"/>
		
	</header>
	
	    <div class="container">    
	    	
        <div id="loginbox" style="margin-top:30px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="Username">                                        
                            </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password"> 	
                            </div>

                                <div class="form-group">
                                    <!-- Button -->
									<div class="col-md-5 col-md-offset-3">
									<button type="submit" class="btn btn-primary btn-md btn-block" name="submit"> Login </button>
									</div>
                                </div>
								<div class="form-group">
									<div class="col-sm-12">
										<?php echo $result; ?>    
									</div>
								</div>
                        </form>     
                    </div>             
            </div>  
        </div>
       
    </div>
   

	<!-- Latest compiled and minified JavaScript 
	<script src="http://code.jquery.com/jquery-2.1.4.min.js"> </script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>-->
	 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>