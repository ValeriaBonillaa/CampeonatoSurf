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
	  <li><a href="Usuario.php" title="">Registrar Usuario</a></li>
      <li><a href="MostrarUsuarios.php" title="">Mostrar Usuarios</a></li>
	  <li><a href="Auditoria.php" title="">Auditoria</a></li>
      <li><a href="AcercaDe.php" title="">Acerca de</a></li>
	  <li><a href="Salir.php" title="">Salir</a></li>
    </ul>
  </div>

  <div id="contentt"> 

    <div id="insidecontent"> <br>
      <h1>Registro de usuarios</h1>
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
		<td>Puesto:</td>
		<td><input name="puesto" type="radio" required value="admin">Administrador
		<input name="puesto" type="radio" required value="coordinador">Coordinador
		<input name="puesto" type="radio" required value="consultor">Consultor</td>
		</tr>
		<tr>
		<td>Estado:</td>
		<td><input name="estado" type="radio" required value="activo">Activo
		<input name="estado" type="radio" required value="inactivo">Inactivo</td>
		</tr>
		<tr>
		<td>Ingrese los años de antiguedad:</td>
		<td><input name="antiguedad" type="number" required value=""></td>
		</tr>
		<tr>
		<td>Nombre de usuario:</td>
		<td><input name="usuario" type="text" required value=""></td>
		</tr>
		<tr>
		<td>Ingrese la contraseña:</td>
		<td><input name="contrasena" type="password" required value=""></td>
		</tr>
		<tr>
		<td>Confirme la contraseña:</td>
		<td><input name="confirmacion" type="password" required value=""></td>
		</tr>
		<tr>
		<td><input value="Registrar" type="submit" name="registrar">
		<input value="Cancelar" type="reset" name="Cancelar"></td>
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
        if(($_POST['contrasena'] == $_POST['confirmacion'])){
  
      $salario = 0;
      $monto = 0;
	  
	  if($_REQUEST['puesto'] == "admin"){
	      $monto = 3500*(0.1*$_REQUEST['antiguedad']);
	      $salario = 3500 + $monto;
	  }else if($_REQUEST['puesto'] == "coordinador"){
	      $monto = 3500*(0.07*$_REQUEST['antiguedad']);
	      $salario = 3500 + $monto;
	  }else if ($_REQUEST['puesto'] == "consultor"){
	      $monto = 3500*(0.05*$_REQUEST['antiguedad']);
	      $salario = 3500 + $monto;
	  }	
	
	$link = mysqli_connect("localhost", "root", "");

	mysqli_select_db($link, "SurfUp");

	$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes	
			
	$query = "INSERT INTO usuario VALUES('$_REQUEST[nombre]' , '$_REQUEST[cedula]' , '$_REQUEST[puesto]' , '$_REQUEST[estado]', '$_REQUEST[antiguedad]' , '$_REQUEST[usuario]' , '$_REQUEST[contrasena]', '$salario')";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El usuario se agrego correctamente");';
	    echo '</script>';
    }
}
   else{
	   echo '<script language="javascript">';
	   echo 'alert("El usuario no se pudo agregar correctamente");';
	   echo '</script>';		
    }
 }
?>