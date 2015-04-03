<?php
echo <<<_END
<head>
		<link type="text/css" href="jquery/jquery-ui.min.css" rel="stylesheet" />
		<link type="text/css" href="jquery/jquery-ui.structure.min.css" rel="stylesheet" />
		<link type="text/css" href="jquery/jquery-ui.theme.min.css" rel="stylesheet" />
		<link type="text/css" href="jquery/jquery-ui.theme.css" rel="stylesheet" />
		<script src="external/jquery/jquery.js"></script>
		<script src="jquery/jquery-ui.js"></script>
		<script src="jquery/jquery-ui.min.js" type="text/javascript"></script>
		<script src="jquery/jquery-ui.structure.min.js" type="text/javascript"></script>
		
	<form method="POST" action="runQuery.php">
 		First Name: 
			<input type="text" name="firstName" value=""><br>
	
		Last Name: 
			<input type="text" name="lastName" value=""><br>
	
		Email: 
			<input type="text" name="email" value=""><br>
	
		PIDM: 
			<input type="text" name="pidm" value=""><br>
		Location: 
			<input type="text" name="location" value=""><br>
		
 	 <script>
		$(function(){
 			 $.datepicker.setDefaults(
  			 $.extend( $.datepicker.regional[ '' ] ));
			if('#dateStart'){
 			 	$( '#dateStart' ).datepicker();}
			if('#dateEnd'){
				$( '#dateEnd' ).datepicker();}
		});
  	</script>
	
		<p>Date Start: <input type="text" id="dateStart"name="dateStart"></p>
				
		<p>Date End: <input type="text" id="dateEnd"name="dateEnd"></p>
		
		<input type='submit' value='submit'>
		</form>
		</head>
		
_END;

?>