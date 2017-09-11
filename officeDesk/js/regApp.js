var regWelcome = function() {
	//alert("This is student registration portal");
};

var regClose = function() {
	alert("Leaving registration portal");
};

var textCapitalize = function(e) {
	e.value = e.value.toUpperCase();
}

var focusInput = function(e) {
	e.style.opacity = 0.4;
	e.style.borderRadius = "12px";
	e.style.background = 'lime';
}

var blurInput = function(e) {
	e.style.background = '';
	e.style.opacity = 0.4;
	e.style.borderRadius = "12px";
}

var regSubmit = function(e) {
	e.innerHTML = "Registeration under maintanence, try again later.";
	e.style.width = "100%";
	validateForm();
}

var expandText = function(e) {
	e.style.fontSize = "25px";
};

var normText = function(e) {
	e.style.fontSize = "20px";
};

var MOD = function(e) {
	e.style.textDecoration = "underline";
};

var MOU = function(e) {
	e.style.textDecoration = "";
};

function highlightError(e) {
	e.style.opacity = 0.4;
	e.style.borderRadius = "12px";
	e.style.background = 'red';
	setTimeout( function() {e.style.background=''}, 3000);
}