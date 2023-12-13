<html>
	<head>
		<title>Salir</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
<?php
	    date_default_timezone_set('America/Costa_Rica');
		$date=date('d/m/Y g:i a');
		
		if (isset($_COOKIE['usuario'])) {
		    $fp = fopen("LogoutSistema.txt", "a");  // Para escritura
			fputs($fp,PHP_EOL ."Salida del sistema: " . PHP_EOL); 
			fputs($fp,"Nombre: " . $_COOKIE['usuario'] . PHP_EOL); 
			fputs($fp,"Fecha y hora de Ingreso: " . $date . PHP_EOL); 
			fclose($fp);		
		
			setcookie("usuario","",time()-1000,"/");
			echo '<script language="javascript">';
			echo 'alert("Cerrando Sesion");';
	        echo 'window.location.href=("Login.php")';
			echo '</script>';
	 }
?>
	</body>
</html>