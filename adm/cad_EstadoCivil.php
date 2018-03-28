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
		<h1>Cadastro de Estado Civil</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_estadoCivil.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
	
	<br>
   
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_estadoCivil.php">		  
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
					<div class="col-sm-6">	
						<input type="text" class="form-control" name="descritor" placeholder="">
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
