<table class="ofertas">
    <thead class="encabezado">
        <tr>
       <th>Oferta</th>
       <th>Título</th>
       <th>Importe</th>
       <th><?php echo (isset($estado) && $estado->getName() == 'Adjudicada')?'Proyecto':'Presentación'; ?></th>
     </tr>
  </thead>
  <tbody>
    <?php foreach ($pr_ofertas as $i=>$pr_oferta):
    ?>
     <tr class="<?php echo fmod($i, 2) ? 'even' : 'odd' ?>">
       <td class="codigo">
              <a href="<?php echo url_for('oferta/show?id='.$pr_oferta->getId())?>">
                <?php echo $pr_oferta->getCodigo() ?>
                <?php if($pr_oferta->haExpirado()): ?>
                  <br />
                  <small>expirada</small> 
                <?php endif; ?>
              </a>

       </td>
       <td class="titulo"><?php echo $pr_oferta->getTitulo() ?></td>
       <td class="importe"><?php echo $pr_oferta->getImporteOferta() ?></td>
       <td class="fecha">
          <?php if($pr_oferta->getNombreEstado() == 'Adjudicada' && ($pr_proyecto = $pr_oferta->getProyecto())): ?>
            <a href="<?php echo url_for('proyecto/show?id='.$pr_proyecto->getId()); ?>">
                <?php echo $pr_proyecto->getCodigo() ?>
              </a>
          <?php else: ?>
              <?php echo $pr_oferta->getFechaCorta() ?>
              
          <?php endif; ?></td>
     </tr>
     <?php endforeach ?>
  </tbody>
</table>
