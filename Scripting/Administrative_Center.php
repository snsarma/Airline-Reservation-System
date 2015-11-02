<!DOCTYPE html>

<html>
	
	<head>
		<title> Administrative Center </title>
		 <link rel = 'stylesheet' type = 'text/css' href = 'http://localhost/Website/CSS/page_style_1.css'>
		 
	</head>
	
	<body>
	
	<div name = 'center' style = "background: white; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/administration.png) ">
	<ul>
		
	
	<li> <a href = "http://localhost/Website/Scripting/Customer_Page.php"> Home</a></li>
	<li> <a href = "http://localhost/Website/Web Pages/Customer_Search_Page.html"> View Database</a></li>
	<li> <a href = "http://localhost/Website/Scripting/Customers_List.php"> All Customers </a></li>
	<li> <a href = "http://localhost/Website/Scripting/Update_Info_Page.php"> Update customer info </a></li>
	<li> <a href = "http://localhost/Website/Web Pages/Customer_Delete_Page.html"> Delete customer info</a></li>
	</ul>
	
	
	<table style = 'position:absolute; margin-top:500px; margin-left:50px;' cellspacing = '10px'>
	
	 <tr> <td> <label id = 'label'> Select an entity </label> </td><td>

		<select id = "entity" class = "input" onchange = "update_daylist(this.options[this.options.selectedIndex].value)">
<option value = "AGT"selected>Agent</option>
<option value = "ALC">Airline Company</option>
<option value = "AIP">Airplane</option>
<option value = "ARP">Airport</option>
<option value = "CST">Customer</option>
<option value = "FLT">Flight</option>
<option value = "TVA">Travel Agency</option>
</select>
</td></tr>

<tr> <td> <label id = 'label'> Select an action to perform </label> </td>
<td>
<select id = "action" class = "input" onchange = "update_daylist(this.options[this.options.selectedIndex].value)">
<option value = "AGT"selected>Create a new entity</option>
<option value = "ALC">View all entities</option>
<option value = "AIP">Search an entity</option>
<option value = "ARP">Update entity info</option>
<option value = "CST">Delete entity info</option>
</select>


</td></tr>
</table>


	<div style = "position:absolute; margin-top:600px; margin-left : 260px">
<input type = "submit" value = "  Proceed   " style = "float:right;margin-top:10%;" onclick = "validation()" />
</div>
	</div>
	
</body>