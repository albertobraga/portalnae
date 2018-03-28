<?php
session_start();
include_once("../conexao.php");
?>

<?php
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
$query = ("INSERT INTO editalselecao (ano, edital, 	dataInicialEntDocEspecificaPae, 	dataFinalEntDocEspecificaPae, 	dataInicialEntDocEspecificaPaed, 	dataFinalEntDocEspecificaPaed, 	dataInicialEntrevista, 	dataFinalEntrevista, 	dataInicialEntDocEspecificaPaem, 	dataFinalEntDocEspecificaPaem, 	dataInicialEntDadosDirex, 	dataFinalEntDadosDirex, 	dataDivulgResultadoFinalPae, 	dataInicialEntInfoBancaria, 	dataFinalEntInfoBancaria, 	dataInicialEntDeclarMatricula, 	dataFinalEntDaclarMatricula)VALUES ('$ano', '$edital', '$dataInicialEntDocEspecificaPae', '$dataFinalEntDocEspecificaPae', '$dataInicialEntDocEspecificaPaed', '$dataFinalEntDocEspecificaPaed', '$dataInicialEntrevista', '$dataFinalEntrevista', '$dataInicialEntDocEspecificaPaem', '$dataFinalEntDocEspecificaPaem', '$dataInicialEntDadosDirex', '$dataFinalEntDadosDirex', '$dataDivulgResultadoFinalPae', '$dataInicialEntInfoBancaria', '$dataFinalEntInfoBancaria', '$dataInicialEntDeclarMatricula','$dataFinalEntDaclarMatricula')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php if (mysqli_insert_id($conectar)){
		header("Location: ../listar_editalselecao.php");
	}else{
		header("Location: ../cad_editalselecao.php");
	}?>
</body>