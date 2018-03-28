<?php
session_start();
//include_once("../seguranca.php");
include_once("../conexao.php");

$id= $_POST["id"];
$nome= $_POST["parentesco"];

$query = ("update grauparentesco set parentesco = '$nome' where id = $id");
$result_query = mysqli_query($conectar, $query);

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
  </head>
  <body>

<?php
header("Location: ../listar_grauparentesco.php");

?>

</body>