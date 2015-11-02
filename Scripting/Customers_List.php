<?php


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

$sql_select_command = "SELECT*FROM CUSTOMERS";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());


echo "

<html> <header><title>Customers List</title></header>

<body style = 'margin-left:12%;
   margin-right: 15%;
   border: 1px dashed #333;
   background-color: rgb(0,0,102);'>

<div name = 'center' style = 'background: white; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/customers_list_header.png);
background-repeat: no-repeat; width: 1200' >


<table style = 'position:absolute; margin-top:200px;margin-left:5%'
				cellpadding = '5px'>
	<tr>
	<th style = 'background-color: rgb(142,180,227); color : white;'>SSN</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>FIRST NAME</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>LAST NAME</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>USER NAME</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>EMAIL</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>PASSWORD</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>COUNTRY</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>BIRTHDATE</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>PHONE NUMBER</th>";
	
	while($row = mysql_fetch_array($select_command_result)){
	
		$ssn = $row["SSN"];
		$firstname = $row["FIRST_NAME"];
		$lastname = $row["LAST_NAME"];
		$username = $row["USER_NAME"];
		$email = $row["EMAIL"];
		$password = $row["PASSWORD"];
		$country = $row["COUNTRY"];
		$birthdate = $row["BIRTHDATE"];
		$phone_number = $row["PHONE_NUMBER"];
		
		echo "<tr>
		<td style = 'background-color: rgb(255,255,204);'>$ssn</td>
		<td style = 'background-color: rgb(255,255,204);'>$firstname</td>
		<td style = 'background-color: rgb(255,255,204);'>$lastname</td>
		<td style = 'background-color: rgb(255,255,204);'>$username</td>
		<td style = 'background-color: rgb(255,255,204);'>$email</td>
		<td style = 'background-color: rgb(255,255,204);'>$password</td>
		<td style = 'background-color: rgb(255,255,204);'>$country</td>
		<td style = 'background-color: rgb(255,255,204);'>$birthdate</td>
		<td style = 'background-color: rgb(255,255,204);'>$phone_number</td>
		</tr>";
		
	}
	
	echo"</table>
	
	</div></body> </html>"


?>