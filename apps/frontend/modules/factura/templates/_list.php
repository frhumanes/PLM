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

<ul class="facturas objetos">
    <?php foreach ($pr_facturas as $i=>$pr_factura): ?>
    <li class="objeto">
       <div class="encabezado">
            <a href="<?php echo url_for('factura/show?id='.$pr_factura->getId()) ?>"><div class="codigo"><?php echo $pr_factura->getCodigo() ?></div> - <div class="titulo"><?php echo $pr_factura->getName() ?></div> </a>
        </div>
        <div class="cuerpo">
            <div class="importe">
                <?php echo 'Importe: '.number_format($pr_factura->getImporte(), 2, ',','.') ?>€
            </div>
          <?php if($pr_factura->getEstado() < 3): ?>
          <?php $random = rand() ?>
            <div class="accion">
              <select name="pr_factura<?php echo $pr_factura->getId() ?>[estado]" id="pr_factura<?php echo $random ?>_estado">
              <?php foreach($pr_factura->getEstados() as $estado): ?>
                    <option value="<?php echo $estado->getId() ?>" <?php echo ($pr_factura->getEstado()==$estado->getId())?'selected="selected"':'' ?> ><?php echo $estado->getName() ?></option>
              <?php endforeach; ?>
              </select>
          <small> el <?php echo $pr_factura->getFechaActualizacion() ?></small>
          </div>

            <script>
                $('#pr_factura<?php echo $random ?>_estado').change(function() {
                $("#content").prepend(changeEstadoFactura(<?php echo $pr_factura->getId() ?>, $(this).val()));
                });
            </script>
          <?php else: ?>
          <div class="accion">
            <?php echo $pr_factura->getNombreEstado() ?><small> el <?php echo $pr_factura->getFechaActualizacion() ?></small>
          </div>
          <?php endif; ?>
        </div>
        <div class="pie">
            <div class="cliente"><?php echo $pr_factura->getProyecto()->getNombreCliente() ?> (<?php echo $pr_factura->getProyecto()->getCodigo() ?>)</div>
            <?php echo ' - Fecha emisión: '?>
            <div class="fecha_normal"><?php echo $pr_factura->getFechaEmision() ?></div>
            <div class="accion">
                <a href="<?php echo url_for('proyecto/show?id='.$pr_factura->getProyecto()->getId()) ?>">Ver proyecto</a>
            </div>
            <?php if($pr_factura->getFichero()): ?>
            <div class="accion">
                <a href="<?php echo sfConfig::get('wwwdomain')?>/uploads/facturas/<?php echo $pr_factura->getFichero() ?>"><?php echo image_tag('pdf.png', array('style'=>"border: medium none ; vertical-align: middle;")) ?>Ver fichero</a>
            </div>
            <?php endif; ?>
            

        </div>
    </li>

    <?php endforeach; ?>
</ul>
