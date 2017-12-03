<?php

include "conectaBD.php";

$banco = 'graficos';

mysqli_select_db($link,$banco);

$datas = array();
$temperaturas = array();
$umidades = array();
$sons = array();
$cargas = array();
$apiario = $_POST['nome'];

echo "<h2>Dados do $apiario </h2>";

$i = 0;
$sql="select * from $apiario";
$resultado = mysqli_query($link,$sql);

while ($row = mysqli_fetch_object($resultado)){

    $datas[$i] = $row->data;
    $temperaturas[$i] = $row->temperatura;
    $umidades[$i] = $row->umidade;
    $sons[$i]=$row->som;
    $cargas[$i]=$row->carga;

    $i = $i + 1;
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/css/style.css"/>
 
   <title>Untitled Document</title>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
        google.load('visualization', '1', {'packages':['corechart']});
        google.setOnLoadCallback(desenhaGrafico);

        function desenhaGrafico() {

            var data = new google.visualization.DataTable();

            data.addColumn('string', 'Data');
            data.addColumn('number', 'Temperatura');
            data.addColumn('number', 'Umidade');
            data.addColumn('number', 'Som');
            data.addColumn('number', 'Carga');
            data.addRows(<?php echo $i ?>);
            <?php

            $k = $i;
            for ($i = 0; $i < $k; $i++) {

            ?>
            data.setValue(<?php echo $i ?>, 0, '<?php echo $datas[$i] ?>');
            data.setValue(<?php echo $i ?>, 1, <?php echo $temperaturas[$i] ?>);
            data.setValue(<?php echo $i ?>, 2, <?php echo $umidades[$i] ?>);
            data.setValue(<?php echo $i ?>, 3, <?php echo $sons[$i] ?>);
            data.setValue(<?php echo $i ?>, 4, <?php echo $cargas[$i] ?>);


        <?php
            }
            ?>
            var options = {
                title: 'Nivel de Temperatura por Data',
                width: 1200,
                height: 400,
                colors: ['#d568d4', 'blue', 'red', 'orange'],
                legend: { position: 'bottom' }
            };
            // cria grafico
            var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
            // desenha grafico
            chart.draw(data, options);
        }
    </script>

    <section id="section">


        <section class="3u 6u(medium) 12u$(xsmall) profile">
            <p>Apiario1</p>
            <form method="post" action="apiarioCon.php">
		<input type="submit" src="img/sensor-temp.png" name="nome" value="apiario1" />
                <input type="submit" class="submit2" src="img/sensor-rain.png" name="nome" value="apiario1"/>
                <input type="submit" class="submit3" src="img/song1.png" name="nome" value="apiario1"/>
                <input type="submit" class="submit4" src="img/carga.png" name="nome" value="apiario1"/>



            </form>
        </section>
        <section class="3u 6u$(medium) 12u$(xsmall) profile">
            <p>Apiario2</p>
            <form method="post" action="apiarioCon.php">

		<input type="submit" src="img/sensor-temp.png" name="nome" value="apiario2" />
                <input type="submit" class="submit2" src="img/sensor-rain.png" name="nome" value="apiario2"/>
                <input type="submit" class="submit3" src="img/song1.png" name="nome" value="apiario2"/>
                <input type="submit" class="submit4" src="img/carga.png" name="nome" value="apiario2"/>


            </form>
        </section>
        <section class="3u 6u$(medium) 12u$(xsmall) profile">
            <p>Apiario3</p>
            <form method="post" action="apiarioCon.php">

		<input type="submit" src="img/sensor-temp.png" name="nome" value="apiario3" />
                <input type="submit" class="submit2" src="img/sensor-rain.png" name="nome" value="apiario3"/>
                <input type="submit" class="submit3" src="img/song1.png" name="nome" value="apiario3"/>
                <input type="submit" class="submit4" src="img/carga.png" name="nome" value="apiario3"/>


            </form>
        </section>

    </section>


<body>
<div id="chart_div"></div>
</body>
</html>﻿



