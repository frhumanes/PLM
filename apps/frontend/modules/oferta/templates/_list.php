<ul class="ofertas objetos">
<?php $limit = 255 ?>
<?php foreach($pr_ofertas as $pr_oferta): ?>
  <li class="objeto">
    <div class="encabezado">
        <?php if($pr_oferta->haExpirado()): ?>
            <small class="fecha_aviso">[expirada]</small> 
        <?php endif; ?>
        <a href="<?php echo url_for('oferta/show?id='.$pr_oferta->getId())?>"><div class="codigo"><?php echo $pr_oferta->getCodigo() ?></div> - <div class="titulo"><?php echo $pr_oferta->getTitulo() ?></div> </a>
    </div>
    <div class="cuerpo">
        <div class="descripcion">
        <?php if (strlen($pr_oferta->getDescripcionOferta()) > $limit){
                $summary = substr($pr_oferta->getDescripcionOferta(), 0, strrpos(substr($pr_oferta->getDescripcionOferta(), 0, $limit), ' ')) . '...';
            }else{
                $summary = $pr_oferta->getDescripcionOferta();
            }
            echo $summary;
        ?>
      </div>
    </div>
    <div class="pie">
        <div class="cliente"><?php echo $pr_oferta->getNombreCliente() ?> (<?php echo $pr_oferta->getImporteOferta() ?>€)</div>
        <div class="responsable"> - <?php echo $pr_oferta->getResponsable() ?></div>
        <?php if($pr_oferta->getEstado()<4): ?>
            <?php echo ' - Límite presentación: '?>
            <div class="<?php echo ($pr_oferta->tiempoRestante() >= 15*24*60*60)?'fecha_normal':'fecha_aviso' ?>"><?php echo $pr_oferta->getFechaCorta() ?></div>
            <?php if($pr_oferta->getEstado()==1): ?>
                <div class="accion"> - <?php echo link_to('Editar', 'oferta_edit',$pr_oferta) ?></div>
            <?php endif; ?>
        <?php elseif($pr_oferta->getEstado()==5): ?>
            <div class="accion"> - <a href="<?php echo url_for('proyecto/show?id=',$pr_oferta->getProyecto()) ?>">Ver proyecto</a></div>
        <?php endif; ?>
    </div>
  </li>
<?php endforeach; ?>
</ul>
