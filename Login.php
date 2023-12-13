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
  </div>

  <div id="content"> 

    <div id="insidecontent"> <br>
      <h1>Login</h1>
		<form name="usuario" method="POST" action="">
		<table border="0" align="center">
		</br>
		<tr>
		<td>Nombre de usuario:</td>
		<td><input name="usuario" type="text" required value=""></td>
		</tr>
		<tr>
		<td>Cedula:</td>
		<td><input name="cedula" type="number" required value=""></td>
		</tr>
		<tr>
		<td>Contraseña:</td>
		<td><input name="contrasena" type="password" required value=""></td>
		</tr>
		<tr>
		<td><input value="Aceptar" type="submit" name="Aceptar">
		<input type="reset" name="Cancelar" value="Cancelar"></td>
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
	  date_default_timezone_set('America/Costa_Rica');
	  
        if(isset($_REQUEST['Aceptar'])) {
		$date=date('d/m/Y g:i a');
		
		$link = mysqli_connect("localhost", "root", "");
        
		mysqli_select_db($link, "SurfUp");
		
		
		$tildes = $link->query("SET NAMES 'utf8'"); //Para que se muestren las tildes
		
		
		$query = "SELECT * FROM `usuario` WHERE usuario= '".$_REQUEST['usuario']."' AND contrasena= '".$_REQUEST['contrasena']."'";

		if($rs = mysqli_query($link, $query)){
           mysqli_data_seek ($rs, 0);			
		   $extraido= mysqli_fetch_array($rs);
		   setcookie("usuario",$extraido['nombre'],time()+60*60*24*365,"/");
		   
		   if ($extraido['estado'] == "activo"){
		     if($extraido['usuario']  && $extraido['contrasena']){
                $fp = fopen("LoginSistema.txt", "a");  // Para escritura
				fputs($fp,PHP_EOL . "Ingreso al sistema " . PHP_EOL); 
				fputs($fp,"Nombre: " . $_REQUEST['usuario'] . PHP_EOL); 
				fputs($fp,"Fecha y hora de Ingreso: " . $date . PHP_EOL); 
				fclose($fp);
			    mysqli_free_result($rs);  //libera el $result	
				mysqli_close($link);
				echo '<script language="javascript">';
				echo 'alert("Entrando al Sistema");';
				echo 'window.location.href=("Inicio.php")';
				echo '</script>';
			}
		  }
		else{
		   mysqli_free_result($rs);  //libera el $result	
		   mysqli_close($link);
	       echo '<script language="javascript">';
	       echo 'alert("Usuario no encontrado o Estado Inactivo");';
		   echo 'window.location.href=("Login.php")';
	       echo '</script>';		
        } 
	  }
	}		
?>