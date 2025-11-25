	<div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles2">

   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>



<div id="dataModal" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles">
    
   </div>
   <div class="modal-footer">
   
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>
	

<!--NUEVO CODIGO BORRAR-->
<div id="dataModal3" class="modal fade">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">

    <h4 class="modal-title">Detalles</h4>
   </div>
   <div class="modal-body" id="personal_detalles3">
    ¿ESTÁS SEGURO DE BORRAR ESTE REGISTRO?
   </div>
   <div class="modal-footer">
          <span id="btnYes" class="btn confirm">SI BORRAR</span>	  
   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
   
   </div>
  </div>
 </div>
</div>


	<script type="text/javascript">
	
	var fileobj;
	function upload_file(e,name) {
	    e.preventDefault();
	    fileobj = e.dataTransfer.files[0];
	    ajax_file_upload1(fileobj,name);
	}
	 
	function file_explorer(name) {
	    document.getElementsByName(name)[0].click();
	    document.getElementsByName(name)[0].onchange = function() {
	        fileobj = document.getElementsByName(name)[0].files[0];
	        ajax_file_upload1(fileobj,name);
	    };
	}

	function ajax_file_upload1(file_obj,nombre) {
	    if(file_obj != undefined) {
	        var form_data = new FormData();                  
	        form_data.append(nombre, file_obj);
	        $.ajax({
	            type: 'POST',
	            url: '     calendariodeeventos/controladorCE.php',
	            contentType: false,
	            processData: false,
	            data: form_data,
 beforeSend: function() {
$('#1'+nombre).html('<p style="color:green;">Cargando archivo!</p>');
$('#mensajeADJUNTOCOL').html('<p style="color:green;">Actualizado!</p>');
    },				
	            success:function(response) {
//alert(response);
if($.trim(response) == 2 ){

$('#1'+nombre).html('<p style="color:red;">Error, archivo diferente a PDF, JPG o GIF.</p>');
$('#'+nombre).val("");
}else{
$('#'+nombre).val(response);
$('#1'+nombre).html('<a target="_blank" href="includes/archivos/'+$.trim(response)+'">Visualizar!</a>');

$('#2'+nombre).load(location.href + ' #2'+nombre);
$('#'+nombre).val(null);
}

	            }
	        });
	    }
	}

	$(document).ready(function(){

$(document).on('keydown', 'input[type="text"]', function(e){
    if (e.key === 'Enter' || e.which === 13) {
        e.preventDefault(); // porqueria, por si se le bota
        $.getScript(load(1));
       // $('#mensajefiltro').text('TECLA ACTIVADA');
    }
});





$("#clickbuscar").click(function(){
const formData = new FormData($('#buscaform')[0]);

$.ajax({
    url: 'inventario/fetch_pagesInventario.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false
})
.done(function(data) {
				
	$("#results").load("inventario/fetch_pagesInventario.php");

})
.fail(function() {
    console.log("detect error");
});
});




$("#ENVIAR_EVENTOS").click(function(){
const formData = new FormData($('#ALTAEVENTOSform')[0]);

$.ajax({
    url: 'calendariodeeventos/controladorCE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajeALTAEVENTOS').html('cargando'); 
    },    
   success:function(data){
	   
	$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
	   
	$("#mensajeALTAEVENTOS").html("<span id='ACTUALIZADO' >"+data+"</span>");
	
	$("#2SUBIR_COTIZACION").load(location.href + " #2SUBIR_COTIZACION");
	$("#2SUBIR_ORDEN_COMPRA").load(location.href + " #2SUBIR_ORDEN_COMPRA");
	$("#2SUBIR_CONTRATO_FIRMADO").load(location.href + " #2SUBIR_CONTRATO_FIRMADO");
	$("#2SUBIR_COTIZACION_FIRMADA").load(location.href + " #2SUBIR_COTIZACION_FIRMADA");
	$("#2LOGO_CLIENTE").load(location.href + " #2LOGO_CLIENTE");
	$("#2IMAGEN_EVENTO").load(location.href + " #2IMAGEN_EVENTO");
   }
   
})
});





 $(document).on('click', '.view_dataaltaeventosborrar', function(){
  //$('#dataModal').modal();
  var borra_ALTAE = $(this).attr("id");
  var borraraltaeventos = "borraraltaeventos";

  //AGREGAR
    $('#personal_detalles3').html();
    $('#dataModal3').modal('show');
  $('#btnYes').click(function() {
  //AGREGAR
  
  $.ajax({
    url: 'calendariodeeventos/controladorCE.php',
   method:"POST",
   data:{borra_ALTAE:borra_ALTAE,borraraltaeventos:borraraltaeventos},
   
    beforeSend:function(){  
    $('#mensajeINVENTARIOG').html('cargando'); 
    },    
   success:function(data){
	   		$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
	   			$('#dataModal3').modal('hide');
			$("#mensajeALTAEVENTOS").html("<span id='ACTUALIZADO' >"+data+"</span>");			
	$.getScript(load(1));
   }
  });
   //AGREGAR	
	});
  //AGREGAR	
 });

//SCRIPT PARA BORRAR FOTOGRAFIA
$(document).on('click', '.view_dataSBborrar2', function(){
var borra_id_ae = $(this).attr('id');
var borrasbdae = 'borrasbdae';
$('#personal_detalles3').html();
$('#dataModal3').modal('show');
$('#btnYes').click(function() {
$.ajax({
url:'listadeEVENTOS/controladorAE.php',
method:'POST',
data:{borra_id_ae:borra_id_ae,borrasbdae:borrasbdae},
beforeSend:function(){
$('#mensajeALTAEVENTOS').html('cargando');
},
success:function(data){
$('#dataModal3').modal('hide');
$('#mensajeALTAEVENTOS').html("<span id='ACTUALIZADO' >"+data+"</span>");
$('#'+borra_id_ae).load(location.href + ' #'+borra_id_ae);
}
});
});
});
 

 $(document).on('click', '.view_dataaltaeventosmodifica', function(){
 
  var personal_id = $(this).attr("id");
  $.ajax({
    url: 'listadeEVENTOS/vistapreviaeventos.php',
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeALTAEVENTOS').html('cargando'); 
    },    
   success:function(data){
	$("#resetaltaeventos").load(location.href + " #resetaltaeventos");
    $('#personal_detalles').html("<span id='ACTUALIZADO' >"+data+"</span>");
    $('#dataModal').modal('show');
   }
  });
 });



/*categoria*/

$("#GUARDAR_NUMERO_EVENTO").click(function(){
const formData = new FormData($('#numeroeventosform')[0]);

$.ajax({
    url: 'calendariodeeventos/controladorCE.php',
    type: 'POST',
    dataType: 'html',
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
	
	 beforeSend:function(){  
    $('#mensajenumeroevento').html('cargando'); 
    },    
   success:function(data){
	$("#numeroevento1a").load(location.href + " #numeroevento1a");
			$("#mensajenumeroevento").html("<span id='ACTUALIZADO' >"+data+"</span>");			
	
   }
   
})
});





 $(document).on('click', '.view_dataINVENTARIOcategoria', function(){
  //$('#dataModal').modal();
  var personal_id = $(this).attr("id");
  $.ajax({
   url:"inventario/VistaPreviaInventarioCategoria.php",
   method:"POST",
   data:{personal_id:personal_id},
    beforeSend:function(){  
    $('#mensajeALTAEVENTOS').html('cargando'); 
    },    
   success:function(data){
    $('#personal_detalles').html("<span id='ACTUALIZADO' >"+data+"</span>");
    $('#dataModal').modal('show');
   }
  });
 });




        $('#NUMERO_EVENTO').typeahead({
            source: function (busqueda, resultado) {
                $.ajax({
                    url: "     calendariodeeventos/controladorCE.php",
					data: 'busqueda=' + busqueda,            
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						resultado($.map(data, function (item) {
							return item;
                        }));
                    }
                });
            }
        });

	
	
	
	
			$('#target1').hide("linear");
	
		$('#target2').show("linear");
		
			$('#target2').hide("linear");

			
			$('#target3').hide("linear");
			$('#target4').hide("linear");
			$('#target5').hide("linear");
			$('#target6').hide("linear");
			$('#target7').hide("linear");
			$('#target8').hide("linear");
			$('#target9').hide("linear");
			$('#target10').hide("linear");
			$('#target101').hide("linear");
			$('#target11').hide("linear");
			$('#target111').hide("linear");
			$('#target12').hide("linear");
			$('#target121').hide("linear");
			$('#target13').hide("linear");
			$('#target14').hide("linear");
			$('#target15').hide("linear");
			$('#target16').hide("linear");
			$('#target17').hide("linear");
			$('#target18').hide("linear");
			$('#target19').hide("linear");
			$('#target20').hide("linear");
			$('#targetVIDEO').hide("linear");
			
			$("#mostrar1").click(function(){
				$('#target1').show("swing");
		 	});
			$("#ocultar1").click(function(){
				$('#target1').hide("linear");
			});
			$("#mostrar2").click(function(){
				$('#target2').show("swing");
		 	});
			$("#ocultar2").click(function(){
				$('#target2').hide("linear");
			});
			$("#mostrar3").click(function(){
				$('#target3').show("swing");
		 	});
			$("#ocultar3").click(function(){
				$('#target3').hide("linear");
			});
			$("#mostrar4").click(function(){
				$('#target4').show("swing");
		 	});
			$("#ocultar4").click(function(){
				$('#target4').hide("linear");
			});
			$("#mostrar5").click(function(){
				$('#target5').show("swing");
		 	});
			$("#ocultar5").click(function(){
				$('#target5').hide("linear");
			});
			$("#mostrar6").click(function(){
				$('#target6').show("swing");
		 	});
			$("#ocultar6").click(function(){
				$('#target6').hide("linear");
			});
			$("#mostrar7").click(function(){
				$('#target7').show("swing");
		 	});
			$("#ocultar7").click(function(){
				$('#target7').hide("linear");
			});
			$("#mostrar8").click(function(){
				$('#target8').show("swing");
		 	});
			$("#ocultar8").click(function(){
				$('#target8').hide("linear");
			});
			$("#mostrar9").click(function(){
				$('#target9').show("swing");
		 	});
			$("#ocultar9").click(function(){
				$('#target9').hide("linear");
			});
			$("#mostrar10").click(function(){
				$('#target10').show("swing");
		 	});
			$("#ocultar10").click(function(){
				$('#target10').hide("linear");
			});
			
			$("#mostrar101").click(function(){
				$('#target101').show("swing");
		 	});
			$("#ocultar101").click(function(){
				$('#target101').hide("linear");
			});
			
			$("#mostrar11").click(function(){
				$('#target11').show("swing");
		 	});
			$("#ocultar11").click(function(){
				$('#target11').hide("linear");
			});
			
			$("#mostrar111").click(function(){
				$('#target111').show("swing");
		 	});
			$("#ocultar111").click(function(){
				$('#target111').hide("linear");
			});			
			
			
			$("#mostrar12").click(function(){
				$('#target12').show("swing");
		 	});
			$("#ocultar12").click(function(){
				$('#target12').hide("linear");
			});
			
			$("#mostrar121").click(function(){
				$('#target121').show("swing");
		 	});
			$("#ocultar121").click(function(){
				$('#target121').hide("linear");
			});			
			
			$("#mostrar13").click(function(){
				$('#target13').show("swing");
		 	});
			$("#ocultar13").click(function(){
				$('#target13').hide("linear");
			});
			
			$("#mostrar14").click(function(){
				$('#target14').show("swing");
		 	});
			$("#ocultar14").click(function(){
				$('#target14').hide("linear");
			});		


			$("#mostrar15").click(function(){
				$('#target15').show("swing");
		 	});
			$("#ocultar15").click(function(){
				$('#target15').hide("linear");
			});					

			$("#mostrar16").click(function(){
				$('#target16').show("swing");
		 	});
			$("#ocultar16").click(function(){
				$('#target16').hide("linear");
			});	

			$("#mostrar17").click(function(){
				$('#target17').show("swing");
		 	});
			$("#ocultar17").click(function(){
				$('#target17').hide("linear");
			});	

			$("#mostrar18").click(function(){
				$('#target18').show("swing");
		 	});
			$("#ocultar18").click(function(){
				$('#target18').hide("linear");
			});

			$("#mostrar19").click(function(){
				$('#target19').show("swing");
		 	});
			$("#ocultar19").click(function(){
				$('#target19').hide("linear");
			});

			$("#mostrar20").click(function(){
				$('#target20').show("swing");
		 	});
			$("#ocultar20").click(function(){
				$('#target20').hide("linear");
			});
			
			$("#mostrarVIDEO").click(function(){
				$('#targetVIDEO').show("swing");
		 	});
			$("#ocultarVIDEO").click(function(){
				$('#targetVIDEO').hide("linear");
			});





			$("#mostrartodos2").click(function(){
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target101').show("swing");
				$('#target11').show("swing");
				$('#target111').show("swing");
				$('#target12').show("swing");
				$('#target121').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#target16').show("swing");
				$('#target17').show("swing");
				$('#target18').show("swing");
				$('#target19').show("swing");
				$('#target20').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos2").click(function(){
				$('#target1').hide("linear");
				$('#target2').hide("linear");	
				$('#target3').hide("linear");
				$('#target4').hide("linear");
				$('#target5').hide("linear");
				$('#target6').hide("linear");
				$('#target7').hide("linear");
				$('#target8').hide("linear");
				$('#target9').hide("linear");
				$('#target10').hide("linear");
				$('#target101').hide("linear");
				$('#target11').hide("linear");
				$('#target111').hide("linear");
				$('#target12').hide("linear");
				$('#target121').hide("linear");
				$('#target13').hide("linear");
				$('#target14').hide("linear");
				$('#target15').hide("linear");
				$('#target16').hide("linear");
				$('#target17').hide("linear");
				$('#target18').hide("linear");
				$('#target19').hide("linear");
				$('#target20').hide("linear");
				$('#targetVIDEO').hide("linear");
			});










			$("#mostrartodos").click(function(){
				$('#target1').show("swing");
				$('#target2').show("swing");
				$('#target3').show("swing");
				$('#target4').show("swing");
				$('#target5').show("swing");
				$('#target6').show("swing");
				$('#target7').show("swing");
				$('#target8').show("swing");
				$('#target9').show("swing");
				$('#target10').show("swing");
				$('#target101').show("swing");
				$('#target11').show("swing");
				$('#target111').show("swing");
				$('#target12').show("swing");
				$('#target121').show("swing");
				$('#target13').show("swing");
				$('#target14').show("swing");
				$('#target15').show("swing");
				$('#target16').show("swing");
				$('#target17').show("swing");
				$('#target18').show("swing");
				$('#target19').show("swing");
				$('#target20').show("swing");
				$('#targetVIDEO').show("swing");
		 	});
			
			$("#ocultartodos").click(function(){
				$('#target1').hide("linear");
				$('#target2').hide("linear");	
				$('#target3').hide("linear");
				$('#target4').hide("linear");
				$('#target5').hide("linear");
				$('#target6').hide("linear");
				$('#target7').hide("linear");
				$('#target8').hide("linear");
				$('#target9').hide("linear");
				$('#target10').hide("linear");
				$('#target101').hide("linear");
				$('#target11').hide("linear");
				$('#target111').hide("linear");
				$('#target12').hide("linear");
				$('#target121').hide("linear");
				$('#target13').hide("linear");
				$('#target14').hide("linear");
				$('#target15').hide("linear");
				$('#target16').hide("linear");
				$('#target17').hide("linear");
				$('#target18').hide("linear");
				$('#target19').hide("linear");
				$('#target20').hide("linear");
				$('#targetVIDEO').hide("linear");
			});

		});
	</script>