

var validateForm = function() {
	var form = document.querySelector('#register-form');
	var inputs = [];
	var selectors = ["#username", "#first_name", "#last_name", "#rollno", "#email", "#password", "#dept", "#phone", "#dob"];
	var selValue;
	selectors.forEach( function(selector) {
		selValue = document.querySelector(selector).value;
		inputs.push({selector: selector, value: selValue});
	});

	inputs.forEach( function(input) {
		if(input.value=='')
			alert("Empty value at " + input.selector.slice(1));
		switch(input.selector) {
			case '#email': validateEmail(input); break;
			case '#phone': validatePhone(input); break;
			case '#dob': validateDob(input); break;
		}
	});
};

var validateEmail = function(input) {
	var value = input.value;
	var t1 = value.slice(0, value.indexOf('@')).length>=2;
	var t2 = value.slice(value.indexOf('@'), value.lastIndexOf('.')).length>=2;
	if(!t1 || !t2) {
		alert('Invalid email');
		highlightError(document.querySelector(input.selector));
	}
};

var validatePhone = function(input) {
	var value = input.value;
	var t1 = value.length==10;
	var t2 = !(isNaN(value));
	if(!t1 || !t2) {
		alert('Invalid phone');
		highlightError(document.querySelector(input.selector));
	}
};

var validateDob = function(input) {
	var value = input.value;
	var dateREG = /^\d{2}[./-]\d{2}[./-]\d{4}$/;
	if(!value.match(dateREG)) {
		alert('Date is invalid');
		highlightError(document.querySelector(input.selector));
	}
};
