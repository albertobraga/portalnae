
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
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
         
          <a class="navbar-brand" style="text-align: top;" href="#">&Aacuterea administrativa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" method="POST" action="adm/valida_login.php">           
            <div class="form-group">
              <input type="text" placeholder="Login" class="form-control" name="usuario" required autofocus>
            </div>
            <div class="form-group">
              <input type="password" placeholder="Senha" class="form-control" name="senha" required>
            </div>
            <button type="submit" class="btn btn-success">Entrar</button>
          </form>
          <p class="text-center text-danger">
			<?php
			if(isset($_SESSION['loginErro'])){
				echo $_SESSION['loginErro'];
				unset ($_SESSION['loginErro']);
			}
			?>
		
		</p>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container">
        <h1>Centro de Assistência Estudantil</h1>
        
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-6">
          <img alt="" src="imagens/logcefet.PNG">
        </div>
        <div class="col-md-6">
               <form action="" method="get">
        <div class="form-group">
            <input type="text" name="search" class="form-control" placeholder="Search Customer Name Here..."/>
        </div>
        <div class="form-group">
            <input type="submit" name="search_btn" class="btn btn-default" value="Search"/>
        </div>
      </form>

            <?php
        if(isset($_GET['search_btn'])){

            $search_var = $_GET['search'];

            $sql = "SELECT al.curso_id, al.id, al.matricula, al.pessoa_id, cd.situacao, cd.id as 'candidatura_id', fs.dataInicialPrimeiraFase, fs.dataFinalPrimeiraFase, fs.dataFinalSegundaFase, fs.dataInicialSegundaFase, (SELECT COUNT(*) FROM candidatura cdt WHERE Year(cdt.dataRealizacao) = Year(now()) and cdt.aluno_id = al.id) as 'qtd_candidatura' FROM editalselecao es LEFT JOIN fase fs on fs.editalSelecao_id = es.id LEFT JOIN unidade un on fs.unidade_id = un.id LEFT JOIN curso cs on cs.unidade_id = un.id LEFT JOIN aluno al on cs.id = al.curso_id LEFT JOIN pessoa ps on al.pessoa_id = ps.id LEFT JOIN candidatura cd on cd.aluno_id = al.id LEFT JOIN tipoauxilio ta on cd.tipoAuxilio_id = ta.id WHERE al.matricula LIKE '".$search_var."'   ORDER by candidatura_id desc LIMIT 1";
            if($res = $conectar->query($sql)){

            ?>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Matricula</th>
                    <th>Candidatura</th>
                  </tr>
                </thead>
                <tbody>
        <?php
            if($res->num_rows > 0){

                while($linhas = $res->fetch_assoc()){
        ?>
                    <tr>
                        <td><?php echo $linhas['matricula'];?></td>
                        <td><?php if((strtotime($linhas['dataInicialPrimeiraFase']) <= strtotime("now") && strtotime($linhas['dataFinalPrimeiraFase']) >= strtotime("now")) ==false){ ?> <a href="#"><button type='button' class='btn btn-sm btn-warning'>NÃ£o foram abertas novas fases. Favor aguardar! </button></a> <?php } else if($linhas['candidatura_id'] == ''){?> <a href="index_cadastro.php?id=<?php echo $linhas['pessoa_id'];?>"><button type='button' class='btn btn-sm btn-warning'>Efetuar Matricula</button></a> <?php } else if(($linhas['situacao'] != 'Homologado' && $linhas['situacao'] != 'Em Analise') && (strtotime($linhas['dataInicialSegundaFase']) <= strtotime("now") && strtotime($linhas['dataFinalPrimeiraFase']) >= strtotime("now")) && intval($linhas['qtd_candidatura']) <= 1){ ?> <a href="index_cadastro.php?id=<?php echo $linhas['pessoa_id'];?>"><button type='button' class='btn btn-sm btn-warning'>Efetuar Matricula</button></a> <?php } else{?> <a href="visualizarCandidatura.php?idCandidatura=<?php echo $linhas['candidatura_id'];?>"><button type='button' class='btn btn-sm btn-success'>Acompanhar</button></a><?php }?></td>
                    </tr>
        <?php   
                }   
            }
            else
            {
        ?>
                <tr>
                    <td colspan="2">Not Found<?php echo $conectar->error;?></td>
                </tr>   
        <?php       
            }
        ?>
                </tbody>
            </table>
        <?php
            }
            else
            {
                echo "Failed".$sql;
            }
        }
      ?>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
