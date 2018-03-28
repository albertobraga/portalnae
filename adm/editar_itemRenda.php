<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id = $_GET['id'];
$result = mysqli_query($conectar, "SELECT * FROM itemRenda WHERE id = '$id' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);
?>

<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Editar Renda</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='efetuarHomologacao.php?idCandidatura=<?php echo $resultado['candidatura_id'];?>'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
	
	<br>
  
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_renda.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" placeholder="Nome Completo" value = "<?php echo $resultado['nome'];?>">
					</div>
				</div>
		  
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Renda</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" id="totalRenda" name="totalRenda" placeholder="Total Renda" value = "<?php echo $resultado['totalRenda'];?>">
					</div>
					
					<label class="col-sm-2 control-label">Grau de Parentesco</label>
					<div class="col-sm-5">
						<?php $result_grauparentesco_2= mysqli_query($conectar,"SELECT id, parentesco from grauparentesco ");?>
						<select  id="grauparentesco_id" name="grauparentesco_id" class="form-control">                        
							<?php foreach($result_grauparentesco_2 as $rgrauparentesco_id_2): ?>
							<option value="<?php echo $rgrauparentesco_id_2['id'];?>" <?php if($resultado['grauParentesco_id']== $rgrauparentesco_id_2['id']) echo "selected"; ?>><?php  echo $rgrauparentesco_id_2['parentesco'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
		  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="dataNascimento" placeholder="Nascimento" value = "<?php echo $resultado['dataNascimento'];?>">
					</div>
					
					<label class="col-sm-2 control-label">Vínculo Trabalhista</label>
					<div class="col-sm-5">
						<?php $result_vinculotrabalhista_2= mysqli_query($conectar,"SELECT id, ocupacao from vinculotrabalhista ");?>
						<select  id="vinculotrabalhista_id" name="vinculotrabalhista_id" class="form-control">                        
							<?php foreach($result_vinculotrabalhista_2 as $rvinculotrabalhista_id_2): ?>
							<option value="<?php echo $rvinculotrabalhista_id_2['id'];?>" <?php if($resultado['vinculoTrabalhista_id']== $rvinculotrabalhista_id_2['id']) echo "selected"; ?>><?php  echo $rvinculotrabalhista_id_2['ocupacao'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
		  
				<input type="hidden" name="id" value =  "<?php echo $resultado['id'];?>">
				<input type="hidden" name="idCandidatura" value =  "<?php echo $resultado['candidatura_id'];?>">
		  
				<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-success">Salvar</button>
				</div>
			</div>
		</form>
	</div>
</div>


    <?php 
    include_once("footer_adm.php");
    
    ?>
