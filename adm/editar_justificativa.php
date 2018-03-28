<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id = $_GET['id'];
$result = mysqli_query($conectar, "SELECT * FROM justificativa where id = $id");
$resultado = mysqli_fetch_assoc($result);
?>

<br>

<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Editar Justificativa de Homologação</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_justificativa.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>

	<br>   
	
	<div class="row">
		<div class="col-md-12">

		<form class="form-horizontal" method = "POST" action = "processa/proc_edit_justificativa.php">
		  
			<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Justificativa</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="justificativa" placeholder="" value = "<?php echo $resultado['justificativa'];?>">
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


<?php 
include_once("footer_adm.php");
?>
