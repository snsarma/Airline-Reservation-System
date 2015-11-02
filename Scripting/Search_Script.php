<script language = "php">


/*RETRIEVE FORM DATA FROM GET REQUEST*/

$firstname = $_POST[firstname];
$ssn = $_POST[ssn];


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

//$query_statement = "CREATE VIEW CUSTOMERS_VIEW AS (SELECT SSN,FIRST_NAME,LAST_NAME,EMAIL,COUNTRY,PHONE_NUMBER FROM CUSTOMERS)";

//$query_result = mysql_query($query_statement,$connection) or die(mysql_error());


if(empty($firstname) && empty($ssn)){
echo " <div style = 'position:absolute; margin-top:200; margin-left:50px; font-family:calibri;color:blue;'> <h2>No Search Information Specified</h2>
<hr width = '330'><h5 style = 'color:red';>Please enter either the customer's SSN, firstname or both in the <br>Customer search page.</h5>

</div>";
exit;
}


else if(empty($ssn))
$query_statement = "SELECT*FROM CUSTOMERS_VIEW WHERE FIRST_NAME = '$firstname'";

else if(empty($firstname))
$query_statement = "SELECT*FROM CUSTOMERS_VIEW WHERE SSN = '$ssn'";

else
$query_statement = "SELECT*FROM CUSTOMERS_VIEW WHERE SSN = '$ssn' AND FIRST_NAME = '$firstname'";

$query_result = mysql_query($query_statement,$connection) or die(mysql_error());

//Check if corresponding customer could be found.
if($query_result && ($test_row = mysql_fetch_array($query_result)) ){


echo "
 <div style = 'position:absolute; margin-top:200; margin-left:50px; font-family:calibri;color:rgb(0,176,238);'> <h2>Customer Information</h2>
 <hr width = '330'>
";

$customer_ssn = $test_row["SSN"];
		$firstname = $test_row["FIRST_NAME"];
		$lastname = $test_row["LAST_NAME"];
		$email = $test_row["EMAIL"];
		$country = $test_row["COUNTRY"];
		$phone_number = $test_row["PHONE_NUMBER"];

		echo "
			SSN: $customer_ssn<br><br>
			First name: $firstname<br><br>
			Last name: $lastname<br><br>
			Email : $email<br><br>
			Country : $country<br><br>
			Phone number: $phone_number
			<hr width = '330'> ";

while($row = mysql_fetch_array($query_result)){
	
		$customer_ssn = $row["SSN"];
		$firstname = $row["FIRST_NAME"];
		$lastname = $row["LAST_NAME"];
		$email = $row["EMAIL"];
		$country = $row["COUNTRY"];
		$phone_number = $row["PHONE_NUMBER"];

		echo "
			SSN: $customer_ssn<br><br>
			First name: $firstname<br><br>
			Last name: $lastname<br><br>
			Email : $email<br><br>
			Country : $country<br><br>
			Phone number: $phone_number
			<hr width = '330'> ";
		
	}
	
	echo"</div></body> </html>";
}


else
{
echo " <div style = 'position:absolute; margin-top:200; margin-left:50px; font-family:calibri;color:blue;'> <h2>No Customer Found</h2>
<hr width = '330'><h5 style = 'color:red';>No customer corresponding to the search information<br> you provided could be found in the database.</h5>

</div>";
}


</script>