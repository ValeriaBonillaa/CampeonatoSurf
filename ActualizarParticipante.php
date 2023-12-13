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
  
        $cedulaParticipante= $_REQUEST["cedula"];
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "SurfUp");
		$result = mysqli_query($link, "select * from participante where cedula = '".$cedulaParticipante."'");
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
	 <h1>Actualizar Participantes</h1>
	    <br>
	 	<form name="usuario" method="POST" action="">
		<table border="0" align="center">
		<tr>
		<td>Ingrese su nombre</td>
		<td><input name="nombre" type="text" required value="<?php echo $extraido['nombre']?>"></td>
		</tr>
		<tr>
		<td>Ingrese su cedula:</td>
		<td><input name="cedula" type="number" readonly required value="<?php echo $extraido['cedula']?>"></td>
		</tr>
		<tr>
	    <td>Genero: </td>
<?php 
       if(($extraido['genero']) == 'femenino'){
			echo "<td> <input type='radio' name='genero' value='femenino' checked>Femenino";
		    echo"<input type='radio' name='genero' value='masculino'>Masculino</td>";
         }else{
	       echo "<td> <input type='radio' name='genero' value='femenino'>Femenino";
		   echo"<input type='radio' name='genero' value='masculino' checked> Masculino</td>";
         }
?>
        </tr>
		<tr>
		<td>Edad:</td>
		<td><input name="edad" type="number" required value="<?php echo $extraido['edad']?>"></td>
		</tr>
		<tr>
		<td>Fecha de Nacimiento:</td>
		<td><input name="fechaNacimiento" type="date" required value="<?php echo $extraido['fechaNacimiento']?>"></td> 
		</tr>
		<tr>
		<td>Domicilio:</td>
		<td><input name="domicilio" type="text" required value="<?php echo $extraido['domicilio']?>"></td>
		</tr>
		<tr>
		<td>Fecha de Registro:</td>
		<td><input name="fechaRegistro" type="text" readonly required value="<?php echo $fecha?>"></td>
		</tr>
	    <tr>
	    <td>Tipo de Jugador: </td>
<?php 
       if(($extraido['tipoJugador']) == 'novato'){
			echo "<td> <input type='radio' name='tipoJugador' value='novato' checked>Novato";
		    echo"<input type='radio' name='tipoJugador' value='intermedio'>Intermedio";
			echo"<input type='radio' name='tipoJugador' value='avanzado'>Avanzado</td>";
         }elseif (($extraido['tipoJugador']) == 'intermedio'){
	      	echo "<td><input type='radio' name='tipoJugador' value='novato'>Novato";
		    echo"<input type='radio' name='tipoJugador' value='intermedio' checked>Intermedio";
			echo"<input type='radio' name='tipoJugador' value='avanzado'>Avanzado</td>";
		 }else{
	      	echo "<td> <input type='radio' name='tipoJugador' value='novato'>Novato";
		    echo"<input type='radio' name='tipoJugador' value='intermedio'>Intermedio";
			echo"<input type='radio' name='tipoJugador' value='avanzado' checked>Avanzado</td>";
		 }
?>
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
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "SurfUp");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query =  "UPDATE participante set nombre ='".$_REQUEST['nombre']."', cedula = '".$_REQUEST['cedula']."', genero = '".$_REQUEST['genero']."', edad = '".$_REQUEST['edad']."', fechaNacimiento = '".$_REQUEST['fechaNacimiento']."', domicilio = '".$_REQUEST['domicilio']."' , fechaRegistro = '".$_REQUEST['fechaRegistro']."', tipoJugador = '".$_REQUEST['tipoJugador']."' where cedula = '".$cedulaParticipante."'";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El participante se actualizo correctamente");';
	    echo 'window.location.href=("MostrarParticipantes.php")';
	    echo '</script>';
    }

   else{
       mysqli_close($link);
	   echo '<script language="javascript">';
	   echo 'alert("El participante no se pudo actualizar correctamente");';
	   echo '</script>';		
    }
 }
   if (!empty($_POST['regresar'])){
       	echo '<script language="javascript">';
	    echo 'alert("Regresando a Mostrar Participantes");';
	    echo 'window.location.href=("MostrarParticipantes.php")';
	    echo '</script>';
   }
?>