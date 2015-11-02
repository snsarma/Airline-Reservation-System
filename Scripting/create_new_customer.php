
<script language = "php">

/*RETRIEVE FORM DATA FROM GET REQUEST*/

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
/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());


$sql_select_command = "SELECT*FROM CUSTOMERS";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());

if($select_command_result)
{
	while($row = mysql_fetch_array($select_command_result))
	{
		if($row["USER_NAME"] == $username)
		{
			echo "User name already taken!";
			exit;
		}
		elseif(($row["LAST_NAME"]==$lastname)&&($row["FIRST_NAME"]==$firstname))
		{
			echo "This user already exists!";
			exit;
		}
		
	}
	
	
	$sql_insert_command = "INSERT INTO CUSTOMERS (SSN,FIRST_NAME,LAST_NAME,USER_NAME,EMAIL,PASSWORD,COUNTRY,BIRTHDATE,PHONE_NUMBER) 
	VALUES ('$ssn','$firstname','$lastname','$username','$email','$password','$country','$birthdate','$phone_number')";
	
	$insert_command_result = mysql_query($sql_insert_command,$connection)or die(mysql_error());
	
	if($insert_command_result){
		echo "http://localhost/Website/Scripting/Customer_Page.php";
		exit;
	}
}

</script>