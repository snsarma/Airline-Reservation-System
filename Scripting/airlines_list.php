<?php


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

$sql_select_command = "SELECT*FROM AIRLINE_COMPANY";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());


echo "

<html> <header><title>Customers List</title></header>

<body style = 'margin-left:12%;
   margin-right: 15%;
   border: 1px dashed #333;
   background-color: rgb(0,0,102);'>

<div name = 'center' style = 'position:absolute; margin-left:6%; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/airlines.png);
background-repeat: no-repeat; width: 990px' >


<table style = 'position:absolute; margin-top:350px;'
				cellpadding = '5px'>
	<tr>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Airline Name</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Website</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Adress</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Terms and Policy</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Email</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Contact</th>";
	
	
	while($row = mysql_fetch_array($select_command_result)){
	
		$name = $row["COMPANY_NAME"];
		$website = $row["WEBSITE"];
		$address = $row["ADDRESS"];
		$tap = $row["TERMS_AND_POLICY"];
		$email = $row["EMAIL"];
		$phone_number = $row["PHONE_NUMBER"];
		
		echo "<tr>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$name</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$website</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$address</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$tap</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$email</td>
			<td style = 'background-color: rgb(0,32,96); color:white;'>$phone_number</td>
		</tr>";
		
	}
	
	echo"</table>
	
	</div></body> </html>"


?>