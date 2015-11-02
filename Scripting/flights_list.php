<?php


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

$sql_select_command = "SELECT*FROM FLIGHT";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());


echo "

<html> <header><title>Flights List</title></header>

<body style = 'margin-left:12%;
   margin-right: 15%;
   border: 1px dashed #333;
   background-color: rgb(0,0,102);'>

<div name = 'center' style = 'position:absolute; margin-left:6%; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/flights.png);
background-repeat: no-repeat; width: 990px' >


<table style = 'position:absolute; margin-top:350px;'
				cellpadding = '5px'>
	<tr>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Flight Number</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Duration</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Nature</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Type</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>From</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>To</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Airline</th>";
	
	
	while($row = mysql_fetch_array($select_command_result)){
	
		$number = $row["FLIGHT_NUMBER"];
		$duration = $row["DURATION"];
		$nature = $row["FLIGHT_NATURE"];
		$type = $row["FLIGHT_TYPE"];
		$origin = $row["ORIGIN"];
		$destination = $row["DESTINATION"];
		$airline = $row["AIRLINE"];
		echo "<tr>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$number</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$duration</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$nature</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$type</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$origin</td>
			<td style = 'background-color: rgb(0,32,96); color:white;'>$destination</td>
			<td style = 'background-color: rgb(0,32,96); color:white;'>$airline</td>
		</tr>";
		
	}
	
	echo"</table>
	
	</div></body> </html>"


?>