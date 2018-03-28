<?php
session_start();
include_once("../conexao.php");
?>

<?php
$fase_id			=trim($_POST["fase_id"]); // tirar espa�os com TRIM
$tipoAuxilio_id 	=trim($_POST["tipoAuxilio_id_anterior"]); // tirar espa�os com TRIM
$fase_id_anterior	=trim($_POST["fase_id_anterior"]); // tirar espa�os com TRIM
$valor				= str_replace(",", "", str_replace("R$", "", $_POST["valor"]));
$quantidade			=trim($_POST["quantidade"]); // tirar espa�os com TRIM
$query = ("UPDATE bolsaedital SET fase_id = '$fase_id', tipoAuxilio_id = '$tipoAuxilio_id', valor = '$valor', quantidade = '$quantidade' where tipoAuxilio_id = '$tipoAuxilio_id' and fase_id = '$fase_id_anterior'");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php header("Location: ../listar_BolsaEdital.php");?>
</body>