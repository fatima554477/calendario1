<script>
document.addEventListener("DOMContentLoaded", function () {
  const topScroll = document.getElementById("scroll-top-container");
  const bottomScroll = document.getElementById("scroll-bottom-container");
  const topScrollContent = document.getElementById("scroll-top");
  const tabla = document.getElementById("mi-tabla");

  function actualizarAnchoTabla() {
    if (tabla && topScrollContent) {
      topScrollContent.style.width = tabla.scrollWidth + "px";
    }
  }

  // Sincronizar desplazamientos
  topScroll.addEventListener("scroll", () => {
    bottomScroll.scrollLeft = topScroll.scrollLeft;
  });
  bottomScroll.addEventListener("scroll", () => {
    topScroll.scrollLeft = bottomScroll.scrollLeft;
  });

  // Recalcular ancho cada vez que se actualiza la tabla vía AJAX
  const observer = new MutationObserver(() => {
    actualizarAnchoTabla();
  });

  observer.observe(bottomScroll, { childList: true, subtree: true });
});
</script>




<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<div id="content">
    
			<hr/>
		<strong>	  <p class="mb-0 text-uppercase" ><img src="includes/contraer31.png" id="mostrar3" style="cursor:pointer;"/>
<img src="includes/contraer41.png" id="ocultar3" style="cursor:pointer;"/>&nbsp;&nbsp;&nbsp; FILTRO CALENDARIO DE EVENTOS</p></strong></div>


<div  id="mensajefiltro">
<div class="progress" style="width: 25%;">
<div class="progress-bar" role="progressbar" style="width: <?php echo $Aeventosporcentaje ; ?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $Aeventosporcentaje ; ?>%</div></div>
 </div>
							
	        <div id="target3" style="display:block;" class="content2">
        <div class="card">
          <div class="card-body">
      
<!--aqui inicia filtro-->

            <div class="row text-center" id="loader" style="position: absolute;top: 140px;left: 50%"></div>
<table width="100%" border="0">
<tr>
<td width="30%" align="center">
	<span id="mostrar">MOSTRAR</span>
    <select class="form-select mb-3" id="per_page" onchange="load(1);">
        <option value="6"  <?php if($_REQUEST['per_page']=='6')  echo 'selected'; ?>>6</option>
        <option value="7"  <?php if($_REQUEST['per_page']=='7')  echo 'selected'; ?>>7</option>
        <option value="10" <?php if($_REQUEST['per_page']=='10') echo 'selected'; ?>>10</option>
        <option value="15" <?php if($_REQUEST['per_page']=='15') echo 'selected'; ?>>15</option>
        <option value="20" <?php if($_REQUEST['per_page']=='20') echo 'selected'; ?>>20</option>
        <option value="50" <?php if($_REQUEST['per_page']=='50') echo 'selected'; ?>>50</option>
        <option value="100"<?php if($_REQUEST['per_page']=='100')echo 'selected'; ?>>100</option>
        <option value="200"<?php if($_REQUEST['per_page']=='200')echo 'selected'; ?>>200</option>
        <option value="20000"<?php if($_REQUEST['per_page']=='20000')echo 'selected'; ?>>TODOS</option>
    </select>
</td>


<td width="30%" align="center">					
	<button  class="btn btn-sm btn-outline-success px-5" type="button" onclick="load(1);" >BUSCAR</button>
</td>

<td width="30%" align="center">
    <span>PLANTILLA</span>

    <?php
    $queryper = $conexion->desplegablesfiltro('calendarioEventos', '');
    $encabezado = '<select class="form-select mb-3" id="DEPARTAMENTO2WE" required onchange="load(1);">
                   <option value="">SELECCIONA UNA OPCIÓN</option>';

    // Paleta de colores de fondo para las opciones
    $fondos = ["fff0df", "f4ffdf", "dfffed", "dffeff", "dfe8ff", "efdfff", "ffdffd", "efdfff", "ffdfe9"];
    $num = 0;
    $option = '';

    while ($row1 = mysqli_fetch_array($queryper)) {
        if ($num == 8) {
            $num = 0;
        } else {
            $num++;
        }

        $nombre = strtoupper(trim($row1['nombreplantilla'])); // convertir a mayúsculas y limpiar espacios
        $select = ($_SESSION['DEPARTAMENTO'] == $row1['nombreplantilla']) ? "selected" : "";

        $option .= '<option style="background:#' . $fondos[$num] . ';" ' . $select . ' value="' . $nombre . '">' . $nombre . '</option>';
    }

    echo $encabezado . $option . '</select>';
    ?>
</td>


</div>
</tr>
</table>
		<div class="datos_ajax">

		</div>
  
<!--aqui termina filtro-->


</div>
</div>
</div>

<?php 
require "clases/script.filtro.php";
?>