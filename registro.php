<!DOCTYPE html>
	<link rel="stylesheet"  href="estilo.css">
<body background="fondo3.jpg">
<center>
<br><br>
<font face="showcard gothic" color="white" size="8"><center>Registro</center></font>
<font face="Courier" color="white" size="3">
	<div class="primero">
		<?php
		session_start();
		$score=$_SESSION['score'];
		?>
		<form action="index.php" method="POST">
			<br><h2><label for="fname">NOMBRE:</label><br>
			<input type="text" name="nombre" placeholder="Nombre" required="" value="" >
			<br><br>
			<?php
			$score=$_SESSION['score'];
			echo "<br>";
			echo "Su scord fue: ". $score;
			?><br><br></h2>
			<input type="submit" value="¡listo!" name="A2" id="boton1">
		</form>
	</div>
</font>
</center>
</body>
</html>