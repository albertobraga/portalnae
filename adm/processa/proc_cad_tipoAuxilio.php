<?php
session_start();
include_once("../conexao.php");
?>

<?php

$categoria		= $_POST["categoria"];
$duracaoMin		= $_POST["duracaoMin"];
$duracaoMax		= $_POST["duracaoMax"];
$query = ("INSERT INTO tipoauxilio (categoria, duracaoMin, duracaoMax) VALUES ('$categoria', '$duracaoMin', '$duracaoMax')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_tipoAuxilio.php");?>
</body>