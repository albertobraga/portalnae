<?php
session_start();
include_once("../conexao.php");
?>

<?php
$id = $_GET["id"];
$result2 = mysqli_query($conectar, "SELECT * FROM itemRenda WHERE id = '$id'");
$resultado2 = mysqli_fetch_assoc($result2);
$query = "DELETE FROM itemRenda WHERE id = '$id'";
$result_query = mysqli_query($conectar, $query);
$linhas = mysqli_affected_rows($conectar);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>
	
	<body>
	<?php if (mysqli_affected_rows($conectar)){
		header("Location: ../listar_itemRendaporCandidatura.php?idCandidatura=$resultado2[candidatura_id]");
	}else{
		header("Location: ../index.php");
	
}

?>

</body>
