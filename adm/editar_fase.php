<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id = $_GET['id'];
$result = mysqli_query($conectar, "SELECT fase.id, fase.inicioFase, fase.finalFase, fase.unidade_id, unidade.nome, fase.editalSelecao_id, editalselecao.ano FROM fase fase, unidade unidade, editalselecao editalselecao WHERE fase.unidade_id = unidade.id and editalselecao.id = fase.editalSelecao_id and fase.id = '$id'");
$resultado = mysqli_fetch_assoc($result);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Editar Fase</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_fase.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
	
	<br>
  
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_fase.php">
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Data Inicial</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="InicialFase" name="inicioFase" value = "<?php echo $resultado['inicioFase'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-3 control-label">Data Final</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="finalFase" name="finalFase" value = "<?php echo $resultado['finalFase'];?>">
					</div>
				</div>
			
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Unidade</label>
					<div class="col-sm-3">
						<?php $result_unidade_2= mysqli_query($conectar,"SELECT id, nome from unidade ");?>
						<select  id="unidade_id" name="unidade_id" class="form-control">                        
							<?php foreach($result_unidade_2 as $runidade_id_2): ?>
							<option value="<?php echo $runidade_id_2['id'];?>" <?php if($resultado['unidade_id']== $runidade_id_2['id']) echo "selected"; ?>><?php  echo $runidade_id_2['nome'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				
					<label for="inputPassword3" class="col-sm-3 control-label">Edital</label>
					<div class="col-sm-3">
						<?php $result_edital_2 = mysqli_query($conectar,"SELECT id, ano FROM editalselecao");?>
						<select id="editalSelecao_id" name="editalSelecao_id" class="form-control">
							<?php foreach($result_edital_2 as $redital_id_2): ?>
							<option value="<?php echo $redital_id_2['id'];?>" <?php if($resultado['editalSelecao_id'] == $redital_id_2['id']) echo "selected"; ?>><?php  echo $redital_id_2['ano'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
					  
				<input type="hidden" name="id" value =  "<?php echo $resultado['id'];?>">
		  
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