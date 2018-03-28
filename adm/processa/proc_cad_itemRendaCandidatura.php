<?php
session_start();
include_once("../conexao.php");
?>

<?php
$candidatura_id			= $_GET['idCandidatura'];
$nome			 		= $_POST["nome"];
$dataNascimento			= $_POST["dataNascimento"];
$grauParentesco 		= $_POST["grauparentesco_id"];
$vinculoTrabalhista		= $_POST["vinculotrabalhista_id"];
$totalRenda				= str_replace(",", "", str_replace("R$", "", $_POST["totalRenda"]));

$query_totalrenda = ("INSERT INTO itemRenda (nome, dataNascimento, grauParentesco_id, vinculoTrabalhista_id, totalRenda, candidatura_id) 
VALUES ('$nome', '$dataNascimento', '$grauParentesco', '$vinculoTrabalhista', '$totalRenda','$candidatura_id')");
$result_query_totalrenda = mysqli_query($conectar, $query_totalrenda);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../efetuarHomologacao.php?idCandidatura=$candidatura_id");?>
</body>