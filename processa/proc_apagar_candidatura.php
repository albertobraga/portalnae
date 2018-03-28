<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];
$result2 = mysqli_query($conectar, "SELECT * FROM candidatura WHERE id = '$id'");
$resultado2 = mysqli_fetch_assoc($result2);

$queryItemRenda = "DELETE FROM itemRenda WHERE candidatura_id = '$id'";
$result_query = mysqli_query($conectar, $queryItemRenda);

$queryCandidatura = "DELETE FROM candidatura WHERE id = '$id'";
$result_query = mysqli_query($conectar, $queryCandidatura);

$queryCandidatura = "DELETE FROM candidatura WHERE id = '$id'";
$result_query = mysqli_query($conectar, $queryCandidatura);

$queryendereco= "DELETE FROM endereco WHERE id = $resultado2[endereco_id]";
$result_query = mysqli_query($conectar, $queryendereco);

$querycontabancaria= "DELETE FROM contabancaria WHERE id = $resultado2[contaBancaria_id]";
$result_query = mysqli_query($conectar, $querycontabancaria);

$queryclassificacao= "DELETE FROM classificacao WHERE id = $resultado2[classificacao_id]";
$result_query = mysqli_query($conectar, $queryclassificacao);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
		<?php header("Location: ../index.php");?>
	</body>
