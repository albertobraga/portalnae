<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$resultado = mysqli_query($conectar,"SELECT bolsaedital.tipoAuxilio_id, tipoauxilio.categoria, bolsaedital.fase_id, fase.inicioFase, fase.finalFase,bolsaedital.quantidade, concat('R$ ', format(bolsaedital.valor, 2)) as valor FROM bolsaedital bolsaedital, fase fase, tipoauxilio tipoauxilio WHERE bolsaedital.fase_id = fase.id AND tipoauxilio.id = bolsaedital.tipoAuxilio_id");
$linhas=mysqli_num_rows($resultado);
?>

<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Lista de Bolsas de Auxílios</h1>
	</div>
  
	<div class="row espaco">
		<div class="row espaco">	
			<div class="pull-right">
				<a href='administrativo.php'><button type='button' class='btn btn-info'>Retornar</button></a>
			</div>
		</div>

		<div class="col-md-12">
			<table class="table">
				<thead>
				<tr>      
					<th>Tipo de Auxílio</th>
					<th>Data Inicial da Fase</th>
					<th>Data Final da fase</th>                 
					<th>Quantidade de Bolsas</th>
					<th>Valor da Bolsa</th>
					<th>Ações</th>
				</tr>
				</thead>
				<tbody>
					<?php while($linhas = mysqli_fetch_array($resultado)){
						echo "<tr>";
							echo "<td>".$linhas["categoria"]."</td>";
							echo "<td>".$linhas["inicioFase"]."</td>";
							echo "<td>".$linhas["finalFase"]."</td>";
							echo "<td>".$linhas["quantidade"]."</td>";
							echo "<td>".$linhas["valor"]."</td>";?>
							<td>
								<a href="editar_BolsaEdital.php?fase_id=<?php echo $linhas['fase_id']."&tipoAuxilio_id=".$linhas['tipoAuxilio_id'];?>"><button type='button' class='btn btn-warning'>Editar</button></a>
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
