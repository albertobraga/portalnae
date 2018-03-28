<?php
session_start();
include_once("../conexao.php");
?>

<?php
$matricula			= $_POST["matricula"];
$periodo			= $_POST["periodo"];
$curso_id			= $_POST["curso_id"];
$cpf			 	= $_POST["cpf"];
$email				= $_POST["email"];
$nome				= $_POST["nome"];
$dataNascimento		= $_POST["dataNascimento"];
$identidade			= $_POST["identidade"];
$orgaoExpedidor		= $_POST["orgaoExpedidor"];
$sexo				= $_POST["sexo"];
$telefoneResidencial= $_POST["telefoneResidencial"];
$telefoneCelular	= $_POST["telefoneCelular"];

$result_pessoa = "INSERT INTO pessoa(cpf,email,nome,dataNascimento,identidade,orgaoExpedidor,sexo,telefoneResidencial,telefoneCelular) VALUES('$cpf','$email','$nome','$dataNascimento','$identidade','$orgaoExpedidor','$sexo','$telefoneResidencial','$telefoneCelular')";
$resultado_pessoa = mysqli_query($conectar, $result_pessoa);
$ultima_id_pessoa= mysqli_insert_id($conectar);

$result_escolaridade = "INSERT INTO escolaridade(periodo) VALUES('$periodo')";
$resultado_escolaridade= mysqli_query($conectar, $result_escolaridade);
$ultima_id_escolaridade= mysqli_insert_id($conectar);

$result_aluno = "INSERT INTO aluno(matricula,pessoa_id,curso_id,escolaridade_id) VALUES($matricula,$ultima_id_pessoa,$curso_id,$ultima_id_escolaridade)";
$result_query = mysqli_query($conectar, $result_aluno);
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
		header("Location: ../listar_aluno.php?id=$id");
	}?>
</body>