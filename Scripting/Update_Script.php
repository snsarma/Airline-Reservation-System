<script language = "php">


/*RETRIEVE FORM DATA FROM GET REQUEST*/

$u_ssn = $_GET["u_ssn"];
$u_firstname = $_GET["u_firstname"];

$firstname = $_GET["firstname"];
$lastname = $_GET["lastname"];
$username = $_GET["username"];
$country = $_GET["country"];
$email = $_GET["email"];
$password = $_GET["password"];
$year = $_GET["year"];
$month = $_GET["month"];
$month_int = 0;//Initialization.
$day = $_GET["day"];
$ssn = $_GET["ssn"];
$area_code = $_GET["area_code"];
$second_part = $_GET["second_part"];
$last_part = $_GET["last_part"];
$phone_number = intval($area_code.$second_part.$last_part);

if(!empty($month) && !(empty($day)) && !(empty($year))){

if($month == "JAN")
	$month_int = 01;
else if ($month == "FEB")
	$month_int = 02;
	else if ($month == "MAR")
	$month_int = 03;
	else if ($month == "APR")
	$month_int = 04;
	else if ($month == "MAY")
	$month_int = 05;
	else if ($month == "JUN")
	$month_int = 06;
	else if ($month == "JUL")
	$month_int = 07;
	else if ($month == "AUG")
	$month_int = 08;
	else if ($month == "SEP")
	$month_int = 09;
	else if ($month == "OCT")
	$month_int = 10;
	else if ($month == "NOV")
	$month_int = 11;
	else 
	$smonth_int = 12;
	
	$birthdate = $year. "-".$month_int."-".$day;
}


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());


//FIRST, CHECK WHETHER THE SPECIFIED CUSTOMER IS IN THE DATABASE

 if(empty($u_ssn))
$query_statement = "SELECT*FROM CUSTOMERS WHERE FIRST_NAME = '$u_firstname'";

else if(empty($u_firstname))
$query_statement = "SELECT*FROM CUSTOMERS WHERE SSN = '$u_ssn'";

else
$query_statement = "SELECT*FROM CUSTOMERS WHERE SSN = '$u_ssn' AND FIRST_NAME = '$u_firstname'";

//QUERY DATABASE
$query_result = mysql_query($query_statement,$connection) or die(mysql_error());

//Check if corresponding customer could be found.
if($query_result && !($test_row = mysql_fetch_array($query_result))){

//At this point the specified customer exits in the database, and now, check the fields to update!

if(!(empty($u_firstname))){

if(!(empty($firstname))){
$query_statement = "UPDATE CUSTOMERS SET FIRST_NAME = '$firstname' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if(!(empty($lastname))){
$query_statement = "UPDATE CUSTOMERS SET LAST_NAME = '$lastname' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}
if(!(empty($username))){
$query_statement = "UPDATE CUSTOMERS SET USER_NAME = '$username' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}
if(!(empty($email))){
$query_statement = "UPDATE CUSTOMERS SET EMAIL = '$email' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}
if(!(empty($password))){
$query_statement = "UPDATE CUSTOMERS SET PASSWORD = '$password' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if(!(empty($ssn))){
$query_statement = "UPDATE CUSTOMERS SET SSN = '$ssn' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if(!(empty($phone_number))){
$query_statement = "UPDATE CUSTOMERS SET PHONE_NUMBER = '$phone_number' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if($country != "Country..."){
$query_statement = "UPDATE CUSTOMERS SET COUNTRY = '$country' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if($birthdate != "1940-01-01"){
$query_statement = "UPDATE CUSTOMERS SET BIRTHDATE = '$birthdate' WHERE FIRST_NAME = '$u_firstname'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

}



else if(!empty($u_ssn)){


if(!(empty($firstname))){
$query_statement = "UPDATE CUSTOMERS SET FIRST_NAME = '$firstname' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if(!(empty($lastname))){
$query_statement = "UPDATE CUSTOMERS SET LAST_NAME = '$lastname' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}
if(!(empty($username))){
$query_statement = "UPDATE CUSTOMERS SET USER_NAME = '$username' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}
if(!(empty($email))){
$query_statement = "UPDATE CUSTOMERS SET EMAIL = '$email' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}
if(!(empty($password))){
$query_statement = "UPDATE CUSTOMERS SET PASSWORD = '$password' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if(!(empty($ssn))){
$query_statement = "UPDATE CUSTOMERS SET SSN = '$ssn' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if(!(empty($phone_number))){
$query_statement = "UPDATE CUSTOMERS SET PHONE_NUMBER = '$phone_number' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if($country != "Country..."){
$query_statement = "UPDATE CUSTOMERS SET COUNTRY = '$country' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

if($birthdate != "1940-01-01"){
$query_statement = "UPDATE CUSTOMERS SET BIRTHDATE = '$birthdate' WHERE SSN = '$u_ssn'";
$query_result = mysql_query($query_statement,$connection)or die(mysql_error());
}

}
 echo "http://localhost/Website/Scripting/Customers_List.php";
}//End of update.


else {
	echo "No such customer could be found.";
}
</script>