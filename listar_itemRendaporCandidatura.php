<?php 
session_start();
include_once("conexao.php");
include_once("header_usuario.php");
include_once("menu_usuario.php");
?>

<?php 
$idCandidatura = $_GET['idCandidatura'];
$resultado = mysqli_query($conectar,"SELECT itemrenda.id,itemrenda.nome,itemrenda.dataNascimento,grauparentesco.parentesco,vinculotrabalhista.ocupacao,itemrenda.candidatura_id, concat('R$ ', format(itemrenda.totalRenda, 2)) as totalRenda  FROM itemRenda itemRenda, grauparentesco grauparentesco, vinculotrabalhista vinculotrabalhista  WHERE itemrenda.grauParentesco_id = grauparentesco.id and itemrenda.vinculoTrabalhista_id = vinculotrabalhista.id AND itemrenda.candidatura_id = '$idCandidatura' ORDER BY 'id'");
$linhas=mysqli_num_rows($resultado);
?>
	
<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Continuação da sua Candidatura</h1>
		<h2>Informe a renda de cada membro da sua família.<h2>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='cad_itemRendaCandidatura.php?idCandidatura=<?php echo $_GET['idCandidatura']?>'><button type='button' class='btn btn-success'>Cadastrar</button></a>			
		</div>
	</div>

	<br> 

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					 <tr>
						<th>Nome</th>
						<th>Dascimento</th>
						<th>Grau de Parentesco</th>
						<th>Vínculo Trabalhista</th>
						<th>Total Renda</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['dataNascimento']."</td>";
						echo "<td>".$linhas['parentesco']."</td>";
						echo "<td>".$linhas['ocupacao']."</td>";
						echo "<td>".$linhas['totalRenda']."</td>";?>
						<td>
							<a href="editar_membroFamiliar.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-warning'>Editar</button></a>
							<a href="processa/proc_apagar_membroFamiliar.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-danger'>Excluir</button></a>
						</td><?php 
						echo "</tr>";
					}?>
				</tbody>
			</table>
			
			<br>
			<br>
			
			<a href='visualizarCandidatura.php?idCandidatura=<?php echo $_GET['idCandidatura']?>'><button type='button' class='btn btn-success'>Finalizar Candidatura</button></a>	
			<a href="processa/proc_apagar_candidatura.php?id=<?php echo $_GET['idCandidatura'];?>"> <button type='button' class='btn btn-danger'>Cancelar Candidatura</button></a>					
		</div>
	</div>
</div>


<?php 
include_once("footer_usuario.php");
?>
