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
        <h1>Cadastro de Tipo de Auxílio</h1>
    </div>
		
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_tipoAuxilio.php'><button type='button' class='btn btn-info'>Retornar</button></a>			

		</div>
	</div>
       
   <br>   
      
	<div class="row">
        <div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_tipoAuxilio.php">
			    <div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Categoria</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="categoria" placeholder="">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Duração Mínima</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="duracaoMin" id="duracaoMin" placeholder="">
					</div>
					<label for="inputEmail3" class="col-sm-1 control-label">Meses(s)</label>
				
					<label for="inputEmail3" class="col-sm-4 control-label">Duração Máxima</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="duracaoMax" id="duracaoMax" placeholder="">
					</div>
					<label for="inputEmail3" class="col-sm-1 control-label">Mese(s)</label>
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
    
<script src="js/jquery.maskedinput.js"></script>	
<script type="text/javascript"></script>
