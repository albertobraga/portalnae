<?php
session_start();
include_once("../conexao.php");

$id									= $_POST["id"];
$ano									= $_POST["ano"];
$edital									= $_POST["edital"];
$dataInicialEntDocEspecificaPae			= $_POST["dataInicialEntDocEspecificaPae"];
$dataFinalEntDocEspecificaPae			= $_POST["dataFinalEntDocEspecificaPae"];
$dataInicialEntDocEspecificaPaed		= $_POST["dataInicialEntDocEspecificaPaed"];
$dataFinalEntDocEspecificaPaed			= $_POST["dataFinalEntDocEspecificaPaed"];
$dataInicialEntrevista					= $_POST["dataInicialEntrevista"];
$dataFinalEntrevista					= $_POST["dataFinalEntrevista"];
$dataInicialEntDocEspecificaPaem		= $_POST["dataInicialEntDocEspecificaPaem"];
$dataFinalEntDocEspecificaPaem			= $_POST["dataFinalEntDocEspecificaPaem"];
$dataInicialEntDadosDirex				= $_POST["dataInicialEntDadosDirex"];
$dataFinalEntDadosDirex					= $_POST["dataFinalEntDadosDirex"];
$dataDivulgResultadoFinalPae			= $_POST["dataDivulgResultadoFinalPae"];
$dataInicialEntInfoBancaria				= $_POST["dataInicialEntInfoBancaria"];
$dataFinalEntInfoBancaria				= $_POST["dataFinalEntInfoBancaria"];
$dataInicialEntDeclarMatricula			= $_POST["dataInicialEntDeclarMatricula"];
$dataFinalEntDaclarMatricula			= $_POST["dataFinalEntDaclarMatricula"];

$query = ("update editalselecao set ano = '$ano', edital = '$edital', dataInicialEntDocEspecificaPae = '$dataInicialEntDocEspecificaPae', dataFinalEntDocEspecificaPae = '$dataFinalEntDocEspecificaPae', dataInicialEntDocEspecificaPaed = '$dataInicialEntDocEspecificaPaed', dataFinalEntDocEspecificaPaed = '$dataFinalEntDocEspecificaPaed', dataInicialEntrevista = '$dataInicialEntrevista', dataFinalEntrevista = '$dataFinalEntrevista', dataInicialEntDocEspecificaPaem = '$dataInicialEntDocEspecificaPaem', dataFinalEntDocEspecificaPaem = '$dataFinalEntDocEspecificaPaem', dataInicialEntDadosDirex = '$dataInicialEntDadosDirex', dataFinalEntDadosDirex = '$dataFinalEntDadosDirex', dataDivulgResultadoFinalPae = '$dataDivulgResultadoFinalPae', dataInicialEntInfoBancaria = '$dataInicialEntInfoBancaria', dataFinalEntInfoBancaria = '$dataFinalEntInfoBancaria', dataInicialEntDeclarMatricula = '$dataInicialEntDeclarMatricula', dataFinalEntDaclarMatricula = '$dataFinalEntDaclarMatricula' where id = '$id'");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
header("Location: ../listar_editalselecao.php");

?>

</body>