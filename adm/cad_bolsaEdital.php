<?php
session_start();
ob_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
	header("Content-Type: text/html;  charset=ISO-8859-1",true);
?>
	
<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Cadastro de Bolsa Edital</h1>
	</div>
  
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_BolsaEdital.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>

	<br>   

	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_bolsaEdital.php">
				<div class="form-group">
					<label class="col-sm-2 control-label">Inicío de Fase</label>
					<div class="col-sm-10">
						<?php $result_faseInicial_2= mysqli_query($conectar,"SELECT id, inicioFase from fase");?>
						<select  id="fase_id" name="fase_id" class="form-control">                        
							<?php foreach($result_faseInicial_2 as $rtfaseInicial_id_2): ?>
							<option value="<?php echo $rtfaseInicial_id_2 ['id'];?>" ><?php  echo $rtfaseInicial_id_2['inicioFase'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Final de Fase</label>
					<div class="col-sm-10">
						<?php $result_faseFinal_2= mysqli_query($conectar,"SELECT id, finalFase from fase");?>
						<select  id="fase_id" name="fase_id" class="form-control">                        
							<?php foreach($result_faseFinal_2 as $rtfaseFinal_id_2): ?>
							<option value="<?php echo $rtfaseFinal_id_2 ['id'];?>" ><?php  echo $rtfaseFinal_id_2['finalFase'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Tipo de Auxílio</label>
					<div class="col-sm-10">
						<?php $result_tipoAuxilio_2= mysqli_query($conectar,"SELECT id, categoria from tipoAuxilio");?>
						<select  id="tipoAuxilio_id" name="tipoAuxilio_id" class="form-control">                        
							<?php foreach($result_tipoAuxilio_2 as $rtipoAuxilio_id_2): ?>
							<option value="<?php echo $rtipoAuxilio_id_2 ['id'];?>" ><?php  echo $rtipoAuxilio_id_2['categoria'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
	
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Valor</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="valor" placeholder="">
					</div>
				</div>
			  
			  <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Quantidade</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="quantidade" placeholder="">
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