<?php
session_start();
include_once("../conexao.php");
?>

<?php
$aluno_id			= $_POST["aluno_id"];
$matricula			= $_POST["matricula"];
$escolaridade_id 	= $_POST["escolaridade_id"];
$periodo			= $_POST["periodo"];
$curso_id			= $_POST["curso_id"];
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

$queryAluno = "UPDATE aluno set matricula = '$matricula', curso_id = '$curso_id' where id = $aluno_id";
$result_Aluno= mysqli_query($conectar, $queryAluno);

$queryEscolaridade = "UPDATE escolaridade set periodo = '$periodo' where id = $escolaridade_id";
$result_Escolaridade = mysqli_query($conectar, $queryEscolaridade);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_aluno.php");?>
</body>