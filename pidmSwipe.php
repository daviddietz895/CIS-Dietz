<?php
require_once "DBAttr.php";

$db_server = mysql_connect ( $db_hostname, $db_username, $db_password );
if (! $db_server)
	die ( "Unable to connect to MySql: " . mysql_error () );
	
	// Connect to the DB
mysql_select_db ( $db_database ) or die ( "Unable to select Database: " . mysql_error () );
echo <<<_END
  <form method="POST" name="finder" action="pidmSwipe.php">
  <table align="center" style="margin-top:250px;">
	<th>First<br><input type="text" name="firstName" value=""></th>
	<th>Last<br><input type="text" name="lastName" value=""></th>
	<th>Email<br><input type="text" name="email" value=""></th>
	<th>PIDM<br><input type="text" name="pidm" value=""autofocus></th>
_END;
$firstName = $_POST ['firstName'];
$lastName = $_POST ['lastName'];
$email = $_POST ['email'];
$pidm = $_POST ['pidm'];
$pidm = substr ( $pidm, 6, 9 );

$query = "SELECT firstName, lastName, email FROM student WHERE 1=1  ";
if ($firstName != "") {
	
	$query .= " AND firstName='$firstName'";
}
if ($lastName != "") {
	
	$query .= " AND lastName='$lastName' ";
}
if ($email != "") {
	
	$query .= " AND email='$email'";
}
if ($pidm != "") {
	
	$query .= " AND PIDM='$pidm'";
}
$result = mysql_query ( $query );
unset ( $_POST ['firstName'] );
unset ( $_POST ['lastName'] );
unset ( $_POST ['email'] );

$result = mysql_query ( $query );
if (! $result)
	die ( "Database access failed: " . mysql_error () );

$rows = mysql_num_rows ( $result );

for($i = 0; $i < $rows; $i ++) {
	$row = mysql_fetch_row ( $result );
	echo "<tr>";
	
	echo <<<_END
	<td><p>$row[0]</p></td>
	<td><p>$row[1]</p></td>
	<td><p>$row[2]</p></td>
_END;
}
echo "<input type='submit' value='submit'style='display: none;'>";

?>