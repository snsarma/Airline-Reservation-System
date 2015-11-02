<?php


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

$sql_select_command = "SELECT*FROM AGENT";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());


echo "

<html> <header><title>Customers List</title></header>

<body style = 'margin-left:12%;
   margin-right: 15%;
   border: 1px dashed #333;
   background-color: rgb(0,0,102);'>

<div name = 'center' style = 'width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/agents_list.png);
background-repeat: no-repeat; width: 1200; margin-left:6%;' >


<table style = 'position:absolute; margin-top:350px;margin-left:5px'
				cellpadding = '5px'>
	<tr>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Agent ID</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Agent Name</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Agent Email</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Agent Department</th>
	<th style = 'background-color: rgb(142,180,227); color : white;'>Agent Phone Number</th>";
	
	while($row = mysql_fetch_array($select_command_result)){
	
		$agent_id = $row["ID_NUMBER"];
		$agent_name = $row["NAME"];
		$agent_email = $row["EMAIL"];
		$phone_number = $row["PHONE_NUMBER"];
		$department = $row["DEPARTMENT"];
		
		echo "<tr>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$agent_id</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$agent_name</td>
		<td style = 'background-color: rgb(0,32,96);color:white;'>$agent_email</td>
			<td style = 'background-color:rgb(0,32,96);color:white;'>$department</td>
			<td style = 'background-color: rgb(0,32,96);color:white;'>$phone_number</td>
		</tr>";
		
	}
	
	echo"</table>
	
	</div></body> </html>"


?>