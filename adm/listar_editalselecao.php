﻿<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php 
$resultado = mysqli_query($conectar,"SELECT * FROM editalselecao ORDER BY 'id'");
$linhas=mysqli_num_rows($resultado);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Lista de Editais de Seleção</h1>
	</div>
	<div class="row espaco">
		<div class="pull-right">
			<a href='cad_editalselecao.php'><button type='button' class='btn btn-success'>Cadastrar</button></a>			
			<a href='administrativo.php'><button type='button' class='btn btn-info'>Retornar</button></a>
		</div>
	</div>

<br> 
  
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>Ano</th>
						<th>Nome</th>
						<th>Acões</th>
					</tr>
				</thead>
				
				<tbody>
					<?php while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
							echo "<td>".$linhas["ano"]."</td>";
							echo "<td>".$linhas["edital"]."</td>";?>
							<td>								
								<a href="visualizar_editalselecao.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-primary'>Visualizar</button></a>
								<a href="editar_editalselecao.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-warning'>Editar</button></a>
								<a href="processa/proc_apagar_edital.php?id=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-danger'>Excluir</button></a>
							</td>
						<?php echo "</tr>";
					}?>
				</tbody>
			</table>
		</div>
    </div>
</div>

<?php 
include_once("footer_adm.php");
?>
