<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");


$idCandidatura 		= $_POST["idCandidatura"];
$id					= $_POST["id"];
$nome			 	= $_POST["nome"];
$dataNascimento		= $_POST["dataNascimento"];
$grauParentesco 		= $_POST["grauparentesco_id"];
$vinculoTrabalhista		= $_POST["vinculotrabalhista_id"];
$totalRenda			= str_replace(",", "", str_replace("R$", "", $_POST["totalRenda"]));

$query = ("UPDATE itemRenda SET nome = '$nome', dataNascimento = '$dataNascimento', grauParentesco_id = '$grauParentesco', vinculoTrabalhista_id = '$vinculoTrabalhista', totalRenda = '$totalRenda' WHERE id = '$id'");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
	header("Location: ../efetuarHomologacao.php?idCandidatura=$idCandidatura");
?>

</body>
