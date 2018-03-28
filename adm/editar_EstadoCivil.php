<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id = $_GET['id'];
$result = mysqli_query($conectar, "SELECT * FROM estadocivil where id = $id");
$resultado = mysqli_fetch_assoc($result);		
?>

<br>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Editar Estado Civil</h1>
    </div>

	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_estadoCivil.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
    
	<br>   
    
	<div class="row">
        <div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_estadoCivil.php">
			    <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="descritor" placeholder="" value = "<?php echo $resultado['descritor'];?>">
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
