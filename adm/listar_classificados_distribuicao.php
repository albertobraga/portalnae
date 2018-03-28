<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>



<?php
$chaveTipoAuxilio = null;
if (isset($_POST['tipoAuxilio_id'])){ 
	$chaveTipoAuxilio = $_POST['tipoAuxilio_id'];
}

if($chaveTipoAuxilio != null && $chaveTipoAuxilio != "Todos"){
	$chaveTipoAuxilio = " and candidatura.tipoAuxilio_id = '$chaveTipoAuxilio'";
} else {
	$chaveTipoAuxilio = '';
}

$chaveEdital = null;
if (isset($_POST['edital_id'])){
	$chaveEdital = $_POST['edital_id'];
}

if($chaveEdital!= null && $chaveEdital!= "Todos"){
	$chaveEdital= " and editalselecao.id = '$chaveEdital'";
} else {
	$chaveEdital= '';
}

$unidade_id = null;
if (isset($_POST['unidade_id'])){
	$unidade_id = $_POST['unidade_id'];
}

if($unidade_id!= null && $unidade_id!= "Todos"){
	$unidade_id= " and unidade.id = '$unidade_id'";
} else{
	$unidade_id= '';
}

$situacao = null;
if (isset($_POST['situacao'])){
	$situacao = $_POST['situacao'];
}

if($situacao!= null && $situacao!= "Todos"){
	if($situacao == "AGUARDANDO"){
		$situacao= " and (classificacao.dataInicialBolsa = '' or classificacao.dataInicialBolsa = '0000-00-00')";
	}else if($situacao == "CLASSIFICADO"){
		$situacao= " and (classificacao.dataInicialBolsa != '' && classificacao.dataInicialBolsa != '0000-00-00')";
	}else{
	   $situacao= '';
	}
} else {
	$situacao= '';
}

$resultado = mysqli_query($conectar,"SELECT candidatura.id, candidatura.classificacao_id, aluno.matricula, pessoa.cpf, pessoa.nome, (SELECT SUM(renda.totalRenda) FROM itemrenda renda WHERE renda.candidatura_id = candidatura.id) as 'totalRenda', estadocivil.descritor, tipoauxilio.categoria,  candidatura.dataHomologacao, classificacao.dataInicialBolsa,  editalselecao.edital, unidade.nome as 'unidade' FROM editalselecao editalselecao, fase fase, bolsaedital bolsaedital, candidatura candidatura, aluno aluno, pessoa pessoa, tipoauxilio tipoauxilio, estadocivil estadocivil, classificacao classificacao, curso curso, unidade unidade WHERE candidatura.aluno_id = aluno.id AND aluno.pessoa_id = pessoa.id AND candidatura.estadoCivil_id = estadocivil.id and tipoauxilio.id = candidatura.tipoAuxilio_id and classificacao.id = candidatura.classificacao_id AND tipoauxilio.id = bolsaedital.tipoAuxilio_id AND bolsaedital.fase_id = fase.id AND editalselecao.id = fase.editalSelecao_id AND aluno.curso_id = curso.id AND curso.unidade_id = unidade.id and candidatura.situacao = 'Homologado'  $chaveTipoAuxilio $chaveEdital $situacao $unidade_id ORDER BY totalRenda");
$linhas=mysqli_num_rows($resultado);

$_SESSION['ultima_request'] = null;
$_SESSION['ultimo_id_aluno'] = null;

if (isset($_POST['edital_id'])){
	$chaveEdital = $_POST['edital_id'];
}

if (isset($_POST['$unidade_id'])){
	$unidade_id = $_POST['$unidade_id'];
}

if (isset($_POST['situacao'])){
	$situacao = $_POST['situacao'];
}

if (isset($_POST['tipoAuxilio_id'])){ 
	$chaveTipoAuxilio = $_POST['tipoAuxilio_id'];
}?>

<br>
<br>

<form class="form-horizontal"  action="" method="POST">
	<div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Distribuir Auxílios</h1>
		</div>

		<div class="row espaco">
			<div class="row espaco">	
				<div class="pull-right">
					<a href='administrativo.php'><button type='button' class='btn btn-info'>Retornar</button></a>
				</div>
			</div>
			
			<div class="form-group">
				<div class="form-group">
					<div class="col-md-2">
						<label class="control-label">Edital</label>
						<?php $result_edital_2 = mysqli_query($conectar,"SELECT id, edital FROM editalselecao");?>
						<select id="edital_id" name="edital_id" class="form-control">
							<option value="Todos" <?php if($chaveEdital== "Todos") echo "selected"; ?>>Todos</option>
							<?php foreach($result_edital_2 as $redital_id_2): ?>
							<option value="<?php echo $redital_id_2['id'];?>" <?php if($chaveEdital== $redital_id_2['id']) echo "selected"; ?>><?php  echo $redital_id_2['edital'];?>
							</option><?php endforeach;?>
						</select>
					</div>  
					
					<div class="col-md-2">
						<label class="control-label">Unidade</label>
						<?php $result_unidade_2 = mysqli_query($conectar,"SELECT id, nome FROM unidade");?>
						<select id="unidade_id" name="unidade_id" class="form-control">
							<option value="Todos" <?php if($unidade_id == "Todos") echo "selected"; ?>>Todos</option>
							<?php foreach($result_unidade_2 as $unidade_id_2): ?>
							<option value="<?php echo $unidade_id_2['id'];?>" <?php if($unidade_id == $unidade_id_2['id']) echo "selected"; ?>><?php  echo $unidade_id_2['nome'];?>
							</option><?php endforeach;?>
						</select>
					</div>  
					
					<div class="col-md-2">
						<label class="control-label">Tipo de Auxílio</label>
						<?php $result_tipoAuxilio_2 = mysqli_query($conectar,"SELECT id, categoria FROM tipoauxilio");?>
						<select id="tipoAuxilio_id" name="tipoAuxilio_id" class="form-control">
							<option value="Todos" <?php if($chaveTipoAuxilio== "Todos") echo "selected"; ?>>Todos</option>
							<?php foreach($result_tipoAuxilio_2 as $rtipoAxilio_2): ?>
							<option value="<?php echo $rtipoAxilio_2['id'];?>" <?php if($chaveTipoAuxilio== $rtipoAxilio_2['id']) echo "selected"; ?>><?php  echo $rtipoAxilio_2['categoria'];?>
							</option><?php endforeach;?>
						</select>
					</div> 

					<div class="col-md-2">
						<label class="control-label">Status</label>
						<select class="form-control" name="situacao" id="situacao">
							<option value="Todos" <?php if($situacao== "Todos") echo "selected"; ?>>Todos</option>
							<option value="CLASSIFICADO" <?php if($situacao== "CLASSIFICADO") echo "selected"; ?>>CLASSIFICADO</option>
							<option value="AGUARDANDO" <?php if($situacao== "AGUARDANDO") echo "selected"; ?>>AGUARDANDO</option>
						</select>
					</div>  

					<div class="col-md-1">
						<label class="control-label">Filtro</label>
						<button type="submit" class='btn btn-default'>Aplicar</button>
					</div>
				</div>
			</div>
		</div>
		
		<br>
		
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>Edital</th>
							<th>Unidade</th>
							<th>CPF</th>
							<th>Tipo de Auxílio</th>
							<th>Data Homologação</th>
							<th>Status</th>
							<th>Acões</th>
						</tr>
					</thead>
					
					<tbody>
						<?php while($linhas = mysqli_fetch_array($resultado)){
							echo "<tr>";
								echo "<td>".$linhas["edital"]."</td>";
								echo "<td>".$linhas["unidade"]."</td>";
								echo "<td>".$linhas['cpf']."</td>";
								echo "<td>".$linhas['categoria']."</td>";
								echo "<td>".$linhas['dataHomologacao']."</td>";?>
								<td>
									<?php if($linhas['dataInicialBolsa'] != '' && $linhas['dataInicialBolsa'] != "0000-00-00") { echo "CLASSIFICADO";} else{ echo "AGUARDANDO";}?>  
								</td>
								<td>
									<?php if($linhas['dataInicialBolsa'] != '' && $linhas['dataInicialBolsa'] != "0000-00-00"){
										echo "DISTRIBUÍDO";?>
									<?php } else {?>
										<a href="definirDatasPeriodoBolsa.php?idCandidatura=<?php echo $linhas['id'];?>"><button type='button' class='btn btn-warning'>Distribuir</button></a>
									<?php } ?>
								</td>
							<?php echo "</tr>";
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</form>

<?php 
include_once("footer_adm.php");
?>
