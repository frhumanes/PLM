<script type="text/javascript">
	$(function() {
		$("#tabs").tabs();
	});
</script>
<h1>Factura <?php echo $pr_factura->getCodigo() ?></h1>
    <br />
<div id="tabs">
    <ul>
		<li><a href="#tabs-detalles">Detalles</a></li>
		<li><a href="#tabs-historico">Ciclo de vida</a></li>
        <?php if($pr_factura->getEstado() != '3'): ?>
            <a style="float: right"  href="<?php echo url_for('factura/edit?id='.$pr_factura->getId()) ?>"><?php echo image_tag('edit.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <?php endif; ?>
        <a style="float: right"  href="<?php echo url_for('factura/index') ?>"><?php echo image_tag('volver.png', array('style'=>"border: medium none ; vertical-align: middle;padding: 0 5px;")) ?></a>
	</ul>
    <div id="tabs-detalles">
        <h4>Detalles</h4>
    <table class="factura">
      <tbody>
        <tr>
          <th>Concepto:</th>
          <td><?php echo $pr_factura->getName() ?></td>
        </tr>
        <tr>
          <th>Número factura:</th>
          <td><?php echo $pr_factura->getCodigo() ?></td>
        </tr>
        <tr>
          <th>Fecha emisión:</th>
          <td><?php echo $pr_factura->getFechaEmision() ?></td>
        </tr>
        <tr>
          <th>Importe:</th>
          <td><?php echo number_format($pr_factura->getImporte(), 2, ',','.') ?></td>
        </tr>
        <tr>
          <th>Estado:</th>
          <td><?php echo $pr_factura->getNombreEstado() ?></td>
        </tr>
        <tr>
          <th>Actualizada el:</th>
          <td><?php echo $pr_factura->getFechaActualizacion() ?></td>
        </tr>
        <tr>
          <th>Proyecto:</th>
          <td><?php echo link_to($pr_factura->getProyecto()->getCodigo(), 'proyecto', $pr_factura->getProyecto()) ?></td>
        </tr>
        <?php if($pr_factura->getFichero()): ?>
        <tr>
          <th>Fichero:</th>
          <td>
                <a href="http://localhost/uploads/facturas/<?php echo $pr_factura->getFichero() ?>">Ver fichero adjunto</a>
          </td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
    </div>
    <div id="tabs-historico">
        <h4>Cambios de estado</h4>
        <table class="historico">
        <tbody>
        <?php foreach($pr_factura->getHistoricoCambios() as $i=>$cambio): ?>
            <tr class="<?php echo (fmod($i, 2) == 1)?'even':'odd'; ?>">
                <td><?php echo $cambio->getDateTimeObject('created_at')->format('H:m d/m/Y') ?></td>
                <td><?php echo $cambio->getNombreEstado() ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
        </table>
    </div>

</div>
