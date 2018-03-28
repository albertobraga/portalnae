<?php
session_start();
include_once("../conexao.php");

$id= $_POST["id"];
$justificativa= $_POST["justificativa"];

$query = ("update justificativa set justificativa = '$justificativa' where id = $id");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
header("Location: ../listar_justificativa.php");

?>

</body>