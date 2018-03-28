<?php
session_start();
include_once("conexao.php");
include_once("header_usuario.php");
include_once("menu_usuario.php");
?>


<?php 
$id = $_GET['idCandidatura'];

$result = mysqli_query($conectar, "SELECT candidatura.id, candidatura.dataCancelamento, candidatura.dataHomologacao, candidatura.aluno_id, aluno.matricula, aluno.pessoa_id, pessoa.cpf, pessoa.email, pessoa.nome, pessoa.dataNascimento, pessoa.identidade, pessoa.orgaoExpedidor, pessoa.sexo, pessoa.telefoneResidencial, pessoa.telefoneCelular, aluno.curso_id, curso.nome as 'nomeCurso', candidatura.classificacao_id, candidatura.contabancaria_id, contabancaria.nomeBanco, contabancaria.numeroAgencia, contabancaria.contaCorrente, candidatura.dataRealizacao, candidatura.endereco_id, endereco.logradouro, endereco.numero, endereco.complemento, endereco.bairro, endereco.cidade, endereco.uf, endereco.cep, aluno.escolaridade_id, escolaridade.periodo, escolaridade.vigenciaEstagioInicial, escolaridade.vigenciaEstagioFinal, candidatura.estadoCivil_id, estadocivil.descritor, candidatura.responsavel_id, responsavel.cpf AS 'respCpf', responsavel.email as 'respEmail', responsavel.nome as 'respNome', responsavel.dataNascimento as 'respDataNascimento', responsavel.identidade as 'respIdentidade', responsavel.orgaoExpedidor as 'respOrgaoExpedidor', candidatura.situacao, candidatura.tipoAuxilio_id, tipoauxilio.categoria, concat('R$ ', format((SELECT SUM(renda.totalRenda) FROM itemrenda renda WHERE renda.candidatura_id = candidatura.id), 2)) as 'totalRenda' FROM candidatura candidatura, aluno aluno, pessoa pessoa, contabancaria contabancaria, endereco endereco, escolaridade escolaridade, estadocivil estadocivil, responsavel responsavel, tipoauxilio tipoauxilio, curso curso WHERE candidatura.aluno_id = aluno.id AND aluno.pessoa_id = pessoa.id AND candidatura.contaBancaria_id = contabancaria.id AND candidatura.endereco_id = endereco.id and aluno.escolaridade_id = escolaridade.id AND candidatura.estadoCivil_id = estadocivil.id and candidatura.responsavel_id = responsavel.id AND tipoauxilio.id = candidatura.tipoAuxilio_id AND aluno.curso_id = curso.id AND candidatura.id = '$id' LIMIT 1");
$resultado = mysqli_fetch_assoc($result);

$resultado2 = mysqli_query($conectar,"SELECT itemRenda.id,itemRenda.nome,itemRenda.dataNascimento,grauparentesco.parentesco,vinculotrabalhista.ocupacao,itemRenda.candidatura_id, concat('R$ ', format(totalRenda, 2)) as totalRenda  FROM itemRenda itemRenda, grauparentesco grauparentesco, vinculotrabalhista vinculotrabalhista WHERE itemRenda.grauParentesco_id = grauparentesco.id and itemRenda.vinculoTrabalhista_id =  vinculotrabalhista.id AND candidatura_id = '$id' ORDER BY 'id'");
$linhas2 =mysqli_num_rows($resultado2);
?>
<br>
<br>
	
<div class="container theme-showcase" role="main">
	<div class="page-header">
		<h1>Cadastro Finalizado com sucesso.</h1>
		<h2>Acompanhe a sua candiduta buscando sua matrícula na página principal.</h2>
	</div>
	<div class="row">
		<div class="pull-right">
		<?php if($resultado['situacao'] != "Cancelado"){?>
			<a href="processa/proc_cancelarCandidatura.php?id=<?php echo $id;?>"><button type='button' class='btn btn-danger'>Cancelar Candidatura</button></a>
		<?php }?>
		<a href='index.php'><button type='button' class='btn btn-info'>Retornar para Página Principal</button></a>			
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">        
			<fieldset>
				<legend>Dados Pessoais</legend>
				<form class="form-horizontal" method = "POST" action="">
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Matrícula</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="matricula" placeholder="" value = "<?php echo $resultado['matricula'];?>">
						</div>
						
						<label for="inputEmail3" class="col-sm-2 control-label">CPF</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="cpf" placeholder="" value = "<?php echo $resultado['cpf'];?>">
						</div>
					</div>
				  
					<div class="form-group">
						<label class="col-sm-2 control-label">Tipo de Auxílio</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" name="tipoAuxilio" class="form-control" id="tipoAuxilio" placeholder="" value="<?php echo $resultado['categoria'];?>">
						</div>
					
						<label for="inputEmail3" class="col-sm-2 control-label">Data Realização</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="dataRealizacao" placeholder="" value = "<?php echo $resultado['dataRealizacao'];?>">
						</div>
					</div>
				  
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Situação</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="situacao" placeholder="" value = "<?php echo $resultado['situacao'];?>">
						</div>
				  
						<?php if($resultado['dataHomologacao'] != "" && $resultado['dataHomologacao'] != "0000-00-00"){?>
						<label for="inputEmail3" class="col-sm-2 control-label">Data Homologação</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="situacao" placeholder="" value="<?php echo $resultado['dataHomologacao'];?>" />
						</div>
					
						<?php }
						if($resultado['dataCancelamento'] != "" && $resultado['dataCancelamento'] != "0000-00-00"){?>
						<label for="inputEmail3" class="col-sm-2 control-label">Data Cancelamento</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="dataCancelamento" placeholder="" value="<?php echo $resultado['dataCancelamento'];?>" />
						</div>
						<?php }?>
					</div>
				  
							  
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-10">
						  <input type="text" readonly="readonly" class="form-control" name="nome" placeholder="" value = "<?php echo $resultado['nome'];?>">
						</div>
					</div>
				  
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Renda Total</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="rendaTotal" placeholder="" value = "<?php echo $resultado['totalRenda'];?>">
						</div>
					
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
							<input type="email" readonly="readonly"  class="form-control" name="email" placeholder="" value = "<?php echo $resultado['email'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Data de Nascimento</label>
						<div class="col-sm-2">
						  <input type="text" readonly="readonly" class="form-control" name="dataNascimento" placeholder="" value = "<?php echo $resultado['dataNascimento'];?>">
						</div>

						<label for="inputEmail3" class="col-sm-2 control-label">Sexo</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" class="form-control" name="sexo" placeholder="" value = "<?php echo $resultado['sexo'];?>">
						</div>
					 
						<label class="col-sm-2 control-label">Estado Civil</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="estadoCivil" class="form-control" id="estadoCivil" placeholder="" value="<?php echo $resultado['descritor'];?>">
						</div>
					</div>
				  
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Identidade</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="identidade" placeholder="" value = "<?php echo $resultado['identidade'];?>">
						</div>
					
						<label for="inputEmail3" class="col-sm-2 control-label">Orgão Expedidor</label>
						<div class="col-sm-4">
						  <input type="text" readonly="readonly" class="form-control" name="orgaoExpedidor" placeholder="" value = "<?php echo $resultado['orgaoExpedidor'];?>">
						</div>
					</div>
					   
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Telefone Residencial</label>
						<div class="col-sm-4">
						  <input type="text" readonly="readonly" class="form-control" name="telefoneResidencial" placeholder="" value = "<?php echo $resultado['telefoneResidencial'];?>">
						</div>
					
						<label for="inputEmail3" class="col-sm-2 control-label">Telefone Celular</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" class="form-control" name="telefoneCelular" placeholder="" value = "<?php echo $resultado['telefoneCelular'];?>">
						</div>
					</div>		  
				</form>
			</fieldset>
			
			</br>
			
			<fieldset>
				<legend>Responsável</legend>
				<form class="form-horizontal" method = "POST" action="">
					<div class="form-group">
						<label class="col-sm-2 control-label">Nome</label>
						<div class="col-sm-10">
							<input type="text" readonly="readonly" name="respnome" class="form-control" id="respnome" placeholder="" value="<?php echo $resultado['respNome'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 control-label">CPF</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" name="respcpf" class="form-control" id="respcpf" placeholder="" value="<?php echo $resultado['respCpf'];?>">
						</div>
					
						<label class="col-sm-2 control-label">Email</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" name="respemail" class="form-control" id="respemail" placeholder="" value="<?php echo $resultado['respEmail'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Data de Nascimento</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="respdataNascimento" class="form-control" id="respdataNascimento" placeholder="" value="<?php echo $resultado['respDataNascimento'];?>">
						</div>
					
						<label class="col-sm-2 control-label">Identidade</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="respidentidade" class="form-control" id="respidentidade" placeholder="" value="<?php echo $resultado['respIdentidade'];?>">
						</div>
					
						<label class="col-sm-2 control-label">Orgão Expedidor</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="resporgaoExpedidor" class="form-control" id="resporgaoExpedidor" placeholder="" value="<?php echo $resultado['respOrgaoExpedidor'];?>">
						</div>
					</div>
				</form>
			</fieldset>
				
			<br>
				
			<fieldset>
				<legend>Escolaridade</legend>
					 <form class="form-horizontal" method = "POST" action="">
						<div class="form-group">
							<label class="col-sm-2 control-label">Curso</label>
							<div class="col-sm-4">
								<input type="text" readonly="readonly" name="nomeCurso" class="form-control" id="nomeCurso" placeholder="" value="<?php echo $resultado['nomeCurso'];?>">
							</div>
						
							<label class="col-sm-3 control-label">Período</label>
							<div class="col-sm-3">
								<input type="text" readonly="readonly" name="periodo" class="form-control" id="periodo" placeholder="" value="<?php echo $resultado['periodo'];?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-sm-3 control-label">Vigência Inicial do Estágio</label>
							<div class="col-sm-3">
								<input type="text" readonly="readonly" name="vigenciaEstagioInicial" class="form-control" id="vigenciaEstagioInicial" placeholder="" value="<?php echo $resultado['vigenciaEstagioInicial'];?>">
							</div>
						
							<label class="col-sm-3 control-label">Vigência Final do Estágio</label>
							<div class="col-sm-3">
								<input type="text" readonly="readonly" name="vigenciaEstagioFinal" class="form-control" id="vigenciaEstagioFinal" placeholder="" value="<?php echo $resultado['vigenciaEstagioFinal'];?>">
						</div>
					</div>
				</form>
			</fieldset>
				
			<br>
				
			<fieldset>
				<legend>Dados Bancários</legend>
				<form class="form-horizontal" method = "POST" action="">
					<div class="form-group">
						<label class="col-sm-2 control-label">Banco</label>
						<div class="col-sm-10">
							<input type="text" readonly="readonly" name="nomeBanco" class="form-control" id="nomeBanco" placeholder="" value="<?php echo $resultado['nomeBanco'];?>">
						</div>
					</div>
												
					<div class="form-group">
						<label class="col-sm-2 control-label">Agência</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" name="numeroAgencia" class="form-control" id="numeroAgencia" placeholder="" value="<?php echo $resultado['numeroAgencia'];?>">
						</div>
					
						<label class="col-sm-2 control-label">Conta Corrente</label>
						<div class="col-sm-4">
							<input type="text" readonly="readonly" name="contaCorrente" class="form-control" id="contaCorrente" placeholder="" value="<?php echo $resultado['contaCorrente'];?>">
						</div>
					</div>
				</form>
			</fieldset>
				
			<br>
				
			<fieldset>
				<legend>Endereço</legend>
				<form class="form-horizontal" method = "POST" action="">
					<div class="form-group">
						<label class="col-sm-2 control-label">Logradouro</label>
						<div class="col-sm-10">
							<input type="text" readonly="readonly" name="logradouro" class="form-control" id="logradouro" placeholder="" value="<?php echo $resultado['logradouro'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Número</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="numero" class="form-control" id="numero" placeholder="" value="<?php echo $resultado['numero'];?>">
						</div>
					
						<label class="col-sm-2 control-label">Complemento</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="complemento" class="form-control" id="complemento" placeholder="" value="<?php echo $resultado['complemento'];?>">
						</div>
					
						<label class="col-sm-2 control-label">Bairro</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="bairro" class="form-control" id="bairro" placeholder="" value="<?php echo $resultado['bairro'];?>">
						</div>
					</div>

					<div class="form-group">
						<label class="col-sm-2 control-label">Cidade</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="cidade" class="form-control" id="cidade" placeholder="" value="<?php echo $resultado['cidade'];?>">
						</div>
					
						<label class="col-sm-2 control-label">UF</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="uf" class="form-control" id="uf" placeholder="" value="<?php echo $resultado['uf'];?>">
						</div>
					
						<label class="col-sm-2 control-label">CEP</label>
						<div class="col-sm-2">
							<input type="text" readonly="readonly" name="cep" class="form-control" id="cep" placeholder="" value="<?php echo $resultado['cep'];?>">
						</div>
					</div>
				</form>
			</fieldset>
				
			</br>
				
			<fieldset>
				<legend>Renda Bruta Familiar</legend>
				<form class="form-horizontal" method = "POST" action="">
					<div class="row">
						<div class="col-md-12">
							<table class="table">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Nascimento</th>
										<th>Grau de Parentesco</th>
										<th>Vínculo Trabalhista</th>
										<th>Total da Renda</th>
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
									}?>
								</tbody>
							</table>
						</div>
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</div>

<?php 
include_once("footer_usuario.php");
?>
