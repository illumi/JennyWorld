function addOptions(Selection){
Form=Selection.form;
	if(Selection.value=="0") {
		
	} else {
		var selection = Selection.options.item(Selection.selectedIndex).id;
		Form.date.options.item(0).value="Select a date"
		alert(selection);
	}
}
