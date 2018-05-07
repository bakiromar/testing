var namVal = true;
function nameValidate(inputId, errorId){
	var name = document.getElementById(inputId).value;
	
	if (name.match(/^[A-Z][A-Z'-]+$/i) == null) {
		document.getElementById(errorId).innerHTML = "Invalid Name.";
		document.getElementById(inputId).className += " errBorder"
		namVal = false;
	} else {
		document.getElementById(errorId).innerHTML = "";
		var newClass = document.getElementById(inputId).className.replace(/\berrBorder\b/g, '');
		document.getElementById(inputId).className = newClass;
		namVal = true;
	}
}

var emailVal = true;
function emailValidate(inputId, errorId){
	var email = document.getElementById(inputId).value;
	
	if (email.match(/^[A-Z\d._+-]+@[A-Z\d.-]+\.[A-Z]{2,}$/i) == null) {
		document.getElementById(errorId).innerHTML = "Invalid Email.";
		document.getElementById(inputId).className += " errBorder"
		emailVal = false;
		
	} else {
		document.getElementById(errorId).innerHTML = "";
		var newClass = document.getElementById(inputId).className.replace(/\berrBorder\b/g, '');
		document.getElementById(inputId).className = newClass;
		emailVal = true;
	}
}

var passVal = true;
function passValidate(inputId, errorId){
	var pass = document.getElementById(inputId).value;
	
	if (pass.match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{10,}$/) == null) {
		document.getElementById(errorId).innerHTML = "Password must be at least 10 characters and contain an upper-case and lowercase letter and a number.";
		document.getElementById(inputId).className += " errBorder"
		passVal = false;
		
	} else {
		document.getElementById(errorId).innerHTML = "";
		var newClass = document.getElementById(inputId).className.replace(/\berrBorder\b/g, '');
		document.getElementById(inputId).className = newClass;
		passVal = true;
	}
}

var passCompVal = true;
function passCompare(passId1, passId2, errorId) {
	var pass1 = document.getElementById(passId1).value;
	var pass2 = document.getElementById(passId2).value;
	
	if (passVal) {
		if (pass1 != pass2) {
			document.getElementById(errorId).innerHTML += " Passwords Must Match.";
			document.getElementById(passId1).className += " errBorder";
			document.getElementById(passId2).className += " errBorder";
			passCompVal = false;
		} else {
			document.getElementById(errorId).innerHTML = "";
			var newClass = document.getElementById(passId1).className.replace(/\berrBorder\b/g, '');
			document.getElementById(passId1).className = newClass;
			var newClass = document.getElementById(passId2).className.replace(/\berrBorder\b/g, '');
			document.getElementById(passId2).className = newClass;
			passCompVal = true;
		}
	}
}

var listNameVal = true;
function listNameValidate(inputId, errorId){
	var name = document.getElementById(inputId).value;
	
	if (name.match(/^[A-Z][\s\S]{2,50}$/i) == null) {
		document.getElementById(errorId).innerHTML = "Invalid name.";
		document.getElementById(inputId).className += " errBorder"
		listNameVal = false;
	} else {
		document.getElementById(errorId).innerHTML = "";
		var newClass = document.getElementById(inputId).className.replace(/\berrBorder\b/g, '');
		document.getElementById(inputId).className = newClass;
		listNameVal = true;
	}
}

var deleteVal = false;
var invalidRad = false;
function radioValidate(radId){
	var radCheck = document.getElementById(radId).value;
	if (radCheck != 0 && radCheck != 1) {
		alert('Please select a valid button');
		invalidRad = true;
	}
	
	if (radCheck == 0) {
		deleteVal = true;
	} else {
		deleteVal = false;
	}
}

function deleteValidate(e, type) {
	if (invalidRad) {
		alert('Please select a valid button');
		e.preventDefault();
	}
	
	if (deleteVal) {
		var delCheck = confirm('Are you sure you want to delete your ' + type + '?');
		if (delCheck) {
			var delCheck2 = confirm('Your ' + type + ' will be deleted.');
			if (!delCheck2) {
				e.preventDefault();
			}
		} else {
			e.preventDefault();
		}
	}
}

function formValidate(nameCheck, emailCheck, passCheck, listCheck, formId, errorId, e){
	var checks = [];
	if (nameCheck == 1) {
		checks.push(namVal);
	}
	if (emailCheck == 1) {
		checks.push(emailVal);
	}
	if (passCheck == 1) {
		checks.push(passVal);
		checks.push(passCompVal);
	}
	if (listCheck == 1) {
		checks.push(listNameVal);
	}
	
	var totalBool = true;
	for (i = 0; i < checks.length; i++) {
		totalBool = totalBool && checks[i];
	}
	
	if (!totalBool) {
		e.preventDefault();
		document.getElementById(errorId).innerHTML = "Please fill out all required fields correctly.";
	}
}



