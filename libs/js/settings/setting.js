// check csv file
function checkCsv(){
	var mimeType = document.getElementById('csvfile').files[0].type;
    if (mimeType !== "text/csv" && mimeType !== "application/vnd.ms-excel"){ 	
	    alert("File is not a .CSV"+mimeType);	
		window.location.reload();
	}
}

// function ajax to save the user
function saveuser(form){

	var data = "?name="+form.name.value;	
	data += "&lastname="+form.lastname.value;
	data += "&postalcode="+form.postalcode.value;
	data += "&city="+form.city.value;
	data += "&state="+form.state.value;
	data += "&country="+form.country.value;
	data += "&email="+form.email.value;
	data += "&pwd="+form.pwd.value;
	
	var oXMLHttp = new XMLHttpRequest(); 
	oXMLHttp.open("GET", "../agenda/scripts/usave.php"+data, true);
	oXMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	oXMLHttp.onreadystatechange = function(){
		if(oXMLHttp.readyState == 4){
			if(oXMLHttp.status == 200){
				if(oXMLHttp.responseText == "This email already exists!"){
				   failedText("This email already exists!");
				}  
				else if(oXMLHttp.responseText == "Saved!"){
				   wassavedText("Your registration was successfully completed! To log in, click on <a href=index.php>Login.</a>");
				}
			} else {
				failedText("Error: "+oXMLHttp.statusText);	
			}
		}
	};
	oXMLHttp.send(data);
	return false;
}

// function ajax to save the contact
function savecontact(form){
	
    var data = "?iduser="+form.iduser.value;
	data += "&name="+form.name.value;	
	data += "&middlename="+form.middlename.value;
	data += "&lastname="+form.lastname.value;
	data += "&webpage="+form.webpage.value;
	data += "&jobtitle="+form.jobtitle.value;
	data += "&gender="+form.gender.value;
	data += "&birthday="+form.birthday.value;
	data += "&email="+form.email.value;
	data += "&phonenumber="+form.phonenumber.value;
	data += "&postalcode="+form.postalcode.value;
	data += "&city="+form.city.value;
	data += "&street="+form.street.value;
	data += "&streetnumber="+form.streetnumber.value;
	data += "&state="+form.state.value;
	data += "&country="+form.country.value;
	
	var cXMLHttp = new XMLHttpRequest(); 
	cXMLHttp.open("GET", "../agenda/scripts/csave.php"+data, true);
	cXMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	cXMLHttp.onreadystatechange = function(){
		if(cXMLHttp.readyState == 4){
			if(cXMLHttp.status == 200){
				wassavedText("Contact registration was successfully completed! Go to <a href=home.php>Contact List.</a>");	
			} else {
				failedText("Error: "+cXMLHttp.statusText);	
			}
		}
	};
	cXMLHttp.send(data);
	return false;
}

// Adding a new address
function newAddress(form){
	
    var data = "?iduser="+form.iduser.value;
	data += "&postalcode="+form.postalcode.value;
	data += "&city="+form.city.value;
	data += "&street="+form.street.value;
	data += "&streetnumber="+form.streetnumber.value;
	data += "&state="+form.state.value;
	data += "&country="+form.country.value;
	
	var aXMLHttp = new XMLHttpRequest(); 
	aXMLHttp.open("GET", "../agenda/scripts/nasave.php"+data, true);
	aXMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	aXMLHttp.onreadystatechange = function(){
		if(aXMLHttp.readyState == 4){
			if(aXMLHttp.status == 200){
				wassavedText("Address added! <a href=home.php>Contact List.</a>");	
			} else {
				failedText("Error: "+aXMLHttp.statusText);	
			}
		}
	};
	aXMLHttp.send(data);
	return false;
}

// Adding a new number
function newNumber(form){
	
	var data = "?iduser="+form.iduser.value;
    data += "&phonenumber="+form.phonenumber.value;

	var nXMLHttp = new XMLHttpRequest(); 
	nXMLHttp.open("GET", "../agenda/scripts/nsave.php"+data, true);
	nXMLHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	
	nXMLHttp.onreadystatechange = function(){
		if(nXMLHttp.readyState == 4){
			if(nXMLHttp.status == 200){
				wassavedText("Number added! <a href=home.php>Contact List.</a>");	
			} else {
				failedText("Error: "+nXMLHttp.statusText);	
			}
		}
	};
	nXMLHttp.send(data);
	return false;
}

// function shows a successful message 
function wassavedText(msg){
	document.getElementById('status').style.display = "block"; // show the tag
	document.getElementById('status').innerHTML = msg; // show the message in the tag
	document.forms.item(this).reset(); // clear the form's field
}

// message shows an error
function failedText(msg){
	document.getElementById('status2').style.display = "block";// show the tag
	document.getElementById('status2').innerHTML = msg; // show the message in the tag
	document.forms.item(this).reset(); // clear the form's field
}
