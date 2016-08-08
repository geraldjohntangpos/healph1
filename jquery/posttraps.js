var upperCase= new RegExp('[A-Z]');
var lowerCase= new RegExp('[a-z]');
var numbers = new RegExp('[0-9]');
var space = new RegExp('[ ]');
var correctEmail = new RegExp('[@]');
var angleBrace = new RegExp('[<>]');
var point = new RegExp('[.]');
var nonword = new RegExp('\W');

function checkSubmitValidity() {
	
	if($('#nosMessage').text() != "" || $('#descriptionMessage').text() != "" || $('#priceMessage').text() != "" || $('#typeMessage').text() != "" || $('#pictureMessage').text() != "" || $('input[name="servicename"]').val() == "" || $('textarea[name="description"]').val() == "" || $('input[name="price"]').val() == "" || $('select[name="type"]').val() == "") {
		$('#submit').attr('disabled', 'disabled');
	}
	else {
		$('#submit').removeAttr('disabled');
	}
	
}

function checkLength(ss, message, len) {
	if(ss.length<len) {
		if(message!="") {
			message+=" and atleast " +len+ " characters";
		}
		else {
			message="Atleast " +len+ " characters";
		}
		
	}
	return message;
}

function checkFirstSpace(ss, message, len) {
	if(ss.substring(0, len).match(space)) {
		var s = "";
		if(len>1) {
			message = "No space on first " +len+ " characters";
		}
		else {
			message = "No space on first character";
		}
	}
	return message;
}

function checkMatchAngleBrace(ss, message) {
	if(ss.match(angleBrace)) {
		if(message!="") {
			message+=" and no angle brace";
		}
		else {
			message="No angle brace";
		}
	}
	return message;
}

function checkFirstPoint(ss, message, len) {
	if(ss.substring(0, len).match(point)) {
		if(len>1) {
			message = "No decimal point on the first " +len+ " place of the digits";
		}
		else {
			message = "No centavos";
		}
	}
	return message;
}

function checkIfImage(ss, message) {
	var ext = ss.split(".");
	ext = ext[ext.length-1].toLowerCase();      
	var arrayExtensions = ["jpg" , "jpeg", "png", "bmp", "gif"];
	if (arrayExtensions.lastIndexOf(ext) == -1) {
		message = "Upload image only";
	}
	return message;
}

function checkSelected(selected) {
	if(selected=="No") {
		$('#picture').attr('disabled', 'disabled');
	}
	else {
		$('#picture').removeAttr('disabled');
	}
	checkSubmitValidity();
}

$('input[type="submit"]').ready(function() {
	checkSubmitValidity();
});

$('input[name="servicename"]').keydown(function() {
	
	var inputVal = $(this).val();
	
	function checkValidity(ss) {
		
		var message = "";
		
		if(ss != "") {
			
			message=checkLength(ss, message, 6);
			message=checkMatchAngleBrace(ss, message);
			message=checkFirstSpace(ss, message, 1);
		}
		else {
			message = "Enter the name of service";
		}
		
		if(message!="") {
			message+=" please!";
		}
		
		return message;
	}
	
	$('#nosMessage').text(checkValidity(inputVal));
	checkSubmitValidity();
	
});

$('input[name="productname"]').keydown(function() {
	
	var inputVal = $(this).val();
	
	function checkValidity(ss) {
		
		var message = "";
		
		if(ss != "") {
			
			message=checkLength(ss, message, 6);
			message=checkMatchAngleBrace(ss, message);
			message=checkFirstSpace(ss, message, 1);
		}
		else {
			message = "Enter the name of service";
		}
		
		if(message!="") {
			message+=" please!";
		}
		
		return message;
	}
	
	$('#nosMessage').text(checkValidity(inputVal));
	checkSubmitValidity();
	
});

$('textarea[name="description"]').keydown(function() {
	
	var inpuVal = $(this).val();
	
	function checkValidity(ss) {
		
		var message = "";
		
		if(ss != "") {
			message=checkLength(ss, message, 20);
			message=checkMatchAngleBrace(ss, message);
			message=checkFirstSpace(ss, message, 1);
		}
		else {
			message = "Enter the service description";
		}
		
		if(message!="") {
			message+=" please!";
		}
		
		return message;
		
	}
	
	$('#descriptionMessage').text(checkValidity(inpuVal));
	checkSubmitValidity();
	
});

$('input[name="price"]').keydown(function() {
	
	var inpuVal = $(this).val();
	
	function checkValidty(ss) {
		
		var message = "";
		
		if(ss!="") {
			message = checkFirstPoint(ss, message, 1);
		}
		else {
			message = "Enter the price";
		}
		
		if(message!="") {
			message+=" please!";
		}
		
		return message;
		
	}
	
	$('#priceMessage').text(checkValidty(inpuVal));
	checkSubmitValidity();
	
});

$('select[name="type"]').select(function() {
	$('select[name="type"]').click(function() {

		var inputVal = $(this).val();

		function checkValidity(ss) {

			var message = "";

			if(ss=="") {
				message = "Select service type";
			}

			if(message!="") {
				message+=" please!";
			}

			return message;

		}

		$('#typeMessage').text(checkValidity(inputVal));

	});
	$('#typeMessage').text(checkValidity(inputVal));
	checkSubmitValidity();
	
});

$('input[name="picture"]').keydown(function() {
	
	var inputVal = $(this).val();
	
	function checkValidity(ss) {
		
		var message = "";
		
		if(ss!=null) {
			message=checkIfImage(ss, message);
		}
		else {
			message = "Upload image";
		}
		
		if(message!="") {
			message+=" please!";
		}
		
		return message;
		
	}
	
	$('#pictureMessage').text(checkValidity(inputVal));
	checkSubmitValidity();
	
});

$('input[name="picture"]').change(function() {
	
	var inputVal = $(this).val();
	
	function checkValidity(ss) {
		
		var message = "";
		
		if(ss!=null) {
			message=checkIfImage(ss, message);
		}
		else {
			message = "Upload image";
		}
		
		if(message!="") {
			message+=" please!";
		}
		
		return message;
		
	}
	
	$('#pictureMessage').text(checkValidity(inputVal));
	checkSubmitValidity();
	
});
