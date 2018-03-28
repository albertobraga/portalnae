<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET['id'];
$query = ("UPDATE candidatura SET dataCancelamento = now(), situacao = 'Cancelado' WHERE id = '$id'");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>

<body>
<?php header("Location: ../listar_candidatos.php");?>
</body>