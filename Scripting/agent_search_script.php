<script language = "php">


/*RETRIEVE FORM DATA FROM GET REQUEST*/

$agent_name = $_POST["agent_name"];
$ssn = $_POST[agent_id];



echo "<html>
	
	<head>
		<title> Customer Search Page </title>
		 <link rel = 'stylesheet' type = 'text/css' href = 'http://localhost/Website/CSS/page_style_1.css'>
	</head>
	
	<body>
		<div name = 'center' style = 'background: white; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/background.png)'>
	
	
	<ul>
		
	
	<li> <a href = 'http://localhost/Website/index.php'> New Cutomer</a></li>
	<li> <a href = 'http://localhost/Website/Web Pages/Customer_Search_Page.html'> Search Customer</a></li>
	<li> <a href = 'http://localhost/Website/Scripting/Customers_List.php'> All Customers </a></li>
	<li> <a href = 'http://localhost/Website/index.php'> Update customer info </a></li>
	<li> <a href = 'http://localhost/Website/index.php'> Delete customer info</a></li>
	
	</ul>";
	
$query_statement;

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$test_database = mysql_select_db("test",$connection)or die(mysql_error());



if(empty($agent_name) && empty($agent_id)){
echo " <div style = 'position:absolute; margin-top:200; margin-left:50px; font-family:calibri;color:blue;'> <h2>No Search Information Specified</h2>
<hr width = '330'><h5 style = 'color:red';>Please enter either the agent's ID, name or both in the <br>Agent search page.</h5>

</div>";
exit;
}


else if(empty($ssn))
$query_statement = "SELECT*FROM AGENT WHERE NAME = '$agent_name'";

else if(empty($firstname))
$query_statement = "SELECT*FROM AGENT WHERE ID_NUMBER = '$agent_id'";

else
$query_statement = "SELECT*FROM AGENT WHERE ID_NUMBER = '$agent_id' AND NAME = '$agent_name'";

$query_result = mysql_query($query_statement,$connection) or die(mysql_error());

//Check if corresponding customer could be found.
if($query_result && ($test_row = mysql_fetch_array($query_result)) ){


echo "
 <div style = 'position:absolute; margin-top:200; margin-left:50px; font-family:calibri;color:rgb(0,176,238);'> <h2>Agent Information</h2>
 <hr width = '330'>
";

$id = $test_row["ID_NUMBER"];
$name = $test_row["NAME"];
$email = $test_row["EMAIL"];
$phone_number = $test_row["PONE_NUMBER"];
		

		echo "
			AGENT ID: $id<br><br>
			AGENT NAME: $name<br><br>
			AGENT EMAIL: $email<br><br>
			AGENT PHONE NUMBER = $phone_number
			<hr width = '330'> ";

while($row = mysql_fetch_array($query_result)){
	
		$id = $row["ID_NUMBER"];
		$name = $row["NAME"];
		$email = $row["EMAIL"];
		$phone_number = $row["PONE_NUMBER"];

		echo "
			AGENT ID: $id<br><br>
			AGENT NAME: $name<br><br>
			AGENT EMAIL: $email<br><br>
			AGENT PHONE NUMBER = $phone_number
			<hr width = '330'> ";
		
	}
	
	echo"</div></body> </html>";
}


else
{
echo " <div style = 'position:absolute; margin-top:200; margin-left:50px; font-family:calibri;color:blue;'> <h2>No Agent Found</h2>
<hr width = '330'><h5 style = 'color:red';>No agent corresponding to the search information<br> you provided could be found in the database.</h5>

</div>";
}


</script>