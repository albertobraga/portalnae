<!-- Inicio navbar -->
<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="administrativo.php">Portal CAE</a>
		</div>
		
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				
			
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Abertura do Edital<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cad_editalselecao.php">Edital</a></li>
						<li><a href="cad_fase.php">Fases</a></li>
						<li><a href="cad_bolsaEdital.php">Bolsas de Auxílio</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="listar_editalselecao.php">Listar Editais</a></li>
						<li><a href="listar_fase.php">Listar Fases</a></li>
						<li><a href="listar_bolsaEdital.php">Listar Bolsas de Auxílios</a></li>

					</ul>
				</li>
							
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Realização Homologação<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="listar_candidatos_retificacao.php">Atualizar Candidatura</a></li>
						<li><a href="listar_candidatos_homologacao.php">Homologar Candidatura</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="listar_candidatos.php">Listar Candidatos</a></li>
					</ul>
				</li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Distribuição de Auxílios<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="ResumoCandidatos.php">Distribuir Auxílios</a></li>
						<li role="separator" class="divider"></li>
						<li><a href="listar_classificados.php">Listar Classificados</a></li>
					</ul>
				</li>
				
			<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Outros Parâmetros<span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="listar_estadoCivil.php">Estado Civis</a></li>
						<li><a href="listar_unidade.php">Unidades</a></li>
						<li><a href="listar_curso.php">Cursos</a></li>
						<li><a href="listar_aluno.php">Alunos</a></li>
						<li><a href="listar_tipoAuxilio.php">Auxílios</a></li>
						<li><a href="listar_vinculotrabalhista.php">Vinculo Trabalhista</a></li>
						<li><a href="listar_grauparentesco.php">Grau Parentesco</a></li>	
						<li><a href="listar_justificativa.php">Justificativa Homologação</a></li>
						<li><a href="listar_candidatos_homologacao_todos.php">Re-homologar Candidaturas</a></li>
						<li><a href="listar_classificados_distribuicao_todos.php">Redistribuir Bolsas</a></li>
					</ul>
				</li>
				
				<li><a href="sair.php">Sair</a></li>
			</ul>
		</div>
	</div>
</nav>
