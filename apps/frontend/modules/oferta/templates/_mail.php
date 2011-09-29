<?php use_helper('Text') ?>
<p>Estimado usuario/a,</p>

<p>La oferta <a href="<?php echo url_for('oferta/show?id='.$pr_oferta->getId()) ?>"><?php echo $pr_oferta->getCodigo().' '.$pr_oferta->getTitulo() ?></a>ha cambiado ha estado <?php echo $pr_oferta->getNombreEstado() ?>.</p>
<p>Este es un mensaje enviado automáticamente. Por favor no responda a este mensaje. Para mas información consulte el enlace anterior. Gracias</P>

<p>Reciba un cordial saludo</p>
