<?php
session_start();
include_once("../conexao.php");
?>

<?php
$fase			=$_POST["fase_id"];
$tipoAuxilio 	=$_POST["tipoAuxilio_id"];
$valor			= str_replace(",", "", str_replace("R$", "", $_POST["valor"]));
$quantidade		=$_POST["quantidade"];
$query = ("INSERT INTO bolsaedital (fase_id, tipoAuxilio_id, valor, quantidade) VALUES ('$fase', '$tipoAuxilio', '$valor','$quantidade')");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php if (mysqli_insert_id($conectar)){
		header("Location: ../listar_bolsaEdital.php");
	}else{
		header("Location: ../listar_bolsaEdital.php");
	}?>
</body>