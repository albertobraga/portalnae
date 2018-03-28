<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");


$idCandidatura 		= $_POST["idCandidatura"];
$classificacao_id	= $_POST["classificacao_id"];
$dataFinalBolsa		= $_POST["dataFinalBolsa"];
$dataInicialBolsa	= $_POST["dataInicialBolsa"];

$query = ("UPDATE classificacao SET dataFinalBolsa = '$dataFinalBolsa', dataInicialBolsa = '$dataInicialBolsa' where id = '$classificacao_id'");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
	header("Location: ../listar_classificados.php");


?>

</body>
