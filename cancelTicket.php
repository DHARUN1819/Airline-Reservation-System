
<?php
include 'core/init.php';
include 'includes/overall/header.php';?>
<h2>Ticket cancellation</h2>
<form action="" method="post">
		<ul>

		<li>
		PIN*:<br>
		<input type="text" name="pin" required placeholder="Enter the given PIN...">
		</li>
		<li>
		<input type="submit" name="cancel" value="Proceed">
		</li>
		</ul>
</form>
<?php
if (isset($_POST['cancel'])) {
	$query = "SELECT * FROM passengers WHERE `pin` = '$_POST[pin]'";
    $result = mysql_query($query);


echo "Ticket has been cancelled!";
while($row = mysql_fetch_array($result)){ 
echo "&nbsp;<br> Dear&nbsp;";
echo '<b>';
echo $row['first_name'];
echo '</b>';
echo "! &nbsp;<BR>As per the <b>term and conditions </b> 23% amount will be deducted from the paid amount and you will be paid with RS.";

echo $retamt = ($row['fare'] + $row['grand_fare']) -(($row['fare'] + $row['grand_fare'])*0.23);
echo '<br>';

$passenger_id = $row['passenger_id'];
$first_name = $row['first_name'];
$address1 = $row['address1'];
$email = $row['email'];
$contact = $row['contact'];
$pin = $row['pin'];
$leaving_from = $row['leaving_from'];
$going_to = $row['going_to'];
$depart_date = $row['depart_date'];
$depart_time = $row['depart_time'];
$arrival_time = $row['arrival_time'];
$grand_fare = $row['grand_fare'];
$returning_from = $row['returning_from'];
$returning_to = $row['returning_to'];
$returning_date = $row['returning_date'];
$returning_time = $row['returning_time'];
$reaching_time = $row['reaching_time'];
$fare = $row['fare'];
$user_id = $row['user_id'];
}
mysql_query("DELETE FROM `passengers` WHERE `pin` = '$_POST[pin]'"); //or die(mysql_error());
	
mysql_query("insert into cancel (passenger_id,first_name,address1,email,contact,pin,leaving_from,going_to,depart_date,depart_time,arrival_time,grand_fare,returning_from,returning_to,returning_date,returning_time,reaching_time,fare,user_id,retamt) values ('$passenger_id','$first_name','$address1','$email','$contact','$pin','$leaving_from','$going_to','$depart_date','$depart_time','$arrival_time','$grand_fare','$returning_from','$returning_to','$returning_date','$returning_time','$reaching_time','$fare','$user_id','$retamt')");
	
	}
	?>

<?php include 'includes/overall/footer.php';?>