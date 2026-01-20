
<?php

/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	----------------------------
 
*/

if(!isset($_SESSION)) { 
    session_start(); 
}
define("__ROOT6__", dirname(__FILE__));
$action = (isset($_POST["action"]) && $_POST["action"] != NULL) ? $_POST["action"] : "";
if($action == "ajax"){

	require(__ROOT6__."/class.filtro.php");
	$database = new orders();	

	$query = isset($_POST["query"]) ? $_POST["query"] : "";

	$DEPARTAMENTO = !empty($_POST["DEPARTAMENTO2"]) ? $_POST["DEPARTAMENTO2"] : "DEFAULT";	
	$nombreTabla = "SELECT * FROM `08calendariofiltroDes`, 08altaeventosfiltroPLA WHERE 08calendariofiltroDes.id = 08altaeventosfiltroPLA.idRelacion";
	$altaeventos = "calendarioEventos";


	$NUMERO_EVENTO = isset($_POST["NUMERO_EVENTO"]) ? $_POST["NUMERO_EVENTO"] : ""; 
	$FECHA_ALTA_EVENTO = isset($_POST["FECHA_ALTA_EVENTO"]) ? $_POST["FECHA_ALTA_EVENTO"] : ""; 
	$STATUS_EVENTO = isset($_POST["STATUS_EVENTO"]) ? $_POST["STATUS_EVENTO"] : ""; 
	$MONTOC_TOTAL_EVENTO = isset($_POST["MONTOC_TOTAL_EVENTO"]) ? $_POST["MONTOC_TOTAL_EVENTO"] : ""; 
	$MONTO_TOTAL_AVION = isset($_POST["MONTO_TOTAL_AVION"]) ? $_POST["MONTO_TOTAL_AVION"] : ""; 
	$CANTIDAD_PORCENTAJEV = isset($_POST["CANTIDAD_PORCENTAJEV"]) ? $_POST["CANTIDAD_PORCENTAJEV"] : ""; 
	$FEE_COBRADO = isset($_POST["FEE_COBRADO"]) ? $_POST["FEE_COBRADO"] : ""; 
	$PORCENTAJE_FEE = isset($_POST["PORCENTAJE_FEE"]) ? $_POST["PORCENTAJE_FEE"] : ""; 
	$MONTO_TOTAL_DEL_EVENTO = isset($_POST["MONTO_TOTAL_DEL_EVENTO"]) ? $_POST["MONTO_TOTAL_DEL_EVENTO"] : ""; 
	$NOMBRE_COMERCIAL_EVENTO = isset($_POST["NOMBRE_COMERCIAL_EVENTO"]) ? $_POST["NOMBRE_COMERCIAL_EVENTO"] : ""; 
	$NOMBRE_FISCAL_EVENTO = isset($_POST["NOMBRE_FISCAL_EVENTO"]) ? $_POST["NOMBRE_FISCAL_EVENTO"] : ""; 
	$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"]) ? $_POST["NOMBRE_EVENTO"] : ""; 
	$NOMBRE_CORTO_EVENTO = isset($_POST["NOMBRE_CORTO_EVENTO"]) ? $_POST["NOMBRE_CORTO_EVENTO"] : ""; 
	$NOMBRE_CONTACTO_EVENTO = isset($_POST["NOMBRE_CONTACTO_EVENTO"]) ? $_POST["NOMBRE_CONTACTO_EVENTO"] : ""; 
	$CELULAR_CONTACTO_1 = isset($_POST["CELULAR_CONTACTO_1"]) ? $_POST["CELULAR_CONTACTO_1"] : ""; 
	$CORREO_CONTACTO_1 = isset($_POST["CORREO_CONTACTO_1"]) ? $_POST["CORREO_CONTACTO_1"] : ""; 
	$AREA_CONTACTO_CLIENTE = isset($_POST["AREA_CONTACTO_CLIENTE"]) ? $_POST["AREA_CONTACTO_CLIENTE"] : ""; 
	$OBSERVACIONES_1 = isset($_POST["OBSERVACIONES_1"]) ? $_POST["OBSERVACIONES_1"] : ""; 
	$TIPO_DE_EVENTO = isset($_POST["TIPO_DE_EVENTO"]) ? $_POST["TIPO_DE_EVENTO"] : ""; 
	$FORMATO_EVENTO = isset($_POST["FORMATO_EVENTO"]) ? $_POST["FORMATO_EVENTO"] : ""; 
	$PAIS_DEL_EVENTO = isset($_POST["PAIS_DEL_EVENTO"]) ? $_POST["PAIS_DEL_EVENTO"] : ""; 
	$CIUDAD_DEL_EVENTO = isset($_POST["CIUDAD_DEL_EVENTO"]) ? $_POST["CIUDAD_DEL_EVENTO"] : ""; 
	$HOTEL_LUGAR = isset($_POST["HOTEL_LUGAR"]) ? $_POST["HOTEL_LUGAR"] : ""; 
	$NUMERO_DE_PERSONAS = isset($_POST["NUMERO_DE_PERSONAS"]) ? $_POST["NUMERO_DE_PERSONAS"] : ""; 

	$FECHA_INICIO_EVENTO = isset($_POST["FECHA_INICIO_EVENTO"]) ? $_POST["FECHA_INICIO_EVENTO"] : ""; 
	$FECHA_INICIO_EVENTO2a = isset($_POST["FECHA_INICIO_EVENTO2a"]) ? $_POST["FECHA_INICIO_EVENTO2a"] : ""; 

	$NOMBRE_COMERCIAL = isset($_POST["NOMBRE_COMERCIAL"]) ? $_POST["NOMBRE_COMERCIAL"] : ""; 

	$FECHA_FINAL_EVENTO = isset($_POST["FECHA_FINAL_EVENTO"]) ? $_POST["FECHA_FINAL_EVENTO"] : ""; 
	$FECHA_FINAL_EVENTO2a = isset($_POST["FECHA_FINAL_EVENTO2a"]) ? $_POST["FECHA_FINAL_EVENTO2a"] : ""; 

	$HORA_TERMINO_EVENTO = isset($_POST["HORA_TERMINO_EVENTO"]) ? $_POST["HORA_TERMINO_EVENTO"] : ""; 
	$FECHA_LLEGADA_STAFF = isset($_POST["FECHA_LLEGADA_STAFF"]) ? $_POST["FECHA_LLEGADA_STAFF"] : ""; 
	$HORA_LLEGADA_STAFF = isset($_POST["HORA_LLEGADA_STAFF"]) ? $_POST["HORA_LLEGADA_STAFF"] : ""; 
	$FECHA_REGRESO_STAFF = isset($_POST["FECHA_REGRESO_STAFF"]) ? $_POST["FECHA_REGRESO_STAFF"] : ""; 
	$HORA_REGRESO_STAFF = isset($_POST["HORA_REGRESO_STAFF"]) ? $_POST["HORA_REGRESO_STAFF"] : ""; 
	$MATERIAL_EQUIPO_BODEGA = isset($_POST["MATERIAL_EQUIPO_BODEGA"]) ? $_POST["MATERIAL_EQUIPO_BODEGA"] : "";
	$FECHA_INICIO_MONTAJE = isset($_POST["FECHA_INICIO_MONTAJE"]) ? $_POST["FECHA_INICIO_MONTAJE"] : "";
	$HORA_INICIO_MONTAJE = isset($_POST["HORA_INICIO_MONTAJE"]) ? $_POST["HORA_INICIO_MONTAJE"] : "";
	$FECHA_DESMONTAJE = isset($_POST["FECHA_DESMONTAJE"]) ? $_POST["FECHA_DESMONTAJE"] : "";
	$HORA_DESMONTAJE = isset($_POST["HORA_DESMONTAJE"]) ? $_POST["HORA_DESMONTAJE"] : "";
	$LUGAR_MONTAJE = isset($_POST["LUGAR_MONTAJE"]) ? $_POST["LUGAR_MONTAJE"] : "";
	$SERVICIO_OTORGAR = isset($_POST["SERVICIO_OTORGAR"]) ? $_POST["SERVICIO_OTORGAR"] : "";
	$MONEDAS = isset($_POST["MONEDAS"]) ? $_POST["MONEDAS"] : "";

	$NOMBRE_VENDEDOR = isset($_POST["NOMBRE_VENDEDOR"]) ? $_POST["NOMBRE_VENDEDOR"] : "";
	$NOMBRE_EJECUTIVOEVENTO = isset($_POST["NOMBRE_EJECUTIVOEVENTO"]) ? $_POST["NOMBRE_EJECUTIVOEVENTO"] : "";  
	$CIERRE_TOTAL = isset($_POST["CIERRE_TOTAL"]) ? $_POST["CIERRE_TOTAL"] : "";  

	$NOMBRE_PERSONAL2 = isset($_POST["NOMBRE_PERSONAL2"]) ? $_POST["NOMBRE_PERSONAL2"] : "";  
	$NOMBRE_PERSONAL = isset($_POST["NOMBRE_PERSONAL"]) ? $_POST["NOMBRE_PERSONAL"] : "";  
	$TOTAL_AVION_SINIVA = isset($_POST["TOTAL_AVION_SINIVA"]) ? $_POST["TOTAL_AVION_SINIVA"] : ""; 
	$NOMBRE_INGRESO = isset($_POST["NOMBRE_INGRESO"]) ? $_POST["NOMBRE_INGRESO"] : ""; 
	$NOMBRE_AUDITOR = isset($_POST["NOMBRE_AUDITOR"]) ? $_POST["NOMBRE_AUDITOR"] : ""; 
	$FALTA_POR_COBRAR = isset($_POST["FALTA_POR_COBRAR"]) ? $_POST["FALTA_POR_COBRAR"] : ""; 
	$FALTA_POR_FACTURAR = isset($_POST["FALTA_POR_FACTURAR"]) ? $_POST["FALTA_POR_FACTURAR"] : ""; 
	$PERDIDA_FISCAL = isset($_POST["PERDIDA_FISCAL"]) ? $_POST["PERDIDA_FISCAL"] : ""; 
	$per_page = intval($_POST["per_page"]);
	$campos = "*";

	$page = (isset($_POST["page"]) && !empty($_POST["page"])) ? $_POST["page"] : 1;
	$adjacents  = 4; 
	$offset = ($page - 1) * $per_page;
	
	$search = array(
		"NUMERO_EVENTO"=>$NUMERO_EVENTO,
		"FECHA_ALTA_EVENTO"=>$FECHA_ALTA_EVENTO,
		"STATUS_EVENTO"=>$STATUS_EVENTO,
		"MONTOC_TOTAL_EVENTO"=>$MONTOC_TOTAL_EVENTO,
		"MONTO_TOTAL_AVION"=>$MONTO_TOTAL_AVION,
		"CANTIDAD_PORCENTAJEV"=>$CANTIDAD_PORCENTAJEV,
		"FEE_COBRADO"=>$FEE_COBRADO,
		"PORCENTAJE_FEE"=>$PORCENTAJE_FEE,
		"MONTO_TOTAL_DEL_EVENTO"=>$MONTO_TOTAL_DEL_EVENTO,
		"NOMBRE_COMERCIAL_EVENTO"=>$NOMBRE_COMERCIAL_EVENTO,
		"NOMBRE_FISCAL_EVENTO"=>$NOMBRE_FISCAL_EVENTO,
		"NOMBRE_EVENTO"=>$NOMBRE_EVENTO,
		"NOMBRE_CORTO_EVENTO"=>$NOMBRE_CORTO_EVENTO,
		"NOMBRE_CONTACTO_EVENTO"=>$NOMBRE_CONTACTO_EVENTO,
		"CELULAR_CONTACTO_1"=>$CELULAR_CONTACTO_1,
		"CORREO_CONTACTO_1"=>$CORREO_CONTACTO_1,
		"AREA_CONTACTO_CLIENTE"=>$AREA_CONTACTO_CLIENTE,
		"OBSERVACIONES_1"=>$OBSERVACIONES_1,
		"TIPO_DE_EVENTO"=>$TIPO_DE_EVENTO,
		"FORMATO_EVENTO"=>$FORMATO_EVENTO,
		"PAIS_DEL_EVENTO"=>$PAIS_DEL_EVENTO,
		"CIUDAD_DEL_EVENTO"=>$CIUDAD_DEL_EVENTO,
		"HOTEL_LUGAR"=>$HOTEL_LUGAR,
		"NUMERO_DE_PERSONAS"=>$NUMERO_DE_PERSONAS,
		"FECHA_INICIO_EVENTO"=>$FECHA_INICIO_EVENTO,
		"FECHA_INICIO_EVENTO2a"=>$FECHA_INICIO_EVENTO2a,
		"NOMBRE_COMERCIAL"=>$NOMBRE_COMERCIAL,
		"FECHA_FINAL_EVENTO"=>$FECHA_FINAL_EVENTO,
		"FECHA_FINAL_EVENTO2a"=>$FECHA_FINAL_EVENTO2a,
		"HORA_TERMINO_EVENTO"=>$HORA_TERMINO_EVENTO,
		"FECHA_LLEGADA_STAFF"=>$FECHA_LLEGADA_STAFF,
		"HORA_LLEGADA_STAFF"=>$HORA_LLEGADA_STAFF,
		"FECHA_REGRESO_STAFF"=>$FECHA_REGRESO_STAFF,
		"HORA_REGRESO_STAFF"=>$HORA_REGRESO_STAFF,
		"MATERIAL_EQUIPO_BODEGA"=>$MATERIAL_EQUIPO_BODEGA,
		"FECHA_INICIO_MONTAJE"=>$FECHA_INICIO_MONTAJE,
		"HORA_INICIO_MONTAJE"=>$HORA_INICIO_MONTAJE,
		"FECHA_DESMONTAJE"=>$FECHA_DESMONTAJE,
		"HORA_DESMONTAJE"=>$HORA_DESMONTAJE,
		"LUGAR_MONTAJE"=>$LUGAR_MONTAJE,
		"MONEDAS"=>$MONEDAS,
		"NOMBRE_VENDEDOR"=>$NOMBRE_VENDEDOR,
		"NOMBRE_AUDITOR"=>$NOMBRE_AUDITOR,
		"SERVICIO_OTORGAR"=>$SERVICIO_OTORGAR,
		"NOMBRE_EJECUTIVOEVENTO"=>$NOMBRE_EJECUTIVOEVENTO,
		"CIERRE_TOTAL"=>$CIERRE_TOTAL,
		"NOMBRE_PERSONAL"=>$NOMBRE_PERSONAL,
		"NOMBRE_PERSONAL2"=>$NOMBRE_PERSONAL2,
		"TOTAL_AVION_SINIVA"=>$TOTAL_AVION_SINIVA,
		"NOMBRE_INGRESO"=>$NOMBRE_INGRESO,
		"FALTA_POR_COBRAR"=>$FALTA_POR_COBRAR,
		"FALTA_POR_FACTURAR"=>$FALTA_POR_FACTURAR,
		"PERDIDA_FISCAL"=>$PERDIDA_FISCAL,
		"per_page"=>$per_page,
		"query"=>$query,
		"offset"=>$offset
	);

	$datos = $database->getData($tables, $campos, $search);
	$countAll = $database->getCounter();

    $MONTOC_TOTAL_EVENTO12 = 0;
    $CANTIDAD_PORCENTAJEV12 = 0;
    $MONTO_TOTAL_AVION12 = 0;
    $TOTAL_AVION_SINIVA12 = 0;
    $FEE_COBRADO12 = 0;
    $MONTO_TOTAL_DEL_EVENTO12 = 0;
	$row = $countAll;

	if ($row > 0){
		$numrows = $countAll;
	} else {
		$numrows = 0;
	}	
	$total_pages = ceil($numrows / $per_page);
	//Recorrer los datos recuperados
		?>


		<div class="clearfix">
			<?php 
				echo "<div class='hint-text'> ".$numrows." registros</div>";
				require __ROOT6__."/pagination.php"; //include pagination class
				$pagination = new Pagination($page, $total_pages, $adjacents);
				echo $pagination->paginate();
			?>
        </div>
	<div class="table-responsive">
		<style>
    thead tr:first-child th {
        position: sticky;
        top: 0;
        background: #c9e8e8;
        z-index: 10;
    }

    thead tr:nth-child(2) td {
        position: sticky;
        top: 55px; /* Altura del primer encabezado */
        background: #e2f2f2;
        z-index: 9;
    }
</style>
<div style="max-height: 600px; overflow-y: auto;">
	 <table class="table table-striped table-bordered" style="width:100%" >	

		<thead>
            <tr>

			<th style="background:#c9e8e8"></th>
<th style="background:#c9e8e8;text-align:center">#</th>
<?php /*inicia copiar y pegar iniciaA3*/ ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">NÚMERO DE EVENTO</th>
<?php } ?>


<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_ALTA_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">FECHA ALTA EVENTO</th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_VENDEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">NOMBRE DEL VENDEDOR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EJECUTIVOEVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">NOMBRE DEL RESPONSABLE DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_INGRESO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">INGRESO ESTE EVENTO</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_AUDITOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">NOMBRE AUDITOR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">NOMBRE DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_CORTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE CORTO DEL EVENTO</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"CIERRE_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA BLOQUEO DEL EVENTO</th>
<?php } ?>   

<?php 
if($database->plantilla_filtro($nombreTabla,"STATUS_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">STATUS EVENTO</th>
<?php } ?>   
<?php 
if($database->plantilla_filtro($nombreTabla,"MONEDAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TIPO DE MONEDA</th>
<?php } ?>  
<?php 
if($database->plantilla_filtro($nombreTabla,"MONTOC_TOTAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO TOTAL COTIZADO<br><a style="color:red;font:7px">&nbsp; CON IVA SIN BOLETOS</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CANTIDAD_PORCENTAJEV",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8">MONTO TOTAL COTIZADO <br><a style="color:red;font:7px">&nbsp;SIN IVA SIN BOLETOS</a></th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_AVION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">MONTO TOTAL COTIZADO<br><a style="color:red;font:7px">&nbsp; DE BOLETOS DE AVION CON IVA</th>                                
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"TOTAL_AVION_SINIVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="text-align:center;background:#c9e8e8">MONTO TOTAL COTIZADO<br><a style="color:red;font:7px">&nbsp; DE BOLETOS DE AVION SIN IVA</th>                                
<?php } ?>


<?php 
if($database->plantilla_filtro($nombreTabla,"PORCENTAJE_FEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PORCENTAJE FEE <br>COBRADO AL CLIENTE:</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FEE_COBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FEE COBRADO AL CLIENTE:</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">MONTO TOTAL DEL EVENTO</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE COMERCIAL DE <br>LA EMPRESA (CLIENTE)</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_FISCAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE FISCAL O RAZÓN SOCIAL DE LA EMPRESA (CLIENTE)</th>
<?php } ?>



<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NOMBRE DEL CONTACTO CLIENTE </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CELULAR_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CELULAR DEL CONTACTO CLIENTE </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CORREO_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CORREO DEL CONTACTO CLIENTE </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"AREA_CONTACTO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ÁREA DEL CONTACTO CLIENTE </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">OBSERVACIONES </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"TIPO_DE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">TIPO DE EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FORMATO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FORMATO DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">PAÍS DONDE SE LLEVARA<br> A CABO EL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">CIUDAD DONDE SE LLEVARA<br> A CABO EL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"HOTEL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HOTEL O LUGAR</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NUMERO_DE_PERSONAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">NÚMERO DE PERSONAS</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA INICIO DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE INICIO DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA FINAL DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"HORA_TERMINO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE TERMINO EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA LLEGADA DEL STAFF</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"HORA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA LLEGADA DEL STAFF</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA REGRESO DEL STAFF</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"HORA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA REGRESO DEL STAFF</th>
<?php } ?>


  <?php 
if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO_BODEGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">REQUIERE DE MATERIAL Y EQUIPO DE BODEGA</th>
<?php } ?>
    <?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE INICIO DE MONTAJE</th>
<?php } ?>
      <?php 
if($database->plantilla_filtro($nombreTabla,"HORA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE INICIO DE MONTAJE</th>
<?php } ?>
       <?php 
if($database->plantilla_filtro($nombreTabla,"FECHA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">FECHA DE DESMONTAJE</th>
<?php } ?> 
      <?php 
if($database->plantilla_filtro($nombreTabla,"HORA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">HORA DE INICIO DE DESMONTAJE</th>
<?php } ?>  
       <?php 
if($database->plantilla_filtro($nombreTabla,"LUGAR_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">LUGAR DE MONTAJE Y DESMONTAJE</th>
<?php } ?>
     <?php 
if($database->plantilla_filtro($nombreTabla,"ARCHIVO_RELACIONADO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">ADJUNTAR ARCHIVO RELACIONADO CON EL MONTAJE</th>
<?php } ?>   
     <?php 
if($database->plantilla_filtro($nombreTabla,"SERVICIO_OTORGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">SERVICIOS PARA OTORGAR</th>
<?php } ?>  




<?php 
if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">SUBIR COTIZACIÓN PARA EL CLIENTE</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"SUBIR_ORDEN_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">SUBIR ORDEN DE COMPRA DEL CLIENTE</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"SURIR_CONTRATO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">SUBIR COTIZACIÓN FIRMADA POR<br/> EL CLIENTE AUTORIZANDO EL EVENTO
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION_FIRMADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">SUBIR COTIZACIÓN FIRMADA POR<BR> EL CLIENTE AUTORIZANDO EL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"LOGO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">LOGO DEL CLIENTE</th>
<?php } ?>


<?php 
if($database->plantilla_filtro($nombreTabla,"IMAGEN_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#c9e8e8;text-align:center">IMÁGEN DEL EVENTO</th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FALTA_POR_COBRAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#CCFF00;text-align:center">FALTA POR COBRAR<br> AL CLIENTE </th>
<?php } ?>
<?php 
if($database->plantilla_filtro($nombreTabla,"FALTA_POR_FACTURAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#CCFF00;text-align:center">FALTA POR FACTURAR<br> AL CLIENTE</th>
<?php } ?>

<?php 
if($database->plantilla_filtro($nombreTabla,"PERDIDA_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><th style="background:#CCFF00;text-align:center">46% PERDIDA DE COSTO FISCAL</th>
<?php } ?>



            </tr>
			
			
			
			
			
            <tr>
<td style="background:#c9e8e8"></td>
<td style="background:#c9e8e8"></td>



<?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_EVENTO" value="<?php 
echo $NUMERO_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_ALTA_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="date" class="form-control" id="FECHA_ALTA_EVENTO" value="<?php 
echo $FECHA_ALTA_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_VENDEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_VENDEDOR_1" value="<?php 
echo $NOMBRE_VENDEDOR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EJECUTIVOEVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_EJECUTIVOEVENTO_1" value="<?php 
echo $NOMBRE_EJECUTIVOEVENTO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_INGRESO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_INGRESO_1" value="<?php 
echo $NOMBRE_INGRESO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_AUDITOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_AUDITOR_1" value="<?php 
echo $NOMBRE_AUDITOR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_EVENTO" value="<?php 
echo $NOMBRE_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_CORTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_CORTO_EVENTO" value="<?php 
echo $NOMBRE_CORTO_EVENTO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"CIERRE_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="date" class="form-control" id="CIERRE_TOTAL_1" value="<?php 
echo $CIERRE_TOTAL; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"STATUS_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
             </br><td style="background:#c9e8e8">
				
			<select class="form-select mb-3" aria-label="Default select example" id="STATUS_EVENTO" onchange="load(1);">
			<option value="">TODOS</option>
			<option value="COTIZADO" <?php if($_POST['STATUS_EVENTO']=='COTIZADO'){echo 'selected';} ?>>COTIZADO</option>
			<option value="APROBADO" <?php if($_POST['STATUS_EVENTO']=='APROBADO'){echo 'selected';} ?>>APROBADO</option>
			<option value="CANCELADO" <?php if($_POST['STATUS_EVENTO']=='CANCELADO'){echo 'selected';} ?>>CANCELADO</option>
			<option value="SELECCIONA UNA OPCION" <?php if($_POST['STATUS_EVENTO']=='SELECCIONA UNA OPCION'){echo 'selected';} ?>>SELECCIONA UNA OPCION</option>								
			</select>
</td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"MONEDAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
    <td style="background:#c9e8e8">
        <select class="form-select mb-3" aria-label="Default select example" id="MONEDAS" name="MONEDAS" onchange="load(1);">
            <option value="">TODOS</option>
            <option style="background: #c9e8e8" value="MXN" <?php if($MONEDAS=='MXN'){echo "selected";} ?>>MXN (Peso mexicano)</option>
            <option style="background: #a3e4d7" value="USD" <?php if($MONEDAS=='USD'){echo "selected";} ?>>USD (Dólar estadounidense)</option>
            <option style="background: #e8f6f3" value="EUR" <?php if($MONEDAS=='EUR'){echo "selected";} ?>>EUR (Euro)</option>
            <option style="background: #fdf2e9" value="GBP" <?php if($MONEDAS=='GBP'){echo "selected";} ?>>GBP (Libra esterlina)</option>
            <option style="background: #eaeded" value="CHF" <?php if($MONEDAS=='CHF'){echo "selected";} ?>>CHF (Franco suizo)</option>
            <option style="background: #fdebd0" value="CNY" <?php if($MONEDAS=='CNY'){echo "selected";} ?>>CNY (Yuan chino)</option>
            <option style="background: #ebdef0" value="JPY" <?php if($MONEDAS=='JPY'){echo "selected";} ?>>JPY (Yen japonés)</option>
            <option style="background: #d6eaf8" value="HKD" <?php if($MONEDAS=='HKD'){echo "selected";} ?>>HKD (Dólar hongkonés)</option>
            <option style="background: #fef5e7" value="CAD" <?php if($MONEDAS=='CAD'){echo "selected";} ?>>CAD (Dólar canadiense)</option>
            <option style="background: #ebedef" value="AUD" <?php if($MONEDAS=='AUD'){echo "selected";} ?>>AUD (Dólar australiano)</option>
            <option style="background: #fbeee6" value="BRL" <?php if($MONEDAS=='BRL'){echo "selected";} ?>>BRL (Real brasileño)</option>
            <option style="background: #e8f6f3" value="RUB" <?php if($MONEDAS=='RUB'){echo "selected";} ?>>RUB (Rublo ruso)</option>
			<option value="SELECCIONA UNA OPCION" <?php if($_POST['MONEDAS']=='SELECCIONA UNA OPCION'){echo 'selected';} ?>>SELECCIONA UNA OPCION</option>								
			</select>
</td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"MONTOC_TOTAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MONTOC_TOTAL_EVENTO" value="<?php 
echo $MONTOC_TOTAL_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"CANTIDAD_PORCENTAJEV",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CANTIDAD_PORCENTAJEV" value="<?php 
echo $CANTIDAD_PORCENTAJEV; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_AVION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="MONTO_TOTAL_AVION" value="<?php 
echo $MONTO_TOTAL_AVION; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"TOTAL_AVION_SINIVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="TOTAL_AVION_SINIVA_1" value="<?php 
echo $TOTAL_AVION_SINIVA; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"PORCENTAJE_FEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="PORCENTAJE_FEE_1" value="<?php 
echo $PORCENTAJE_FEE; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FEE_COBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8"><input type="text" class="form-control" id="FEE_COBRADO" value="<?php 
echo $FEE_COBRADO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MONTO_TOTAL_DEL_EVENTO" value="<?php 
echo $MONTO_TOTAL_DEL_EVENTO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_COMERCIAL_EVENTO" value="<?php 
echo $NOMBRE_COMERCIAL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_FISCAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_FISCAL_EVENTO" value="<?php 
echo $NOMBRE_FISCAL_EVENTO; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NOMBRE_CONTACTO_EVENTO" value="<?php 
echo $NOMBRE_CONTACTO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CELULAR_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CELULAR_CONTACTO_1" value="<?php 
echo $CELULAR_CONTACTO_1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CORREO_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CORREO_CONTACTO_1" value="<?php 
echo $CORREO_CONTACTO_1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"AREA_CONTACTO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="AREA_CONTACTO_CLIENTE" value="<?php 
echo $AREA_CONTACTO_CLIENTE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="OBSERVACIONES_1" value="<?php 
echo $OBSERVACIONES_1; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"TIPO_DE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="TIPO_DE_EVENTO" value="<?php 
echo $TIPO_DE_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FORMATO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="FORMATO_EVENTO" value="<?php 
echo $FORMATO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="PAIS_DEL_EVENTO" value="<?php 
echo $PAIS_DEL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="CIUDAD_DEL_EVENTO" value="<?php 
echo $CIUDAD_DEL_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"HOTEL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="HOTEL_LUGAR" value="<?php 
echo $HOTEL_LUGAR; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"NUMERO_DE_PERSONAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="NUMERO_DE_PERSONAS" value="<?php 
echo $NUMERO_DE_PERSONAS; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center">
<table>
<tr>
<td>INICIA&nbsp;</td>
<td><input type="date" class="form-control" id="FECHA_INICIO_EVENTO" value="<?php 
echo $FECHA_INICIO_EVENTO; ?>"></td>
</tr>

<tr>

<td>TERMINA&nbsp;</td><td><input type="date" class="form-control" id="FECHA_INICIO_EVENTO2a" value="<?php 
echo $FECHA_INICIO_EVENTO2a; ?>"></td>

</tr>
</table>

</td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="time" class="form-control" id="NOMBRE_COMERCIAL" value="<?php 
echo $NOMBRE_COMERCIAL; ?>"></td>
<?php } ?>


<?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center">
<table>
<tr>
<td>INICIA&nbsp;</td>
<td><input type="date" class="form-control" id="FECHA_FINAL_EVENTO" value="<?php 
echo $FECHA_FINAL_EVENTO; ?>"></td>
</tr>
<tr>
<td>TERMINA&nbsp;</td><td><input type="date" class="form-control" id="FECHA_FINAL_EVENTO2a" value="<?php 
echo $FECHA_FINAL_EVENTO2a; ?>"></td>
</tr>
</table>
</td>
<?php } ?>



<?php  
if($database->plantilla_filtro($nombreTabla,"HORA_TERMINO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="time" class="form-control" id="HORA_TERMINO_EVENTO" value="<?php 
echo $HORA_TERMINO_EVENTO; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="date" class="form-control" id="FECHA_LLEGADA_STAFF" value="<?php 
echo $FECHA_LLEGADA_STAFF; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"HORA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="time" class="form-control" id="HORA_LLEGADA_STAFF" value="<?php 
echo $HORA_LLEGADA_STAFF; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="date" class="form-control" id="FECHA_REGRESO_STAFF" value="<?php 
echo $FECHA_REGRESO_STAFF; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"HORA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="time" class="form-control" id="HORA_REGRESO_STAFF" value="<?php 
echo $HORA_REGRESO_STAFF; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO_BODEGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="MATERIAL_EQUIPO_BODEGA" value="<?php 
echo $MATERIAL_EQUIPO_BODEGA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="date" class="form-control" id="FECHA_INICIO_MONTAJE" value="<?php 
echo $FECHA_INICIO_MONTAJE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"HORA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="time" class="form-control" id="HORA_INICIO_MONTAJE" value="<?php 
echo $HORA_INICIO_MONTAJE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"FECHA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="date" class="form-control" id="FECHA_DESMONTAJE" value="<?php 
echo $FECHA_DESMONTAJE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"HORA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="time" class="form-control" id="HORA_DESMONTAJE" value="<?php 
echo $HORA_DESMONTAJE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"LUGAR_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="LUGAR_MONTAJE" value="<?php 
echo $LUGAR_MONTAJE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"ARCHIVO_RELACIONADO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="ARCHIVO_RELACIONADO_MONTAJE" value="<?php 
echo $ARCHIVO_RELACIONADO_MONTAJE; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"SERVICIO_OTORGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="SERVICIO_OTORGAR" value="<?php 
echo $SERVICIO_OTORGAR; ?>"></td>
<?php } ?> 

<?php  
if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="SUBIR_COTIZACION" value="<?php
echo $SUBIR_COTIZACION; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"SUBIR_ORDEN_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="SUBIR_ORDEN_COMPRA" value="<?php
echo $SUBIR_ORDEN_COMPRA; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"SURIR_CONTRATO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="SUBIR_CONTRATO_FIRMADO" value="<?php
echo $SUBIR_CONTRATO_FIRMADO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION_FIRMADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="SUBIR_COTIZACION_FIRMADA" value="<?php
echo $SUBIR_COTIZACION_FIRMADA; ?>"></td>
<?php } ?><?php  
if($database->plantilla_filtro($nombreTabla,"LOGO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="LOGO_CLIENTE" value="<?php 
echo $LOGO_CLIENTE; ?>"></td>
<?php } ?>

<?php  
if($database->plantilla_filtro($nombreTabla,"IMAGEN_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#c9e8e8;text-align:center"><input type="text" class="form-control" id="IMAGEN_EVENTO" value="<?php 
echo $IMAGEN_EVENTO; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FALTA_POR_COBRAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#CCFF00;text-align:center"><input type="text" class="form-control" id="FALTA_POR_COBRAR_1" value="<?php 
echo $FALTA_POR_COBRAR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"FALTA_POR_FACTURAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#CCFF00;text-align:center"><input type="text" class="form-control" id="FALTA_POR_FACTURAR_1" value="<?php 
echo $FALTA_POR_FACTURAR; ?>"></td>
<?php } ?>
<?php  
if($database->plantilla_filtro($nombreTabla,"PERDIDA_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="background:#CCFF00;text-align:center"><input type="text" class="form-control" id="PERDIDA_FISCAL_1" value="<?php 
echo $PERDIDA_FISCAL; ?>"></td>
<?php } ?>

	
		<td style="background:#c9e8e8"></td>
		<td style="background:#c9e8e8"></td>
            </tr>			
        </thead>
		<?php 	if ($numrows<0){ ?>
		</table>

		<?php }else{ ?>		
        <tbody>
		<?php
		$finales=0;
		$totales = 'no';
		foreach ($datos as $key=>$row){$colspan = 0;?>
<tr style="background-color: white;"> <!-- Fondo sólido para que funcione el filtro -->
  <td>
    <input type="checkbox" 
           class="checkbox"
           data-id="<?php echo $row['NUMERO_EVENTO'];?>" 
           style="transform: scale(1.1); cursor: pointer;" 
           onchange="
               const fila = this.closest('tr');
               const id = this.getAttribute('data-id');
               if (this.checked) {
                   fila.style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
                   localStorage.setItem('checkbox_' + id, 'checked');
               } else {
                   fila.style.filter = 'none';
                   localStorage.removeItem('checkbox_' + id);
               }">
  </td>
  <td><?php echo $row["id04altaeventos"]; $colspan += 1; ?></td>



<?php 


	$urlARCHIVO_RELACIONADO_MONTAJE='';$urlSUBIR_CONTRATO_FIRMADO=''; $urlSUBIR_ORDEN_COMPRA='';  $urlLOGO_CLIENTE="";   $urlIMAGEN_EVENTO=""; $urlSUBIR_COTIZACION="";
	$urlSUBIR_COTIZACION_FIRMADA = "";
	$querycontras2 = $database->Listado_fotoseventos($row['id04altaeventos']);
	
	while($row2 = mysqli_fetch_array($querycontras2)){
		if($row2["SUBIR_CONTRATO_FIRMADO"]!=""){
		 $urlSUBIR_CONTRATO_FIRMADO .= "<a target='_blank'
                href='includes/archivos/".$row2["SUBIR_CONTRATO_FIRMADO"]."'>Visualizar!</a><br/>";
                }
				
				
		if($row2["SUBIR_ORDEN_COMPRA"]!=""){
		 $urlSUBIR_ORDEN_COMPRA .= "<a target='_blank'
                href='includes/archivos/".$row2["SUBIR_ORDEN_COMPRA"]."'>Visualizar!</a><br/>";
                }
				
		if($row2["LOGO_CLIENTE"]!=""){
		 $urlLOGO_CLIENTE.= "<a target='_blank'
                href='includes/archivos/".$row2["LOGO_CLIENTE"]."'>Visualizar!</a><br/>";
                }
				
		if($row2["IMAGEN_EVENTO"]!=""){
		 $urlIMAGEN_EVENTO .= "<a target='_blank'
                href='includes/archivos/".$row2["IMAGEN_EVENTO"]."'>Visualizar!</a><br/>";
                }
				
		if($row2["SUBIR_COTIZACION"]!=""){
		 $urlSUBIR_COTIZACION.= "<a target='_blank'
                href='includes/archivos/".$row2["SUBIR_COTIZACION"]."'>Visualizar!</a><br/>";
                }
				
		if($row2["SUBIR_COTIZACION_FIRMADA"]!=""){				
				$urlSUBIR_COTIZACION_FIRMADA.= "<a target='_blank'
				href='includes/archivos/".$row2["SUBIR_COTIZACION_FIRMADA"]."'>Visualizar!</a><br/>";
                }
		if($row2["ARCHIVO_RELACIONADO_MONTAJE"]!=""){				
				$urlARCHIVO_RELACIONADO_MONTAJE.= "<a target='_blank'
				href='includes/archivos/".$row2["ARCHIVO_RELACIONADO_MONTAJE"]."'>Visualizar!</a><br/>";
                }
				
}

?>


<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ 
$colspan += 1; 
?>


<td style="text-align:center">
<a href="calendarioDEeventos2.php?idevento=<?php echo $row['id04altaeventos']; ?>"><?php echo $row['NUMERO_EVENTO'];?></a>
</td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_ALTA_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ 
$colspan += 1;
?><td style="text-align:center"><?php echo date('d/m/Y', strtotime($row['FECHA_ALTA_EVENTO'])); ?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_VENDEDOR",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;
?><td style="text-align:center"><?php echo $row['NOMBRE_VENDEDOR'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EJECUTIVOEVENTO",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;
?><td style="text-align:center"><?php echo $row['NOMBRE_EJECUTIVOEVENTO'];?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_INGRESO",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;
?><td style="text-align:center"><?php echo $row['NOMBRE_INGRESO'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_AUDITOR",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;
?><td style="text-align:center"><?php echo $row['NOMBRE_AUDITOR'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;
?><td style="text-align:center"><?php echo $row['NOMBRE_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_CORTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){
	$colspan += 1;?><td style="text-align:center"><?php echo $row['NOMBRE_CORTO_EVENTO'];?></td>
<?php } ?>




<?php  if($database->plantilla_filtro($nombreTabla,"CIERRE_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;	
?><td style="text-align:center"><?php $fecha1 = $row['CIERRE_TOTAL'];

if (!empty($fecha1) && $fecha1 !== '0000-00-00' && $fecha1 !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha1));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"STATUS_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;	
?><td style="text-align:center"><?php echo $row['STATUS_EVENTO'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"MONEDAS",$altaeventos,$DEPARTAMENTO)=="si"){
$colspan += 1;	
?><td style="text-align:center"><?php echo $row['MONEDAS'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"MONTOC_TOTAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php echo number_format($row['MONTOC_TOTAL_EVENTO'],2,'.',',');
		$totales = 'si';
$MONTOC_TOTAL_EVENTO12 += $row['MONTOC_TOTAL_EVENTO'];
?></td>
<?php } ?>




<?php  if($database->plantilla_filtro($nombreTabla,"CANTIDAD_PORCENTAJEV",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php echo number_format($row['CANTIDAD_PORCENTAJEV'],2,'.',',');
		$totales = 'si';
$CANTIDAD_PORCENTAJEV12 += $row['CANTIDAD_PORCENTAJEV'];
?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_AVION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php echo  number_format($row['MONTO_TOTAL_AVION'],2,'.',',');
		$totales = 'si';
$MONTO_TOTAL_AVION12 += $row['MONTO_TOTAL_AVION'];
?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"TOTAL_AVION_SINIVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php
		$totales = 'si';
echo  number_format($row['TOTAL_AVION_SINIVA'],2,'.',',');
$TOTAL_AVION_SINIVA12 += $row['TOTAL_AVION_SINIVA'];
?></td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"PORCENTAJE_FEE",$altaeventos,$DEPARTAMENTO)=="si"){$colspan += 1;	 ?><td style="text-align:center">%<?php echo $row['PORCENTAJE_FEE']; ?></td>


<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FEE_COBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php echo  number_format($row['FEE_COBRADO'],2,'.',',');
		$totales = 'si';
$FEE_COBRADO12 += $row['FEE_COBRADO'];
?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php
		$totales = 'si';
echo number_format($row['MONTO_TOTAL_DEL_EVENTO'],2,'.',',');
$MONTO_TOTAL_DEL_EVENTO12 += $row['MONTO_TOTAL_DEL_EVENTO']; 
 ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_COMERCIAL_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_FISCAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_FISCAL_EVENTO'];?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_CONTACTO_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CELULAR_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CELULAR_CONTACTO_1'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CORREO_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CORREO_CONTACTO_1'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"AREA_CONTACTO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['AREA_CONTACTO_CLIENTE'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['OBSERVACIONES_1'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"TIPO_DE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['TIPO_DE_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FORMATO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['FORMATO_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['PAIS_DEL_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['CIUDAD_DEL_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"HOTEL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['HOTEL_LUGAR'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NUMERO_DE_PERSONAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php 
$totales = 'si';
echo $row['NUMERO_DE_PERSONAS'];

$NUMERO_DE_PERSONAS12 += $row['NUMERO_DE_PERSONAS'];?>
</td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $fecha = $row['FECHA_INICIO_EVENTO'];

if (!empty($fecha) && $fecha !== '0000-00-00' && $fecha !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['NOMBRE_COMERCIAL'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $fecha2 = $row['FECHA_FINAL_EVENTO'];

if (!empty($fecha2) && $fecha2 !== '0000-00-00' && $fecha2 !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha2));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"HORA_TERMINO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['HORA_TERMINO_EVENTO'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $fecha3 = $row['FECHA_LLEGADA_STAFF'];

if (!empty($fecha3) && $fecha3 !== '0000-00-00' && $fecha3 !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha3));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"HORA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['HORA_LLEGADA_STAFF'];?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"FECHA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $fecha4 = $row['FECHA_REGRESO_STAFF'];

if (!empty($fecha4) && $fecha4 !== '0000-00-00' && $fecha4 !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha4));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"HORA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['HORA_REGRESO_STAFF'];?></td>
<?php } ?>



<?php  if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO_BODEGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['MATERIAL_EQUIPO_BODEGA'];?></td>
<?php } ?>   
 <?php  if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $fecha5 = $row['FECHA_INICIO_MONTAJE'];

if (!empty($fecha5) && $fecha5 !== '0000-00-00' && $fecha5 !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha5));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>   
  <?php  if($database->plantilla_filtro($nombreTabla,"HORA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['HORA_INICIO_MONTAJE'];?></td>
<?php } ?>   
  <?php  if($database->plantilla_filtro($nombreTabla,"FECHA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php $fecha6 = $row['FECHA_DESMONTAJE'];

if (!empty($fecha6) && $fecha6 !== '0000-00-00' && $fecha6 !== '0000-00-00 00:00:00') {
    echo date('d/m/Y', strtotime($fecha6));
} else {
    echo ''; // o '—' si quieres mostrar algo
}?></td>
<?php } ?>   
  <?php  if($database->plantilla_filtro($nombreTabla,"HORA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['HORA_DESMONTAJE'];?></td>
<?php } ?>   
  <?php  if($database->plantilla_filtro($nombreTabla,"LUGAR_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['LUGAR_MONTAJE'];?></td>
<?php } ?>   

<?php  if($database->plantilla_filtro($nombreTabla,"ARCHIVO_RELACIONADO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlARCHIVO_RELACIONADO_MONTAJE; ?></td>
<?php } ?>   
  <?php  if($database->plantilla_filtro($nombreTabla,"SERVICIO_OTORGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $row['SERVICIO_OTORGAR'];?></td>
<?php } ?> 



<?php  if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlSUBIR_COTIZACION; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"SUBIR_ORDEN_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlSUBIR_ORDEN_COMPRA; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"SURIR_CONTRATO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlSUBIR_CONTRATO_FIRMADO; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION_FIRMADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlSUBIR_COTIZACION_FIRMADA; ?></td>
<?php } ?>
<?php  if($database->plantilla_filtro($nombreTabla,"LOGO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlLOGO_CLIENTE; ?></td>
<?php } ?>


<?php  if($database->plantilla_filtro($nombreTabla,"IMAGEN_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center"><?php echo $urlIMAGEN_EVENTO; ?></td>
<?php } ?>


<?php  
$montoTotalEvento = $database->montoTotalEvento($row['id04altaeventos']);

if($database->plantilla_filtro($nombreTabla,"FALTA_POR_COBRAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php
$faltaPorCobrar = $database->FALATA_POR_COBRAR($row['id04altaeventos'],$montoTotalEvento);
echo $faltaPorCobrar;
 $totales = 'si';
 $faltaporcobrartotal += floatval(str_replace(',', '', $faltaPorCobrar));


 ?>

 </td>
<?php } ?>

<?php  if($database->plantilla_filtro($nombreTabla,"FALTA_POR_FACTURAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?><td style="text-align:center">$<?php
$faltaPorFacturar = $database->FALATA_POR_FACTURAR($row['id04altaeventos'],$montoTotalEvento);
echo $faltaPorFacturar;
 $totales = 'si';
 $faltaporfacturartotal += floatval(str_replace(',', '', $faltaPorFacturar));


?></td>
<?php } ?>

<?php

 if($database->plantilla_filtro($nombreTabla,"PERDIDA_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>

<td style="text-align:center">$<?php
$perdidaFiscal = $database->PERDIDA_DE_COSTO_FISCAL($row['NUMERO_EVENTO']);
echo $perdidaFiscal;
 $totales = 'si';
 $perdidafiscaltotal += floatval(str_replace(',', '', $perdidaFiscal));

?></td>
<?php } ?>


			<td>
<?php if($database->variablespermisos('','CALENDARIO_EVENTOS','modificar')=='si'){ ?>
<input type="button" name="view" value="MODIFICAR" id="<?php echo $row["id04altaeventos"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosmodifica" />			
<?php } ?>
			</td>
			
			<td>
<?php if($database->variablespermisos('','CALENDARIO_EVENTOS','borrar')=='si'){ ?>
<input type="button" name="view2" value="BORRAR" id="<?php echo $row["id04altaeventos"]; ?>" class="btn btn-info btn-xs view_dataaltaeventosborrar" />
<?php } ?>
			</td>
  <td>
    <input type="checkbox" 
           class="checkbox"
           data-id="<?php echo $row['NUMERO_EVENTO'];?>" 
           style="transform: scale(1.1); cursor: pointer;" 
           onchange="
               const fila = this.closest('tr');
               const id = this.getAttribute('data-id');
               if (this.checked) {
                   fila.style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
                   localStorage.setItem('checkbox_' + id, 'checked');
               } else {
                   fila.style.filter = 'none';
                   localStorage.removeItem('checkbox_' + id);
               }">
  </td>			
		</tr>
			<?php
			$finales++;
		}	
	?>
	
		 
<?php if($database->variablespermisos('','totales_calendario','ver')=='si'){ ?>
<tr>
    <!-- Columna checkbox inicial -->
    <td></td>

    <!-- Columna # -->
    <td></td>

    <!-- NUMERO_EVENTO: aquí mostramos el título "TOTALES" -->
    <?php if($database->plantilla_filtro($nombreTabla,"NUMERO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td >
        </td>
    <?php } ?>

    <!-- FECHA_ALTA_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_ALTA_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_VENDEDOR -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_VENDEDOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_EJECUTIVOEVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_EJECUTIVOEVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_INGRESO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_INGRESO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_AUDITOR -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_AUDITOR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_CORTO_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_CORTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- CIERRE_TOTAL -->
    <?php if($database->plantilla_filtro($nombreTabla,"CIERRE_TOTAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- STATUS_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"STATUS_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- MONEDAS -->
    <?php if($database->plantilla_filtro($nombreTabla,"MONEDAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:right; padding-right:45px;">
            <strong style="font-size:16px">TOTALES</strong></td>
    <?php } ?>

    <!-- MONTOC_TOTAL_EVENTO (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"MONTOC_TOTAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($MONTOC_TOTAL_EVENTO12,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- CANTIDAD_PORCENTAJEV (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"CANTIDAD_PORCENTAJEV",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($CANTIDAD_PORCENTAJEV12,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- MONTO_TOTAL_AVION (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_AVION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($MONTO_TOTAL_AVION12,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- TOTAL_AVION_SINIVA (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"TOTAL_AVION_SINIVA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($TOTAL_AVION_SINIVA12,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- PORCENTAJE_FEE (sin total, solo col vacía si existe) -->
    <?php if($database->plantilla_filtro($nombreTabla,"PORCENTAJE_FEE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FEE_COBRADO (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"FEE_COBRADO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($FEE_COBRADO12,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- MONTO_TOTAL_DEL_EVENTO (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"MONTO_TOTAL_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($MONTO_TOTAL_DEL_EVENTO12,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- NOMBRE_COMERCIAL_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_FISCAL_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_FISCAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_CONTACTO_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_CONTACTO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- CELULAR_CONTACTO_1 -->
    <?php if($database->plantilla_filtro($nombreTabla,"CELULAR_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- CORREO_CONTACTO_1 -->
    <?php if($database->plantilla_filtro($nombreTabla,"CORREO_CONTACTO_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- AREA_CONTACTO_CLIENTE -->
    <?php if($database->plantilla_filtro($nombreTabla,"AREA_CONTACTO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- OBSERVACIONES_1 -->
    <?php if($database->plantilla_filtro($nombreTabla,"OBSERVACIONES_1",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- TIPO_DE_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"TIPO_DE_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FORMATO_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"FORMATO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- PAIS_DEL_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"PAIS_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- CIUDAD_DEL_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"CIUDAD_DEL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- HOTEL_LUGAR -->
    <?php if($database->plantilla_filtro($nombreTabla,"HOTEL_LUGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NUMERO_DE_PERSONAS (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"NUMERO_DE_PERSONAS",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                <?php echo $NUMERO_DE_PERSONAS12; ?>
            </strong>
        </td>
    <?php } ?>

    <!-- FECHA_INICIO_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- NOMBRE_COMERCIAL (hora inicio evento) -->
    <?php if($database->plantilla_filtro($nombreTabla,"NOMBRE_COMERCIAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FECHA_FINAL_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_FINAL_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- HORA_TERMINO_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"HORA_TERMINO_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FECHA_LLEGADA_STAFF -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- HORA_LLEGADA_STAFF -->
    <?php if($database->plantilla_filtro($nombreTabla,"HORA_LLEGADA_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FECHA_REGRESO_STAFF -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- HORA_REGRESO_STAFF -->
    <?php if($database->plantilla_filtro($nombreTabla,"HORA_REGRESO_STAFF",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- MATERIAL_EQUIPO_BODEGA -->
    <?php if($database->plantilla_filtro($nombreTabla,"MATERIAL_EQUIPO_BODEGA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FECHA_INICIO_MONTAJE -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- HORA_INICIO_MONTAJE -->
    <?php if($database->plantilla_filtro($nombreTabla,"HORA_INICIO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FECHA_DESMONTAJE -->
    <?php if($database->plantilla_filtro($nombreTabla,"FECHA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- HORA_DESMONTAJE -->
    <?php if($database->plantilla_filtro($nombreTabla,"HORA_DESMONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- LUGAR_MONTAJE -->
    <?php if($database->plantilla_filtro($nombreTabla,"LUGAR_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- ARCHIVO_RELACIONADO_MONTAJE -->
    <?php if($database->plantilla_filtro($nombreTabla,"ARCHIVO_RELACIONADO_MONTAJE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- SERVICIO_OTORGAR -->
    <?php if($database->plantilla_filtro($nombreTabla,"SERVICIO_OTORGAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- SUBIR_COTIZACION -->
    <?php if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- SUBIR_ORDEN_COMPRA -->
    <?php if($database->plantilla_filtro($nombreTabla,"SUBIR_ORDEN_COMPRA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- SURIR_CONTRATO -->
    <?php if($database->plantilla_filtro($nombreTabla,"SURIR_CONTRATO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- SUBIR_COTIZACION_FIRMADA -->
    <?php if($database->plantilla_filtro($nombreTabla,"SUBIR_COTIZACION_FIRMADA",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- LOGO_CLIENTE -->
    <?php if($database->plantilla_filtro($nombreTabla,"LOGO_CLIENTE",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- IMAGEN_EVENTO -->
    <?php if($database->plantilla_filtro($nombreTabla,"IMAGEN_EVENTO",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td></td>
    <?php } ?>

    <!-- FALTA_POR_COBRAR (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"FALTA_POR_COBRAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($faltaporcobrartotal,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- FALTA_POR_FACTURAR (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"FALTA_POR_FACTURAR",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($faltaporfacturartotal,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>

    <!-- PERDIDA_FISCAL (TOTAL) -->
    <?php if($database->plantilla_filtro($nombreTabla,"PERDIDA_FISCAL",$altaeventos,$DEPARTAMENTO)=="si"){ ?>
        <td style="text-align:center">
            <strong style="font-size:16px">
                $<?php echo number_format($perdidafiscaltotal,2,'.',','); ?>
            </strong>
        </td>
    <?php } ?>		
    <?php } ?>		
 
		</tbody>
		</table>
		</div>
		
		<div class="clearfix">
			<?php 
				$inicios=$offset+1;
				$finales+=$inicios -1;
				echo '<div class="hint-text">Mostrando '.$inicios.' al '.$finales.' de '.$numrows.' registros</div>';
				echo $pagination->paginate();
			?>
        </div>
	<?php
	}
}
?>
