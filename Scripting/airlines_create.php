<?php

//-------------------------------------------------POPULATE DATABASE WITH AIRLINE COMPANIES--------------------------------------------//


$connection = mysql_connect("localhost","root","Metalgearsolid3")or die(mysql_error());
$test_database = mysql_select_db("test",$connection)or die(mysql_error());


$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('AIRPRO', 'http://wwww.airpro.com',
'104 Rassvet Arlington 14672', 'Terms and Policy in the wesite', 'airpro@gmail.com', '12534533454')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('AMERLINE', 'http://wwww.amerline.com',
'234 Rocheford AG 34672', 'Terms and Policy in the wesite', 'amerline@fastmail.com', '14535784638')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('ARISTONFLIGHT', 'http://wwww.ariston-f.com',
'805 Germinal FR 13728', 'Terms and Policy in the wesite', 'arisflight@fastmail.org', '12322358989')";

$result = mysql_query($create_command,$connection) or die (mysql_error());




$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('ARVALWAYS', 'http://wwww.arvways.org',
'294 Radis NR 19203', 'Terms and Policy in the wesite', 'arvways@gmail.com', '17338933454')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('DALTON', 'http://wwww.dalton.com',
'890 MenexVille Arlington 23007', 'Terms and Policy in the wesite', 'dalton@gmail.org', '13438960059')";

$result = mysql_query($create_command,$connection) or die (mysql_error());



$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('DX-TER', 'http://wwww.dexter.com',
'456 Netville BR 93222', 'Terms and Policy in the wesite', 'dexter@fastmail.com', '19837675664')";

$result = mysql_query($create_command,$connection) or die (mysql_error());




$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('NAZERLIGHT', 'http://wwww.nazerLight.com',
'970 Dremuchji Rus 23471', 'Terms and Policy in the wesite', 'nazerlight@gmail.com', '18433208810')";

$result = mysql_query($create_command,$connection) or die (mysql_error());





$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('PernyX', 'http://wwww.pernyx.net',
'707 Servernaya KJB 14672', 'Terms and Policy in the wesite', 'pernyx@shrotmail.com', '15460074389')";

$result = mysql_query($create_command,$connection) or die (mysql_error());





$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('V-Flight', 'http://wwww.v-flight.com',
'433 Ornika Art. 23982', 'Terms and Policy in the wesite', 'v-flight@gmail.com', '18004515943')";

$result = mysql_query($create_command,$connection) or die (mysql_error());





$create_command = "INSERT INTO AIRLINE_COMPANY (COMPANY_NAME, WEBSITE, ADDRESS,TERMS_AND_POLICY,EMAIL,PHONE_NUMBER) VALUES ('VERISFLIGHT', 'http://wwww.verisflight.com',
'902 Tajiski Rus. 29305', 'Terms and Policy in the wesite', 'verisflight@hotmail.com', '19025324334')";

$result = mysql_query($create_command,$connection) or die (mysql_error());






//-------------------------------------------------------END OF TRANSACTION WITH DATABASE-----------------------------------------------------//



echo"<h1> SUCCESSFULLY POUPULATED DATABASE!</h1>"


?>