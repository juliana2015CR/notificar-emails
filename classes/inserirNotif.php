<?php




// INICIA LIGAÇÃO À BASE DE DADOS
$con=mysqli_connect("localhost","root","root","graficos");

// VERIFICA A LIGAÇÃO NÃO TEM ERROS
if (mysqli_connect_errno())
{
    // CASO TENHA ERROS MOSTRA O ERRO DE LIGAÇÃO À BASE DE DADOS
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// CASO TUDO ESTEJA OK INSERE DADOS NA BASE DE DADOS
$sql="INSERT INTO notificacoes (estado, intervalo) VALUES ('$_POST[estado]','$_POST[intervalo]')";


// CASO ESTEJA TUDO OK ADICIONA OS DADOS, SENÃO MOSTRA O ERRO
if (!mysqli_query($con,$sql))
{
  die('Error: ' . mysqli_error($con));
}

echo "1 record added";

mysqli_close($con);

?>
