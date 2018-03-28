<?php
session_start();
include_once("../conexao.php");

$id= $_POST["id"];
$nome= $_POST["nome"];

$query = ("update unidade set nome = '$nome' where id = $id");
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
		
	header("Location: ../listar_unidade.php");
	
}else{
	
	header("Location: ../listar_unidade.php");
	
}

?>

</body>