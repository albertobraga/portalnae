<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php 
$resultado = mysqli_query($conectar,"SELECT c.id, c.nome, u.nome as 'unidade' FROM unidade u, curso c where c.unidade_id = u.id");
$linhas=mysqli_num_rows($resultado);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Lista de Cursos</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='cad_curso.php'><button type='button' class='btn btn-success'>Cadastrar</button></a>
			<a href='administrativo.php'><button type='button' class='btn btn-info'>Retornar</button></a>
		</div>
	</div>
	
	<br> 
  
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Nome</th>
						<th>Unidade</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody>
					<?php while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
							echo "<td>".$linhas["nome"]."</td>";
							echo "<td>".$linhas["unidade"]."</td>";?>
							<td>
								<a href="editar_curso.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-warning'>Editar</button></a>
								<a href="processa/proc_apagar_curso.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-danger'>Excluir</button></a>
							</td>
						<?php echo "</tr>";
					}?>
				</tbody>
			</table>
		</div>
    </div>

<?php 
	include_once("footer_adm.php");
?>