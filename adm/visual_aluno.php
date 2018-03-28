<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

</br>

<?php 
$id = $_GET['id'];
$result = mysqli_query($conectar, "SELECT p.id, u.matricula, p.cpf, p.nome, p.email, p.dataNascimento,p.identidade,p.orgaoExpedidor,p.sexo,p.telefoneResidencial,p.telefoneCelular, u.id as 'aluno_id' FROM pessoa p, aluno u where u.pessoa_id = p.id ORDER BY 'id'");
$resultado = mysqli_fetch_assoc($result);
?>

<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Visualizar Aluno</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_aluno.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
	
	<br>
	
	<div class="row">
		<div class="col-md-12">	
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_aluno.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly"class="form-control" name="cpf" id="cpf" placeholder="" value = "<?php echo $resultado['cpf'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Matricula</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly" class="form-control" name="matricula" id="matricula" placeholder="" value = "<?php echo $resultado['matricula'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" readonly="readonly" class="form-control" name="nome" placeholder="" value = "<?php echo $resultado['nome'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" readonly="readonly" class="form-control" name="email" placeholder="" value = "<?php echo $resultado['email'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Data de Nascimento</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="" value = "<?php echo $resultado['dataNascimento'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Identidade</label>
					<div class="col-sm-3">
						<input type="text" readonly="readonly" class="form-control" name="identidade" placeholder="" value = "<?php echo $resultado['identidade'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Orgão Expedidor</label>
					<div class="col-sm-2">
						<input type="text" readonly="readonly" class="form-control" name="orgaoExpedidor" placeholder="" value = "<?php echo $resultado['orgaoExpedidor'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-1">
						<input type="text" readonly="readonly" class="form-control" name="sexo" id="sexo" value = "<?php echo $resultado['sexo'];?>">						 
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Residencial</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly" class="form-control" name="telefoneResidencial" id="telefoneResidencial" placeholder="" value = "<?php echo $resultado['telefoneResidencial'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Celular</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly" class="form-control" name="telefoneCelular" id="telefoneCelular" placeholder="" value = "<?php echo $resultado['telefoneCelular'];?>">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
include_once("footer_adm.php");
?>