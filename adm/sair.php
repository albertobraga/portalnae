<?php
session_start();
session_destroy();

unset(
		$_SESSION['usuarioId'],
		$_SESSION['usuarioNome'], 
		$_SESSION['usuarioNivelAcesso'],	
		$_SESSION['usuarioLogin'],
		$_SESSION['usuarioSenha']);

header("Location: ..\index.php");
?>