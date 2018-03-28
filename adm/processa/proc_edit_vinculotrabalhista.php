<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");

$id= $_POST["id"];
$ocupacao= $_POST["ocupacao"];

$query = ("update vinculotrabalhista set ocupacao = '$ocupacao' where id = $id");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
header("Location: ../listar_vinculotrabalhista.php");

?>

</body>