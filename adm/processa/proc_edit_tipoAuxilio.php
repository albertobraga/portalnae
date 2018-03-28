<?php
session_start();
include_once("../conexao.php");

$id= $_POST["id"];
$categoria= $_POST["categoria"];
$duracaoMin= $_POST["duracaoMin"];
$duracaoMax= $_POST["duracaoMax"];

$query = ("update tipoauxilio set categoria = '$categoria', duracaoMin= '$duracaoMin', duracaoMax = '$duracaoMax' where id = $id");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
if (mysqli_insert_id($conectar)){
		
	header("Location: ../listar_tipoAuxilio.php");
	
}else{
	
	header("Location: ../listar_tipoAuxilio.php");
	
}

?>

</body>