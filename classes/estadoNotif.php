<?php
//include "conectaBD.php";

$est= $_POST["rd-tempo"];
$intervalo= $_POST["int"];
//$est="1";

$arquivo_origem = "/var/www/html/tcc/crontab/crontab_5";
$arquivo_origem10 = "/var/www/html/tcc/crontab/crontab_10";
$arquivo_origem3 = "/var/www/html/tcc/crontab/crontab_0";
$arquivo_destino="/var/spool/cron/crontabs/www-data";

        if ($est == "1"){
		if($intervalo == "5"){
	                copy($arquivo_origem,$arquivo_destino);
		}else{
                	copy($arquivo_origem10,$arquivo_destino);
		}

        }else{
                copy($arquivo_origem3,$arquivo_destino);

        }

?>


