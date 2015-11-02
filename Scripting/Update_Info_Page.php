

<html>
	
	<head>
		<title> Update Customer Info </title>
		 <link rel = 'stylesheet' type = 'text/css' href = 'http://localhost/Website/CSS/page_style_1.css'>
	</head>
	
	<body>
	
	<script type = "text/javascript">

			<!--
	
				function update_daylist(value)
				{
					if (value == "JAN" ||value == "MAR" || value == "MAY" ||value == "JUL" || value == "AUG" ||value == "OCT" || value == "DEC")
					{
						var daylist = document.getElementById('days').options;
						daylist.length = 0;
			
			
					for(var day = 0; day < 31; day++)
					{
						daylist[day] = new Option(day+1,day+1);
					}
					
					}
					else if (value == "APR" ||value == "JUN" || value == "MAY" ||value == "SEP" || value == "NOV")
					{
						var daylist = document.getElementById('days').options;
						daylist.length = 30;
			
						for(var day = 0; day < 30; day++)
						{
							daylist[day] = new Option(day+1,day+1);
						}
					}
					else
					{
						var daylist = document.getElementById('days').options;
						daylist.length = 29;
			
						for(var day = 0; day < 29; day++)
						{
							daylist[day] = new Option(day+1,day+1);
						}
					}
				}//End of update_daylist() function.

	
				function validation()
				{
					var firstname = document.getElementById("firstname");
					var lastname = document.getElementById("lastname");
					var username = document.getElementById("username");
					var email = document.getElementById("email");
					var password = document.getElementById("password");
					var cfrm_password = document.getElementById("cfrm_password");
					var month = document.getElementById("month");
					var days = document.getElementById("days");
					var year = document.getElementById("year");
					var country = document.getElementById("country");
					var ssn = document.getElementById("ssn");
					var area_code = document.getElementById("area_code");
					var second_part = document.getElementById("second_part");
					var last_part = document.getElementById("last_part");
					var u_firstname = document.getElementById("u_firstname");
					var u_ssn = document.getElementById("u_ssn");
					

					var error_message = document.getElementById("error_message_area");
		
					var name_pattern = /^[a-zA-Z.\-_\s]+$/;
					var email_pattern = /^[a-zA-Z0-9]+\@[a-zA-Z0-9]{2,5}\.[a-z]{2,3}$/
					var ssn_pattern = /^[0-9]{15}$/
					var area_code_pattern = /^[0-9]{3}$/
					var second_part_pattern = /^[0-9]{3}$/
					var last_part_pattern = /^[0-9]{4}$/
		
					if(u_firstname.value.length == 0 && u_ssn.value.length == 0)

					{
						error_message_area.innerHTML = "Specify either the Customer's SSN, name or both";
						return false;
					}
					
					else if(firstname.value.length == 0 && lastname.value.length == 0 && username.value.length == 0 
					&& email.value.length == 0 && password.value.length == 0 && ssn.value.length == 0 && area_code.value.length == 0 && second_part.value.length == 0
					&& last_part.value.length == 0)
					{
						error_message_area.innerHTML = "Specify at least one field to update.";
						return false;
					}
		
					else if(!firstname.value.match(name_pattern)|| !lastname.value.match(name_pattern))
					{
						error_message_area.innerHTML = "Incorrect name !<br> You've included non-valid characters as part of your name.<br> Please use valid characters when writing your name." ;
						return false;
					}
					else if(firstname.value == lastname.value)
					{
						error_message_area.innerHTML = "First name and last name identical !<br>User should have different first and last name(s)."
						return false;
					}
					else if(country.value == "Country")
					{
						error_message_area.innerHTML = "Country not specified!<br>Please select a country from the drop-down menu and retry."
						return false;
					}
					else if (!email.value.match(email_pattern))
					{
						error_message_area.innerHTML = "Invalid e-mail !<br> Enter a valid email like abc@yahoo.com";
						return false;
					}
					
					else if(!ssn.value.match(ssn_pattern)){
						area_code_pattern
						error_message_area.innerHTML = "You enteredn an invalid SSN !";
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
					else if (password.value.length < 6 || cfrm_password.value.length < 6)
					{
						error_message_area.innerHTML = "Password too short ! <br>Your password should include at least 6 characters.";
						return false;
					}
					else if (password.value.length > 50 || cfrm_password.value.length > 50)
					{
						error_message_area.innerHTML = "Password too long ! <br>Your password should not include more than 20 characters.";
						return false;
					}
					else if (password.value !=  cfrm_password.value)
				{
						error_message_area.innerHTML = "Different passwords !<br> You've entered two different passwords.<br>Please ensure you enter the same characters and check the case.";
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
		
		var phpScriptURL = "http://localhost/Website/Scripting/create_new_customer.php";
		
		
		var requestParameters = "firstname="+firstname.value+"&lastname="+lastname.value+"&username="+username.value+"&country="+country.value+
		"&email="+email.value+"&password="+password.value+"&year="+year.value+"&month="+month.options[month.selectedIndex].value+
		"&day="+days.options[days.selectedIndex].value+"&ssn="+ssn.value+"&area_code="+area_code.value+"&second_part="+second_part.value+
		"&last_part="+last_part.value;
		
		var url = phpScriptURL+"?"+requestParameters;
		ajax_object.open("GET",url,true);
		ajax_object.send();
		alert(url);
		
		
	}	
//-->

</script>
	
	
	<div name = 'center' style = "background: white; width:815px; height:800px;background-image: url(http://localhost/Website/Resources/Images/update_page.png) ">
	
	
	<ul>
		
	
	<li> <a href = "http://localhost/Website/index.php"> New Cutomer</a></li>
	<li> <a href = "http://localhost/Website/Web Pages/Customer_Search_Page.html"> Search Customer</a></li>
	<li> <a href = "http://localhost/Website/Scripting/Customers_List.php"> All Customers </a></li>
	<li> <a href = "http://localhost/Website/Scripting/Update_Info_Page.php"> Update customer info </a></li>
	<li> <a href = "http://localhost/Website/Web Pages/Customer_Delete_Page.html"> Delete customer info</a></li>
	
	</ul>
	
	
	
	<table style = "position:absolute; margin-top:250px; margin-left : 50px"
				cellspacing = "15px" cellpadding = '20'>
				
				<tr> <td> <label id = 'label'> SSN </label> </td><td><input type = 'text' id = 'u_ssn' maxlength = '15'style = 'border-radius:5px;'/></td></tr>
				<tr> <td> <label id = 'label'> First name </label> </td><td><input type = 'text' id = 'u_firstname'style = 'border-radius:5px;'/></td></tr>	
	</table>
	
	
	<table style = "position:absolute; margin-top:520px; margin-left : 50px"cellspacing = "15px">
			   
			   <tr> <td> <label id = 'label'> First name </label> </td><td> <input id = 'firstname' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			   
			   <tr> <td> <label id = 'label'> Last name </label> </td><td> <input id = 'lastname' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			   
			   <tr> <td> <label id = 'label'> Username </label> </td><td> <input id = 'username' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			   
			   <tr> <td> <label id = 'label'> Email </label> </td><td> <input id = 'email' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			   
			   <tr> <td> <label id = 'label'> Password </label> </td><td> <input type = "password" id = 'password' class = 'input'  style = 'border-radius:5px;'/> </td></tr>
			 
			</table>
			
	
	
	<table style = "position:absolute; margin-top:520px; margin-left : 400px" cellspacing = "15px">
				<tr>
<td id = "label"> Country </td> 
<td> 
<select class = "input" id = "country">
<option value="Country">Country...</option>
<option value="Afganistan">Afghanistan</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire">Bonaire</option>
<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Canary Islands">Canary Islands</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African Republic</option>
<option value="Chad">Chad</option>
<option value="Channel Islands">Channel Islands</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos Island">Cocos Island</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote DIvoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curaco">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic</option>
<option value="East Timor">East Timor</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands">Falkland Islands</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Ter">French Southern Ter</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Great Britain">Great Britain</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guinea">Guinea</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Hawaii">Hawaii</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran">Iran</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea North">Korea North</option>
<option value="Korea Sout">Korea South</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Laos">Laos</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libya">Libya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macau">Macau</option>
<option value="Macedonia">Macedonia</option>
<option value="Madagascar">Madagascar</option>
<option value="Malaysia">Malaysia</option>
<option value="Malawi">Malawi</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Midway Islands">Midway Islands</option>
<option value="Moldova">Moldova</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Nambia">Nambia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherland Antilles">Netherland Antilles</option>
<option value="Netherlands">Netherlands (Holland, Europe)</option>
<option value="Nevis">Nevis</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau Island">Palau Island</option>
<option value="Palestine">Palestine</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Phillipines">Philippines</option>
<option value="Pitcairn Island">Pitcairn Island</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Republic of Montenegro">Republic of Montenegro</option>
<option value="Republic of Serbia">Republic of Serbia</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russia">Russia</option>
<option value="Rwanda">Rwanda</option>
<option value="St Barthelemy">St Barthelemy</option>
<option value="St Eustatius">St Eustatius</option>
<option value="St Helena">St Helena</option>
<option value="St Kitts-Nevis">St Kitts-Nevis</option>
<option value="St Lucia">St Lucia</option>
<option value="St Maarten">St Maarten</option>
<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
<option value="Saipan">Saipan</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa American</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome & Principe">Sao Tome &amp; Principe</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syria">Syria</option>
<option value="Tahiti">Tahiti</option>
<option value="Taiwan">Taiwan</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania">Tanzania</option>
<option value="Thailand">Thailand</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Erimates">United Arab Emirates</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States of America">United States of America</option>
<option value="Uraguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Vatican City State">Vatican City State</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
<option value="Wake Island">Wake Island</option>
<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
<option value="Yemen">Yemen</option>
<option value="Zaire">Zaire</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
</select>
</td>
</tr>
				<tr>
<td id = "label">Birthdate</td>
<td>
<select id = "month" class = "input" onchange = "update_daylist(this.options[this.options.selectedIndex].value)">
<option value = "JAN"selected>January</option>
<option value = "FEB">February</option>
<option value = "MAR">March</option>
<option value = "APR">April</option>
<option value = "MAY">May</option>
<option value = "JUN">June</option>
<option value = "JUL">July</option>
<option value = "AUG">August</option>
<option value = "SEP">September</option>
<option value = "OCT">October</option>
<option value = "NOV">November</option>
<option value = "DEC">December</option>
</select>

<select id = "days" class = "input" style = "width:50px">
<script language = "php">
for($day = 1; $day <= 31; ++$day)
{
	echo"<option value = '$day'>$day</option>";
}
</script>
 </select>
 
 <select id = "year" class = "input">

<script language = "php">
for($year = 1940; $year <= 2012; $year++)
{
	echo"<option>$year</option>";
}
</script>

</select>
 
</td>

</tr>

  <tr> <td> <label id = 'label'> Phone number </label> </td>
  <td colspan = "3">
  <input id = "area_code" type = "text" maxlength = 3 style = "width:30px" />
  <input id = "second_part" type = "text" maxlength = 3 style = "width:30px"/>
  <input id = "last_part" type = "text" maxlength = 4 style = "width:35px"/>
  </td>
  </tr>
  
  <tr> <td> <label id = 'label'> SSN </label> </td>
  <td> <input type = "text" id = "ssn" style = 'border-radius:5px;' maxlength = "15"/> </td>
  </tr>
  
  
			</table>
	
	
	
	<div id = "error_message_area"style = "font-family:calibri;font-size:12;text-align:left; color:red;float:left; width:50%; height:12%;
	position: absolute; margin-top: 685px; margin-left: 390px;">
	</div>
	
	<div style = "position:absolute; margin-top:720px; margin-left : 620px">
    <input type = "submit" value = "   Update Info   " style = "float:right;margin-top:10%;" onclick = "validation()" />
	</div>
	
	
	</div>
	
	

	</body>
</html>