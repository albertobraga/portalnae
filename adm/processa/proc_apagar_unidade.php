<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];

$query = "DELETE FROM unidade WHERE id = '$id'";
$result_query = mysqli_query($conectar, $query);
$linhas = mysqli_affected_rows($conectar);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>

<body>
	<?php if (mysqli_affected_rows($conectar)){
		header("Location: ../listar_unidade.php");
	}else{
		header("Location: ../listar_unidade.php");
	}?>
</body>