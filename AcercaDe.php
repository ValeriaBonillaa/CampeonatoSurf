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

  <div id="content"> 

    <div id="insidecontent"> <br>
	  <h1>Información del proyecto</h1>
	  <br>
	  <h3>Nombre de los creadores del sistema:</h3>
	  <br>
	  <h4>- Valeria Bonilla Fonseca</h4>
	  <h4>- Jorge David Chacón Sibaja</h4>
	  <br>
	  <h3> Universidad Latina de Heredia<h3>
	  <br>
	  <h4>Curso de Programación VI<h4>
	  <br>
	  <h3>Nombre de la profesa:</h3>
	  </br>
	  <h4>Adriana Stephanie Rubio Escobar</h4>
	  <br>
	  <h4> Gracias por todos los conocimientos enseñados
	  para poder hacer la creación de este proyecto</h4>
	  <br>
	  <img src="AcercaDe.jpg" width="300" height="250">
     </div>  
    <div style="clear: both;"></div>
  </div>

  <div id="footer"> <span>Copyright © 2022 | Diseñado por: <a href="mailto: dchacon2404@gmail.com" title="Jorge David Chacón">Jorge David Chacón</a>  
   y <a href="mailto: vbonilla0825@gmail.com" title="Jorge David Chacón">Valeria Bonilla</a></span></div>
</div>
</body>
</html>