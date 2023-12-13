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
      <h1>Auditoria</h1>
	  <br>
	  <h3> Datos de la bitácora de Login </h3>
	  
<?php	  
		$fp = fopen("LoginSistema.txt", "r"); //abre el archivo para lectura
			while(!feof($fp)) {//end of file
					$linea = fgets($fp);  // fgets recupera el contenido de una línea de un archivo
					echo "<h4>" . $linea . "<br /></h4>";
		}
		
		echo "<h3>" . "Datos de la bitácora de Logout" . "</h3>";
		$fp = fopen("LogoutSistema.txt", "r"); //abre el archivo para lectura
			while(!feof($fp)) {//end of file
					$linea = fgets($fp);  // fgets recupera el contenido de una línea de un archivo
					echo "<h4>" . $linea . "<br /></h4>";
		}		
?>  
    </div>  
    <div style="clear: both;"></div>
  </div>

  <div id="footer"> <span>Copyright © 2022 | Diseñado por: <a href="mailto: dchacon2404@gmail.com" title="Jorge David Chacón">Jorge David Chacón</a>  
   y <a href="mailto: vbonilla0825@gmail.com" title="Jorge David Chacón">Valeria Bonilla</a></span></div>

</div>
</body>
</html>