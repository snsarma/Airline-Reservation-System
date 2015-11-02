<?php

//-------------------------------------------------POPULATE DATABASE WITH FLIGHTS--------------------------------------------//


$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$test_database = mysql_select_db("test",$connection)or die(mysql_error());


$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('21345', '1h20min',
'Domestic Flight', 'Direct', 'Rochester', 'Sacramento', 'DX-TER')";

$result = mysql_query($create_command,$connection) or die (mysql_error());




$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('18206', '3h40min',
'International Flight', 'Direct', 'Paris', 'London', 'NazerLight')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('10642', '4h15min',
'International Flight', 'Connecting', 'Ottawa', 'Tokyo', 'ArvalWays')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('48165', '2h05min',
'Domestic Flight', 'Direct', 'Johannesbourg', 'Brazzaville', 'V-Flight')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('20345', '1h20min',
'Domestic Flight', 'Direct', 'Rochester', 'Sacramento', 'DX-TER')";

$result = mysql_query($create_command,$connection) or die (mysql_error());


$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('43429', '08h27min',
'International Flight', 'Direct', 'Pekin', 'Sacramento', 'AirPro')";


$result = mysql_query($create_command,$connection) or die (mysql_error());


$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('12045', '45min',
'International Flight', 'Direct', 'Ottawa', 'Rochester,NY', 'AristonFlight')";

$result = mysql_query($create_command,$connection) or die (mysql_error());


$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('22345', '1h20min',
'International', 'Connecting', 'Tokyo', 'Paris', 'PernyX')";

$result = mysql_query($create_command,$connection) or die (mysql_error());


$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('36224', '9h07min',
'International', 'Connecting', 'Brazzaville', 'Madrid', 'Dalton')";

$result = mysql_query($create_command,$connection) or die (mysql_error());




$create_command = "INSERT INTO FLIGHT (FLIGHT_NUMBER, DURATION,FLIGHT_NATURE,FLIGHT_TYPE,ORIGIN,DESTINATION,AIRLINE) VALUES ('42736', '2h23min',
'International', 'Direct', 'Tokyo', 'Pekin', 'VerisFlight')";

$result = mysql_query($create_command,$connection) or die (mysql_error());





//-------------------------------------------------------END OF TRANSACTION WITH DATABASE-----------------------------------------------------//


if($result)
echo"<h1> SUCCESSFULLY POUPULATED DATABASE!</h1>"


?>