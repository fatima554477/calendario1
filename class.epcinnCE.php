<?php
/*
clase EPC INNOVA
CREADO : 10/mayo/2023
TESTER: FATIMA ARELLANO
PROGRAMER: SANDOR ACTUALIZACION: 1 MAY 2023

*/
	define('__ROOT3__', dirname(dirname(__FILE__)));
	require __ROOT3__."/includes/class.epcinn.php";	
	

	
	class accesoclase extends colaboradores{

	public function buscarnumero($filtro){
		$conn = $this->db();
		$variable = "select * from 04NUMEROevento where NUMERO_DE_EVENTO like '%".$filtro."%' ";
$variablequery = mysqli_query($conn,$variable);
		while($row = mysqli_fetch_array($variablequery, MYSQLI_ASSOC)){
			$resultado [] = $row['NUMERO_DE_EVENTO'];
		}
		return $resultado;
		
	}



	public function lista_inicialescorp(){
		$conn = $this->db();
		$variable = "select NCE_OBSERVACIONES from 03datosdelaempresa ";
	return $variablequery = mysqli_query($conn,$variable);

	}


	public function lista_colaboradoreventos(){
		$conn = $this->db();
		$variable = "select USUARIO_CRM from 01empresa WHERE NIVEL_ACCESO_CRM='MAXIMO' ";
	return $variablequery = mysqli_query($conn,$variable);

	}
	
	public function NUMERO_EVENTO(){
		$conn = $this->db();
		$variable = "select MAX(id) + 1 AS ULTIMO from 04NUMEROevento ";
	 $variablequery = mysqli_query($conn,$variable);
	$row = mysqli_fetch_array($variablequery);
	return $row['ULTIMO'];

	}
	
	public function sologuardarAE($campo,$nuevonombre,$nombretabla,$idpost,$fecha,$idrelacionsesion){
		$conn = $this->db();
		$variablequery2 = 
		"insert into ".$nombretabla." 
		(idRelacion,".$campo.",fecha,idrelacionsesion) 
		values 
		(".$idpost.",'".$nuevonombre."','".$fecha."','".$idrelacionsesion."') ";
		mysqli_query($conn,$variablequery2);
		}
		
	public function Listado_fotoseventostemporal($CAMPO,$fecha,$idrelacionsesion){
		$conn = $this->db();

		$variablequery = "select id, ".$CAMPO." from 04EVENTOSfotos where fecha = '".$fecha."' and idrelacionsesion = '".$idrelacionsesion."' and (".$CAMPO." is not null or ".$CAMPO." <> '')
		order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}
		
	public function cargarAE($archivo,$nombretabla,$IDENTIFICADOR='1',$idpost='no',$where=false,$idTemporal=false,$fecha=false,$idrelacionsesion=false)

	{
		$nombre_carpeta=__ROOT2__.'/includes/archivos';
		$filehandle = opendir($nombre_carpeta);
		$nombretemp = $_FILES[$archivo]["tmp_name"];
		$nombrearchivo = $_FILES[$archivo]["name"];
		$tamanyoarchivo = $_FILES[$archivo]["size"];
		//$tipoarchivo = getimagesize($nombretemp);
		$extension = explode('.',$nombrearchivo);
		$cuenta = count($extension) - 1;
		$nuevonombre =  $archivo.'_'.date('Y_m_d_h_i_s').'.'.$extension[$cuenta];
		 $extension[$cuenta];

		if( 
		strtolower($extension[$cuenta]) == 'pdf' or 
		strtolower($extension[$cuenta]) == 'gif' or 
		strtolower($extension[$cuenta]) == 'jpeg' or 
		strtolower($extension[$cuenta]) == 'jpg' or 
		strtolower($extension[$cuenta]) == 'png' or 
		strtolower($extension[$cuenta]) == 'mp4' or 
		strtolower($extension[$cuenta]) == 'docx' or 
		strtolower($extension[$cuenta]) == 'doc' or 
		strtolower($extension[$cuenta]) == 'xml' or 
		strtolower($extension[$cuenta]) == 'txt'
		){ //gif o jpg
		/*if ($tamanyoarchivo <= $tamanyomax) { //archivo demasioado grande*/
		if(move_uploaded_file($nombretemp, $nombre_carpeta.'/'. $nuevonombre)){
		chmod ($nombre_carpeta.'/' . $nuevonombre, 0755);
		$tamanyo =fileSize($nombre_carpeta.'/'. $nuevonombre);
		$fp = fopen($nombre_carpeta.'/'.$nuevonombre, "rb"); 
		$contenido = fread($fp, $tamanyo);
		$contenido = addslashes($contenido);
		if($IDENTIFICADOR=='1'){
		$this->sologuardar($archivo,$nuevonombre,$nombretabla);
		}elseif($IDENTIFICADOR=='2'){
		$this->sologuardar2($archivo,$nuevonombre,$nombretabla);
		}elseif($IDENTIFICADOR=='3'){
		$this->sologuardar3($archivo,$nuevonombre,$nombretabla,$idpost);
		}elseif($IDENTIFICADOR=='4'){
		$this->sologuardar4($archivo,$nuevonombre,$nombretabla,$idpost);
		}elseif($IDENTIFICADOR=='5'){
		$this->sologuardar5($archivo,$nuevonombre,$nombretabla,$where,$idpost);
		}elseif($IDENTIFICADOR=='6'){
		$this->sologuardar6($archivo,$nuevonombre,$nombretabla,$idpost,$idTemporal);
		}elseif($IDENTIFICADOR=='7'){
		$this->sologuardarAE($archivo,$nuevonombre,$nombretabla,$idpost,$fecha,$idrelacionsesion);
		}
		
		return trim($nuevonombre);
		}
		else{
			return "1";
		}
		}
		else{
			return "2";
		}
	}

	
	//*INFORMACION IMPORTANTE//*
	public function variable_altaeventos(){
		$conn = $this->db();
		$variablequery = "select * from 04altaeventos where idRelacion = '".$_SESSION['id']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_altaeventos(){
		$conn = $this->db();
		$var1 = 'select id from 04altaeventos where idRelacion =  "'.$_SESSION['id'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function buscar(){
	$palabraclave = isset($_POST['busqueda'])?trim(strval($_POST['busqueda'])):'';
	//if($palabraclave!=''){
	$ResultadoPais[] = 'bbbbbbb'.$_POST['busqueda'];
	$ResultadoPais[] = 'nnnnnnn'.$_POST['busqueda'];
	}

	public function altaeventos ($FECHA_ALTA_EVENTO , $STATUS_EVENTO , $FECHA_AUTORIZACION_EVENTO , $MONTOC_TOTAL_EVENTO , $MONTO_TOTAL_AVION ,$CANTIDAD_PORCENTAJEV, $FEE_COBRADO,$PORCENTAJE_FEE,$MONTO_TOTAL_DEL_EVENTO , $NOMBRE_COMERCIAL_EVENTO , $NOMBRE_FISCAL_EVENTO , $NOMBRE_EVENTO , $NOMBRE_CORTO_EVENTO , $NOMBRE_CONTACTO_EVENTO , $CELULAR_CONTACTO_1 , $CORREO_CONTACTO_1 , $AREA_CONTACTO_CLIENTE , $OBSERVACIONES_1 , $TIPO_DE_EVENTO , $FORMATO_EVENTO , $PAIS_DEL_EVENTO , $CIUDAD_DEL_EVENTO , $HOTEL_LUGAR , $NUMERO_DE_PERSONAS , $FECHA_INICIO_EVENTO , $NOMBRE_COMERCIAL , $FECHA_FINAL_EVENTO , $HORA_TERMINO_EVENTO , $FECHA_LLEGADA_STAFF , $HORA_LLEGADA_STAFF , $FECHA_REGRESO_STAFF , $HORA_REGRESO_STAFF ,$MONEDAS,$NOMBRE_VENDEDOR,$NOMBRE_EJECUTIVOEVENTO,$NOMBRE_INGRESO, $hALTAEVENTOS,$enviaraltaeventos, $borraraltaeventos,$IPaltaeventos ){
		$conn = $this->db();
		$existe = $this->revisar_altaeventos();                                                             
		$session = isset($_SESSION['id'])?$_SESSION['id']:'';  
		if($session != ''){
			
		$var1 = "update 04altaeventos set   FECHA_ALTA_EVENTO = '".$FECHA_ALTA_EVENTO."' , STATUS_EVENTO = '".$STATUS_EVENTO."' , FECHA_AUTORIZACION_EVENTO = '".$FECHA_AUTORIZACION_EVENTO."' , MONTOC_TOTAL_EVENTO = '".$MONTOC_TOTAL_EVENTO."' , MONTO_TOTAL_AVION = '".$MONTO_TOTAL_AVION."' , CANTIDAD_PORCENTAJEV = '".$CANTIDAD_PORCENTAJEV."' , FEE_COBRADO = '".$FEE_COBRADO."' , PORCENTAJE_FEE = '".$PORCENTAJE_FEE."' , MONTO_TOTAL_DEL_EVENTO = '".$MONTO_TOTAL_DEL_EVENTO."' , NOMBRE_COMERCIAL_EVENTO = '".$NOMBRE_COMERCIAL_EVENTO."' , NOMBRE_FISCAL_EVENTO = '".$NOMBRE_FISCAL_EVENTO."' , NOMBRE_EVENTO = '".$NOMBRE_EVENTO."' , NOMBRE_CORTO_EVENTO = '".$NOMBRE_CORTO_EVENTO."' , NOMBRE_CONTACTO_EVENTO = '".$NOMBRE_CONTACTO_EVENTO."' , CELULAR_CONTACTO_1 = '".$CELULAR_CONTACTO_1."' , CORREO_CONTACTO_1 = '".$CORREO_CONTACTO_1."' , AREA_CONTACTO_CLIENTE = '".$AREA_CONTACTO_CLIENTE."' , OBSERVACIONES_1 = '".$OBSERVACIONES_1."' , TIPO_DE_EVENTO = '".$TIPO_DE_EVENTO."' , FORMATO_EVENTO = '".$FORMATO_EVENTO."' , PAIS_DEL_EVENTO = '".$PAIS_DEL_EVENTO."' , CIUDAD_DEL_EVENTO = '".$CIUDAD_DEL_EVENTO."' , HOTEL_LUGAR = '".$HOTEL_LUGAR."' , NUMERO_DE_PERSONAS = '".$NUMERO_DE_PERSONAS."' , FECHA_INICIO_EVENTO = '".$FECHA_INICIO_EVENTO."' , NOMBRE_COMERCIAL = '".$NOMBRE_COMERCIAL."' , FECHA_FINAL_EVENTO = '".$FECHA_FINAL_EVENTO."' , HORA_TERMINO_EVENTO = '".$HORA_TERMINO_EVENTO."' , FECHA_LLEGADA_STAFF = '".$FECHA_LLEGADA_STAFF."' , HORA_LLEGADA_STAFF = '".$HORA_LLEGADA_STAFF."' , FECHA_REGRESO_STAFF = '".$FECHA_REGRESO_STAFF."' , HORA_REGRESO_STAFF = '".$HORA_REGRESO_STAFF."' , MONEDAS = '".$MONEDAS."' , NOMBRE_VENDEDOR = '".$NOMBRE_VENDEDOR."' , NOMBRE_EJECUTIVOEVENTO = '".$NOMBRE_EJECUTIVOEVENTO."' , NOMBRE_INGRESO = '".$NOMBRE_INGRESO."' , hALTAEVENTOS = '".$hALTAEVENTOS."' where id = '".$IPaltaeventos."' ; ";
	
		$var2 = "insert into 04altaeventos ( FECHA_ALTA_EVENTO, STATUS_EVENTO, FECHA_AUTORIZACION_EVENTO, MONTOC_TOTAL_EVENTO, MONTO_TOTAL_AVION, CANTIDAD_PORCENTAJEV,FEE_COBRADO,PORCENTAJE_FEE,MONTO_TOTAL_DEL_EVENTO, NOMBRE_COMERCIAL_EVENTO, NOMBRE_FISCAL_EVENTO, NOMBRE_EVENTO, NOMBRE_CORTO_EVENTO, NOMBRE_CONTACTO_EVENTO, CELULAR_CONTACTO_1, CORREO_CONTACTO_1, AREA_CONTACTO_CLIENTE, OBSERVACIONES_1, TIPO_DE_EVENTO, FORMATO_EVENTO, PAIS_DEL_EVENTO, CIUDAD_DEL_EVENTO, HOTEL_LUGAR, NUMERO_DE_PERSONAS, FECHA_INICIO_EVENTO, NOMBRE_COMERCIAL, FECHA_FINAL_EVENTO, HORA_TERMINO_EVENTO, FECHA_LLEGADA_STAFF, HORA_LLEGADA_STAFF, FECHA_REGRESO_STAFF, HORA_REGRESO_STAFF, MONEDAS,NOMBRE_VENDEDOR,NOMBRE_EJECUTIVOEVENTO,NOMBRE_INGRESO, hALTAEVENTOS, idRelacion) values ( '".$FECHA_ALTA_EVENTO."' , '".$STATUS_EVENTO."' , '".$FECHA_AUTORIZACION_EVENTO."' , '".$MONTOC_TOTAL_EVENTO."' , '".$MONTO_TOTAL_AVION."' , '".$CANTIDAD_PORCENTAJEV."' , '".$FEE_COBRADO."' , '".$PORCENTAJE_FEE."' , '".$MONTO_TOTAL_DEL_EVENTO."' , '".$NOMBRE_COMERCIAL_EVENTO."' , '".$NOMBRE_FISCAL_EVENTO."' , '".$NOMBRE_EVENTO."' , '".$NOMBRE_CORTO_EVENTO."' , '".$NOMBRE_CONTACTO_EVENTO."' , '".$CELULAR_CONTACTO_1."' , '".$CORREO_CONTACTO_1."' , '".$AREA_CONTACTO_CLIENTE."' , '".$OBSERVACIONES_1."' , '".$TIPO_DE_EVENTO."' , '".$FORMATO_EVENTO."' , '".$PAIS_DEL_EVENTO."' , '".$CIUDAD_DEL_EVENTO."' , '".$HOTEL_LUGAR."' , '".$NUMERO_DE_PERSONAS."' , '".$FECHA_INICIO_EVENTO."' , '".$NOMBRE_COMERCIAL."' , '".$FECHA_FINAL_EVENTO."' , '".$HORA_TERMINO_EVENTO."' , '".$FECHA_LLEGADA_STAFF."' , '".$HORA_LLEGADA_STAFF."' , '".$FECHA_REGRESO_STAFF."' , '".$HORA_REGRESO_STAFF."' , '".$MONEDAS."' , '".$NOMBRE_VENDEDOR."' , '".$NOMBRE_EJECUTIVOEVENTO."' , '".$NOMBRE_INGRESO."' , '".$hALTAEVENTOS."' , '".$_SESSION['id']."');  ";		
			
	    if($enviaraltaeventos == 'enviaraltaeventos'){

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn)); 
		$varfotos = "update 04EVENTOSfotos set idRelacion = '".mysqli_insert_id($conn)."',fecha=null,idrelacionsesion=null where fecha = '".date('Y-m-d')."' and idrelacionsesion = '".$_SESSION['id']."' ";
		mysqli_query($conn,$varfotos) or die('P160'.mysqli_error($conn));		
		return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		$varfotos = "update 04EVENTOSfotos set idRelacion = '".mysqli_insert_id($conn)."',fecha=null,idrelacionsesion=null  where fecha = '".date('Y-m-d')."' and idrelacionsesion = '".$_SESSION['id']."' ";
		mysqli_query($conn,$varfotos) or die('P160'.mysqli_error($conn));
		return "Ingresado";
		}
			
        }else{
		echo "HA CADUCADO TU SESIÓN ";	
		}
    }

	public function Listado_fotoseventos($idrow){
		$conn = $this->db();

		$variablequery = "select * from 04EVENTOSfotos where idRelacion = '".$idrow."' order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function borrafoto($idrow){
		$conn = $this->db();

		echo $variablequery = "delete from 04EVENTOSfotos where id = '".$idrow."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function Listado_altaeventos(){
		$conn = $this->db();

		$variablequery = "select * from 04altaeventos where 
		(NUMERO_EVENTO <> '') order by id desc ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}


	public function Listado_altaeventos2($id){
		$conn = $this->db();
		$variablequery = "select * from 04altaeventos  where id = '".$id."' ";
		return $arrayquery = mysqli_query($conn,$variablequery);
	}



	public function borraraltaeventos($id){
		$conn = $this->db();
		$var1 = "DELETE FROM 04altaeventos where id = '".$id."' "; 
		mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		
		$var2 = "DELETE FROM `04NUMEROevento` WHERE `idRelacion` = '".$id."' ";
		mysqli_query($conn,$var2) or die('P44'.mysqli_error($conn));
		
		RETURN 
		
		"<P style='color:green;font-size:25px;'>ELEMENTO BORRADO</P>";
	}	
	
	
	public function variable_comborelacion1a(){
		$session = isset($_SESSION['id'])?$_SESSION['id']:'';		
		
		$conn = $this->db();				
		$variablequery = "select * from 02empresarelacion where idRelacionP = '".$session."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery);
		if($row['idRelacionC']>=1){
		return $row['idRelacionC'];
		}else{
		return "no";			
		}
		
		}

	public function variables_informacionfiscal_logo(){
		$conn = $this->db();
		$variablequery = "select ADJUNTAR_LOGO_INFORMACION from 03docs_info_fiscal where idRelacion = '".$_SESSION['idlc']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		$row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);
		return $row['ADJUNTAR_LOGO_INFORMACION'];
		
	}
	
	
	public function variable_numeroevento(){
		$conn = $this->db();
		$variablequery = "select * from 04NUMEROevento where idRelacion = '".$_SESSION['id']."' ";
		$arrayquery = mysqli_query($conn,$variablequery);
		return $row = mysqli_fetch_array($arrayquery, MYSQLI_ASSOC);		
	}

	public function revisar_numeroevento(){
		$conn = $this->db();
		$var1 = 'select id from 04NUMEROevento where idRelacion =  "'.$_SESSION['id'].'" ';
		$query = mysqli_query($conn,$var1) or die('P44'.mysqli_error($conn));
		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		return $row['id'];
	}

	public function numeroevento ($NUMERO_EVENTO_COLABORADOR , $INICIALES_EMPRESA_EVENTO , $NUMERO_DE_EVENTO , $FECHA_NUMERO_EVENTO , $hnumeroevento, $enviarnumeroE){
		$conn = $this->db();
		$existe = $this->revisar_altaeventos();
		$session = isset($_SESSION['id'])?$_SESSION['id']:'';  
		if($session != ''){
			
		$var1 = "update 04NUMEROevento set    NUMERO_EVENTO_COLABORADOR = '".$NUMERO_EVENTO_COLABORADOR."' , INICIALES_EMPRESA_EVENTO = '".$INICIALES_EMPRESA_EVENTO."' , NUMERO_DE_EVENTO = '".$NUMERO_DE_EVENTO."' , FECHA_NUMERO_EVENTO = '".$FECHA_NUMERO_EVENTO."' , hnumeroevento = '".$hnumeroevento."' ; ";
	
		$var2 = "insert into 04NUMEROevento (
		NUMERO_EVENTO_COLABORADOR, 
		INICIALES_EMPRESA_EVENTO, 
		NUMERO_DE_EVENTO, 
		FECHA_NUMERO_EVENTO, 
		hnumeroevento, 
		idRelacion) values ( 
		'".$NUMERO_EVENTO_COLABORADOR."' , 
		'".$INICIALES_EMPRESA_EVENTO."' , 
		'".$INICIALES_EMPRESA_EVENTO.$NUMERO_DE_EVENTO."' , 
		'".$FECHA_NUMERO_EVENTO."' , 
		'".$hnumeroevento."' , 
		'".$_SESSION['id']."'
		);  ";		
			
	    if($enviarnumeroE == 'enviarnumeroE'){

		mysqli_query($conn,$var1) or die('P156'.mysqli_error($conn));
		return mysqli_insert_id($conn);
		//return "Actualizado";
		}else{
		mysqli_query($conn,$var2) or die('P160'.mysqli_error($conn));
		return mysqli_insert_id($conn);
		//return "Ingresado";
		}
			
        }else{
		echo "SELECCIONADO";	
		}
    }
	
	
	}

?>