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
      <h1>Mostrar Participantes</h1>
	  <br>
 <?php
	 if (!empty($_REQUEST["cedula"])){
		$link = mysqli_connect("localhost", "root", "");
		mysqli_select_db($link, "SurfUp");
		mysqli_query($link, "delete from participante where cedula = '".$_GET["cedula"]."'");
		mysqli_close($link);
	    echo '<script language="javascript">';
	    echo 'alert("Los datos del participante se eliminaron correctamente");';
        echo 'window.location.href=("MostrarParticipantes.php")';
	    echo '</script>';
	}
?>
	 
<?php
     
        	$link = mysqli_connect("localhost", "root", "");

			mysqli_select_db($link, "SurfUp");

			$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes

			$result = mysqli_query($link, "SELECT * FROM `participante`");
			
            echo "<table border= 1>";
			    echo "<tr>";
				echo "<td>" . "Nombre " . "</td>";
				echo "<td>" . "Cedula " . "</td>" ;	
				echo "<td>" . "Genero " . "</td>";
				echo "<td>" . "Edad " . "</td>";
                echo "<td>" . "Fecha de Nacimiento" . "</td>";
				echo "<td>" . "Domicilio" . "</td>";
				echo "<td>" . "Fecha de Registro" . "</td>";
				echo "<td>" . "Tipo de Jugador" . "</td>";
				echo "<td>" . "Opcion Actualizar" . "</td>";
				echo "<td>" . "Opcion Eliminar" . "</td>";
				echo"</tr>";
			
			for ($i=0; $i < $result->num_rows ; $i++ )
			{
				mysqli_data_seek ($result, $i);
				$extraido= mysqli_fetch_array($result);
				
				echo "<tr>";
			    echo "<td>" . $extraido['nombre'] . "</td>";
				echo "<td>" . $extraido['cedula'] . "</td>";
				echo "<td>" . $extraido['genero']. "</td>";
				echo "<td>" . $extraido['edad']. "</td>";
				echo "<td>" . $extraido['fechaNacimiento']. "</td>";
				echo "<td>" . $extraido['domicilio']. "</td>";
				echo "<td>" . $extraido['fechaRegistro']. "</td>";
				echo "<td>" . $extraido['tipoJugador']. "</td>";
                echo "<td><a href='ActualizarParticipante.php?cedula=" . $extraido['cedula'] . "'>Actualizar</a></td>";
				echo "<td><a href='mostrarParticipantes.php?cedula=" . $extraido['cedula'] . "'>Eliminar</a></td>";
				echo"</tr>";
			}
			echo "</table>";
			
			mysqli_free_result($result);  //libera el $result

			mysqli_close($link);

?>
	  
    </div>  
    <div style="clear: both;"></div>
  </div>

  <div id="footer"> <span>Copyright © 2022 | Diseñado por: <a href="mailto: dchacon2404@gmail.com" title="Jorge David Chacón">Jorge David Chacón</a>  
   y <a href="mailto: vbonilla0825@gmail.com" title="Jorge David Chacón">Valeria Bonilla</a></span></div>

</div>
</body>
</html>