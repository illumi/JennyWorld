function enableFields(Selection){
Form=Selection.form;
if(Selection.value=="0") {
	Form.managerRole.checked = false;
	Form.staffRole.checked= false;
	Form.login.value = "";
	Form.pass.value= "";
	
	Form.login.disabled=true;
	Form.pass.disabled=true;
	Form.managerRole.disabled=true;
	Form.staffRole.disabled=true;
	Form.buSubmit.disabled=true;
	Form.buDelete.disabled=true;
	Form.buSubmit.value="Save Changes";
	Form.buDelete.value="Delete Staff Member";
} else if(Selection.value=="1") {
	Form.managerRole.checked = false;
	Form.staffRole.checked= false;
	Form.login.value = "";
	Form.pass.value= "";
	
	Form.login.disabled=false;
	Form.pass.disabled=false;
	Form.managerRole.disabled=false;
	Form.staffRole.disabled=false;
	Form.buSubmit.disabled=false;
	Form.buDelete.disabled=false;
	Form.unique_id.value = "";
	Form.buSubmit.value="Add New";
	Form.buDelete.value="Clear Form";
} else {
	Form.login.disabled=false;
	Form.pass.disabled=false;
	Form.managerRole.disabled=false;
	Form.staffRole.disabled=false;
	Form.buSubmit.disabled=false;
	Form.buDelete.disabled=false;
	Form.buSubmit.value="Save Changes";
	Form.buDelete.value="Delete Staff Member";
	
	Form.login.value = Selection.options.item(Selection.selectedIndex).label;
	Form.pass.value= "";
	Form.unique_id.value = Selection.options.item(Selection.selectedIndex).id;
	
	if (Selection.value == "manager") {
		Form.managerRole.checked = true;
	} else {
		Form.staffRole.checked=true;
	}
}
}

function onSubmit(button){
	Form=button.form;
	
	if (button.value == "Add New") { //add a new staff member
		if (valid(Form)) {
			Form.action = "res/pages/admin/add.php";
			Form.buFormSubmit.click();
			return true;
		} else {
			return false; //dont submit form
		}
	} else { //update an existing staff member
		Form.action = "res/pages/admin/edit.php";
		Form.buFormSubmit.click();
		return true;
	}

}

function onDelete(button){
	Form=button.form;
	if (button.value=="Delete Staff Member") {
		var ans = confirm ("Are you sure you want to delete?")
		if (ans) {
			Form.action = "res/pages/admin/remove.php";
			Form.buFormSubmit.click();
			return true;
		}
	} else {
		Form.login.value = "";
		Form.pass.value= "";
		Form.managerRole.checked = false;
		Form.staffRole.checked= false;
		return false; //Form clear!
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
		if (managerRole.checked == true || staffRole.checked == true) {
			return true;
		} else {
			alert("Need to pick a role!");
			managerRole.focus();
			return false;
		}
	}
	return true;
}

