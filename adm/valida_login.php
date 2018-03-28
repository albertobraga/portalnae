<?php
session_start();
include_once("conexao.php");
$usuariot = $_POST['usuario'];
$senhat = $_POST['senha'];
$result = mysqli_query($conectar, "SELECT * FROM usuarios WHERE login ='$usuariot' AND senha = '$senhat' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);

if (empty($resultado)){
	$_SESSION['loginErro'] = "Usuario ou senha invalido";
	header("Location: ../index.php");
}else{
	$_SESSION['usuarioId']				= $resultado['id'];
	$_SESSION['usuarioNome'] 			= $resultado['nome'];
	$_SESSION['usuarioNivelAcesso']		= $resultado['nivel_acessos_id'];
	$_SESSION['usuarioLogin'] 			= $resultado['login'];
	$_SESSION['usuarioSenha']			= $resultado['senha'];
	
	if($_SESSION['usuarioNivelAcesso'] ==1){
		header("Location:administrativo.php");
	}else{
		header("Location:../index.php");
	}
}
?>



