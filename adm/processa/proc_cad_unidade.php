<?php
session_start();
include_once("../conexao.php");
?>

<?php
$nome		= $_POST["nome"];
$query = ("INSERT INTO unidade (nome) VALUES ('$nome')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_unidade.php");?>
</body>