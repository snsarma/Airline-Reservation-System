
<script language = "php">

/*RETRIEVE FORM DATA FROM GET REQUEST*/

$airline = $_GET["airline"];
$agent_email = $_GET["agent_email"];
$origin = $_GET["origin"];
$destination = $GET_["destination"];
$weekdays = $_GET["weekdays"];
$hours = $_GET["hours"];
$card_number = $_GET["card_number"];
$month = $_GET["month"];
$year = $_GET["year"];
$sec_number = $_GET["sec_number"];

$exp_date = intval($month.$year);


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());

	
	$sql_insert_command = "INSERT INTO CUSTOMER_RESERVATION (CARD_NUMBER,EXP_DATE,SEC_NUMBER,DAY,DEPT,ORIGIN,DESTINATION,AIRLINE) 
	VALUES ('$card_number','$exp_date','$sec_number','$weekdays', '$hours','$origin', '$destination','$airline')";
	
	$insert_command_result = mysql_query($sql_insert_command,$connection)or die(mysql_error());
	
	if($insert_command_result){
		echo "http://localhost/Website/Scripting/my_reservations.php";
		exit;
	}


</script>