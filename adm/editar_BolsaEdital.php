<?php
session_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<br>

<?php 
$fase_id=trim($_GET['fase_id']);
$tipoAuxilio_id=trim($_GET['tipoAuxilio_id']);
$result = mysqli_query($conectar, "SELECT bolsaedital.tipoAuxilio_id, tipoauxilio.categoria, bolsaedital.fase_id, fase.inicioFase, fase.finalFase, bolsaedital.quantidade, bolsaedital.valor FROM bolsaedital bolsaedital, fase fase, tipoauxilio tipoauxilio WHERE bolsaedital.fase_id = fase.id AND tipoauxilio.id = bolsaedital.tipoAuxilio_id and bolsaedital.fase_id = '$fase_id' and bolsaedital.tipoAuxilio_id = '$tipoAuxilio_id'");
$resultado = mysqli_fetch_assoc($result);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Editar Bolsa de Auxílio</h1>
    </div>

	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_BolsaEdital.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
    
	<br>
      
    <div class="row">
        <div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_BolsaEdital.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Tipo de Auxílio</label>
					<div class="col-md-2">
                    <?php $result_tipoAuxilio_2 = mysqli_query($conectar,"SELECT id, categoria FROM tipoauxilio");?>
                        <select disabled="disabled" id="tipoAuxilio_id" name="tipoAuxilio_id" class="form-control">                       
							<?php foreach($result_tipoAuxilio_2 as $rtipoAxilio_2): ?>
                            <option value="<?php echo $rtipoAxilio_2['id'];?>" <?php if($tipoAuxilio_id == $rtipoAxilio_2['id']) echo "selected"; ?>><?php  echo $rtipoAxilio_2['categoria'];?>
                            </option><?php endforeach;?>
                        </select>
					</div> 
                
					<label for="inputPassword3" class="col-sm-2 control-label">Quantidade</label>
					<div class="col-md-2">
						<input type="text" class="form-control" name="quantidade" value = "<?php echo $resultado['quantidade'];?>">			    
					</div>
				
					<label for="inputPassword3" class="col-sm-2 control-label">Valor</label>
			    	<div class="col-md-2">
						<input type="text" class="form-control" id="valor" name="valor" value = "<?php echo $resultado['valor'];?>">
					</div>
					
					<input type="hidden" name="fase_id_anterior" value =  "<?php echo $fase_id;?>"> 			 			  
					<input type="hidden" name="tipoAuxilio_id_anterior" value =  "<?php echo $tipoAuxilio_id;?>"> 			 			  
				</div>
				
				<div class="form-group">
					<label for="inputPassword3" class="col-sm-2 control-label">Data Inicial da Fase</label>
					<div class="col-md-4">
                    <?php $result_fase_2 = mysqli_query($conectar,"SELECT id, inicioFase FROM fase");?>
                        <select  id="fase_id" name="fase_id" class="form-control">                        
							<?php foreach($result_fase_2 as $rfase_id_2): ?>
                            <option value="<?php echo $rfase_id_2['id'];?>" <?php if($fase_id== $rfase_id_2['id']) echo "selected"; ?>><?php  echo $rfase_id_2['inicioFase'];?>
                            </option><?php endforeach;?>
                        </select>
					</div> 
                
					<label for="inputPassword3" class="col-sm-2 control-label">Data Final da Fase</label>
					<div class="col-md-4">
                    <?php $result_fase_2 = mysqli_query($conectar,"SELECT id, finalFase FROM fase");?>
                        <select  id="fase_id" name="fase_id" class="form-control">                        
							<?php foreach($result_fase_2 as $rfase_id_2): ?>
                            <option value="<?php echo $rfase_id_2['id'];?>" <?php if($fase_id== $rfase_id_2['id']) echo "selected"; ?>><?php  echo $rfase_id_2['finalFase'];?>
                            </option><?php endforeach;?>
                        </select>
					</div> 
                </div>
                 
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

<script type="text/javascript">
    $(document).ready(function()
    {
    	$('#valor').toNumber().formatCurrency();
    	$( "#valor" ).blur(function() {
    		$('#valor').toNumber().formatCurrency();
    	});
    });
</script>