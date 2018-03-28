<?php
include_once("conexao.php");
header("Content-Type: text/html;  charset=ISO-8859-1",true);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>PORTAL CAE</title>

		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
		<link href="jumbotron.css" rel="stylesheet">
		<script src="js/ie-emulation-modes-warning.js"></script>
	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" style="text-align: top;" href="#">Área administrativa</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<form class="navbar-form navbar-right" method="POST" action="adm/valida_login.php">           
						<div class="form-group">
							<input type="text" placeholder="Usuário" class="form-control" name="usuario" required autofocus>
						</div>
						
						<div class="form-group">
							<input type="password" placeholder="Senha" class="form-control" name="senha" required>
						</div>
						
						<button type="submit" class="btn btn-success">Entrar</button>
					</form>
					<p class="text-center text-danger">
						<?php if(isset($_SESSION['loginErro'])){
							echo $_SESSION['loginErro'];
							unset ($_SESSION['loginErro']);
						}
					
						$_SESSION['pessoaid']                    = null;              
						$_SESSION['pessoacpf']                   = null;
						$_SESSION['pessoaemail']                 = null;
						$_SESSION['pessoanome']                  = null;
						$_SESSION['pessoadataNascimento']        = null;
						$_SESSION['pessoaidentidade']            = null;
						$_SESSION['pessoaorgaoExpedidor']        = null;
						$_SESSION['pessoasexo']                  = null;
						$_SESSION['pessoatelefoneResidencial']   = null;
						$_SESSION['pessoatelefoneCelular']       = null;     
						$_SESSION['alunoid']                     = null;
						$_SESSION['ultima_request']              = null;
						$_SESSION['cpf']                         = null;
						$_SESSION['nome']                        = null;
						$_SESSION['email']                       = null;
						$_SESSION['identidade']                  = null;
						$_SESSION['orgaoExpedidor']              = null;
						$_SESSION['periodo']                     = null;
						$_SESSION['vigenciaEstagioInicial']      = null;
						$_SESSION['vigenciaEstagioFinal']        = null;
						$_SESSION['logradouro']                  = null;
						$_SESSION['numero']                      = null;
						$_SESSION['complemento']                 = null;
						$_SESSION['bairro']                      = null;
						$_SESSION['cidade']                      = null;
						$_SESSION['uf']                          = null;
						$_SESSION['cep']                         = null;
						$_SESSION['nomeBanco']                   = null;
						$_SESSION['numeroAgencia']    	         = null;
						$_SESSION['contaCorrente']               = null;
						$_SESSION['estadoCivil']                 = null;
						$_SESSION['tipoAuxilio_id']				 = null;?>
					</p>
				</div>
			</div>
		</nav>
		
    <div class="jumbotron">
		<div class="container">
			<h1>Coordenadoria de Assistência Estudantil</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
			<div class="col-md-6">
			  <img alt="" src="imagens/logcefet.PNG">
			</div>
			
			<div class="col-md-6">
				<form action="" method="get">
					<div class="form-group">
						<input type="text" name="search" class="form-control" placeholder="Busque sua matrícula..."/>
					
					<br>
					
					<div class="form-group">
						<input type="submit" name="search_btn" class="btn btn-default" value="Buscar"/>
					</div>
					
				</form>
			</div>
			
			<?php if(isset($_GET['search_btn'])){
				$search_var = $_GET['search'];
				$sql = "SELECT DISTINCT editalselecao.id as 'editalselecao_id', editalselecao.ano, fase.inicioFase, fase.finalFase, tipoauxilio.categoria, tipoauxilio.id as 'tipoauxilio_id',  aluno.matricula, (SELECT DISTINCT c.id FROM candidatura c, aluno al WHERE c.editalselecao_id = editalselecao.id AND c.tipoAuxilio_id = tipoauxilio.id AND c.aluno_id = al.id AND al.matricula = '".$search_var."') as 'candidatura_id', aluno.pessoa_id FROM editalselecao editalselecao LEFT JOIN fase fase ON editalselecao.id = fase.editalSelecao_id LEFT JOIN bolsaedital bolsaedital ON fase.id = bolsaedital.fase_id LEFT JOIN tipoauxilio tipoauxilio ON bolsaedital.tipoAuxilio_id = tipoauxilio.id LEFT JOIN unidade unidade ON fase.unidade_id = unidade.id LEFT JOIN curso curso ON unidade.id = curso.unidade_id LEFT JOIN aluno aluno ON curso.id = aluno.curso_id WHERE aluno.matricula LIKE '".$search_var."'";
				if($res = $conectar->query($sql)){?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Matrícula</th>
								<th>Edital</th>
								<th>Categoria</th>
								<th>Candidatura</th>
							</tr>
						</thead>
                
						<tbody><?php
							if($res->num_rows > 0){
								while($linhas = $res->fetch_assoc()){?>
									<tr>
										<td><?php echo $linhas['matricula'];?></td>
										<td><a href="http://www.cefet-rj.br/index.php/assistencia-estudantil"><?php echo $linhas['ano'];?></a></td>
										<td><?php echo $linhas['categoria'];?></td>
										<td><?php if($linhas['candidatura_id'] != ''){?> <a href="visualizarCandidatura.php?idCandidatura=<?php echo $linhas['candidatura_id'];?>"><button type='button' class='btn btn-primary'>Acompanhar</button></a> <?php } else if(strtotime($linhas['inicioFase']) <= strtotime("now") && strtotime($linhas['finalFase']) >= strtotime("now")){ ?> <a href="index_cadastro.php?id=<?php echo $linhas['pessoa_id']."&tipoauxilio_id=".$linhas['tipoauxilio_id']."&editalselecao_id=".$linhas['editalselecao_id'];?>"><button type='button' class='btn btn-success'>Realizar</button></a> <?php } else{ echo "Fora da fase de candidatura"; }?></td>
									</tr><?php   
								}   
							} else {?>
								<tr>
									<td colspan="2">Matrícula não encontrada.<?php echo $conectar->error;?></td>
								</tr><?php       
							}?>
						</tbody>
					</table><?php
				} else {
					echo "Failed".$sql;
				}
			}?>
        </div>
    </div>
	
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>