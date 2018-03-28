<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php 
$resultado = mysqli_query($conectar,"SELECT fase.id, fase.inicioFase, fase.finalFase, fase.unidade_id, unidade.nome, fase.editalSelecao_id, editalselecao.ano FROM fase fase, unidade unidade, editalselecao editalselecao WHERE fase.unidade_id = unidade.id and editalselecao.id = fase.editalSelecao_id");
$linhas=mysqli_num_rows($resultado);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Lista de Fases</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='cad_fase.php'><button type='button' class='btn btn-success'>Cadastrar</button></a>			
			<a href='administrativo.php'><button type='button' class='btn btn-info'>Retornar</button></a>
		</div>
	</div>
   
	<br> 
  
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Data Inicial da Fase</th>
						<th>Data Final da Fase</th>
						<th>Unidade</th>
						<th>Edital</th>
						<th>Ações</th>
				  </tr>
				</thead>
				<tbody>
					<?php while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
							echo "<td>".$linhas["inicioFase"]."</td>";
							echo "<td>".$linhas["finalFase"]."</td>";
							echo "<td>".$linhas["nome"]."</td>";
							echo "<td>".$linhas["ano"]."</td>";?>
							<td>
								<a href="editar_fase.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-warning'>Editar</button></a>
								<a href="processa/proc_apagar_fase.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-danger'>Excluir</button></a>
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
