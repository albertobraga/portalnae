<?php
session_start();
include_once("../conexao.php");
?>

<?php
$justificativa= $_POST["justificativa"];

$query = ("INSERT INTO justificativa (justificativa) VALUES ('$justificativa')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_justificativa.php");?>
</body>