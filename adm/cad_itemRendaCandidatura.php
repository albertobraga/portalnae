<?php
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>
<br>

<div class="container theme-showcase" role="main">
    <div class="page-header">
		<h1>Cadastro de Item de Renda</h1>
    </div>
    
	<div class="row espaco">
		<div class="pull-right">
			<a href='efetuarHomologacao.php?idCandidatura=<?php echo $_GET['idCandidatura']?>'><button type='button' class='btn btn-info'>Retornar</button></a>			
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
					<label for="inputPassword3" class="col-sm-2 control-label">Renda</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="totalRenda" id="totalRenda" placeholder="">
					</div>
				
					<label class="col-sm-2 control-label">Grau de Parentesco</label>
					<div class="col-sm-5">
						<?php $result_grauparentesco_2= mysqli_query($conectar,"SELECT id, parentesco from grauparentesco");?>
                        <select  id="grauparentesco_id" name="grauparentesco_id" class="form-control">                        
                        <?php foreach($result_grauparentesco_2 as $resultado_2): ?>
                            <option value="<?php echo $resultado_2['id'];?>" ><?php  echo $resultado_2['parentesco'];?>
                            </option><?php endforeach;?>
                        </select>
					</div>
				</div>
			  	
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data Nascimento</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="">
					</div>
				
					<label class="col-sm-2 control-label">Vínculo Trabalhista</label>
					<div class="col-sm-5">
			      <?php $result_vinculotrabalhista_2= mysqli_query($conectar,"SELECT id, ocupacao from vinculotrabalhista ");?>
                        <select  id="vinculotrabalhista_id" name="vinculotrabalhista_id" class="form-control">                        
                        <?php foreach($result_vinculotrabalhista_2 as $rvinculotrabalhista_id_2): ?>
                            <option value="<?php echo $rvinculotrabalhista_id_2['id'];?>" ><?php  echo $rvinculotrabalhista_id_2['ocupacao'];?>
                            </option><?php endforeach;?>
                        </select>
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

		 
		 $("#dataNascimento").datepicker({dateFormat: 'yy-mm-dd'});
				
	  });
</script>
