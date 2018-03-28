<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];

$query = "DELETE FROM curso WHERE id = '$id'";
$result_query = mysqli_query($conectar, $query);
$linhas = mysqli_affected_rows($conectar);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_curso.php");?>
</body>