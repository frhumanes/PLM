<h1>Listado de Facturas</h1>
<script type="text/javascript">
	$(function() {
		$("#accordion").accordion();
	});
	</script>

<div id="accordion">
    <h3><a href="#">Mis ofertas</a></h3>
    <div><?php include_partial('oferta/list', array('pr_ofertas'=>$ofertas))?></div>
    <h3><a href="#">Mis Proyectos</a></h3>
    <div><?php include_partial('proyecto/list', array('pr_proyectos'=>$proyectos))?></div>
    <h3><a href="#">Últimas facturas</a></h3>
    <div><?php include_partial('factura/list', array('pr_factura'=>$facturas))?></div>
</div>
