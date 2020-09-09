<!DOCTYPE html>
	<link rel="stylesheet"  href="estilo.css">
<body background="fondo.jpg">
<center>
<br><br>
	<font face="showcard gothic" color="white" size="8"><center>Ask Win</center></font>
	<div class="primero">
		<br><font face="showcard gothic" color="white" size=""><h2>¡BIENVENIDO A UN DIVERTIDO JUEGO DE PREGUNTAS!</h2></font>
	  	<a href="juegoo.php"><img src="boton.png" width="23%" height="47%"></a>
	  	<font face="Courier" color="white" size=""><h3>Creadores: Juanita Castrillon-Manuela Londoño-David Lopera.</h3></font>
	</div>

	<div class="record">
		<font face="Courier" color="white" size="4">
		<?php
	  	if (isset($_POST['A2']))
	  	{
	  		$nombre=$_POST['nombre'];
	  		session_start();
	  		$score=$_SESSION['score'];
	  		echo "Record:". $nombre;
	  		echo " Score:". $score;
	  	}
	  	else
	  	{
	  		echo "Aun no hay record ";
	  	}
	  	?>
	  	</font>
	</div>

<?php

session_start();
$fallas=0;
$veces=0;
$_SESSION['veces']=$veces;
$_SESSION['fallas']=$fallas;
$score=0;
$_SESSION['score']=$score;
?>
</center>
</body>
</html>