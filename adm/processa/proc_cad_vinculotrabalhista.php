<?php
session_start();
include_once("../conexao.php");
?>

<?php
$ocupacao	= $_POST["ocupacao"];
$query = ("INSERT INTO vinculotrabalhista (ocupacao) VALUES ('$ocupacao')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_vinculotrabalhista.php");?>
</body>