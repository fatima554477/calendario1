<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

define('__ROOT1__', dirname(dirname(__FILE__)));
include_once (__ROOT1__."/includes/error_reporting.php");
include_once (__ROOT1__."/calendariodeeventos/class.epcinnCE.php");

$altaeventos  = NEW accesoclase();
$conexion = NEW colaboradores();
$hALTAEVENTOS = isset($_POST["hALTAEVENTOS"])?$_POST["hALTAEVENTOS"]:"";
$enviaraltaeventos = isset($_POST["enviaraltaeventos"])?$_POST["enviaraltaeventos"]:"";
$borraraltaeventos = isset($_POST["borraraltaeventos"])?$_POST["borraraltaeventos"]:"";   
$borrafoto = isset($_POST["borrafoto"])?$_POST["borrafoto"]:"";	
$hnumeroevento = isset($_POST["hnumeroevento"])?$_POST["hnumeroevento"]:"";
$enviarnumeroE = isset($_POST["enviarnumeroE"])?$_POST["enviarnumeroE"]:"";
$busqueda = isset($_POST["busqueda"])?$_POST["busqueda"]:"";


if($busqueda==true){

	 $resultado = $altaeventos->buscarnumero($busqueda);
	 echo json_encode($resultado);
}                                                                           

if($hALTAEVENTOS == 'hALTAEVENTOS' ){
$FECHA_ALTA_EVENTO = isset($_POST["FECHA_ALTA_EVENTO"])?$_POST["FECHA_ALTA_EVENTO"]:"";
$STATUS_EVENTO = isset($_POST["STATUS_EVENTO"])?$_POST["STATUS_EVENTO"]:"";
$FECHA_AUTORIZACION_EVENTO = isset($_POST["FECHA_AUTORIZACION_EVENTO"])?$_POST["FECHA_AUTORIZACION_EVENTO"]:"";
$MONTOC_TOTAL_EVENTO = isset($_POST["MONTOC_TOTAL_EVENTO"])?$_POST["MONTOC_TOTAL_EVENTO"]:"";
$MONTO_TOTAL_AVION = isset($_POST["MONTO_TOTAL_AVION"])?$_POST["MONTO_TOTAL_AVION"]:"";
$CANTIDAD_PORCENTAJEV = isset($_POST["CANTIDAD_PORCENTAJEV"])?$_POST["CANTIDAD_PORCENTAJEV"]:"";
$FEE_COBRADO = isset($_POST["FEE_COBRADO"])?$_POST["FEE_COBRADO"]:"";
$PORCENTAJE_FEE = isset($_POST["PORCENTAJE_FEE"])?$_POST["PORCENTAJE_FEE"]:"";
$MONTO_TOTAL_DEL_EVENTO = isset($_POST["MONTO_TOTAL_DEL_EVENTO"])?$_POST["MONTO_TOTAL_DEL_EVENTO"]:"";
$NOMBRE_COMERCIAL_EVENTO = isset($_POST["NOMBRE_COMERCIAL_EVENTO"])?$_POST["NOMBRE_COMERCIAL_EVENTO"]:"";
$NOMBRE_FISCAL_EVENTO = isset($_POST["NOMBRE_FISCAL_EVENTO"])?$_POST["NOMBRE_FISCAL_EVENTO"]:"";
$NOMBRE_EVENTO = isset($_POST["NOMBRE_EVENTO"])?$_POST["NOMBRE_EVENTO"]:"";
$NOMBRE_CORTO_EVENTO = isset($_POST["NOMBRE_CORTO_EVENTO"])?$_POST["NOMBRE_CORTO_EVENTO"]:"";
$NOMBRE_CONTACTO_EVENTO = isset($_POST["NOMBRE_CONTACTO_EVENTO"])?$_POST["NOMBRE_CONTACTO_EVENTO"]:"";
$CELULAR_CONTACTO_1 = isset($_POST["CELULAR_CONTACTO_1"])?$_POST["CELULAR_CONTACTO_1"]:"";
$CORREO_CONTACTO_1 = isset($_POST["CORREO_CONTACTO_1"])?$_POST["CORREO_CONTACTO_1"]:"";
$AREA_CONTACTO_CLIENTE = isset($_POST["AREA_CONTACTO_CLIENTE"])?$_POST["AREA_CONTACTO_CLIENTE"]:"";
$OBSERVACIONES_1 = isset($_POST["OBSERVACIONES_1"])?$_POST["OBSERVACIONES_1"]:"";
$TIPO_DE_EVENTO = isset($_POST["TIPO_DE_EVENTO"])?$_POST["TIPO_DE_EVENTO"]:"";
$FORMATO_EVENTO = isset($_POST["FORMATO_EVENTO"])?$_POST["FORMATO_EVENTO"]:"";
$PAIS_DEL_EVENTO = isset($_POST["PAIS_DEL_EVENTO"])?$_POST["PAIS_DEL_EVENTO"]:"";
$CIUDAD_DEL_EVENTO = isset($_POST["CIUDAD_DEL_EVENTO"])?$_POST["CIUDAD_DEL_EVENTO"]:"";
$HOTEL_LUGAR = isset($_POST["HOTEL_LUGAR"])?$_POST["HOTEL_LUGAR"]:"";
$NUMERO_DE_PERSONAS = isset($_POST["NUMERO_DE_PERSONAS"])?$_POST["NUMERO_DE_PERSONAS"]:"";
$FECHA_INICIO_EVENTO = isset($_POST["FECHA_INICIO_EVENTO"])?$_POST["FECHA_INICIO_EVENTO"]:"";
$NOMBRE_COMERCIAL = isset($_POST["NOMBRE_COMERCIAL"])?$_POST["NOMBRE_COMERCIAL"]:"";
$FECHA_FINAL_EVENTO = isset($_POST["FECHA_FINAL_EVENTO"])?$_POST["FECHA_FINAL_EVENTO"]:"";
$HORA_TERMINO_EVENTO = isset($_POST["HORA_TERMINO_EVENTO"])?$_POST["HORA_TERMINO_EVENTO"]:"";
$FECHA_LLEGADA_STAFF = isset($_POST["FECHA_LLEGADA_STAFF"])?$_POST["FECHA_LLEGADA_STAFF"]:"";
$HORA_LLEGADA_STAFF = isset($_POST["HORA_LLEGADA_STAFF"])?$_POST["HORA_LLEGADA_STAFF"]:"";
$FECHA_REGRESO_STAFF = isset($_POST["FECHA_REGRESO_STAFF"])?$_POST["FECHA_REGRESO_STAFF"]:"";
$HORA_REGRESO_STAFF = isset($_POST["HORA_REGRESO_STAFF"])?$_POST["HORA_REGRESO_STAFF"]:"";
$MONEDAS = isset($_POST["MONEDAS"])?$_POST["MONEDAS"]:"";
$NOMBRE_VENDEDOR = isset($_POST["NOMBRE_VENDEDOR"])?$_POST["NOMBRE_VENDEDOR"]:"";
$NOMBRE_EJECUTIVOEVENTO = isset($_POST["NOMBRE_EJECUTIVOEVENTO"])?$_POST["NOMBRE_EJECUTIVOEVENTO"]:"";
$CIERRE_TOTAL = isset($_POST["CIERRE_TOTAL"])?$_POST["CIERRE_TOTAL"]:"";
$NOMBRE_INGRESO = isset($_POST["NOMBRE_INGRESO"])?$_POST["NOMBRE_INGRESO"]:"";
$hALTAEVENTOS = isset($_POST["hALTAEVENTOS"])?$_POST["hALTAEVENTOS"]:""; 
$IPaltaeventos = isset($_POST["IPaltaeventos"])?$_POST["IPaltaeventos"]:"";

	
   echo $altaeventos->altaeventos ($FECHA_ALTA_EVENTO , $STATUS_EVENTO , $FECHA_AUTORIZACION_EVENTO , $MONTOC_TOTAL_EVENTO , $MONTO_TOTAL_AVION , $CANTIDAD_PORCENTAJEV,$FEE_COBRADO,$PORCENTAJE_FEE,$MONTO_TOTAL_DEL_EVENTO , $NOMBRE_COMERCIAL_EVENTO , $NOMBRE_FISCAL_EVENTO , $NOMBRE_EVENTO , $NOMBRE_CORTO_EVENTO , $NOMBRE_CONTACTO_EVENTO , $CELULAR_CONTACTO_1 , $CORREO_CONTACTO_1 , $AREA_CONTACTO_CLIENTE , $OBSERVACIONES_1 , $TIPO_DE_EVENTO , $FORMATO_EVENTO , $PAIS_DEL_EVENTO , $CIUDAD_DEL_EVENTO , $HOTEL_LUGAR , $NUMERO_DE_PERSONAS , $FECHA_INICIO_EVENTO , $NOMBRE_COMERCIAL , $FECHA_FINAL_EVENTO , $HORA_TERMINO_EVENTO , $FECHA_LLEGADA_STAFF , $HORA_LLEGADA_STAFF , $FECHA_REGRESO_STAFF , $HORA_REGRESO_STAFF , $MONEDAS,$NOMBRE_VENDEDOR,$NOMBRE_EJECUTIVOEVENTO,$NOMBRE_INGRESO,$CIERRE_TOTAL,$hALTAEVENTOS,$enviaraltaeventos, $borraraltaeventos,$IPaltaeventos );
	
		
}
	
  
    elseif($borraraltaeventos == 'borraraltaeventos'){
	$borra_ALTAE = isset($_POST["borra_ALTAE"])?$_POST["borra_ALTAE"]:"";
		
	echo $altaeventos->borraraltaeventos($borra_ALTAE);
	  
}
  
    elseif($borrafoto == 'borrafoto'){
	$borra_fotoid = isset($_POST["borra_fotoid"])?$_POST["borra_fotoid"]:"";

	echo $altaeventos->borrafoto($borra_fotoid);
}

elseif($hnumeroevento == 'hnumeroevento' ){
$NUMERO_EVENTO_COLABORADOR = isset($_POST["NUMERO_EVENTO_COLABORADOR"])?$_POST["NUMERO_EVENTO_COLABORADOR"]:"";
$INICIALES_EMPRESA_EVENTO = isset($_POST["INICIALES_EMPRESA_EVENTO"])?$_POST["INICIALES_EMPRESA_EVENTO"]:"";
$NUMERO_DE_EVENTO = isset($_POST["NUMERO_DE_EVENTO"])?$_POST["NUMERO_DE_EVENTO"]:"";
$FECHA_NUMERO_EVENTO = isset($_POST["FECHA_NUMERO_EVENTO"])?$_POST["FECHA_NUMERO_EVENTO"]:"";
$hnumeroevento = isset($_POST["hnumeroevento"])?$_POST["hnumeroevento"]:""; 	
		
		
	 echo $altaeventos->numeroevento ($NUMERO_EVENTO_COLABORADOR , $INICIALES_EMPRESA_EVENTO , $NUMERO_DE_EVENTO , $FECHA_NUMERO_EVENTO , $hnumeroevento );
				
	  //include_once (__ROOT1__."/includes/crea_funciones.php");

}	
	
	
$id = $_SESSION['id'];
$fechaActual = date('Y-m-d');
if($hALTAEVENTOS!='hALTAEVENTOS' AND ( $_FILES["SUBIR_COTIZACION"] == true or $_FILES["SUBIR_ORDEN_COMPRA"] == true or $_FILES["SUBIR_CONTRATO_FIRMADO"] == true or $_FILES["SUBIR_COTIZACION_FIRMADA"] == true or $_FILES["LOGO_CLIENTE"] == true or
$_FILES["IMAGEN_EVENTO"] == true  ) ){
foreach($_FILES AS $ETQIETA => $VALOR){
	echo $altaeventos->cargarAE($ETQIETA,'04EVENTOSfotos','7', 0,'','',$fechaActual,$id);

}	
}


?>