<?php
ob_start();
session_start(); 
include('connect.php');
$err_msg=$suces_msg="";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$flight_name=mysql_real_escape_string($_POST['flight_name']);
$leaving_from=mysql_real_escape_string($_POST['leaving_from']);
$going_to=mysql_real_escape_string($_POST['going_to']);
$depart_date=mysql_real_escape_string($_POST['depart_date']);
$time=mysql_real_escape_string($_POST['time']);
$arrival_date=mysql_real_escape_string($_POST['arrival_date']);
$dest_time=mysql_real_escape_string($_POST['dest_time']);
$fare=mysql_real_escape_string($_POST['fare']);

mysql_query ("insert into members(flight_name,leaving_from,going_to,depart_date,time,arrival_date,dest_time,fare) values ('$flight_name','$leaving_from','$going_to','$depart_date','$time','$arrival_date','$dest_time','$fare')");


$suces_msg="done";


}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Flight Management</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="assets/img/sidebar-5.jpg">

    	<div class="sidebar-wrapper" style="background-color:#295f8d">
            <div class="logo">
                <a href="index.php" class="simple-text">
                    Flight Admin
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="add-flight.php">
                        <i class="pe-7s-user"></i>
                        <p>Add Flight</p>
                    </a>
                </li>
                <li>
                    <a href="flight-list.php">
                        <i class="pe-7s-user"></i>
                        <p>Flight List</p>
                    </a>
                </li>
                <li>
                    <a href="passengers-list.php">
                        <i class="pe-7s-user"></i>
                        <p>Passengers List</p>
                    </a>
                </li>
                <li>
                    <a href="members-list.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Members</p>
                    </a>
                </li>
                <li>
                    <a href="cancel-list.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>Cancel List</p>
                    </a>
                </li>
                <li>
                    <a href="logout.php">
                        <i class="pe-7s-graph"></i>
                        <p>Log Out</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
           
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Flight</h4>
                            </div>
                            <?php 
			if($suces_msg=="done")
			{
			echo"<br/><table style='border:solid 3px #009900;border-radius:5px;' align='center' width='40%'>
			<tr><td  align='center' height='25px' style='text-decoration:none; color:#009900; font-size:14px'> Flight Added successfully.</td></tr>
			</table><br/>";
			}
			
			if (!$err_msg=="")	
			{
			echo"<br/><table style='border:solid 3px #FF0000;border-radius:5px;' align='center' width='40%'>
			<tr><td  align='center' height='25px' style='text-decoration:none; color:#FF0000; font-size:14px'> &nbsp;&nbsp;
			$err_msg</td></tr>
			</table><br/>";
			}
				
			?>
                            <div class="content">
                                <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Flight Name" name="flight_name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fare</label>
                                                <input type="number" class="form-control" placeholder="Fare" name="fare">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>leaving from</label>
                                                <select class="form-control" name="leaving_from" required>
                                                	<option value="">Select</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Chennai">Chennai</option>
                                                    <option value="Bangalore">Bangalore</option>
                                                    <option value="Coimbatore">Coimbatore</option>
                                                    <option value="Cochin">Cochin</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>going to</label>
                                                <select class="form-control" required name="going_to">
                                                <option value="">Select</option>
                                                	<option value="Delhi">Delhi</option>
                                                    <option value="Chennai">Chennai</option>
                                                    <option value="Bangalore">Bangalore</option>
                                                    <option value="Coimbatore">Coimbatore</option>
                                                    <option value="Cochin">Cochin</option>
                                                    <option value="Mumbai">Mumbai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

									
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>depart date</label>
                                                <input type="date" class="form-control" name="depart_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>time</label>
                                                <input type="time" class="form-control" placeholder="Time" name="time">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>arrival date</label>
                                                <input type="date" class="form-control" name="arrival_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>dest time</label>
                                                <input type="time" class="form-control" placeholder="Time" name="dest_time">
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <button type="submit" class="btn btn-info btn-fill pull-right">Submit</button>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
