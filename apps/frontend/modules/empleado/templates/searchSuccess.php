<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
    $('#search_keywords').val('<?php echo $query ?>');
	</script>
    <h1>Resultados de la búsqueda</h1>
    <div id="tabs">
	<ul>
		<li><a href="#tabs-ofertas">Ofertas (<?php echo count($ofertas) ?>)</a></li>
		<li><a href="#tabs-proyectos">Proyectos (<?php echo count($proyectos) ?>)</a></li>
		<li><a href="#tabs-facturas">Facturas (<?php echo count($facturas) ?>)</a></li>
        <a style="float: right"  href="<?php echo url_for('homepage') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a>
	</ul>
    <div id="tabs-ofertas">
      <?php if(count($ofertas) > 0): ?>
        <?php include_partial('oferta/list', array('pr_ofertas' => $ofertas)) ?>
      <?php else: ?>
        <p>No se ha encontrado ningún resultado que concuerde con los criterios de busqueda especificados.</p>
      <?php endif; ?>
    </div>


    <div id="tabs-proyectos">
      <?php if(count($proyectos) > 0): ?>
        <?php include_partial('proyecto/list', array('pr_proyectos' => $proyectos)) ?>
      <?php else: ?>
        <p>No se ha encontrado ningún resultado que concuerde con los criterios de busqueda especificados.</p>
      <?php endif; ?>
    </div>
    
    <div id="tabs-facturas">
      <?php if(count($facturas) > 0): ?>
        <?php include_partial('factura/compactlist', array('pr_facturas' => $facturas)) ?>
      <?php else: ?>
        <p>No se ha encontrado ningún resultado que concuerde con los criterios de busqueda especificados.</p>
      <?php endif; ?>
    </div>

</div>
