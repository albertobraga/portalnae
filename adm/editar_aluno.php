<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$id=trim($_GET['id']);
$aluno_id=trim($_GET['aluno_id']);
$result = mysqli_query($conectar, "SELECT p.id, u.matricula, u.escolaridade_id, es.periodo, p.email,p.cpf,p.nome,p.dataNascimento,p.identidade,p.orgaoExpedidor,p.sexo,p.telefoneResidencial,p.telefoneCelular, u.id as 'aluno_id', u.curso_id FROM escolaridade es, pessoa p, aluno u where u.escolaridade_id = es.id and u.pessoa_id = p.id and p.id = '$id' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Editar Aluno</h1>
    </div>

	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_aluno.php?id=<?php echo $resultado['id'];?>'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
    
	<br>
      
    <div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_aluno.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="cpf" id="cpf" placeholder="" value = "<?php echo $resultado['cpf'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Matrícula</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="matricula" placeholder="" value = "<?php echo $resultado['matricula'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" placeholder="" value = "<?php echo $resultado['nome'];?>">
					</div>
				</div>
			  		  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" class="form-control" name="email" placeholder="" value = "<?php echo $resultado['email'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Data de Nascimento</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="dataNascimento" id="dataNascimento" placeholder="" value = "<?php echo $resultado['dataNascimento'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Identidade</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="identidade" placeholder="" value = "<?php echo $resultado['identidade'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Orgão Expedidor</label>
					<div class="col-sm-2">
						<input type="text" class="form-control" name="orgaoExpedidor" placeholder="" value = "<?php echo $resultado['orgaoExpedidor'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-1">
						<select class="form-control selectpicker" name="sexo" id="sexo">
							<option value="M" <?php if($resultado['sexo'] == "M") echo "selected"; ?>>M</option>
							<option value="F" <?php if($resultado['sexo'] == "F") echo "selected"; ?>>F</option>
						</select>
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Residencial</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="telefoneResidencial" id="telefoneResidencial" placeholder="" value = "<?php echo $resultado['telefoneResidencial'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Celular</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="telefoneCelular" id="telefoneCelular" placeholder="" value = "<?php echo $resultado['telefoneCelular'];?>">
					</div>
				</div>

				<input type="hidden" name="id" value =  "<?php echo $resultado['id'];?>">
				<input type="hidden" name="aluno_id" value =  "<?php echo $resultado['aluno_id'];?>">
				<input type="hidden" name="escolaridade_id" value =  "<?php echo $resultado['escolaridade_id'];?>">	  
			  
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
