

<html>
	
	<head>
		<title> Customer Page </title>
		 <link rel = 'stylesheet' type = 'text/css' href = 'http://localhost/Website/CSS/page_style_1.css'>
		 
	</head>
	
	<body>
	
	
	
	<script type = "text/javascript">

			
	
				function validation()
				{
					
					var month = document.getElementById("month");
					var year = document.getElementById("year");
					var hours = document.getElementById("hours");
					var weekdays = document.getElementById("weekdays");
					var origin = document.getElementById("origin");
					var destination = document.getElementById("destination");
					var airline = document.getElementById("airline");
					var card_number = document.getElementById("card_number");
					var sec_number = document.getElementById("sec_number");
					

					var error_message = document.getElementById("error_message_area");
		
					var card_pattern = /^[0-9]{16}$/
					var pattern = /^[0-9]{2}$/
					var sec_pattern = /^[0-9]{3}$/
					
		
					if(month.value.length == 0 || year.value.length == 0 || card_number.value.length == 0 
					|| sec_number.value.length == 0 )
					{
						error_message_area.innerHTML = "One or several fields haven't been filled out!<br> Please ensure you haven't left any blank field and retry.";
						return false;
					}
		
					else if(!month.value.match(pattern)|| !year.value.match(pattern))
					{
						error_message_area.innerHTML = "Incorrect expiration date!" ;
						return false;
					}
					
					
					
					else if(!card_number.value.match(card_pattern)){
						error_message_area.innerHTML = "Incorrect card number!</br>Your card number has 16 digits";
						return false;
					}
					
		
		//SEND FORM DATA
		
		var ajax_object;//Variable used to interact with the server.
		
		try
		{
			ajax_object = new XMLHttpRequest();
		}
		catch(ajax_exception)
		{
			try
			{
				ajax_object = new ActiveXObject("Msxml2.XMLHTTP");
			}
			catch(another_ajax_exception)
			{
				try
				{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				catch(final_exception)
				{
					return false;
				}
			}
		}
		
		ajax_object.onreadystatechange = function()
		{
			if(ajax_object.readyState == 4)
			{
				
					window.location = ajax_object.responseText;//Redirect to another page.
			}
		}
		
		var phpScriptURL = "http://localhost/Website/Scripting/reservation.php";
		
		
		var requestParameters = "airline="+airline.options[airline.selectedIndex].value+"&origin="+origin.options[origin.selectedIndex].value+"&destination="+destination.options[destination.selectedIndex].value+
		"&weekdays="+weekdays.options[weekdays.selectedIndex].value+"&hours="+hours.options[hours.selectedIndex].value+"&card_number="+card_number.value+"&month="+month.value+"&year="+year.value+"&sec_number="+sec_number.value;
		
		var url = phpScriptURL+"?"+requestParameters;
		ajax_object.open("GET",url,true);
		ajax_object.send();
		
	}	
//-->

</script>
	
	
	
	
	
	
	
	
	
	<div name = 'center' style = "background: white; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/home_background.png) ">
	<ul>
		
	
	<li> <a href = "http://localhost/Website/index.php"> New Cutomer</a></li>
	<li> <a href = "http://localhost/Website/Web Pages/Customer_Search_Page.html"> Search Customer</a></li>
	<li> <a href = "http://localhost/Website/Scripting/Customers_List.php"> All Customers </a></li>
	<li> <a href = "http://localhost/Website/Scripting/Update_Info_Page.php"> Update customer info </a></li>
	<li> <a href = "http://localhost/Website/Web Pages/Customer_Delete_Page.html"> Delete customer info</a></li>
	
	
	</ul>
	
	
	<table style = 'position:absolute; margin-top:200px; margin-left:40px' cellpadding = '10' cellspacing ='0' border = '1'>
		<tr style = "background-color:rgb(0,0,153); color:white; font-family:calibri; font-weight:bold"><td><a style = "background-color:rgb(0,0,153); color:white"
		href ="http://localhost/Website/Scripting/agents_list.php"> View all agents</td> </a></tr>
		<tr style = "background-color:rgb(0,0,153); color:white; font-family:calibri; font-weight:bold"><td><a style = "background-color:rgb(0,0,153); color:white"
		href ="http://localhost/Website/Web Pages/Agent_Search_Page.html"> Contact an agent</td></a> </tr>
		
		<tr style = "background-color:rgb(0,0,153); color:white; font-family:calibri; font-weight:bold"><td><a style = "background-color:rgb(0,0,153); color:white"
		href ="http://localhost/Website/Scripting/Create_new_agent.php"> Create an agent</td></a> </tr>
		<tr style = "background-color:rgb(0,0,153); color:white; font-family:calibri; font-weight:bold"><td> <a style = "background-color:rgb(0,0,153); color:white"
		href ="http://localhost/Website/Scripting/airlines_list.php">View all airline companies</a></td> </tr>
		<tr style = "background-color:rgb(0,0,153); color:white;font-family:calibri; font-weight:bold"><td><a style = "background-color:rgb(0,0,153); color:white"
		href ="http://localhost/Website/Scripting/flights_list.php"> View all flights</a></td> </tr>
		
		<tr  style = "background-color:rgb(0,0,153); color:white;  font-family:calibri; font-weight:bold"><td><a style = "background-color:rgb(0,0,153); color:white" 
		href ="http://localhost/Website/Scripting/my_reservations.php"> My Reservations</a></td> </tr>
		
		<tr  style = "background-color:rgb(0,0,153); color:white;  font-family:calibri; font-weight:bold"><td><a style = "background-color:rgb(0,0,153); color:white" href ="http://"> About us</a></td> </tr>
	</table>
	
	
	
	<table style = 'position:absolute; margin-top:330px; margin-left:270px' cellspacing = '10px' cellpadding = '5px' > 
	
	<tr> <td><label id = 'label'> Airline Company </label></td> <td> <select id = 'airline'>
	<option value = "AIRPRO"selected>AirPro</option>
	<option value = "AMERLINE">Amerline</option>
	<option  value = "ARISTONFLIGHT">AristonFlight</option>
	<option value = "ARVALWAYS" >ArvalWays</option>
	<option  value = "DALTON">Dalton</option>
	<option  value = "DX-TER">DX-TER</option>
	<option value = 'NAZERLIGHT'>NazerLight</option>
	<option value = 'PERNYX'>PernyX</option>
	<option value = 'V-FLIGHT'>V-Flight</option>
	<option value = 'VERISFLIGHT'>VerisFlight</option>
	</select>
	</td></tr>
	
	<tr> <td><label id = 'label'> From</label></td>   <td><select id = 'origin'>
	<option value = "BRAZZAVILLE"selected>Brazzaville</option>
	<option value = "JOHANNESBOURG"selected>Johanesburg</option>
	<option value = "LONDON"selected>London</option>
	<option value = "MADRID"selected>Madrid</option>
	<option value = "OTTAWA"selected>Ottawa</option>
	<option value = "PARIS"selected>Paris</option>
	<option value = "PEKIN"selected>Pekin</option>
	<option value = "ROCHESTER"selected>Rochester</option>
	<option value = "SACRAMENTO"selected>Sacramento</option>
	<option value = "TOKYO"selected>Tokyo</option>
	
	</select></td>
	<td><label id = 'label'> To</label></td>
	<td><select id = 'destination'>
	<option value = "BRAZZAVILLE"selected>Brazzaville</option>
	<option value = "JOHANNESBOURG"selected>Johanesburg</option>
	<option value = "LONDON"selected>London</option>
	<option value = "MADRID"selected>Madrid</option>
	<option value = "OTTAWA"selected>Ottawa</option>
	<option value = "PARIS"selected>Paris</option>
	<option value = "PEKIN"selected>Pekin</option>
	<option value = "ROCHESTER"selected>Rochester</option>
	<option value = "SACRAMENTO"selected>Sacramento</option>
	<option value = "TOKYO"selected>Tokyo</option>
	</td>
	</tr>
	
	<tr><td><label id = 'label'> Day</label></td>
	
	<td><select id = 'weekdays'>
	<option value = "MONDAY"selected>Monday</option>
	<option value = "TUESDAY" >Tuesday</option>
	<option value = "WEDNESDAY">Wednesday</option>
	<option value = "THURSDAY">Thursday</option>
	<option value = "FRIDAY">Friday</option>
	<option value = "SATURDAY">Saturday</option>
	<option value = "SUNDAY">Sunday</option>
	</td>
	
	
	</tr>
	
	
	<tr><td><label id = 'label'> Departure time</label></td>
	
	<td><select id = 'hours'>
	<option value = "9h:30"selected>9h:30</option>
	<option value = "10h:30">10h:30</option>
	<option value = "14h:00">14h:00</option>
	<option value = "14h:30">14h:30</option>
	<option value = "16h:15">16h:15</option>
	<option value = "18h:05">18h:05</option>
	<option value = "21h:30">21h:30</option>
	</td>
	</tr>
	</table>
	
	
	<table style = 'position:absolute; margin-top:540px; margin-left:270px' cellspacing = '10px' cellpadding = '5px' > 
	
	<tr> <td><label id = 'label'> Credit card number</label></td><td><input id = 'card_number' class = 'input'  style = 'border-radius:5px;'maxlength = '16'/> </td></tr>
	<tr> <td><label id = 'label'> Expiration Date</label></td>
	
	<td colspan = "2">
  <input id = "month" type = "text" maxlength = 2 style = "width:25px; border-radius:5px;" />
  <input id = "year" type = "text" maxlength = 2 style = "width:25px;border-radius:5px;"/>
  </td>
  </tr>
  
  <tr> <td><label id = 'label'> Security number</label></td> <td><input id = "sec_number" type = "text" maxlength = 3 style = "width:30px;border-radius:5px;" /></td> </tr>
	</table>
	
	
	<div id = "error_message_area"style = "font-family:calibri;font-size:12;text-align:left; color:red;float:left; width:50%; height:12%;
			position: absolute; margin-top: 670px; margin-left: 400px;">
			</div>
	
	
	
	<div style = "position:absolute; margin-top:710px; margin-left : 650px">
<input type = "submit" value = "  Proceed   " style = "float:right;margin-top:10%;" onclick = "validation()" />
</div>
	
	
	
	</div>
	
	
	
	
	
	</body>
</html>