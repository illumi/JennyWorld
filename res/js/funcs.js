function enableFields() {
	document.staffForm.login.disabled=true;
}

function DisableText() {
	var count = document.forms[0].elements.length;
	for (i=0; i<count; i++) {
		var element = document.forms[0].elements[i]; 
		if (document.form1.check1.checked == true) { 
			if (element.type == "text") { 
				element.disabled=true; 
			} 
		} else { 
			element.disabled=false; 
		}
	}
}



function validate_name(field, alerttxt){

    with (field) {

        if (value == null || value == "") {

            alert(alerttxt);

            return false;

        }

        else {

            return true;

        }

    }

}

function valid(thisform){

    with (thisform) {

		if (validate_dropdown(item1) == false && validate_dropdown(item2) == false && validate_dropdown(item3) == false) {

			alert("You didn't select anything to buy!");

			item1.focus();

            return false;

        }

		

		if (!validate_name(first, "Please enter a first name!")) {

            first.focus();

            return false;

        }

        if (!validate_name(last, "Please enter a last name!")) {

            last.focus();

            return false;

        }

        if (!validate_email(email, "Not a valid @hw.ac.uk e-mail address!")) {

            email.focus();

            return false;

        }

		if (!validate_name(adrStreet, "Please enter a street!")) {

            last.focus();

            return false;

        }

		if (!validate_name(adrCity, "Please enter a city!")) {

            last.focus();

            return false;

        }

		if (!validate_name(adrPostcode, "Please enter a postcode!")) {

            last.focus();

            return false;

        }

		if (!validate_phone(adrPhone, "Please enter a valid phone number")) {

            last.focus();

            return false;

        }

      

    }

}

