<?php 
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php
$editalSelecionado = mysqli_query($conectar, "SELECT ano, id from editalselecao ORDER by id DESC LIMIT 1");
$editalAtual = mysqli_fetch_assoc($editalSelecionado);

$candidatosTotal = mysqli_query($conectar, "SELECT COUNT(*) as 'Total_Candidatos' FROM candidatura WHERE editalselecao_id = $editalAtual[id]");
$totalCandidatos = mysqli_fetch_assoc($candidatosTotal);


$candidatosTotalNaoHomologado = mysqli_query($conectar, "SELECT COUNT(*) as 'Total_Candidatos' FROM candidatura WHERE candidatura.situacao = 'Não Homologado' and candidatura.editalselecao_id = $editalAtual[id]");
$totalCandidatosNaoHomologado = mysqli_fetch_assoc($candidatosTotalNaoHomologado);

$candidatosTotalHomologado = mysqli_query($conectar, "SELECT COUNT(*) as 'Total_Candidatos' FROM candidatura WHERE candidatura.situacao = 'Homologado' and candidatura.editalselecao_id = $editalAtual[id]");
$totalCandidatosHomologado = mysqli_fetch_assoc($candidatosTotalHomologado);

$candidatosTotalNaoAvaliado = mysqli_query($conectar, "SELECT COUNT(*) as 'Total_Candidatos' FROM candidatura WHERE candidatura.situacao = 'Em Análise' and candidatura.editalselecao_id = $editalAtual[id]");
$totalCandidatosNaoAvaliado = mysqli_fetch_assoc($candidatosTotalNaoAvaliado);

$candidatosTotalCancelado = mysqli_query($conectar, "SELECT COUNT(*) as 'Total_Candidatos' FROM candidatura WHERE candidatura.situacao = 'Cancelado' and candidatura.editalselecao_id = $editalAtual[id]");
$totalCandidatosCancelado = mysqli_fetch_assoc($candidatosTotalCancelado);

$candidatosTotalPendente = mysqli_query($conectar, "SELECT COUNT(*) as 'Total_Candidatos' FROM candidatura WHERE candidatura.situacao = 'Pendente' and candidatura.editalselecao_id = $editalAtual[id]");
$totalCandidatosPendente = mysqli_fetch_assoc($candidatosTotalPendente);

$validacaoDistribuicao = false;
if($totalCandidatos['Total_Candidatos'] == ($totalCandidatosNaoHomologado['Total_Candidatos'] + $totalCandidatosHomologado['Total_Candidatos'] + $totalCandidatosCancelado['Total_Candidatos']))
{
	$validacaoDistribuicao = true;
}
?>

<br>
<br>

<form class="form-horizontal"  action="listar_classificados_distribuicao.php" method="POST">
    <div class="container theme-showcase" role="main">
		<div class="page-header">
			<h1>Quantitativo de Candidatos</h1>
		</div>
		
		<div class="row espaco">	
			<div class="pull-right">
				<?php if($validacaoDistribuicao){  ?>
					<button type="submit" class='btn btn-success'>Distribuir Auxílios</button>			
				<?php } else {?>
					<a href='listar_candidatos_homologacao.php'><button type='button' class='btn btn-info'>Retornar para Homologação</button></a>	
				<?php }?>				
			</div>
		</div>
		
		<div class="form-group">
		    <div class="col-sm-12">
				<div class="page-header">
					<h3>Informações</h3>
				</div>
				
				<label class="col-sm-2 control-label">Total de Candidatos:</label>
				<div class="col-sm-2">
					<label class="form-control"><?php echo $totalCandidatos['Total_Candidatos']?></label>
				</div>
			
				<label class="col-sm-2 control-label">Edital:</label>
				<div class="col-sm-2">
					<label class="form-control"><?php echo $editalAtual['ano']?></label>
				</div>
			</div>
		</div>
				  
		<div class="form-group">
		    <div class="col-sm-12">
				<div class="page-header">
					<h3>Avaliados</h3>
				</div>
				
				<label class="col-sm-2 control-label">Homologados:</label>
				<div class="col-sm-2">
					<input type="text"   name="numero" class="form-control" id="numero" placeholder="" value="<?php echo $totalCandidatosHomologado['Total_Candidatos'];?>">
				</div>
			
				<label class="col-sm-2 control-label">Não Homologados:</label>
				<div class="col-sm-2">
					<input type="text"   name="numero" class="form-control" id="numero" placeholder="" value="<?php echo $totalCandidatosNaoHomologado['Total_Candidatos'];?>">
				</div>
			
				<label class="col-sm-2 control-label">Cancelados</label>
				<div class="col-sm-2">
					<label class="form-control"><?php echo $totalCandidatosCancelado['Total_Candidatos']?></label>
				</div>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-12">
				<div class="page-header">
					<h3>Não Avaliados ou em Pendência</h3>
				</div>
							
				<div class="form-group">
	                <label class="col-sm-2 control-label">Em Análise:</label>
					<div class="col-sm-2">
						<label class="form-control"><?php echo $totalCandidatosNaoAvaliado['Total_Candidatos']?></label>
					</div>
				
	                <label class="col-sm-2 control-label">Pedente:</label>
					<div class="col-sm-2">
						<label class="form-control"><?php echo $totalCandidatosPendente['Total_Candidatos']?></label>
					</div>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="pull-center">
				<?php if($validacaoDistribuicao == false){
					echo "AVISO, AINDA HÁ ALUNOS EM ANÁLISE OU EM PENDÊNCIA. NÃO É POSSÍVEL DISTRIBUIR AUXÍLIOS.";
				}?>				
			</div>
		</div>
	</div>
  
	<input type="hidden" name="edital_id" value =  "<?php echo $editalAtual['id'];?>">

</form>

<?php 
include_once("footer_adm.php");
?>
