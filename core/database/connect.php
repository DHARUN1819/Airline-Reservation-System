<?php 
$connect_error = 'sorry, server is down';
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('lr') or die($connect_error);


?>