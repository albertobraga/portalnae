<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Definir Fases</h1>
	</div>
  
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_fase.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
   
	<br>   
  
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_fase.php">
				<div class="form-group">
					<label class="col-sm-2 control-label">Edital</label>
					<div class="col-sm-4">
						<?php $result_edital_2 = mysqli_query($conectar,"SELECT id, ano FROM editalselecao");?>
						<select id="editalSelecao_id" name="editalSelecao_id" class="form-control">
						<?php foreach($result_edital_2 as $redital_id_2): ?>
							<option value="<?php echo $redital_id_2['id'];?>" > <?php  echo $redital_id_2['ano'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				
					<label class="col-sm-2 control-label">Unidade</label>
					<div class="col-sm-4">
						<?php $result_unidade_2= mysqli_query($conectar,"SELECT id, nome from unidade ");?>
						<select  id="unidade_id" name="unidade_id" class="form-control">                        
						<?php foreach($result_unidade_2 as $runidade_id_2): ?>
							<option value="<?php echo $runidade_id_2['id'];?>" ><?php  echo $runidade_id_2['nome'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Início da Fase</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="dataPrimeiraFase" id="dataPrimeiraFase" placeholder="">
					</div>
				
				<label for="inputEmail3" class="col-sm-2 control-label">Final da Fase</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="dataSegundaFase" id="dataSegundaFase" placeholder="">
					</div>
				</div>
			  
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-success">Cadastrar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php 
include_once("footer_adm.php");
?>
    
<script type="text/javascript">		
	$(document).ready(function()
			{

		 
		 $("#dataPrimeiraFase").datepicker({dateFormat: 'yy-mm-dd'});
		 $("#dataSegundaFase").datepicker({dateFormat: 'yy-mm-dd'});
						
																														 
				
	  });
</script>
