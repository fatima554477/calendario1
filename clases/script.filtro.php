
<script type="text/javascript">
	
	/*filtro */

/* iniciaB1*/

		$(function() {
			load(1);
		});
		function load(page){
			var query=$("#NOMBRE_EVENTO").val();
			var DEPARTAMENTO2=$("#DEPARTAMENTO2WE").val();var FECHA_ALTA_EVENTO=$("#FECHA_ALTA_EVENTO").val();
var NUMERO_EVENTO=$("#NUMERO_EVENTO").val();
var STATUS_EVENTO=$("#STATUS_EVENTO").val();
var MONTOC_TOTAL_EVENTO=$("#MONTOC_TOTAL_EVENTO").val();
var MONTO_TOTAL_AVION=$("#MONTO_TOTAL_AVION").val();
var CANTIDAD_PORCENTAJEV=$("#CANTIDAD_PORCENTAJEV").val();
var FEE_COBRADO=$("#FEE_COBRADO").val();
var PORCENTAJE_FEE=$("#PORCENTAJE_FEE_1").val();
var MONTO_TOTAL_DEL_EVENTO=$("#MONTO_TOTAL_DEL_EVENTO").val();
var NOMBRE_COMERCIAL_EVENTO=$("#NOMBRE_COMERCIAL_EVENTO").val();
var NOMBRE_FISCAL_EVENTO=$("#NOMBRE_FISCAL_EVENTO").val();
var NOMBRE_EVENTO=$("#NOMBRE_EVENTO").val();
var NOMBRE_CORTO_EVENTO=$("#NOMBRE_CORTO_EVENTO").val();
var NOMBRE_CONTACTO_EVENTO=$("#NOMBRE_CONTACTO_EVENTO").val();
var CELULAR_CONTACTO_1=$("#CELULAR_CONTACTO_1").val();
var CORREO_CONTACTO_1=$("#CORREO_CONTACTO_1").val();
var AREA_CONTACTO_CLIENTE=$("#AREA_CONTACTO_CLIENTE").val();
var OBSERVACIONES_1=$("#OBSERVACIONES_1").val();
var TIPO_DE_EVENTO=$("#TIPO_DE_EVENTO").val();
var FORMATO_EVENTO=$("#FORMATO_EVENTO").val();
var PAIS_DEL_EVENTO=$("#PAIS_DEL_EVENTO").val();
var CIUDAD_DEL_EVENTO=$("#CIUDAD_DEL_EVENTO").val();
var HOTEL_LUGAR=$("#HOTEL_LUGAR").val();
var NUMERO_DE_PERSONAS=$("#NUMERO_DE_PERSONAS").val();

var FECHA_INICIO_EVENTO=$("#FECHA_INICIO_EVENTO").val();
var FECHA_INICIO_EVENTO2a=$("#FECHA_INICIO_EVENTO2a").val();

var NOMBRE_COMERCIAL=$("#NOMBRE_COMERCIAL").val();

var FECHA_FINAL_EVENTO=$("#FECHA_FINAL_EVENTO").val();
var FECHA_FINAL_EVENTO2a=$("#FECHA_FINAL_EVENTO2a").val();

var HORA_TERMINO_EVENTO=$("#HORA_TERMINO_EVENTO").val();
var FECHA_LLEGADA_STAFF=$("#FECHA_LLEGADA_STAFF").val();
var HORA_LLEGADA_STAFF=$("#HORA_LLEGADA_STAFF").val();
var FECHA_REGRESO_STAFF=$("#FECHA_REGRESO_STAFF").val();
var HORA_REGRESO_STAFF=$("#HORA_REGRESO_STAFF").val();
var MATERIAL_EQUIPO_BODEGA=$("#MATERIAL_EQUIPO_BODEGA_1").val();
var FECHA_INICIO_MONTAJE=$("#FECHA_INICIO_MONTAJE_1").val();
var HORA_INICIO_MONTAJE=$("#HORA_INICIO_MONTAJE_1").val();
var FECHA_DESMONTAJE=$("#FECHA_DESMONTAJE_1").val();
var HORA_DESMONTAJE=$("#HORA_DESMONTAJE_1").val();
var LUGAR_MONTAJE=$("#LUGAR_MONTAJE_1").val();
var SERVICIO_OTORGAR=$("#SERVICIO_OTORGAR_1").val();
var MONEDAS=$("#MONEDAS_1").val();
var NOMBRE_VENDEDOR=$("#NOMBRE_VENDEDOR_1").val();
var NOMBRE_EJECUTIVOEVENTO=$("#NOMBRE_EJECUTIVOEVENTO_1").val();
var CIERRE_TOTAL=$("#CIERRE_TOTAL_1").val();
var hALTAEVENTOS=$("#hALTAEVENTOS").val();

var NOMBRE_PERSONAL=$("#NOMBRE_PERSONAL").val();
var NOMBRE_PERSONAL2=$("#NOMBRE_PERSONAL2").val();
var TOTAL_AVION_SINIVA=$("#TOTAL_AVION_SINIVA_1").val();
var NOMBRE_INGRESO=$("#NOMBRE_INGRESO_1").val();
var NOMBRE_AUDITOR=$("#NOMBRE_AUDITOR_1").val();



var FALTA_POR_COBRAR=$("#FALTA_POR_COBRAR_1").val();
var FALTA_POR_FACTURAR=$("#FALTA_POR_COBRAR_1").val();
var PERDIDA_FISCAL=$("#PERDIDA_FISCAL_1").val();

/*termina copiar y pegar*/
			
			var per_page=$("#per_page").val();
			var parametros = {
			"action":"ajax",
			"page":page,
			'query':query,
			'per_page':per_page,

/*inicia copiar y pegar*/
'NUMERO_EVENTO':NUMERO_EVENTO,
'FECHA_ALTA_EVENTO':FECHA_ALTA_EVENTO,
'STATUS_EVENTO':STATUS_EVENTO,
'MONTOC_TOTAL_EVENTO':MONTOC_TOTAL_EVENTO,
'MONTO_TOTAL_AVION':MONTO_TOTAL_AVION,
'CANTIDAD_PORCENTAJEV':CANTIDAD_PORCENTAJEV,
'FEE_COBRADO':FEE_COBRADO,
'PORCENTAJE_FEE':PORCENTAJE_FEE,
'MONTO_TOTAL_DEL_EVENTO':MONTO_TOTAL_DEL_EVENTO,
'NOMBRE_COMERCIAL_EVENTO':NOMBRE_COMERCIAL_EVENTO,
'NOMBRE_FISCAL_EVENTO':NOMBRE_FISCAL_EVENTO,
'NOMBRE_EVENTO':NOMBRE_EVENTO,
'NOMBRE_CORTO_EVENTO':NOMBRE_CORTO_EVENTO,
'NOMBRE_CONTACTO_EVENTO':NOMBRE_CONTACTO_EVENTO,
'CELULAR_CONTACTO_1':CELULAR_CONTACTO_1,
'CORREO_CONTACTO_1':CORREO_CONTACTO_1,
'AREA_CONTACTO_CLIENTE':AREA_CONTACTO_CLIENTE,
'OBSERVACIONES_1':OBSERVACIONES_1,
'TIPO_DE_EVENTO':TIPO_DE_EVENTO,
'FORMATO_EVENTO':FORMATO_EVENTO,
'PAIS_DEL_EVENTO':PAIS_DEL_EVENTO,
'CIUDAD_DEL_EVENTO':CIUDAD_DEL_EVENTO,
'HOTEL_LUGAR':HOTEL_LUGAR,
'NUMERO_DE_PERSONAS':NUMERO_DE_PERSONAS,
'FECHA_INICIO_EVENTO':FECHA_INICIO_EVENTO,
'FECHA_INICIO_EVENTO2a':FECHA_INICIO_EVENTO2a,
'NOMBRE_COMERCIAL':NOMBRE_COMERCIAL,
'FECHA_FINAL_EVENTO':FECHA_FINAL_EVENTO,
'FECHA_FINAL_EVENTO2a':FECHA_FINAL_EVENTO2a,
'HORA_TERMINO_EVENTO':HORA_TERMINO_EVENTO,
'FECHA_LLEGADA_STAFF':FECHA_LLEGADA_STAFF,
'HORA_LLEGADA_STAFF':HORA_LLEGADA_STAFF,
'FECHA_REGRESO_STAFF':FECHA_REGRESO_STAFF,
'HORA_REGRESO_STAFF':HORA_REGRESO_STAFF,
'MONEDAS':MONEDAS,
'NOMBRE_VENDEDOR':NOMBRE_VENDEDOR,
'NOMBRE_AUDITOR':NOMBRE_AUDITOR,
'hALTAEVENTOS':hALTAEVENTOS,
'NOMBRE_EJECUTIVOEVENTO':NOMBRE_EJECUTIVOEVENTO,
'CIERRE_TOTAL':CIERRE_TOTAL,
'NOMBRE_PERSONAL':NOMBRE_PERSONAL,
'NOMBRE_PERSONAL2':NOMBRE_PERSONAL2,
'TOTAL_AVION_SINIVA':TOTAL_AVION_SINIVA,
'NOMBRE_INGRESO':NOMBRE_INGRESO,
'FALTA_POR_COBRAR':FALTA_POR_COBRAR,
'FALTA_POR_FACTURAR':FALTA_POR_FACTURAR,
'PERDIDA_FISCAL':PERDIDA_FISCAL,

/*termina copiar y pegar*/

			'DEPARTAMENTO2':DEPARTAMENTO2
			
			};
			$("#loader").fadeIn('slow');
			$.ajax({
				url:'calendariodeeventos/clases/controlador_filtro.php',
				type: 'POST',				
				data: parametros,
				 beforeSend: function(objeto){
				$("#loader").html("Cargando...");
			  },
				success:function(data){
					$(".datos_ajax").html(data).fadeIn('slow');
					$("#loader").html("");
					          $('.checkbox').each(function() {
    const id = $(this).data('id');
    if (localStorage.getItem('checkbox_' + id) === 'checked') {
        this.checked = true;
        this.closest('tr').style.filter = 'brightness(65%) sepia(100%) saturate(200%) hue-rotate(0deg)';
    }
});
					
					
				}
				
			})
		}
/* terminaB1*/		

$(document).ready(function(){

    // Detectar Enter en cualquier input de texto
    $("input[type='text']").on("keypress", function(e){
        if(e.which === 13){
            e.preventDefault(); // evita que el enter haga otra acción

            // Crear objeto con todos los inputs
          /*  let datos = {};
            $("input").each(function(){
                let nombre = $(this).attr("name");
                let valor = $(this).val();
                if(nombre){ // solo si tiene atributo name
                    datos[nombre] = valor;
                }
            });*/

            // Enviar con AJAX
	$.getScript(load(1));
	
        }
    });

});
		
	</script>
