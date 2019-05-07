<?php
header("Content-Type: text/html;charset=utf-8");
	/* Connect To Database*/
	include_once ("conexion.php");
 
	$db = new Connection();
$con =  $db->getConnection();

$action = (isset($_REQUEST['action'])&& $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
	$query = mysqli_real_escape_string($con,(strip_tags($_REQUEST['query'], ENT_QUOTES)));
 //print_r($con);
	$joins = "INNER JOIN curso c ON (c.id = e.id_curso)
			  INNER JOIN estatus es ON (es.id = e.id_estatus)
			  INNER JOIN persona p ON (p.id = e.id_persona)";
	$tables="estudiante e";
	$campos="e.id,
			 c.descripcion,
			 c.vigencia,
			 es.descripcion as estatus";
	$sWhere=" concat(p.apellido_paterno,' ',p.apellido_materno,' ',p.nombre) = '".$query."'";
	//$sWhere=" concat(p.apellido_paterno,' ',p.apellido_materno,' ',p.nombre) = 'LOPEZ SARRELANGUE JUAN'";
	
	//Count the total number of row in your table*/
	$querieArmadoNum = "SELECT count(*) AS numrows FROM $tables $joins where $sWhere";
	$result = mysqli_query($con, $querieArmadoNum) or die(mysqli_error());
	//mysqli_query("SET NAMES 'utf8'");
	$rowe = mysqli_fetch_assoc($result);

	$count_query   = mysqli_query($con,$querieArmadoNum);
	//print_r($count_query);
	if ($row = mysqli_fetch_array($count_query)){
		$numrows = $row['numrows'];
	}
	else {
		echo "Oops algo salió mal";
		echo mysqli_error($con);
	}

	//main query to fetch the data
	$querieArmado = "SELECT $campos FROM $tables $joins where $sWhere";
	mysqli_query ($con,"SET NAMES 'utf8'");
	$query = mysqli_query($con,$querieArmado) or die(mysqli_error());

	//echo $querieArmado;
	//$resultado = mysqli_fetch_array($query);
	//$resultado = mysqli_fetch_array($query,MYSQLI_ASSOC);
	//printf ("%s (%s)\n",$resultado["descripcion"],$resultado["vigencia"]);
	//loop through fetched data
	
 
 
		
	mysqli_close($con); 

	?>
		<div class="contenedorTabla">      	
			<table class="tabla">
	            <thead class="thead">
					<tr>
						<th class='titulos'>Curso</th>
						<th class='titulos'>Vigencia </th>
						<th class='titulos'>Estatus </th>
						<th class='titulos'></th>
					</tr>
				</thead>
	<?php

	if ($numrows>0){
		
	?>
		<tbody>
			<?php 
			while($row = mysqli_fetch_array($query)){
				//$row = $resultado[$i];
				//print_r($row);
				$id=$row['id'];
				$descripcion= $row['descripcion'];
				$vigencia=$row['vigencia'];
				$estatus=$row['estatus'];
				/*$id="";
				$descripcion="";
				$vigencia="";
				$estatus="";*/
			
					
			?>	
			<tr>
				<th class='titulos'><?php echo $descripcion;?></th>
				<th class='titulos'><?php echo $vigencia;?></th>
				<th class='titulos'><?php echo $estatus;?></th>
				<th class='titulos descarga' style="width: 1%;">
					<form class="form-inline" method="post" 
					action="php/generateReport.php">
					<input type="hidden" name="id" value="<?php echo $id;?>" />
						<button type="submit" id="pdf" name="generate_pdf" class="botonDescarga">
						DESCARGAR</button>
					</form>
				</th>
			</tr>
			<?php }?>
		</tbody>
		</table>
        </div>
	<?php	
	}else{
		?>
		<tbody>
			<tr>
				<th class='titulos' style="text-align: inherit;">No se encontraron registros.</th>
				<th class='titulos'></th>
				<th class='titulos'></th>
				<th class='titulos'></th>
			</tr>
		</tbody>
		</table>
        </div>
		<?php
	}	
}
?>      