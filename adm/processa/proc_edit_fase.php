<?php
session_start();
include_once("../conexao.php");
include_once("../header_adm.php");


$id						= $_POST["id"];
$editalSelecao_id		= $_POST["editalSelecao_id"];
$unidade_id				= $_POST["unidade_id"];
$inicioFase				= $_POST["inicoFase"];
$finalFase= 			$_POST["finalFase"];

$query = ("UPDATE fase SET editalSelecao_id = '$editalSelecao_id', unidade_id = '$unidade_id', finalFase = '$finalFase', inicioFase = '$inicioFase' WHERE id = '$id'");
$result_query = mysqli_query($conectar, $query);

?>

<?php
	header("Location: ../listar_fase.php");


?>

<?php 
include_once("../footer_adm.php");
?>
