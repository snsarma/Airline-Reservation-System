
<script language = "php">

/*RETRIEVE FORM DATA FROM GET REQUEST*/

$agent_name = $_GET["agent_name"];
$agent_email = $_GET["agent_email"];
$agent_id = $_GET["agent_id"];
$department = $GET_["department"];
$area_code = $_GET["area_code"];
$second_part = $_GET["second_part"];
$last_part = $_GET["last_part"];
$phone_number = intval($area_code.$second_part.$last_part);


/*Operate with database*/

$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$netsat_database = mysql_select_db("test",$connection)or die(mysql_error());


$sql_select_command = "SELECT*FROM AGENT";
$select_command_result = mysql_query($sql_select_command,$connection)or die(mysql_error());

if($select_command_result)
{
	while($row = mysql_fetch_array($select_command_result))
	{
		if($row["NAME"] == $agent_name)
		{
			echo "Agent name already taken!";
			exit;
		}
		
	}
	
	
	$sql_insert_command = "INSERT INTO AGENT (ID_NUMBER,NAME,EMAIL,PHONE_NUMBER,DEPARTMENT) 
	VALUES ('$agent_id','$agent_name','$agent_email','$phone_number','$department')";
	
	$insert_command_result = mysql_query($sql_insert_command,$connection)or die(mysql_error());
	
	if($insert_command_result){
		echo "http://localhost/Website/Scripting/agents_list.php ";
		exit;
	}
}

</script>