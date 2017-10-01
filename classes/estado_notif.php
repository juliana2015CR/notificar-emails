<?php
//include "conectaBD.php";

$est= $_POST["estado"];
//$est="1";

$arquivo_origem = "/var/www/html/tcc/crontab_5";
$arquivo_origem3 = "/var/www/html/tcc/crontab_0";
$arquivo_destino="/var/spool/cron/crontabs/www-data";

        if ($est == "1"){
                copy($arquivo_origem,$arquivo_destino);

        }else{
                copy($arquivo_origem3,$arquivo_destino);

        }

?>


