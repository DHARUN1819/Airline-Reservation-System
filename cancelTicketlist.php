<?php
include 'core/init.php';
//logged_in_redirect();
include 'includes/overall/header.php';

?>
<?php
$session_user_id = $_SESSION['user_id'];

error_reporting(E_ERROR | E_PARSE);
require_once "connect.php";
$query = "select * from cancel where user_id = '$session_user_id'";
$data = mysql_query($query);
?>

<h1>My Cancel Ticket</h1>
<table border="1" cellpadding="5">
<tr>
<th>Passenger id</th> <th>Name</th> <th>Pin</th> <th>Leaving from</th> <th>Going to</th> <th>Depart date</th> <th>Depart time</th> <th>Arrival time</th> <th>Grand fare</th> <th>Return Amount</th>
</tr>
<?php while($rec = mysql_fetch_array($data)) { ?>
<tr>
<td> <?php echo $rec['passenger_id']; ?> </td>
<td> <?php echo $rec['first_name']; ?> </td>
<td> <?php echo $rec['pin']; ?> </td>
<td> <?php echo $rec['leaving_from']; ?> </td>
<td> <?php echo $rec['going_to']; ?> </td>
<td> <?php echo $rec['depart_date']; ?> </td>
<td> <?php echo $rec['depart_time']; ?> </td>
<td> <?php echo $rec['arrival_time']; ?> </td>
<td> <?php echo $rec['grand_fare']; ?> </td>
<td> <?php echo $rec['retamt']; ?> </td>
</tr>
<?php } ?>
</table>







</ul>
<?php

 include 'includes/overall/footer.php';?>
