<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];

$result2 = mysqli_query($conectar, "SELECT * FROM itemRenda WHERE id = '$id'");
$resultado2 = mysqli_fetch_assoc($result2);

$query = "DELETE FROM itemRenda WHERE id = '$id'";
$result_query = mysqli_query($conectar, $query);
$linhas = mysqli_affected_rows($conectar);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../efetuarHomologacao.php?idCandidatura=$resultado2[candidatura_id]");?>
</body>