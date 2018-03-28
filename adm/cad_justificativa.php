<?php
session_start();
ob_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php 
	header("Content-Type: text/html;  charset=ISO-8859-1",true);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Cadastro de Justificativa de Homologação</h1>
    </div>
    
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_justificativa.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
    
	<br>   

	<div class="row">
        <div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_justificativa.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Justificativa</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="justificativa" placeholder="">
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
