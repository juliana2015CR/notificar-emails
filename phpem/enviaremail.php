<?php
$txtNome	= "txtNome";
$txtAssunto	= "txtAssunto";
$txtEmail	= "diomarpaulo2017@gmail.com";
$txtMensagem    = "txtMensagem";

$corpoMensagem 		= "<b>Nome:</b> ".$txtNome." <br><b>Assunto:</b> ".$txtAssunto."<br><b>Mensagem:</b> ".$txtMensagem;

require_once("class.phpmailer.php");

define('GUSER', 'jujucastro5555@gmail.com'); 
define('GPWD', 'diegoebia');

function smtpmailer($para, $de, $nomeDestinatario, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	/* Montando o Email*/
	$mail->IsSMTP();		    /* Ativar SMTP*/
	$mail->SMTPDebug = 1;		/* Debugar: 1 = erros e mensagens, 2 = mensagens apenas*/
	$mail->SMTPAuth = true;		/* Autenticação ativada	*/
	$mail->SMTPSecure = 'tls';	/* TLS REQUERIDO pelo GMail*/
	$mail->Host = 'smtp.gmail.com';	/* SMTP utilizado*/
	$mail->Port = 587;  		   /* A porta 587 deverá estar aberta em seu servidor*/
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->SetFrom($de, $nomeDestinatario);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	$mail->IsHTML(true);

	if(!$mail->Send()) {
		$error = "<font color='red'><b>Mail error: </b></font>".$mail->ErrorInfo; 
		return false;
	} else {
		$error = "<font color='blue'><b>Mensagem enviada com Sucesso!</b></font>";
		return true;
	}
}

 if (smtpmailer($txtEmail, 'jujucastro5555@gmail.com', $txtNome, $txtAssunto, $corpoMensagem)) {
	 Header("location: sucesso.php"); // Redireciona para uma página de Sucesso.
}
if (!empty($error)) echo $error;
?>
