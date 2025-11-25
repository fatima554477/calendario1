<?php
/**
 	--------------------------
	Autor: Sandor Matamoros
	Programer: Fatima Arellano
	Propietario: EPC
	--------------------------
	calendariodeeventos2/PERSONAL2.php, 
	calendariodeeventos2/PERSONAL.php, 
	calendariodeeventos2/class.epcinnAE.php,
	calendariodeeventos/clases/class.filtro.php,
	calendariodeeventos/clases/controlador_filtro.php
*/
	
	define('__ROOT1__', dirname(dirname(__FILE__)));
	include_once (__ROOT1__."/../includes/error_reporting.php");
	include_once (__ROOT1__."/../calendariodeeventos2/class.epcinnAE.php");

	
	class orders extends accesoclase {
	public $mysqli;
	public $counter;//Propiedad para almacenar el numero de registro devueltos por la consulta

	function __construct(){
		$this->mysqli = $this->db();
    }
	
	public function countAll($sql){
		$query=$this->mysqli->query($sql);
		$count=$query->num_rows;
		return $count;
	}
	
	function bloqueartodo($valor){
		$conn = $this->db();
		$var_query = "select * from 01empresa where CHECKBOX = 'si' and  id = '".$_SESSION['idem']."' ";
		$query = mysqli_query($conn,$var_query);
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$id = isset($row['id'])?$row['id']:0;
		return $id;
	}
	
	//STATUS_EVENTO,NOMBRE_CORTO_EVENTO,NOMBRE_EVENTO
	public function getData($tables,$campos,$search){
		$tables = '04altaeventos';
		$tables2 = '04pagosingresos';	
		$offset=$search['offset'];
		$per_page=$search['per_page'];
		//$sWhere=" `NUMERO_EVENTO` is not null ";
		$sWhere=" COALESCE($tables.`NUMERO_EVENTO`, '') <> '' ";
		$sWhere2="";$sWhere3="";
		
		
//////////////// CLASE.FILTRO.PHP S1////////////////////////////////
if($search['NUMERO_EVENTO']!=""){
$sWhere2.=" $tables.NUMERO_EVENTO LIKE '%".$search['NUMERO_EVENTO']."%' AND ";
}
if($search['FECHA_ALTA_EVENTO']!=""){
$sWhere2.=" $tables.FECHA_ALTA_EVENTO LIKE '%".$search['FECHA_ALTA_EVENTO']."%' AND ";
}
if($search['STATUS_EVENTO']!=""){
$sWhere2.=" $tables.STATUS_EVENTO LIKE '%".$search['STATUS_EVENTO']."%' AND ";
}
if($search['MONTOC_TOTAL_EVENTO']!=""){
$sWhere2.=" $tables.MONTOC_TOTAL_EVENTO LIKE '%".str_replace(',','',$search['MONTOC_TOTAL_EVENTO'])."%' AND ";
}
if($search['MONTO_TOTAL_AVION']!=""){
$sWhere2.=" $tables.MONTO_TOTAL_AVION LIKE '%".str_replace(',','',$search['MONTO_TOTAL_AVION'])."%' AND ";
}
if($search['CANTIDAD_PORCENTAJEV']!=""){
$sWhere2.=" $tables.CANTIDAD_PORCENTAJEV LIKE '%".str_replace(',','',$search['CANTIDAD_PORCENTAJEV'])."%' AND ";
}
if($search['PORCENTAJE_FEE']!=""){
$sWhere2.=" $tables.PORCENTAJE_FEE LIKE '%".str_replace(',','',$search['PORCENTAJE_FEE'])."%' AND ";
}
if($search['FEE_COBRADO']!=""){
$sWhere2.=" $tables.FEE_COBRADO LIKE '%".str_replace(',','',$search['FEE_COBRADO'])."%' AND ";
}
if($search['MONTO_TOTAL_DEL_EVENTO']!=""){
$sWhere2.=" $tables.MONTO_TOTAL_DEL_EVENTO LIKE '%".str_replace(',','',$search['MONTO_TOTAL_DEL_EVENTO'])."%' AND ";
}
if($search['NOMBRE_COMERCIAL_EVENTO']!=""){
$sWhere2.=" $tables.NOMBRE_COMERCIAL_EVENTO LIKE '%".$search['NOMBRE_COMERCIAL_EVENTO']."%' AND ";
}
if($search['NOMBRE_FISCAL_EVENTO']!=""){
$sWhere2.=" $tables.NOMBRE_FISCAL_EVENTO LIKE '%".$search['NOMBRE_FISCAL_EVENTO']."%' AND ";
}
if($search['NOMBRE_EVENTO']!=""){
$sWhere2.=" $tables.NOMBRE_EVENTO LIKE '%".$search['NOMBRE_EVENTO']."%' AND ";
}
if($search['NOMBRE_CORTO_EVENTO']!=""){
$sWhere2.=" $tables.NOMBRE_CORTO_EVENTO LIKE '%".$search['NOMBRE_CORTO_EVENTO']."%' AND ";
}
if($search['NOMBRE_CONTACTO_EVENTO']!=""){
$sWhere2.=" $tables.NOMBRE_CONTACTO_EVENTO LIKE '%".$search['NOMBRE_CONTACTO_EVENTO']."%' AND ";
}
if($search['CELULAR_CONTACTO_1']!=""){
$sWhere2.=" $tables.CELULAR_CONTACTO_1 LIKE '%".$search['CELULAR_CONTACTO_1']."%' AND ";
}
if($search['CORREO_CONTACTO_1']!=""){
$sWhere2.=" $tables.CORREO_CONTACTO_1 LIKE '%".$search['CORREO_CONTACTO_1']."%' AND ";
}
if($search['AREA_CONTACTO_CLIENTE']!=""){
$sWhere2.=" $tables.AREA_CONTACTO_CLIENTE LIKE '%".$search['AREA_CONTACTO_CLIENTE']."%' AND ";
}
if($search['OBSERVACIONES_1']!=""){
$sWhere2.=" $tables.OBSERVACIONES_1 LIKE '%".$search['OBSERVACIONES_1']."%' AND ";
}
if($search['TIPO_DE_EVENTO']!=""){
$sWhere2.=" $tables.TIPO_DE_EVENTO LIKE '%".$search['TIPO_DE_EVENTO']."%' AND ";
}
if($search['FORMATO_EVENTO']!=""){
$sWhere2.=" $tables.FORMATO_EVENTO LIKE '%".$search['FORMATO_EVENTO']."%' AND ";
}
if($search['PAIS_DEL_EVENTO']!=""){
$sWhere2.=" $tables.PAIS_DEL_EVENTO LIKE '%".$search['PAIS_DEL_EVENTO']."%' AND ";
}
if($search['CIUDAD_DEL_EVENTO']!=""){
$sWhere2.=" $tables.CIUDAD_DEL_EVENTO LIKE '%".$search['CIUDAD_DEL_EVENTO']."%' AND ";
}
if($search['HOTEL_LUGAR']!=""){
$sWhere2.=" $tables.HOTEL_LUGAR LIKE '%".$search['HOTEL_LUGAR']."%' AND ";
}
if($search['NUMERO_DE_PERSONAS']!=""){
$sWhere2.=" $tables.NUMERO_DE_PERSONAS LIKE '%".$search['NUMERO_DE_PERSONAS']."%' AND ";
}

if($search['FECHA_FINAL_EVENTO']!="" and $search['FECHA_FINAL_EVENTO2a']!=""){
//BETWEEN '2022-01-12' AND '2022-01-22' DATE(`ribono_tabla`.fechaamazon) 	
$sWhere2.=" $tables.FECHA_FINAL_EVENTO BETWEEN 
'".$search['FECHA_FINAL_EVENTO']."' and '".$search['FECHA_FINAL_EVENTO2a']."'  AND ";
}elseif($search['FECHA_FINAL_EVENTO']!=""){
$sWhere2.=" $tables.FECHA_FINAL_EVENTO LIKE '%".$search['FECHA_FINAL_EVENTO']."%' AND ";
}elseif($search['FECHA_FINAL_EVENTO2a']!=""){
$sWhere2.=" $tables.FECHA_FINAL_EVENTO LIKE '%".$search['FECHA_FINAL_EVENTO2a']."%' AND ";
}




if($search['FECHA_INICIO_EVENTO']!="" and $search['FECHA_INICIO_EVENTO2a']!=""){
$sWhere2.=" $tables.FECHA_INICIO_EVENTO BETWEEN 
'".$search['FECHA_INICIO_EVENTO']."' and '".$search['FECHA_INICIO_EVENTO2a']."'  AND ";
$ordenfecha = 'ASC';
}elseif($search['FECHA_INICIO_EVENTO']!=""){
$sWhere2.=" $tables.FECHA_INICIO_EVENTO LIKE '%".$search['FECHA_INICIO_EVENTO']."%' AND ";
$ordenfecha = 'ASC';
}elseif($search['FECHA_INICIO_EVENTO2a']!=""){
$sWhere2.=" $tables.FECHA_INICIO_EVENTO LIKE '%".$search['FECHA_INICIO_EVENTO2a']."%' AND ";
$ordenfecha = 'ASC';
}ELSE{
	$ordenfecha = 'DESC';
}

if($search['NOMBRE_COMERCIAL']!=""){
$sWhere2.=" $tables.NOMBRE_COMERCIAL LIKE '%".$search['NOMBRE_COMERCIAL']."%' AND ";
}

if($search['HORA_TERMINO_EVENTO']!=""){
$sWhere2.=" $tables.HORA_TERMINO_EVENTO LIKE '%".$search['HORA_TERMINO_EVENTO']."%' AND ";
}
if($search['FECHA_LLEGADA_STAFF']!=""){
$sWhere2.=" $tables.FECHA_LLEGADA_STAFF LIKE '%".$search['FECHA_LLEGADA_STAFF']."%' AND ";
}
if($search['HORA_LLEGADA_STAFF']!=""){
$sWhere2.=" $tables.HORA_LLEGADA_STAFF LIKE '%".$search['HORA_LLEGADA_STAFF']."%' AND ";
}
if($search['FECHA_REGRESO_STAFF']!=""){
$sWhere2.=" $tables.FECHA_REGRESO_STAFF LIKE '%".$search['FECHA_REGRESO_STAFF']."%' AND ";
}
if($search['HORA_REGRESO_STAFF']!=""){
$sWhere2.=" $tables.HORA_REGRESO_STAFF LIKE '%".$search['HORA_REGRESO_STAFF']."%' AND ";
}


if($search['MATERIAL_EQUIPO_BODEGA']!=""){
$sWhere2.=" $tables.MATERIAL_EQUIPO_BODEGA LIKE '%".$search['MATERIAL_EQUIPO_BODEGA']."%' AND ";
}
if($search['FECHA_INICIO_MONTAJE']!=""){
$sWhere2.=" $tables.FECHA_INICIO_MONTAJE LIKE '%".$search['FECHA_INICIO_MONTAJE']."%' AND ";
}
if($search['HORA_INICIO_MONTAJE']!=""){
$sWhere2.=" $tables.HORA_INICIO_MONTAJE LIKE '%".$search['HORA_INICIO_MONTAJE']."%' AND ";
}
if($search['FECHA_DESMONTAJE']!=""){
$sWhere2.=" $tables.FECHA_DESMONTAJE LIKE '%".$search['FECHA_DESMONTAJE']."%' AND ";
}
if($search['HORA_DESMONTAJE']!=""){
$sWhere2.=" $tables.HORA_DESMONTAJE LIKE '%".$search['HORA_DESMONTAJE']."%' AND ";
}
if($search['LUGAR_MONTAJE']!=""){
$sWhere2.=" $tables.LUGAR_MONTAJE LIKE '%".$search['LUGAR_MONTAJE']."%' AND ";
}
if($search['SERVICIO_OTORGAR']!=""){
$sWhere2.=" $tables.SERVICIO_OTORGAR LIKE '%".$search['SERVICIO_OTORGAR']."%' AND ";
}
if($search['MONEDAS']!=""){
$sWhere2.=" $tables.MONEDAS LIKE '%".$search['MONEDAS']."%' AND ";
}
if($search['NOMBRE_VENDEDOR']!=""){
$sWhere2.=" $tables.NOMBRE_VENDEDOR LIKE '%".$search['NOMBRE_VENDEDOR']."%' AND ";
}
if($search['NOMBRE_EJECUTIVOEVENTO']!=""){
$sWhere2.=" $tables.NOMBRE_EJECUTIVOEVENTO LIKE '%".$search['NOMBRE_EJECUTIVOEVENTO']."%' AND ";
}
if($search['CIERRE_TOTAL']!=""){
$sWhere2.=" $tables.CIERRE_TOTAL LIKE '%".$search['CIERRE_TOTAL']."%' AND ";
}

if($search['TOTAL_AVION_SINIVA']!=""){
$sWhere2.=" $tables.TOTAL_AVION_SINIVA LIKE '%".$search['TOTAL_AVION_SINIVA']."%' AND ";
}


if($search['NOMBRE_INGRESO']!=""){
$sWhere2.=" $tables.NOMBRE_INGRESO LIKE '%".$search['NOMBRE_INGRESO']."%' AND ";
}

if($search['NOMBRE_AUDITOR']!=""){
$sWhere2.=" $tables.NOMBRE_AUDITOR LIKE '%".$search['NOMBRE_AUDITOR']."%' AND ";
}

if($search['FALTA_POR_COBRAR']!=""){
$sWhere2.=" $tables2.FALTA_POR_COBRAR LIKE '%".$search['FALTA_POR_COBRAR']."%' AND ";
}

if($search['FALTA_POR_FACTURAR']!=""){
$sWhere2.=" $tables2.FALTA_POR_FACTURAR LIKE '%".$search['FALTA_POR_FACTURAR']."%' AND ";
}

if($search['PERDIDA_FISCAL']!=""){
$sWhere2.=" $tables2.PERDIDA_FISCAL LIKE '%".$search['PERDIDA_FISCAL']."%' AND ";
}

		


		IF($sWhere2!=""){
			$sWhere22 = substr($sWhere2,0,-4);
			$sWhere3  = ' AND ( '.$sWhere22.' ) ';
		}ELSE{
			$sWhere3  = '';	
		}



$resultado1234 = $this->bloqueartodo($sWhere3);
if($resultado1234 == 0) {
   
    $sWhere2extra1 = " 04altaeventos 
        INNER JOIN (
            SELECT DISTINCT idRelacion 
            FROM 04personal 
            WHERE idPersonal = '".$_SESSION['idem']."'
			AND autoriza = 'si'
            UNION
            SELECT DISTINCT idRelacion 
            FROM 04personal2 
            WHERE idPersonal = '".$_SESSION['idem']."'
			AND autoriza = 'si'
        ) AS personal 
        ON 04altaeventos.id = personal.idRelacion ";
    
    $sWhere2extra2 = " ";  
} else {
    $sWhere2extra1 = $tables;  
    $sWhere2extra2 = " ";
}
	


$sWhere3 .= " ORDER BY FECHA_INICIO_EVENTO $ordenfecha ";
		
		$sql="SELECT $campos,$tables.id as id04altaeventos FROM 
		$sWhere2extra1
		where $sWhere $sWhere2extra2 $sWhere3 LIMIT $offset,$per_page";
		
		$query=$this->mysqli->query($sql);
		$sql1="SELECT $campos,$tables.id as id04altaeventos FROM
		$sWhere2extra1 
		where $sWhere $sWhere2extra2 $sWhere3 ";
		
		$nums_row=$this->countAll($sql1);
		//Set counter
		$this->setCounter($nums_row);
		return $query;
	}
	
	
	function salta04personal2($valor){
		$conn = $this->db();
		$var_query = "select * from 04personal2 where idRelacion = '".$valor."' and  SUBSTRING_INDEX(NOMBRE_PERSONAL2,'^^',1) = '".$_SESSION['idem']."' ";
		$query = mysqli_query($conn,$var_query);
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		$id = isset($row['id'])?$row['id']:0;
		return $id;
	}


	
	
	function setCounter($counter) {
		$this->counter = $counter;
	}
	function getCounter() {
		return $this->counter;
	}

	function PERDIDA_DE_COSTO_FISCAL($NUMERO_EVENTO){
	$con = $this->db();
	

$VarCOMPROBACION = 'SELECT subTotal, UUID, MONTO_DEPOSITAR, STATUS_CHECKBOX ,MONTO_FACTURA
                    FROM 07COMPROBACION 
                    LEFT JOIN 07XML ON 07COMPROBACION.id = 07XML.`ultimo_id` 
                    WHERE 07COMPROBACION.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'"';
$QUERYCOMPROBACION = mysqli_query($con, $VarCOMPROBACION);

while($ROWd = mysqli_fetch_array($QUERYCOMPROBACION)){
    // Verificar si falta UUID o el checkbox es 'no' o null
if (($ROWd['STATUS_CHECKBOX'] === 'no' || $ROWd['STATUS_CHECKBOX'] === null) && strlen(trim($ROWd['UUID'])) < 1) {
        $PorfaltaDeFacturaCOMPROBACION += $ROWd['MONTO_DEPOSITAR'] * 1.46;
    }     else {
        // Si subTotal es válido (no nulo, no vacío y numérico), se usa; si no, se usa MONTO_FACTURA
        if (isset($ROWd['subTotal']) && is_numeric($ROWd['subTotal']) && $ROWd['subTotal'] > 0) {
            $subTotalCOMPROBACION += $ROWd['subTotal'];
        } else {
            $subTotalCOMPROBACION += $ROWd['MONTO_FACTURA'];
        }
    }
}





$VarSUBE = 'SELECT subTotal, UUID, MONTO_DEPOSITAR ,STATUS_CHECKBOX ,MONTO_FACTURA
            FROM 02SUBETUFACTURA 
            LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` 
            WHERE 02SUBETUFACTURA.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" 
			LEFT JOIN 02SUBETUFACTURADOCTOS 
            ON 02SUBETUFACTURA.id = 02SUBETUFACTURADOCTOS.COMPROBANTE_DE_DEVOLUCION
            AND 02SUBETUFACTURA.ID_RELACIONADO != ""';  

$QUERYSUBE = mysqli_query($con, $VarSUBE);

while ($ROWe = mysqli_fetch_array($QUERYSUBE)) {

    if (($ROWe['STATUS_CHECKBOX'] === 'no' || $ROWe['STATUS_CHECKBOX'] === null) && strlen(trim($ROWe['UUID'])) < 1) {
        $PorfaltaDeFacturaSUBE += $ROWe['MONTO_DEPOSITAR'] * 1.46;
    } 
  
    else {
       
        if (isset($ROWe['subTotal']) && is_numeric($ROWe['subTotal']) && $ROWe['subTotal'] > 0) {
            $subTotalSUBETUFACTURA += $ROWe['subTotal'];
        } else {
            $subTotalSUBETUFACTURA += $ROWe['MONTO_FACTURA'];
        }
    }
}


/////////////////////////////////////////////nuevo///////////////////////////////////////////






$VarSUBE2 = 'SELECT subTotal, UUID, MONTO_DEPOSITAR ,STATUS_CHECKBOX ,MONTO_FACTURA
            FROM 02SUBETUFACTURA 
            LEFT JOIN 02XML ON 02SUBETUFACTURA.id = 02XML.`ultimo_id` 
            WHERE 02SUBETUFACTURA.NUMERO_EVENTO = "'.$NUMERO_EVENTO.'" 
            AND 02SUBETUFACTURA.VIATICOSOPRO = "PAGO A PROVEEDOR"'; 

$QUERYSUBE2 = mysqli_query($con, $VarSUBE2);

while ($ROWe2 = mysqli_fetch_array($QUERYSUBE2)) {

    if (($ROWe2['STATUS_CHECKBOX'] === 'no' || $ROWe2['STATUS_CHECKBOX'] === null) && strlen(trim($ROWe2['UUID'])) < 1) {
        $PorfaltaDeFacturaSUBE2 += $ROWe2['MONTO_DEPOSITAR'] * 1.46;
    } 
    else {
     
        if (isset($ROWe2['subTotal']) && is_numeric($ROWe2['subTotal']) && $ROWe2['subTotal'] > 0) {
          $subTotalSUBETUFACTURA2 += $ROWe2['MONTO_FACTURA'];  
        } else {
           $subTotalSUBETUFACTURA2 += $ROWe2['subTotal']; 
        }
    }
}



		$PorfaltaDeFactura = $PorfaltaDeFacturaAvion + $PorfaltaDeFacturaCOMPROBACION + $PorfaltaDeFacturaSUBE +$PorfaltaDeFacturaSUBE2;
		
		return number_format($PorfaltaDeFactura,2,'.',',');
	}
	
	
	

	function FALATA_POR_COBRAR($idRelacion,$montoTotalEvento){
	$con = $this->db();

	$variablequeryI2 = "select * from 04pagosingresos WHERE idRelacion = '".$idRelacion."' order by id asc ";
	$arrayqueryI2 = mysqli_query($con,$variablequeryI2);
	while($rowIngreso2 = mysqli_fetch_array($arrayqueryI2) ){

	if($rowIngreso2['pagado']=='si'){
	//echo number_format($rowIngreso2['MONTOCON_IVA'],2,'.',',');
	$monto_x_pagar = $rowIngreso2['MONTOCON_IVA'];
	$montoTotalPagado += $monto_x_pagar;
	}
	else{
	//echo number_format(0.00,2,'.',',');
	$monto_x_pagar = 0;
	$montoTotalNoPagado += $rowIngreso2['MONTOCON_IVA'];
	}

	$montoTotalRestado += ($monto_x_pagar); 
	}
	

		return number_format($montoTotalEvento - $montoTotalRestado,2,'.',',');
	}

	function FALATA_POR_FACTURAR($idRelacion,$montoTotalEvento){
	$con = $this->db();


	$variablequeryI2 = "select * from 04pagosingresos WHERE idRelacion = '".$idRelacion."' order by id asc ";
	$arrayqueryI2 = mysqli_query($con,$variablequeryI2);
	while($rowIngreso2 = mysqli_fetch_array($arrayqueryI2) ){

	if($rowIngreso2['pagado']=='si'){
	//echo number_format($rowIngreso2['MONTOCON_IVA'],2,'.',',');
	$monto_x_pagar = $rowIngreso2['MONTOCON_IVA'];
	$montoTotalPagado += $monto_x_pagar;
	}
	else{
	//echo number_format(0.00,2,'.',',');
	//$monto_x_pagar = 0;
	$montoTotalNoPagado += $rowIngreso2['MONTOCON_IVA'];
	}

	//$montoTotalRestado += ($monto_x_pagar); 
	}

        $totalPendiente = $montoTotalEvento - ($montoTotalPagado + $montoTotalNoPagado);
       return number_format($totalPendiente, 2, '.', ',');
	}

	public function montoTotalEvento($idRelacion){
	$con = $this->db();
		$variablequery = "select * from 04altaeventos where id = '".$idRelacion."' ";
		$arrayquery = mysqli_query($con,$variablequery);
		$ROWevento = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
	return $montoTotalEvento = isset($ROWevento["MONTO_TOTAL_DEL_EVENTO"])?$ROWevento["MONTO_TOTAL_DEL_EVENTO"]:"";
	}

}

