<?php
session_start();
ob_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php
$id = $_GET['idCandidatura'];

$result = mysqli_query($conectar, "SELECT candidatura.id, candidatura.dataCancelamento, candidatura.dataHomologacao, candidatura.aluno_id, aluno.matricula, aluno.pessoa_id, pessoa.cpf, pessoa.email, pessoa.nome, pessoa.dataNascimento, pessoa.identidade, pessoa.orgaoExpedidor, pessoa.sexo, pessoa.telefoneResidencial, pessoa.telefoneCelular, aluno.curso_id, curso.nome as 'nomeCurso', candidatura.classificacao_id, candidatura.contabancaria_id, contabancaria.nomeBanco, contabancaria.numeroAgencia, contabancaria.contaCorrente, candidatura.dataRealizacao, candidatura.endereco_id, endereco.logradouro, endereco.numero, endereco.complemento, endereco.bairro, endereco.cidade, endereco.uf, endereco.cep, aluno.escolaridade_id, escolaridade.periodo, escolaridade.vigenciaEstagioInicial, escolaridade.vigenciaEstagioFinal, candidatura.justificativa_id, justificativa.justificativa, candidatura.estadoCivil_id, estadocivil.descritor, candidatura.responsavel_id, responsavel.cpf AS 'respCpf', responsavel.email as 'respEmail', responsavel.nome as 'respNome', responsavel.dataNascimento as 'respDataNascimento', responsavel.identidade as 'respIdentidade', responsavel.orgaoExpedidor as 'respOrgaoExpedidor', candidatura.situacao, candidatura.tipoAuxilio_id, tipoauxilio.categoria, concat('R$ ', format((SELECT SUM(renda.totalRenda) FROM itemrenda renda WHERE renda.candidatura_id = candidatura.id), 2)) as 'totalRenda' FROM candidatura candidatura, aluno aluno, pessoa pessoa, contabancaria contabancaria, endereco endereco, escolaridade escolaridade, justificativa justificativa, estadocivil estadocivil, responsavel responsavel, tipoauxilio tipoauxilio, curso curso WHERE candidatura.aluno_id = aluno.id AND aluno.pessoa_id = pessoa.id AND candidatura.contaBancaria_id = contabancaria.id AND candidatura.endereco_id = endereco.id AND candidatura.justificativa_id = justificativa.id AND aluno.escolaridade_id = escolaridade.id AND candidatura.estadoCivil_id = estadocivil.id and candidatura.responsavel_id = responsavel.id AND tipoauxilio.id = candidatura.tipoAuxilio_id AND aluno.curso_id = curso.id AND candidatura.id = '$id' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);

$resultado2 = mysqli_query($conectar,"SELECT itemRenda.id,itemRenda.nome,itemRenda.dataNascimento,grauparentesco.parentesco,vinculotrabalhista.ocupacao,itemRenda.candidatura_id, concat('R$ ', format(itemRenda.totalRenda, 2)) as totalRenda  FROM itemRenda itemRenda, grauparentesco grauparentesco, vinculotrabalhista vinculotrabalhista WHERE itemrenda.grauParentesco_id = grauparentesco.id and vinculotrabalhista.id = itemrenda.vinculoTrabalhista_id AND candidatura_id = '$id' ORDER BY 'id'");
$linhas2 =mysqli_num_rows($resultado2);

	
if($_SERVER['REQUEST_METHOD']=='POST'){
	if(isset($_SESSION['ultima_request']) && $_SESSION['ultima_request'] == $request){?>
		<div class="alert alert-danger" role="alert">Usuário inserido!</div>
	<?php }elseif(!isset($_SESSION['ultimo_id_aluno'])){
		$_SESSION['ultima_request'] = $request;

		$ultimo_id_aluno = $resultado['aluno_id'];

		$pessoaId 					= $resultado['pessoa_id'];
		$pessoacpf 					= $_POST['cpf'];
		$pessoaemail 				= $_POST['email'];
		$pessoanome 				= $_POST['nome'];
		$pessoadataNascimento 		= $_POST['dataNascimento'];
		$pessoaidentidade 			= $_POST['identidade'];
		$pessoaorgaoExpedidor 		= $_POST['orgaoExpedidor'];
		$pessoasexo					= $_POST['sexo'];
		$pessoatelefoneResidencial 	= $_POST['telefoneResidencial'];
		$pessoatelefoneCelular 		= $_POST['telefoneCelular'];
		$result_pessoa = " UPDATE pessoa SET cpf = '$pessoacpf', email = '$pessoaemail', nome = '$pessoanome', dataNascimento = '$pessoadataNascimento', identidade = '$pessoaidentidade', orgaoExpedidor = '$pessoaorgaoExpedidor', sexo = '$pessoasexo', telefoneResidencial = '$pessoatelefoneResidencial', telefoneCelular = '$pessoatelefoneCelular' WHERE id = '$pessoaId'"; 
		$resultado_pessoa = mysqli_query($conectar, $result_pessoa);

		
		$responsavel_id			= $resultado['responsavel_id'];
		$cpf 					= $_POST['respCpf'];
		$nome 					= $_POST['respNome'];
		$email 					= $_POST['respEmail'];
		$identidade 			= $_POST['respIdentidade'];
		$orgaoExpedidor 		= $_POST['respOrgaoExpedidor'];
		$respdataNascimento 	= $_POST['respdataNascimento'];
		$result_responsavel = " UPDATE responsavel SET cpf = '$cpf', nome = '$nome', dataNascimento = '$respdataNascimento', email = '$email', identidade = '$identidade', orgaoExpedidor = '$orgaoExpedidor' WHERE id = '$responsavel_id'";
		$resultado_responsavel = mysqli_query($conectar, $result_responsavel);
		
		
		$curso_id				= $resultado['responsavel_id'];
		$nome					= $_POST['nomeCurso'];
		$result_curso = "UPDATE curso SET nome = '$nomeCurso' where id = '$curso_id'";					
		$resultado_curso = mysqli_query($conectar, $result_curso);

		
		$escolaridade_id		= $resultado['escolaridade_id'];
		$periodo 				= $_POST['periodo'];					
		$vigenciaEstagioInicial = $_POST['vigenciaEstagioInicial'];
		$vigenciaEstagioFinal 	= $_POST['vigenciaEstagioFinal'];
		$result_escolaridade = "UPDATE escolaridade SET periodo = '$periodo', vigenciaEstagioInicial = '$vigenciaEstagioInicial', vigenciaEstagioFinal = '$vigenciaEstagioFinal' where id = '$escolaridade_id'";					
		$resultado_escolaridade = mysqli_query($conectar, $result_escolaridade);
		
		
		$endereco_id			= $resultado['endereco_id'];
		$logradouro 			= $_POST['logradouro'];
		$numero		 			= $_POST['numero'];
		$complemento 			= $_POST['complemento'];
		$bairro					= $_POST['bairro'];
		$cidade					= $_POST['cidade'];
		$uf 					= $_POST['uf'];
		$cep					= $_POST['cep'];
		$result_endereco = "UPDATE endereco SET logradouro = '$logradouro', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade', uf = '$uf', cep = '$cep' where id = '$endereco_id'";					
		$resultado_endereco = mysqli_query($conectar, $result_endereco);

		
		$contabancaria_id	= $resultado['contabancaria_id'];
		$nomeBanco 			= $_POST['nomeBanco'];
		$numeroAgencia		= $_POST['numeroAgencia'];
		$contaCorrente		= $_POST['contaCorrente'];
		$result_contaBancaria = "UPDATE contabancaria SET nomeBanco = '$nomeBanco', numeroAgencia = '$numeroAgencia', contaCorrente = '$contaCorrente' where id = '$contabancaria_id'";					
		$resultado_contaBancaria = mysqli_query($conectar, $result_contaBancaria);					

		
		$situacao				=$_POST['situacao'];
		$estadoCivil_id			=$_POST['estadoCivil_id'];
		$result_candidatura = "UPDATE candidatura SET dataHomologacao = now(), situacao = '$situacao', estadoCivil_id = '$estadoCivil_id' where id = '$id'";
		$resultado_candidatura = mysqli_query($conectar, $result_candidatura);

		header('Location: listar_candidatos_retificacao.php');	
	}
} ?>

<br>

<form class="form-horizontal" action="" method="POST">
	<div class="container theme-showcase" role="main">

		<br>
		<br>

		<div class="page-header">
			<h1>Realizar Atualização</h1>
		</div>
	<div class="row">
		<div class="pull-right">
			<a href='listar_candidatos_retificacao.php'><button type='button' class='btn btn-info'>Retornar</button></a>						
		</div>
	</div>
	
	<br>
  
	<div class="row">
		<div class="col-md-12">        
			<fieldset>
				<legend>Dados Pessoais</legend>		
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Matrícula</label>
					<div class="col-sm-4">
						<input type="text"  readonly="readonly" class="form-control" name="matricula" placeholder="" value = "<?php echo $resultado['matricula'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly" class="form-control" id="cpf" name="cpf" placeholder="" value = "<?php echo $resultado['cpf'];?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Tipo de Auxilio</label>
					<div class="col-sm-4">
						<input type="text" readonly="readonly" class="form-control"  placeholder="" value = "<?php echo $resultado['categoria'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Data Realização</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="dataRealizacao" placeholder="" value = "<?php echo $resultado['dataRealizacao'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Situação</label>
					<div class="col-sm-4">
						<select class="form-control selectpicker" name="situacao">
							  <option value="Pendente" <?php if($resultado['situacao'] == "Pendente") echo "selected"; ?>>Pendente</option>
							  <option value="Homologado" <?php if($resultado['situacao'] == "Homologado") echo "selected"; ?>>Homologado</option>
							  <option value="Não Homologado" <?php if($resultado['situacao'] == "Não Homologado") echo "selected"; ?>>Não Homologado</option>
							  <option value="Em Análise" <?php if($resultado['situacao'] == "Em Análise") echo "selected"; ?>>Em Análise</option>
							  <option value="Cancelado" <?php if($resultado['situacao'] == "Cancelado") echo "selected"; ?>>Cancelado</option>
						</select>
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Data Homologação</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="dataHomologacao" name=dataHomologacao placeholder="" value="<?php echo $resultado['dataHomologacao'];?>" />
					</div>
				</div>
			  							  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text"  readonly="readonly" class="form-control" name="nome" placeholder="" value = "<?php echo $resultado['nome'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Renda Total</label>
					<div class="col-sm-4">
						<input type="text"  readonly="readonly" class="form-control" name="rendaTotal" placeholder="" value = "<?php echo $resultado['totalRenda'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="email" readonly="readonly" class="form-control" name="email" placeholder="" value = "<?php echo $resultado['email'];?>">
					</div>
				</div>
				
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Data de Nascimento</label>
					<div class="col-sm-2">
						<input type="text" readonly="readonly" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="" value = "<?php echo $resultado['dataNascimento'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
					<div class="col-sm-2">
						<input type="text" readonly="readonly" class="form-control" name="sexo" placeholder="" value = "<?php echo $resultado['sexo'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Estado Civil</label>
					<div class="col-sm-2"><?php $result_estadoCivil_2 = mysqli_query($conectar,"SELECT id, descritor FROM estadoCivil");?>
						<select id="estadoCivil_id"  class="form-control" name="estadoCivil_id"><?php foreach($result_estadoCivil_2 as $restadoCivil_2): ?>
							<option <?php if($resultado['estadoCivil_id'] == $restadoCivil_2['id']) echo "selected"; ?> value=" <?php echo $restadoCivil_2['id'];?> "><?php  echo $restadoCivil_2['descritor'];?>
							</option><?php endforeach;?>
						</select>
					</div>
				</div>
			
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Identidade</label>
					<div class="col-sm-4">
						<input type="text"  readonly="readonly"   class="form-control" name="identidade" placeholder="" value = "<?php echo $resultado['identidade'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Orgão Expedidor</label>
					<div class="col-sm-4">
						<input type="text"  readonly="readonly" class="form-control" name="orgaoExpedidor" placeholder="" value = "<?php echo $resultado['orgaoExpedidor'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Residencial</label>
					<div class="col-sm-4">
						<input type="text"  readonly="readonly" class="form-control" name="telefoneResidencial" id="telefoneResidencial" placeholder="" value = "<?php echo $resultado['telefoneResidencial'];?>">
					</div>
				
					<label for="inputEmail3" class="col-sm-2 control-label">Telefone Celular</label>
					<div class="col-sm-4">
						<input type="text"  readonly="readonly" class="form-control" name="telefoneCelular" id="telefoneCelular" placeholder="" value = "<?php echo $resultado['telefoneCelular'];?>">
					</div>
				</div>
			</fieldset>

			<br>

			<fieldset>
				<legend>Responsável</legend>
				
				<div class="form-group">
					<label class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text"   name="respNome" class="form-control" id="respNome" placeholder="" value="<?php echo $resultado['respNome'];?>">
					</div>
				</div>
						
				<div class="form-group">
					<label class="col-sm-2 control-label">CPF</label>
					<div class="col-sm-4">
						<input type="text"   name="respCpf" class="form-control" id="respCpf" placeholder="" value="<?php echo $resultado['respCpf'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="text"   name="respEmail" class="form-control" id="respEmail" placeholder="" value="<?php echo $resultado['respEmail'];?>">
					</div>
				</div>
	
				<div class="form-group">
					<label class="col-sm-2 control-label">Data de Nascimento</label>
					<div class="col-sm-2">
						<input type="text"   name="respdataNascimento" class="form-control" id="respdataNascimento" placeholder="" value="<?php echo $resultado['respDataNascimento'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Identidade</label>
					<div class="col-sm-2">
						<input type="text"   name="respIdentidade" class="form-control" id="respIdentidade" placeholder="" value="<?php echo $resultado['respIdentidade'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Orgão Expedidor</label>
					<div class="col-sm-2">
						<input type="text"   name="respOrgaoExpedidor" class="form-control" id="respOrgaoExpedidor" placeholder="" value="<?php echo $resultado['respOrgaoExpedidor'];?>">
					</div>
				</div>
			</fieldset>
			
			<br>

			<fieldset>
				<legend>Escolaridade</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">Curso</label>
					<div class="col-sm-5">
						<input type="text" readonly="readonly" name="nomeCurso" class="form-control" id="nomeCurso" placeholder="" value="<?php echo $resultado['nomeCurso'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Período</label>
					<div class="col-sm-3">
						<select  id="periodo"  readonly="readonly"  name="periodo" class="form-control">  
							<option value="1" <?php if($resultado['periodo'] == "1") echo "selected"; ?>>1º</option>
							<option value="2" <?php if($resultado['periodo'] == "2") echo "selected"; ?>>2º</option>
							<option value="3" <?php if($resultado['periodo'] == "3") echo "selected"; ?>>3º</option>
							<option value="4" <?php if($resultado['periodo'] == "4") echo "selected"; ?>>4º</option>
							<option value="5" <?php if($resultado['periodo'] == "5") echo "selected"; ?>>5º</option>
							<option value="6" <?php if($resultado['periodo'] == "6") echo "selected"; ?>>6º</option>
							<option value="7" <?php if($resultado['periodo'] == "7") echo "selected"; ?>>7º</option>
							<option value="8" <?php if($resultado['periodo'] == "8") echo "selected"; ?>>8º</option>
							<option value="9" <?php if($resultado['periodo'] == "9") echo "selected"; ?>>9º</option>
							<option value="10" <?php if($resultado['periodo'] == "10") echo "selected"; ?>>10º</option>
						</select>
					</div>					
				</div>

				<div class="form-group">
					<label class="col-sm-3 control-label">Vigência Inicial do Estágio</label>
					<div class="col-sm-3">
						<input type="text"  readonly="readonly"   name="vigenciaEstagioInicial" class="form-control" id="vigenciaEstagioInicial" placeholder="" value="<?php echo $resultado['vigenciaEstagioInicial'];?>">
					</div>
				
					<label class="col-sm-3 control-label">Vigência Final do Estágio</label>
					<div class="col-sm-3">
						<input type="text"  readonly="readonly"   name="vigenciaEstagioFinal" class="form-control" id="vigenciaEstagioFinal" placeholder="" value="<?php echo $resultado['vigenciaEstagioFinal'];?>">
					</div>
				</div>
			</fieldset>
			<br>

			<fieldset>
				<legend>Dados Bancários</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">Banco</label>
					<div class="col-sm-10">
						<select id="nomeBanco"  name="nomeBanco" class="form-control">
							<option value="237 - Banco Bradesco S.A."><?php if($resultado['nomeBanco'] == "237 - Banco Bradesco S.A.") echo "selected"; ?>237 - Banco Bradesco S.A.</option>
							<option value="745 - Banco Citibank S.A."><?php if($resultado['nomeBanco'] == "745 - Banco Citibank S.A.") echo "selected"; ?>745 - Banco Citibank S.A.</option>
							<option value="341 - Banco Itaú S.A."><?php if($resultado['nomeBanco'] == "341 - Banco Itaú S.A.") echo "selected"; ?>341 - Banco Itaú S.A.</option>
							<option value="001 - Banco do Brasil S.A."><?php if($resultado['nomeBanco'] == "Banco do Brasil S.A.") echo "selected"; ?>001 - Banco do Brasil S.A.</option>
							<option value="351 - Banco Santander S.A."><?php if($resultado['nomeBanco'] == "351 - Banco Santander S.A.") echo "selected"; ?>351 - Banco Santander S.A.</option>
							<option value="104 - Caixa Econômica Federal."><?php if($resultado['nomeBanco'] == "104 - Caixa Econômica Federal.") echo "selected"; ?>104 - Caixa Econômica Federal.</option>
							<option value="409 - UNIBANCO S.A."><?php if($resultado['nomeBanco'] == "409 - UNIBANCO S.A.") echo "selected"; ?>409 - UNIBANCO S.A.</option>
						</select>
					</div>
				</div>
																	
				<div class="form-group">
					<label class="col-sm-2 control-label">Agência</label>
					<div class="col-sm-4">
						<input type="text"   name="numeroAgencia" class="form-control" id="numeroAgencia" placeholder="" value="<?php echo $resultado['numeroAgencia'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Conta Corrente</label>
					<div class="col-sm-4">
						<input type="text"   name="contaCorrente" class="form-control" id="contaCorrente" placeholder="" value="<?php echo $resultado['contaCorrente'];?>">
					</div>
				</div>
			</fieldset>
		
			<br>
			
			<fieldset>
				<legend>Endereço</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">Logradouro</label>
					<div class="col-sm-10">
						<input type="text"   name="logradouro" class="form-control" id="logradouro" placeholder="" value="<?php echo $resultado['logradouro'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Número</label>
					<div class="col-sm-2">
						<input type="text"  name="numero" class="form-control" id="numero" placeholder="" value="<?php echo $resultado['numero'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Complemento</label>
					<div class="col-sm-2">
						<input type="text" name="complemento" class="form-control" id="complemento" placeholder="" value="<?php echo $resultado['complemento'];?>">
					</div>
				
					<label class="col-sm-2 control-label">Bairro</label>
					<div class="col-sm-2">
						<input type="text" name="bairro" class="form-control" id="bairro" placeholder="" value="<?php echo $resultado['bairro'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-sm-2 control-label">Cidade</label>
					<div class="col-sm-2">
						<input type="text"  name="cidade" class="form-control" id="cidade" placeholder="" value="<?php echo $resultado['cidade'];?>">
					</div>
				
					<label class="col-sm-2 control-label">UF</label>
					<div class="col-sm-2">
						<select id="uf" name="uf" class="form-control">
							<option value="AC" <?php if($resultado['uf'] == "AC") echo "selected"; ?>>AC</option>
							<option value="AL" <?php if($resultado['uf'] == "AL") echo "selected"; ?>>AL</option>
							<option value="AM" <?php if($resultado['uf'] == "AM") echo "selected"; ?>>AM</option>
							<option value="AP" <?php if($resultado['uf'] == "AP") echo "selected"; ?>>AP</option>
							<option value="BA" <?php if($resultado['uf'] == "BA") echo "selected"; ?>>BA</option>
							<option value="CE" <?php if($resultado['uf'] == "CE") echo "selected"; ?>>CE</option>
							<option value="DF" <?php if($resultado['uf'] == "DF") echo "selected"; ?>>DF</option>
							<option value="ES" <?php if($resultado['uf'] == "ES") echo "selected"; ?>>ES</option>
							<option value="GO" <?php if($resultado['uf'] == "GO") echo "selected"; ?>>GO</option>
							<option value="MA" <?php if($resultado['uf'] == "MA") echo "selected"; ?>>MA</option>
							<option value="MG" <?php if($resultado['uf'] == "MG") echo "selected"; ?>>MG</option>
							<option value="MS" <?php if($resultado['uf'] == "MS") echo "selected"; ?>>MS</option>
							<option value="MT" <?php if($resultado['uf'] == "MT") echo "selected"; ?>>MT</option>
							<option value="PA" <?php if($resultado['uf'] == "PA") echo "selected"; ?>>PA</option>
							<option value="PB" <?php if($resultado['uf'] == "PB") echo "selected"; ?>>PB</option>
							<option value="PE" <?php if($resultado['uf'] == "PE") echo "selected"; ?>>PE</option>
							<option value="PI" <?php if($resultado['uf'] == "PI") echo "selected"; ?>>PI</option>
							<option value="PR" <?php if($resultado['uf'] == "PR") echo "selected"; ?>>PR</option>
							<option value="RJ" <?php if($resultado['uf'] == "RJ") echo "selected"; ?>>RJ</option>
							<option value="RN" <?php if($resultado['uf'] == "RN") echo "selected"; ?>>RN</option>
							<option value="RO" <?php if($resultado['uf'] == "RO") echo "selected"; ?>>RO</option>
							<option value="RR" <?php if($resultado['uf'] == "RR") echo "selected"; ?>>RR</option>
							<option value="RS" <?php if($resultado['uf'] == "RS") echo "selected"; ?>>RS</option>
							<option value="SC" <?php if($resultado['uf'] == "SC") echo "selected"; ?>>SC</option>
							<option value="SE" <?php if($resultado['uf'] == "SE") echo "selected"; ?>>SE</option>
							<option value="SP" <?php if($resultado['uf'] == "SP") echo "selected"; ?>>SP</option>
							<option value="TO" <?php if($resultado['uf'] == "TO") echo "selected"; ?>>TO</option>
						</select>                                                                           
					</div>
				
					<label class="col-sm-2 control-label">CEP</label>
					<div class="col-sm-2">
						<input type="text"  name="cep" class="form-control" id="cep" placeholder="" value="<?php echo $resultado['cep'];?>">
					</div>
				</div>
			</fieldset>
		
			<br>

			<fieldset>
				<legend>Renda Bruta Familiar - Total <?php echo $resultado['totalRenda'];?></legend>
				<div class="row">
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>Nome</th>
									<th>Dascimento</th>
									<th>Grau de Parentesco</th>
									<th>Vínculo Trabalhista</th>
									<th>Renda</th>
								</tr>
							</thead>
							<tbody>
								<?php while($linhas2 = mysqli_fetch_array($resultado2)){
									echo "<tr>";
									echo "<td>".$linhas2['nome']."</td>";
									echo "<td>".$linhas2['dataNascimento']."</td>";
									echo "<td>".$linhas2['parentesco']."</td>";
									echo "<td>".$linhas2['ocupacao']."</td>";
									echo "<td>".$linhas2['totalRenda']."</td>";
									echo "</tr>";
								} ?>
							</tbody>
						</table>
					</div>
					
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success">Atualizar</button>
						</div>
					</div>
				</div>	
			</fieldset>
		</div>
	</div>
</form>

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
		 $("#respdataNascimento").datepicker({dateFormat: 'yy-mm-dd'});
		 $("#vigenciaEstagioInicial").datepicker({dateFormat: 'yy-mm-dd'});
		 $("#vigenciaEstagioFinal").datepicker({dateFormat: 'yy-mm-dd'});
		 $("#cep").mask("99999-999");
		 
			
		
		$("#respCpf").mask("999.999.999-99");
				$( "#respCpf" ).blur(function() {
					$("#respCpf").mask("999.999.999-99");
					if(!validarCPF($("#respCpf").val()))
					{
						$("#respCpf").val("")
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
