<?php
session_start();
include_once("../conexao.php");
?>

<?php
$inicioFase					= $_POST["inicioFase"];
$finalFase					= $_POST["finalFase"];
$unidade_id					= $_POST["unidade_id"];
$editalSelecao_id			= $_POST["editalSelecao_id"];

$query = ("INSERT INTO fase (inicioFase, finalFase, unidade_id, editalSelecao_id) VALUES ('$inicioFase', '$finalFase', '$unidade_id', '$editalSelecao_id')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_fase.php");?>
</body>