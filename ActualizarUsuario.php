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
  
        $cedula= $_REQUEST["cedula"];
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "SurfUp");
		$result = mysqli_query($link, "select * from usuario where cedula = '".$cedula."'");
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
	    <td>Puesto: </td>
<?php 
       if(($extraido['puesto']) == 'admin'){
			echo "<td> <input type='radio' name='puesto' value='admin' checked>Administrador";
		    echo"<input type='radio' name='puesto' value='coordinador'>Coordinador";
			echo"<input type='radio' name='puesto' value='consultor'>Consultor</td>";
         }elseif (($extraido['puesto']) == 'coordinador'){
	      echo "<td> <input type='radio' name='puesto' value='admin' >Administrador";
		    echo"<input type='radio' name='puesto' value='coordinador' checked>Coordinador";
			echo"<input type='radio' name='puesto' value='consultor'>Consultor</td>";
		 }else{
	      	echo "<td> <input type='radio' name='puesto' value='admin' checked>Administrador";
		    echo"<input type='radio' name='puesto' value='coordinador'>Coordinador";
			echo"<input type='radio' name='puesto' value='consultor'checked>Consultor</td>";
		 }
?>
       </tr>
		<tr>
	    <td>Estado:</td>
<?php 
       if(($extraido['estado']) == 'femenino'){
			echo "<td> <input type='radio' name='estado' value='activo' checked>Activo";
		    echo"<input type='radio' name='estado' value='inactivo'>Inactivo</td>";
         }else{
	       echo "<td> <input type='radio' name='estado' value='activo'>Activo";
		   echo"<input type='radio' name='estado' value='inactivo' checked>Inactivo</td>";
         }
?>
        </tr>
		<tr>
		<td>Ingrese los años de antiguedad:</td>
		<td><input name="antiguedad" type="number" required value="<?php echo $extraido['antiguedad']?>"></td>
		</tr>
		<tr>
		<td>Nombre de usuario:</td>
		<td><input name="usuario" type="text" required value="<?php echo $extraido['usuario']?>"></td>
		</tr>
		<tr>
		<td>Salario:</td>
		<td><input name="salario" type="number" readonly required value="<?php echo $extraido['salario']?>"> *No es editable ya  que es un calculo</td>
		</tr>
		<tr>
		<td>Ingrese la contraseña:</td>
		<td><input name="contrasena" type="password" required value="<?php echo $extraido['contrasena']?>"></td>
		</tr>
		<tr>
		<td>Confirme la contraseña:</td>
		<td><input name="confirmacion" type="password" required value="<?php echo $extraido['contrasena']?>"></td>
		</tr>
<?php
        mysqli_close($link);
?>
		<tr>
		<td><input value="Actualizar" type="submit" name="actualizar">
		<input value="Regresar" type="submit" name="regresar" ></td>
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
  if (!empty($_POST['actualizar'])){
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
			
	$query =  "UPDATE usuario set nombre ='".$_REQUEST['nombre']."', cedula = '".$_REQUEST['cedula']."', puesto = '".$_REQUEST['puesto']."', estado = '".$_REQUEST['estado']."', antiguedad = '".$_REQUEST['antiguedad']."', usuario = '".$_REQUEST['usuario']."' , contrasena = '".$_REQUEST['contrasena']."', salario ='".$salario."' where cedula = '".$cedula."'";

	if (mysqli_query($link, $query)) {
        mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("El usuario se actualizo correctamente");';
		echo 'window.location.href=("MostrarUsuarios.php")';
	    echo '</script>';
    }
	   }

   else{
       mysqli_close($link);
	   echo '<script language="javascript">';
	   echo 'alert("El usuario no se pudo actualizar correctamente");';
	   echo '</script>';		
    }
 } 
   if (isset($_POST['regresar'])){
       	echo '<script language="javascript">';
	    echo 'alert("Regresando a Mostrar Usuarios");';
	    echo 'window.location.href=("MostrarUsuarios.php")';
	    echo '</script>';
   }
    
?>