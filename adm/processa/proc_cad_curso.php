<?php
session_start();
include_once("../conexao.php");
?>

<?php
$nome= $_POST["nome"];
$unidade_id= $_POST["unidade_id"];

$query = ("INSERT INTO curso (nome, unidade_id) VALUES ('$nome', $unidade_id)");
$result_query = mysqli_query($conectar, $query);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php if (mysqli_insert_id($conectar)){
		header("Location: ../listar_curso.php");
	}else{
		header("Location: ../listar_curso.php");
	}?>
</body>