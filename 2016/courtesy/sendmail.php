<?

require_once 'phpmailer/class.phpmailer.php';
require_once 'phpmailer/class.smtp.php';

function inviamail($to, $subject, $body) {
    $from = $_POST['email'];
    $from_name = $_POST['nome_cognome'];
    $mail = new PHPMailer();  // creiamo l'oggetto
	$mail->IsSMTP(); // abilitiamo l'SMTP
	$mail->SMTPDebug = 1;  // debug: 1 = solo messaggi, 2 = errori e messaggi
	$mail->SMTPAuth = true;  // abilitiamo l'autenticazione
	$mail->SMTPSecure = 'ssl'; // abilitiamo il protocollo ssl richiesto per Gmail
	$mail->Host = 'smtp.gmail.com'; // ecco il server smtp di google
	$mail->Port = 465; // la porta che dobbiamo utilizzare
	$mail->Username = 'roberto.denicolo@informaticisenzafrontiere.org'; //email del nostro account gmail
	$mail->Password = 'onelove'; //password del nostro account gmail
	$mail->SetFrom($from, $from_name);
	$mail->Subject = $subject;
	$mail->Body = $body;
	$mail->AddAddress($to);

	if(!$mail->Send()) {
		$error = 'errore mail: '.$mail->ErrorInfo;
		return false;
	} else {
		$error = 'Messaggio inviato!';
		return true;
	}

}

// $esito = inviamail("emanueladiana.ferri@informaticisenzafrontiere.org", "Contatto dal sito www.sensoltre.org", $_POST['messaggio']);//richiamiamo la funzione
$esito = inviamail("altre@menti.eu", "Contatto dal sito www.altre.menti.eu", $_POST['messaggio']);//richiamiamo la funzione

echo $esito;

?>