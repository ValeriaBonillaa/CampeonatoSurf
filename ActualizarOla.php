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
	date_default_timezone_set('America/Costa_Rica');
	$fecha=date("d/m/Y");
	if (isset($_COOKIE['usuario'])) 
	  echo "<h1>" . "Nombre del Usuario: " . $_COOKIE['usuario'] . "</h1>";
  
        $codigo= $_REQUEST["codigo"];
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "SurfUp");
		$result = mysqli_query($link, "select * from ola where codigo = '".$codigo."'");
		mysqli_data_seek ($result, 0);
		$extraido= mysqli_fetch_array($result);
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
	 <h1>Actualizar Olas</h1>
	    <br>
	 	<form name="usuario" method="POST" action="">
		<table border="0" align="center">
		<tr>
		<td>Nombre del participante</td>
		<td><input name="nombre" type="text" readonly required value="<?php echo $extraido['nombre']?>"></td>
		</tr>
	    <tr>
		<td>Fecha de Participacion</td>
		<td><input name="fecha" type="date" readonly required value="<?php echo $extraido['fecha']?>"></td>
		</tr>
		<tr>
	    <td>Duracion de la ola montada (segundos): </td>
<?php 
       if(($extraido['duracion']) == 'Entre 20 y 40'){
			echo"<td> <input type='radio' name='duracion' value='Entre 20 y 40' checked>Entre 20 y 40";
		    echo"<input type='radio' name='duracion' value='Entre 41 y 100'>Entre 41 y 100";
			echo"<input type='radio' name='duracion' value='Mas de 100'>Mas de 100</td>";
         }elseif (($extraido['duracion']) == 'Entre 41 y 100'){
            echo"<td> <input type='radio' name='duracion' value='Entre 20 y 40'>Entre 20 y 40";
		    echo"<input type='radio' name='duracion' value='Entre 41 y 100' checked>Entre 41 y 100";
			echo"<input type='radio' name='duracion' value='as de 100'>Mas de 100</td>";
		 }else{
            echo"<td> <input type='radio' name='duracion' value='Entre 20 y 40'>Entre 20 y 40";
		    echo"<input type='radio' name='duracion' value='Entre 41 y 100'>Entre 41 y 100";
			echo"<input type='radio' name='duracion' value='Mas de 100' checked>Mas de 100</td>";
		 }
?>
        </tr>
		<tr>
		<td>Juez:</td>
<?php 
       if(($extraido['juez']) == 'J1'){
			echo"<td> <input type='radio' name='juez' value='J1' checked>J1";
		    echo"<input type='radio' name='juez' value='J2'>J2";
			echo"<input type='radio' name='juez' value='J3'>J3";
			echo"<input type='radio' name='juez' value='J4'>J4</td>";
         }elseif (($extraido['juez']) == 'J2'){
            echo"<td> <input type='radio' name='juez' value='J1'>J1";
		    echo"<input type='radio' name='juez' value='J2' checked>J2";
			echo"<input type='radio' name='juez' value='J3'>J3";
			echo"<input type='radio' name='juez' value='J4'>J4</td>";
		 }elseif(($extraido['juez']) == 'J3'){
 			echo"<td> <input type='radio' name='juez' value='J1'>J1";
		    echo"<input type='radio' name='juez' value='J2'>J2";
			echo"<input type='radio' name='juez' value='J3' checked>J3";
			echo"<input type='radio' name='juez' value='J4'>J4</td>";
		 } else {
		    echo"<td> <input type='radio' name='juez' value='J1'>J1";
		    echo"<input type='radio' name='juez' value='J2'>J2";
			echo"<input type='radio' name='juez' value='J3'>J3";
			echo"<input type='radio' name='juez' value='J4' checked>J4</td>";
		 }
 ?>
		</tr>
		<tr>
		<td>Tipo de Olas Logradas:</td>
<?php 
       if(($extraido['tipo']) == 'Mala'){
			echo"<td> <input type='radio' name='tipo' value='Mala' checked>Mala";
		    echo"<input type='radio' name='tipo' value='Mediocre'>Mediocre";
			echo"<input type='radio' name='tipo' value='Buena'>Buena";
			echo"<input type='radio' name='tipo' value='Muy buena'>Muy Buena";
			echo"<input type='radio' name='tipo' value='Excelente'>Excelente</td>";
       } elseif (($extraido['tipo']) == 'Mediocre'){
  			echo"<td> <input type='radio' name='tipo' value='Mala'>Mala";
		    echo"<input type='radio' name='tipo' value='Mediocre' checked>Mediocre";
			echo"<input type='radio' name='tipo' value='Buena'>Buena";
			echo"<input type='radio' name='tipo' value='Muy buena'>Muy Buena";
			echo"<input type='radio' name='tipo' value='Excelente'>Excelente</td>";
	  }elseif (($extraido['tipo']) == 'Buena'){
 			echo"<td> <input type='radio' name='tipo' value='Mala'>Mala";
		    echo"<input type='radio' name='tipo' value='Mediocre'>Mediocre";
			echo"<input type='radio' name='tipo' value='Buena'checked>Buena";
			echo"<input type='radio' name='tipo' value='Muy buena'>Muy Buena";
			echo"<input type='radio' name='tipo' value='Excelente'>Excelente</td>";
	  }elseif (($extraido['tipo']) == 'Muy buena'){
 			echo"<td> <input type='radio' name='tipo' value='Mala'>Mala";
		    echo"<input type='radio' name='tipo' value='Mediocre'>Mediocre";
			echo"<input type='radio' name='tipo' value='Buena'>Buena";
			echo"<input type='radio' name='tipo' value='Muy buena' checked>Muy Buena";
			echo"<input type='radio' name='tipo' value='Excelente'>Excelente</td>";
      }elseif(($extraido['tipo']) == 'Excelente'){
			echo"<td> <input type='radio' name='tipo' value='Mala'>Mala";
		    echo"<input type='radio' name='tipo' value='Mediocre'>Mediocre";
			echo"<input type='radio' name='tipo' value='Buena'>Buena";
			echo"<input type='radio' name='tipo' value='Muy buena'>Muy Buena";
			echo"<input type='radio' name='tipo' value='Excelente'checked>Excelente</td>";
      }
 ?>
		</tr>
		<tr>
		<td>Puntaje Obtenido:</td>
		<td><input name="total" type="text" readonly required value="<?php echo $extraido['total']?>"></td>
		</tr>
<?php
        mysqli_close($link);
?>
		<tr>
		<td><input value="Actualizar" type="submit" name="actualizar">
		<input value="Regresar" type="submit" name="regresar"></td>
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
  if (isset($_POST['actualizar'])){
  
  $puntuacion =0;
  $total =0;
  
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
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "SurfUp");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query =  "UPDATE ola set nombre = '".$_REQUEST['nombre']."', fecha = '".$_REQUEST['fecha']."', duracion = '".$_REQUEST['duracion']."', juez = '".$_REQUEST['juez']."' , tipo = '".$_REQUEST['tipo']."', total = '".$total."' where codigo = '".$codigo."'";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("La ola se actualizo correctamente");';
	    echo 'window.location.href=("MostrarOlas.php")';
	    echo '</script>';
    }

   else{
       mysqli_close($link);
	   echo '<script language="javascript">';
	   echo 'alert("La ola no se pudo actualizar correctamente");';
	   echo '</script>';		
    }
 }
   if (isset($_POST['regresar'])){
       	 echo '<script language="javascript">';
	    echo 'alert("Regresando a Mostrar Olas");';
	    echo 'window.location.href=("MostrarOlas.php")';
	    echo '</script>';
   }
?>