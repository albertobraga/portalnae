<?php
session_start();
include_once("../conexao.php");
include_once("header_adm.php");

$id= $_POST["id"];
$nome= $_POST["nome"];
$unidade_id= $_POST["unidade_id"];

$query = ("update curso set nome = '$nome', unidade_id = $unidade_id where id = $id");
$result_query = mysqli_query($conectar, $query);

?>

<?php
if (mysqli_insert_id($conectar)){
		
	header("Location: ../listar_curso.php");
	
}else{
	
	header("Location: ../listar_curso.php");
	
}

?>

<?php 
include_once("footer_adm.php");

?>