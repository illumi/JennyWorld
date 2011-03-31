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
	Form.login.focus();
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

var TextMessage = 'Please enter text or HTML here to display on the homepage...';
function SetMsg (txt, active) {
    if (txt == null) return;
    
    if (active) {
        if (txt.value == TextMessage) txt.value = '';
    } else {
        if (txt.value == '') txt.value = TextMessage;
    }
}

window.onload=function() {SetMsg(document.getElementById('TxtareaInput', false));}



function onSubmit(button){
	Form=button.form;
	
	if (button.value == "Add New") { //add a new staff member
		if (valid(Form)) {
			Form.action = "admin.php?page=add";
			Form.buFormSubmit.click();
			return true;
		} else {
			return false; //dont submit form
		}
	} else { //update an existing staff member
	 if (validate_name(Form.login, "Can't have a blank username"))
	 {
		Form.action = "admin.php?page=edit";
		Form.buFormSubmit.click();
		return true;
	}
	}

}

function onBookingSubmit(submit) {
	Form=submit.form;
	
	var pattern = "[0-9]*";
	
	if (Form.tickets.value.match(pattern) && Form.tickets.value < 7) {
	
		Form.buFormSubmit.click();
		return true;
	} else {
		alert("Input needs to be a number, you can only reserve upto 6 tickets with one booking.");
		return false;
	}
}

function onSubmitAddPromo(submit)
{
	Form=submit.form;
	
		if (validate_addPromo(Form))
		{
			Form.action = "admin.php?page=add-pro";
			return true;
		} 
		else return false;
}

function onSubmitEditPromo(submit)
{
	Form=submit.form;
	
		if (validate_addPromo(Form))
		{
			Form.action = "admin.php?page=editpro";
			return true;
		} 
		else return false;
}

function onSubmitEditFilms(submit)
{
	Form=submit.form;
	
		if (validate_editfilm(Form))
		{
			Form.action = "admin.php?page=edit-flm";
			return true;
		} 
		else return false;
}
function onSubmitAddFilms(submit)
{
	Form=submit.form;
	
		if (validate_addfilm(Form))
		{
			Form.action = "admin.php?page=add-flm";
			return true;
		} 
		else return false;
}

function onSubmitfindFilms(submit)
{
	Form=buSsearch.form;
	
		if (validate_findfilm(Form))
		{
			Form.action = "admin.php?page=add-flm";
			return true;
		} 
		else return false;
}

function onSubmitEditTimetable(submit)
{
	Form=submit.form;
	
		if (validate_timetable(Form))
		{
			Form.action = "admin.php?page=edit-f-tt";
			return true;
		} 
		else return false;
}

function onSubmitAddTimetable(submit)
{
	Form=submit.form;
	
		if (validate_addtimetable(Form))
		{
			Form.action = "admin.php?page=add-f-tt";
			return true;
		} 
		else return false;
}


function validate_addfilm(thisform)
{
	with (thisform) 
	{
		if (!validate_name(title, "You must enter a film title!")) 
		{
			return false;
		}
		if (!validate_name(year, "You must enter year of release!")) 
		{
			return false;
		}
		if (!validate_name(filmdesc, "You must enter a description for the film!")) 
		{
			return false;
		}
		if (!validate_name(filmlength, "You must enter the running time of the film!")) 
		{
			return false;
		}
		if (!validate_name(filmgenre, "You must enter a genre for the film!")) 
		{
			return false;
		}
		if (!validate_name(filmrating, "You must enter a rating for the film!")) 
		{
			return false;
		}
		if (!validate_name(filmposter, "You must enter a poster for the film!")) 
		{
			return false;
		}



	}
	return true;
	
}

function validate_findfilm(thisform)
{
	with (thisform) 
	{
		if (!validate_name(title, "You must enter a film title!")) 
		{
			return false;
		}
		if (!validate_name(year, "You must enter year of release!")) 
		{
			return false;
		}


	}
	return true;
	
}

function validate_editfilm(thisform)
{
	with (thisform) 
	{
		if(document.editfilm.id.selectedIndex==0)
		{
			alert("Please select a filme name.");
			return false;
		}
		if (!validate_name(edit_filmtitle, "Please must enter a film title!")) 
		{
			return false;
		}
		if (!validate_name(edit_filmlength, "Please enter the running time of the film!")) 
		{
			return false;
		}
		if(document.editfilm.edit_genre.selectedIndex==0)
		{
			alert("Please select a rating.");
			return false;
		}
		if(document.editfilm.edit_rating.selectedIndex==0)
		{
			alert("Please select a rating.");
			return false;
		}
		if (!validate_name(edit_year, "You must enter year of release!")) 
		{
			return false;
		}


	}
	return true;
	
}

function validate_addtimetable(thisform)
{
	with (thisform) 
	{
		if(document.tt.id.selectedIndex==0)
		{
			alert("Please select a film title.");
			return false;
		}
		if (!validate_name(start, "Please enter a start date!")) 
		{
			return false;
		}
		if (!validate_name(end, "Please enter an end date.")) 
		{
			return false;
		}
		if(document.tt.numshowings.selectedIndex==0)
		{
			alert("Please select the number of daily showings.");
			return false;
		}
		if (!validate_name(end, "Please enter the start time of the first film.")) 
		{
			return false;
		}
                if(document.tt.id.selectedIndex == document.tt.id.length - 1)
                {
                    if(!validate_name(txtAddMovieTitle, "Please enter a title for the film to be added."))
                    {
                        return false;
                    }
                    if(!validate_name(txtFilmYear, "Please enter the film's year to be added."))
                    {
                        return false;
                    }

                    searchInfo(thisform);
                }
	}
        
	return true;
	
}

function validate_addPromo(thisform)
{
	with (thisform) 
	{
		if(document.promo.id.selectedIndex==0)
		{
			alert("Please select an option.");
			return false;
		}
		if (!validate_name(name, "Please enter a promotion name!")) 
		{
			return false;
		}
		if (!validate_name(start, "Please enter a start date!")) 
		{
			return false;
		}
		if (!validate_name(end, "Please enter a end date!")) 
		{
			return false;
		}
		if (!validate_name(desc, "Please enter a description!"))
		{
			return false;
		}

	}
	return true;
	
}

function onDelete(button){
	Form=button.form;
	if (button.value=="Delete Staff Member") {
		var ans = confirm ("Are you sure you want to delete?")
		if (ans) {
			Form.action = "admin.php?page=remove";
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
        if (field.value == null || field.value == "") {
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

function displayAdd(e)
{
    if(e.options[e.selectedIndex].value == "add")
    {
        // we have to put the value "" instead of block otherwise it reset the CSS of the tr when they appear. The empty enforces them to take back their
        // default value. We can use table-row as well but it is not supported by IE
        $("#txtAddMovieTitle").css("display", "");
        $("#rowFilmYear").css("display", "");
        $("#rowFilmDesc").css("display", "");
        $("#rowFilmLength").css("display", "");
        $("#rowFilmGenre").css("display", "");
        $("#rowFilmRating").css("display", "");
        $("#rowFilmPoster").css("display", "");
    }
    else
    {
        $("#txtAddMovieTitle").css("display", "none");
        $("#rowFilmYear").css("display", "none");
        $("#rowFilmDesc").css("display", "none");
        $("#rowFilmLength").css("display", "none");
        $("#rowFilmGenre").css("display", "none");
        $("#rowFilmRating").css("display", "none");
        $("#rowFilmPoster").css("display", "none");
    }
}

