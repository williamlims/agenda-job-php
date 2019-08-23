// File to get postal code information

// clean the form fields
function cleanform() {
   document.getElementById('city').value=("");
   document.getElementById('state').value=("");
}

function my_callback(content) {
   if (!("erro" in content)) {
	   // update de fields 
       document.getElementById('city').value=(content.localidade);
       document.getElementById('state').value=(content.uf);
	   document.getElementById('street').value=(content.logradouro);
   } else {
       // in case postalcode is not find
       cleanform();
   }  
}
    
function getpcode(codevalue) {
   // variable postacode after get fixed
   var pcode = codevalue.replace(/\D/g, '');
   // test if it's empty
   if (pcode != "") {
	  // regular expression to validate the code
	  var testpcode = /^[0-9]{8}$/;

	  // test the code format
	  if(testpcode.test(pcode)) {
		// fill the fields when it's looking for information
		 document.getElementById('city').value="...";
		 document.getElementById('state').value="...";
		 document.getElementById('street').value="...";
		 // create tha javascript element
		 var script = document.createElement('script');
		 //callback cync.
		 script.src = 'https://viacep.com.br/ws/'+ pcode + '/json/?callback=my_callback';
		 // insert information in the document
		 document.body.appendChild(script);
		 document.getElementById('country').value="Brazil";
      } else {
		// if postalcode is invalid
		cleanform();
	  }
	  
   } else {
	   // if value is null
	  cleanform();
   }
}
