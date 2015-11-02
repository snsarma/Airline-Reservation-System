<?php

$connection = mysql_connect('localhost','root','Metalgearsolid3') or die (mysql_error());
$database = mysql_select_db('test',$connection)or die(mysql_error());

//---------------------------------FIRST PART: CREATE TABLES FOR ENTITIES---------------------------------//



$sql_command = "CREATE TABLE CUSTOMERS (SSN BIGINT NOT NULL PRIMARY KEY, FIRST_NAME VARCHAR (50), LAST_NAME VARCHAR (50),USER_NAME VARCHAR (50),
EMAIL VARCHAR (50), PASSWORD VARCHAR (15), COUNTRY VARCHAR (100), BIRTHDATE DATE, PHONE_NUMBER INTEGER)";

 $query_result = mysql_query($sql_command,$connection)or die(mysql_error());
 
 
	$sql_command = "CREATE TABLE AGENT (ID_NUMBER INTEGER NOT NULL PRIMARY KEY, NAME VARCHAR (50),EMAIL VARCHAR (50), PHONE_NUMBER INTEGER, DEPARTMENT VARCHAR (50))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	
 
	$sql_command = "CREATE TABLE TRAVEL_AGENCY (AGENCY_NAME VARCHAR (20) NOT NULL PRIMARY KEY, WEBSITE VARCHAR (15), ADDRESS VARCHAR (50), TERMS_AND_POLICY VARCHAR (300),
	EMAIL VARCHAR(50), PHONE_NUMBER INTEGER)";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	
	//CREATE AIRLINE COMPANY TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE AIRLINE_COMPANY (COMPANY_NAME VARCHAR (20) NOT NULL PRIMARY KEY, WEBSITE VARCHAR (100), ADDRESS VARCHAR (100), TERMS_AND_POLICY VARCHAR (300),
	EMAIL VARCHAR(50), PHONE_NUMBER BIGINT)";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	//CREATE FLIGHT TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE FLIGHT (FLIGHT_NUMBER INTEGER NOT NULL PRIMARY KEY, DURATION VARCHAR(20), FLIGHT_NATURE VARCHAR (20), FLIGHT_TYPE VARCHAR (20),ORIGIN VARCHAR (100),DESTINATION 
	VARCHAR (100), AIRLINE VARCHAR (50))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	//CREATE AIRPLANE TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE AIRPLANE (NUMBER_OF_SEATS INTEGER, TYPE_OF_AIRPLAINE VARCHAR (20),AIRLINE_COMPANY_NAME VARCHAR (50),
	FOREIGN KEY (AIRLINE_COMPANY_NAME) REFERENCES AIRLINE_COMPANY (COMPANY_NAME))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	//CREATE AIRPORT TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE AIRPORT (AIRPORT_NAME VARCHAR(50) PRIMARY KEY NOT NULL, PICK_UP_SERVICE VARCHAR (20), ADDRESS_STATE VARCHAR (20), ADDRESS_CITY VARCHAR (20),
	ADDRESS_ZIP_CODE INTEGER)";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	//CREATE CUSTOMER_RESERVATION TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE CUSTOMER_RESERVATION (CARD_NUMBER BIGINT, EXP_DATE INTEGER, SEC_NUMBER INTEGER, DAY VARCHAR (20),DEPT VARCHAR (20), ORIGIN VARCHAR(50),DESTINATION VARCHAR (50),AIRLINE VARCHAR (50))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	
	
	//---------------------------------SECOND PART: CREATE TABLES FOR RELATIONSHIPS BETWEEN ENTITIES---------------------------------//
	
	
	
	//CREATE SCHEDULE TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE SCHEDULE (COMPANY_NAME VARCHAR(50), FOREIGN KEY(COMPANY_NAME)REFERENCES AIRLINE_COMPANY(COMPANY_NAME), SCHEDULE_TIME DATE)";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	//CREATE CONTACT TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE CONTACT (ID_NUMBER INTEGER, FOREIGN KEY(ID_NUMBER)REFERENCES AGENT(ID_NUMBER), CONTACT_DATE DATE, ISSUE_DESC VARCHAR(200))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	//CREATE CHOOSE TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE CHOOSE (COMPANY_NAME VARCHAR(50), FOREIGN KEY(COMPANY_NAME)  REFERENCES AIRLINE_COMPANY (COMPANY_NAME))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	//CREATE PROPOSE TABLE //-------------------------------------------------------------------------------------------------------------------------------------//
	
	$sql_command = "CREATE TABLE PROPOSE(AGENCY_NAME VARCHAR (50), FOREIGN KEY(AGENCY_NAME)  REFERENCES TRAVEL_AGENCY(AGENCY_NAME))";
	$query_result = mysql_query($sql_command,$connection)or die(mysql_error());
	//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
	
	
	
	
	if($query_result){
		echo "<h1> SUCCESSFULLY CREATED DATABASE TABLES !</h1>";
	}
	else
		echo "<h1> ERROR OCCURED !</h1>";
	
 
?>