<script>
function changeEstadoFactura(id, estado)
{
  var r = jQuery.ajax({
    type: 'GET',
    url: '<?php echo url_for('factura')?>/'+id+'/estado/'+estado,
    async: false
  }).responseText;
  return r;
};
</script>

<table class="facturas">
  <thead class="encabezado">
    <tr>
      
      <th>Codigo</th>
      <th>Concepto</th>
      <th>Proyecto</th>
      <th>Importe</th>
      <th>Estado</th>
      <th></th>
    </tr>
  </thead>
  <tfoot class="pie">
    <?php $total_facturado = 0 ?>
    <?php foreach($objeto->sumFacturas() as $row): ?>
    <tr>
      <th colspan="3">TOTAL <?php echo $row['estado']?></th>
      <th style="text-align: right"><?php $total_facturado += $row['total']; echo number_format($row['total'], 2, ',','.') ?>€</th>
      <th></th>
      <th></th>
    </tr>
    <?php endforeach; ?>
    <tr style="border-top: 1px dotted #000">
      <th colspan="3">TOTAL FACTURADO</th>
      <th class="importe"><?php echo number_format($total_facturado, 2, ',','.') ?>€</th>
      <th></th>
      <th></th>
    </tr>
  </tfoot>
  <tbody>
    <?php foreach ($pr_facturas as $i=>$pr_factura): ?>
    <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
      
      <td><a href="<?php echo url_for('factura/show?id='.$pr_factura->getId()) ?>"><?php echo $pr_factura->getCodigo() ?></a></td>
      <td><?php echo $pr_factura->getName() ?></td>
      <td><a href="<?php echo url_for('proyecto/show?id='.$pr_factura->getProyecto()->getId()) ?>"><?php echo $pr_factura->getProyecto()->getCodigo() ?></a></td>
      <td><?php echo number_format($pr_factura->getImporte(), 2, ',','.') ?>€</td>
      <td>
      <?php if($pr_factura->getEstado() < 3): ?>
          <?php $random = rand() ?>
          <select name="pr_factura<?php echo $pr_factura->getId() ?>[estado]" id="pr_factura<?php echo $random ?>_estado">
          <?php foreach($pr_factura->getEstados() as $estado): ?>
                <option value="<?php echo $estado->getId() ?>" <?php echo ($pr_factura->getEstado()==$estado->getId())?'selected="selected"':'' ?> ><?php echo $estado->getName() ?></option>
            <?php endforeach; ?>
            </select>
            <script>
                $('#pr_factura<?php echo $random ?>_estado').change(function() {
                $("#content").prepend(changeEstadoFactura(<?php echo $pr_factura->getId() ?>, $(this).val()));
                });
            </script>
      <?php else: ?>
        <?php echo $pr_factura->getNombreEstado() ?>
      <?php endif; ?>
        <br />
        <small>Actualizado el <?php echo $pr_factura->getFechaActualizacion() ?></small></td>
        <td>
        <?php if($pr_factura->getFichero()): ?>
           <a href="http://localhost/uploads/facturas/<?php echo $pr_factura->getFichero() ?>"><?php echo image_tag('pdf.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?></a>
        <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
