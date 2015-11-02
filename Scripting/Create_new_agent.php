<html>
	
	<head>
		<title> Create new agent </title>
		 <link rel = 'stylesheet' type = 'text/css' href = 'http://localhost/Website/CSS/page_style_1.css'>
	</head>
	
	<body>
		
		
		<script type = "text/javascript">

			<!--
	
				

	
				function validation()
				{
					var agent_name = document.getElementById("agent_name");
					var agent_email = document.getElementById("agent_email");
					var agent_id = document.getElementById("agent_id");
					var area_code = document.getElementById("area_code");
					var second_part = document.getElementById("second_part");
					var last_part = document.getElementById("last_part");
					var department = document.getElementById("department");
					

					var error_message = document.getElementById("error_message_area");
		
					var name_pattern = /^[a-zA-Z.\-_\s]+$/;
					var email_pattern = /^[a-zA-Z0-9]+\@[a-zA-Z0-9]{2,5}\.[a-z]{2,3}$/
					var id_pattern = /^[0-9]{6}$/
					var area_code_pattern = /^[0-9]{3}$/
					var second_part_pattern = /^[0-9]{3}$/
					var last_part_pattern = /^[0-9]{4}$/
		
					if(agent_name.value.length == 0 || agent_email.value.length == 0 
					|| agent_id.value.length == 0 || area_code.value.length == 0 || second_part.value.length == 0
					|| last_part.value.length == 0)
					{
						error_message_area.innerHTML = "One or several fields haven't been filled out!<br> Please ensure you haven't left any blank field and retry.";
						return false;
					}
		
					else if(!agent_name.value.match(name_pattern))
					{
						error_message_area.innerHTML = "Incorrect name !<br> You've included non-valid characters as part of your name.<br> Please use valid characters when writing your name." ;
						return false;
					}
					
					else if (!agent_email.value.match(email_pattern))
					{
						error_message_area.innerHTML = "Invalid e-mail !<br> Enter a valid email like abc@yahoo.com";
						return false;
					}
					
					else if(!agent_id.value.match(id_pattern)){
						area_code_pattern
						error_message_area.innerHTML = "You enteredn an invalid ID!";
						return false;
					}
					
					else if(!area_code.value.match(area_code_pattern)){
						
						error_message_area.innerHTML = "The area code should consist of three digits!";
						return false;
					}
					
					else if(!second_part.value.match(second_part_pattern)){
						
						error_message_area.innerHTML = "The second part of your phone number should have three digits!";
						return false;
					}
					
					else if(!last_part.value.match(last_part_pattern)){
						
						error_message_area.innerHTML = "The last part of your phone number should have four digits!";
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
				
					window.location= ajax_object.responseText;//Redirect to another page.
			}
		}
		
		var phpScriptURL = "http://localhost/Website/Scripting/create_agent_script.php";
		
		
		var requestParameters = "agent_name="+agent_name.value+"&department="+department.options[department.selectedIndex].value+
		"&agent_email="+agent_email.value+"&agent_id="+agent_id.value+"&area_code="+area_code.value+"&second_part="+second_part.value+
		"&last_part="+last_part.value;
		
		var url = phpScriptURL+"?"+requestParameters;
		ajax_object.open("GET",url,true);
		ajax_object.send();
		
		
	}	
//-->

</script>
		
		
		<div id = "page_content">
			
			
			<div name = 'center' style = "background: white; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/agent_create.png) ">
				
				
				<table style = "position:absolute; margin-top:400px; margin-left : 75px"
				cellspacing = "15px">
			   
			   <tr> <td> <label id = 'label'> Agent name</label> </td><td> <input id = 'agent_name' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			   
			   <tr> <td> <label id = 'label'> Agent ID </label> </td>
				<td> <input type = "text" id = "agent_id" style = 'border-radius:5px;' maxlength = "6"/> </td>
				</tr>
				
				 <tr> <td> <label id = 'label'> Agent department</label> </td>
				 
				 <td><select class = 'input' id = "department">
	
					<option value = 'FINANCE'selected >FINANCE</option>
					<option value = 'LOGISTIC'>LOGISTIC</option>
					<option value = 'MANAGEMENT'>MANAGEMENT</option>
					<option value = 'SECURITY'>SECURITY</option>
				</td>
				 </tr>
			   
			   <tr> <td> <label id = 'label'> Agent email </label> </td><td> <input id = 'agent_email' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			   
			  
			   
			    <tr> <td> <label id = 'label'> Agent Phone number </label> </td>
  <td colspan = "3">
  <input id = "area_code" type = "text" maxlength = 3 style = "width:30px" />
  <input id = "second_part" type = "text" maxlength = 3 style = "width:30px"/>
  <input id = "last_part" type = "text" maxlength = 4 style = "width:35px"/>
  </td>
  </tr>
			 
			</table>
			
			<div id = "error_message_area"style = "font-family:calibri;font-size:12;text-align:left; color:red;float:left; width:50%; height:12%;
			position: absolute; margin-top: 430px; margin-left: 420px;">
			</div>
			<div style = "position:absolute; margin-top:630px; margin-left : 600px">
<input type = "submit" value = "  Create Agent   " style = "float:right;margin-top:10%;" onclick = "validation()" />
</div>
	</div>