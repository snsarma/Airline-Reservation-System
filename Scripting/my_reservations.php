<?php


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

$sql_select_command = "SELECT*FROM CUSTOMER_RESERVATION";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());


echo "

<html> <header><title>Customers List</title></header>

<body style = 'margin-left:12%;
   margin-right: 15%;
   border: 1px dashed #333;
   background-color: rgb(0,0,102);'>

<div name = 'center' style = 'position:absolute; margin-left:6%; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/my_reservations.png);
background-repeat: no-repeat; width: 990px' >


<table style = 'position:absolute; margin-top:350px;'
				cellpadding = '5px'>
	<tr>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Card Number Name</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Expiration Date</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Security Number</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Day</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Departure Time</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>From</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>To</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Airline</th>";
	
	
	while($row = mysql_fetch_array($select_command_result)){
	
		$card_number = $row["CARD_NUMBER"];
		$exp_date = $row["EXP_DATE"];
		$sec_number = $row["SEC_NUMBER"];
		$day = $row["DAY"];
		$dept = $row["DEPT"];
		$origin = $row["ORIGIN"];
		$destination = $row["DESTINATION"];
		$airline = $row["AIRLINE"];
		
		echo "<tr>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$card_number</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$exp_date</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$sec_number</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$day</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$dept</td>
			<td style = 'background-color: rgb(0,32,96); color:white;'>$origin</td>
			<td style = 'background-color: rgb(0,32,96); color:white;'>$destination</td>
			<td style = 'background-color: rgb(0,32,96); color:white;'>$airline</td>
		</tr>";
		
	}
	
	echo"</table>
	
	</div></body> </html>";


?>