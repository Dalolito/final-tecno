<!DOCTYPE html>
	<link rel="stylesheet"  href="estilo.css">
<body background="fondo2.jpg">
<center>
<div class="primero2">
	<font face="Courier" color="white" size="5"><br><br><br><br>
	
<?php
session_start();
$fallas=$_SESSION['fallas'];
$score=$_SESSION['score'];
$i=0;
$v=0;
$valor=0;
$veces=$_SESSION['veces'];
$veces=$veces+1;
$_SESSION['veces']=$veces;
if ($veces==60) {
	?>
		<div class="perdiste ">
		<center><font face="Courier" color="white" size="12"><br><br>
	<?php	
    echo "¡GANASTE!";
    ?>
    	<form action="registro.php"  method="POST">
        <input type="hidden" name="score"  value="<?php $score	?>" > 
        <input type="submit" value="CONTINUAR" name="continuar" id="continuar">
        </form>
	</div>
	<?php
}
else{
if ($veces==1)
{
	$randoms=array();

	while ( $i<= 60) 
	{
		$r=rand(1, 60);
		$randoms[$i] = $r;
		$i=$i+1;
	}

	$_SESSION['randoms']=$randoms;
}

$v=$veces-1;
$randoms=$_SESSION['randoms'];
$valor=$randoms[$veces];
$valor2=$randoms[$v];

$conexion=new mysqli("localhost","root","","final");
$sql="SELECT * FROM final WHERE ID ='$valor'";
$resultado=$conexion->query($sql);
$dato=$resultado->fetch_assoc();

$conexion2=new mysqli("localhost","root","","final");
$sql2="SELECT * FROM final WHERE ID ='$valor2'";
$resultado2=$conexion2->query($sql2);
$dato2=$resultado2->fetch_assoc();
$score=$_SESSION['score'];

echo $dato['Pregunta'];
?>
</center>
<br>
	<img src="boton verde.png" width="23%" height="45%" id="imagen">
	<img src="boton verde.png" width="23%" height="45%" id="imagen2">
 	<img src="boton verde.png" width="23%" height="45%" id="imagen3">

 	<form action="juegoo.php"  method="POST">
 		<input type="submit" value="<?php	echo "a. ".$dato['A'];	?>" name="A" id="boton">
 		<input type="submit" value="<?php	echo "b. ".$dato['B'];	?>" name="B" id="boton2">
 		<input type="submit" value="<?php	echo "c. ".$dato['C'];	?>" name="C" id="boton3">
 		<input type="submit" value="<?php	echo "d. ".$dato['D'];	?>" name="D" id="boton4">
	</form>
	<br>
<?php
if (isset($_POST['A'])||isset($_POST['B'])||isset($_POST['C'])||isset($_POST['D']))
{
	if(isset($_POST['A']))
	{
		$respuesta="A";
	}
	else
		if(isset($_POST['B']))
		{  
			$respuesta="B";
		}
		else
			if(isset($_POST['C']))
			{
				$respuesta="C";
			}
			else
				if(isset($_POST['D']))
				{
					$respuesta="D";
				}
	if ($respuesta==$dato2['Correcta'])
	{
		$score=$score+10;
		$_SESSION['score']=$score;
	}
	else
	{
		$fallas=$fallas+1;
		$_SESSION['fallas']=$fallas;
	}	
}
?>
<center><div class="score">
	<?php
	echo "Score: " .$score;
	?>
</div></center>
	<?php
	if($fallas==1)
	{
	?>
<img src="boton rojo.png"  id="imagenn">
	<?php
	}
	else
		if($fallas==2)
		{
	?>
<img src="boton rojo.png" id="imagenn">
<img src="boton rojo.png"  id="imagenn2">
	<?php
		}
		else
			if($fallas==3)
			{
	?>
<img src="boton rojo.png"  id="imagenn">
<img src="boton rojo.png"  id="imagenn2">
<img src="boton rojo.png"  id="imagenn3">

	<div class="perdiste ">
		<center><font face="Courier" color="white" size="12"><br><br>
	<?php	
    echo "¡PERDISTE!";
    ?>
    	<form action="registro.php"  method="POST">
        <input type="hidden" name="score"  value="<?php $score	?>" > 
        <input type="submit" value="CONTINUAR" name="continuar" id="continuar">
        </form>
	</div>
	<?php
	}
	}
	?>
</font></center>
</div>
</body>
</html>