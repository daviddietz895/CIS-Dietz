<?php
require_once "DBAttr.php";
include "queryOptions.php";

$db_server = mysql_connect ( $db_hostname, $db_username, $db_password );
if (! $db_server)
	die ( "Unable to connect to MySql: " . mysql_error () );
	
	// Connect to the DB
mysql_select_db ( $db_database ) or die ( "Unable to select Database: " . mysql_error () );
$firstName = "";
$lastName = "";
$email = "";
$pidm = "";
$startDate = "";
$endDate = "";
$location = "";

	if (isset( $_POST['firstName'] )) {	$firstName = $_POST ['firstName'];}
	if (isset( $_POST['lastName'] )) {	$lastName = $_POST ['lastName'];}
	if (isset( $_POST['email'] )) {	$email = $_POST ['email'];}
	if (isset( $_POST['pidm'] )) {	$pidm = $_POST ['pidm'];}
	if (isset( $_POST['dateStart'] )) {	$startDate = $_POST ['dateStart'];}
	if (isset( $_POST['dateEnd'] )) {	$endDate = $_POST ['dateEnd'];}
	if (isset( $_POST['location'] )) {	$location = $_POST ['location'];}


echo <<<_END
<link rel="stylesheet" type="text/css" href="table/tableSort.css"/>
<script type="text/javascript" src="table/sortable.js"></script>

  <table id="anyid" class="sortable" align="center" style="margin-top:250px;">
	<th>First<br><input type="text" name="firstName" value=""></th>
	<th>Last<br><input type="text" name="lastName" value=""></th>
	<th>Email<br><input type="text" name="email" value=""></th>
	<th>PIDM<br><input type="text" name="pidm" value=""></th>
	<th>Start Date<br><input type="text" name="startDate" value=""></th>
	<th>End Date<br><input type="text" name="endDate" value=""></th>
	<th>Location<br><input type="text" name="location" value=""></th>
	
_END;
$query = "SELECT student.firstName, student.lastName, student.email,student.pidm, hours.dateStart, hours.dateEnd, hours.location 
		FROM student JOIN hours ON student.uniqueId=hours.uniqueId  WHERE 1=1 ";

if ($firstName != "") {
	
	$query .= " AND student.firstName='$firstName'";
}
if ($lastName != "") {
	
	$query .= " AND student.lastName='$lastName' ";
}
if ($email != "") {
	
	$query .= " AND student.email='$email'";
}
if ($pidm != "") {
	
	$query .= " AND student.PIDM='$pidm'";
}
if ($startDate != "") {
	$query .= " AND hours.dateStart>='$startDate'";
}
if ($endDate != "") {
	
	$query .= " AND hours.dateEnd<='$endDate'";
}
if ($location != "") {
	
	$query .= " AND hours.location='$location'";
}
	unset($_POST ['firstName']);
	unset($_POST ['lastName']);
	unset($_POST ['email']);
	unset($_POST ['pidm']);
	unset($_POST ['dateStart']);
	unset($_POST ['dateEnd']);
	unset($_POST ['location']);
$result = mysql_query ( $query );

$result = mysql_query ( $query );
if (! $result)
	die ( "Database access failed: " . mysql_error () );

$rows = mysql_num_rows ( $result );

for($i = 0; $i < $rows; $i ++) {
	$row = mysql_fetch_row ( $result );
	echo "<tr>";
	for($r=0; $r<count($row); $r++){
	echo <<<_END
	
	<td><p>$row[$r]</p></td>
	
			
	
_END;
	}
}

?>