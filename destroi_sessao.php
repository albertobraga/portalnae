<?php
	session_start();
	unset($_SESSION['ultimo_id_aluno']);
	unset($_SESSION['nome_aluno']);
	unset($_SESSION['control_aba']);
	unset($_SESSION['periodo']); 				
	unset($_SESSION['vigenciaEstagioInicial']);	
	unset($_SESSION['vigenciaEstagioFinal']); 	
	
	header("Location: index_cadastro.php");
?>