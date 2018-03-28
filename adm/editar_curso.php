<?php
session_start();
ob_start();
include_once("conexao.php");
include_once("header_adm.php");
include_once("menu_admin.php");
?>

<?php 
header("Content-Type: text/html;  charset=ISO-8859-1",true);
?>

<?php 
$id = $_GET['id'];
$result = mysqli_query($conectar, "SELECT * FROM curso where id = $id");
$resultado = mysqli_fetch_assoc($result);
?>

<br>
<br>

<div class="container theme-showcase" role="main">
    <div class="page-header">
        <h1>Editar Curso</h1>
    </div>

	<div class="row espaco">
		<div class="pull-right">
			<a href='listar_curso.php'><button type='button' class='btn btn-info'>Retornar</button></a>			
		</div>
	</div>
    
	<br>
      
	<div class="row">
        <div class="col-md-12">
			<form class="form-horizontal" method = "POST" action = "processa/proc_edit_curso.php">
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Nome</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nome" value = "<?php echo $resultado['nome'];?>">
					</div>
				</div>
			  
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Unidade</label>
					<div class="col-sm-2">
					<?php $result_unidade_2= mysqli_query($conectar,"SELECT id, nome from unidade ");?>
                        <select  id="unidade_id" name="unidade_id" class="form-control">                        
							<?php foreach($result_unidade_2 as $runidade_id_2): ?>
                            <option value="<?php echo $runidade_id_2['id'];?>" <?php if($resultado['unidade_id']== $runidade_id_2['id']) echo "selected"; ?>><?php  echo $runidade_id_2['nome'];?>
                            </option><?php endforeach;?>
                        </select>
					</div>
				</div>
			  	
				<input type="hidden" name="id" value =  "<?php echo $resultado['id'];?>">
			  
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
