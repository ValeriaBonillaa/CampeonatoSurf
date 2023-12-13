<html>
<head>
<title>Campeonato.com</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="css.css" media="screen" />
</head>

<body>

<div id="container"> 

  <div id="header">
    <div class="headtitle">Campeonato Nacional de Surf</div>
<?php
	if (isset($_COOKIE['usuario'])) 
	  echo "<h1>" . "Nombre del Usuario: " . $_COOKIE['usuario'] . "</h1>";
?>
  </div>

  <div id="menu"> 
    <ul>
      <li><a href="Inicio.php" title="">Inicio</a></li>
      <li><a href="Participantes.php" title="">Participantes</a></li>
      <li><a href="MostrarParticipantes.php" title="">Mostrar Participantes</a></li>
      <li><a href="OlasMontadas.php" title="">Olas Montadas</a></li>
      <li><a href="MostrarOlas.php" title="">Mostrar Olas </a></li>
	  <li><a href="Usuarios.php" title="">Registrar Usuario</a></li>
      <li><a href="MostrarUsuarios.php" title="">Mostrar Usuarios</a></li>
	  <li><a href="Auditoria.php" title="">Auditoria</a></li>
      <li><a href="AcercaDe.php" title="">Acerca de</a></li>
	  <li><a href="Salir.php" title="">Salir</a></li>
    </ul>
  </div>

  <div id="contentt"> 

    <div id="insidecontent"> <br>
      <h1>Registrar Olas Montadas</h1>
	    <br>
		<form name="usuario" method="POST" action="">
		<table border="0" align="center">
		<tr>
		<td>Nombre del participante:</td>
		<td><input name="nombre" type="text" required value=""></td>
		</tr>
		<tr>
		<td>Fecha de Participacion:</td>
		<td><input name="fecha" type="date" required value=""></td>
		</tr>
		<tr>
		<td>Duracion de la ola montada (segundos):</td>
		<td><select name="duracion">
		<option value="Entre 20 y 40">Entre 20 y 40</option>
		<option value="Entre 41 y 100">Entre 41 y 100</option>
		<option value="Mas de 100">Mas de 100</option></select></td>
		</tr>
		<tr>
		<td>Juez:</td>
		<td><select name="juez">
		<option value="J1">J1</option>
		<option value="J2">J2</option>
		<option value="J3">J3</option>
		<option value="J4">J4</option></select></td>
		</tr>
		<tr>
		<td>Tipo de Olas Logradas:</td>
		<td><select name="tipo">
		<option value="Mala">Mala</option>
		<option value="Mediocre">Mediocre</option>
		<option value="Buena">Buena</option>
		<option value="Muy buena">Muy buena</option>
		<option value="Excelente">Excelente</option></select></td>
		</tr>
		<tr>
		<td><input value="Registrar" type="submit" name="registrar">
		<input value="Cancelar" type="reset" name="Cancelar" ></td>
		</tr>
		</table>
		</form> 
    </div>  
    <div style="clear: both;"></div>
  </div>

  <div id="footer"> <span>Copyright © 2022 | Diseñado por: <a href="mailto: dchacon2404@gmail.com" title="Jorge David Chacón">Jorge David Chacón</a>  
   y <a href="mailto: vbonilla0825@gmail.com" title="Jorge David Chacón">Valeria Bonilla</a></span></div>
</div>
</body>
</html>
<?php
  if (isset($_POST['registrar'])){
  
  $puntuacion= 0;  
  $total= 0;
  
     switch($_REQUEST['tipo']){
	   case ("Mala"):
	      $puntuacion = 20;
		  break;
	   case ("Mediocre"):
	      $puntuacion = 40;
		  break;
	   case ("Buena"):
	      $puntuacion =60;
		  break;
	   case ("Muy buena"):
	      $puntuacion =80;
		  break;
	   case ("Excelente"):
	      $puntuacion =100;
		  break;  	
     return $puntuacion;		  
  }
    switch($_REQUEST['duracion']){
	   case ("Entre 20 y 40"):
	      $total = $puntuacion +10;
		  break;
	   case ("Entre 41 y 100"):
	      $total = $puntuacion +20;
		  break;
	   case ("Mas de 100"):
	      $total = $puntuacion +30;
		  break;
	 return $total;
   }
   
     date_default_timezone_set('America/Costa_Rica');
	$fecha=date("Y");
	$valoraleatorio=rand(1000,9000);
	$numero = ($fecha . $valoraleatorio);
	
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "SurfUp");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query = "INSERT INTO ola VALUES('$numero' , '$_REQUEST[nombre]' , '$_REQUEST[fecha]' , '$_REQUEST[duracion]', '$_REQUEST[juez]' , '$_REQUEST[tipo]' , '$total')";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("Se agrego correctamente");';
	    echo '</script>';
    }

   else{
	   echo '<script language="javascript">';
	   echo 'alert("No se pudo agregar correctamente");';
	   echo '</script>';		
    }
 }
?>

