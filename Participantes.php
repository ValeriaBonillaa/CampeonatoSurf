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
	 <h1>Registrar Participantes</h1>
	    <br>
	 	<form name="usuario" method="POST" action="">
		<table border="0" align="center">
		<tr>
		<td>Ingrese su nombre</td>
		<td><input name="nombre" type="text" required value=""></td>
		</tr>
		<tr>
		<td>Ingrese su cedula:</td>
		<td><input name="cedula" type="number" required value=""></td>
		</tr>
		<tr>
		<td>Genero:</td>
		<td><input name="genero" type="radio" required value="femenino">Femenino
		<input name="genero" type="radio" required value="masculino">Masculino</td>
		</tr>
		<tr>
		<td>Edad:</td>
		<td><input name="edad" type="number" required value=""></td>
		</tr>
		<tr>
		<td>Fecha de Nacimiento:</td>
		<td><input name="fechaNacimiento" type="date" required value=""></td> 
		</tr>
		<tr>
		<td>Domicilio:</td>
		<td><input name="domicilio" type="text" required value=""></td>
		</tr>
		<tr>
		<td>Fecha de Registro:</td>
		<td><input name="fechaRegistro" type="text" readonly required value="<?php echo $fecha?>"></td>
		</tr>
		<tr>
		<td>Tipo de Jugador:</td>
		<td><input name="tipoJugador" type="radio" required value="novato">Novato
		<input name="tipoJugador" type="radio" required value="intermedio">Intermedio
		<input name="tipoJugador" type="radio" required value="experimentado">Experimentado</td>
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
		
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "SurfUp");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query = "INSERT INTO participante VALUES('$_REQUEST[nombre]' , '$_REQUEST[cedula]' , '$_REQUEST[genero]' , '$_REQUEST[edad]', '$_REQUEST[fechaNacimiento]' , '$_REQUEST[domicilio]' , '$_REQUEST[fechaRegistro]', '$_REQUEST[tipoJugador]')";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El participante se agrego correctamente");';
	    echo '</script>';
    }

   else{
	   echo '<script language="javascript">';
	   echo 'alert("El participante no se pudo agregar correctamente");';
	   echo '</script>';		
    }
 }
?>