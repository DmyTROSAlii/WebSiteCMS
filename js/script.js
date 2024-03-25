// Function check fields in form on the inputing latin characters
function checkForLatin() {
	let latinRegex = /^[a-zA-Z]+$/;
	let err = false;
	let out_err = '';
	
	document.querySelector(".form-err").innerHTML = '';

	if (!latinRegex.test(document.getElementById('first_name').value)) {
		out_err += "Enter non-latin characters in First`s Name Field<br>";
		err = true;
	}
	if (!latinRegex.test(document.getElementById('last_name').value)) {
		out_err += "Enter non-latin characters in Last`s Name Field<br>";
		err = true;
	}
	if (!latinRegex.test(document.getElementById('patronymic').value)) {
		out_err += "Enter non-latin characters in Patronymic`s Field<br>";
		err = true;
	}

	if (err) {
		document.querySelector(".form-err").innerHTML = out_err;
		return false;
	}

	return true;
}

// Function redirection page after 3 seconds
function redirection() {
	setTimeout(function () {
		window.location.replace("home.html");
	}, 3000);
}

// Function start animation background disk-image
function animation(obj, info) {
	var element = document.getElementById(obj);
	var from = info.from;
	var to = info.to;
	var duration = info.duration;
	var type = info.type; // linery, aceel, break

	var toUp = false;
	var start = new Date().getTime();

	setTimeout(function() {
		var now = (new Date().getTime()) - start; 
		var progress = now / duration; 
		if (progress > 1) progress = 1;

		if (!toUp && progress === 1) {
			start = new Date().getTime();
			toUp = true;
			progress = 0;
		} else if (toUp && progress === 1) {
			start = new Date().getTime();
			toUp = false;
			progress = 0;
		}
		var result = (!toUp ?
			((to - from) * delta(progress, type) + from) : 
			(to - (to - from) * delta(progress, type))
		);

		element.style.backgroundPositionY = result + "px";

		if (progress < 1) 
			setTimeout(arguments.callee, 30);
	}, 10);
}

function delta(x, type) {
	if (type == "linery") return x;
	else if (type == "accel") return x * x;
	else if (type == "break") return (1 - (1 - x) * (1 - x));
	else if (type == "sine") return 1 - Math.sin((1 - x) * Math.PI/2);

	return x;
}