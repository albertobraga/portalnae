<?php
session_start();
include_once("../conexao.php");
?>

<?php
$nome= $_POST["parentesco"];

$query = ("INSERT INTO grauparentesco (parentesco) VALUES ('$nome')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_grauparentesco.php");?>
</body>