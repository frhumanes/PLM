<h1>Listado de Ofertas<a style="float: right"  href="<?php echo url_for('oferta/new') ?>"><?php echo image_tag('more.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a></h1>
<br />
<script type="text/javascript">
	$(function() {
		$("#ofertas").accordion({
			event: "mouseover"
		});
	});
	</script>
<div id="ofertas">
    <?php foreach ($estado_ofertas as $estado):?>
     <?php if($count = $estado->countOfertas() > 0): ?>
      <h3><?php echo link_to($estado->getName().' ('.$count.')', 'estado', $estado) ?></h3>
      <div id="tabs-<?php echo $estado->getSlug() ?>" class="estado_<?php echo $estado->getName() ?>">
          <div class="estado">
          </div>
          <?php include_partial('oferta/list', array('estado'=>$estado, 'pr_ofertas'=>$estado->getOfertas(sfConfig::get('app_max_ofertas_on_homepage')))) ?>
            <?php if (($count -
                   sfConfig::get('app_max_ofertas_on_homepage')) > 0): ?>
              <div class="more_ofertas">
                <?php echo link_to('ver todas', 'estado', $estado) ?>
              </div>
            <?php endif; ?>
      </div>
     <?php endif; ?>
    <?php endforeach; ?>
</div>

