<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id = $_GET['idCandidatura'];
$result = mysqli_query($conectar, "SELECT candidatura.id, aluno.matricula, candidatura.classificacao_id, classificacao.dataFinalBolsa, classificacao.dataInicialBolsa, tipoAuxilio.categoria, tipoAuxilio.duracaoMax, tipoAuxilio.duracaoMin  FROM candidatura candidatura, tipoAuxilio tipoAuxilio, aluno aluno, classificacao classificacao WHERE candidatura.classificacao_id = classificacao.id and candidatura.aluno_id = aluno.id and  candidatura.tipoAuxilio_id = tipoAuxilio.id and candidatura.id = '$id' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Distribuir Bolsas</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_classificados_distribuicao.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>

	<br>
  
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_classificacao.php">
				<fieldset>
					<legend>Tipo de Auxílio</legend>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Categoria</label>
						<div class="col-sm-9">
							<input type="text"  readonly="readonly"  class="form-control" id="categoria" name="categoria" placeholder="" value = "<?php echo $resultado['categoria'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Duração Mínima de Bolsa</label>
						<div class="col-sm-9">
							<input type="text"  readonly="readonly"  class="form-control" name="duracaoMax" id="duracaoMax" placeholder="" value = "<?php echo $resultado['duracaoMin'];?>">
						</div>
					</div>			  			  
			  
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-3 control-label">Duração Máxima de bolsa</label>
						<div class="col-sm-9">
							<input type="text" readonly="readonly" class="form-control" name="duracaoMin" placeholder="" id="duracaoMin" value = "<?php echo $resultado['duracaoMax'];?>">
						</div>
					</div>
				</fieldset>

				<br>
				
				<fieldset>
					<legend>Definição do Período de Bolsa da Matrícula <?php $resultado['matricula']?></legend>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="dataInicialBolsa" name="dataInicialBolsa" placeholder="" value = "<?php echo $resultado['dataInicialBolsa'];?>">
						</div>
					</div>
			  
					<div class="form-group">
						<label for="inputPassword3" class="col-sm-2 control-label">Data Final</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="dataFinalBolsa" name="dataFinalBolsa" placeholder="" value = "<?php echo $resultado['dataFinalBolsa'];?>">
						</div>
					</div>
				</fieldset>
						  
				<input type="hidden" name="idCandidatura" value =  "<?php echo $resultado['id'];?>">
				<input type="hidden" name="classificacao_id" value =  "<?php echo $resultado['classificacao_id'];?>">
			  
						  
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Salvar</button>
					</div>
				</div>
			</form>
		</div>
    </div>
</div>

<?php 
include_once("footer_adm.php");
?>
    
<script src="js/jquery.maskedinput.js"></script>	
<script type="text/javascript">		
		$(document).ready(function()
	            {
			 $("#dataInicialBolsa").datepicker({dateFormat: 'yy-mm-dd'});
			 $("#dataFinalBolsa").datepicker({dateFormat: 'yy-mm-dd'});
			
	            });
</script>