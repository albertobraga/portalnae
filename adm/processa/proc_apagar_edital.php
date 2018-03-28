<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];

$resultado = mysqli_query($conectar,"SELECT * FROM fase where editalSelecao_id = $id");
foreach($resultado as $linhas):
	$delBolsaFase = "DELETE FROM bolsaedital WHERE fase_id = $linhas[id]";
	$result_query = mysqli_query($conectar, $delBolsaFase);
endforeach;

$delfase = "DELETE FROM fase WHERE editalSelecao_id = $id";
$result_query = mysqli_query($conectar, $delfase);

$delEditalSelecao = "DELETE FROM editalselecao WHERE id = $id";
$result_query = mysqli_query($conectar, $delEditalSelecao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php if (mysqli_affected_rows($conectar)){
		header("Location: ../listar_editalselecao.php");
	}else{
		header("Location: ../listar_editalselecao.php");
	}?>
</body>