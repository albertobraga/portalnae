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
		<h1>Cadastro de Aluno</h1>
	</div>
	
	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_aluno.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
   
	<br>
  
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_cad_aluno.php">
				<div class="form-group">
				<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="cpf" id="cpf" placeholder="">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Matrícula</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="matricula" id="matricula" placeholder="">
					</div>
				</div>
			  
			   	<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" placeholder="">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email" placeholder="">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Data de Nascimento</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Identidade</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="identidade" placeholder="">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Orgão Expedidor</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="orgaoExpedidor" placeholder="">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-1">
						<select class="form-control selectpicker" name="sexo" id="sexo">						  
							<option value="M">M</option>
							<option value="F">F</option>						
						</select>
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Residencial</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="telefoneResidencial" id="telefoneResidencial" placeholder="">
					</div>
				
				<label for="inputEmail3" class="col-sm-2 control-label">Telefone Celular</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="telefoneCelular" id="telefoneCelular" placeholder="">
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

<script src="js/jquery.maskedinput.js"></script>	
<script type="text/javascript">		
	$(document).ready(function()
			{
		$("#telefoneResidencial").mask("(99) 9999-9999");
		$("#telefoneCelular").mask("(99) 9999-9999");
		 $("#dataNascimento").datepicker({dateFormat: 'yy-mm-dd'});
		 $("#cep").mask("99999-999");
		 $("#cpf").mask("999.999.999-99");
				$( "#cpf" ).blur(function() {
					$("#cpf").mask("999.999.999-99");
					if(!validarCPF($("#cpf").val()))
					{
						$("#cpf").val("")
					}
					
					});
			});
	function validarCPF(cpf){
		var cpf = cpf;
		exp = /\.|\-/g
		cpf = cpf.toString().replace( exp, "" ); 
		var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
		var soma1=0, soma2=0;
		var vlr =11;
		for(i=0;i<9;i++){
				soma1+=eval(cpf.charAt(i)*(vlr-1));
				soma2+=eval(cpf.charAt(i)*vlr);
				vlr--;
		}       
		soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
		soma2=(((soma2+(2*soma1))*10)%11);

		var digitoGerado=(soma1*10)+soma2;
		if(digitoGerado!=digitoDigitado)
		{        
				alert('CPF Invalido!'); 
		return false;  
		}
		else
		{
			return true;
		}      
}
</script>
