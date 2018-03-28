<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id=trim($_GET['id']);
$fase_id =trim($_GET['fase_id']);
$tipoauxilio_id=trim($_GET['tipoAuxilio_id']);

$query = "DELETE FROM bolsaedital WHERE fase_id = '$fase_id' AND tipoAuxilio_id = '$tipoAuxilio_id'";
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
		header("Location: ../listar_bolsaEdital.php");
	}else{
		header("Location: ../administrativo.php");
	} ?>
</body>