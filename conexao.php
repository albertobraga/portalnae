
<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "portalnae";
	
	//Criar a conexão
	$conectar = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
mysqli_set_charset( $conectar, 'utf8');
?>