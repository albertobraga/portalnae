<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php 
$resultado = mysqli_query($conectar,"SELECT p.id,u.matricula,p.cpf,p.nome,p.dataNascimento,p.identidade,p.orgaoExpedidor,p.sexo,p.telefoneResidencial,p.telefoneCelular, u.id as 'aluno_id' FROM pessoa p, aluno u where u.pessoa_id = p.id ORDER BY 'id'");
$linhas=mysqli_num_rows($resultado);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Lista de Alunos</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='cad_aluno.php'><button type='button' class='btn btn-success'>Cadastrar</button></a>			
			<a href='administrativo.php'><button type='button' class='btn btn-info'>Retornar</button></a>
		</div>
	</div>
	
	<br> 

	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Matrícula</th>
						<th>Nome</th>
						<th>Data de Nascimento</th>
						<th>Identidade</th>
						<th>CPF</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
						echo "<td>".$linhas['matricula']."</td>";            			
						echo "<td>".$linhas['nome']."</td>";
						echo "<td>".$linhas['dataNascimento']."</td>";
						echo "<td>".$linhas['identidade']."</td>";
						echo "<td>".$linhas['cpf']."</td>";?>
						<td>
							<a href="visual_aluno.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-primary'>Visualizar</button></a>
							<a href="editar_aluno.php?id=<?php echo $linhas['id']."&aluno_id=".$linhas['aluno_id'];?>"><button type='button' class='btn btn-warning'>Editar</button></a>
							<a href="processa/proc_apagar_aluno.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-danger'>Excluir</button></a>
						</td>
						<?php echo "</tr>";
					} ?>
				</tbody>
			</table>
		</div>
    </div>
</div>

<?php 
	include_once("footer_adm.php");

?>
