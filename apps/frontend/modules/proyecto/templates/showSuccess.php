<?php use_helper('Text') ?>
<?php slot(
   'title',
   sprintf('Price-Roch >>>> Proyecto %s (%s)', $pr_proyecto->getCodigo(),
    $pr_proyecto->getNombreCliente()))
?>
<div id="proyecto">
    <h1><?php echo $pr_proyecto->getCodigo() ?></h1>
    <h2><?php echo $pr_proyecto->getNombreCliente() ?></h2>
    <h3>
    <?php echo $pr_proyecto->getName(); ?>
    <small> - (<?php echo $pr_proyecto->getImporteContratacion() ?>)</small>
    </h3>

<script type="text/javascript">
	$(function() {
		$("#tabs").tabs({disabled: [1, 3]});
	});
	</script>
    <div id="tabs">
	<ul>
		<li><a href="#tabs-detalles">Detalles</a></li>
		<li><a href="#tabs-costes">Costes</a></li>
		<li><a href="#tabs-facturas">Facturación</a></li>
        <li><a href="#tabs-acciones">Acciones disponibles</a></li>
        <a style="float: right"  href="<?php echo url_for('proyecto/edit?id='.$pr_proyecto->getId()) ?>"><?php echo image_tag('edit.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <a style="float: right"  href="<?php echo url_for('proyecto/index') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a>
	</ul>
    
    <div  id="tabs-detalles">
    <h4>Detalles</h4>
    <table class="detalles">
      <tbody>
        <tr>
          <th>Pedido:</th>
          <td><?php echo $pr_proyecto->getPedido() ?></td>
        </tr>
        <tr>
          <th>Cliente:</th>
          <td><?php echo $pr_proyecto->getNombreCliente() ?></td>
        </tr>
        <tr>
          <th>Responsable:</th>
          <td><?php echo $pr_proyecto->getResponsable() ?></td>
        </tr>
        <tr>
          <th>Oferta:</th>
          <td><?php echo link_to($pr_proyecto->getOferta()->getCodigo(), 'oferta', array('id'=>$pr_proyecto->getOfertaId())) ?></td>
        </tr>
        <tr>
          <th>Importe contratacion:</th>
          <td><?php echo number_format($pr_proyecto->getImporteContratacion(), 2, ',', '.') ?></td>
        </tr>
        <tr>
          <th>Forma pago:</th>
          <td><?php echo $pr_proyecto->getFormaPago() ?></td>
        </tr>
    </table>
    </div>
    <div id="tabs-facturas" class="facturas">
    <h4>Facturas asociadas</h4>
    <a style="float: right"  href="<?php echo url_for('facturar_proyecto', $pr_proyecto) ?>"><?php echo image_tag('more.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a>
    <?php include_partial('factura/table', array('pr_facturas'=>$pr_proyecto->getFacturas(),'objeto'=>$pr_proyecto)); ?>
    </div>
</div>
<hr />
<div class="meta">
    <small>Creado el <?php echo $pr_proyecto->getDateTimeObject('created_at')->format('d/m/Y H:m') ?></small>
  </div>
  &nbsp;
  <div class="meta">
    <small>Última actualización: <?php echo $pr_proyecto->getDateTimeObject('updated_at')->format('d/m/Y H:m') ?></small>
  </div>

</div>
