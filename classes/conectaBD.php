<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="_css/estilo.css"/>
  <meta charset="UTF-8"/>
  <title>Smartbee</title>
</head>
<body>
<div>

    <?php

    $link = mysqli_connect("localhost", "root", "root");

    if (!$link) {
        echo "Error: Falha ao conectar-se com o banco de dados MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

return $link;
//echo "Sucesso: Sucesso ao conectar-se com a base de dados MySQL." . PHP_EOL;

?>

</div>
</body>
</html>
 
