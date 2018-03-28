<?php
//session_start();
include_once("conexao.php");
include_once("header_usuario.php");
include_once("menu_usuario.php");
?>

<br>
<br>
    
<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Cadastrar Item de Renda</h1>
	</div>
  
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_itemRendaporCandidatura.php?idCandidatura=<?php echo $_GET['idCandidatura']?>'><button type='button' class='btn btn-info'>Retornar</button></a>			

		</div>
	</div>
   
	<br>   
  
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_itemRendaCandidatura.php?idCandidatura=<?php echo $_GET['idCandidatura']?>">
			    <div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" placeholder="">
					</div>
				</div>
			  
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Grau de Parentesco</label>
					<div class="col-sm-10">
						<?php  $result_grauparentesco_2 = mysqli_query($conectar,"SELECT id, parentesco FROM grauparentesco");?>
						<select class="form-control" id="grauParentesco_id" name="grauParentesco_id"><?php foreach($result_grauparentesco_2 as $rgrauparentesco_2): ?>
							<option value="<?php echo $rgrauparentesco_2['id'];?> "><?php  echo $rgrauparentesco_2['parentesco'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Vinculo Trabalhista</label>
					<div class="col-sm-10">
						<?php $result_vinculotrabalhista_2 = mysqli_query($conectar,"SELECT id, ocupacao FROM vinculotrabalhista");?>
						<select class="form-control" id="vinculoTrabalhista_id" name="vinculoTrabalhista_id"><?php foreach($result_vinculotrabalhista_2 as $rvinculotrabalhista_2): ?>
							<option value=" <?php echo $rvinculotrabalhista_2['id'];?> "><?php  echo $rvinculotrabalhista_2['ocupacao'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Renda</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="totalRenda" name="totalRenda" placeholder="">
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
include_once("footer_usuario.php");
?>
