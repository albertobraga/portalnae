<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id =trim($_GET['id']);
$result = mysqli_query($conectar, "SELECT * FROM editalselecao where id = '$id'");
$resultado = mysqli_fetch_assoc($result);
?>

<br>
<br>
	
<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Editar Edital de Seleção</h1>
    </div>
    
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_editalselecao.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
    
	<br>   
      
	<div class="row">
        <div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_editalselecao.php">
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-5 control-label">Ano</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="ano" placeholder="" value="<?php echo $resultado['ano'];?>">
					</div>
				
				<label for="inputEmail3" class="col-sm-3 control-label">Descrição</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="edital" placeholder="" value="<?php echo $resultado['edital'];?>">
					</div>
				</div>

				<div class="form-group">
								
					<label for="inputEmail3" class="col-sm-3 control-label">Documentação PAE</label>
					<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntDocEspecificaPae" id="dataInicialEntDocEspecificaPae" placeholder="" value="<?php echo $resultado['dataInicialEntDocEspecificaPae'];?>">
					</div>
				
				<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntDocEspecificaPae" id="dataFinalEntDocEspecificaPae" placeholder="" value="<?php echo $resultado['dataFinalEntDocEspecificaPae'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Documentação PAED</label>
					<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntDocEspecificaPaed" id="dataInicialEntDocEspecificaPaed" placeholder="" value="<?php echo $resultado['dataInicialEntDocEspecificaPaed'];?>">
					</div>
				
				<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntDocEspecificaPaed" id="dataFinalEntDocEspecificaPaed" placeholder="" value="<?php echo $resultado['dataFinalEntDocEspecificaPaed'];?>">
					</div>
				</div>

				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Entevista</label>
					<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntrevista" id="dataInicialEntrevista" placeholder="" value="<?php echo $resultado['dataInicialEntrevista'];?>">
					</div>
				
				<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntrevista" id="dataFinalEntrevista" placeholder="" value="<?php echo $resultado['dataFinalEntrevista'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Documentação PAEm</label>
					<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntDocEspecificaPaem" id="dataInicialEntDocEspecificaPaem" placeholder="" value="<?php echo $resultado['dataInicialEntDocEspecificaPaem'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntDocEspecificaPaem" id="dataFinalEntDocEspecificaPaem" placeholder="" value="<?php echo $resultado['dataFinalEntDocEspecificaPaem'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-3 control-label">Envio de Dados para o DIREX</label>
					<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntDadosDirex" id="dataInicialEntDadosDirex" placeholder="" value="<?php echo $resultado['dataInicialEntDadosDirex'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntDadosDirex" id="dataFinalEntDadosDirex" placeholder="" value="<?php echo $resultado['dataFinalEntDadosDirex'];?>">
					</div>
				</div>
			  
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Divulgação do Resultado do PAE</label>
				<label for="inputEmail3" class="col-sm-2 control-label">Data Divulgação</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataDivulgResultadoFinalPae" id="dataDivulgResultadoFinalPae" placeholder="" value="<?php echo $resultado['dataDivulgResultadoFinalPae'];?>">
					</div>
				</div>
			  
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Entrega das Informações Bancárias</label>
				<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntInfoBancaria" id="dataInicialEntInfoBancaria" placeholder="" value="<?php echo $resultado['dataInicialEntInfoBancaria'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntInfoBancaria" id="dataFinalEntInfoBancaria" placeholder="" value="<?php echo $resultado['dataFinalEntInfoBancaria'];?>">
					</div>
				</div>
			  
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-3 control-label">Entrega  da Declaração de Matrícula</label>
				<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataInicialEntDeclarMatricula" id="dataInicialEntDeclarMatricula" placeholder="" value="<?php echo $resultado['dataInicialEntDeclarMatricula'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="dataFinalEntDaclarMatricula" id="dataFinalEntDaclarMatricula" placeholder="" value="<?php echo $resultado['dataFinalEntDaclarMatricula'];?>">
					</div>
				</div>
				
				<input type="hidden" name="id" value =  "<?php echo $resultado['id'];?>">
			  
				<br>
			  
				<div class="form-group">
					<div class="col-sm-offset-4 col-sm-8">
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
    
<script type="text/javascript">		
	$(document).ready(function()
			{

		 
		 $("#dataInicialEntDocEspecificaPae").datepicker({dateFormat: 'yy-mm-dd'});
				 $("#dataFinalEntDocEspecificaPae").datepicker({dateFormat: 'yy-mm-dd'});
						 $("#dataInicialEntDocEspecificaPaed").datepicker({dateFormat: 'yy-mm-dd'});
								 $("#dataFinalEntDocEspecificaPaed").datepicker({dateFormat: 'yy-mm-dd'});
										 $("#dataInicialEntrevista").datepicker({dateFormat: 'yy-mm-dd'});
												 $("#dataFinalEntrevista").datepicker({dateFormat: 'yy-mm-dd'});
														 $("#dataInicialEntDocEspecificaPaem").datepicker({dateFormat: 'yy-mm-dd'});
																 $("#dataFinalEntDocEspecificaPaem").datepicker({dateFormat: 'yy-mm-dd'});
																		 $("#dataInicialEntDadosDirex").datepicker({dateFormat: 'yy-mm-dd'});
																				 $("#dataFinalEntDadosDirex").datepicker({dateFormat: 'yy-mm-dd'});
																						 $("#dataDivulgResultadoFinalPae").datepicker({dateFormat: 'yy-mm-dd'});
																								 $("#dataInicialEntInfoBancaria").datepicker({dateFormat: 'yy-mm-dd'});
																										 $("#dataFinalEntInfoBancaria").datepicker({dateFormat: 'yy-mm-dd'});
																												 $("#dataInicialEntDeclarMatricula").datepicker({dateFormat: 'yy-mm-dd'});
																														 $("#dataFinalEntDaclarMatricula").datepicker({dateFormat: 'yy-mm-dd'});
																														 
				
	  });
</script>
