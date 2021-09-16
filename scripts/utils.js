$(document).ready(function() {
	$('#submit').on('click',function() {
		checkform();
	});
});

function checkform() {

	var authorized = false;

	if ($('#nome_cognome').val() == '') {
		alert("E' necessario digitare il proprio nome e cognome!")
		$('#nome_cognome').focus();
		return;
	}
	
	if ($('#email').val() == '') {
		alert("E' necessario digitare il proprio indirizzo e-mail!")
		$('#email').focus();
		return;
	}

	$.post("sendmail.php", $("#mail_form").serialize(), function(data) {
		if (data == 1) {
			alert("Messaggio inviato. Sarai contattato quanto prima.");
			$('#mail_form')[0].reset();
		}
	});
	
	return;
	
}