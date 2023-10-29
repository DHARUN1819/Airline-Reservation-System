<?php
ob_start();
session_start(); 
include('connect.php');
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
                <li>
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
                <li class="active">
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
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   
                </div>
            </div>
        </nav>
								<?php
								error_reporting(E_ERROR | E_PARSE);
require_once "connect.php";
$query = "select * from cancel";
$data = mysql_query($query);
									
								?>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Cancel List</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                           
                                <table class="table table-hover table-striped">
                                    <thead>
                                    	<th>passenger id</th>
                                    	<th>name</th>
                                        <th>address</th>
                                        <th>email</th>
                                    	<th>contact</th>
                                        <th>pin</th>
                                    	<th>leaving from</th>
                                        <th>going to</th>
                                        <th>depart date</th>
                                    	<th>depart time</th>
                                        <th>arrival time</th>
                                    	<th>grand fare</th>
                                        <!-- <th>returning from</th>
                                        <th>returning to</th>
                                    	<th>returning date</th>
                                        <th>returning time</th>
                                    	<th>reaching time</th>
                                        <th>fare</th>-->
                                    	<th>Return Amount</th>
                                    </thead>
                                     <?php while($rec = mysql_fetch_array($data)) { ?>
                                    <tbody>
                                        <tr>
                                        	<td><?php echo $rec['passenger_id']; ?></td>
                                            <td><?php echo $rec['first_name']; ?></td>
                                            <td><?php echo $rec['address1']; ?></td>
                                            <td><?php echo $rec['email']; ?></td>
                                            <td><?php echo $rec['contact']; ?></td>
                                            <td><?php echo $rec['pin']; ?></td>
                                            <td><?php echo $rec['leaving_from']; ?></td>
                                            <td><?php echo $rec['going_to']; ?></td>
                                            <td><?php echo $rec['depart_date']; ?></td>
                                            <td><?php echo $rec['depart_time']; ?></td>
                                            <td><?php echo $rec['arrival_time']; ?></td>
                                            <td><?php echo $rec['grand_fare']; ?></td>
                                            
                                            <td><?php echo $rec['retamt']; ?></td>
                                        </tr>
                                        
                                    </tbody>
                                    <?php } ?>
                                </table>
                                
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
