<?php use_helper('Text') ?>
<p>Estimado usuario/a,</p>

<p>La oferta <a href="<?php echo url_for('factura/show?id='.$pr_factura->getId()) ?>"><?php echo $pr_factura->getCodigo().' '.$pr_factura->getName() ?></a> ha cambiado ha estado <?php echo $pr_factura->getNombreEstado() ?>.</p>
<p>Este es un mensaje enviado automáticamente. Por favor no responda a este mensaje. Para mas información consulte el enlace anterior. Gracias</P>

<p>Reciba un cordial saludo</p>
