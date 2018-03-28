<?php
session_start();
include_once("../conexao.php");
?>

<?php
$idCandidatura 			= $_POST["idCandidatura"];
$id						= $_POST["id"];
$nome			 		= $_POST["nome"];
$dataNascimento			= $_POST["dataNascimento"];
$grauParentesco 		= $_POST["grauparentesco_id"];
$vinculoTrabalhista		= $_POST["vinculotrabalhista_id"];
$totalRenda				= str_replace(",", "", str_replace("R$", "", $_POST["totalRenda"]));
$query = ("UPDATE itemRenda SET nome = '$nome', dataNascimento = '$dataNascimento', grauParentesco_id = '$grauParentesco', vinculoTrabalhista_id = '$vinculoTrabalhista', totalRenda = '$totalRenda' WHERE id = '$id'");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
<body>

<?php if (mysqli_affected_rows($conectar)){
	header("Location: ../listar_itemRendaporCandidatura.php?idCandidatura=$idCandidatura");
}else{
	header("Location: ../editar_usuario.php?id=$id");
}?>

</body>