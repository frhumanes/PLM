<h1>Área Personal de <?php echo $empleado->getName().' '.$empleado->getApellidos()?></h1>
<script type="text/javascript">
	$(function() {
		$("#accordion").accordion({
			event: "mouseover"
		});
	});
	</script>
<br />
<div id="accordion">
    <h3><a href="<?php echo url_for('oferta/index') ?>">Mis ofertas</a></h3>
    <div>
        <ul style="float: right">
        <li><a class="boton"  href="<?php echo url_for('oferta/new') ?>"><?php echo image_tag('more.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?> Añadir</a></li>
        <li><a class="boton"  href="<?php echo url_for('oferta/index') ?>"><?php echo image_tag('go.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?> Ver todas</a></li>
	</ul>
        <?php include_partial('oferta/list', array('pr_ofertas'=>$ofertas))?>
    </div>
    <h3><a href="<?php echo url_for('proyecto/index') ?>">Mis Proyectos</a></h3>
    <div>
         <a class="boton" style="float: right"  href="<?php echo url_for('proyecto/index') ?>"><?php echo image_tag('go.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?> Ver todos</a>
        <?php include_partial('proyecto/list', array('pr_proyectos'=>$proyectos))?>
    </div>
    <h3><a href="<?php echo url_for('factura/index') ?>">Últimas facturas</a></h3>
    
    <div>
        <a class="boton" style="float: right"  href="<?php echo url_for('factura/index') ?>"><?php echo image_tag('go.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?> Ver todas</a>
        <?php include_partial('factura/list', array('pr_facturas'=>$empleado->getFacturas(sfConfig::get('app_max_facturas_on_homepage'))))?>
    </div>
</div>
