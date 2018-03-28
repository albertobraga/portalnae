<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];
$responsavel_id = 0;
$escolaridade_id  = 0;
$contabancaria_id = 0;
$endereco_id   = 0;
$classificacao_id =0;

$resultado = mysqli_query($conectar,"SELECT * FROM candidatura where id = $id");
foreach($resultado as $linhas):
    $responsavel_id = $linhas[responsavel_id];
    $escolaridade_id =  $linhas[escolaridade_id];
    $contabancaria_id = $linhas[contabancaria_id];
    $endereco_id = $linhas[endereco_id];
    $classificacao_id = $linhas[classificacao_id];
endforeach;


$DelItenRenda = "DELETE FROM itemrenda WHERE candidatura_id = $id";
$result_query = mysqli_query($conectar, $DelItenRenda);

$DelCandidatura = "DELETE FROM candidatura WHERE id  = $id";
$result_query = mysqli_query($conectar, $DelCandidatura);

$DelResponsavel = "DELETE FROM responsavel WHERE id = $responsavel_id";
$result_query = mysqli_query($conectar, $DelResponsavel);

$Delescolaridade = "DELETE FROM escolaridade WHERE id = $escolaridade_id";
$result_query = mysqli_query($conectar, $Delescolaridade);

$DelContaBancaria = "DELETE FROM contabancaria WHERE id = $contabancaria_id";
$result_query = mysqli_query($conectar, $DelContaBancaria);

$DelEndereco = "DELETE FROM endereco WHERE id = $endereco_id";
$result_query = mysqli_query($conectar, $DelEndereco);

$DelClassificacao = "DELETE FROM classificacao WHERE id = $classificacao_id";
$result_query = mysqli_query($conectar, $DelClassificacao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
</head>
<body>
	<?php if (mysqli_affected_rows($conectar)){
		header("Location: ../listar_candidatos.php");
	}else{
		header("Location: ../listar_candidatos.php");
	} ?>
</body>