<?php
session_start();
include_once("../conexao.php");
?>

<?php
$descritor= $_POST["descritor"];

$query = ("INSERT INTO estadocivil (descritor) VALUES ('$descritor')");
$result_query = mysqli_query($conectar, $query);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
</head>
<body>
	<?php if (mysqli_insert_id($conectar)){
		header("Location: ../listar_estadoCivil.php");
	}else{
		header("Location: ../listar_estadoCivil.php");
	}?>
</body>