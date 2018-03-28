<?php 
session_start();
include_once("conexao.php");
include_once("menu_usuario.php");

if(!isset($_SESSION['control_aba'])){
	$_SESSION['control_aba'] = 0;
}
header("Content-Type: text/html;  charset=ISO-8859-1",true);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<title>PORTAL CAE</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="Layout/css/normalize.css" />
	    <link rel="stylesheet" href="Layout/css/main.css" />   
	    <link rel="stylesheet" href="Layout/css/jquery.steps.css" />
	    <script src="Layout/lib/modernizr-2.6.2.min.js"></script>	    
		
        <link rel="stylesheet" href="Layout/css/style.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	    <script src="Layout/lib/jquery.cookie-1.3.1.js"></script>
	    <script src="Layout/build/jquery.steps.js"></script>
	    <script type="text/javascript">
	        $(function () {
	            $("#wizard").steps({
	                headerTag: "h2",
	                bodyTag: "section",
	                transitionEffect: "slideLeft"
	            });
	        });
			function VoltarPrincipal()
			{
				window.location = "index.php";
			}
	    </script>
	</head>
	
	<body>
		<div>
			
			<br>	
		
			<div class="container theme-showcase" role="main">
				<div class="page-header">
					<h1>Realizar Candidatura</h1>
				</div>	
				
				<?php
				$id=trim($_GET['id']);
				$tipoauxilio_id =trim($_GET['tipoauxilio_id']);
				$editalselecao_id=trim($_GET['editalselecao_id']);
				
				$result = mysqli_query($conectar, "SELECT * FROM pessoa WHERE id = '$id' LIMIT 1");
				$resultado = mysqli_fetch_assoc($result);
				$_SESSION['pessoaid'] 					= $resultado["id"];
				$_SESSION['pessoacpf'] 					= $resultado["cpf"];
				$_SESSION['pessoaemail'] 				= $resultado["email"];
				$_SESSION['pessoanome'] 				= $resultado["nome"];
				$_SESSION['pessoadataNascimento'] 		= $resultado["dataNascimento"];
				$_SESSION['pessoaidentidade'] 			= $resultado["identidade"];
				$_SESSION['pessoaorgaoExpedidor']		= $resultado["orgaoExpedidor"];
				$_SESSION['pessoasexo']					= $resultado["sexo"];
				$_SESSION['pessoatelefoneResidencial']	= $resultado["telefoneResidencial"];
				$_SESSION['pessoatelefoneCelular']		= $resultado["telefoneCelular"];

				$result2 = mysqli_query($conectar, "SELECT aluno.id, aluno.matricula, aluno.pessoa_id, aluno.curso_id, aluno.escolaridade_id, curso.nome as 'nomeCurso'  FROM aluno, curso, escolaridade WHERE aluno.curso_id = curso.id AND  pessoa_id = '$id' LIMIT 1");
				$resultado2 = mysqli_fetch_assoc($result2);
				$_SESSION['alunoid'] 					= $resultado2["id"];
				$_SESSION['alunomatricula'] 			= $resultado2["matricula"];
				
				
				$result3 = mysqli_query($conectar, "SELECT * FROM escolaridade WHERE id = $resultado2[escolaridade_id] LIMIT 1");
				$resultado3 = mysqli_fetch_assoc($result3);
				$_SESSION['escolaid'] 						= $resultado3["id"];
				$_SESSION['escolaperiodo'] 					= $resultado3["periodo"];
				$_SESSION['escolavigenciaEstagioInicial'] 	= $resultado3["vigenciaEstagioInicial"];
				$_SESSION['escolavigenciaEstagioFinal'] 	= $resultado3["vigenciaEstagioFinal"];
				
				$idadeUsuario = date("Y", strtotime("now")) - date("Y", strtotime($resultado["dataNascimento"]));
				$maiorQueDezoito = false;
				
				if($idadeUsuario > 18){
					$maiorQueDezoito = true;
				} else {
					$maiorQueDezoito = false;
				}
				
				if($_SERVER['REQUEST_METHOD']=='POST'){		
					if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>			       
						<div class="alert alert-danger" role="alert">Usuário inserido!</div>
					<?php }elseif(!isset($_SESSION['ultimo_id_aluno'])){
						
						$_SESSION['ultima_request'] = $request;

						$ultimo_id_aluno = $_SESSION['alunoid'];

						$pessoaId 					= $_SESSION['pessoaid'];
						$pessoacpf 					= $_POST['pessoacpf'];
						$pessoaemail 				= $_POST['pessoaemail'];
						$pessoanome 				= $_POST['pessoanome'];
						$pessoadataNascimento 		= $_POST['pessoadataNascimento'];
						$pessoaidentidade 			= $_POST['pessoaidentidade'];
						$pessoaorgaoExpedidor 		= $_POST['pessoaorgaoExpedidor'];
						$pessoasexo					= $_POST['pessoasexo'];
						$pessoatelefoneResidencial 	= $_POST['pessoatelefoneResidencial'];
						$pessoatelefoneCelular 		= $_POST['pessoatelefoneCelular'];
						$_SESSION['pessoacpf'] 				    = $pessoacpf;
						$_SESSION['pessoaemail'] 			    = $pessoaemail;
						$_SESSION['pessoanome'] 			    = $pessoanome;
						$_SESSION['pessoadataNascimento'] 	    = $pessoadataNascimento;
						$_SESSION['pessoaidentidade']		    = $pessoaidentidade;
						$_SESSION['pessoaorgaoExpedidor']	    = $pessoaorgaoExpedidor;
						$_SESSION['pessoasexo'] 			    = $pessoasexo;
						$_SESSION['pessoatelefoneResidencial'] 	= $pessoatelefoneResidencial;
						$_SESSION['pessoatelefoneCelular'] 		= $pessoatelefoneCelular;


						$alunoid 										= $_SESSION['alunoid'];
						$alunomatricula 								= $_POST['alunomatricula'];
						$_SESSION['alunomatricula'] 				    = $alunomatricula;

						$cpf 					= $_POST['cpf'];
						$nome 					= $_POST['nome'];
						$email 					= $_POST['email'];
						$identidade 			= $_POST['identidade'];
						$orgaoExpedidor 		= $_POST['orgaoExpedidor'];
						$dataNascimentoResp		= $_POST['dataNascimento'];
						$_SESSION['cpf'] 			= $cpf;
						$_SESSION['nome'] 			= $nome;
						$_SESSION['email'] 			= $email;
						$_SESSION['identidade'] 	= $identidade;
						$_SESSION['orgaoExpedidor'] = $orgaoExpedidor;
						$result_responsavel = " INSERT INTO responsavel (cpf, nome, email, identidade, orgaoExpedidor, dataNascimento ) VALUES ('$cpf', '$nome','$email', '$identidade', '$orgaoExpedidor', '$dataNascimentoResp') ";
						$resultado_responsavel = mysqli_query($conectar, $result_responsavel);
						$ultima_id_responsavel = mysqli_insert_id($conectar);
						
						$periodo 				= $_POST['periodo'];
						$vigenciaEstagioInicial = $_POST['vigenciaEstagioInicial'];
						$vigenciaEstagioFinal 	= $_POST['vigenciaEstagioFinal'];
						$_SESSION['periodo'] 				= $periodo;
						$_SESSION['vigenciaEstagioInicial']	= $vigenciaEstagioInicial;
						$_SESSION['vigenciaEstagioFinal'] 	= $vigenciaEstagioFinal;
											
						
						$logradouro 			= $_POST['logradouro'];
						$numero		 			= $_POST['numero'];
						$complemento 			= $_POST['complemento'];
						$bairro					= $_POST['bairro'];
						$cidade					= $_POST['cidade'];
						$uf 					= $_POST['uf'];
						$cep					= $_POST['cep'];
						$_SESSION['logradouro'] 	= $logradouro;
						$_SESSION['numero'] 		= $numero;
						$_SESSION['complemento']	= $complemento;
						$_SESSION['bairro'] 		= $bairro;
						$_SESSION['cidade']			= $cidade;
						$_SESSION['uf'] 			= $uf;
						$_SESSION['cep'] 			= $cep;
						$result_endereco = "INSERT INTO endereco (logradouro, numero, complemento, bairro, cidade, uf, cep) VALUES ('$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep')";
						$resultado_endereco = mysqli_query($conectar, $result_endereco);
						$ultima_id_endereco = mysqli_insert_id($conectar);
						
						$nomeBanco 			= $_POST['nomeBanco'];
						$numeroAgencia		= $_POST['numeroAgencia'];
						$contaCorrente		= $_POST['contaCorrente'];
						$_SESSION['nomeBanco'] 				= $nomeBanco;
						$_SESSION['numeroAgencia'] 			= $numeroAgencia;
						$_SESSION['contaCorrente'] 			= $contaCorrente;
						$result_contaBancaria = "INSERT INTO contabancaria (nomeBanco, numeroAgencia, contaCorrente) VALUES ('$nomeBanco', '$numeroAgencia', '$contaCorrente')";
						$resultado_contaBancaria = mysqli_query($conectar, $result_contaBancaria);
						$ultima_id_contaBancaria = mysqli_insert_id($conectar);
						
						$result_classificacao = "INSERT INTO classificacao (tipoAuxilio_id) VALUES ('$tipoauxilio_id')";
						$resultado_classificacao = mysqli_query($conectar, $result_classificacao);
						$ultima_id_classificacao = mysqli_insert_id($conectar);
						$estadoCivil_id			=$_POST['estadoCivil_id'];
						$_SESSION['estadoCivil'] = $estadoCivil_id;
						$result_candidatura = "INSERT INTO candidatura (dataRealizacao, situacao, aluno_id, responsavel_id, endereco_id, estadoCivil_id, contaBancaria_id, tipoAuxilio_id, classificacao_id, editalselecao_id) VALUES (now(), 'Em Analise', '$ultimo_id_aluno', '$ultima_id_responsavel', '$ultima_id_endereco', '$estadoCivil_id', '$ultima_id_contaBancaria', '$tipoauxilio_id', '$ultima_id_classificacao', '$editalselecao_id')";
						$resultado_candidatura = mysqli_query($conectar, $result_candidatura);
						$ultima_id_candidatura = mysqli_insert_id($conectar);
						?>
							
						<div class="alert alert-success" role="alert">Candidatura realizada com sucesso!</div>
						<?php header("Location:listar_itemRendaporCandidatura.php?idCandidatura=$ultima_id_candidatura");
					}	
				}?>
			
				<form id="frmWizard" class="form-horizontal"  action="" method="POST">
					<div id="wizard">
						<h2>Dados Pessoais</h2>
						<section>
							<div class="form-group">
								<label class="col-sm-2 control-label">Matrícula</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='alunomatricula' class="form-control" id="alunomatricula" placeholder="" value="<?php if(isset($_SESSION['alunomatricula'])){ echo $_SESSION['alunomatricula']; }?>">
								</div>
								
								<label class="col-sm-2 control-label">Estado Civil</label>
								<div class="col-sm-4"><?php
									$result_estadoCivil_2 = mysqli_query($conectar,"SELECT id, descritor FROM estadoCivil");?>
									<select class="form-control" id="estadoCivil_id" name="estadoCivil_id"><?php foreach($result_estadoCivil_2 as $restadoCivil_2): ?>
										<option value=" <?php echo $restadoCivil_2['id'];?> "><?php  echo $restadoCivil_2['descritor'];?>
										</option><?php endforeach;?>
									</select>
								</div>
							</div>
									
							<div class="form-group">
								<label class="col-sm-2 control-label">CPF</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='pessoacpf' class="form-control" id="pessoacpf" placeholder="" value="<?php if(isset($_SESSION['pessoacpf'])){ echo $_SESSION['pessoacpf']; }?>">
								</div>
							
								<label class="col-sm-1 control-label">Email</label>
								<div class="col-sm-5">
									<input type="text" readonly="readonly" name='pessoaemail' class="form-control" id="pessoaemail" placeholder="" value="<?php if(isset($_SESSION['pessoaemail'])){ echo $_SESSION['pessoaemail']; }?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<input type="text" readonly="readonly" name='pessoanome' class="form-control" id="pessoanome" placeholder="" value="<?php if(isset($_SESSION['pessoanome'])){ echo $_SESSION['pessoanome']; }?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label"> Data Nascimento</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='pessoadataNascimento' class="form-control" id="pessoadataNascimento" placeholder="" value="<?php if(isset($_SESSION['pessoadataNascimento'])){ echo $_SESSION['pessoadataNascimento']; }?>">
								</div>
							
								<label class="col-sm-1 control-label">Sexo</label>
								<div class="col-sm-5">
									<input type="text" readonly="readonly" name='pessoasexo' class="form-control" id="pessoasexo" placeholder="" value="<?php if(isset($_SESSION['pessoasexo'])){ echo $_SESSION['pessoasexo']; }?>">
								</div>
							</div>
								
							<div class="form-group">
								<label class="col-sm-2 control-label">Identidade</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='pessoaidentidade' class="form-control" id="pessoaidentidade" placeholder="" value="<?php if(isset($_SESSION['pessoaidentidade'])){ echo $_SESSION['pessoaidentidade']; }?>">
								</div>

								<label class="col-sm-2 control-label">Orgão Expedidor</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='pessoaorgaoExpedidor' class="form-control" id="pessoaorgaoExpedidor" placeholder="" value="<?php if(isset($_SESSION['pessoaorgaoExpedidor'])){ echo $_SESSION['pessoaorgaoExpedidor']; }?>">
								</div>
							</div>
															
							<div class="form-group">
								<label class="col-sm-2 control-label">Telefone</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='pessoatelefoneResidencial' class="form-control" id="pessoatelefoneResidencial" placeholder="" value="<?php if(isset($_SESSION['pessoatelefoneResidencial'])){ echo $_SESSION['pessoatelefoneResidencial']; }?>">
								</div>

								<label class="col-sm-2 control-label">Telefone Celular</label>
								<div class="col-sm-4">
									<input type="text" readonly="readonly" name='pessoatelefoneCelular' class="form-control" id="pessoatelefoneCelular" placeholder="" value="<?php if(isset($_SESSION['pessoatelefoneCelular'])){ echo $_SESSION['pessoatelefoneCelular']; }?>">
								</div>
							</div>
						</section>
			
						<h2>Responsável</h2>
						<section>
							<div class="form-group">
								<label class="col-sm-2 control-label">CPF</label>
								<div class="col-sm-10">
									<input type="text" name="cpf" <?php if($maiorQueDezoito){?> readonly="readonly" <?php }?> class="form-control" id="cpf" placeholder="" value="<?php if($maiorQueDezoito){ echo $resultado["cpf"]; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input type="text" name="email" class="form-control" <?php if($maiorQueDezoito){?> readonly="readonly" <?php }?> id="email" placeholder="" value="<?php if($maiorQueDezoito){ echo $resultado['email']; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Nome</label>
								<div class="col-sm-10">
									<input type="text" name="nome" class="form-control" <?php if($maiorQueDezoito){?> readonly="readonly" <?php }?> id="nome" placeholder="" value="<?php if($maiorQueDezoito){ echo $resultado['nome']; }?>">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Data Nascimento</label>
								<div class="col-sm-10">
									<input type="text" name="dataNascimento" <?php if($maiorQueDezoito){?> readonly="readonly" <?php }?> class="form-control" id="dataNascimento" placeholder="" value="<?php if($maiorQueDezoito){ echo $resultado['dataNascimento']; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Identidade</label>
								<div class="col-sm-10">
									<input type="text" name="identidade" <?php if($maiorQueDezoito){?> readonly="readonly" <?php }?> class="form-control" id="identidade" placeholder="" value="<?php if($maiorQueDezoito){ echo $resultado['identidade']; }?>">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Orgão Expedidor</label>
								<div class="col-sm-10">
									<input type="text" name="orgaoExpedidor" <?php if($maiorQueDezoito){?> readonly="readonly" <?php }?> class="form-control" id="orgaoExpedidor" placeholder="" value="<?php if($maiorQueDezoito){ echo $resultado['orgaoExpedidor']; }?>">
								</div>
							</div>
						</section>

						<h2>Escolaridade</h2>
						<section>    
							<div class="form-group">
								<label class="col-sm-3 control-label">Curso</label>
								<div class="col-sm-8">			     
									   <input type="text" readonly="readonly" name="nomecurso" class="form-control" id="nomecurso" placeholder="" value="<?php echo $resultado2['nomeCurso']; ?>">
								</div>
							</div>   
							  
							<div class="form-group">
								<label class="col-sm-3 control-label">Período</label>
								<div class="col-sm-8">			     
									<input type="text" readonly="readonly" name="periodo" class="form-control" id="periodo" placeholder="" value="<?php echo $resultado3['periodo']; ?>">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-3 control-label">Vigência inicial do Estágio</label>
								<div class="col-sm-8">
									<input type="text" readonly="readonly" name="vigenciaEstagioInicial" class="form-control" id="vigenciaEstagioInicial" placeholder="" value="<?php echo $resultado3['vigenciaEstagioInicial']; ?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-3 control-label">Vigência Final do Estágio</label>
								<div class="col-sm-8">
									<input type="text" readonly="readonly" name="vigenciaEstagioFinal" class="form-control" id="vigenciaEstagioFinal" placeholder="" value="<?php echo $resultado3['vigenciaEstagioFinal']; ?>">
								</div>
							</div>
						</section>
						
						<h2>Dados Bancários</h2>
						<section>
							<?php
							//<div class="form-group">
							//<label class="col-sm-2 control-label">Banco</label>
								//<div class="col-sm-10">
									//<input type="text" name="nomeBanco" class="form-control" id="nomeBanco" placeholder="">
								//</div>
							//</div>
							?>			
						
							<div class="form-group">
								<label class="col-sm-2 control-label">Banco</label>
								<div class="col-sm-10">
									<select id="nomeBanco" name="nomeBanco" class="form-control">
										<option value=""></option>
										<option value="237 - Banco Bradesco S.A.">237 - Banco Bradesco S.A.</option>
										<option value="745 - Banco Citibank S.A.">745 - Banco Citibank S.A.</option>
										<option value="341 - Banco Itaú S.A.">341 - Banco Itaú S.A.</option>
										<option value="001 - Banco do Brasil S.A.">001 - Banco do Brasil S.A.</option>
										<option value="351 - Banco Santander S.A.">351 - Banco Santander S.A.</option>
										<option value="104 - Caixa Econômica Federal.">104 - Caixa Econômica Federal.</option>
										<option value="409 - UNIBANCO S.A.">409 - UNIBANCO S.A.</option>
									</select>
								</div>
							</div>
																											
							<div class="form-group">
								<label class="col-sm-2 control-label">Agência</label>
								<div class="col-sm-10">
									<input type="text" name="numeroAgencia" class="form-control" id="numeroAgencia" placeholder="">
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Conta Corrente</label>
								<div class="col-sm-10">
									<input type="text" name="contaCorrente" class="form-control" id="contaCorrente" placeholder="">
								</div>
							</div>
						</section>
						
						<h2>Endereço</h2>
						<section>
							<div class="form-group">
								<label class="col-sm-2 control-label">Logradouro</label>
								<div class="col-sm-10">
									<input type="text" name="logradouro" class="form-control" id="logradouro" placeholder="" value="<?php if(isset($_SESSION['logradouro'])){ echo $_SESSION['logradouro']; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Número</label>
								<div class="col-sm-10">
									<input type="text" name="numero" class="form-control" id="numero" placeholder="" value="<?php if(isset($_SESSION['numero'])){ echo $_SESSION['numero']; }?>">
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Complemento</label>
								<div class="col-sm-10">
									<input type="text" name="complemento" class="form-control" id="complemento" placeholder="" value="<?php if(isset($_SESSION['complemento'])){ echo $_SESSION['complemento']; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Bairro</label>
								<div class="col-sm-10">
									<input type="text" name="bairro" class="form-control" id="bairro" placeholder="" value="<?php if(isset($_SESSION['bairro'])){ echo $_SESSION['bairro']; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Cidade</label>
								<div class="col-sm-10">
									<input type="text" name="cidade" class="form-control" id="cidade" placeholder="" value="<?php if(isset($_SESSION['cidade'])){ echo $_SESSION['cidade']; }?>">
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">UF</label>
								<div class="col-sm-10">
									<select id="uf" name="uf" class="form-control">
										<option value="AC">AC</option>
										<option value="AL">AL</option>
										<option value="AM">AM</option>
										<option value="AP">AP</option>
										<option value="BA">BA</option>
										<option value="CE">CE</option>
										<option value="DF">DF</option>
										<option value="ES">ES</option>
										<option value="GO">GO</option>
										<option value="MA">MA</option>
										<option value="MG">MG</option>
										<option value="MS">MS</option>
										<option value="MT">MT</option>
										<option value="PA">PA</option>
										<option value="PB">PB</option>
										<option value="PE">PE</option>
										<option value="PI">PI</option>
										<option value="PR">PR</option>
										<option value="RJ">RJ</option>
										<option value="RN">RN</option>
										<option value="RO">RO</option>
										<option value="RR">RR</option>
										<option value="RS">RS</option>
										<option value="SC">SC</option>
										<option value="SE">SE</option>
										<option value="SP">SP</option>
										<option value="TO">TO</option>
									</select>
								</div>
							</div>
							 
							<div class="form-group">
								<label class="col-sm-2 control-label">CEP</label>
								<div class="col-sm-10">
									<input type="text" name="cep" class="form-control" id="cep" placeholder="" value="<?php if(isset($_SESSION['cep'])){ echo $_SESSION['cep']; }?>">
								</div>
							</div>
						</section>
					</div>
				</form> 
			</div>
		</div>
		
		<script src="js/bootstrap.min.js"></script>		
		<script src="js/jquery.maskedinput.js"></script>		
		<script type="text/javascript">		
			$(document).ready(function()
					{
				$("#pessoatelefoneResidencial").mask("(99) 9999-9999");
				 $("#dataNascimento").datepicker({dateFormat: 'yy-mm-dd'});
				 $("#pessoadataNascimento").datepicker({dateFormat: 'yy-mm-dd'});

					$("#cep").mask("99999-999");		
				 
				$("#pessoatelefoneCelular").mask("(99) 9999-9999");			
				
				$("#pessoacpf").mask("999.999.999-99");
						$( "#pessoacpf" ).blur(function() {
							$("#pessoacpf").mask("999.999.999-99");
							if(!validarCPF($("#pessoacpf").val()))
							{
								$("#pessoacpf").val("")
							}
							});

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
	</body>
</html>