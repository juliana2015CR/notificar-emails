<?php
$txtNome	= $_POST["txtNome"];
$txtAssunto	= $_POST["txtAssunto"];
$txtEmail	= $_POST["txtEmail"];
$txtMensagem    = $_POST["txtMensagem"];

$corpoMensagem = "<b>Nome:</b> ".$txtNome." <br><b>Assunto:</b> ".$txtAssunto."<br><b>Mensagem:</b> ".$txtMensagem;

require_once("class.phpmailer.php");

define('GUSER', 'jujucastro5555@gmail.com'); 
define('GPWD', 'senha');

function smtpmailer($para, $de, $nomeDestinatario, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		    
	$mail->SMTPDebug = 2;		
	$mail->SMTPAuth = true;		
	$mail->SMTPSecure = 'tls';	
	$mail->Host = 'smtp.gmail.com';	
	$mail->Port = 587;  		
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
	 Header("location: sucesso.php"); 
}
if (!empty($error)) echo $error;
?>
