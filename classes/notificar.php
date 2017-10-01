<?php
include "conectaBD.php";

$banco = 'graficos';

mysqli_select_db($link,$banco);

//lista de usuarios vazia
$nomes_users = array();
$emails = array();
//lista de coletas vazia
$temperaturas = array();
$umidades = array();
$dioxidos = array();
$sons = array();
$tc = array();
$tr = array();
$tg = array();

//seleção do ultimo valor inserido no banco

$i = 0;
$sql="select u.* , c.* from usuarios as u, coletas as c where c.amostra = (select coletas.amostra from coletas ORDER BY coletas.amostra DESC LIMIT 1)";
$resultado = mysqli_query($link,$sql);

//pega os valores de resultado e coloca em cada array
while ($row = mysqli_fetch_object($resultado)){
	$nomes[$i] = $row->nome;
	$emails[$i] = $row->email;
    	$temperaturas[$i] = $row->temperatura;
    	$umidades[$i] = $row->umidade;
    	$dioxidos[$i] = $row->dioxido;
    	$sons[$i] = $row->som;
    	$tc[$i] = $row->tensaocolmeia;
    	$tr[$i] = $row->tensaorepetidor;
    	$tg[$i] = $row->tensaogateway;

	$i = $i + 1;
}

foreach ($nomes as $indice => $nome1) {
		echo $nome1 . ", ";

}

foreach ($emails as $indice => $email1) {
		echo $email1 . ", ";

}

foreach ($temperaturas as $indice => $temp) {
	if ($temp >= "37") {
		echo $temp . ", ";
		$mensagem1 = "Temperatura alta: $temp ºC";
	}elseif ($temp <= "29") {
		echo $temp . ", ";
		$mensagem1 = "Temperatura baixa: $temp ºC";
	}else  {
		$cont1 = 1;
	}

}
foreach ($umidades as $indice => $umi) {
	if ($umi >= "37") {
		echo $umi . ", ";
		$mensagem2 = "Umidade alta: $umi";
	}elseif ($umi <= "29") {
		echo $umi . ", ";
		$mensagem2 = "Umidade baixa: $umi";
	}else  {
		$cont2 = 1;		

	}

}

foreach ($dioxidos as $indice => $di) {
	if ($di >= "37") {
		echo $di . ", ";
		$mensagem3 = "Dioxido alto: $di";
	}elseif ($di <= "29") {
		echo $di . ", ";
		$mensagem3 = "Dioxido baixo: $di";
	}else  {
		$cont3 = 1;		


	}

}
foreach ($sons as $indice => $so) {
	if ($so >= "37") {
		echo $so . ", ";
		$mensagem4 = "Som alto: $so";
	}elseif ($so <= "29") {
		echo $so . ", ";
		$mensagem4 = "Som baixo: $so";
	}else  {
		$cont4 = 1;		


	}

}
foreach ($tc as $indice => $tenc) {
	if ($tenc >= "37") {
		echo $tenc . ", ";
		$mensagem5 = "Tensao na Colmeia alta: $tenc";
	}elseif ($tenc <= "29") {
		echo $tenc . ", ";
		$mensagem5 = "Tensao na Colmeia baixa: $tenc";
	}else  {
		$cont5 = 1;		
		
	}

}
foreach ($tr as $indice => $tenr) {
	if ($tenr >= "37") {
		echo $tenr . ", ";
		$mensagem6 = "Tensao no repetidor alta: $tenr";
	}elseif ($tenr <= "29") {
		echo $tenr . ", ";
		$mensagem6 = "Tensao no repetidor baixa: $tenr";
	}else  {
		$cont6 = 1;		
		


	}

}
foreach ($tg as $indice => $teng) {
	if ($teng >= "37") {
		echo $teng . ", ";
		$mensagem7 = "Tensao no gateway alta: $teng";
	}elseif ($teng <= "29") {
		echo $teng . ", ";
		$mensagem7 = "Tensao no gateway baixa: $teng";
	}else  {
		$cont7 = 1;		
		

	}

}

$txtNome	= $nome1;
$txtAssunto	= "Alerta Smartbee";

//caso não haja valores no banco a mensagem não é enviada

$soma = $cont1+$cont2+$cont3+$cont4+$cont5+$cont6+$cont7;

	if ($soma == 7){
		$txtEmail = "0";
	}else
	{
		$txtEmail= $email1;

	}


$txtMensagem = array();
$txtMensagem[0] = $mensagem1;
$txtMensagen[1] = $mensagem2;
$txtMensagem[2] = $mensagem3;
$txtMensagem[3] = $mensagem4;
$txtMensagem[4] = $mensagem5;
$txtMensagem[5] = $mensagem6;
$txtMensagem[6] = $mensagem7;

$mensagemFinal = "";
foreach ($txtMensagem as $indice => $in ){
	
	if (isset($in)){
		$mensagemFinal = $mensagemFinal.$in."<br></br>"; 		
	
	}
}

$corpoMensagem = "<b>Nome:</b> ".$txtNome." <br><b>Assunto:</b> ".$txtAssunto." <br><b><h2>Dados<h2></b></br> ".$mensagemFinal;

//classe do envio de e-mail
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

