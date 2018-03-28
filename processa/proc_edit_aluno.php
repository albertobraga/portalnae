<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id				 	= $_POST["id"];
$cpf			 	= $_POST["cpf"];
$email				= $_POST["email"];
$nomepessoa 		= $_POST["nome"];
$datanascpessoa		= $_POST["dataNascimento"];
$identpessoa		= $_POST["identidade"];
$orgaoexppessoa		= $_POST["orgaoExpedidor"];
$sexopessoa			= $_POST["sexo"];
$telrespessoa		= $_POST["telefoneResidencial"];
$telcelpessoa		= $_POST["telefoneCelular"];
$query = ("UPDATE pessoa SET cpf = '$cpf', email = '$email', nome = '$nomepessoa', dataNascimento = '$datanascpessoa', identidade = '$identpessoa', orgaoExpedidor = '$orgaoexppessoa', sexo = '$sexopessoa', telefoneResidencial = '$telrespessoa', telefoneCelular = '$telcelpessoa' WHERE id = '$id'");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>

<body>
	<?php if (mysqli_affected_rows($conectar)){
		header("Location: ../listar_aluno.php");
	}else{
		header("Location: ../administrativo.php");
	}?>
</body>