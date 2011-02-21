function enableFields(Selection){
Form=Selection.form;
if(Selection.value=="0") {
	Form.login.disabled=true;
	Form.pass.disabled=true;
	Form.managerRole.disabled=true;
	Form.staffRole.disabled=true;
	Form.buSubmit.disabled=true;
	Form.buDelete.disabled=true;
	Form.buDelete.value="Delete Staff Member";
} else if(Selection.value=="1") {
	Form.login.disabled=false;
	Form.pass.disabled=false;
	Form.managerRole.disabled=false;
	Form.staffRole.disabled=false;
	Form.buSubmit.disabled=false;
	Form.buDelete.disabled=false;
	Form.buDelete.value="Clear Form";
} else {
	Form.login.disabled=false;
	Form.pass.disabled=false;
	Form.managerRole.disabled=false;
	Form.staffRole.disabled=false;
	Form.buSubmit.disabled=false;
	Form.buDelete.disabled=false;
	Form.buDelete.value="Delete Staff Member";
	
	//load in data from DB
}
}

function onSubmit(button){
	f=button.form;
	if (valid(f)) {
		alert("yay");
	}
}

function onDelete(button){
	if (button.value=="Delete Staff Member") {
		
	} else {
		
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
		if (!validate_name(login, "Can't have a blank login!")) {
			login.focus();
			return false;
		}
		if (!validate_name(pass, "Can't have a blank password!")) {
			pass.focus();
			return false;
		}
	}
	return true;
}

