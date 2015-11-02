<script language = "php">


/*RETRIEVE FORM DATA FROM GET REQUEST*/

$d_ssn = $_GET["d_ssn"];
$d_firstname = $_GET["d_firstname"];

/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

$delete_statement;
$result;


if(empty($d_ssn))

$delete_statement = "DELETE FROM CUSTOMERS WHERE FIRST_NAME = '$d_firstname'";


else if (empty($d_firstname))

$delete_statement = "DELETE FROM CUSTOMERS WHERE SSN = '$d_ssn'";

else 
$delete_statement = "DELETE FROM CUSTOMERS WHERE SSN = '$d_ssn' AND FIRST_NAME = '$d_firstname'";

$result = mysql_query($delete_statement,$connection) or die(mysql_error());

if($result){

	echo "http://localhost/Website/Scripting/Customers_List.php";
	
}

</script>