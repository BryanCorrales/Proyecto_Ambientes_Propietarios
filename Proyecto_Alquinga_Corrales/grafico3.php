<?php 
	$connect = mysqli_connect('localhost','root','','base_vivienda');
	$query='SELECT count(TIPOCASA) Numero, Provincia FROM `datos` where area="Urbano" and TIPOCASA="Mediagua" GROUP by Provincia';
	$result= mysqli_query($connect,$query);
?>


<!Doctype html>
<html lang='en'>
	<head>
		<meta charset='UTF8'>
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1, maximun-scale=1, minimun-scale=1">
		<link rel="stylesheet" type="text/css" href="css/fontello.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
		<link rel="shortcut icon" href="img/planeta.jpg"/>
		<title>"API Charts"</title>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"> </script>
			<script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Provincia', 'Numero'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["Provincia"]."', ".$row["Numero"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                      title: 'Total de casas que existen en el sector urbano que son de tipo Mediagua',  
                      //is3D:true,  
                      pieHole: 0.4  
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>  
		</head>
	
	<body>
	
	
	<header>
			<div class="contenedor">
				<h1 class="icon-globe">Gráficos</h1>
				<input type="checkbox" id="menu-bar">
				<label class="icon-menu" for="menu-bar"></label>
				<nav class="menu">
					<a href="index.html">Inicio</a>
					<a href="page/informacion.html">Información</a>
					<a href="page/contactos.html">Contactos</a>
				</nav>
			</div>
		</header>
	<br></br>
	
	<div style='width=900px'>
		<br></br>
		<h3 align='center'> Grafico - API Google </h3>
		<br></br>
		<div id='piechart' style='width:900px; height:500px'></div>
	</div>
	
	<footer>
			<div class="contenedor">
				<p class="copy">ESFOT &copy; 2019</p>
				<div class="sociales">
					<a class="icon-facebook-official" href="https://www.facebook.com/" target="_blank"></a>
					<a class="icon-twitter" href="https://twitter.com/AdmPublicaEc" target="_blank"></a>
					<a class="icon-instagram" href="https://www.instagram.com/" target="_blank"></a>
				</div>
			</div>
		</footer>
	
	</body>





</html>